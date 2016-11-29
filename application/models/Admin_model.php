<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getTeams()
	{
		$this->load->model('teams_model');
		return $this->teams_model->getTeams();
	}
	
	public function setTeam($data = [])
	{
		$this->load->model('team_model');
		$this->team_model->setTeam($data);
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

	public function getSchedules($id)
	{
		$this->load->model('schedules_model');
		$this->schedules_model->getSchedules($id);
	}

	public function setSchedule($data = [])
	{
		$this->load->model('schedule_model');
		$this->schedule_model->setSchedule($data);
	}
	
	public function getTeamLeaders()
	{
		$this->load->model('team_model');
		return $this->team_model->getTeamLeaders();
	}

	public function setPlace($data = [])
	{
		$this->load->model('place_model');
		return $this->place_model->setPlace($data);
	}

	public function getPlaces()
	{
		$this->load->model('places_model');
		return $this->places_model->getPlaces();
	}
}