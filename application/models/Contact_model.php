<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

	private $id; // int
	private $email; // string
	private $phone; // int
	private $mobile; // int

	private $contact = [] // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function setContact()
	{
		return $this->id;
	}

	public function getContact($id)
	{
		return $this->contacts;
	}

	public function updateContact($id)
	{
		return $this->contacts;
	}	

}
