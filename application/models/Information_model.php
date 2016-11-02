<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information_model extends CI_Model {

	private $id; // int
	private $memberid; // string
	private $imageid; // int
	private $mobile; // int
	private $type; // string
	private $title; // string
	private $text; // string
	private $createdat; // int
	private $updateat; // int
	private $mode; // string

	public function __construct()
	{
		parent::__construct();
	}

	public function setInfo($type)
	{

	}

	public function getInfo($id, $type)
	{

	}

	public function updateInfo($id, $type)
	{

	}

	public function deleteInfo($id, $type)
	{
		
	}

}
