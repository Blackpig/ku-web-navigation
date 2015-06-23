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

    	return $this->respondOK($data);;
    }

    /**
     * Get Endpoints fom LANDesk
     * @return JSON 
     */
    public function organisationEndpointList($id)
    {


    	$data = [
				"this"	=> [
					"guid" => $id,
	    			"label" => "Get the Label"
				],
	    		"parents" => Endpoint::Parents($id),
	    		"has_service_group"	=> true,
	    		"endpoints" => Endpoint::OrganisationEndpoints()
	    	];

    	return $this->respondOK($data);;
    }
}
