<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informations_model extends CI_Model {

	private $infos = []; // Array
	private $rules = []; // Array
	private $news = []; // Array 

	public function __construct()
	{
		parent::__construct();
	}

	public function getInfos($type)
	{
		$sth = $this->db->query("SELECT *
			FROM informations
			WHERE type = '$type'
			AND mode != 'deleted'");

		$this->infos = $sth->result();
		return $this->infos;
	}

}
