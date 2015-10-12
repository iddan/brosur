<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Product extends AdminController {

	public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'upload'));
        $this->load->model(array('product_model'));
    }

    public function index() {
        $data = array(
            'title' => 'Products',
            'data' => $this->product_model->get()
        );
        $this->render_page('index', $data);
    }

    public function images($id) {
        $data = array(
            'title' => 'Product Images',
            'data' => $this->product_model->check('product_id', $id)
        );
        $this->render_page('view_images', $data);
    }

    public function add() {
        $data = array(
            'title' => 'Add Product',
            'category' => $this->product_model->query('SELECT category_id, category_name FROM categories WHERE category_level = 2 ORDER BY id_parent')
        );

        $category_id = $this->input->post('category_id');
        $product_name = $this->input->post('product_name');
        $price = $this->input->post('price');
        $description = $this->input->post('description');

        $this->_set_rules_add();
        if($this->form_validation->run() == FALSE) {
            $this->render_page('add', $data);            
        } else {
            $number_of_files = sizeof($_FILES['images']['tmp_name']);
            $files = $_FILES['images'];
            $errors = array();

            for($i=0; $i<$number_of_files; $i++) {
                if($_FILES['images']['error'][$i] != 0) {
                    $errors[$i][] = 'Couldn\'t upload file '.$_FILES['images']['name'][$i];                    
                }
            }

            if(sizeof($errors)==0) {
                if ($number_of_files <= 5) {                
                    $config['upload_path'] = './assets/images/products/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '1000';
                    $config['file_name'] = 'image';
                    $config['overwrite'] = false;

                    for ($i = 0; $i < $number_of_files; $i++) {
                        $_FILES['images']['name'] = $files['name'][$i];
                        $_FILES['images']['type'] = $files['type'][$i];
                        $_FILES['images']['tmp_name'] = $files['tmp_name'][$i];
                        $_FILES['images']['error'] = $files['error'][$i];
                        $_FILES['images']['size'] = $files['size'][$i];
              
                        $this->upload->initialize($config);                
                        if ($this->upload->do_upload('images')) {
                            $data = $this->upload->data();
                            $image_array[] = $data['file_name'];
                        } else {
                            $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Some of the files do not match.'.$this->upload->display_errors().'</span></div>');
                            redirect('product/add');
                        }
                    }
                    $images = implode('|', $image_array);
                } else {
                    $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Max upload 5 images.</span></div>');
                    redirect('product/add');
                }
            } else {
                $images = '';
            }

            $data = array(
                'category_id' => $category_id,
                'product_name' => $product_name,
                'price' => $price,
                'description' => $description,
                'image_filename' => $images,
            );
            $this->product_model->insert($data);

            $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Input Data Successful ..</span></div>');
            redirect('product/index');
        }
    }

    public function edit($id) {
        $data = array(
            'title' => 'Edit Product',
            'data' => $this->product_model->check('product_id', $id)->row_array(),
            'category' => $this->product_model->query('SELECT category_id, category_name FROM categories WHERE category_level = 2 ORDER BY id_parent')
        );

        $category_id = $this->input->post('category_id');
        $product_name = $this->input->post('product_name');
        $price = $this->input->post('price');
        $description = $this->input->post('description');

        $this->_set_rules_edit();
        if($this->form_validation->run() == FALSE) {
            $this->render_page('edit', $data);            
        } else {
            $check_product_name = $this->product_model->check('product_name', $product_name);
            $check_product = $check_product_name->row();
            
            if(($check_product_name->num_rows() > 0) && ($check_product->product_id != $id)){
                $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>Product name \"{$product_name}\" is already exists</span></div>");
                redirect('product/edit/'.$id);
            } else {
                $number_of_files = sizeof($_FILES['images']['tmp_name']);
                $files = $_FILES['images'];
                $errors = array();

                for($i=0; $i<$number_of_files; $i++) {
                    if($_FILES['images']['error'][$i] != 0) {
                        $errors[$i][] = 'Couldn\'t upload file '.$_FILES['images']['name'][$i];                    
                    }
                }

                if(sizeof($errors)==0) {
                    if ($number_of_files <= 5) {
                        $config['upload_path'] = './assets/images/products/';
                        $config['allowed_types'] = 'gif|jpg|jpeg|png';
                        $config['max_size'] = '1000';
                        $config['file_name'] = 'image';
                        $config['overwrite'] = false;

                        for ($i = 0; $i < $number_of_files; $i++) {
                            $_FILES['images']['name'] = $files['name'][$i];
                            $_FILES['images']['type'] = $files['type'][$i];
                            $_FILES['images']['tmp_name'] = $files['tmp_name'][$i];
                            $_FILES['images']['error'] = $files['error'][$i];
                            $_FILES['images']['size'] = $files['size'][$i];
                  
                            $this->upload->initialize($config);                
                            if ($this->upload->do_upload('images')) {
                                $data = $this->upload->data();
                                $image_array[] = $data['file_name'];
                            } else {
                                $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Some of the files do not match.'.$this->upload->display_errors().'</span></div>');
                                redirect('product/edit/'.$id);
                            }
                        }
                        $images = implode('|', $image_array);

                        $split = explode("|", $check_product->image_filename);
                        for($i=0; $i<count($split); $i++) {
                            unlink("assets/images/products/".$split[$i]);
                        }

                        $data = array(
                            'category_id' => $category_id,
                            'product_name' => $product_name,
                            'price' => $price,
                            'description' => $description,
                            'image_filename' => $images
                        );
                        $this->product_model->update($id, $data);
                    } else {
                        $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Max upload 5 images.</span></div>');
                        redirect('product/edit/'.$id);
                    }
                } else {
                    $data = array(
                        'category_id' => $category_id,
                        'product_name' => $product_name,
                        'price' => $price,
                        'description' => $description
                    );
                    $this->product_model->update($id, $data);
                }

                $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Update Data Successful ..</span></div>');
                redirect('product/index');
            }            
        }
    }

    public function delete($id) {
        $check_product_id = $this->product_model->check('product_id', $id);
        $check_product = $check_product_id->row();
        
        if($check_product->image_filename) {
            $split = explode("|", $check_product->image_filename);
            for($i=0; $i<count($split); $i++) {
                unlink("assets/images/products/".$split[$i]);
            }
        }

        $this->product_model->delete($id);

        $check_product_id = $this->product_model->check('product_id', $id);
        if($check_product_id->num_rows() > 0) {
            $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>Delete Data Failed !</span></div>");
        } else {
            $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Delete Data Successfully ..</span></div>');
        }
        redirect('product/index');
    }

    public function _set_rules_add() {
        $this->form_validation->set_rules('category_id','Category','required');
        $this->form_validation->set_rules('product_name','Product Name','required|max_length[50]|is_unique[products.product_name]');
        $this->form_validation->set_rules('price','Price','required|integer');
        $this->form_validation->set_rules('description','Description','required');
        
        $this->form_validation->set_message('required', 'This field cannot be empty');
        $this->form_validation->set_message('is_unique', 'This already exists');
        $this->form_validation->set_message('integer', 'This only be a number');

        $this->form_validation->set_error_delimiters("<span class='red-text'>( "," )</span>");
    }

    public function _set_rules_edit() {
        $this->form_validation->set_rules('category_id','Category','required');
        $this->form_validation->set_rules('product_name','Product Name','required|max_length[50]');
        $this->form_validation->set_rules('price','Price','required|integer');
        $this->form_validation->set_rules('description','Description','required');
        
        $this->form_validation->set_message('required', 'This field cannot be empty');
        $this->form_validation->set_message('integer', 'This only be a number');

        $this->form_validation->set_error_delimiters("<span class='red-text'>( "," )</span>");
    }

}

/* End of file product.php */
/* Location: ./modules/product/controllers/product.php */