<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model('m_tutor');
    }

    public function index()
    {
		if($this->session->userdata('is_login')==TRUE){
			redirect('home');
		} else{
		$data['title'] = 'Login Lisa Kegiatan | Sekolah LISA';
        $this->load->view('auth/templates/auth_header',$data);
        $this->load->view('auth/login');
        $this->load->view('auth/templates/auth_footer');
	}
    }

    public function proses(){
        $user = $this->input->post('username', TRUE);
        $pass = $this->input->post('password', TRUE);

		if($this->m_tutor->login_user($user,$pass))
		{
			redirect('home');
		}else {
			$this->session->set_flashdata('error','Username & Password salah');
			redirect('c_login');
		}
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url('c_login'));
    }
}
