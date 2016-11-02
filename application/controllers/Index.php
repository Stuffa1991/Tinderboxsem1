<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	private $user;
	
	/*
	 * Page index
	 */
	public function index()
	{
		$this->load->view('index/index');
	}

	/*
	 * Method to login
	 */
	public function login()
	{
		$this->load->library('auth');
	}

	public function user($id = null)
	{
		$this->load->model('member_model');

		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'POST':
				$userdata = file_get_contents('php://input');
				$userdata = json_decode($userdata);

				$this->member = [
					'firstname' => $userdata->firstname,
					'lastname'	=> $userdata->lastname,
					'password' => $userdata->password,
					'email'	=> $userdata->email
				];

				$this->member_model->set_user($this->user);

				break;
			case 'PUT':

			case 'DELETE':

			default:
				echo 'Get user profile i with id: ' . $id;
		}
	}

	public function secret_endpoint()
	{
		$this->load->library('auth');
		$this->auth->handleLogin();
	}


}
