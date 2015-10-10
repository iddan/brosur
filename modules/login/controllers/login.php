<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('login_model'));
        $this->load->library(array('form_validation'));

        if($this->session->userdata('login') == TRUE) {

            if ($this->session->userdata('group_id') == 1) {

                redirect('dashboard');

            } else {

                redirect('main');

            }
            
        }
    }
 
    public function index() {
        $this->_set_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('index');
        } else {
            $this->login_process();
        }        
    }

    public function login_process() {
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $decrypt = 'fuckyoudecryptmypassword';
        $all = md5($decrypt.$password);

        // cek login ke database
        $check = $this->login_model->login_check($user_name, $all);        
        if($check->num_rows() > 0) { // jika data ada / hasil $check > 0
            // mengambil data login untuk session
            foreach($check->result() AS $data_check) {
                $data_session = array(
                    'login' => TRUE,
                    'user_id' => $data_check->user_id,
                    'group_id' => $data_check->group_id,
                    'user_name' => $data_check->user_name,
                    'email' => $data_check->email,
                    'real_name' => $data_check->real_name
                );
                $user_id = $data_check->user_id;
                $group_id = $data_check->group_id;
                $status = $data_check->status;
                $expire_date = $data_check->expire_date;
            }            
            if($group_id == 1) { // jika group_id = 1 / admin
                if($status == 1) { // jika status = 1 / aktif
                    $this->session->set_userdata($data_session);
                } else {
                    $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Account is not active .</span></div>');
                    redirect('login');
                }
            } else if($group_id == 2) { // jika group_id = 2 / vip
                if($status == 1) { // jika status = 1 / aktif
                    $this->session->set_userdata($data_session);
                } else {
                    $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Account is not active .</span></div>');
                    redirect('login');
                }
            } else if ($group_id == 3) { // jika group_id = 3 / member
                if($status == 1) { // jika status = 1 / aktif
                    if($expire_date >= date('Y-m-d')) { // jika expire_date lebih dari tanggal sekarang
                        $this->session->set_userdata($data_session);
                    } else { // account expire
                        $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Login Failed ! Account has expired .</span></div>');
                        redirect('login');
                    }
                } else { // account tidak aktif
                    $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Login Failed ! Account is not active .</span></div>');
                    redirect('login');
                }
            }
            if ($this->session->userdata('login') == TRUE) { // jika login sukses
                // update ke database, user login 1 / sedang login
                $data = array(
                    'login' => 1
                );
                $this->login_model->update($user_id, $data);
                $this->session->set_flashdata('message','<div class="card-panel"><span class="green-text">Login Success ..</span></div>');
                if ($this->session->userdata('group_id') == 1) { // jika group_id = 1 / admin
                    redirect('dashboard');
                } else { // selain admin
                    redirect('main');
                }
            } else { // jika login gagal
                $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Login Failed !</span></div>');
                redirect('login');
            }
        } else { // jika data tidak ada / hasil $check < 0
            $this->session->set_flashdata('message','<div class="card-panel"><span class="red-text">Login Failed !</span></div>');
            redirect('login');
        }
    }

    public function _set_rules() {
        $this->form_validation->set_rules('user_name','User Name','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_error_delimiters("<div class='card-panel'><span class='red-text'>","</span></div>");
    }

}

/* End of file login.php */
/* Location: ./modules/login/controllers/login.php */