<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auth->handleLogin();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */