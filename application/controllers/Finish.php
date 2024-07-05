<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Finish extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelProses');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {    
        $data = array(
            'title' => 'Pengajuan Selesai',
            'subtitle' => 'Data Pengajuan User Yang Sudah Selesai',
            'isi' => 'Finish/view',
            'menu' => 'masterdata',
            'submenu' => 'Finish',
            'syarat' => $this->ModelProses->Finish(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function view($id_syarat){
        $data = array(
            'title' => 'Data In Proses',
            'subtitle' => 'Data Pengajuan User Yang Sudah Di Proses',
            'isi' => 'Finish/history',
            'menu' => 'masterdata',
            'submenu' => 'Finish',
            'syarat' => $this->ModelProses->Finish(),
            'user' => $this->ModelProses->Data($id_syarat),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function Delete( $id_syarat = NULL )
    {
        $data = array('id_syarat' => $id_syarat);
        $this->ModelProses->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('Finish');
    }
}

/* End of file Finish.php */
