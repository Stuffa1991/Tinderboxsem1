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
	 * Page info
	 */
	public function info()
	{
		$this->load->view('header');
		$this->load->view('admin/info');
		$this->load->view('footer');
	}

	/*
	 * Page members
	 */
	public function members()
	{
		$this->load->view('header');
		$this->load->view('admin/members');
		$this->load->view('footer');
	}

	/*
	 * Page info
	 */
	public function teams()
	{
		$this->load->view('header');
		$this->load->view('admin/teams');
		$this->load->view('footer');
	}

	/**
	 * Page Schedules
	 */
	public function schedules()
	{
		$this->load->view('header');
		$this->load->view('admin/schedules');
		$this->load->view('footer');
	}

	/**
	 * Page Task
	 */
	public function tasks()
	{
		$this->load->view('header');
		$this->load->view('admin/tasks');
		$this->load->view('footer');
	}

	/**
	 * Page Places
	 */
	public function Places()
	{
		$this->load->view('header');
		$this->load->view('admin/places');
		$this->load->view('footer');
	}

	/*
	 * Method get teams
	 */
	public function getTeams()
	{	
		// Loads library response
		$this->response->response(200, 'OK', $this->admin_model->getTeams());
	}

	/*
	 * Method set team
	 */	public function setTeam()
	{	
		$this->method->method('POST');

		$postData = file_get_contents('php://input');

		//make an array to store in
		$post = [];
		//store serialized data to array
		parse_str($postData, $post);

		$data = $this->admin_model->setTeam([
			'teamleaderid' => $post['teamleader'],
			'name' => $post['name']
		]);

		if($data === false) {
			$this->response->response(400, 'Bad Request', 'Shit');
		} else {
			$this->response->response(200, 'OK', $data->id);
		}
	}

	/*
	 * Method get team leaders
	 */
	public function getTeamLeaders()
	{
		// Loads library response
		$this->response->response(200, 'OK', $this->admin_model->getTeamLeaders());
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

	/*
	 * Method to get schedules
	 */
	public function getSchedules()
	{
		//
	}

	/*
	 *
	 */
	public function setSchedule()
	{
		$this->method->method('POST');

		$postData = file_get_contents('php://input');

		//make an array to store in
		$post = [];
		//store serialized data to array
		parse_str($postData, $post);

		$dateStart = html_entity_decode($post['dateStart']);
		$dateEnd = html_entity_decode($post['dateEnd']);

		$data = $this->admin_model->setSchedule([
			'memberid'	=> $post['memberScheduleId'],
			'fromtime' => $dateStart,
			'totime'	=> $dateEnd
		]);

		if($data === false) {
			$this->response->response(400, 'Bad Request', 'Not allowed');
		} else {
			$this->response->response(200, 'OK', $data);
		}
	}

	/**
	 * Create new task
	 */
	public function setTask()
	{
		$this->method->method('POST');

		$postData = file_get_contents('php://input');

		//make an array to store in
		$post = [];
		//store serialized data to array
		parse_str($postData, $post);

		$dateStart = html_entity_decode($post['dateStart']);
		$dateEnd = html_entity_decode($post['dateEnd']);

		$data = $this->admin_model->setTask([
			'fromtime' => $dateStart,
			'totime' => $dateEnd,
			'memberid' => $post['memberTaskId'],
			'name' => $post['name'],
			'place' => $post['placeId']
		]);

		if($data === false) {
			$this->response->response(400, 'Bad Request', 'Not allowed');
		} else {
			$this->response->response(200, 'OK', $data);
		}
	}

	public function setPlace()
	{
		$this->method->method('POST');

		$postData = file_get_contents('php://input');

		//make an array to store in
		$post = [];
		//store serialized data to array
		parse_str($postData, $post);

		$data = $this->admin_model->setPlace([
			'name' => $post['name']
		]);

		if($data === false) {
			$this->response->response(400, 'Bad Request', 'Not allowed');
		} else {
			$this->response->response(200, 'OK', $data);
		}
	}

	public function deletePlace($id)
	{
		$this->method->method('DELETE');

		if($this->admin_model->deletePlace($id))
		{
			$response = 'deleted';
		}
		else
		{
			$response = 'notdeleted';
		}

		$this->response->response(200, 'OK', $response);
	}

	public function getPlaces()
	{
		// Loads library response
		$this->response->response(200, 'OK', $this->admin_model->getPlaces());
	}

}