<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}	

	public function login($email, $password)
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

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */