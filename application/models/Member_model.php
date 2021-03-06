<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

	private $id; // int
	private $contactid;	// int
	private $name;	// string
	private $role;	// string
	private $created_at; // int
	private $language; // string
	private $mode; // string

	public function __construct()
	{
		parent::__construct();
		$this->lang->load('english_lang', 'english');
	}

	public function getMember($id)
	{
		$sth = $this->db->query("SELECT me.name, me.role, co.email, co.phone, co.mobile 
			FROM members AS me
			LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
			WHERE me.mode != 'deleted' 
			AND me.memberid = " . $this->db->escape($id) . "");

		$this->member = $sth->row();
		return $this->member;
	}
	
	public function setMember()
	{
		// Sets the contact field for now
		$query = sprintf('INSERT INTO contacts (email, phone, mobile) VALUES ("%s", "%s", "%s")', 
			$data['email'], $data['phone'], $data['mobile']);
		$this->db->query($query);

		$contactid = $this->db->insert_id();

		// Sets the member field
		$query = sprintf('INSERT INTO members (contactid, name, role, created_at) VALUES ("%s", "%s", "%s", "%s")', 
			$contactid, $data['name'], $data['role'], date('Y-m-d H:i:s'));
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) { 
			return $id;
		} 
		
		return false;
	}

	public function updateMember($id, $data = [])
	{	
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }	

		// If the member wants to create a new password
		if($data['password']) {
			// Encrypting the new password
			$encryptedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

			$query = sprintf('UPDATE members SET name = "%s", password = "%s" WHERE memberid = "%s"', 
				$data['name'], $encryptedPassword, $id);
			$this->db->query($query);
		} else {
			$query = sprintf('UPDATE members SET name = "%s" WHERE memberid = "%s"', 
				$data['name'], $id);
			$this->db->query($query);
		}

		$query = sprintf('SELECT contactid FROM members WHERE memberid = "%s"', $id);
		$result = $this->db->query($query);

		$result = $result->row();
		$contactid = $result->contactid;
		
		$query = sprintf('UPDATE contacts SET email = "%s", phone = "%s", mobile = "%s" WHERE contactid = "%s"',
			$data['email'], $data['phone'], $data['mobile'], $contactid);
		$result = $this->db->query($query);

		return true;
	}

	public function deleteMember($id)
	{
		// Validates that the content of the variable is an interfer. Return error if it is null or not interger.
		if($id === null) { $this->errors[] = 'id-not-set'; }

		if(!preg_match('/^[0-9]+$/', $id)) { $this->errors[] = 'id-not-int'; }

		// Sanitize wit a triming so theid cant contain any tags etc. Also we ensure it is converted to an interger
		$sanId = (int)trim(strip_tags($id));

		// Escape the vaue and ensure that it cant touch the database
		$noneTaintedId = $this->db->escape_str($sanId);

		if(count($this->errors) === 0) {

			$sth = sprintf("UPDATE members SET mode = 'deleted'  WHERE memberid = %d", $noneTaintedId);

			if($this->db->query($sth)) {
				return true;
			}
		}

		$this->errors[] = 'member-not-delete' . $id;
		return false;

		/* @TODO: NEED THIS? */
		$queryCheck = $this->db->affected_rows();
		if($queryCheck < 0)
		{
			return $this->lang->line('delete_user_error');
		} else {
			return $this->lang->line('delete_user_success');
		} 
	}

	public function acceptMember($id)
	{
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }	

		// Updates the member field
		$query = sprintf('UPDATE members SET mode = "active" WHERE memberid = "%s"', $id);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) {
			return $id;
		} 

		return false;
	}

	public function declineMember($id)
	{
		// If not an int, return false
		if(!is_int($id) && $id <= 0) { return false; }	

		// Updates the member field
		$query = sprintf('UPDATE members SET mode = "deleted" WHERE memberid = "%s"', $id);
		$this->db->query($query);

		// Get latest id
		$id = $this->db->insert_id();

		if(is_int($id) && $id > 0) {
			return $id;
		} 

		return false;
	}

	/*
	 * Method for login only
	 */
	public function getMemberByEmailPassword($email, $password)
	{
		$sth = sprintf('SELECT me.password, co.email
			FROM members AS me
			LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
			WHERE co.email = "%s" 
			AND me.password = "%s" 
			LIMIT 1',
			$email, $password
		);

		$result = $this->db->query($sth);
		return $result->row();
	}

}