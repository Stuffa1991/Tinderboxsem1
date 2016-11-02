<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->lang->load('english_lang', 'english');
	}

	public function index()
	{
		// $this->load->model('members_model');

		// $data['members'] = $this->members_model->getUsers();

		// $this->load->view('header');
		// $this->load->view('admin/index', $data);
		// $this->load->view('footer');
		echo $this->lang->line('test');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */