<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_perusahaan extends CI_Controller {

	public function beranda()
	{
		$data['title']		= "Beranda";
		$data['halaman']	= "institusi/halaman_beranda";
		$this->load->view('template',$data);
	}

}

/* End of file institusi.php */
/* Location: ./application/controllers/institusi.php */