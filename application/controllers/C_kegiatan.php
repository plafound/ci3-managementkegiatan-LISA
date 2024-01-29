<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kegiatan extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_kegiatan");
		$this->load->model("m_kegiatan_dok");
		$this->load->model("m_panitia");
		$this->load->model("m_proposal");
		$this->load->model("m_laporan");
		$this->load->model("m_rapat");
		if($this->session->userdata('is_login')!=TRUE){
			redirect("c_login");
		} 
	}
	public function index()
	{
		if($this->session->userdata('jabatan')=="1" || $this->session->userdata('jabatan')=="2") {
			$data['kegiatan'] = $this->m_kegiatan->getAll();
			$data['content'] = 'kegiatan/v_index';
			$this->load->view('template',$data);
		} else {
			redirect("c_home");
		}
		
	}
	public function detail($id=NULL)
	{
		if(!isset($id)) show_404();

		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['content'] = 'kegiatan/v_detail';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$this->m_kegiatan->tambah();
		$this->session->set_flashdata('success','Data berhasil ditambah!');
		redirect('c_kegiatan');
	}
	public function ubah()
	{
		$data['id'] = $this->input->post('id');
		$data['kegiatan'] = $this->input->post('kegiatan');
		$data['tgl_mulai'] = $this->input->post('tgl_mulai');
		$this->m_kegiatan->ubah($data);
		redirect('c_kegiatan');
	}
	public function hapus($id=NULL)
	{
		if(!isset($id)) show_404();
		
		$panitia =  $this->m_panitia->getByKegiatan($id);
		$proposal = $this->m_proposal->getByKegiatan($id);
		$laporan = $this->m_laporan->getByKegiatan($id);
		$rapat = $this->m_rapat->getByKegiatan($id);
		$dokumentasi = $this->m_kegiatan_dok->getByKegiatan($id);
		if(count($panitia)>0 && count($proposal)>0 && count($laporan)>0 && count($rapat)>0 ){
			$this->m_kegiatan->hapus($id);
			$this->session->set_flashdata('success','Data berhasil dihapus!');
			redirect('c_kegiatan');
		} else {
			$this->session->set_flashdata('error','Data tidak dapat dihapus!');
			redirect('c_kegiatan');
		}
		// $this->m_kegiatan->hapus($id);
		// redirect('c_kegiatan');
	}

	
}
