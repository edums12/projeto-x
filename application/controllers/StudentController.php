<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('ClassModel');

        if($this->session->userdata('login') == false){
            redirect(base_url("LoginController"));
        }

        if($this->session->userdata('teacher') != 0){
            redirect(base_url());            
        }
    }

    public function index(){
        $data['header_title'] = "Page Student";
        $data['user'] = $this->session->userdata();
        $data['classes'] = $this->ClassModel->getAllClassesStudent();
        $msg['msg'] = $this->input->get('msg');
        
        $this->load->view('template/header', $data);
        $this->load->view('student/navbar');
        if($msg){
			$this->load->view('template/toast', $msg);
		}
        $this->load->view('student/index', $data);
        $this->load->view('template/footer');
    }
}