<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model {

	private $id; // int
	private $memberid; // int
	private $placeid; // int
	private $fromtime; // int
	private $totime; // int
	private $mode // string

	private $schedule = []; // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function getSchedule($id)
	{
		$query = sprintf('SELECT fromtime, totime FROM schedules WHERE scheduleid = "%s"', $id);
		$result = $this->db->query($query);

		return $result->row();
	}

	public function setSchedule($data = [])
	{
		$query = sprintf('INSERT INTO schedules (memberid, fromtime, totime) VALUES ("%s", "%s", "%s")', 
			$data['memberid'], $data['fromtime'], $data['totime']);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) { 
			return $id;
		} 
		
		return false;
	}

	public function updateSchedule($id, $data = [])
	{
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }	

		$query = sprintf('UPDATE schedules SET memberid = "%s", fromtime = "%s", totime = "%s" WHERE scheduleid = "%s"', $data['memberid'], $data['fromtime'], $data['totime'], $id);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) {
			return $id;
		} 

		return false;
	}	

	public function deleteSchedule($id)
	{
		// Validates that the content of the variable is an interfer. Return error if it is null or not interger.
		if($id === null) { $this->errors[] = 'id-not-set'; }

		if(!preg_match('/^[0-9]+$/', $id)) { $this->errors[] = 'id-not-int'; }

		// Sanitize wit a triming so theid cant contain any tags etc. Also we ensure it is converted to an interger
		$sanId = (int)trim(strip_tags($id));

		// Escape the vaue and ensure that it cant touch the database
		$noneTaintedId = $this->db->escape_str($sanId);

		if(count($this->errors) === 0) {

			$sth = sprintf("UPDATE schedules SET mode = 'deleted' WHERE scheduleid = %d", $noneTaintedId);

			if($this->db->query($sth)) {
				return true;
			}
		}

		$this->errors[] = 'schedule-not-delete' . $id;
		return false;
	}

	public function getErrors()
	{
		return $this->errors;
	}

}
