<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

    private $table = "users";
    private $primary = "user_id";
    
    public function get(){
        $this->db->order_by('group_id', 'DESC');
        $this->db->order_by('status');
        $this->db->order_by('expire_date');
        
        return $this->db->get($this->table);
    }

    public function get_other($table){
        return $this->db->get($table);
    }
    
    public function insert($data){
        $this->db->insert($this->table, $data);
    }
    
    public function update($id, $data){
        $this->db->where($this->primary, $id);
        $this->db->update($this->table, $data);
    }
    
    public function delete($id){
        $this->db->where($this->primary, $id);
        $this->db->delete($this->table);
    }
    
    public function check($column, $check){
        $this->db->where($column, $check);
        $query = $this->db->get($this->table);

        return $query;
    }

}