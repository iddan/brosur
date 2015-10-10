<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function get_where($table, $column, $id){
        $this->db->where($column, $id);
        return $this->db->get($table);
    }

}