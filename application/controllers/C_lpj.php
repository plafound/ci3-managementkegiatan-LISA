<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lpj extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_panitia");
		$this->load->model("m_laporan");
		$this->load->model("m_lpj");
		if($this->session->userdata('is_login')!=TRUE){
			redirect(site_url("c_login"));
		}
	}
	public function index($id=NULL)
	{
		if(!isset($id)) show_404();
		$data['laporan'] = $this->m_laporan->getById($id);
		$kegiatan_id = $data['laporan'][0]->kegiatan_id;
		$data['cek_role'] = $this->m_panitia->cek_jabatan($this->session->userdata('id'),$kegiatan_id);
		$data['lpj'] = $this->m_lpj->getByLaporan($id);
		$laporan_id = $data['laporan'][0]->id;
		$data['total_lpj'] = $this->m_lpj->getByLaporanWithSum($laporan_id);
		$data['content'] = 'lpj/v_index';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$this->m_lpj->tambah();
		$this->session->set_flashdata('success','Data berhasil ditambah!');
		redirect('c_lpj/index/'.$this->input->post('laporan_id'));
	}
	public function ubah()
	{
		$this->m_lpj->ubah();
		redirect('c_lpj/index/'.$this->input->post('laporan_id'));
	}
	public function hapus($id=NULL,$laporan_id=NULL)
	{
		if(!isset($id)&&!isset($laporan_id)) show_404();
		
		$this->m_lpj->hapus($id);
		redirect('c_lpj/index/'.$laporan_id);
	}
}
