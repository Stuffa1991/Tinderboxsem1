<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informations_model extends CI_Model {

	private $infos = []; // Array
	private $rules = []; // Array
	private $news = []; // Array 

	public function __construct()
	{
		parent::__construct();
	}

	public function getInfos()
	{
		$sth = $this->db->query("SELECT *
			FROM informations
			WHERE type = 'info'
			AND mode != 'deleted'");

		$this->infos = $sth->result();
		return $this->infos;
	}

	public function getRules()
	{
		$sth = $this->db->query("SELECT *
			FROM informations
			WHERE type = 'rules'
			AND mode != 'deleted'");

		$this->rules = $sth->result();
		return $this->rules;
	}

	public function getNews()
	{
		$sth = $this->db->query("SELECT *
			FROM informations
			WHERE type = 'news'
			AND mode != 'deleted'");

		$this->news = $sth->result();
		return $this->news;
	}

}
