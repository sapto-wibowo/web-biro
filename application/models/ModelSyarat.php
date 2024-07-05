<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelSyarat extends CI_Model
{

   public function Belum_proses()
   {
      $this->db->select('*');
      $this->db->from('tbl_syarat');
      $this->db->join('tbl_user', 'tbl_user.id_user = tbl_syarat.id_user', 'left');
      $this->db->join('tbl_employee', 'tbl_employee.id_employee = tbl_syarat.id_employee', 'left');
      $this->db->join('tbl_layanan', 'tbl_layanan.id_layanan = tbl_syarat.id_layanan', 'left');
      $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_syarat.id_wilayah', 'left');
      $this->db->where('status=0');
      $this->db->order_by('id_syarat', 'desc');
      return $this->db->get()->result();
   }

   public function diproses()
   {
      $this->db->select('*');
      $this->db->from('tbl_syarat');
      $this->db->join('tbl_employee', 'tbl_employee.id_employee = tbl_syarat.id_employee', 'left');
      $this->db->join('tbl_layanan', 'tbl_layanan.id_layanan = tbl_syarat.id_layanan', 'left');
      $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_syarat.id_wilayah', 'left');
      $this->db->where('id_user', $this->session->userdata('id_user'));
      $this->db->where('status=1');
      $this->db->order_by('id_syarat', 'desc');
      return $this->db->get()->result();
   }

   public function finish()
   {
      $this->db->select('*');
      $this->db->from('tbl_syarat');
      $this->db->join('tbl_employee', 'tbl_employee.id_employee = tbl_syarat.id_employee', 'left');
      $this->db->join('tbl_layanan', 'tbl_layanan.id_layanan = tbl_syarat.id_layanan', 'left');
      $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_syarat.id_wilayah', 'left');
      $this->db->where('id_user', $this->session->userdata('id_user'));
      $this->db->where('status=2');
      $this->db->order_by('id_syarat', 'desc');
      return $this->db->get()->result();
   }

   public function Data($id_syarat)
   {
      $this->db->select('*');
      $this->db->from('tbl_syarat');
      $this->db->join('tbl_user', 'tbl_user.id_user = tbl_syarat.id_user', 'left');
      $this->db->join('tbl_employee', 'tbl_employee.id_employee = tbl_syarat.id_employee', 'left');
      $this->db->join('tbl_layanan', 'tbl_layanan.id_layanan = tbl_syarat.id_layanan', 'left');
      $this->db->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_syarat.id_wilayah', 'left');
      $this->db->where('id_syarat', $id_syarat);
      return $this->db->get()->row();
   }

   public function add($data)
   {
      $this->db->insert('tbl_syarat', $data);
   }

   public function edit($data)
   {
      $this->db->where('id_syarat', $data['id_syarat']);
      $this->db->update('tbl_syarat', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_syarat', $data['id_syarat']);
      $this->db->delete('tbl_syarat', $data);
   }
}

/* End of file M_user.php */
