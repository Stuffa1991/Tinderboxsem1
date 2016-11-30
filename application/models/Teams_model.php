<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams_model extends CI_Model {
	
	private $teams = [];
	private $members = [];

	public function __construct()
	{
		parent::__construct();
	}

	public function getTeams()
	{

		//Get all teams
		$query = $this->db->query('SELECT me.memberid, me.name , te.teamid,te.name AS teamname FROM members AS me INNER JOIN teams AS te ON (me.memberid = te.teamleaderid)
				WHERE me.mode != "deleted" 
				ORDER by te.teamid ASC');
		$this->teams = $query->result();

		return $this->teams;
	}

	public function getTeamMembers()
	{
		//Get all members
		$query = $this->db->query('SELECT me.memberid, me.name, thm.teamid, te.teamleaderid, te.name AS teamname FROM members AS me 
				LEFT JOIN teams_has_members AS thm ON (me.memberid = thm.memberid) 
				INNER JOIN teams AS te on (thm.teamid = te.teamid) 
				WHERE me.mode != "deleted" 
				ORDER by me.memberid ASC');
		$this->members = $query->result();

		return $this->members;
	}

}
