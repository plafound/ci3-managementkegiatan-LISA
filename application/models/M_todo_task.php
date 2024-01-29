<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_todo_task extends CI_Model
{
   
    var $_table = 'todo_task';

    public function getAll()
    {
        return $this->db->get($this->_table);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id]);
    }

    public function tambah($status)
    {
        $post = $this->input->post();
        $data = array(
            'todo' => $post['todo'],
			'task' => $post['task'],
            'tgl_mulai' => "",
            'tgl_selesai' => "",
            'status' => $status,
        );
        $this->db->insert($this->_table, $data);
    }

    public function ubah()
    {
        $post = $this->input->post();
		if(($post['todo'] && $post["task"])!=""){
        $this->db->set('todo', $post["todo"]);
        $this->db->set('task', $post["task"]);
		}
        $this->db->where('id', $post['id']);
        $this->db->update($this->_table);
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
	public function hapusByList($id)
	{
        return $this->db->delete($this->_table, array("todo" => $id));

	}

	public function getByTodo($id)
	{
        $this->db->select('*');
		$this->db->from('todo_task');
		$this->db->where('todo',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_selesai()
	{
		$this->db->select('*');
		$this->db->from('todo_task');
		$this->db->where('status','S');
		// $this->db->group_by('todo');
		$query = $this->db->get();
		return $query->result();
	}

	public function dikerjakan($id,$date)
	{
		$post = $this->input->post();
        $this->db->set('tgl_mulai', $date);
        $this->db->set('status', 'D');
		$this->db->where('id', $id);
        $this->db->update($this->_table);
	}

	public function selesai($id,$date)
	{
		$post = $this->input->post();
        $this->db->set('tgl_selesai', $date);
        $this->db->set('status', 'S');
		$this->db->where('id', $id);
        $this->db->update($this->_table);
	}
	public function batal($id)
	{
		$this->db->set('status', 'B');
		$this->db->set('tgl_mulai', '');
		$this->db->set('tgl_selesai', '');
		$this->db->where('id', $id);
        $this->db->update($this->_table);
	}
}
