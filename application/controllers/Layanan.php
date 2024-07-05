<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSyarat');
        $this->load->model('ModelUser');
        $this->load->model('ModelEmployee');
        $this->load->model('ModelWilayah');
        $this->load->model('ModelLayanan');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = array(
            'title' => 'Layanan',
            'subtitle' => 'Data Layanan',
            'isi' => 'Layanan/view',
            'menu' => 'layanan',
            'submenu' => '',
            'layanan' => $this->ModelLayanan->AllData(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function AddData()
    {
        $data = array(
            'jenis_layanan' => $this->input->post('jenis_layanan'),
            'lama_waktu' => $this->input->post('lama_waktu'),
            'biaya' => $this->input->post('biaya'),
            'statusHapus' => 1
        );
        $this->ModelLayanan->add($data);
        $this->session->set_flashdata('pesan', 'Jenis Layanan Berhasil Ditambahkan!');
        redirect('layanan');
    }

    public function Edit($id_layanan)
    {
        $data = array(
            'id_layanan' => $id_layanan,
            'jenis_layanan' => $this->input->post('jenis_layanan'),
            'lama_waktu' => $this->input->post('lama_waktu'),
            'biaya' => $this->input->post('biaya'),
        );
        $this->ModelLayanan->edit($data);
        $this->session->set_flashdata('pesan', 'Jenis layanan Berhasil Di Ganti!');
        redirect('layanan');
    }

    public function Delete($id_layanan = NULL)
    {
        $data = array(
            'id_layanan' => $id_layanan,
            'statusHapus' => 0
        );
        $this->ModelLayanan->edit($data);
        $this->session->set_flashdata('pesan', 'Jenis Layanan Berhasil Dihapus!');
        redirect('layanan');
    }

    public function layanan_user()
    {
        $data = array(
            'title' => 'Data Layanan User',
            'subtitle' => 'Data Layanan Pengajuan User',
            'isi' => 'layanan/layanan_user',
            'menu' => 'masterdata',
            'submenu' => 'DataLayanan',
            'syarat' => $this->ModelSyarat->Belum_proses(),
            'user' => $this->ModelUser->AllDataActive(),
            'employee' => $this->ModelEmployee->Active(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'layanan' => $this->ModelLayanan->AllData(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }
}

/* End of file Layanan.php */
