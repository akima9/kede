<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function DBtest(){
        $query = $this->db->query("SELECT user_code, user_id, user_pw, category_yn, cr_date, update_date, use_yn FROM kede.t_users");
        return $query->result_array();
    }

    // 회원 가입 SQL
    public function add_user($res){
        $this->db->set('user_id', $res['user_id']);
        $this->db->set('user_pw', $res['user_pw']);
        $this->db->set('category_yn', 'Y');
        $this->db->set('cr_date', 'NOW()', false);
        $this->db->set('update_date', 'NOW()', false);
        $this->db->set('use_yn', 'Y');
        $this->db->set('user_level', 'U');
        $result = $this->db->insert('t_users');
        return $result;
    }
}