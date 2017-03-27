<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_sekolah extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login_sekolah'))) {
			redirect('web_login/form/sklh','refresh');
		}
	}

	public function template_sekolah($data)
	{
		$kumpulan_data	=	array_merge(array("menu" => "sekolah/menu","logout" => "web_logout/sekolah"),$data);
		$this->load->view('template', $kumpulan_data);
	}

	public function beranda()
	{
		$data['title']		= "Beranda";
		$data['halaman']	= "sekolah/halaman_beranda";
		$this->template_sekolah($data);
	}

	public function data_alumni()
	{
		$data['title']		= "Data Alumni";
		$data['halaman']	= "sekolah/halaman_data_alumni";
		$this->template_sekolah($data);
	}

	public function data_perusahaan()
	{
		$data['title']		= "Data Perusahaan";
		$data['halaman']	= "sekolah/halaman_data_perusahaan";
		$this->template_sekolah($data);
	}

	public function data_loker()
	{
		$data['title']		= "Data Loker";
		$data['halaman']	= "sekolah/halaman_data_loker";
		$this->template_sekolah($data);
	}

}

/* End of file institusi.php */
/* Location: ./application/controllers/institusi.php */