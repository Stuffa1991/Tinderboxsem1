<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/*
	 * Method to get own informations
	 */
	public function getOwnInfo($id)
	{
		$this->load->model('member_model');
		return $this->member_model->getMember($id);
	}

	/*
	 * Method to get the members team leader
	 */
	public function getTeamLeader($id)
	{
		$this->load->model('team_model');
		return $this->team_model->getTeamLeader($id);
	}

	/*
	 * Method to get the members schedules
	 */
	public function getSchedules($id)
	{
		$this->load->model('schedules_model');
		return $this->schedules_model->getSchedules($id);
	}

	/*
	 * Method to get news
	 */
	public function getNews()
	{
		$this->load->model('informations_model');
		return $this->informations_model->getInfos('news');
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */