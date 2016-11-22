<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams_model extends CI_Model {
	
	private $teams = [];

	public function __construct()
	{
		parent::__construct();
	}

	public function getTeams()
	{
		$query = $this->db->query("SELECT teamid, name FROM teams  WHERE mode != 'deleted'");
		$this->teams = $query->result();

		return $this->teams;
	}

}
