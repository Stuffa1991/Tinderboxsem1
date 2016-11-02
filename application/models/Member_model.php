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
		
	}

	public function setUser()
	{
		return $this->$id;
	}

	public function getUser($id)
	{
		return;
	}

	public function updateUser($id, $data)
	{
		return;
	}

	public function deleteUser($id)
	{
		return;
	}
}

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */