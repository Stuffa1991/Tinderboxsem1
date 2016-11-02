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

	public function setSchedule()
	{
		return $this->id;
	}

	public function getSchedule($id)
	{
		return $this->schedule;
	}

	public function updateSchedule($id)
	{
		return $this->schedule;
	}	

	public function deleteSchedule($id)
	{
		return true;
	}

}
