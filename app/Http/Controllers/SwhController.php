<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SwhController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;

    /**
     * Get Organisations fom LANDesk (StaffSpace view)
     * @return JSON 
     */
    public function swh()
    {

    	$db = DB::connection('ldap');

    	$data = [];
        // get all locations from SP
        foreach (\DB::select('EXEC sp_Organisations;') as $attrs) {
            $data[] = new Location((array)$attrs);
        }

    	return $this->respondOK($data);;
    }
}
