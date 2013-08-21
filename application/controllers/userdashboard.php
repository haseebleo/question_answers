<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userdashboard extends CI_Controller {

    public function index() {
//        $this->load->view('welcome_message');

        echo 'user';
        $this->load->template('main');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */