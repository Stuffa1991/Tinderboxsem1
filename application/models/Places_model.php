<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places_model extends CI_Model {

	private $name; // int

	public function __construct()
	{
		parent::__construct();
	}

	public function getPlaces()
	{
		$query = 'SELECT name,placeid FROM places WHERE mode !="deleted"';
		$result = $this->db->query($query);

		return $result->row();
	}

}
