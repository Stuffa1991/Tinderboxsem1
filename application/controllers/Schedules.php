<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends CI_Controller {

	/*
	 * Construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->auth->handleLogin();
		$this->load->model('schedules_model');
		$this->load->model('schedule_model');
	}


	public function index()
	{
		$this->load->view('header');
		$this->load->view('schedules/index');
		$this->load->view('footer');
	}

	public function getSchedulesBy30days()
	{
		$memberid = $this->session->memberid;
		// Loads library response
		$this->response->response(200, 'OK', $this->schedules_model->getMemberSchedules30day($this->session->memberid));
	}

	public function getSchedulesBy7days()
	{
		$memberid = $this->session->memberid;
		// Loads library response
		$this->response->response(200, 'OK', $this->schedules_model->getMemberSchedules7day($this->session->memberid));
	}

}