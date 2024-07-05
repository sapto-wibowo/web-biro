<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelUser');
		$this->load->model('ModelWilayah');
		date_default_timezone_set('Asia/Jakarta');
	}
	

    public function login_admin()
    {
		$this->form_validation->set_rules('username', 'username', 'required', array(
			'required' => 'Username Tidak Boleh Kosong!'
		));
		$this->form_validation->set_rules('password', 'password', 'required', array(
			'required' => 'Password Tidak Boleh Kosong!'
		));

		if($this->form_validation->run() == TRUE){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$employee = $this->db->get_where('tbl_employee', ['username' => $username])->row_array();
			if($employee){
				if($employee['statusDelete'] == 1) {
					if(password_verify($password, $employee['password'])) {
						if($employee['is_active'] == 1){
							$this->adminlogin->login($username);
						}else{
						$this->session->set_flashdata('error', 'Akun Tidak Aktif!');
						}
					}else{
						$this->session->set_flashdata('error', 'Password Salah!');
					}
				}else{
					$this->session->set_flashdata('error', 'Akun Sudah Di Hapus!');
				}
			}else{
				$this->session->set_flashdata('error', 'Username Tidak Terdaftar!');
			}
		}
		$data = array(
			'title' => 'Login Admin',
		);
		$this->load->view('Employee/login_admin', $data, FALSE);
		
    }

	public function logout(){
		$this->adminlogin->logout();
	}

	public function login_user()
	{
		$this->form_validation->set_rules('username', 'username', 'required', array(
			'required' => 'Username Tidak Boleh Kosong!'
		));
		$this->form_validation->set_rules('password', 'password', 'required', array(
			'required' => 'Password Tidak Boleh Kosong!'
		));

		if($this->form_validation->run() == TRUE){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
			if($user){
				if($user['statusDelete'] == 1){
					if(password_verify($password, $user['password'])) {
						if($user['is_active'] == 1){
							$this->userlogin->login($username);
						}else{
						$this->session->set_flashdata('error', 'Akun Tidak Aktif!');
						}
					}else{
						$this->session->set_flashdata('error', 'Password Salah!');
					}
				}else{
					$this->session->set_flashdata('error', 'Username Tidak terdaftar!');
				}
			}else{
				$this->session->set_flashdata('error', 'Username Tidak Terdaftar!');
			}
		}
		$data = array(
			'title' => 'Login User',
		);
		$this->load->view('User/login', $data, FALSE);
	}

	public function register_user()
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
				'title' => 'User Registration',
				'wilayah' => $this->ModelWilayah->AllData()
			);
			$this->load->view('User/register', $data);
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
			$this->session->set_flashdata('pesan', 'Registrasi Berhasil, Silahkan Login!');
			redirect('auth/login_user');
		}		
	}
	
	public function signout(){
		$this->userlogin->logout();
	}
}

/* End of file Controllername.php */
