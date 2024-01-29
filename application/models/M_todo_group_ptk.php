<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_todo_group_ptk extends CI_Model
{
   
    var $_table = 'todo_group_ptk';

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

    public function ubah()
    {
        $post = $this->input->post();
        $this->db->set('todo_group', $post["todo_group"]);
        $this->db->set('ptk_id', $post["ptk_id"]);
        $this->db->where('id', $post['id']);
        $this->db->update($this->_table);
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
	public function getByGroup($id)
	{
		$this->db->select('todo_group_ptk.*,tutor.nama');
		$this->db->from('todo_group_ptk');
		$this->db->join('tutor', 'tutor.id = todo_group_ptk.ptk','LEFT');
		$this->db->where('todo_group',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function hapus_group($id)
	{
		return $this->db->delete($this->_table, array("todo_group" => $id));
	}

	public function cek_data($ptk,$todo_group)
	{
       return $this->db->get_where($this->_table, ["ptk" => $ptk,"todo_group"=>$todo_group])->num_rows();
	}
	public function cek_group($id)
	{
       return $this->db->get_where($this->_table, ["ptk" => $id]);
	}
	public function getGroup($id)
	{
		$this->db->select('todo_group_ptk.*,todo_group.nama');
		$this->db->from($this->_table);
		$this->db->join('todo_group', 'todo_group.id = todo_group_ptk.todo_group');
		$this->db->where('ptk',$id);
		$query = $this->db->get();
		return $query->result();
	}
	public function hapusByTutor($id)
	{
		return $this->db->delete($this->_table, array("ptk" => $id));
	}

	public function cekGroup($id,$ptk)
	{
        return $this->db->get_where($this->_table, ["todo_group" => $id,"ptk"=>$ptk])->num_rows();
		// $this->db->select('*');
		// $this->db->from($this->_table);
		// $this->db->where('todo_group',$id);
		// $this->db->where('ptk',$ptk);
		// $query = $this->db->get();
		// return $query->result();
	}
}
