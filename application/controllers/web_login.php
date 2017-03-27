<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->status				= $this->uri->segment(3);
		$this->sesi_admin		= $this->session->userdata('data_login_admin');
		$this->sesi_perusahaan= $this->session->userdata('data_login_perusahaan_');
		$this->sesi_sekolah	= $this->session->userdata('data_login_sekolah');
		$this->sesi_mahasiswa	= $this->session->userdata('data_login_mahasiswa');
	}

	public function form() {
		switch ($this->status) {
			case 'adm':
			if (isset($this->sesi_admin)) {
				redirect('web_admin/beranda');
			}
			else {
				$this->load->view('admin/form_login');
			}
			break;
			case 'sklh':
			if (!empty($this->sesi_perusahaan)) {
				redirect('web_sekolah/beranda','refresh');
			}
			else {
				$this->load->view('sekolah/form_login');
			}
			break;
			case 'per':
			if (!empty($this->sesi_perusahaan)) {
				redirect('web_perusahaan/beranda','refresh');
			}
			else {
				$this->load->view('perusahaan/form_login');
			}
			break;
			default:
			break;
		}
	}

	public function data_form()
	{
		$username	=	addslashes($this->input->post('username'));
		$password	=	addslashes($this->input->post('password'));
		$this->load->model('M_login');
		switch ($this->status) {
			case 'adm':
			$this->M_login->cek_data_form_login('admin',$username,$password,'adm');
			break;
			case 'per':
			$this->M_login->cek_data_form_login('perusahaan',$username,$password,'per');
			break;
			case 'sklh':
			$this->M_login->cek_data_form_login('sekolah',$username,$password,'sklh');
			break;
			default:
			break;
		}
	}
}



/* End of file Login.php */
/* Location: ./application/controllers/Login.php */