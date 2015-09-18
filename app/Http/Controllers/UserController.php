<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\User;

class UserController extends Controller
{

    use \App\Http\Traits\HttpResponseTrait;
    use \App\Http\Traits\AuthTrait;
    
    /**
     * Load user Details
     * @return JSON 
     */
    public function authenticate($api = true)
    {	

       if (\Auth::check()) {
            $user = \Auth::user();
        } else {

            $username = $this->getUsername();

            if (!$username) {
                $msg = "No username available for LDAP lookup";
                \Log::error('API Error 401 - Authentication',["context"=>$msg]);
                return $this->respondError(401,$msg);
                exit;
            }

            //$username = ($username=='KA01356') ? "K1068743" : $username;

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
                    $msg = "Unable to find user id: $username in LDAP lookup";
                    \Log::error('API Error 401 - Authentication',["context"=>$msg]);
                    return $this->respondError(401, $msg);
                    exit;
                }

                $user = new User;
                $user->id = $username;
                $user->first_name = $ldap_user->givenname;
                $user->last_name = $ldap_user->sn;
                $user->email = $ldap_user->mail;
                $user->external_email = $ldap_user->msexchextensionattribute21;
                $user->employee_type = $this->getEmployeeType($ldap_user->employeetype);
                $user->employee_class = ucwords(strtolower($ldap_user->employeetype));
                $user->employee_status = ($user->employee_type == 0) ? 'staff' : 'student';
                $user->job_title = ucwords(strtolower($ldap_user->title));
                $user->department = ucwords(strtolower($ldap_user->company));
                $user->tel = $ldap_user->telephonenumber;
                $user->gender = strtolower($ldap_user->extensionAttribute1);
                $user->avatar = $this->getUserImage($user->id, $user->gender);
                $user->password = '';
                $user->save();
                
                $user = User::find($username);
            }

            $x=strpos($user->avatar, 'avatar_');
            echo "X=$x";

            if (strpos($user->avatar, 'avatar_') !== 0 ) {
                $user->avatar = $this->getUserImage($user->id, strtolower($user->gender));
                $user->save();
            }

            //\Auth::loginUsingId($user->id);
             \Auth::login($user);
        }

        if ($api) {
            return $this->respondOK($user);
        } else {
            return $user;
        }
    }

    private function getEmployeeType($type) {

        $type = strtoupper($type);
        $staff_types = explode(",", strtoupper(env('STAFF_TYPES')));

        return in_array($type, $staff_types) ? 0 : 1;

    }

    private function getUserImage($id=false, $gender='')
    {

        $default = "../assets/images/avatar_{$gender}.png";

        if ($id) {

            $id = strtoupper($id);

            $type = (substr($id, 0, 2) == "KU") ? 'staff' : 'students';

            $id = str_replace(["KU","K"],["",""],$id);

            $image = "https://kusdpw.kingston.ac.uk/data/{$type}/{$id}.jpg";

            $exists = @get_headers($image);

            if (strtoupper($exists[0]) == "HTTP/1.1 200 OK") {
                $hash = time();
                $local = base_path() . "/public/assets/images/user/{$hash}{$id}.jpg";

                if (copy($image, $local)) {
                    $local = str_replace(base_path() . "/public", "..", $local);
                    return $local;
                }
            }
        }

        return $default;
    }

}
