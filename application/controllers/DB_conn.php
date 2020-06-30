<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_conn extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}
	
	public function index()
	{
		$result = $this->db->query('select * from t_users')->result_array();
        var_dump($result);
	}
}
