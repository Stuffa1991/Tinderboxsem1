<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function setInfo($data = [])
	{
		$this->load->model('information_model');
		$this->information_model->setInfo($data);
	}

	public function getMembers()
	{
		$this->load->model('members_model');
		return $this->members_model->getMembers();
	}

}