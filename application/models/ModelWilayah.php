<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelWilayah extends CI_Model {

    public function AllData(){
        $this->db->select('*');
        $this->db->from('tbl_wilayah');
        $this->db->order_by('id_wilayah', 'desc');
        $this->db->where('statusHapus=1');
        return $this->db->get()->result();
     }
     
     public function Data($id_wilayah)
     {
        $this->db->select('*');
        $this->db->from('tbl_wilayah');
        $this->db->where('id_wilayah', $id_wilayah);
        return $this->db->get()->row();
     }

     public function add($data){
        $this->db->insert('tbl_wilayah', $data);
     }

     public function edit($data){
      $this->db->where('id_wilayah', $data['id_wilayah']);
      $this->db->update('tbl_wilayah', $data);
     }
}

/* End of file M_wilayah.php */

