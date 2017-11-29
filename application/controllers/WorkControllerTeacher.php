<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkControllerTeacher extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('ClassModel');
        $this->load->model('WorkModel');

        if($this->session->userdata('login') == false){
            redirect(base_url("LoginController"));
        }

        if($this->session->userdata('teacher') != 1){
            redirect(base_url());            
        }
    }

    public function index(){
        $data['header_title'] = "Works";
        $user = $this->session->userdata();
        $msg['msg'] = $this->input->get('msg');

        $data['classes'] = $this->ClassModel->getAll();
        $data['workes'] = $this->WorkModel->getAll();
        
        $this->load->view('template/header', $data);
        $this->load->view('teacher/navbar');
        if($msg){
			$this->load->view('template/toast', $msg);
		}
        $this->load->view('work/listWork');
        $this->load->view('template/footer');
    }

    public function addWork(){
        $data['header_title'] = "Create Work";
        $user = $this->session->userdata();
        $msg['msg'] = $this->input->get('msg');

        $data['classes'] = $this->ClassModel->getAll();
        
        $this->load->view('template/header', $data);
        $this->load->view('teacher/navbar');
        if($msg){
			$this->load->view('template/toast', $msg);
		}
        $this->load->view('work/createWork');
        $this->load->view('template/footer');
    }

    public function createWork(){
        $work = array(
            "title_work" => $this->input->post('title_work'),
            "description_work" => str_replace("\n",'<br />', addslashes(htmlspecialchars($this->input->post('description_work')))),
            "dateCreation_work" => $this->WorkModel->date_now(),
            "dateSend_work" => $this->input->post('dateSend_work'),
            "class_id_class" => $this->input->post('class_id_class'),
            "teacher_user_id" => $this->session->userdata('id')
        );

        $query = $this->WorkModel->create($work);

        if($query['bool']){
            header("location: ".base_url('WorkControllerTeacher?msg='.$query['msg']));
        } else{
            header("location: ".base_url('WorkControllerTeacher/addWork?msg='.$query['msg']));            
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
}