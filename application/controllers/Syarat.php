<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Syarat extends CI_Controller
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
            'title' => 'Syarat Pengajuan',
            'subtitle' => 'Data Syarat Pengajuan User',
            'isi' => 'User/view_data_pengajuan',
            'menu' => 'masterdata',
            'submenu' => 'DataPengajuan',
            'syarat' => $this->ModelSyarat->Belum_proses(),
            'user' => $this->ModelUser->AllDataActive(),
            'employee' => $this->ModelEmployee->Active(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'layanan' => $this->ModelLayanan->AllData(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function AddData()
    {
        $id_user = $this->input->post('nama_user');
        $id_layanan = $this->input->post('id_layanan');
        $id_employee = $this->input->post('id_employee');
        $user = $this->ModelUser->Data($id_user);
        $id_wilayah = $user->id_wilayah;
        $data = array(
            'id_user' => $id_user,
            'no_pengajuan' => $this->input->post('no_pengajuan'),
            'tanggal' => time(),
            'ktp' => $this->input->post('ktp'),
            'stnk' => $this->input->post('stnk'),
            'bpkb' => $this->input->post('bpkb'),
            'surat_kuasa' => $this->input->post('surat_kuasa'),
            'no_polisi' => $this->input->post('no_polisi'),
            'status' => 0,
            'id_employee' => $id_employee,
            'id_wilayah' => $id_wilayah,
            'id_layanan' => $id_layanan
        );
        $this->ModelSyarat->add($data);
        $this->session->set_flashdata('pesan', 'Pengajuan Berhasil Ditambahkan!');
        redirect('syarat');
    }

    public function edit($id_syarat)
    {
        $data = array(
            'id_syarat' => $id_syarat,
            'tanggal' => time(),
            'ktp' => $this->input->post('ktp'),
            'stnk' => $this->input->post('stnk'),
            'bpkb' => $this->input->post('bpkb'),
            // 'no_polisi' => $this->input->post('no_polisi'),
            'surat_kuasa' => $this->input->post('surat_kuasa'),
        );
        $this->ModelSyarat->edit($data);
        $this->session->set_flashdata('pesan', 'Syarat Pengajuan Berhasil Di Perbarui!');
        redirect('syarat');
    }

    public function Delete($id_syarat = NULL)
    {
        $data = array('id_syarat' => $id_syarat);
        $this->ModelSyarat->delete($data);
        $this->session->set_flashdata('pesan', 'Pengajuan Berhasil Dihapus!');
        redirect('syarat');
    }

    public function syarat($id_syarat)
    {
        $syarat = $this->ModelSyarat->Data($id_syarat);
        $ktp = $syarat->ktp;
        $stnk = $syarat->stnk;
        $bpkb = $syarat->bpkb;
        $surat_kuasa = $syarat->surat_kuasa;
        if ($ktp == 2) {
            $this->session->set_flashdata('error', 'Pengajuan Tidak Bisa Di Proses!, Silahkan Lengkapi Persyaratan Terlebih Dahulu!');
            redirect('syarat');
        } else {
            if ($stnk == 2) {
                $this->session->set_flashdata('error', 'Pengajuan Tidak Bisa Di Proses!, Silahkan Lengkapi Persyaratan Terlebih Dahulu!');
                redirect('syarat');
            } else {
                if ($bpkb == 2) {
                    $this->session->set_flashdata('error', 'Pengajuan Tidak Bisa Di Proses!, Silahkan Lengkapi Persyaratan Terlebih Dahulu!');
                    redirect('syarat');
                } else {
                    if ($surat_kuasa == 2) {
                        $this->session->set_flashdata('error', 'Pengajuan Tidak Bisa Di Proses!, Silahkan Lengkapi Persyaratan Terlebih Dahulu!');
                        redirect('syarat');
                    } else {
                        $data = array(
                            'id_syarat' => $id_syarat,
                            'status' => 1,
                            'id_employee' => $this->input->post('id_employee'),
                        );
                        $this->ModelSyarat->edit($data);
                        $this->session->set_flashdata('pesan', 'Pengajuan User Berhasil Di Proses');
                        redirect('proses');
                    }
                }
            }
        }
    }
}

/* End of file Syarat.php */
