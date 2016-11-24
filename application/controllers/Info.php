<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

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
		$this->load->view('header');
		$this->load->view('info/index');
		$this->load->view('footer');
	}

	/*
	 * Method get info
	 */
	public function getInfo()
	{
		// Loads library method
		$this->method->method('GET');
		$this->load->model('Informations_model');

		// Loads library response
		$this->response->response(200, 'OK', $this->Informations_model->getInfos('info'));
	}
}

/* End of file Info.php */
/* Location: ./application/controllers/Info.php */