<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Controllers\UserController as User;
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

        $layout = Layout::find($id);
        if ($layout) {
            $data['updated_by'] = $layout->updated_by;
            $data['updated_at'] = $layout->updated_at;
        } else {
            $data['updated_by'] = false;
            $data['updated_at'] = false;
        }

        return view('admin.layout', ['data'=>$data]);
    }

    /**
     * Set the Layout 
     * @return Response 
     */
    public function update($id, Request $request, User $user)
    {

        try{
            $layout = Layout::find($id);

            if (!$layout) {
                $layout = new Layout;
                $layout->id = $id;
            }

            $layout->layout = json_encode($request->input('layout'));

            $editor = $user->authenticate(false);
            $layout->updated_at = $editor->full_name;

            $layout->save();

            Cache::forget($id);

         return $this->respondOK();

     } catch(Exception $e) {
        return $this->respondError(500, "Layout update failed with: " . $e->getMessage());
     }

    }

   
}
