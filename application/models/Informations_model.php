<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informations_model extends CI_Model {

	private $infos = []; // Array

	public function __construct()
	{
		parent::__construct();
	}

	public function getInfos($type)
	{
		$query = sprintf('SELECT *, DATE_FORMAT(informations.created_at,\'%%D %%M %%Y\') AS created_at FROM informations WHERE type = "%s" AND mode != "deleted"', $type);
		$result = $this->db->query($query);

		$this->infos = $result->result();

		return $this->infos;
	}

}
