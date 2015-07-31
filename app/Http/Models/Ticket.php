<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ticket extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = null;
	protected $connection = '';

	public function scopeSummary($query, $id, $count)
	{
	
		$service_desk = $this->getServiceDesk($id, $count);
		/*$esd = $this->getESD($id, $count);
		$quemis = $this->getQuemis($id, $count);*/

		$tickets = $service_desk;

		return collect($tickets);
	}

	private function getServiceDesk($id, $count=false)
	{
		DB::connection('landesk');

		$rs = DB::select('EXEC sp_getTicketsByID ?, ?', [$id, $count]);
		dd($rs);
		return $rs[0];	
	}

	private function getESD($id, $count=false)
	{
		DB::connection('landesk');
		return true;		
	}

	private function getQuemis($id, $count=false)
	{
		DB::connection('landesk');
		return true;		
	}


}