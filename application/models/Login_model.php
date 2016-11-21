<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}	

	public function login($email, $password)
	{

		$encryptedPassword = $this->encryption->encrypt($password);

		$sth = sprintf('SELECT me.password, co.email
			FROM members AS me
			LEFT JOIN contacts AS co ON (co.contactid = me.contactid)
			WHERE co.email = "%s" 
			AND me.password = "%s" 
			LIMIT 1',
			$email, $encryptedPassword
		);

		$result = $this->db->query($sth);
		return $result->row();
	}
	
	public function registerUser($data = [])
	{
		//Insert new contact
		$sth = sprintf('INSERT INTO contacts
			(Email)
			VALUES
			("%s")',
			$data['email']
		);

		//Execute query
		$result = $this->db->query($sth);

		//Get id from latest executed query
		$contactId = $this->db->insert_id();

		$date = date('Y-m-d H:i:s');
		$password = $data['password'];

		$encryptedPassword = $this->encryption->encrypt($password);

		//Iniate new member
		$sth = sprintf('INSERT INTO members
			(contactid,name, password, role, created_at, language, mode)
			VALUES
			("%s", "%s", "%s", "user", "%s","en_US", "pending" )
			',
			$contactId, $data['name'], $encryptedPassword, $date
		);

		$result = $this->db->query($sth);

		return TRUE;
	}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */