<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Models\User;

class UserController extends Controller
{

    use \App\Http\Traits\HttpResponseTrait;

    /**
     * Load user Details
     * @return JSON 
     */
    public function authenticate()
    {	

        $username = str_replace("@KUDS.KINGSTON.AC.UK", "", strtoupper($_SERVER['PHP_AUTH_USER'])); 

        if(!$username) {

            \Log::error('API Error 401 - Authentication',["context"=>"No username available for LDAP lookup"]);
            return $this->respondError(401);
            exit;
        }

        /* Do we have the user within the app*/
        $user = User::find($username);

        /* if no then retrieve from LDAP and create*/
        if (!$user) {
            include base_path() . "/vendor/adldap/adldap/lib/adLDAP/adLDAP.php";

            $ldap_options = [
                "domain_controllers" => [env('LDAP_DC_1'),env('LDAP_DC_2')],
                "base_dn" => env('LDAP_BASE_DN'),
                "account_suffix" => env('LDAP_USER_SUFFIX'), 
                "admin_username" => env('LDAP_ADMIN_USER'),
                "admin_password" => env('LDAP_ADMIN_PASS'),
                "use_ssl" => true
            ];

            $ldap = new \adLDAP\adLDAP($ldap_options);

            $ldap_user = $ldap->user()->infoCollection($username, array("*"));


            if(!$ldap_user) {

                \Log::error('API Error 401 - Authentication',["context"=>"Unable to find user id: $username in LDAP lookup"]);
                return $this->respondError(401);
                exit;
            }

            $user = new User;
            $user->id = $username;
            $user->name = $ldap_user->displayname;
            $user->email = $ldap_user->mail;
            $user->employee_type = $this->getEmployeeType($ldap_user->employeetype);
            $user->employee_status = ($user->employee_type == 0) ? 'staff' : 'student';
            $user->homedir = $ldap_user->homedirectory;
            $user->department = $ldap_user->departmentnumber;
            $user->avatar = $this->getUserImage($username);
            $user->save();
            
            $user = User::find($username);
        }

        \Auth::login($user);
        
        return $this->respondOK($user);
    }

    private function getEmployeeType($type) {

        $type = strtoupper($type);
        $staff_types = explode(",", strtoupper(env('STAFF_TYPES')));

        return in_array($type, $staff_types) ? 0 : 1;

    }

    private function getUserImage($id=false)
    {
        $default = "../assets/images/no-photo.jpg";

        if ($id) {

            $type = (strtoupper(substr($id, 0, 2)) == "KU") ? 'STAFF' : 'STUDENT';

            $id = str_replace(["K","KU"],["",""],$id);

            $image = "\\kucompic.kingston.ac.uk\IDPro7dataSettings\KU_{$type}_IDCARD\Images\\{$id}.jpg";

            $image_exists = @getimagesize($image_url);

            if ($image_exists[0]) {
                return $image;
            }
        }

        return $default;
    }

}
