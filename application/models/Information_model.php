<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information_model extends CI_Model {

	private $id; // int
	private $memberid; // string
	private $imageid; // int
	private $mobile; // int
	private $type; // string
	private $title; // string
	private $text; // string
	private $createdat; // int
	private $updateat; // int
	private $mode; // string

	public function __construct()
	{
		parent::__construct();
	}


	public function getInfo($id, $type)
	{
		$query = sprintf('SELECT imageid, title, `text` FROM informations 
			WHERE informationid = "%s" AND mode != `deleted` AND type = "%s"', $id, $type);
		$result = $this->db->query($query);

		return $result->row();
	}

	public function setInfo($type, $data = [])
	{
		$query = sprintf('INSERT INTO informations (memberid, imageid, type, title, `text`, created_at) 
			VALUES ("%s", "%s", "%s","%s", "%s", "%s")', 
			$data['memberid'], $data['imageid'], $data['type'], $data['title'], $data['text'], date('Y-m-d H:i:s'));
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) { 
			return $id;
		} 
		
		return false;
	}

	public function updateInfo($id)
	{
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }	

		$query = sprintf('UPDATE informations SET type = "%s", title = "%s", `text` = "%s", mode = "%s" 
			WHERE informationid = "%s"', $data['type'], $data['title'], $data['text'], $data['mode'], $id);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) {
			return $id;
		} 

		return false;
	}

	public function deleteInfo($id)
	{
		// Validates that the content of the variable is an interfer. Return error if it is null or not interger.
		if($id === null) { $this->errors[] = 'id-not-set'; }

		if(!preg_match('/^[0-9]+$/', $id)) { $this->errors[] = 'id-not-int'; }

		// Sanitize wit a triming so theid cant contain any tags etc. Also we ensure it is converted to an interger
		$sanId = (int)trim(strip_tags($id));

		// Escape the vaue and ensure that it cant touch the database
		$noneTaintedId = $this->db->escape_str($sanId);

		if(count($this->errors) === 0) {

			$sth = sprintf("UPDATE informations SET mode = 'deleted' WHERE informationid = %d", $noneTaintedId);

			if($this->db->query($sth)) {
				return true;
			}
		}

		$this->errors[] = 'information-not-delete' . $id;
		return false;
	}

	public function getErrors()
	{
		return $this->errors;
	}

}
