<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules_model extends CI_Model {

	private $schedules = []; // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function getSchedules($id)
	{

		$query = "SELECT DATE_FORMAT(fromtime,'%W') AS day,DATE_FORMAT(fromtime,'%k.%i') AS fromtime, DATE_FORMAT(totime,' %k.%i') AS totime FROM schedules WHERE mode != 'deleted' AND memberid = $id AND (totime > NOW()+INTERVAL 7 DAY OR fromtime > NOW()+INTERVAL 7 DAY)";
		$result = $this->db->query($query);

		$this->schedules = $result->result();

		return $this->schedules;
	}

	public function getMemberSchedules7day($id)
	{
		$query = "SELECT DATE_FORMAT(fromtime,'%W') AS day,DATE_FORMAT(fromtime,'%d %M %k.%i') AS fromtime, DATE_FORMAT(totime,'%k.%i') AS totime FROM schedules WHERE memberid = $id AND (totime > NOW()+INTERVAL 7 DAY OR fromtime > NOW()+INTERVAL 7 DAY)";

		$result = $this->db->query($query);

		$numRows = $result->num_rows();

		if($numRows <= 0)
		{
			return false;
		}
		else
		{
			$this->schedules = $result->result();

			return $this->schedules;
		}
	}

	public function getMemberSchedules30day($id)
	{
		$query = "SELECT DATE_FORMAT(fromtime,'%W') AS day,DATE_FORMAT(fromtime,'%D %M %Y') AS fromtime FROM schedules WHERE memberid = $id AND (totime > NOW()+INTERVAL 7 DAY OR fromtime > NOW()+INTERVAL 7 DAY)";
		$result = $this->db->query($query);

		$numRows = $result->num_rows();

		if($numRows <= 0)
		{
			return false;
		}
		else
		{
			$this->schedules = $result->result();

			return $this->schedules;
		}
	}

}
