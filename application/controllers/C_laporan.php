<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporan extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_kegiatan");
		$this->load->model("m_laporan");
		$this->load->model("m_panitia");
		$this->load->model("m_lpj");
		if($this->session->userdata('is_login')!=TRUE){
			redirect(site_url("c_login"));
		}
	}
	public function index($id=NULL)
	{
		if(!isset($id)) show_404();
		$data['cek_role'] = $this->m_panitia->cek_jabatan($this->session->userdata('id'),$id);
		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['laporan'] = $this->m_laporan->getByKegiatan($id);
		$laporan_id = $data['laporan']['id'];
		$data['lpj'] = $this->m_lpj->getByLaporan($laporan_id);
		$data['total_lpj'] = $this->m_lpj->getByLaporanWithSum($laporan_id);
		$data['content'] = 'laporan/v_index';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$this->m_laporan->tambah();
		$this->session->set_flashdata('success','Data berhasil ditambah!');
		redirect('c_laporan/index/'.$this->input->post('kegiatan_id'));
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
		
		$this->m_kegiatan->hapus($id);
		redirect('c_kegiatan');
	}
	public function cetak($id=NULL)
	{
		if(!isset($id)) show_404();

		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['laporan'] = $this->m_laporan->getByKegiatan($id);
		$laporan_id = $data['laporan']['id'];
		$data['lpj'] = $this->m_lpj->getByLaporan($laporan_id);
		$data['total_lpj'] = $this->m_lpj->getByLaporanWithSum($laporan_id);
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        // title dari pdf
        $data['title_pdf'] = 'Laporan ' . $data['kegiatan']['kegiatan'] .date('d-m-Y');
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan ' . $data['kegiatan']['kegiatan'] .date('d-m-Y');
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('laporan/v_cetak',$data, true);	    
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}

	
	public function acc_kpnt($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		$this->m_laporan->acc_kpnt($id);
		redirect('c_laporan/index/'.$kegiatan_id);
	}
	public function acc_bpkbm($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_laporan->acc_bpkbm($id);
		redirect('c_laporan/index/'.$kegiatan_id);
	}
	public function acc_kpkbm($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_laporan->acc_kpkbm($id);
		redirect('c_laporan/index/'.$kegiatan_id);
	}
	
	public function revisi_kpnt($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_laporan->revisi_kpnt($id);
		redirect('c_laporan/index/'.$kegiatan_id);
	}
	public function revisi_bpkbm($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_laporan->revisi_bpkbm($id);
		redirect('c_laporan/index/'.$kegiatan_id);
	}
	public function revisi_kpkbm($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_laporan->revisi_kpkbm($id);
		redirect('c_laporan/index/'.$kegiatan_id);
	}

	
}
