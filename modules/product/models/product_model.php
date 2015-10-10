<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model{

    private $table = "products";
    private $primary = "product_id";
    
    public function get(){
        $this->db->select('product_id, categories.category_name, product_name, price, products.description, image_filename');
        $this->db->from($this->table);
        $this->db->join('categories', 'categories.category_id = products.category_id');
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