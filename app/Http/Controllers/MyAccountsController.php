<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Ticket;
use App\Http\Models\User;

class MyAccountsController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;
    use \App\Http\Traits\AuthTrait;

	protected $roots = [
			[
				"guid" => "my-accounts",
    			"label" => "My Accounts"
			]
		];

    /**
     * Get Tickets fom LANDesk, Quemis & ESD
     * @return JSON 
     */
    public function myTickets()
    {

        $username = $this->getUsername();

        if (!$username) {
            $msg = "User not Authorized or session has timed out";
            \Log::error('API Error 401 - Authentication',["context"=>$msg]);
            return $this->respondError(401,$msg);
            exit;
        }

    	$data = [
				"this"	=> [
                    "guid" => "my-tickets",
                    "label" => "My Tickets"
                ],
	  			"parents" => $this->roots[0],
	    		"tickets" => Ticket::Summary($username, 30)
	    	];

    	return $this->respondOK($data);
    }

    
}
