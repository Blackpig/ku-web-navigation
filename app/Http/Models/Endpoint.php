<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model{

	use \App\Http\Traits\LayoutTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = null;
	protected $connection = 'landesk';

	public function scopeOrganisations()
	{
		$db = self::Connection();

		$endpoints = [];
		$i = 0;

        foreach (\DB::select('EXEC sp_Organisations;') as $rs) 
        {
            $rs->color = self::assignColour($i);
            $endpoints[] = $rs;
            $i++;
        }

		return collect($endpoints);
	}

	public function scopeOrganisationEndpoints($query, $guid)
	{
		$db = self::Connection();

		$endpoints = [];

        foreach (\DB::select('EXEC sp_Organisation_Endpoints ?,?', [$guid,'0']) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
        
            $endpoints[] = $rs;
        }

        $endpoints = self::arrangeToLayout($guid, $endpoints);

		return collect($endpoints);
	}

	public function scopeOrganisationServiceGroupEndpoints($query, $guid, $organisation_guid)
	{
		$db = self::Connection();

		$endpoints = [];

        foreach (\DB::select('EXEC sp_OrgServiceGroup_Endpoints ?,?', [$guid, $organisation_guid]) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
            $endpoints[] = $rs;
        }

		$endpoints = self::arrangeToLayout($guid, $endpoints);

		return collect($endpoints);
	}

	public function scopeChannels()
	{
		$db = self::Connection();

		$endpoints = [];
		$i = 0;

        foreach (\DB::select('EXEC sp_Channels;') as $rs) 
        {
            $rs->color = self::assignColour($i);
            $endpoints[] = $rs;
            $i++;
        }

		return collect($endpoints);
	}

	public function scopeChannelEndpoints($query, $guid)
	{
		$db = self::Connection();

		$endpoints = [];

        foreach (\DB::select('EXEC sp_Channel_ServiceGroups ?', [$guid]) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
            $endpoints[] = $rs;
        }

        foreach (\DB::select('EXEC sp_Channel_Endpoints ?', [$guid]) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
            $endpoints[] = $rs;
        }

        $endpoints = self::arrangeToLayout($guid, $endpoints);

		return collect($endpoints);
	}

	public function scopeChannelServiceGroupEndpoints($query, $guid)
	{
		$db = self::Connection();

		$endpoints = [];

        foreach (\DB::select('EXEC sp_ChanServiceGroup_Endpoints ?', [$guid]) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
            $endpoints[] = $rs;
        }

        $endpoints = self::arrangeToLayout($guid, $endpoints);

		return collect($endpoints);
	}

	public function scopeAllEndpoints()
	{
		$db = self::Connection();

		$endpoints = [];

        $rs = \DB::select('EXEC sp_getAllEndpoints');
        
		return collect($rs[0]);

	}

	public function scopeForReview($d=false)
	{
		$days = (!$d) ? env('ENDPOINT_REVIEW_DAYS', -14) : $d;

		$db = self::Connection();

		$endpoints = [];

        $rs = \DB::select('EXEC sp_getEndpointsForReview ?', [$days]);
        
		return collect($rs[0]);

	}


	public function scopeType($query, $guid)
	{
		$db = self::Connection();
		$rs = \DB::select('EXEC sp_getObjectTypeByGUID ?', [$guid]);

		
		if ($rs[0]->type == 'web nav organisation / channel') return 1;
		if ($rs[0]->type == 'web nav service group') return 2;
		
		return false;

	}

	public function scopeOrganisation($query,$guid)
	{
		$db = self::Connection();
		$rs = \DB::select('EXEC sp_getOrganisationByGUID ?', [$guid]);

		return $rs[0];

	}

	public function scopeServiceGroup($query, $guid)
	{ 
		$db = self::Connection();
		$rs = \DB::select('EXEC sp_getServiceGroupByGUID ?', [$guid]);
		
		return $rs[0];

	}

	public function scopeSearch($query, $term, $staff_only)
	{
		$db = self::Connection();

		$endpoints = [];
 		
 		foreach (\DB::select('EXEC sp_searchEndpoints ?, ?', [urldecode($term), $staff_only]) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
            $endpoints[] = $rs;
        }

		return collect($endpoints);

	}

	private static function assignColour($i=0) 
	{

		$colours = ["red", "orange", "yellow", "green", "blue", "purple", "pink"];
		$modulus = count($colours);

		$idx = $i%$modulus;

		return $colours[$idx];

	}

	private static function Connection()
	{
		return \DB::connection('landesk');
	}
}