<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Cache;
use \App\Http\Models\Endpoint;

class EndpointController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;

	protected $roots = [
			[
				"guid" => "0",
    			"label" => "University Organisations"
			],
			[
				"guid" => "1",
    			"label" => "Student Channels"
			]
		];

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
				"this"	=> $this->roots[0],
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
     * Get Endpoints fom LANDesk
     * @return JSON 
     */
    public function organisationEndpointList($id)
    { 

    	$type = Endpoint::Type($id);

    	if ($type == 1) {
    		$current = Endpoint::Organisation($id);
    		$endpoints = Endpoint::OrganisationEndpoints($id);
    		$parents = $this->roots[0];
    	} elseif ($type == 2) {
    		$current = Endpoint::ServiceGroup($id);
    		$endpoints = Endpoint::OrganisationServiceGroupEndpoints($id, $current->organisation_guid);		
    		$parents = $this->getParents(0, $current);
    	} else {
    		return $this->respondError(500, 'Unknown Tile Type');
    	}

    	//$data = Cache::remember($id,360, function($id) {
	    //	return [
		$data = [		
				"this"	=> [
					"guid" => $current->guid,
	    			"label" => $current->name
				],
	    		"parents" => $parents,
	    		"has_service_group"	=> $this->checkForServiceGroup($endpoints),
	    		"endpoints" => $endpoints
	    	];
	  //  });

    	return $this->respondOK($data);
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
				"this"	=> $this->roots[1],
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
    public function channelEndpointList($id)
    { 

    	$type = Endpoint::Type($id);

    	if ($type == 1) {
    		$current = Endpoint::Organisation($id);
    		$endpoints = Endpoint::ChannelEndpoints($id);
    		$parents = $this->roots[0];
    	} elseif ($type == 2) {
    		$current = Endpoint::ServiceGroup($id);
    		$endpoints = Endpoint::ChannelServiceGroupEndpoints($id, $current->organisation_guid);		
    		$parents = $this->getParents(0, $current);
    	} else {
    		return $this->respondError(500, 'Unknown Tile Type');
    	}

    	//$data = Cache::remember($id,360, function($id) {
	    //	return [
		$data = [		
				"this"	=> [
					"guid" => $current->guid,
	    			"label" => $current->name
				],
	    		"parents" => $parents,
	    		"has_service_group"	=> $this->checkForServiceGroup($endpoints),
	    		"endpoints" => $endpoints
	    	];
	  //  });

    	return $this->respondOK($data);
    }

    /**
     * Get Endpoints fom LANDesk
     * @return JSON 
     */
    public function searchEndpoints($term, $staff_only = 0)
    { 

    	$data = Endpoint::Search($term, $staff_only);
    	dd($data);

    	return $this->respondOK($data);
    }

    private function getParents($root, $current) {

    	$parents = [];

    	$x = $current;
    	
    	// Get the parent service group(s)
    	while ($x->parent_guid) {
    		$parents[] = [
    			"guid" => $x->parent_guid,
    			"label" => $x->parent_name
    		];
    		
    		$x = Endpoint::ServiceGroup($x->parent_guid);
    	}   

    	// Get the Organisation
    	$parents[] = [
    		"guid" => $current->organisation_guid,
    		"label" => $current->organisation_name
    	];

    	// Get the root
    	$parents[] = $this->roots[$root];

    	return array_reverse($parents);

    }

    private function checkForServiceGroup($endpoints) {

     	foreach ($endpoints as $endpoint) {
     		if ($endpoint->type == 'service-group') {
     			return true;
     			break;
     		}
     	}

     	return false;

    }
}
