<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules_model extends CI_Model {

	private $schedules = [] // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function getSchedules($memberid)
	{
		$sth = $this->db->query("SELECT fromtime, totime 
			FROM schedules 
			WHERE mode != 'deleted'
			AND memberid = %d", $memberid);
		
		$this->notes = $sth->result();
	}

	public function getSchedulesByDay()
	{

	}

	public function getSchedulesByWeek()
	{

	}

}
