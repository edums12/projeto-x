<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassControllerStudent extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('ClassModel');
        $this->load->model('WorkModel');

        if($this->session->userdata('login') == false){
            redirect(base_url("LoginController"));
        }

        if($this->session->userdata('teacher') != 0){
            redirect(base_url());            
        }
    }

    public function joinClass(){
        $data = array(
            "number_class" => $this->input->post('cod'),
            "id_user" => $this->session->userdata('id')
        );

        $query = $this->ClassModel->joinClass($data);

        if($query['bool']){
            header("location: ".base_url('StudentController?msg='.$query['msg']));
        } else{
            header("location: ".base_url('StudentController?msg='.$query['msg']));            
        }
    }

    public function openTheClass($id){
        $data['class'] = $this->ClassModel->getOne($id);
        $data['workes'] = $this->WorkModel->getAllByClassId($id);

        $data['header_title'] = "Class " . $data['class']->name_class;

        $msg['msg'] = $this->input->get('msg');
        
        $this->load->view('template/header', $data);
        $this->load->view('student/navbar');
        if($msg){
			$this->load->view('template/toast', $msg);
		}
        $this->load->view('class/viewClassStudent', $data);
        $this->load->view('template/footer');
    }

    public function deleteClass($id){
        $data = array(
            "user_id_user" => $this->session->userdata('id'),
            "class_id_class" => $id
        );

        $query = $this->ClassModel->leaveClass($data);

        if($query['bool']){
            header("location: ".base_url('StudentController?msg='.$query['msg']));
        } else{
            header("location: ".base_url('StudentController?msg='.$query['msg']));            
        }
    }
}