<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends AdminController {

	public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model(array('user_model'));
    }

    public function index() {
        $data = array(
            'title' => 'Users',
            'user_online' => $this->user_model->check('login', 1)->num_rows(),
            'data' => $this->user_model->get()            
        );
        $this->render_page('index', $data);
    }

    public function user_online() {
        $data = array(
            'title' => 'User Online',
            'user_online' => $this->user_model->check('login', 1)->num_rows(),
            'data' => $this->user_model->check('login', 1)
        );
        $this->render_page('index', $data);
    }

    public function add() {
        $data = array(
            'title' => 'Add User',
            'groups' => $this->user_model->get_other('groups')
        );

        $group_id = $this->input->post('group_id');
        $user_name = $this->input->post('user_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $real_name = $this->input->post('real_name');
        $expire_date = $this->input->post('expire_date');
        $status = $this->input->post('status');
        $decrypt = 'fuckyoudecryptmypassword';
        $all = md5($decrypt.$password);

        $this->_set_rules_add();
        if($this->form_validation->run() == FALSE) {
            $this->render_page('add', $data);
        } else {
            $data = array(
                'group_id' => $group_id,
                'user_name' => $user_name,
                'email' => $email,
                'password' => $all,
                'real_name' => $real_name,
                'expire_date' => $expire_date,
                'status' => $status
            );
            $this->user_model->insert($data);

            $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Input Data Successful ..</span></div>');
            redirect('user/index');
        }
    }

    public function edit($id) {
        $data = array(
            'title' => 'Edit User',            
            'data' => $this->user_model->check('user_id', $id)->row_array(),
            'groups' => $this->user_model->get_other('groups')
        );

        $group_id = $this->input->post('group_id');
        $user_name = $this->input->post('user_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $real_name = $this->input->post('real_name');
        $expire_date = $this->input->post('expire_date');
        $status = $this->input->post('status');
        $decrypt = 'fuckyoudecryptmypassword';
        $all = md5($decrypt.$password);

        $this->_set_rules_edit();
        if($this->form_validation->run() == FALSE) {
            $this->render_page('edit', $data);
        } else {
            $check_user_name = $this->user_model->check('user_name', $user_name);
            $check_user = $check_user_name->row();
            $check_email = $this->user_model->check('email', $email);
            $check_user2 = $check_email->row();
            
            if(($check_user_name->num_rows() > 0) && ($check_user->user_id != $id)) {
                $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>User Name \"{$user_name}\" is already exists</span></div>");
                redirect('user/edit/'.$id);
            } else if(($check_email->num_rows() > 0) && ($check_user2->user_id != $id)) {
                $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>Email Address \"{$email}\" is already exists</span></div>");
                redirect('user/edit/'.$id);
            } else {
                if($password == '') {
                    $data = array(
                        'group_id' => $group_id,
                        'user_name' => $user_name,
                        'email' => $email,
                        'real_name' => $real_name,
                        'expire_date' => $expire_date,
                        'status' => $status
                    );
                } else {
                    $data = array(
                        'group_id' => $group_id,
                        'user_name' => $user_name,
                        'email' => $email,
                        'password' => $all,
                        'real_name' => $real_name,
                        'expire_date' => $expire_date,
                        'status' => $status
                    );
                }                
                $this->user_model->update($id, $data);

                $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Update Data Successful ..</span></div>');
                redirect('user/index');
            }            
        }
    }

    public function delete($id) {
        if($id == 1) {
            $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>Cannot Delete Admin !</span></div>");
        } else {
            $this->user_model->delete($id);

            $check_user_id = $this->user_model->check('user_id', $id);
            if($check_user_id->num_rows() > 0){
                $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>Delete Data Failed !</span></div>");
            } else {
                $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Delete Data Successfully ..</span></div>');
            }
        }        
        redirect('user/index');
    }

    public function _set_rules_add() {
        $this->form_validation->set_rules('group_id','Group','required');
        $this->form_validation->set_rules('user_name','User Name','required|min_length[5]|max_length[50]|is_unique[users.user_name]');
        $this->form_validation->set_rules('email','Email','required|min_length[5]|max_length[50]|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('real_name','Real Name','required|min_length[5]|max_length[100]');

        $this->form_validation->set_message('required', 'This field cannot be empty');
        $this->form_validation->set_message('is_unique', 'This already exists');

        $this->form_validation->set_error_delimiters("<span class='red-text'>( "," )</span>");
    }

    public function _set_rules_edit() {
        $this->form_validation->set_rules('group_id','Group','required');
        $this->form_validation->set_rules('user_name','User Name','required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('email','Email','required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('password','Password','min_length[5]|max_length[50]');
        $this->form_validation->set_rules('real_name','Real Name','required|min_length[5]|max_length[100]');
        
        $this->form_validation->set_message('required', 'This field cannot be empty');

        $this->form_validation->set_error_delimiters("<span class='red-text'>( "," )</span>");
    }

}

/* End of file user.php */
/* Location: ./modules/user/controllers/user.php */