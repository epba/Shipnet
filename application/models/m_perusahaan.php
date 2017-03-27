<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perusahaan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login_perusahaan'))) {
			redirect('web_login/form/per','refresh');
		}
	}

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
			if(file_exists("assets/upload/loker"."/".$img)){
				@unlink("assets/upload/loker"."/".$img);
			}
			return true;
		}
	}

	public function data_lama_loker($id)
	{
		$this->db->where('id_lok', $id);
		return $this->db->get('loker')->row();
	}

	public function proses_edit_loker($data)
	{
		// hapus foto lama
		$get_img = $this->db->get_where("loker",array('id_lok' => $this->uri->segment(4)))->row();
		if(file_exists("assets/upload/loker"."/".$get_img->foto_lok)){
			@unlink("assets/upload/loker"."/".$get_img->foto_lok);
		}
		// hapus foto lama
		// update db
		$this->db->where('id_lok', $this->uri->segment(4));
		$update = $this->db->update("loker", $data);
		if($update){
			return true;
		}
		// update db
	}
}

/* End of file m_perusahaan.php */
/* Location: ./application/models/m_perusahaan.php */