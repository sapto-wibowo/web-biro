<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelWilayah');
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index()
    {
        $data = array(
            'title' => 'Wilayah',
            'subtitle' => 'Data Wilayah',
            'isi' => 'Wilayah/view',
            'menu' => 'wilayah',
            'submenu' => '',
            'wilayah' => $this->ModelWilayah->AllData(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function AddData()
    {
        $data = array(
            'kode_wilayah' => $this->input->post('kode_wilayah'),
            'nama_wilayah' => $this->input->post('nama_wilayah'),
            'statusHapus' => 1
        );
        $this->ModelWilayah->add($data);
        $this->session->set_flashdata('pesan', 'Wilayah Berhasil Ditambahkan!');
        redirect('wilayah');
    }

    public function Edit($id_wilayah)
    {
        $data = array(
            'id_wilayah' => $id_wilayah,
            'kode_wilayah' => $this->input->post('kode_wilayah'),
            'nama_wilayah' => $this->input->post('nama_wilayah'),
        );
        $this->ModelWilayah->edit($data);
        $this->session->set_flashdata('pesan', 'Wilayah Berhasil Di Ganti!');
        redirect('wilayah');
    }

    public function Delete($id_wilayah = NULL)
    {
        $data = array(
            'id_wilayah' => $id_wilayah,
            'statusHapus' => 0
        );
        $this->ModelWilayah->edit($data);
        $this->session->set_flashdata('pesan', 'Wilayah Berhasil Dihapus!');
        redirect('wilayah');
    }
}

/* End of file Wilayah.php */
