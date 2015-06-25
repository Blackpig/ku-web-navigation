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
		$db = \DB::connection('landesk');

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
		$db = \DB::connection('landesk');

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
		$db = \DB::connection('landesk');

		$endpoints = [];

        foreach (\DB::select('EXEC sp_Organisation_Endpoints ?,?', [$guid,'0']) as $rs) 
        {
            $rs->color = ($rs->color) ? $rs->color : self::assignColour(mt_rand(0,6));
            echo $rs->color."<br>";
            $endoints[] = $rs;
        }

		return $endpoints;
	}

	public static function Parents()
	{
		$parents = [
			"guid" => '',
			"label" => ''
		];

		return $parents;
	}

	private static function assignColour($i=0) 
	{

		$colours = ["red", "orange", "yellow", "green", "blue", "purple", "pink"];
		$modulus = count($colours);

		$idx = $i%$modulus;

		return $colours[$idx];

	}
}