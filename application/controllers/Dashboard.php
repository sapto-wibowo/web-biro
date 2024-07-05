<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelDashboard');
        $this->load->model('ModelEmployee');
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => '',
            'isi' => 'Dashboard/dashboard',
            'total_employee' => $this->ModelDashboard->total_employee(),
            'total_user' => $this->ModelDashboard->total_user(),
            'total_belum_proses' => $this->ModelDashboard->total_belum_proses(),
            'total_sudah_proses' => $this->ModelDashboard->total_sudah_proses(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function edit($id_employee = NULL) {
        $this->form_validation->set_rules('nama_employee', 'Nama Karyawan', 'required', [
            'required' => 'Nama Karyawan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check',[
            'required' => 'Username Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('no_telepon', 'Nomor telepon', 'required',[
            'required' => 'Nomor telepon Tidak Boleh Kosong!'
        ]);

        if($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name))
            {
                $data = array(
                    'title' => 'Edit Data Karyawan',
                    'isi' => 'Dashboard/edit',
                    'menu' => 'dashboard',
                    'submenu' => '',
                    'error' => $this->upload->display_errors(),
                    'employee' => $this->ModelEmployee->Data($id_employee),
                );
                $this->load->view('template/wrapper_backend', $data, false);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] ='./assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_employee' => $id_employee,
                    'nama_employee'=>$this->input->post('nama_employee'),
                    'username' =>$this->input->post('username'),
                    'telepon' =>$this->input->post('no_telepon'),
                    'foto' => $upload_data['uploads']['file_name']
                );
                $this->ModelEmployee->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Ganti!, Silahkan Login Kembali Untuk Memperbarui Sesi Data');
                redirect('Auth/logout');
            }
            $data = array(
                'id_employee' => $id_employee,
                'nama_employee'=>$this->input->post('nama_employee'),
                'username' =>$this->input->post('username'),
                'telepon' =>$this->input->post('no_telepon'),
            );
            $this->ModelEmployee->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Ganti!, Silahkan Login Kembali!');
            redirect('Auth/logout');
        }
        $data = array(
            'title' => 'Edit Data Karyawan',
            'isi' => 'Dashboard/edit',
            'menu' => 'dashboard',
            'submenu' => '',
            'employee' => $this->ModelEmployee->Data($id_employee),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    function username_check(){
        $post = $this->input->post(null, true);
        $query = $this->db->query("SELECT * FROM tbl_employee WHERE username = '$post[username]' AND id_employee != '$post[id_employee]'");
        if($query->num_rows() > 0){
            $this->form_validation->set_message('username_check', 'Username Sudah Terdaftar!');
            return false;
        }else{
            return true;
        }
    }

    public function ganti_password($id_employee){
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
                'isi' => 'Dashboard/ganti_password',
                'menu' => 'dashboard',
                'submenu' => '',
                'employee' => $this->ModelEmployee->Data($id_employee),
            );
            $this->load->view('template/wrapper_backend', $data, false);
		}else{
			$data = array(
                'id_employee' => $id_employee,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            );
            $this->ModelEmployee->edit($data);
            $this->session->set_flashdata('pesan', 'Password Berhasil Di Ganti!, Silahkan Login Kembali!');
            redirect('Dashboard');
		}
    }

}

/* End of file Dashboard.php */
