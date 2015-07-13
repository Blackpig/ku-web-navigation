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

        $data['endpoints'] =[];

        if ($type == 'organisation') {
            $data['current'] = Endpoint::Organisation($id);
            $data['endpoints'] = Endpoint::OrganisationEndpoints($id);
        }

        if ($type == 'channel') {
            $data['current'] = Endpoint::Organisation($id);
            $data['endpoints'] = Endpoint::ChannelEndpoints($id);
        }

        if ($type == 'osg') {
            $data['current'] = Endpoint::ServiceGroup($id);
            $data['endpoints'] = Endpoint::OrganisationServiceGroupEndpoints($id, $data['current']->organisation_guid);     
        }

        if ($type == 'csg') {
            $data['current'] = Endpoint::ServiceGroup($id);
            $data['endpoints'] = Endpoint::ChannelServiceGroupEndpoints($id, $current->organisation_guid);    
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
