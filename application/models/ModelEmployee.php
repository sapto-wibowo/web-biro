<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelEmployee extends CI_Model {

    public function AllData(){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_employee.id_wilayah', 'left');
        $this->db->order_by('id_employee', 'desc');
        $this->db->where('statusDelete=1');
        return $this->db->get()->result();
     }

     public function Active(){
         $this->db->select('*');
         $this->db->from('tbl_employee');
         $this->db->where('is_active=1');
         $this->db->order_by('id_employee', 'desc');
         return $this->db->get()->result();
     }
     
     public function Data($id_employee)
     {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_employee.id_wilayah', 'left');
        $this->db->where('id_employee', $id_employee);
        return $this->db->get()->row();
     }

     public function add($data){
        $this->db->insert('tbl_employee', $data);
     }

     public function edit($data){
      $this->db->where('id_employee', $data['id_employee']);
      $this->db->update('tbl_employee', $data);
     }
}

/* End of file M_user.php */

