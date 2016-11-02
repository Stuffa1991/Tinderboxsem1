<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function login($email, $pwd)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $pwd);
        $query = $this->db->get('users');
		return $query->result();
	}
	

	public function getUserByEmailPassword($email, $password)
	{
		$query = sprintf('SELECT * FROM USERS
			WHERE email = "%s" AND password = "%s" LIMIT 1',
			$email, $password
		);

		$result = $this->db->query($query);
		return $result->row();
	}
	
	// // Get a user
	// public function get_userById($id)
	// {
	// 	$this->db->where('uid', $id);
 //        $query = $this->db->get('users');
	// 	return $query->result();
	// }
	
	// // Insert new user
	// public function insert_user($data)
 //    {
	// 	return $this->db->insert('users', $data);
	// }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */