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
            $current = Endpoint::Organisation($id);
            $endpoints = Endpoint::OrganisationEndpoints($id);
        }

        if ($type == 'channel') {
            $current = Endpoint::Organisation($id);
            $endpoints = Endpoint::ChannelEndpoints($id);
        }

        if ($type == 'osg') {
            $current = Endpoint::ServiceGroup($id);
            $endpoints = Endpoint::OrganisationServiceGroupEndpoints($id, $current->organisation_guid);     
        }

        if ($type == 'csg') {
            $current = Endpoint::ServiceGroup($id);
            $endpoints = Endpoint::ChannelServiceGroupEndpoints($id, $current->organisation_guid);    
        }

        $pageTitle = $current->name;

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
