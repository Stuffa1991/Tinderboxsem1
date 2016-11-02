<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

	private $id; // int
	private $contactid;	// int
	private $name;	// string
	private $role;	// string
	private $created_at; // int
	private $mode; // string

	public function __construct()
	{
		parent::__construct();
		$this->lang->load('english_lang', 'english');
	}

	public function setMember()
	{
		return $this->$id;
	}

	public function getMember($id)
	{
		$sth = $this->db->query("SELECT me.name, me.role, co.email, co.phone, co.mobile 
			FROM members AS me
			LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
			WHERE me.mode != 'deleted' 
			AND me.memberid = " . $this->db->escape($id) . "");

		$this->member = $sth->result();
		return $this->member;
	}

	public function updateMember($id, $data)
	{
		return;
	}

	public function deleteMember($id)
	{
		$sth = $this->db->query("UPDATE members 
			SET mode = 'deleted' 
			WHERE memberid = " . $this->db->escape($id) . "");

		$queryCheck = $this->db->affected_rows();
		if($queryCheck < 0)
		{
			return $this->lang->line('delete_user_error');
		} else {
			return $this->lang->line('delete_user_success');
		}
	}
}

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */