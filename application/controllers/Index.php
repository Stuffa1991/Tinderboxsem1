<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	private $user;
	
	public function index()
	{
		$this->load->view('index/index');
	}

	public function login()
	{
		$this->load->library('auth');
	}

	public function user($id = null)
	{
		$this->load->model('user_model');

		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'POST':
				$userdata = file_get_contents('php://input');
				$userdata = json_decode($userdata);

				$this->user = [
					'firstname' => $userdata->firstname,
					'lastname'	=> $userdata->lastname,
					'password' => $userdata->password,
					'email'	=> $userdata->email
				];

				$this->user_model->set_user($this->user);

				break;
			case 'PUT':

			case 'DELETE':

			default:
				echo 'Get user profile i with id: ' . $id;
		}
	}

	public function secret_endpoint()
	{
		$this->load->library('auth_lib');
		$this->auth_lib->handle_login();
		echo 'tada';
	}


}
