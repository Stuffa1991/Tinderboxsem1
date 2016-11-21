<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $member;
	
	/*
	* Construct
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation', 'method'));
		$this->load->model('login_model');
		$this->load->helper('url'); 
	}

	/*
	 * Page index
	 */
	public function index()
	{
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
	 * Page register
	 */
	public function register()
	{
		$loggedIn = $this->session->login;

		if($loggedIn){
			redirect('/dashboard');
			die();
		}

		//If the form validation isnt being runned
		$this->load->view('header');
		$this->load->view('login/register');
		$this->load->view('footer');
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
		} 
		else 
		{
			return FALSE;
		}
	}

	/*
	 * Method to logout
	 */
	public function logout()
	{

		// // @TODO Do not sess_destroy but set the data to NULL or ZERO
		// $this->session->sess_destroy();
		// redirect('/');
		// die();
	}

	/*
	 * Method to register user
	 */
	public function registerUser()
	{
		$this->method->method('POST');

		$postData = file_get_contents('php://input');

		//make an array to store in
		$post = [];
		//store serialized data to array
		parse_str($postData, $post);

		// Set your rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[1]');
		$this->form_validation->set_rules('repeatPassword', 'Password', 'required|min_length[1]|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]');

		if ($this->form_validation->run() == TRUE) {  
		  //This means it works we can continue the script hooray
		}
		else 
		{ 
		  $this->output
			->set_header('HTTP/1.1 200 OK')
			->set_header('Content-Type: application/json')
			->set_output(json_encode([
				'status' => 200,
				'statusCode' => 'Validation Error',
				'response' => validation_errors()
				]))
			->_display();

		die();
		} 

		$res = $this->login_model->registerUser([
			'email' => $post['email'],
			'name' => $post['name'],
			'password' => $post['password']
		]);

		if($res === false)
		{
			$this->output
			->set_header('HTTP/1.1 400 Bad Request')
			->set_header('Content-Type: application/json')
			->set_output(json_encode([
				'status' => 400,
				'statusCode' => 'Bad Request',
				'response' => $res
				]))
			->_display();

			//$this->auth->response(200, 'OK', $this->note_model->getNote($safeId));

		die();
		} 
		else 
		{
			$this->output
			->set_header('HTTP/1.1 200 OK')
			->set_header('Content-Type: application/json')
			->set_output(json_encode([
				'status' => 200,
				'statusCode' => 'OK',
				'response' => $res
				]))
			->_display();

		die();
		}
	}

}