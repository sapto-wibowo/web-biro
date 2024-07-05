<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('ModelAuth');
    }

    public function login($username){
        $cek = $this->ci->ModelAuth->login_user($username);
        if($cek){
            $id_user = $cek->id_user;
            $username = $cek->username;
            $password = $cek->password;
            $nama_user = $cek->nama_user;
            //buat session
            $this->ci->session->set_userdata('id_user', $id_user);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('password', $password);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            redirect('website');
        }else{
            $this->ci->session->set_flashdata('error', 'masalah');
            redirect('auth/login_user');
        } 
    }
    
    public function proteksi_halaman(){
        if($this->ci->session->userdata('username')==''){
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('auth/login_user');
        }
    }

    public function logout(){
        $this->ci->session->set_userdata('id_user');
        $this->ci->session->set_userdata('username');
        $this->ci->session->set_userdata('Password');
        redirect('website');
    }

    

}

/* End of file User_login.php */

 