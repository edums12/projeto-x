<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->model("UserModel");
	}

	public function index()
	{
		$data['header_title'] = "Login";
		$msg['msg'] = $this->input->get('msg');
		
		$this->load->view('template/header', $data);
		if($msg){
			$this->load->view('template/toast', $msg);
		}
		$this->load->view('user/login');
		$this->load->view('template/footer');
	}

	public function createAcountView(){
		$data['header_title'] = "Crie uma conta";
		$msg['msg'] = $this->input->get('msg');

		$this->load->view('template/header', $data);
		if($msg){
			$this->load->view('template/toast', $msg);
		}
		$this->load->view('user/create_account');
		$this->load->view('template/footer');
	}

	public function createUser(){
		$data = array(
			"name_user" => $this->input->post('name'),
			"email_user" => $this->input->post('email'),
			"password_user" => md5($this->input->post('password')),
			"teacher_user" => $this->input->post('pro')
		);

		$query = $this->UserModel->create($data);

		if($query['bool']){
			redirect(base_url('LoginController'));
		} else{
			header("location: ".base_url('LoginController/createAcountView?msg='.$query['msg']));		
		}
	}

	public function access(){
		$data = array(
			"email_user" => $this->input->post('email'),
			"password_user" => md5($this->input->post('password'))
		);

		$query = $this->UserModel->loginUser($data['email_user'], $data['password_user']);
		if($query['bool']){
			$userSession = array(
				"id" => $query['query']->id_user,
				"name" => $query['query']->name_user,
				"email" => $query['query']->email_user,
				"teacher" => intval($query['query']->teacher_user),
				"login" => true,
			);
			$this->session->set_userdata($userSession);

			if($userSession['teacher'] == 1){
				redirect(base_url("ClassController"));
			} else{
				redirect(base_url("StudentController"));
			}

		} else{
			header("location: ".base_url('LoginController?msg='.$query['msg']));
		}
	}

	public function destroyAccess(){
		$this->session->sess_destroy();
		redirect(base_url("LoginController"));
	}
}
