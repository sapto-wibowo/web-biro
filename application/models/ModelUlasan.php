<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUlasan extends CI_Model {

    public function AllData(){
        $this->db->select('*');
        $this->db->from('tbl_ulasan');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_ulasan.id_user', 'left');
        $this->db->order_by('id_ulasan', 'desc');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    public function add($data){
        $this->db->insert('tbl_ulasan', $data);
     }

}

/* End of file ModelUlasan.php */
