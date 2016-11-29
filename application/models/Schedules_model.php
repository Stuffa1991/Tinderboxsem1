<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules_model extends CI_Model {

	private $schedules = []; // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function getSchedules($id)
	{

		$query = sprintf('SELECT fromtime, totime FROM schedules WHERE mode != "deleted" AND memberid = "%s"', $id);
		$result = $this->db->query($query);

		$this->schedules = $result->result();

		return $this->schedules;
	}

	public function getSchedulesByDay()
	{

	}

	public function getSchedulesByWeek()
	{

	}

}
