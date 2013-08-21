<?php

Class Usermodel extends CI_Model {

    function login($email, $password) {
        $this->db->select('id, email, password, first_name, last_name, is_admin');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', MD5($password));
        $this->db->where('is_active', 1);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}