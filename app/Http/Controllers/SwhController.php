<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Models\User;

class SwhController extends Controller
{

    use \App\Http\Traits\HttpResponseTrait;
    
    /**
     * Load user Details
     * @return JSON 
     */
    public function authenticate1()
    {	
        
        $username = "ka01356";

        $x = "swh --> PHP_AUTH_USER ==>" . isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : false;

        \Log::notice($x);
             
        $user = User::find($username);
        
        \Auth::login($user);

        $x = "swh --> Auth::check ==>" . \Auth::check();
         \Log::notice($x);
       // return $this->respondError(401,'wibble');
       
    }

     public function authenticate2()
    {   
        $x = "swh2 --> PHP_AUTH_USER ==>" . isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : false;

        \Log::notice($x);
    

        $x = "swh2 --> Auth::check ==>" . \Auth::check();
         \Log::notice($x);
        
        $x = "swh2 --> PHP_AUTH_USER ==>" . isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : false;

        \Log::notice($x);
             

       
    }
}
