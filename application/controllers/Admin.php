<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	/*
	 * Page index
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('admin/index');
		$this->load->view('footer');
	}

	/*
	 * Page setInfo
	 */
	public function members()
	{
		$this->load->view('header');
		$this->load->view('admin/members');
		$this->load->view('footer');
	}

	/*
	 * Page setInfo
	 */
	public function info()
	{
		$this->load->view('header');
		$this->load->view('admin/info');
		$this->load->view('footer');
	}

	/*
	 * Method get members
	 */
	public function getMembers()
	{	
		// Loads library response
		$this->response->response(200, 'OK', $this->admin_model->getMembers());
	}

	/*
	 * Method get pending members
	 */
	public function getPendingMembers()
	{	
		// Loads library response
		$this->response->response(200, 'OK', $this->admin_model->getPendingMembers());
	}

	/*
	 * Method to get member informations
	 */
	public function getMemberInfo($id)
	{
		$this->response->response(200, 'OK', $this->admin_model->getMemberInfo($id));
	}

	/*
	 * Method to accept a membership request
	 */
	public function acceptMember($id)
	{	
		// Loads library response
		$this->response->response(200, 'OK', $this->admin_model->acceptMember($id));
	}

	/*
	 * Method to decline a membership request
	 */
	public function declineMember($id)
	{	
		// Loads library response
		$this->response->response(200, 'OK', $this->admin_model->declineMember($id));
	}

	/*
	 * Method set info
	 */
	public function setInfo()
	{
		$this->method->method('POST');

		$postData = file_get_contents('php://input');

		//make an array to store in
		$post = [];
		//store serialized data to array
		parse_str($postData, $post);

		$data = $this->admin_model->setInfo([
			'memberid' => $this->session->memberid,
			'type'	=> $post['type'],
			'title' => $post['title'],
			'text'	=> $post['text'],
			'time'	=> date('Y-m-d H:i:s')
		]);

		if($data === false) {
			$this->response->response(400, 'Bad Request', 'Shit');
		} else {
			$this->response->response(200, 'OK', $data->id);
		}
	}

}