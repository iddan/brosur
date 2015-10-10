<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model{

    private $table = "categories";
    private $primary = "category_id";
    
    public function get(){
        $this->db->select('a.*, b.category_name AS category_parent');
        $this->db->from('categories a');
        $this->db->join('categories b', 'a.id_parent = b.category_id', 'LEFT');
        $this->db->order_by('category_level');

        return $this->db->get();
    }

    public function query($query){
        return $this->db->query($query);
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

/* End of file category_model.php */
/* Location: ./modules/category/models/category_model.php */