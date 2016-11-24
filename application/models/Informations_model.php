<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informations_model extends CI_Model {

	private $infos = []; // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function getInfos($type)
	{
<<<<<<< HEAD
		$query = sprintf('SELECT * FROM informations WHERE type = "%s" AND mode != "deleted"', $type);
		$result = $this->db->query($query);

		$this->infos = $result->result();
=======
		$sth = $this->db->query('SELECT * FROM informations WHERE type = "info" AND mode != "deleted"', $type);
		$this->infos = $sth->result();
>>>>>>> d7b7328784deb5450fb83cf7bfad63b225ef9a8f
		
		return $this->infos;
	}

}
