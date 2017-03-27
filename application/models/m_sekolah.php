<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sekolah extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login_sekolah'))) {
			redirect('web_login/form/sklh','refresh');
		}
	}	

	public function get_data_alumni()
	{
		return $this->db->get_where("alumni",array('id_sklh' => $this->session->userdata('data_login_sekolah')['id_sklh']))->result();
	}

	public function proses_add($tabel,$data)
	{
		if($this->db->insert($tabel, $data))
		{
			return true;
		}

	}
}

	/* End of file m_sekolah.php */
/* Location: ./application/models/m_sekolah.php */