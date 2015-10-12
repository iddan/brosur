<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Category extends AdminController {

	public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model(array('category_model'));
    }

    public function index() {
        $data = array(
            'title' => 'Categories',
            'data' => $this->category_model->get()
        );
        $this->render_page('index', $data);
    }

    public function add() {
        $data = array(
            'title' => 'Add Category',
            'category' => $this->category_model->get()
        );

        $category_name = $this->input->post('category_name');
        $category_level = $this->input->post('category_level');
        $category_id = $this->input->post('category_id');
        $description = $this->input->post('description');

        $this->_set_rules_add();
        if($this->form_validation->run() == FALSE) {
            $this->render_page('add', $data);            
        } else {
            $data = array(
                'category_name' => $category_name,
                'category_level' => $category_level,
                'id_parent' => $category_id,
                'description' => $description
            );
            $this->category_model->insert($data);

            $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Input Data Successful ..</span></div>');
            redirect('category/index');
        }
    }

    public function edit($id) {
        $data = array(
            'title' => 'Edit Category',
            'data' => $this->category_model->check('category_id', $id)->row_array(),
            'category' => $this->category_model->query('SELECT * FROM categories WHERE category_id != '.$id)
        );

        $category_name = $this->input->post('category_name');
        $category_level = $this->input->post('category_level');
        $category_id = $this->input->post('category_id');
        $description = $this->input->post('description');

        $this->_set_rules_edit();
        if($this->form_validation->run() == FALSE) {
            $this->render_page('edit', $data);            
        } else {
            $check_category_name = $this->category_model->check('category_name', $category_name);
            $check_category = $check_category_name->row();
            
            if(($check_category_name->num_rows() > 0) && ($check_category->category_id != $id)) {
                $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>Category name \"{$category_name}\" is already exists</span></div>");
                redirect('category/edit/'.$id);
            } else {
                $data = array(
                    'category_name' => $category_name,
                    'category_level' => $category_level,
                    'id_parent' => $category_id,
                    'description' => $description
                );
                $this->category_model->update($id, $data);

                $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Update Data Successful ..</span></div>');
                redirect('category/index');
            }
        }
    }

    public function delete($id) {
        $this->category_model->delete($id);

        $check_category_id = $this->category_model->check('category_id', $id);
        if($check_category_id->num_rows() > 0){
            $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>Delete Data Failed !</span></div>");
        } else {
            $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Delete Data Successfully ..</span></div>');
        }
        redirect('category/index');
    }

    public function _set_rules_add() {
        $this->form_validation->set_rules('category_name','Category Name','required|max_length[50]|is_unique[categories.category_name]');
        $this->form_validation->set_rules('category_level','Category Level','required');
        $this->form_validation->set_rules('category_id','Category Parent','required');
        $this->form_validation->set_rules('description','Description','required|max_length[255]');

        $this->form_validation->set_message('required', 'This field cannot be empty');
        $this->form_validation->set_message('is_unique', 'This already exists');

        $this->form_validation->set_error_delimiters("<span class='red-text'>( "," )</span>");
    }

    public function _set_rules_edit() {
        $this->form_validation->set_rules('category_name','Category Name','required|max_length[50]');
        $this->form_validation->set_rules('category_level','Category Level','required');
        $this->form_validation->set_rules('category_id','Category Parent','required');
        $this->form_validation->set_rules('description','Description','required|max_length[255]');

        $this->form_validation->set_message('required', 'This field cannot be empty');

        $this->form_validation->set_error_delimiters("<span class='red-text'>( "," )</span>");
    }

}

/* End of file category.php */
/* Location: ./modules/category/controllers/category.php */