<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		$this->load->library('form_validation');
		$this->load->model('login_model');
		$this->load->helper('url');
	}

	public function index()
	{
		//Get $_POST from FORM
		$email = $this->input->post('email');
		$password = $this->input->post('password');

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
			//Find the the user via the model
			$user = $this->login_model->login($email, $password);
			var_dump($user);
			if(count($user))
			{
				//If there is 1 or more results returned --- should only be one
				$sess_data = array(
					'login' => TRUE, 
					'email' => $user[0]->email, 
					'userid' => $user[0]->userid, 
					'name' => $user[0]->name
				);

				$this->session->set_userdata($sess_data);

				header('location: /tinderbox/dashboard');
				//redirect('/dashboard/');
			} else {
				//The user cant be found in the database
				// redirect('/');
				echo 'hehj';
				//Ex.
				// $this->load->view('login_view', [
				// 	'error' => 'Login not found',
				// ]);
			}
		}
	}

	public function reset()
	{


		$this->load->view('header');
		$this->load->view('index/reset');
		$this->load->view('footer');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */