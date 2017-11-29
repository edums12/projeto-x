<?php
defined('BASEPATH') OR exit('No direction script access loaded');

class UserModel extends CI_Model{
    private $table = "user";

    public function create($data){
        $user = $this->getUserByEmail($data['email_user']);
        if(count($user) == 0){
            if($this->db->insert($this->table, $data)){
                return $msg = array(
                    "bool" => true,
                    "msg" => "Usuário cadastrado com sucesso!"
                );
            } else{
                return $msg = array(
                    "bool" => false,
                    "msg" => "Erro ao cadastrar usuário!"
                );
            }
        } else{
            return $msg = array(
                "bool" => false,
                "msg" => "Esse email já foi cadastrado!"
            );
        }
    }

    public function getUserByEmail($email){
        $this->db->where('email_user', $email);
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function loginUser($email, $password){
        $this->db->where('email_user', $email);
        $this->db->where('password_user', $password);
        $query = $this->db->get($this->table)->row();
        
        if(count($query)==1){
            return $msg = array(
                "bool" => true,
                "query" => $query
            ); 
        } else{
            return $msg = array(
                "bool" => false,
                "msg" => "Usuário e/ou senha inválidos!"
            ); 
        }
    }

    public function getAllStudentsByClass($id){
        $this->db->select('*');
        $this->db->where('user.teacher_user', 0);
        $this->db->join('user_has_class', 'id_user = user_id_user');
        $this->db->join('class', 'class_id_class = id_class');
        $this->db->where('id_class', $id);
        return $this->db->get($this->table)->result();
    }
}