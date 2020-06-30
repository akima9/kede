<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('community/post_list');
		$this->load->view('common/footer');
	}

	public function addPost()
	{
		$this->load->view('common/header');
		$this->load->view('community/add_post');
		$this->load->view('common/footer');
	}

	public function register(){
		$this->load->view('common/header');
		$this->load->view('user/register');
		$this->load->view('common/footer');
	}

	public function login(){
		$this->load->view('common/header');
		$this->load->view('user/login');
		$this->load->view('common/footer');
	}

	public function register_form(){

		// 회원가입 폼 유효성 검사
		$this->form_validation->set_rules('user-id', '아이디', 'required|alpha_dash|min_length[5]|max_length[12]',
			array(
				'required'=>'아이디를 입력해주세요.',
				'alpha_dash'=>'아이디는 알파벳, 숫자, 밑줄(_), 대시(-) 만을 사용해주세요.',
				'min_length'=>'아이디는 최소 5자 이상을 입력해주세요.',
				'max_length'=>'아이디는 최대 12자 이하를 입력해주세요.')
			);
		$this->form_validation->set_rules('dupe-check', '아이디 중복확인', 'required',
			array(
				'required'=>'아이디 중복확인을 해주세요.')
			);
		$this->form_validation->set_rules('user-pw', '비밀번호', 'required|matches[pw-conf]|min_length[5]|max_length[12]',
			array(
				'required'=>'비밀번호를 입력해주세요.',
				'matches'=>'비밀번호가 같지 않습니다.',
				'min_length'=>'비밀번호는 최소 5자 이상을 입력해주세요.',
				'max_length'=>'비밀번호는 최대 12자 이하를 입력해주세요.')
			);
		$this->form_validation->set_rules('pw-conf', '비밀번호 재입력', 'required',
			array(
				'required'=>'비밀번호 재입력을 해주세요.')
			);
		
		if ($this->form_validation->run() == FALSE){ // 유효성 검사에 통과하지 못한 경우
			
			$this->load->view('common/header');
			$this->load->view('user/register');
			$this->load->view('common/footer');

		}else{ // 유효성 검사에 통과한 경우
			
			$data['user_id'] = $this->input->post('user-id');
			$data['user_pw'] = password_hash($this->input->post('user-pw'), PASSWORD_BCRYPT);

			$this->load->model('User_model');
			$result = $this->User_model->add_user($data);

			if($result){ // 회원가입 성공
				redirect('/');
			}else{ // 회원가입 실패
				redirect('/ci/Main/register');
			}

		}
	}

	public function dbtest(){
		$this->load->model('User_model');
		$data['users'] = $this->User_model->DBtest();
		$this->load->view('test/dbtest',$data);
	}
}
