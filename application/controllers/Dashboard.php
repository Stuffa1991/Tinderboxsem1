<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/*
	 * Construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->auth->handleLogin();
	}

	/*
	 * Page index
	 */
	public function index()
	{	
		// Loads library method
		$this->method->method('GET');
		$this->load->model('team_model');
		
		// Loads library response
		$this->response->response(200, 'OK', $this->team_model->getTeamLeader(Session::get('memberid')));

		$this->load->view('header');
		$this->load->view('dashboard/index');
		$this->load->view('footer');
	}
}