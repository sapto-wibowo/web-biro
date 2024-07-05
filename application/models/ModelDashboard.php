<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDashboard extends CI_Model {

    public function total_employee(){
        return $this->db->get('tbl_employee')->num_rows();
    }

    public function total_user(){
        return $this->db->get('tbl_user')->num_rows();
    }

    public function total_belum_proses(){
        $this->db->select('*');
        $this->db->from('tbl_syarat');
        $this->db->where('status', 0);
        return $this->db->get()->num_rows();
    }

    public function total_sudah_proses(){
        $this->db->select('*');
        $this->db->from('tbl_syarat');
        $this->db->where('status', 1);
        return $this->db->get()->num_rows();
    }

}

/* End of file ModelDashboard.php */