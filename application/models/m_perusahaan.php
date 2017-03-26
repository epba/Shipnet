<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perusahaan extends CI_Model {

	public function proses_tambah_loker($data)
	{
		if($this->db->insert('loker', $data)){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_data_loker()
	{
		return $this->db->get_where("loker",array('id_pengirim_lok' => $this->session->userdata('data_login_perusahaan')['id_per']))->result();
	}

	public function proses_hapus_loker($id,$img)
	{
		$this->db->where('id_lok', $id);
		$hps = $this->db->delete('loker');
		if ($hps) {
			if(file_exists("assets/upload/loker/".$img)){
				@unlink("assets/upload/loker/".$img);
			}
			return true;
		}
	}
}

/* End of file m_perusahaan.php */
/* Location: ./application/models/m_perusahaan.php */