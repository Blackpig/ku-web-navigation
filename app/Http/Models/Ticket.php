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
		$service_desk = $self->getServiceDesk($id, $count);
		$service_desk = self::getServiceDesk($id, $count);
		$service_desk = static::getServiceDesk($id, $count);

		$tickets = $service_desk;

		return collect($tickets);
	}

	private function getServiceDesk($id, $count=30)
	{
		DB::connection('landesk');
		return true;



		
	}
}