<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rab extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_rab');
		$this->load->model('m_proposal');
		$this->load->model('m_panitia');
		$this->load->library("form_validation");
		if($this->session->userdata('is_login')!=TRUE){
			redirect(site_url("c_login"));
		}
    }
    public function index($id=NULL)
    {
		if(!isset($id)) show_404();
		$data['cek_role'] = $this->m_panitia->cek_jabatan($this->session->userdata('id'));
		$data['proposal'] = $this->m_proposal->getById($id);
		$data['rab'] = $this->m_rab->getByProposal($id);
		$data['total_rab'] = $this->m_rab->getByProposalWithSum($id);
		$data['content'] = 'rab/v_index';
		$this->load->view('template', $data);
    }

		public function tambah()
		{
			$this->m_rab->tambah();
			$this->session->set_flashdata('success','Data berhasil ditambahkan!');
			redirect('c_rab/index/'.$this->input->post('proposal_id'));
		}
		public function ubah()
		{
			$this->m_rab->ubah();
			$this->session->set_flashdata('success','Data berhasil diubah!');
			redirect('c_rab/index/'.$this->input->post('proposal_id'));
		}
		public function hapus($id=NULL,$proposal_id=NULL)
		{
			if(!isset($id)&&!isset($proposal_id)) show_404();
			$this->m_rab->hapus($id);
			$this->session->set_flashdata('success','Data berhasil dihapus!');
			redirect('c_rab/index/'.$proposal_id);
		}
}


