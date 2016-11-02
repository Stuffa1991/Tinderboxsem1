<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

	private $id; // int
	private $email; // string
	private $phone; // int
	private $mobile; // int

	private $contacts[] // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function setContacts()
	{
		return $this->$id;
	}

	public function getContacts($id)
	{
		return $this->$contacts;
	}

	public function updateContacts($id)
	{
		return $this->contacts;
	}	

}
