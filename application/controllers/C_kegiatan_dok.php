<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kegiatan_dok extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_kegiatan");
		$this->load->model("m_kegiatan_dok");
		if($this->session->userdata('is_login')!=TRUE){
			redirect(site_url("c_login"));
		}
	}
	public function dokumentasi($id=NULL)
	{
		if(!isset($id)) show_404();
		
		$data['dokumentasi'] = $this->m_kegiatan_dok->getByKegiatan($id);
		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['content'] = 'kegiatan/v_dokumentasi';
		$this->load->view('template',$data);
	}

	public function tambah(){
		  	$kegiatan = $this->m_kegiatan->getById($this->input->post('kegiatan_id'));
		  	date_default_timezone_set("Asia/Jakarta");
			$file_name = $kegiatan['kegiatan'] ."-". date('dmYHis');
			
		 	$upload = $this->m_kegiatan_dok->upload($file_name);
		//   var_dump($upload);
		  if($upload['result'] == "success"){ 
			// Jika proses upload sukses
			$this->m_kegiatan_dok->save($upload);
			
			redirect('c_kegiatan_dok/dokumentasi/'.$this->input->post('kegiatan_id'));
		  }else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			$this->session->set_flashdata('gagal',$upload['error']);
		  }
		
		redirect('c_kegiatan_dok/dokumentasi/'.$this->input->post('kegiatan_id'));
	  }


	  
	public function form_edit($id=NULL)
	{
		if(!isset($id)) show_404();
		
		$data['dokumentasi'] = $this->m_kegiatan_dok->getByKegiatan($id);
		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['content'] = 'kegiatan/v_edit_dok';
		$this->load->view('template',$data);
	}
	public function ubah()
	{	
		$this->m_kegiatan_dok->ubah();
		redirect('c_kegiatan_dok/dokumentasi/'. $this->input->post('kegiatan_id'));
	}

	public function hapus($id,$kegiatan)
	{
		$data['dokumentasi'] = $this->m_kegiatan_dok->getById($id);
		// hapus file
		unlink("./assets/dokumentasi/kegiatan/".$data['dokumentasi']['namafile']);

		$this->m_kegiatan_dok->hapus($id);
		redirect('c_kegiatan_dok/dokumentasi/'. $kegiatan);
	}
}
