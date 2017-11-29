<?php
defined('BASEPATH') OR exit('No direction script access loaded');

class WorkModel extends CI_Model{
    private $table = "work";

    public function encryption($id){
        $datestring = '%h%m%d';
        $time = time();
        $date = mdate($datestring, $time);
        
        $string = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'Y', 'X', 'Z');

        $char = $string[rand(0, (sizeof($string) - 1))];
        $char2 = $string[rand(0, (sizeof($string) - 1))];

        $encript = $char.$date.$id.$char2;

        return $encript;
    }

    public function date_now(){
        $datestring = '%d/%m/%y %H:%i';
        $time = time();
        return mdate($datestring, $time);
    }

    public function create($data){
        if($this->db->insert($this->table, $data)){
            return $msg = array(
                "bool" => true,
                "msg" => "Trabalho enviado com sucesso!"
            );
        } else{
            return $msg = array(
                "bool" => false,
                "msg" => "Erro ao enviar o trabalho!"
            );
        }
    }

    public function getClassByName($data){
        $this->db->where('name_class', $data['name_class']);
        $this->db->where('teacher_user_id', $data['teacher_user_id']);
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function getAll(){
        $this->db->select('*');
        if($this->session->userdata('teacher') == 1){
            $this->db->where('teacher_user_id', $this->session->userdata('id'));
        }
        
        return $this->db->get($this->table)->result();
    }

    public function getAllByClassId($id){
        $this->db->select('*');
        $this->db->where('class_id_class', $id);
        return $this->db->get($this->table)->result();
    }

    public function getAllClassesStudent(){
        $id_user = $this->session->userdata('id');
        $this->db->select('id_class');
        $this->db->where('id_user', $id_user);
        $this->db->from($this->table);
        $this->db->join('user_has_class', 'id_class = class_id_class');
        $this->db->join('user', 'user_id_user = id_user');
        
        $query = $this->db->get()->result();
        
        $classes = $this->returnClasses($query);
        return $classes;
    }

    public function returnClasses($query){
        $class = array();
        for($i = 0; $i < count($query); $i++){
            $this->db->where('id_class', $query[$i]->id_class);
            $class[$i] = $this->db->get($this->table)->row();
        }
        return $class;
    }

    public function getOne($id){
        $this->db->where('id_class', $id);
        return $this->db->get($this->table)->row();
    }

    public function update($class){
        $this->db->where('id_class', $class['id_class']);
        if($this->db->update($this->table, $class)){
            return $msg = array(
                "bool" => true,
                "msg" => "Turma editada com sucesso!"
            );
        } else{
            return $msg = array(
                "bool" => false,
                "msg" => "Erro ao editar a turma!"
            );
        }
    }

    public function delete($id){
        $this->db->where('id_class', $id);
        if($this->db->delete($this->table)){
            return $msg = array(
                "bool" => true,
                "msg" => "Turma deletada com sucesso!"
            );
        } else{
            return $msg = array(
                "bool" => false,
                "msg" => "Erro ao deletar a turma!"
            );
        }
    }

    public function getClassByCode($code){
        $this->db->where('number_class', $code);
        return $this->db->get($this->table)->row();
    }

    public function joinClass($data){
        $class = $this->getClassByCode($data['number_class']);
        if(count($class) == 1){
            $user_has_class = array(
                "user_id_user" => $data['id_user'],
                "class_id_class" => $class->id_class
            );

            if($this->user_has_classCreate($user_has_class)){
                return $msg = array(
                    "bool" => true,
                    "msg" => "Você entrou na turma com sucesso!"
                );
            } else{
                return $msg = array(
                    "bool" => false,
                    "msg" => "Você não pode entrar na turma!"
                );
            }
        } else{
            return $msg = array(
                "bool" => false,
                "msg" => "Turma não existente!"
            );
        }
    }

    public function user_has_classCreate($data){
        if($this->db->insert('user_has_class', $data)){
            return true;
        } else{
            return false;
        }
    }

    public function leaveClass($data){
        $this->db->where('class_id_class', $data['class_id_class']);
        $this->db->where('user_id_user', $data['user_id_user']);
        if($this->db->delete('user_has_class')){
            return $msg = array(
                "bool" => true,
                "msg" => "Você saiu da turma!"
            );
        } else{
            return $msg = array(
                "bool" => false,
                "msg" => "Desculpe, mas não foi possível sair da turma!"
            );
        }
    }
}