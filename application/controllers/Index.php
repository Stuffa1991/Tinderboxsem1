<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	private $member;
	
	/*
	* Construct
	*/
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('auth');
		$this->load->library('form_validation');
		$this->load->model('login_model');
		$this->load->helper('url'); 
		//$this->auth->handleLogin();
	}

	/*
	 * Page index
	 */
	public function index()
	{
		//Set form rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		if($this->form_validation->run() === FALSE)
		{
			//If the form validation isnt being runned
			$this->load->view('header');
			$this->load->view('index/index');
			$this->load->view('footer');
		}
		else
		{
			//Get $_POST from FORM
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->login($email,$password);
		}
	}

	/*
	 * Method to login
	 */
	public function login($email,$password)
	{
		//Find the the member via the model
		$member = $this->login_model->getMemberByEmailPassword($email, $password);
		if(count($member))
		{
			//If there is 1 or more results returned --- should only be one
			$sess_data = array(
				'login' => TRUE, 
				'email' => $member[0]->email, 
				'memberid' => $member[0]->memberid, 
				'name' => $member[0]->name
			);

			$this->session->setData($sess_data);

			header('location: /tinderbox/dashboard');
		} else {
			return FALSE;
		}
	}

}
