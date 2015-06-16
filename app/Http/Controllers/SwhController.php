<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Models\Endpoint;

class SwhController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;

    /**
     * Get Organisations fom LANDesk (StaffSpace view)
     * @return JSON 
     */
    public function swh()
    {

    	$date = Endpoint::Organisations()

    	return $this->respondOK($data);;
    }

     public function swh2()
    {

    	$date = Endpoint::Channels()

    	return $this->respondOK($data);;
    }
}
