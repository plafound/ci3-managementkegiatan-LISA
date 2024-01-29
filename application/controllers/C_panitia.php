<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_panitia extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_tutor");
		$this->load->model("m_panitia");
		$this->load->model("m_kegiatan");
    }
    public function index($id=NULL)
    {
		if(!isset($id)) show_404();
		$data['kegiatan'] = $this->m_kegiatan->getById($id);
		$data['tutor'] = $this->m_tutor->getTutor();
        $data['panitia'] = $this->m_panitia->getAllJoin($id);
		$data['content'] = 'panitia/v_index';
		$this->load->view('template',$data);
    }
    public function form_tambah()
	{
		$data['content'] = 'panitia/v_tambah';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$id = $this->input->post('id');
		$kegiatan_id = $this->input->post('kegiatan_id');
		$cek_kpnt = $this->m_panitia->cek_kpnt($kegiatan_id)->num_rows();
		// var_dump($cek_kpnt);
		if($cek_kpnt <= 0){
			$this->m_panitia->tambah();
			redirect('c_panitia/index/'.$this->input->post('kegiatan_id'));
		} else {
			$this->session->set_flashdata('gagal','Ketua Panitia sudah ada!');
			redirect('c_panitia/index/'.$this->input->post('kegiatan_id'));
		}
	}

	public function hapus($id=NULL, $kegiatan_id=NULL)
	{
		if(!isset($id)&&!isset($kegiatan_id)) show_404();
		$this->m_panitia->hapus($id);
		redirect('c_panitia/index/'. $kegiatan_id);
	}

}
