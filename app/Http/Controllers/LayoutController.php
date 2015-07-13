<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Models\Endpoint;
use \App\Http\Models\Layout;
use Illuminate\Http\Request;
use Cache;

class LayoutController extends Controller
{

     use \App\Http\Traits\HttpResponseTrait;

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
            $data['endpoints'] = Endpoint::ChannelServiceGroupEndpoints($id, $data['current']->organisation_guid);    
        }

        return view('admin.layout', ['data'=>$data]);
    }

    /**
     * Get Endpoints for the Service Group
     * @return JSON 
     */
    public function update($id, Request $request)
    {

        try{
            $layout = Layout::find($id);

            if (!$layout) {
                $layout = new Layout;
                $layout->id = $id;
            }

            $layout->layout = json_encode($request->input('layout'));

            $layout->save();

            Cache::forget($id);

         return $this->respondOK();

     } catch(Exception $e) {
        return $this->respondError(500, "Layout update failed with: " . $e->getMessage());
     }

    }

   
}
