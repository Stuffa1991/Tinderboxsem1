<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function setInfo($type, $data = [])
	{
		$this->load->model('Information_model');
		$sth = sprintf('INSERT ')
		$result =
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */