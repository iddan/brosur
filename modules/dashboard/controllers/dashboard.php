<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dashboard extends AdminController {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('user/user_model'));
    }
 
    public function index(){
        $data = array(
            'title' => 'Dashboard',
            'user_online' => $this->user_model->check('login', 1)->num_rows()
        );
        $this->render_page('index', $data);
    }

}