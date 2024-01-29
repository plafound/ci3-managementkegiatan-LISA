<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_proposal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
				$this->load->model('m_kegiatan');
				$this->load->model('m_proposal');
				$this->load->model('m_panitia');
				$this->load->model('m_rab');
				$this->load->library("form_validation");
				if($this->session->userdata('is_login')!=TRUE){
					redirect(site_url("c_login"));
				}
    }
    // public function proposal($id)
    // {
	// 	$data['kegiatan'] = $this->m_kegiatan->getById($id);
	// 	$data['proposal'] = $this->m_proposal->getByKegiatan($id);
	// 	$data['content'] = 'proposal/v_index';
	// 	$this->load->view('template',$data);
    // }

	public function tambah($id=NULL)
	{
		if(!isset($id)) show_404();
		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['content'] = 'proposal/v_tambah';
		$this->load->view('template',$data);
	}
	public function aksi_tambah()
	{
		
		$this->m_proposal->tambah();
		redirect('c_proposal/lihat/'.$this->input->post('kegiatan_id'));
	}
	public function form_ubah($id=NULL)
	{
		if(!isset($id)) show_404();
		$data['proposal'] = $this->m_proposal->getById($id);
		$data['content'] = 'proposal/v_ubah';
		$this->load->view('template',$data);
	}
	public function ubah()
	{
		$this->m_proposal->ubah();
		redirect('c_proposal/lihat/'.$this->input->post('kegiatan_id'));
	}
	public function hapus($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		$this->m_proposal->hapus($id);
		redirect('c_proposal/lihat/'.$kegiatan_id);
	}
	public function lihat($id=NULL)
	{
		if(!isset($id)) show_404();

		$data['cek_role'] = $this->m_panitia->cek_jabatan($this->session->userdata('id'),$id);
		
		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['proposal'] = $this->m_proposal->getByKegiatan($id);
		$proposal_id = $data['proposal']['id'];
		$data['rab'] = $this->m_rab->getByProposal($proposal_id);
		$data['total_rab'] = $this->m_rab->getByProposalWithSum($proposal_id);
		$data['content'] = 'proposal/v_proposal';
		$this->load->view('template',$data);
	}

	public function acc_kpnt($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		$this->m_proposal->acc_kpnt($id);
		redirect('c_proposal/lihat/'.$kegiatan_id);
	}
	public function acc_bpkbm($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_proposal->acc_bpkbm($id);
		redirect('c_proposal/lihat/'.$kegiatan_id);
	}
	public function acc_kpkbm($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_proposal->acc_kpkbm($id);
		redirect('c_proposal/lihat/'.$kegiatan_id);
	}
	
	public function revisi_kpnt($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_proposal->revisi_kpnt($id);
		redirect('c_proposal/lihat/'.$kegiatan_id);
	}
	public function revisi_bpkbm($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_proposal->revisi_bpkbm($id);
		redirect('c_proposal/lihat/'.$kegiatan_id);
	}
	public function revisi_kpkbm($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		
		$this->m_proposal->revisi_kpkbm($id);
		redirect('c_proposal/lihat/'.$kegiatan_id);
	}

	public function cetak($id=NULL)
	{
		if(!isset($id)) show_404();
		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['proposal'] = $this->m_proposal->getByKegiatan($id);
		
		$proposal_id = $data['proposal']['id'];
		$data['rab'] = $this->m_rab->getByProposal($proposal_id);
		$data['total_rab'] = $this->m_rab->getByProposalWithSum($proposal_id);
		$judul_proposal = $data['proposal']['judul'];
		
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        // title dari pdf
        $data['title_pdf'] = $judul_proposal .'_'. date('d-m-Y');
        // filename dari pdf ketika didownload
        $file_pdf = $judul_proposal .'_'. date('d-m-Y');
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('proposal/v_cetak',$data, true);	    
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
	

	
}


