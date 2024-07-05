<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAuth extends CI_Model {

    public function login_admin($username){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_employee.id_wilayah', 'left');
        $this->db->where(
            'username', $username,
        );
        return $this->db->get()->row();
    }

    public function login_user($username){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where(
            'username', $username,
        );
        return $this->db->get()->row();
    }

}

/* End of file M_auth.php */
