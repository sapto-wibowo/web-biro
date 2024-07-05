<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('ModelAuth');
    }

    public function login($username){
        $cek = $this->ci->ModelAuth->login_admin($username);
        if($cek){
            $id_employee = $cek->id_employee;
            $username = $cek->username;
            $password = $cek->password;
            $nama_employee = $cek->nama_employee;
            $foto = $cek->foto;
            $telepon = $cek->telepon;
            $wilayah = $cek->nama_wilayah;
            $role = $cek->role;
            //buat session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('id_employee', $id_employee);
            $this->ci->session->set_userdata('password', $password);
            $this->ci->session->set_userdata('nama_employee', $nama_employee);
            $this->ci->session->set_userdata('foto', $foto);
            $this->ci->session->set_userdata('telepon', $telepon);
            $this->ci->session->set_userdata('wilayah', $wilayah);
            $this->ci->session->set_userdata('role', $role);
            redirect('dashboard');
        }else{
            $this->ci->session->set_flashdata('error', 'Terjadi Kesalahan!');
            redirect('auth/login_admin');
        } 
    }
    
    public function proteksi_halaman(){
        if($this->ci->session->userdata('username')==''){
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('auth/login_admin');
        }
    }

    public function logout(){
        $this->ci->session->set_userdata('id_employee');
        $this->ci->session->set_userdata('username');
        $this->ci->session->set_userdata('password');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout');
        redirect('auth/login_admin');
    }

    

}

/* End of file User_login.php */

 