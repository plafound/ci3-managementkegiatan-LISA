<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('m_panitia');
		$this->load->model('m_tutor');
		$this->load->model('m_rapat');
		$this->load->model('m_kegiatan');
		if($this->session->userdata('is_login')!=TRUE){
			redirect(site_url("c_login"));
		}
	}
	public function index()
	{
		$data['kegiatan'] = $this->m_panitia->getKegiatanTutor();
		$data['jumlah_kegiatan'] = count($this->m_kegiatan->getAll());
		$data['jumlah_tutor'] = count($this->m_tutor->getAll());
		$data['jumlah_rapat'] = count($this->m_rapat->getAll());
		$this->load->view('home',$data);

	}
}
