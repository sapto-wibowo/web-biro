<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSyarat');
    }

    public function index()
    {
        $data = array(
            'title' => 'dokumen',
            'menu' => 'dashboard',
            'submenu' => '',
            'isi' => 'dokumen',
            'print' => $this->ModelSyarat->Data($id_syarat)
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function dokumen($id_syarat)
    {
        $data = array(
            'title' => 'dokumen',
            'menu' => 'dashboard',
            'submenu' => '',
            'isi' => 'dokumen',
            'print' => $this->ModelSyarat->Data($id_syarat)
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }
}

/* End of file Dokumen.php */
