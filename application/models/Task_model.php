<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model {

	private $id; // int
	private $memberid; // int
	private $placeid; // int
	private $teamid; // int
	private $name; // string
	private $fromtime; // int
	private $totime; // int
	private $mode // string

	private $task = [] // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function setTask()
	{
		$query = sprintf('INSERT INTO places (name) VALUES ("%s")', $data['name']);
		$this->db->query($query);

		$id = $this->db->insert_id();

		$query = sprintf('INSERT INTO tasks (placeid, name, fromtime, totime) VALUES ("%s", "%s", "%s", "%s")', 
			$id, $data['name'], $data['fromtime'], $data['totime']);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) { 
			return $id;
		} 
		
		return false;
	}

	public function getTask($id)
	{
		$query = sprintf('SELECT taskid, name, fromtime, totime FROM tasks WHERE taskid = "%s"', $id);
		$result = $this->db->query($query);

		return $result->row();
	}

	public function updateTask($id)
	{
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }	

		$query = sprintf('UPDATE tasks SET name = "%s", fromtime = "%s", totime = "%s" 
			WHERE taskid = "%s"', $data['name'], $data['fromtime'], $data['totime'] $id);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) {
			return $id;
		} 

		return false;
	}	

	public function deleteTask($id)
	{
		// Validates that the content of the variable is an interfer. Return error if it is null or not interger.
		if($id === null) { $this->errors[] = 'id-not-set'; }

		if(!preg_match('/^[0-9]+$/', $id)) { $this->errors[] = 'id-not-int'; }

		// Sanitize wit a triming so theid cant contain any tags etc. Also we ensure it is converted to an interger
		$sanId = (int)trim(strip_tags($id));

		// Escape the vaue and ensure that it cant touch the database
		$noneTaintedId = $this->db->escape_str($sanId);

		if(count($this->errors) === 0) {

			$sth = sprintf("UPDATE tasks SET mode = 'deleted' WHERE taskid = %d", $noneTaintedId);

			if($this->db->query($sth)) {
				return true;
			}
		}

		$this->errors[] = 'task-not-delete' . $id;
		return false;
	}

	public function getErrors()
	{
		return $this->errors;
	}
}
