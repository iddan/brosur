<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Set_Account extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model(array('user/user_model'));
    }

    public function index($id) {
        $data = array(
            'title' => 'Setting Account',            
            'data' => $this->user_model->check('user_id', $id)->row_array(),
            'groups' => $this->user_model->get_other('groups')
        );

        $user_name = $this->input->post('user_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $real_name = $this->input->post('real_name');
        $decrypt = 'fuckyoudecryptmypassword';
        $all = md5($decrypt.$password);

        $this->_set_rules_edit();
        if($this->form_validation->run() == FALSE) {
            $this->render_page('index', $data);
        } else {
            $check_user_name = $this->user_model->check('user_name', $user_name);
            $check_user = $check_user_name->row();
            $check_email = $this->user_model->check('email', $email);
            $check_user2 = $check_email->row();
            
            if(($check_user_name->num_rows() > 0) && ($check_user->user_id != $id)) {
                $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>User Name \"{$user_name}\" is already exists</span></div>");
                redirect('set_account/index/'.$id);
            } else if(($check_email->num_rows() > 0) && ($check_user2->user_id != $id)) {
                $this->session->set_flashdata('message',"<div class='card-panel'><span class='red-text'>Email Address \"{$email}\" is already exists</span></div>");
                redirect('set_account/index/'.$id);
            } else {
                if($password == '') {
                    $data = array(
                        'user_name' => $user_name,
                        'email' => $email,
                        'real_name' => $real_name
                    );
                } else {
                    $data = array(
                        'user_name' => $user_name,
                        'email' => $email,
                        'password' => $all,
                        'real_name' => $real_name
                    );
                }                
                $this->user_model->update($id, $data);

                $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Update Data Successful ..</span></div>');
                redirect('main/index');
            }            
        }
    }

    public function _set_rules_edit() {
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