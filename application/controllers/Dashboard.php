<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/*
	 * Construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->auth->handleLogin();
		$this->load->model('dashboard_model');
	}

	/*
	 * Page index
	 */
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('dashboard/index');
		$this->load->view('team/index');
		$this->load->view('team/member');
		$this->load->view('info/info');
		$this->load->view('info/news');
		$this->load->view('info/rules');
		$this->load->view('footer');
	}

	/*
	 * Method get the members team leader
	 */
	public function getTeamLeader()
	{
		// Loads library method
		$this->method->method('GET');
		
		// Loads library response
		$this->response->response(200, 'OK', $this->dashboard_model->getTeamLeader($this->session->memberid));
	}

	/*
	 * Method get schedules
	 */
	public function getSchedules()
	{	
		// Loads library method
		$this->method->method('GET');

		// Loads library response
		$this->response->response(200, 'OK', $this->dashboard_model->getSchedules($this->session->memberid));
	}

	/*
	 * Method get news
	 */
	public function getNews()
	{
		// Loads library method
		$this->method->method('GET');

		// Loads library response
		$this->response->response(200, 'OK', $this->dashboard_model->getNews());
	}	


}