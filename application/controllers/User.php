<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelWilayah');
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function index()
    {
        $data = array(
            'title' => 'User',
            'subtitle' => 'Data User',
            'isi' => 'User/view',
            'menu' => 'masterdata',
            'submenu' => 'User',
            'user' => $this->ModelUser->AllDataActive(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function AddData()
    {
        $this->form_validation->set_rules('nama_user', 'Nama', 'trim|required',
		[
			'required' => 'Nama Lengkap Harus Di isi!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_user.username]',[
            'required' => 'Username Tidak Boleh Kosong!',
            'is_unique' => 'Username Sudah Terdaftar!'
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
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[7]',
		[
			'min_lenght' => 'Passworrd Minimal 8 Huruf!',
			'required' => 'Password Harus Di isi!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]',
		[
			'matches' => 'Password Tidak Sama!',
			'required' => 'Retype Password Harus Di isi!'
		]);
		
		if ($this->form_validation->run() == false){
			$data = array(
                'title' => 'Tambah User',
                'isi' => 'user/add',
                'menu' => 'masterdata',
                'submenu' => 'User',
                'wilayah' => $this->ModelWilayah->AllData(),
            );
            $this->load->view('template/wrapper_backend', $data, false);
		}else{
			$data = array(
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'no_telepon' => $this->input->post('no_telepon'),
				'jalan' => $this->input->post('jalan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active' => 1,
				'statusDelete' => 1,
				'date_created' => time(),
				'id_wilayah' => $this->input->post('id_wilayah')
			);
			$this->ModelUser->add($data);
			$this->session->set_flashdata('pesan', 'Akun User Berhasil Di Tambahkan!');
			redirect('user');	
		}
		$data = array(
			'title' => 'Tambah User',
			'isi' => 'user/add',
			'menu' => 'masterdata',
			'submenu' => 'User',
			'wilayah' => $this->ModelWilayah->AllData(),
		);
		$this->load->view('template/wrapper_backend', $data, false);
    }

    public function Edit($id_user)
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
                'title' => 'Edit Data Karyawan',
                'isi' => 'user/edit',
                'menu' => 'masterdata',
                'submenu' => 'User',
                'wilayah' => $this->ModelWilayah->AllData(),
                'user' => $this->ModelUser->Data($id_user),
            );
            $this->load->view('template/wrapper_backend', $data, false);
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
			$this->session->set_flashdata('pesan', 'Akun User Berhasil Di Ubah!');
			redirect('user');	
		}
		$data = array(
			'title' => 'Edit Data Karyawan',
			'isi' => 'user/edit',
			'menu' => 'masterdata',
			'submenu' => 'User',
			'wilayah' => $this->ModelWilayah->AllData(),
			'user' => $this->ModelUser->Data($id_user),
		);
		$this->load->view('template/wrapper_backend', $data, false);
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

	public function is_active($id_user){
        $data = array(
            'id_user' => $id_user,
            'is_active' => $this->input->post('is_active'),
        );
        $this->ModelUser->edit($data);
        if($this->input->post('is_active') == 1 ){
        $this->session->set_flashdata('pesan', 'Akun Karyawan Berhasil Di Aktifkan');
        }else{
        $this->session->set_flashdata('pesan', 'Akun Karyawan Berhasil Di Unactive');
        }
        redirect('user');
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
                'isi' => 'User/ganti_password',
                'menu' => 'masterdata',
                'submenu' => 'user',
                'user' => $this->ModelUser->Data($id_user),
            );
            $this->load->view('template/wrapper_backend', $data, false);
		}else{
			$data = array(
                'id_user' => $id_user,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            );
            $this->ModelUser->edit($data);
            $this->session->set_flashdata('pesan', 'Password Berhasil Di Ganti!');
            redirect('User');
		}
    }

    public function Delete( $id_user = NULL )
    {
        $data = array(
			'id_user' => $id_user,
			'statusDelete' => 0,
			'is_active' => 0
		);
        $this->ModelUser->edit($data);
        $this->session->set_flashdata('pesan', 'Akun User Berhasil Dihapus!');
        redirect('user');
    }


}

/* End of file User.php */
