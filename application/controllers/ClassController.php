<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassController extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('ClassModel');
        $this->load->model('UserModel');

        if($this->session->userdata('login') == false){
            redirect(base_url("LoginController"));
        }

        if($this->session->userdata('teacher') != 1){
            redirect(base_url());            
        }
    }

    public function index(){
        $data['header_title'] = "Page Teacher";
        $user = $this->session->userdata();
        
        $this->load->view('template/header', $data);
        $this->load->view('teacher/navbar');
        $this->load->view('teacher/index', $user);
        $this->load->view('template/footer');
    }

    public function addClass(){
        $data['header_title'] = "Create Class";
        $user = $this->session->userdata();
        $msg['msg'] = $this->input->get('msg');
        
        $this->load->view('template/header', $data);
        $this->load->view('teacher/navbar');
        if($msg){
			$this->load->view('template/toast', $msg);
		}
        $this->load->view('class/createClass');
        $this->load->view('template/footer');
    }

    public function createClass(){
        $class = array(
            "name_class" => $this->input->post('name'),
            "teacher_user_id" => $this->session->userdata('id'),
            "cover_bg" => $this->upload_anexo('cover_bg')
        );

        $query = $this->ClassModel->create($class);
        if($query['bool']){
            header("location: ".base_url('ClassController/listClass?msg='.$query['msg']));
        } else{
            header("location: ".base_url('ClassController/addClass?msg='.$query['msg']));            
        }
    }

    public function upload_anexo($name_form_anexo){
        //Anexo
        $name = $_FILES[$name_form_anexo]['name'];
        $route = $_FILES[$name_form_anexo]['tmp_name'];
        $type = $_FILES[$name_form_anexo]['type'];

        $archive = $route;
        $local_dir = './upload_anexos/';
        $new_name = $this->session->userdata('id').$name;

        if(!is_dir($local_dir)){
            mkdir($local_dir, 0777, true);
        }

        $destiny = $local_dir . $new_name;
        move_uploaded_file($archive, $destiny);

        return $destiny;
    }

    public function listClass(){
        $data['header_title'] = "Class";
        $user = $this->session->userdata();
        $msg['msg'] = $this->input->get('msg');

        $data['classes'] = $this->ClassModel->getAll();
        
        $this->load->view('template/header', $data);
        $this->load->view('teacher/navbar');
        if($msg){
			$this->load->view('template/toast', $msg);
		}
        $this->load->view('class/ListClass', $data);
        $this->load->view('template/footer');
    }

    public function viewClass($id){
        $data['header_title'] = "View Class";
        $user = $this->session->userdata();
        $msg['msg'] = $this->input->get('msg');

        $data['class'] = $this->ClassModel->getOne($id);
        $data['students'] = $this->UserModel->getAllStudentsByClass($id);
        
        $this->load->view('template/header', $data);
        $this->load->view('teacher/navbar');
        if($msg){
			$this->load->view('template/toast', $msg);
		}
        $this->load->view('class/viewClassTeacher', $data);
        $this->load->view('template/footer');
    }

    public function deleteStudent($idStudent, $idClass){
        $dados = array(
            "user_id_user" => $idStudent,
            "class_id_class" => $idClass
        );

        $query = $this->ClassModel->leaveClass($dados);
        if($query['bool']){
            redirect(base_url("ClassController/viewClass/$idClass"));
        } else{
            redirect(base_url("ClassController/viewClass/$idClass"));            
        }
    }

    public function editClass($id){
        $data['header_title'] = "Edit Class";
        $user = $this->session->userdata();
        $msg['msg'] = $this->input->get('msg');

        $data['class'] = $this->ClassModel->getOne($id);
        
        $this->load->view('template/header', $data);
        $this->load->view('teacher/navbar');
        if($msg){
			$this->load->view('template/toast', $msg);
		}
        $this->load->view('class/editClass', $data);
        $this->load->view('template/footer');
    }

    public function editClassForm(){
        $class = array(
            "id_class" => $this->input->post('id'),
            "name_class" => $this->input->post('name'),
        );

        $query = $this->ClassModel->update($class);

        if($query['bool']){
            header("location: ".base_url('ClassController/listClass?msg='.$query['msg']));
        } else{
            header("location: ".base_url('ClassController/editClass?msg='.$query['msg']));
        }
    }

    public function deleteClass($id){
        $query = $this->ClassModel->delete($id);

        if($query['bool']){
            header("location: ".base_url('ClassController/listClass?msg='.$query['msg']));
        } else{
            header("location: ".base_url('ClassController/listClass?msg='.$query['msg']));
        }
    }

    public function joinClass(){
        $class = array(
            "number_class" => $this->input->post('cod')
        );

        $user_has_class = array(
            "id_user" => $this->session->userdata('id')
        );

        var_dump($class);
        var_dump($user_has_class);
    }
}