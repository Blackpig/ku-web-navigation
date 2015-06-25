<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Cache;
use \App\Http\Models\Endpoint;

class EndpointController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;

    /**
     * Get Organisations fom LANDesk (StaffSpace view)
     * @return JSON 
     */
    public function organisationList()
    {

    	if (env('APP_ENV') == 'development') {
    		Cache::forget('organisations');
    	}

    	$data = Cache::remember('organisations',360, function() {
    		return [
				"this"	=> [
					"guid" => "0",
	    			"label" => "University Organisations"
				],
	  			"parents" => [
	    				"guid" => null,
	    				"label" => null
	    			],
	    		"has_service_group"	=> true,
	    		"endpoints" => Endpoint::Organisations()
	    	];
	    });

    	return $this->respondOK($data);;
    }

    /**
     * Get Channels fom LANDesk (My Kingston/Student view)
     * @return JSON 
     */
    public function channelList()
    {
	    
	    if (env('APP_ENV') == 'development') {
    		Cache::forget('channels');
    	}

	    $data = Cache::remember('channels',360, function() {
	    	return [
				"this"	=> [
					"guid" => "1",
	    			"label" => "Student Channels"
				],
	    		"parents" => [
	    				"guid" => null,
	    				"label" => null
	    			],
	    		"has_service_group"	=> true,
	    		"endpoints" => Endpoint::Channels()
		    ];
	    });

	    return $this->respondOK($data);
	}

    /**
     * Get Endpoints fom LANDesk
     * @return JSON 
     */
    public function organisationEndpointList($id)
    { 

    	$type = Endpoint::Type($id);

    	if ($type == 1) {
    		$current = Endpoint::Organisation($id);
    		$endpoints = Endpoint::OrganisationEndpoints($id);
    		$parents = [
					"guid" => "0",
	    			"label" => "University Organisations"
				];
    	} elseif ($type == 2) {
    		$current = Endpoint::ServiceGroup($id);
    		$endpoints = Endpoint::OrganisationServiceGroupEndpoints($id, $current->organisation_guid);		
    	} else {
    		return $this->respondError(500, 'Unknown Tile Type');
    	}

    	//$data = Cache::remember($id,360, function($id) {
	    //	return [
		$data = [		"this"	=> [
					"guid" => $current->guid,
	    			"label" => $current->name
				],
	    		"parents" => $parents,
	    		"has_service_group"	=> true,
	    		"endpoints" => $endpoints
	    	];
	  //  });

    	return $this->respondOK($data);;
    }
}
