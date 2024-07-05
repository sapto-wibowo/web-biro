<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSyarat');
        $this->load->model('ModelUlasan');
        $this->load->model('ModelWilayah');
        $this->load->model('ModelUser');
        date_default_timezone_set('Asia/Jakarta');
    }
    

    public function index()
    {
        $this->load->view('website/home', false);
    }

    public function diproses(){
        $data = array(
            'title' => 'Lacak Pengajuan',
            'isi' => 'Website/diproses',
            'diproses' => $this->ModelSyarat->diproses(),
        );
        $this->load->view('template/wrapper_frontend', $data, false);
    }

    public function history(){
        $data = array(
            'title' => 'History Pengajuan',
            'isi' => 'Website/history',
            'finish' => $this->ModelSyarat->finish(),
        );
        $this->load->view('template/wrapper_frontend', $data, false);
    }

    public function view($id_syarat){
        $data = array(
            'title' => 'Data Pengajuan',
            'subtitle' => 'Data Dalam Proses',
            'isi' => 'Website/dalam_proses',
            'syarat' => $this->ModelSyarat->diproses(),
            'user' => $this->ModelSyarat->Data($id_syarat),
        );
        $this->load->view('template/wrapper_frontend', $data, false);
    }

    public function finish($id_syarat){
        $data = array(
            'title' => 'Data Pengajuan',
            'subtitle' => 'Data Sudah Selesai',
            'isi' => 'Website/finish',
            'syarat' => $this->ModelSyarat->finish(),
            'user' => $this->ModelSyarat->Data($id_syarat),
        );
        $this->load->view('template/wrapper_frontend', $data, false);
    }

    public function akun($id_user = null)
    {
        $this->form_validation->set_rules('nama_user', 'Nama', 'trim|required',
		[
			'required' => 'Nama Lengkap Harus Di isi!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check',[
            'required' => 'Username Tidak Boleh Kosong!',
        ]);
		$this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'trim|required',
		[
			'required' => 'Nomor Telepon Harus Di isi!'
		]);
		$this->form_validation->set_rules('jalan', 'Jalan', 'trim|required',
		[
			'required' => 'Nama Jalan, RT/RW Harus Di isi!'
		]);
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required',
		[
			'required' => 'Kelurahan Harus Di isi!'
		]);
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required',
		[
			'required' => 'Kecamatan Harus Di isi!'
		]);
		
		if ($this->form_validation->run() == false){
			$data = array(
                'title' => 'Ubah Data',
                'isi' => 'website/akun',
                'wilayah' => $this->ModelWilayah->AllData(),
                'user' => $this->ModelUser->Data($id_user),
            );
            $this->load->view('template/wrapper_frontend', $data, false);
		}else{
			$data = array(
				'id_user' => $id_user,
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'no_telepon' => $this->input->post('no_telepon'),
				'jalan' => $this->input->post('jalan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'id_wilayah' => $this->input->post('id_wilayah')
			);
			$this->ModelUser->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Di Ganti!, Silahkan Login Kembali!');
			redirect('auth/signout');	
		}
		$data = array(
			'title' => 'Ubah Data',
            'isi' => 'website/akun',
            'wilayah' => $this->ModelWilayah->AllData(),
            'user' => $this->ModelUser->Data($id_user),
		);
		$this->load->view('template/wrapper_frontend', $data, false);
    }

	function username_check(){
        $post = $this->input->post(null, true);
        $query = $this->db->query("SELECT * FROM tbl_user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
        if($query->num_rows() > 0){
            $this->form_validation->set_message('username_check', 'Username Sudah Terdaftar!');
            return false;
        }else{
            return true;
        }
    }

    public function ganti_password($id_user){
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[7]',
		[
			'min_lenght' => 'Passworrd Minimal 8 Huruf!',
			'required' => 'Password Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]',
		[
			'matches' => 'Password Tidak Sama!',
			'required' => 'Retype Password Tidak Boleh Kosong!'
		]);
        if ($this->form_validation->run() == false){
			$data = array(
                'title' => 'Ganti Password',
                'isi' => 'website/ganti_password',
                'user' => $this->ModelUser->Data($id_user),
            );
            $this->load->view('template/wrapper_frontend', $data, false);
		}else{
			$data = array(
                'id_user' => $id_user,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            );
            $this->ModelUser->edit($data);
            $this->session->set_flashdata('pesan', 'Password Berhasil Di Ganti!, Silahkan Login Kembali!');
            redirect('auth/signout');
		}
    }

}
