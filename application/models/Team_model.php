<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_model extends CI_Model {

	private $id; // int
	private $name; // string
	private $mode; // string

	private $members = [];
	private $teamleaders = [];

	public function __construct()
	{
		parent::__construct();
	}

	public function getTeam($id)
	{
		$query = sprintf('SELECT teamid, name FROM teams WHERE teamid = "%s"', $id);
		$result = $this->db->query($query);

		return $result->row();
	}

	public function setTeam($data = [])
	{
		$query = sprintf('INSERT INTO teams (teamleaderid, name) VALUES ("%s", "%s")', $data['teamleaderid'], $data['name']);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) { 
			return $id;
		} 
		
		return false;
	}

	public function updateTeam($id, $data = [])
	{	
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }	

		$query = sprintf('UPDATE teams SET name = "%s" WHERE teamid = "%s"', $data['name'], $id);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) {
			return $id;
		} 

		return false;
	}

	public function deleteTeam($id)
	{
		// Validates that the content of the variable is an interfer. Return error if it is null or not interger.
		if($id === null) { $this->errors[] = 'id-not-set'; }

		if(!preg_match('/^[0-9]+$/', $id)) { $this->errors[] = 'id-not-int'; }

		// Sanitize wit a triming so theid cant contain any tags etc. Also we ensure it is converted to an interger
		$sanId = (int)trim(strip_tags($id));

		// Escape the vaue and ensure that it cant touch the database
		$noneTaintedId = $this->db->escape_str($sanId);

		if(count($this->errors) === 0) {

			$sth = sprintf("UPDATE teams SET mode = 'deleted' WHERE teamid = %d", $noneTaintedId);

			if($this->db->query($sth)) {
				return true;
			}
		}

		$this->errors[] = 'team-not-delete' . $id;
		return false;
	}

	public function getTeamLeader($id)
	{
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }	

		$query = sprintf('SELECT me.name,co.email,co.phone,co.mobile
		 FROM teams AS te
		 LEFT JOIN members AS me ON (me.memberid = te.teamleaderid)
		 LEFT JOIN contacts AS CO ON (co.contactid = me.contactid)
		 LEFT JOIN teams_has_members AS thm ON (thm.teamid = te.teamid)
		 WHERE thm.memberid = "%s"', $id);
		$result = $this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) {
			return $id;
		} 

		return $result->row();
	}

	public function getTeamMembers($id)
	{
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }

		$query = sprintf('SELECT teamid FROM teams_has_members WHERE memberid = "%s"', $id);
		$result = $this->db->query($query);

		$teamid = $result->row();

		$query = sprintf('SELECT te.teamid, me.memberid, me.name 
			FROM teams_has_members AS thm 
			LEFT JOIN members AS me ON (me.memberid = thm.memberid) 
			LEFT JOIN contacts AS co ON (co.contactid = me.memberid) 
			LEFT JOIN teams AS te on (te.teamid = thm.teamid) 
			WHERE thm.teamid = "%s"', $teamid->teamid);
		$result = $this->db->query($query);

		$this->members = $result->result();

		return $this->members;
	}

	public function getTeamLeaders()
	{
		$query = sprintf('SELECT memberid, name FROM members WHERE teamleader = 1');
		$result = $this->db->query($query);

		$this->teamleaders = $result->result();

		return $this->teamleaders;
	}

	public function getErrors()
	{
		return $this->errors;
	}

}
