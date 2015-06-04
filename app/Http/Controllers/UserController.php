<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Load user Details
     * @return JSON 
     */
    public function show($id)
    {	
    	$data = [
    			"displayName"	=> "Stuart Hallewell",
	    		"firstName"		=> "Stuart",
	    		"lastName"		=> "Hallewell",
	    		"email"			=> "stuart@hunniedesign.com",
	    		"employeeType" 	=> "0",
                "state"     => "staff"
    	];

    	return response()->json($data);
    }
}
