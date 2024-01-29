<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_panitia extends CI_Model
{
   
    var $_table = 'panitia';

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
        return $this->db->get_where($this->_table, ["kegiatan_id" => $id])->row_array();
    }
	public function cek_kpnt($id_kegiatan)
	{
		return $this->db->get_where($this->_table, ["jabatan" => 1, "kegiatan_id" => $id_kegiatan]);
	}
	public function getAllJoin($id)
    {
        $this->db->select('panitia.*,tutor.nama as nama_tutor,tutor.id as id_tutor');
		$this->db->from('panitia');
		$this->db->join('tutor', 'tutor.id = panitia.tutor_id');
		$this->db->where('kegiatan_id', $id);
		$query = $this->db->get();
		return $query->result();
    }
	public function getKegiatanTutor()
	{
		$this->db->select('panitia.*,kegiatan.kegiatan,tutor.nama');
		$this->db->from('panitia');
		$this->db->join('kegiatan', 'kegiatan.id = panitia.kegiatan_id');
		$this->db->join('tutor', 'tutor.id = panitia.tutor_id');
		$this->db->where('tutor.id', $this->session->userdata('id'));
		$query = $this->db->get();
		return $query->result();
	}

    public function tambah()
    {
		$post = $this->input->post();
        $data = array(
            'kegiatan_id' => $post['kegiatan_id'],
            'tutor_id' => $post['tutor_id'],
            'jabatan' => $post['jabatan'],
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
	
	// Jabatan 1 = Ketua Panitia,2 = Sekretaris,3 Bendahara
    public function cek_jabatan($id,$kegiatan_id)
	{
		return $this->db->get_where($this->_table, ['tutor_id' => $id,'kegiatan_id'=>$kegiatan_id])->row_array();
	}
}
