<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model {

	private $members = []; // Array

	public function __construct()
	{
		parent::__construct();
		
	} 

	public function getMembers()
	{
		$sth = $this->db->query('SELECT me.memberid, me.name, me.role, co.email, co.phone, co.mobile 
			FROM members AS me
			LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
			WHERE me.mode != "deleted"
			AND me.mode != "pending"');

		$this->members = $sth->result();
		return $this->members;
	}

	public function getPendingMembers()
	{
		$sth = $this->db->query('SELECT me.memberid, me.name, me.role, co.email, co.phone, co.mobile 
			FROM members AS me
			LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
			WHERE me.mode = "pending"');

		$this->members = $sth->result();
		return $this->members;
	}
}