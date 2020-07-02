<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestUserController extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	
	public function user_dupe_check(){
		$data['user_id'] = $this->input->post('user_id');

		$this->load->model('User_model');
		$result['status'] = $this->User_model->search_user($data);
		echo json_encode($result);
	}
}
