<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_todo_list extends CI_Model
{
   
    var $_table = 'todo_list';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id]);
    }

    public function tambah($status)
    {
        $post = $this->input->post();
        $data = array(
            'todo_group' => $post['todo_group'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_akhir' => $post['tgl_akhir'],
            'tgl_selesai' => $post['tgl_selesai'],
            'todo' => $post['todo'],
            'status' => $status,
            'user' => $post['user']
        );
        $this->db->insert($this->_table, $data);
    }

    public function ubah()
    {
        $post = $this->input->post();
		if(($post['todo'] && $post["tgl_akhir"] && $post["tgl_mulai"] && $post["tgl_selesai"])!=""){
        $this->db->set('tgl_mulai' , $post['tgl_mulai']);
        $this->db->set('tgl_akhir' , $post['tgl_akhir']);
        $this->db->set('tgl_selesai' , $post['tgl_selesai']);
        $this->db->set('todo' , $post['todo']);
		}
        $this->db->set('status' , $post['status']);
        $this->db->where('id', $post['id']);
        $this->db->update($this->_table);
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

	public function getAllJoin()
	{
		$this->db->select('todo_list.*,tutor.nama AS nama_user,todo_group.nama AS nama_group,todo_group.id AS group_id');
		$this->db->from('todo_list');
		$this->db->join('todo_group', 'todo_group.id = todo_list.todo_group');
		$this->db->join('tutor', 'tutor.id = todo_list.user');
		$query = $this->db->get();
		return $query->result();
	}
	public function getByGroup($id)
	{
		$this->db->select('todo_list.*,tutor.nama AS nama_user,todo_group.nama AS nama_group,todo_group.id AS group_id');
		$this->db->from('todo_list');
		$this->db->join('todo_group', 'todo_group.id = todo_list.todo_group');
		$this->db->join('tutor', 'tutor.id = todo_list.user');
		$this->db->where('todo_list.todo_group',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllTask()
	{
		$this->db->select('todo_list.*,COUNT(todo_task.id) AS jml_list,tutor.nama AS nama_user,todo_group.nama AS nama_group,todo_group.id AS group_id');
		$this->db->select('(SELECT COUNT(todo_task.id) FROM todo_task WHERE todo_task.todo=todo_list.id AND todo_task.status="S") AS jml_selesai');
		$this->db->from('todo_list');
		$this->db->join('todo_task','todo_task.todo=todo_list.id','LEFT');
		$this->db->join('todo_group', 'todo_group.id = todo_list.todo_group');
		$this->db->join('tutor', 'tutor.id = todo_list.user');
		$this->db->group_by('todo_list.id');
		$query = $this->db->get();
		return $query->result();
	}

	public function getByGroupTask($id)
	{
		$this->db->select('todo_list.*,COUNT(todo_task.id) AS jml_list,tutor.nama AS nama_user,todo_group.nama AS nama_group,todo_group.id AS group_id');
		$this->db->select('(SELECT COUNT(todo_task.id) FROM todo_task WHERE todo_task.todo=todo_list.id AND todo_task.status="S") AS jml_selesai');
		$this->db->from('todo_list');
		$this->db->join('todo_task','todo_task.todo=todo_list.id','LEFT');
		$this->db->join('todo_group', 'todo_group.id = todo_list.todo_group');
		$this->db->join('tutor', 'tutor.id = todo_list.user');
		$this->db->where('todo_list.todo_group',$id);
		$this->db->group_by('todo_list.id');
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
