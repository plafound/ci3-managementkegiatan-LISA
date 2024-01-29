<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_rapat extends CI_Model
{
   
    var $_table = 'rapat';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }

    public function getByKegiatan($id)
    {
        return $this->db->get_where($this->_table, ["kegiatan_id" => $id])->result();
    }

    public function tambah()
    {
		$post = $this->input->post();
        $data = array(
            'kegiatan_id' => $post['kegiatan_id'],
            'tanggal' => $post['tanggal'],
            'jam_mulai' => $post['jam_mulai'],
            'lokasi' => $post['lokasi'],
        );
        $this->db->insert($this->_table, $data);
    }
	public function update_notulen()
	{
		$post = $this->input->post();
		$this->db->set('notulen', $post['notulen']);
		$this->db->where('id', $post['id']);
		$this->db->update($this->_table);
	}
	public function hapus_notulen($id)
	{
		$post = $this->input->post();
		$this->db->set('notulen', "");
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}

    public function ubah($data)
    {
        $post = $this->input->post();
        $this->db->set('kegiatan_id', $post["kegiatan_id"]);
        $this->db->set('tanggal', $post["tanggal"]);
        $this->db->set('jam_mulai', $post["jam_mulai"]);
        $this->db->set('lokasi', $post["lokasi"]);
        $this->db->where('id', $post["id"]);
        $this->db->update($this->_table);
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}
