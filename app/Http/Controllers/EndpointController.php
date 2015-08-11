<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Cache;
use App\Http\Models\Endpoint;

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

        $data['endpoints'] = $this->insertImages($data['endpoints'], true, $data['has_service_group']);

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

        $data['endpoints'] = $this->insertImages($data['endpoints'], false, $data['has_service_group']);

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

         $data['endpoints'] = $this->insertImages($data['endpoints'], true, $data['has_service_group']);

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
    		$parents = $this->roots[1];
    	} elseif ($type == 2) {
    		$current = Endpoint::ServiceGroup($id);
    		$endpoints = Endpoint::ChannelServiceGroupEndpoints($id, $current->organisation_guid);		
    		$parents = $this->getParents(1, $current);
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

        $data['endpoints'] = $this->insertImages($data['endpoints'], false, $data['has_service_group']);

    	return $this->respondOK($data);
    }

    /**
     * Get Endpoints fom LANDesk
     * @return JSON 
     */
    public function searchEndpoints($term)
    { 

    	if (\Auth::check()) {
    		$staff_type = \Auth::user()->employee_type;
    	} else {
    		$staff_type = 0;
    	}

    	$data['endpoints'] = Endpoint::Search($term, $staff_type);

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

    private function insertImages($endpoints, $is_index, $has_service_group)
    {

        $return_endpoints = collect([]);

        // Create arrays to ho,d the max number of images at each size
        $square = collect(range(1,18));
        $tall   = collect(range(1,14));
        $wide   = collect(range(1,38));

        // Shuffle them up
        $square = $square->shuffle();
        $tall   = $tall->shuffle();
        $wide   = $wide->shuffle();

        // Reverse our endpoints - we will then use pop() instead of shift() as this is more efficient
        $endpoints = $endpoints->reverse();
        $endpoint_count = $endpoints->count();
        $image_count = 0;

        // Determine the max no images to display per page
        // Assign the first image for home pages
        if ($is_index) {
            $denominator = 3;
            $return_endpoints->push($this->makeImageEndpoint('tall',$tall->pop()));
        } elseif ($has_service_group) {
            $denominator = 4;
        } else {
            $denominator = 5;
        }

        $constant = ($endpoint_count <= 10) ? 0 : 9 - $denominator;

        $max_images = floor($endpoint_count/$denominator) + $constant;

        // Assign images
        for ($i=0; $i<$endpoint_count; $i++) {
            $return_endpoints->push($endpoints->pop());

            if ($is_index) {
                // [square, square, wide, tall]
                $mods = ["5", "7", "8", "9"];
            } elseif ($has_service_group) {
                $mods = ["5", "7", "8", "9"];                
            } else {
                $mods = ["5", "7", "8", "9"];
            }

            echo "$i-" . $i%$mods[0] . "-" . $i%$mods[1] . "-" .  $i%$mods[2] . "-" . $i%$mods[3] . "<br/>";
                
            if (($i%$mods[0] == 0 || $i%$mods[1]==0) && $image_count <= $max_images && $square->count() > 0) {
                $return_endpoints->push($this->makeImageEndpoint('square',$square->pop()));
                $image_count++;
            }

            if ($i%$mods[2] == 0 && $image_count <= $max_images && $wide->count() > 0) {
                $return_endpoints->push($this->makeImageEndpoint('wide',$wide->pop()));
                $image_count++;
            }

            if ($i%$mods[3] == 0 && $image_count <= $max_images && $tall->count() > 0) {
                $return_endpoints->push($this->makeImageEndpoint('tall',$tall->pop()));
                $image_count++;
            }

        }

        if ($square->count() > 0) {
            $return_endpoints->push($this->makeImageEndpoint('square',$square->pop()));
        } elseif ($wide->count() > 0) {
            $return_endpoints->push($this->makeImageEndpoint('wide',$wide->pop()));
        }
        
        return $return_endpoints;

    }

    private function makeImageEndpoint($size, $id) {

        $image = new \stdClass;
        $image->type = "image";
        $image->size = $size;
        $image->id = $id;

        return $image;

    }
}
