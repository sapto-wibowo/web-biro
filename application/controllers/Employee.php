<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelEmployee');
        $this->load->model('ModelWilayah');
        date_default_timezone_set('Asia/Jakarta');
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Karyawan',
            'subtitle' => 'Data Karyawan',
            'isi' => 'Employee/view',
            'menu' => 'employee',
            'submenu' => '',
            'employee' => $this->ModelEmployee->AllData(),
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function AddData()
    {
        $this->form_validation->set_rules('nama_employee', 'Nama Karyawan', 'required', [
            'required' => 'Nama Karyawan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_employee.username]',[
            'required' => 'Username Tidak Boleh Kosong!',
            'is_unique' => 'Username Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required',[
            'required' => 'Role Harus Di Pilih!'
        ]);
        $this->form_validation->set_rules('no_telepon', 'Nomor telepon', 'required',[
            'required' => 'Nomor telepon Tidak Boleh Kosong!'
        ]);
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
        
        if($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name))
            {
                $data = array(
                    'title' => 'Tambah Karyawan',
                    'isi' => 'Employee/add',
                    'menu' => 'employee',
                    'submenu' => '', 
                    'error' => $this->upload->display_errors(),
                    'employee' => $this->ModelEmployee->AllData(),
                    'wilayah' => $this->ModelWilayah->AllData(),    
                );
                $this->load->view('template/wrapper_backend', $data, false);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] ='./assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_employee'=>$this->input->post('nama_employee'),
                    'username' =>$this->input->post('username'),
                    'id_wilayah' => $this->input->post('id_wilayah'),
                    'role' =>$this->input->post('role'),
                    'telepon' =>$this->input->post('no_telepon'),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'foto' => $upload_data['uploads']['file_name'],
                    'is_active' => 1,
                    'statusDelete' => 1
                );
                $this->ModelEmployee->add($data);
                $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di Tambahkan!');
                redirect('employee');
            }
        }

        $data = array(
            'title' => 'Tambah Karyawan',
            'isi' => 'Employee/add',
            'menu' => 'employee',
            'submenu' => '',
            'employee' => $this->ModelEmployee->AllData(),
            'wilayah' => $this->ModelWilayah->AllData(),    
        );
        $this->load->view('template/wrapper_backend', $data, false);
    }

    public function Edit($id_employee)
    {
        $this->form_validation->set_rules('nama_employee', 'Nama Karyawan', 'required', [
            'required' => 'Nama Karyawan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check',[
            'required' => 'Username Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required',[
            'required' => 'Role Harus Di Pilih!'
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
                    'isi' => 'Employee/edit',
                    'menu' => 'employee',
                    'submenu' => '',
                    'error' => $this->upload->display_errors(),
                    'wilayah' => $this->ModelWilayah->AllData(),    
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
                    'id_wilayah' => $this->input->post('id_wilayah'),
                    'role' =>$this->input->post('role'),
                    'telepon' =>$this->input->post('no_telepon'),
                    'foto' => $upload_data['uploads']['file_name']
                );
                $this->ModelEmployee->edit($data);
                $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di Edit!');
                redirect('employee');
            }
            $data = array(
                'id_employee' => $id_employee,
                'nama_employee'=>$this->input->post('nama_employee'),
                'username' =>$this->input->post('username'),
                'id_wilayah' => $this->input->post('id_wilayah'),
                'role' =>$this->input->post('role'),
                'telepon' =>$this->input->post('no_telepon'),
            );
            $this->ModelEmployee->edit($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di Edit!');
            redirect('employee');
        }
        $data = array(
            'title' => 'Edit Data Karyawan',
            'isi' => 'Employee/edit',
            'menu' => 'employee',
            'submenu' => '',
            'wilayah' => $this->ModelWilayah->AllData(),    
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
                'isi' => 'Employee/ganti_password',
                'menu' => 'employee',
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
            $this->session->set_flashdata('pesan', 'Password Berhasil Di Ganti!');
            redirect('Employee');
		}
    }
        
    public function Delete( $id_employee )
    {
        $data = array(
            'id_employee' => $id_employee,
            'statusDelete' => 0,
            'is_active' => 0,
        );
        $this->ModelEmployee->edit($data);
        $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Dihapus!');
        redirect('employee');
    }

    public function is_active($id_employee){
        $data = array(
            'id_employee' => $id_employee,
            'is_active' => $this->input->post('is_active'),
        );
        $this->ModelEmployee->edit($data);
        if($this->input->post('is_active') == 1 ){
        $this->session->set_flashdata('pesan', 'Akun Karyawan Berhasil Di Aktifkan');
        }else{
        $this->session->set_flashdata('pesan', 'Akun Karyawan Berhasil Di Unactive');
        }
        redirect('Employee');
    }

}

/* End of file Employee.php */
