<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {

	/*
	 * Construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->auth->handleLogin();
		$this->load->model('team_model');
	}

	/*
	 * Page index
	 */
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('team/index');
		$this->load->view('footer');
	}

	/*
	 * Method get the team
	 */
	public function getTeam()
	{
		// Loads library method
		$this->method->method('GET');
		
		// Loads library response
		$this->response->response(200, 'OK', $this->team_model->getTeamMembers($this->session->memberid));
	}

	/*
	 * Method get a team members information
	 */
	public function getTeamMemberInfo($id)
	{
		// Loads library method
		$this->method->method('GET');

		// Loads library response
		$this->response->response(200, 'OK', $this->team_model->getTeamMemberInfo($id));
	}


}