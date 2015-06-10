<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{

    use \App\Http\Traits\HttpResponseTrait;

    /**
     * Load user Details
     * @return JSON 
     */
    public function authenticate()
    {	

        $data = [
                "displayName"   => "Stuart Hallewell",
                "firstName"     => "Stuart",
                "lastName"      => "Hallewell",
                "email"         => "stuart@hunniedesign.com",
                "employee_type" => "0",
                "employee_status"=> "staff"
        ];
       
       return $this->respondOK($data);
}

public function swh()
    {   

        $username = str_replace("@KUDS.KINGSTON.AC.UK", "", strtoupper($_SERVER['AUTH_USER'])); 

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
                "domain_controllers" => [env('LDAP_DC1'),env('LDAP_DC2')],
                "base_dn" => env('LDAP_BASE_DN'),
                "account_suffix" => env('LDAP_USER_SUFFIX'), 
                "admin_username" => env('LDAP_ADMIN_USER'),
                "admin_password" => env('LDAP_ADMIN_PASS'),
                "use_ssl" => false
            ];

            $ldap = new \adLDAP\adLDAP($ldap_options);

            $ldap_user = $ldap->user()->info($username);

            if(!$ldap_user) {

                \Log::error('API Error 401 - Authentication',["context"=>"Unable to find user id: $username in LDAP lookup"]);
                return $this->respondError(401);
                exit;
            }

            $user = new User;
            $user->username = $username;
            $user->name = $ldap_user[0]["displayname"][0];
            $user->email = $ldap_user[0]["mail"][0];
            $user->type = $ldap_user[0]["employeetype"][0];
            $user->state = ($user->type == 0) ? 'staff' : 'student';
            $user->homedir = $ldap_user[0]["homedirectory"][0];
            $user->department = $ldap_user[0]["departmentnumber"][0];
            $user->avatar = "";
            $user->save();
            
            $user = User::find($username);
        }

        Auth::login($user);
        
        return $this->respondOK($data);
    }
}
