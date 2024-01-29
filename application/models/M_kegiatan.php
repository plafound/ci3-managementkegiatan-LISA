<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kegiatan extends CI_Model
{
   
    var $_table = 'kegiatan';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }

    public function tambah()
    {
		$post = $this->input->post();
        $data = array(
            'kegiatan' => $post['kegiatan'],
            'tgl_mulai' => $post['tgl_mulai'],
        );
        $this->db->insert($this->_table, $data);
    }

    public function ubah($data)
    {
        return $this->db->update($this->_table, $data, array('id' => $data['id']));
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
