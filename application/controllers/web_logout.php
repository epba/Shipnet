<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_logout extends CI_Controller {

	public function admin()
	{
		$this->session->sess_destroy("data_login_admin");
		redirect('web_login/form/adm','refresh');
	}
	public function perusahaan()
	{
		$this->session->sess_destroy("data_login_perusahaan");
		redirect('web_login/form/per','refresh');
	}

}

/* End of file web_logout.php */
/* Location: ./application/controllers/web_logout.php */