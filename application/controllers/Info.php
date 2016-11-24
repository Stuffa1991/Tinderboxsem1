<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('info/index');
		$this->load->view('footer');
	}

	public function getInfo()
	{
		// Loads library method
		$this->method->method('GET');
		$this->load->model('Informations_model');

		// Loads library response
		$this->response->response(200, 'OK', $this->Informations_model->getInfos('info'));

		var_dump($this->Informations_model->getInfos('info'));
	}
}

/* End of file Info.php */
/* Location: ./application/controllers/Info.php */