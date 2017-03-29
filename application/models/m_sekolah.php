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

	public function cek_data_alumni($username)
	{
		$cek = $this->db->get_where("alumni",array('username_al' => $username))->result();
		$perintah = (COUNT($cek) > 0) ? "Reject" : "Accept" ;
		return $perintah;
	}

	public function get_loker()
	{
		$this->db->select("loker.*,perusahaan.id_per,sekolah.id_sklh");
		$this->db->from('loker');
		$this->db->join("perusahaan", "perusahaan.id_per = loker.id_pengirim_lok");
		$this->db->join("sekolah", "perusahaan.add_by = sekolah.id_sklh");
		$get = $this->db->get()->result();
		return $get;
	}

	public function proses_acc_loker($id)
	{
		$this->db->where('id_lok', $id);
		$update	= $this->db->update('loker', array('verifikasi_lok' => "1", 'verifikasi_by_lok' => $this->session->userdata('data_login_sekolah')['id_sklh']));
		if($update)
		{
			return true;
		}
	}

	public function get_detail_loker($id)
	{
		return $this->db->get_where("loker",array("id_lok" => $id))->row();
	}

	public function proses_add($tabel,$data)
	{
		if($this->db->insert($tabel, $data))
		{
			return true;
		}
	}

	public function proses_hapus($id,$tabel)
	{
		$id_tabel      = ($tabel == "perusahaan") ? "id_per" : "id_al" ;
		$this->db->where($id_tabel, $id);
		$hapus = $this->db->delete($tabel);

		if ($hapus) {
			if(file_exists("assets/upload/".$tabel."/".$this->uri->segment(4))){
				@unlink("assets/upload/".$tabel."/".$this->uri->segment(4));
			}
			return true;
		}
	}

	public function get_perusahaan()
	{
		return $this->db->get_where("perusahaan",array("add_by" => $this->session->userdata('data_login_sekolah')['id_sklh']))->result();
	}

	public function get_max_id_perusahaan()
	{
		$str_id        	= "PER";
		$id_tabel     	= "id_per";
		$this->db->select("MAX(CONVERT(SUBSTRING_INDEX($id_tabel,'$str_id', -1),INT))+1 as 'num_max'");      
		$get_num 		= $this->db->get("perusahaan")->row();
		$num_max_id		= ($get_num->num_max == null) ? "1" :  $get_num->num_max;  

		return $str_id.$num_max_id;
	}
}

/* End of file m_sekolah.php */
/* Location: ./application/models/m_sekolah.php */