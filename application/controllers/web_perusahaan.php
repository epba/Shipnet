<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_perusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login_perusahaan'))) {
			redirect('web_login/form/per','refresh');
		}
	}
	public function beranda()
	{
		$data['title']		= "Beranda";
		$data['halaman']	= "perusahaan/halaman_beranda";
		$this->load->view('template',$data);
	}

}

/* End of file institusi.php */
/* Location: ./application/controllers/institusi.php */