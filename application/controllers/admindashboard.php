<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admindashboard extends CI_Controller {

    public function index() {
//        $this->load->view('welcome_message');

        $this->load->template('main');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */