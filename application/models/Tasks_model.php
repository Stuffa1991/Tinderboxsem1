<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks_model extends CI_Model {

	private $tasks = []; // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function getTasks($id)
	{
		$query = $this->db->query('SELECT ta.name, ta.fromtime, ta.totime, pl.name as place
			FROM tasks AS ta 
			WHERE ta.memberid = "%s"
			AND ta.mode != `deleted`
		', $id);
		$this->tasks = $query->result();

		return $this->tasks;
	}

	public function getAllTasks()
	{
		$query = $this->db->query('SELECT ta.taskid, ta.name, ta.fromtime, ta.totime, pl.name as place
				FROM tasks AS ta
				LEFT JOIN places AS pl ON (ta.placeid = pl.placeid)
				WHERE ta.mode != "deleted"');
		$this->tasks = $query->result();

		return $this->tasks;
	}

	public function getTasksByDay()
	{

	}

	public function getTasksByWeek()
	{

	}

}
