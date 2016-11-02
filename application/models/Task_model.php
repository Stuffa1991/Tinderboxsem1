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
		return $this->id;
	}

	public function getTask($id)
	{
		return $this->task;
	}

	public function updateTask($id)
	{
		return $this->task;
	}	

	public function deleteTask($id)
	{
		return true;
	}

}
