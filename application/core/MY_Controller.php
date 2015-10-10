<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // check status login
		if ($this->session->userdata('login') == FALSE) {
			redirect('login');
		}
    }
    
    public function render_page($content, $data = NULL) {
        $data['header'] = $this->load->view('template/header', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/footer', $data, TRUE);
         
        $this->load->view('template/index', $data);
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */