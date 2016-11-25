<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getMembers()
	{
		$this->load->model('members_model');
		return $this->members_model->getMembers();
	}

	public function getPendingMembers()
	{
		$this->load->model('members_model');
		return $this->members_model->getPendingMembers();
	}

	public function acceptMember($id)
	{
		$this->load->model('member_model');
		$this->member_model->acceptMember($id);
	}

	public function declineMember($id)
	{
		$this->load->model('member_model');
		$this->member_model->declineMember($id);
	}

	public function getMemberInfo($id)
	{
		$this->load->model('member_model');
		return $this->member_model->getMember($id);
	}

	public function setInfo($data = [])
	{
		$this->load->model('information_model');
		$this->information_model->setInfo($data);
	}
	
}