<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_todo_group extends CI_Model
{
   
    var $_table = 'todo_group';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function ubah($data,$id)
    {
        return $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
	public function cek_data($id)
	{
       return $this->db->get_where($this->_table, ["id" => $id])->num_rows();
	}
}
