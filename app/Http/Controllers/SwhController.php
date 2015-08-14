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

        echo "PHP_AUTH_USER ==>" . isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : false;
             
        $user = User::find($username);
        
        \Auth::login($user);

        $x = \Auth::check();

        echo "<br>Auth::check ==>" . $x;
       // return $this->respondError(401,'wibble');
       
    }

     public function authenticate2()
    {   
        echo "<br>PHP_AUTH_USER ==>" . isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : false;
        
        $x = \Auth::check();

        echo "<br>Auth::check ==>" . $x . "<br>";
        
        $username = "ka01356";

        echo "<br>PHP_AUTH_USER ==>" . isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : false;
             

       
    }
}
