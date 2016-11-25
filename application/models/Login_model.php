<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}	

	public function login($email, $password)
	{
		$sth = sprintf('SELECT me.memberid, me.password, co.email
		FROM members AS me
		LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
		WHERE co.email = "%s" 
		LIMIT 1',
		$email
		);

		$result = $this->db->query($sth);

		$result_row = $result->row();

		if (password_verify($password, $result_row->password)) {
		    return $result_row;
		} else {
		    return 'Password is wrong';
		}
	}
	
	public function registerUser($data = [])
	{

		$sth = sprintf('SELECT co.email
			FROM members AS me
			LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
			WHERE co.email = "%s" AND me.mode != "deleted"', 
			$data['email']);
		$result = $this->db->query($sth);

		$alreadyExist = $result->row();

		if(count($alreadyExist))
		{
			//User already exists
			return 'User already exists';
		}
		else
		{
			//Go on user doesnt exist
		}

		//Insert new contact
		$sth = sprintf('INSERT INTO contacts (Email) VALUES ("%s")', $data['email']);

		//Execute query
		$result = $this->db->query($sth);

		//Get id from latest executed query
		$contactId = $this->db->insert_id();

		$date = date('Y-m-d H:i:s');
		$password = $data['password'];

		$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

		//Iniate new member
		$sth = sprintf('INSERT INTO members
			(contactid,name, password, role, created_at, language, mode)
			VALUES
			("%s", "%s", "%s", "user", "%s","en_US", "pending" )
			',
			$contactId, $data['name'], $encryptedPassword, $date
		);

		$result = $this->db->query($sth);

		return 'User created';
	}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */