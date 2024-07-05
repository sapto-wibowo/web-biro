<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelProses');
        $this->load->model('ModelSyarat');
        date_default_timezone_set('Asia/Jakarta');
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Data In Proses',
            'subtitle' => 'Data Pengajuan User Yang Sudah Di Proses',
            'isi' => 'Proses/view',
            'menu' => 'masterdata',
            'submenu' => 'Proses',
            'syarat' => $this->ModelProses->Sudah_proses(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function view($id_syarat){
        $data = array(
            'title' => 'Data In Proses',
            'subtitle' => 'Data Pengajuan User Yang Sudah Di Proses',
            'isi' => 'Proses/proses',
            'menu' => 'masterdata',
            'submenu' => 'Proses',
            'syarat' => $this->ModelProses->Sudah_proses(),
            'user' => $this->ModelProses->Data($id_syarat),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function keterangan1($id_syarat){
        $data = array(
            'id_syarat' => $id_syarat,
            'keterangan1' => $this->input->post('keterangan1'),
            'status1' =>1,
            'date1' => time(),
        );
        $this->ModelProses->edit($data);
        $this->session->set_flashdata('pesan', 'Berhasil Di Proses');
        redirect('Proses/view/' . $id_syarat);
    }
    public function keterangan2($id_syarat){
        $data = array(
            'id_syarat' => $id_syarat,
            'keterangan2' => $this->input->post('keterangan2'),
            'status2' =>1,
            'date2' => time(),
        );
        $this->ModelProses->edit($data);
        $this->session->set_flashdata('pesan', 'Berhasil Di Proses');
        redirect('Proses/view/' . $id_syarat);
    }
    public function keterangan3($id_syarat){
        $data = array(
            'id_syarat' => $id_syarat,
            'keterangan3' => $this->input->post('keterangan3'),
            'status3' =>1,
            'date3' => time(),
        );
        $this->ModelProses->edit($data);
        $this->session->set_flashdata('pesan', 'Berhasil Di Proses');
        redirect('Proses/view/' . $id_syarat);
    }
    public function keterangan4($id_syarat){
        $data = array(
            'id_syarat' => $id_syarat,
            'keterangan4' => $this->input->post('keterangan4'),
            'status4' =>1,
            'date4' => time(),
        );
        $this->ModelProses->edit($data);
        $this->session->set_flashdata('pesan', 'Berhasil Di Proses');
        redirect('Proses/view/' . $id_syarat);
    }

    
    public function selesai($id_syarat){
        $data = array(
            'id_syarat' => $id_syarat,
            'status' => 2,
            'finish' => time(),
        );
        $this->ModelProses->edit($data);
        $this->session->set_flashdata('pesan', 'Proses Perpanjangan STNK Berhasil');
        redirect('Finish');
    }

    public function Delete( $id_syarat = NULL )
    {
        $data = array('id_syarat' => $id_syarat);
        $this->ModelSyarat->delete($data);
        $this->session->set_flashdata('pesan', 'Pengajuan Berhasil Di Batalkan!');
        redirect('proses');
    }

}

/* End of file Proses.php */
