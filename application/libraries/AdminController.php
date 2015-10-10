<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminController extends MY_Controller {

    public function __construct() {
        parent::__construct();

        // cek group user group 2/user biasa
		if ($this->session->userdata('group_id') == 2 || $this->session->userdata('group_id') == 3) {
			redirect('main');
		}
    }

}

/* End of file AdminController.php */
/* Location: ./application/libraries/AdminController.php */