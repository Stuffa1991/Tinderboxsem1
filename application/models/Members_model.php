<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model {

	private $members[]; // Array

	public function __construct()
	{
		parent::__construct();
		
	}


	public function getUsers()
	{
		$result = $this->db->query('SELECT `id`, `title`, `datetime` 
			FROM notes 
			WHERE `datetime` > 0
			ORDER BY `datetime` DESC ');

		$this->notes = $result->result();
		return $this->members;
	}
}

/* End of file Members_model.php */
/* Location: ./application/models/Members_model.php */