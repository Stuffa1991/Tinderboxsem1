<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $member;
	
	/*
	* Construct
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('login_model');
		$this->load->helper('url'); 
	}

	/*
	 * Page index
	 */
	public function index()
	{
		$loggedIn = $this->session->login;

		if($loggedIn){
			redirect('/dashboard');
			die();
		}

		//Set form rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[1]');

		if($this->form_validation->run() === FALSE)
		{
			//If the form validation isnt being runned
			$this->load->view('header');
			$this->load->view('login/index');
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
		$member = $this->login_model->login($email, $password);
		if(count($member))
		{
			//If there is 1 or more results returned --- should only be one
			$sess_data = array(
				'login' => TRUE, 
				'email' => $member->email
			);

			$this->session->set_userdata($sess_data);

			redirect('/dashboard/');
		} else {
			return FALSE;
		}
	}

	public function logout()
	{
		// @TODO Do not sess_destroy but set the data to NULL or ZERO
		$this->session->sess_destroy();
		redirect('/');
		die();
	}

	/*
	 * Register
	 */
	public function registerUser()
	{
		$loggedIn = $this->session->login;

		if($loggedIn){
			redirect('/dashboard');
			die();
		}

		//Set form rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[1]');

		if($this->form_validation->run() === FALSE)
		{
			//If the form validation isnt being runned
			$this->load->view('header');
			$this->load->view('login/register');
			$this->load->view('footer');
		}
		else
		{
			//Get $_POST from FORM
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$repeatPassword = $this->input->post('repeatPassword');
			$name = $this->input->post('name');

			if($password != $repeatPassword) {
				echo'Password not same';
				return FALSE;
			}

			$data = array(
		        'email'		=>	$email,
		        'password' 	=>	$password,
		        'name'		=>	$name
		    );

			$this->login_model->registerUser($data);
		}
	}

	public function register()
	{
		//If the form validation isnt being runned
		$this->load->view('header');
		$this->load->view('login/register');
		$this->load->view('footer');
	}

}