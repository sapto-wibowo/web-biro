<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelLayanan extends CI_Model
{

    public function AllData()
    {
        $this->db->select('*');
        $this->db->from('tbl_layanan');
        $this->db->order_by('id_layanan', 'desc');
        $this->db->where('statusHapus=1');
        return $this->db->get()->result();
    }

    public function Data($id_layanan)
    {
        $this->db->select('*');
        $this->db->from('tbl_layanan');
        $this->db->where('id_layanan', $id_layanan);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_layanan', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_layanan', $data['id_layanan']);
        $this->db->update('tbl_layanan', $data);
    }
}

/* End of file M_layanan.php */
