<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->status				= $this->uri->segment(3);
		$sesi_admin		= $this->session->userdata('data_login_admin');
		$sesi_perusahaan= $this->session->userdata('data_login_perusahaan_')['level'];
		$sesi_sekolah	= $this->session->userdata('data_login_sekolah')['level'];
		$sesi_mahasiswa	= $this->session->userdata('data_login_mahasiswa');

		if (!empty($sesi_admin)) {
			redirect('web_admin/beranda','refresh');
		}
		elseif (($sesi_perusahaan == "per") or ($sesi_perusahaan == "per_mou")) {
			redirect('instansi/beranda','refresh');
		}
		elseif ($sesi_sekolah == "institusi") {
			redirect('institusi/beranda','refresh');
		}
	}

	public function form() {
		switch ($this->status) {
			case 'adm':
			$this->load->view('admin/form_login');
			break;
			case 'insti':
			$this->load->view('institusi/form_login');
			break;
			case 'insta':
			$this->load->view('instansi/form_login');
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
			case 'insti':
			$this->M_login->cek_data_form_login('instansi',$username,$password,'insti');
			break;
			case 'insta':
			$this->M_login->cek_data_form_login('instansi',$username,$password,'insta');
			break;
			default:
			break;
		}
	}
}



/* End of file Login.php */
/* Location: ./application/controllers/Login.php */