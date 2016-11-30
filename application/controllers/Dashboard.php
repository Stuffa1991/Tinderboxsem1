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
		$this->load->library('form_validation');
	}

	/*
	 * Page index
	 */
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/edit');
		$this->load->view('team/index');
		$this->load->view('team/member');
		$this->load->view('info/info');
		$this->load->view('info/news');
		$this->load->view('info/rules');
		$this->load->view('footer');
	}

	/*
	 * Method to get own informations
	 */
	public function getOwnInfo()
	{
		// Loads library method
		$this->method->method('GET');

		// Loads library response
		$this->response->response(200, 'OK', $this->dashboard_model->getOwnInfo($this->session->memberid));
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
	public function getStaff()
	{
		// Loads library method
		$this->method->method('GET');

		// Loads library response
		$this->response->response(200, 'OK', $this->dashboard_model->getStaff());
	}

	/*
	 * Method to edit a members information
	 */
	public function editMember()
	{
		$this->method->method('POST');

		$postData = file_get_contents('php://input');

		//make an array to store in
		$post = [];
		//store serialized data to array
		parse_str($postData, $post);

		// Set your rules
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]');
		$this->form_validation->set_rules('repeatPassword', 'Password', 'min_length[8]|matches[password]');
		

		if ($this->form_validation->run() == TRUE) {  
		  //This means it works we can continue the script hooray
		} else { 
			$this->response->response(200, 'OK', validation_errors());
		} 

		$data = [
			'name' => $post['name'],
			'email' => $post['email'],
			'phone' => $post['phone'],
			'mobile' => $post['mobile'],
			'password' => $post['password']
		];

		$res = $this->response->response(200, 'OK', $this->dashboard_model->updateMember($this->session->memberid, $data));
		//$res = $this->member_model->updateMember($this->session->memberid, $data);

		if($res === false) {
			$this->response->response(200, 'OK', $res);
		} else {
			$this->response->response(200, 'OK', $res);
		}
	}

}