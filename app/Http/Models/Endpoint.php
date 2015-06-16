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

	public function Organisations()

		$db = \DB::connection();

		$i = 0;

        foreach (\DB::select('EXEC sp_Organisations;') as $rs) 
        {
            $endpoints[] = $this->composeEndpoint($rs, $i);
            $i++;
        }

		return $endpoints;
	}

	public function Channels()

		$db = \DB::connection();

		$i = 0;

        foreach (\DB::select('EXEC sp_Organisations;') as $rs) 
        {
            $endpoints[] = $this->composeEndpoint($rs, $i);
            $i++;
        }

		return $endpoints;
	}

	private function composeEndpoint($rs, $i)
	{
			$ep = new Endpoint();

            $ep->guid = $rs->guid;
            $ep->title = $rs->name;
            $ep->desc = $rs->description;
            $ep->icon = $rs->{"Icon name"};
            $ep->target_type = "fa-th";
            $ep->color = $this->assignColour($i);
            $ep->type = "service-group";

            return $ep;
	}

	private function assignColour($i=0) 
	{

		$colours = ["red", "orange", "yellow", "green", "blue", "purple", "pink"];
		$modulus = count($colours);

		$idx = $i%$modulus;

		return $colours[$idx];

	}
}