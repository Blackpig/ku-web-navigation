<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

class IconController extends Controller
{

    /**
     * Get Endpoints for the Service Group
     * @return JSON 
     */
    public function show()
    {

        if (env('APP_ENV') == 'local') {
            $username = "ka01356";
        } else {
            $username = str_replace("@KUDS.KINGSTON.AC.UK", "", strtoupper($_SERVER['PHP_AUTH_USER'])); 
        }

        if(!$username) {
            $email = '';
            $name = '';
        } else {

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
                $email = '';
                $name = '';
            } else {
                $name = $ldap_user->givenname .' '. $ldap_user->sn;
                $email = $ldap_user->mail;
            }
        }
    	
        return view('icons', ['name'=>$name,'email'=>$email]);
    }

    /**
     * Get Endpoints for the Service Group
     * @return JSON 
     */
    public function update(Request $request)
    {

        $data['requester'] = $request->input('requester');
    	$data['email'] = $address = $request->input('email');
        $data['dept']   = $request->input('dept');
        $data['primary']= $request->input('primary');
        $data['alt']    = $request->input('alt');
        $data['date']   = date('j/n/Y h:i:s');

        \Mail::send('emails.icon-selector', $data, function($message)
        {
            $message->from('s.hallewell@kingston.ac.uk', 'Web Navigation');
            if (env('APP_ENV') == 'local' ) {
                $message->to('stuart@hunniedesign.com')->cc('stuart@hunniedesign.com')->bcc('stuart@hunniedesign.com');
            } else {
                $message->to('l.middletonhill@kingston.ac.uk')->cc('a.wilden@kingston.ac.uk')->bcc($address);
            }

        });

        $response = [
        'code' => 200,
        'status' => 'succcess',
        'data' => []
        ];

        return response()->json($response, $response['code']);
        
    }
   
}
