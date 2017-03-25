<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_perusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login_perusahaan'))) {
			redirect('web_login/form/per','refresh');
		}
		$this->load->model('M_perusahaan');
	}


	public function template_persusahaan($data)
	{
		$kumpulan_data	=	array_merge(array("menu" => "perusahaan/menu","logout" => "web_logout/perusahaan"),$data);
		$this->load->view('template', $kumpulan_data);
	}

	public function beranda()
	{
		$data['title']		= "Beranda";
		$data['halaman']	= "perusahaan/halaman_beranda";
		$this->template_persusahaan($data);
	}

	public function data_loker()
	{
		$data['title']		= "Data Loker";
		$data['halaman']	= "perusahaan/halaman_data_loker";
		$data['loker']		= $this->M_perusahaan->get_data_loker();
		$this->template_persusahaan($data);
	}

	public function form_add_loker()
	{
		$data['title']		= "Tambah Data Loker";
		$data['halaman']	= "perusahaan/form_tambah_loker";
		$this->template_persusahaan($data);
	}

}

/* End of file institusi.php */
/* Location: ./application/controllers/institusi.php */