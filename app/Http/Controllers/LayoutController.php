<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Models\Endpoint;

class LayoutController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;

    /**
     * Get Endpoints for the Service Group
     * @return JSON 
     */
    public function show()
    {


    	return view('layout');
    }

    /**
     * Get Endpoints for the Service Group
     * @return JSON 
     */
    public function update()
    {


    	return view('layout');
    }

   
}
