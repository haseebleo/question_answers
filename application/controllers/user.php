<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usermodel', '', TRUE);
        $this->load->helper('url');
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
             
            if ($this->session->userdata('is_admin')):
                redirect('admindashboard', 'refresh');
            else :
                redirect('userdashboard', 'refresh');
            endif;
        } else {
//If no session, redirect to login page
            $this->load->helper(array('form'));
            $this->load->template('user/index');
        }
    }

    function logout() {
        if ($this->session->userdata('logged_in')):
            $this->session->unset_userdata('logged_in');
            session_destroy();

        endif;
        redirect('user', 'refresh');
    }

    function loginCheck() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->template('user/index');
        } else {
            //Go to private area
             
            if ($this->session->userdata('is_admin')):
                redirect('admindashboard', 'refresh');
            else :
                redirect('userdashboard', 'refresh');
            endif;
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');

        //query the database
        $result = $this->usermodel->login($email, $password);
        
        if ($result) {
            $sess_array = array();
            $sess_array = array(
                'id' => $result[0]->id,
                'name' => $result[0]->first_name . ' ' . $result[0]->last_name,
                'email' => $result[0]->email,
                'is_admin' => $result[0]->is_admin,
            );
            $this->session->set_userdata('logged_in', $sess_array);
            $this->session->set_userdata('is_admin', $result[0]->is_admin);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

//    public function index(){
//        
//        $this->load->template('user/index');
//    }
//    
}

?>
