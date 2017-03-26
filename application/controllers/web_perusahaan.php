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

	public function form_loker()
	{
		if ($this->uri->segment(3) == "add") {
			$data['title']		= "Tambah Data Loker";
			$data['halaman']	= "perusahaan/form_loker";
		}
		$this->template_persusahaan($data);
	}

	public function tampung_data_add_loker()
	{
		$this->form_validation->set_rules('judul_lok','Judul Loker','required|min_length[10]');
		$this->form_validation->set_rules('isi_lok','Konten Loker','required|min_length[30]');
		$this->form_validation->set_rules('alamat_lok','Isikan Alamat Loker','required|min_length[10]');
		$this->form_validation->set_rules('time_end_lok','Masa Berlaku','required');
		if($this->form_validation->run())     
		{   
			$data_loker = array(
				'id_pengirim_lok'	=> $this->session->userdata('data_login_perusahaan')['id_per'],
				'judul_lok' 		=> addslashes($this->input->post('judul_lok')),
				'isi_lok'			=> addslashes($this->input->post('isi_lok')),
				'lng_lok'			=> addslashes($this->input->post('lng_lok')),
				'lat_lok'			=> addslashes($this->input->post('lat_lok')),
				'alamat_lok' 		=> addslashes($this->input->post('alamat_lok')),
				'time_lok' 			=> date("l, j  F Y"),
				'time_end_lok' 		=> date_format(date_create($this->input->post('time_end_lok')),"l, j  F Y"),
				'verifikasi_lok' 	=> "0"
				);
			// form mengandung foto
			if (!empty($_FILES['foto_lok']['name'])) 
			{
				$extensi 				 = explode("/",$_FILES['foto_lok']['type']);
				$config['upload_path'] 	 = './assets/upload/loker';
				$config['allowed_types'] = 'jpg|png|jpeg';	
				$config['file_name'] 	 = $data_loker['id_pengirim_lok']."_".date("ymdwhis").".".$extensi[1];

				$this->upload->initialize($config);
				$kirim_data = $this->M_perusahaan->proses_tambah_loker(array_merge($data_loker,array('foto_lok' => $config['file_name'])));
				if ($kirim_data) {
					$this->load->library('upload', $config);
						//jika gagal upload
					if ( ! $this->upload->do_upload("foto_lok"))
					{
						$error_upload = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('notifikasi', $this->notif->sukses_tanpa_foto($error_upload));
						redirect('Web_perusahaan/data_loker','refresh');
					}
					//jika sukses upload
					else
					{ 
						$this->session->set_flashdata('notifikasi', $this->notif->sukses_add());
						redirect('Web_perusahaan/data_loker','refresh');
					}
				}
				else {
					$this->session->set_flashdata('notifikasi', $this->notif->fail());
					redirect('Web_perusahaan/data_loker','refresh');
				}
			}
			// form tdk mengandung foto
			else { 
				$kirim_data = $this->M_perusahaan->proses_tambah_loker($data_loker);
				if ($kirim_data) {
					$this->session->set_flashdata('notifikasi', $this->notif->sukses_add());
					redirect('Web_perusahaan/data_loker','refresh');
				}
				else
				{
					$this->session->set_flashdata('notifikasi', $this->notif->fail());
					redirect('Web_perusahaan/data_loker','refresh');
				}
			}
		}
		else
		{
			$error = validation_errors();
			$this->session->set_flashdata('notifikasi', $this->notif->validasi($error));
			redirect('Web_perusahaan/form_loker/add','refresh');
		}
	}

	public function hapus_loker()
	{
		$id_loker 	= $this->uri->segment(3);
		$foto_loker = $this->uri->segment(4);
		if($this->M_perusahaan->proses_hapus_loker($id_loker,$foto_loker)){
			$this->session->set_flashdata('notifikasi', $this->notif->sukses_hapus());
			redirect('Web_perusahaan/data_loker','refresh');
		}
		else {
			$this->session->set_flashdata('notifikasi', $this->notif->fail_hapus());
			redirect('Web_perusahaan/data_loker','refresh');
		}
	}
}


/* End of file institusi.php */
/* Location: ./application/controllers/institusi.php */