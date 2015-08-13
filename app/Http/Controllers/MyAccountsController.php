<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Ticket;
use App\Http\Models\User;

class MyAccountsController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;

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

        $x = \Auth::check();

        \Log::warning('MyTickets -- User is logged in',["context"=>$x]);
      
        if (\Auth::check()) {
            $user_id = \Auth::user()->id;
        } else {
            return $this->respondError(401, 'Please sign to access this service.');
        }


    	$data = [
				"this"	=> [
                    "guid" => "my-tickets",
                    "label" => "My Tickets"
                ],
	  			"parents" => $this->roots[0],
	    		"tickets" => Ticket::Summary($user_id, 30)
	    	];

    	return $this->respondOK($data);
    }

    
}
