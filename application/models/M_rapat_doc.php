<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_rapat_doc extends CI_Model
{
   
    var $_table = 'rapat_dok';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }
	public function getByRapat($id)
	{
        return $this->db->get_where($this->_table, ["rapat_id" => $id])->result();
	}


    public function ubah()
    {
		$post = $this->input->post();
        $this->db->set('keterangan', $post["keterangan"]);
        $this->db->where('id', $post['id']);
        $this->db->update($this->_table);
    }

    public function hapus($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
	
	  // Fungsi untuk melakukan proses upload file  
      public function upload($file_name)
	  {    
		$config['upload_path'] = './assets/dokumentasi/rapat';    
		$config['allowed_types'] = 'jpg|png|jpeg|mp4|';    
		// $config['max_size']  = '2048';    
		$config['file_name'] = $file_name;
		$config['remove_space'] = TRUE;
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file_doc'))
		{ 
			// Lakukan upload dan Cek jika proses upload berhasil      // Jika berhasil :      
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');     
			 return $return;
		  }else{      
			  // Jika gagal :      
			  $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      
			  return $return;    
		  }  
	  }    
	  // Fungsi untuk menyimpan data ke database  
	  public function save($upload){    
		  $data = array(
			  'rapat_id'=>$this->input->post('rapat_id'),
			  'namafile' => $upload['file']['file_name'],     
			  'keterangan'=>$this->input->post('keterangan'),
		  );        
		  $this->db->insert($this->_table, $data);  
	  }
}
