<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model {

	private $members = []; // Array

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUsers()
	{
		$sth = $this->db->query("SELECT me.name, me.role, co.email, co.phone, co.mobile 
			FROM members AS me
			LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
			WHERE me.mode != 'deleted'");

		$this->members = $sth->result();
		return $this->members;
	}
}