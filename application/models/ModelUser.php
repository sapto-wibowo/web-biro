<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model {

    public function AllData(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_user.id_wilayah', 'left');
        $this->db->order_by('id_user', 'desc');
        $this->db->where('statusDelete=1');
        return $this->db->get()->result();
     }

     public function AllDataActive(){
      $this->db->select('*');
      $this->db->from('tbl_user');
      $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_user.id_wilayah', 'left');
      $this->db->order_by('id_user', 'desc');
      $this->db->where('is_active=1');
      return $this->db->get()->result();
   }

     public function lihat_nama_user($nama_user){
         $this->db->select('*');
         $this->db->from('tbl_user');
         $this->db->where('nama_user', $nama_user);
         $this->db->get()->row();
	}
     
     public function Data($id_user)
     {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_user.id_wilayah', 'left');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
     }

     public function add($data){
        $this->db->insert('tbl_user', $data);
     }

     public function edit($data){
      $this->db->where('id_user', $data['id_user']);
      $this->db->update('tbl_user', $data);
     }
}

/* End of file M_user.php */

