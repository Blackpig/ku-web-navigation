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

		$i = 0;

        foreach (\DB::select('EXEC sp_Organisations;') as $rs) 
        {
            $endpoints[] = self::composeEndpoint($rs, $i);
            $i++;
        }

		return $endpoints;
	}

	public static function Channels()
	{
		$db = \DB::connection('landesk');

		$i = 0;

        foreach (\DB::select('EXEC sp_Channels;') as $rs) 
        {
            $endpoints[] = self::composeEndpoint($rs, $i);
            $i++;
        }

		return $endpoints;
	}

	public static function OrganisationEndpoints($guid)
	{
		$db = \DB::connection('landesk');

		$i = 0;

		$endpoints = [];

        foreach (\DB::select('EXEC sp_Organisation_Endpoints ?,?', [$guid,'1']) as $rs) 
        {
            $endpoints[] = $rs;
            $i++;
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

	private static function composeEndpoint($rs, $i)
	{
			$ep = new Endpoint();

            $ep->guid = $rs->guid;
            $ep->title = $rs->name;
            $ep->desc = $rs->description;
            $ep->icon = $rs->{"Icon name"};
            $ep->target_type = "fa-th";
            $ep->color = self::assignColour($i);
            $ep->type = "service-group";

            return $ep;
	}

	private static function assignColour($i=0) 
	{

		$colours = ["red", "orange", "yellow", "green", "blue", "purple", "pink"];
		$modulus = count($colours);

		$idx = $i%$modulus;

		return $colours[$idx];

	}
}