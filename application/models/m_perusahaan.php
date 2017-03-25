<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perusahaan extends CI_Model {

	public function get_data_loker()
	{
		return $this->db->get_where('loker', array('id_pengirim_lok',$this->session->userdata("id_per")))->result();
	}

}

/* End of file m_perusahaan.php */
/* Location: ./application/models/m_perusahaan.php */