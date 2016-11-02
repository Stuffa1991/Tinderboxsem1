<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams_model extends CI_Model {
	
	private $teams = [];

	public function __construct()
	{
		parent::__construct();
	}

	public function getTeams()
	{
		return $this->teams;
	}

}
