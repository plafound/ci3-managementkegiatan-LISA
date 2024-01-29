<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tutor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_tutor");
		$this->load->library("form_validation");
		$this->m_tutor->cek_login();
    }
    public function index()
    {
        $data['tutor'] = $this->m_tutor->getAll();
		$data['content'] = 'tutor/v_index';
		$this->load->view('template',$data);
    }
    public function form_tambah()
	{
		$data['content'] = 'tutor/v_tambah';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$user = $this->input->post('user');
		$cek_user = $this->m_tutor->cek_user($user)->num_rows();
		if($cek_user <= 0){
			$data['nama'] = $this->input->post('nama');
			$data['username'] = $this->input->post('user');
			$data['jabatan'] = $this->input->post('jabatan');
			$data['password'] = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$pass2 = $this->input->post('password2');
			if($this->input->post('password')==$this->input->post('password2')){
				$this->m_tutor->tambah($data);
				redirect('tutor');
			} else {
				$this->session->set_flashdata('gagal','Password tidak sama!');
				redirect('c_tutor/form_tambah');
			}
		} else {
			$this->session->set_flashdata('gagal','Username sudah ada!');
			redirect('c_tutor/form_tambah');
		}
	}
	public function form_ubah($id)
	{
		if($this->session->userdata('id') == $id){
		$data['tutor'] = $this->m_tutor->getById($id);
		$data['content'] = 'tutor/v_ubah';
		$this->load->view('template',$data);
		} else {
			show_404();
		}
	}
	public function ubah()
	{
			if($this->input->post('password')==$this->input->post('password2')){
				$this->m_tutor->ubah();
				$this->session->set_flashdata('sukses','Data berhasil diubah!');
				redirect('tutor');
			} else {
				$this->session->set_flashdata('gagal','Password tidak sama!');
				redirect('c_tutor/form_ubah/'. $this->input->post('id'));
			}
	}
	public function hapus($id=NULL)
	{	
		if(!isset($id)) show_404();
		$this->m_tutor->hapus($id);
		redirect('tutor');
	}

}
