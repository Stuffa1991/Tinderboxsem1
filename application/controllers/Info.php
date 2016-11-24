<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

	/*
	 * Construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->auth->handleLogin();

		// Loads library method
		$this->method->method('GET');
		$this->load->model('Informations_model');
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
	 * Method get infos
	 */
	public function getInfos()
	{
		// Loads library response
		$this->response->response(200, 'OK', $this->Informations_model->getInfos('info'));
	}

	/*
	 * Method get rules
	 */
	public function getRules()
	{
		// Loads library response
		$this->response->response(200, 'OK', $this->Informations_model->getInfos('rules'));
	}
}