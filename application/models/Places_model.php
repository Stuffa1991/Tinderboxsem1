<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places_model extends CI_Model {

	private $places;

	public function __construct()
	{
		parent::__construct();
	}

	public function getPlaces()
	{
		$sth = 'SELECT name,placeid FROM places WHERE mode !="deleted"';
		$result = $this->db->query($sth);

		$this->places= $result->result();

		return $this->places;
	}

}
