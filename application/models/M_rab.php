<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_rab extends CI_Model
{
   
    var $_table = 'rab';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }

	public function getByProposal($id)
	{
        return $this->db->get_where($this->_table, ["proposal_id" => $id])->result();
	}
	public function getByProposalWithSum($id)
	{
		$this->db->select('SUM(total) as total_all');
		$this->db->from($this->_table);
		$this->db->where('proposal_id', $id);
		$query = $this->db->get();
		return $query->row();
	}
    public function tambah()
    {
		$post = $this->input->post();
        $data = array(
            'proposal_id' => $post['proposal_id'],
            'keterangan' => $post['keterangan'],
            'jumlah' => $post['jumlah'],
            'satuan' => $post['satuan'],
            'total' => $post['total'],
        );
        $this->db->insert($this->_table, $data);
    }

    public function ubah()
    {
        $post = $this->input->post();
        $this->db->set('proposal_id', $post["proposal_id"]);
        $this->db->set('keterangan', $post["keterangan"]);
        $this->db->set('jumlah', $post["jumlah"]);
        $this->db->set('satuan', $post["satuan"]);
        $this->db->set('total', $post["total"]);
        $this->db->where('id', $post['id']);
        $this->db->update($this->_table);
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
