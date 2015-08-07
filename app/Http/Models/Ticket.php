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
		$esd = $this->getESD($id, $count);
		//$quemis = $this->getQuemis($id, $count);

		$tickets = $service_desk;

		return collect($tickets);
	}

	private function getServiceDesk($id, $count=false)
	{

		DB::connection('landesk');

		$rs = DB::select('EXEC sp_getTicketsById ?, ?', [$id, $count]);
		return $rs;	
	}

	private function getESD($id, $count=false)
	{
		$id = "KU39220";
		$db = env('DB_ESD_DATABASE');
		$user = env('DB_ESD_USERNAME');
		$pass = env('DB_ESD_PASSWORD');

    	$conn = oci_connect($user, $pass, $db);

    	if (!$conn) {
	        $e = oci_error();
	        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	    } else {

			$sql = 
				"SELECT * 
				FROM (
						SELECT 
							HCL.HCL_CODE as reference, 
							HCL.HCL_CRED, 
							'Ticket details withheld...' as summary, 
							CCS_NAME
						FROM HCL 
							INNER JOIN CCN on (CCN_CODE = HCL_CCNC) 
							INNER JOIN CCS ON (HCL.HCL_CCSC = CCS_CODE)
						WHERE CCN_CODE = '$id' 
						ORDER BY HCL.HCL_CODE DESC)
				WHERE ROWNUM <= 30)";

				$rs = oci_parse($conn, $sql);
        		oci_execute($rs);    

        		while ($row = oci_fetch_array($rs, OCI_ASSOC+OCI_RETURN_NULLS)) {
        			var_dump($row);
        			echo "<br><br><br>";
        		};
        }

		return true;		
	}

	private function getQuemis($id, $count=false)
	{
		$id = "KU39220";
		$db = env('DB_QMS_DATABASE');
		$user = env('DB_QMS_USERNAME');
		$pass = env('DB_QMS_PASSWORD');

    	$conn = oci_connect($user, $pass, $db);

    	if (!$conn) {
	        $e = oci_error();
	        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	    } else {

			$sql = 
				"SELECT * 
				FROM (
					SELECT  
						h.request_num as reference, 
						to_char(h.date_raised, 'dd/mm/yy hh:mi') as created_at,
						l.loc_ref as title, 
						h.desc_of_request as summary,  
						s.status as status, 
						'Quemis' as source 
					FROM ops_hd_help_desk h
						LEFT OUTER JOIN ops_hd_job j ON j.request_num=h.request_num
						LEFT OUTER JOIN sched_o_job_status s ON s.status_id=j.status_id
						INNER JOIN core_staff c ON c.staff_id=h.orig_staffid
						INNER JOIN bd_location l ON l.loc_id=h.loc_id
					WHERE 
						c.staff_number = '$id'
						AND (s.status <> '6 Work order finished ' AND s.status <> '7 Cancelled') 
					ORDER BY h.date_raised DESC) 
				WHERE ROWNUM <= 30";

				$rs = oci_parse($conn, $sql);
        		oci_execute($rs);    

        		while ($row = oci_fetch_array($rs, OCI_ASSOC+OCI_RETURN_NULLS)) {
        			var_dump($row);
        			echo "<br><br><br>";
        		};
        }

		return true;		
	}


}