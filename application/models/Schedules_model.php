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

	public function getMemberSchedules7day($id)
	{
		$query = sprintf('SELECT fromtime, totime FROM schedules WHERE memberid = "%s" AND (totime > NOW()+INTERVAL 7 DAY OR fromtime > NOW()+INTERVAL 7 DAY)', $id);
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
		$query = sprintf('SELECT fromtime, totime FROM schedules WHERE memberid = "%s" AND (totime > CURDATE()+INTERVAL 30 DAY OR fromtime > NOW()+INTERVAL 30 DAY)', $id);
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
