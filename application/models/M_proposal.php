<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_proposal extends CI_Model
{
   
    var $_table = 'proposal';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->result();
    }
	public function getByKegiatan($id)
    {
        return $this->db->get_where($this->_table, ["kegiatan_id" => $id])->row_array();
    }

    public function tambah()
    {
		$post = $this->input->post();
        $data = array(
            'kegiatan_id' => $post['kegiatan_id'],
            'judul' => $post['judul'],
            'tgl_selesai' => $post['tgl_selesai'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tujuan' => $post['tujuan'],
        );
        $this->db->insert($this->_table, $data);
    }

    public function ubah()
    {
        $post = $this->input->post();
        $this->db->set('judul', $post["judul"]);
        $this->db->set('tgl_mulai', $post["tgl_mulai"]);
        $this->db->set('tgl_selesai', $post["tgl_selesai"]);
        $this->db->set('tujuan', $post["tujuan"]);
        $this->db->where('id', $post['id']);
        $this->db->update($this->_table);
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

	public function acc_kpnt($id)
	{
		$this->db->set('acc_kpnt', $this->session->userdata('id'));
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}
	public function acc_bpkbm($id)
	{
		$this->db->set('acc_bpkbm', $this->session->userdata('id'));
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}
	public function acc_kpkbm($id)
	{
		$this->db->set('acc_kpkbm', $this->session->userdata('id'));
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}
	
	public function revisi_kpnt($id)
	{
		$this->db->set('acc_kpnt', '0');
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}
	public function revisi_bpkbm($id)
	{
		$this->db->set('acc_bpkbm', '0');
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}
	public function revisi_kpkbm($id)
	{
		$this->db->set('acc_kpkbm', '0');
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}
}
