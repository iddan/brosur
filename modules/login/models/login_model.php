<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{

    private $table = "users";
    private $primary = "user_id";

    public function login_check($user_name, $password){
        $this->db->where('user_name', $user_name);
        $this->db->where('password', $password);
        $this->db->where('login', 0);
        $query = $this->db->get($this->table);
        
        return $query;
    }

    public function update($id, $data){
        $this->db->where($this->primary, $id);
        $this->db->update($this->table, $data);
    }

}