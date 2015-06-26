<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = null;
	protected $connection = 'landesk';

	public static function Organisations()
	{
		$db = self::Connection();

		$endpoints = [];
		$i = 0;

        foreach (\DB::select('EXEC sp_Organisations;') as $rs) 
        {
            $rs->color = self::assignColour($i);
            $endoints[] = $rs;
            $i++;
        }

		return $endoints;
	}

	public static function Channels()
	{
		$db = self::Connection();

		$endpoints = [];
		$i = 0;

        foreach (\DB::select('EXEC sp_Channels;') as $rs) 
        {
            $rs->color = self::assignColour($i);
            $endoints[] = $rs;
            $i++;
        }

		return $endpoints;
	}

	public static function OrganisationEndpoints($guid)
	{
		$db = self::Connection();

		$endpoints = [];

        foreach (\DB::select('EXEC sp_Organisation_Endpoints ?,?', [$guid,'0']) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
            $endpoints[] = $rs;
        }

		return $endpoints;
	}

	public static function OrganisationServiceGroupEndpoints($guid, $organisation_guid)
	{
		$db = self::Connection();

		$endpoints = [];

        foreach (\DB::select('EXEC sp_OrgServiceGroup_Endpoints ?,?', [$guid, $organisation_guid]) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
            $endpoints[] = $rs;
        }
dd($endpoints);
		return $endpoints;
	}

	public static function Type($guid)
	{
		$db = self::Connection();
		$rs = \DB::select('EXEC sp_getObjectTypeByGUID ?', [$guid]);

		
		if ($rs[0]->type == 'web nav organisation / channel') return 1;
		if ($rs[0]->type == 'web nav service group') return 2;
		
		return false;

	}

	public static function Organisation($guid)
	{
		$db = self::Connection();
		$rs = \DB::select('EXEC sp_getOrganisationByGUID ?', [$guid]);

		return $rs[0];

	}

	public static function ServiceGroup($guid)
	{
		$db = self::Connection();
		$rs = \DB::select('EXEC sp_getServiceGroupByGUID ?', [$guid]);
		
		return $rs[0];

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