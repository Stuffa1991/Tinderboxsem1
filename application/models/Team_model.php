<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_model extends CI_Model {

	private $id; // int
	private $name; // string
	private $mode; // string

	public function __construct()
	{
		parent::__construct();
	}

	public function setTeam()
	{
		return $this->id;
	}

	public function getTeam($id)
	{

	}

	public function updateTeam($id)
	{

	}

	public function deleteTeam($id)
	{

	}

}
