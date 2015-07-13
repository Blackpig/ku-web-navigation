<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Models\Endpoint;
use \App\Http\Models\Layout;

class LayoutController extends Controller
{

    /**
     * Get Endpoints for the Service Group
     * @return JSON 
     */
    public function show($type, $id)
    { 
        $data = [];

        $data['endpoints'] =[];

        if ($type == 'organisation') {
            $endpoints = Endpoint::OrganisationEndpoints($id);
        }

        if ($type == 'channel') {
            $endpoints = Endpoint::ChannelEndpoints($id);
        }

        if ($type == 'osg') {
            $current = Endpoint::ServiceGroup($guid);
            $endpoints = Endpoint::OrganisationServiceGroupEndpoints($id, $current->organisation_guid);     
        }

        if ($type == 'csg') {
            $current = Endpoint::ServiceGroup($guid);
            $endpoints = Endpoint::ChannelServiceGroupEndpoints($id, $current->organisation_guid);    
        }

        $pageTitle = 'Page Title';

        return view('admin.layout', ['data'=>$data, 'pageTitle'=>$pageTitle]);
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
