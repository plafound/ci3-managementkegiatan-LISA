<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rapat extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_rapat");
		$this->load->model("m_kegiatan");
		$this->load->model("m_panitia");

    }
  
  public function index($id=NULL)
    {
		if(!isset($id)) show_404();
      	$data['kegiatan'] = $this->m_kegiatan->getById($id);
      	$data['rapat'] = $this->m_rapat->getByKegiatan($id);
		$data['content'] = 'rapat/v_index';
		$this->load->view('template',$data);
    }

    public function form_tambah()
	{
		$data['content'] = 'rapat/v_tambah';
		$this->load->view('template',$data);
	}
	public function tambah()
	{

			$this->m_rapat->tambah();
			redirect('c_rapat/index/'.$this->input->post('kegiatan_id'));
			
	}
	public function form_ubah($id=NULL)
	{
		if(!isset($id)) show_404();
		$data['rapat'] = $this->m_rapat->getById($id);
		$data['content'] = 'rapat/v_ubah/';
		$this->load->view('template',$data);

	}
	public function ubah()
	{
		$this->m_rapat->ubah();
		$this->session->set_flashdata('sukses','Data berhasil diubah!');
		redirect('c_rapat/index/'. $this->input->post('kegiatan_id'));
	}
	public function hapus($id=NULL,$kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		$this->m_rapat->hapus($id);
		redirect('c_rapat/index/'. $kegiatan_id);
	}
	public function notulen($id=NULL)
	{
		if(!isset($id)) show_404();
		
		$data['rapat'] = $this->m_rapat->getById($id);
		$data['cek_role'] = $this->m_panitia->cek_jabatan($this->session->userdata('id'),$data['rapat']['kegiatan_id']);
		$data['content'] = 'rapat/v_notulen';
		$this->load->view('template',$data);
	}
	public function form_notulen($id=NULL)
	{
		if(!isset($id)) show_404();
		$data['rapat'] = $this->m_rapat->getById($id);
		$data['content'] = 'rapat/v_ubah_notulen';
		$this->load->view('template',$data);
	}
	public function update_notulen()
	{
		$this->m_rapat->update_notulen();
		redirect('c_rapat/notulen/'.$this->input->post('id'));
	}
	public function hapus_notulen($id=NULL)
	{
		if(!isset($id)) show_404();
		$this->m_rapat->hapus_notulen($id);
		redirect('c_rapat/notulen/'.$id);
	}

}
