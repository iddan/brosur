<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('main_model', 'login/login_model'));
    }

    public function index() {
        $data = array(
            'title' => 'Home',
            'title2' => 'Select Products by Categories',
            'link_function' => 'sub_category1',
            'data' => $this->main_model->get_where('categories', 'category_level', 0)
        );
        $this->render_page('index', $data);
    }

    public function sub_category1($category_id) {
        $check = $this->main_model->get_where('categories', 'category_id', $category_id);
        $check_category = $check->row();

        $data = array(
            'title' => 'Subcategory',
            'title2' => 'Select a Subcategory <br><b>'.$check_category->category_name.'</b>',
            'link_function' => 'sub_category2',
            'data' => $this->main_model->get_where('categories', 'id_parent', $category_id)
        );
        $this->render_page('index', $data);
    }

    public function sub_category2($category_id) {
        $check = $this->main_model->get_where('categories', 'category_id', $category_id);
        $check_category = $check->row();

        $data = array(
            'title' => 'Subcategory',
            'title2' => 'Select a Subcategory <br><b>'.$check_category->category_name.'</b>',
            'link_function' => 'end_sub',
            'data' => $this->main_model->get_where('categories', 'id_parent', $category_id)
        );
        $this->render_page('index', $data);
    }

    public function end_sub($category_id) {
        $check = $this->main_model->get_where('categories', 'category_id', $category_id);
        $check_category = $check->row();

        $data = array(
            'title' => 'List Products',
            'title2' => 'List Products Category <br><b>'.$check_category->category_name.'</b>',
            'link_function' => 'detail_product',
            'data' => $this->main_model->get_where('products', 'category_id', $category_id)
        );
        $this->render_page('list_products', $data);
    }

    public function detail_product($product_id) {
        $check = $this->main_model->get_where('products', 'product_id', $product_id);
        $check_product = $check->row();

        $data = array(
            'title' => 'Detail Product',
            'title2' => 'Detail Product <br><b>'.$check_product->product_name.'</b>',
            'data' => $this->main_model->get_where('products', 'product_id', $product_id)
        );
        $this->render_page('detail_product', $data);
    }

    public function logout() {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'login' => 0
        );
        $this->login_model->update($user_id, $data);

        $this->session->unset_userdata('login');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('group_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('real_name');
        $this->session->sess_destroy();        

        $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Your has been logout ..</span></div>');
        redirect('login');
    }

}

/* End of file main.php */
/* Location: ./modules/main/controllers/main.php */