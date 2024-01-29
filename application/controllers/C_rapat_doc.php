<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rapat_doc extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_rapat");
		$this->load->model("m_rapat_doc");
		if($this->session->userdata('is_login')!=TRUE){
			redirect(site_url("c_login"));
		}
	}
	public function doc_rapat($id=NULL)
	{
		if(!isset($id)) show_404();
		
		$data['doc_rapat'] = $this->m_rapat_doc->getByRapat($id);
		$data['rapat'] = $this->m_rapat->getById($id);
		$data['content'] = 'rapat/v_doc_rapat';
		$this->load->view('template',$data);
	}

	public function tambah(){
		  	$rapat = $this->m_rapat->getById($this->input->post('rapat_id'));
		  	date_default_timezone_set("Asia/Jakarta");
			$file_name = "Rapat" ."-". date('dmYHis');
			
		 	$upload = $this->m_rapat_doc->upload($file_name);
		//   var_dump($upload);
		  if($upload['result'] == "success"){ 
			// Jika proses upload sukses
			$this->m_rapat_doc->save($upload);
			
			redirect('c_rapat_doc/doc_rapat/'.$this->input->post('rapat_id'));
		  }else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			$this->session->set_flashdata('gagal',$upload['error']);
		  }
		
		redirect('c_rapat_doc/doc_rapat/'.$this->input->post('rapat_id'));
	  }

	public function ubah()
	{	
		$this->m_rapat_doc->ubah();
		redirect('c_rapat_doc/doc_rapat/'. $this->input->post('rapat_id'));
	}

	public function hapus($id=NULL,$rapat_id=NULL)
	{
		if(!isset($id)&&!isset($rapat_id)) show_404();
		$data['doc_rapat'] = $this->m_rapat_doc->getById($id);
		// hapus file
		unlink("./assets/dokumentasi/rapat/".$data['doc_rapat']['namafile']);

		$this->m_rapat_doc->hapus($id);
		redirect('c_rapat_doc/doc_rapat/'. $rapat_id);
	}
}
