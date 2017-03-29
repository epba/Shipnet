	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Web_admin extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			if (empty($this->session->userdata('data_login_admin'))) {
				redirect('web_login/form/adm','refresh');
			}
			$this->load->model('M_admin');
		}

		public function template_admin($data)
		{
			$kumpulan_data	=	array_merge(array("menu" => "admin/menu","logout" => "web_logout/admin"),$data);
			$this->load->view('template', $kumpulan_data);
		}

		public function beranda()
		{
			$data['title']		= "Beranda Admin";
			$data['halaman']	= "admin/halaman_beranda";
			$this->template_admin($data);
		}

		public function data_admin()
		{
			$data['admin']		= $this->M_admin->get_data_admin();
			$data['title']		= "Data Admin";
			$data['halaman']	= "admin/halaman_data_admin";
			$this->template_admin($data);
		}

		public function data_perusahaan()
		{
			$data['perusahaan']		= $this->M_admin->get_perusahaan();
			$data['title']		= "Data Perusahaan";
			$data['halaman']	= "admin/halaman_data_perusahaan";
			$this->template_admin($data);
		}

		public function data_loker()
		{
			$data['loker']	= $this->M_admin->get_data_loker();
			$data['title']	= "Data Loker";
			$data['halaman']= "admin/halaman_data_loker";
			$this->template_admin($data);
		}

		public function data_detail_perusahaan($id)
		{
			$data['perusahaan']	= $this->M_admin->get_detail_perusahaan($id);
			$data['loker']		= $this->M_admin->get_detail_loker($id);
			if ($data['perusahaan'] == null) {
				echo "null";
			}
			else
			{
				$data['title']	= "Detail Perusahaan";
				$data['halaman']= "admin/halaman_detail_perusahaan";
				$this->template_admin($data);
			}
		}

		public function data_detail_loker($id)
		{
			$data['loker']		= $this->M_admin->get_detail_loker($id);
			if ($data['loker'] == null) {
				echo "null";
			}
			else
			{
				$data['title']		= "Detail Loker";
				$data['halaman']	= "admin/halaman_detail_loker";
				$this->template_admin($data);
			}
		}

		public function data_detail_sekolah($id)
		{
			$data['sekolah']	= $this->M_admin->get_detail_sekolah($id);
			$data['loker']		= $this->M_admin->get_detail_loker($id);
			if ($data['sekolah'] == null) {
				echo "null";
			}
			else
			{
				$data['title']		= "Detail Loker";
				$data['halaman']	= "admin/halaman_detail_sekolah";
				$this->template_admin($data);
			}
		}

		public function acc_loker($id)
		{
			$acc = $this->M_admin->proses_acc_loker($id);
			if ($acc) {
				$this->session->set_flashdata('notifikasi', $this->notif->sukses_edit());
				redirect('web_admin/data_loker','refresh');	
			}
		}

		public function data_sekolah()
		{
			$data['sekolah']	= $this->M_admin->get_sekolah();
			$data['title']		= "Data Sekolah";
			$data['halaman']	= "admin/halaman_data_sekolah";
			$this->template_admin($data);
		}

		public function form($nama_form)
		{
			if ($nama_form == "sekolah") {
				$data['halaman']	= "admin/form_tambah_user";
				$data['title']		= "Tambah Data Sekolah";
			}
			elseif ($nama_form == "perusahaan") {
				$data['halaman']	= "admin/form_tambah_user";
				$data['title']		= "Tambah Data Perusahaan";
			}
			elseif ($nama_form == "loker") {
				$data['halaman']	= "admin/form_loker";
				$data['title']		= "Tambah Data Loker";
			}
			$this->template_admin($data);
		}

		public function tampung_data_form($simpan_sebagai)
		{
			$buntut = ($simpan_sebagai == "sekolah") ?  "sklh": "per";
			$new_id	= $this->M_admin->get_max_id_user($simpan_sebagai);

			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama','Nama '.$simpan_sebagai,'required|min_length[4]');
			$this->form_validation->set_rules('username','Username '.$simpan_sebagai,'required|min_length[3]');
			$this->form_validation->set_rules('cp','Contact','required|max_length[14]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('alamat','Alamat','required|min_length[5]');
			$this->form_validation->set_rules('web','Website','');
			$this->form_validation->set_rules('fax','fax','');

			if($this->form_validation->run()) 
			{
				$data_general			= array(
					'id_'.$buntut		=> $new_id,
					'nama_'.$buntut		=> addslashes($this->input->post('nama')),
					'username_'.$buntut	=> addslashes($this->input->post('username')),
					'cp_'.$buntut		=> addslashes($this->input->post('cp')),
					'email_'.$buntut	=> addslashes($this->input->post('email')),
					'fax_'.$buntut		=> addslashes($this->input->post('fax')),
					'alamat_'.$buntut	=> addslashes($this->input->post('alamat')),
					'web_'.$buntut		=> addslashes($this->input->post('web')),
					'password_'.$buntut	=> password_hash("welcome",PASSWORD_BCRYPT)
					);

				switch ($simpan_sebagai) {
					case 'sekolah':
				//Jika url menyatakan sekolah, maka data general ditambah sbb:
					$data_spesifik		=  array(
						'level_'.$buntut	=> $this->input->post('level'),
						);
					break;
					case 'perusahaan':
				//Jika url menyatakan perusahaan, maka data general ditambah sbb:
					$data_spesifik	=  array(
						'add_by'	=> $this->session->userdata('data_login_admin')['id_adm'],
						);
					break;
					default:
					# code...
					break;
				}

			if (!empty($_FILES['logo']['name'])) // form mengandung foto
			{
				$extensi = explode("/",$_FILES['logo']['type']);
				$config['upload_path'] 	 = './assets/upload/'.$simpan_sebagai;
				$config['allowed_types'] = 'jpg|png|jpeg';	
				$config['file_name'] 	 = $new_id.".".$extensi[1];
				$this->upload->initialize($config);

				$kirim_data = $this->M_admin->proses_tambah_data($simpan_sebagai,array_merge($data_general, $data_spesifik,array('logo_'.$buntut => $config['file_name'])));

				if($kirim_data) //simpan data ke db
				{ 
					//lakukan upload
					$this->load->library('upload', $config);
					// Jika gagal Upload
					if ( ! $this->upload->do_upload("logo"))
					{
						$error_upload = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('notifikasi', $this->notif->sukses_tanpa_foto($error_upload));
						redirect('web_admin/data_'.$simpan_sebagai,'refresh');
					}
					//jika sukses upload
					else
					{ 
						$this->session->set_flashdata('notifikasi', $this->notif->sukses_add());
						redirect('web_admin/data_'.$simpan_sebagai,'refresh');
					}
				}
				else // gagal menyimpan data ke db
				{
					$this->session->set_flashdata('notifikasi', $this->notif->fail());
					redirect('web_admin/data_'.$simpan_sebagai,'refresh');
				}
			}
			else // form tidak mengandung foto
			{
				$kirim_data = $this->M_admin->proses_tambah_data($simpan_sebagai,array_merge($data_general, $data_spesifik));
				if($kirim_data) //simpan data ke db
				{ 
					$this->session->set_flashdata('notifikasi', $this->notif->sukses_add());
					redirect('web_admin/data_'.$simpan_sebagai,'refresh');
				}
				else
				{
					$this->session->set_flashdata('notifikasi', $this->notif->fail());
					redirect('web_admin/data_'.$simpan_sebagai,'refresh');	
				}
			}
		}
		else 
		{
			$error = validation_errors();
			$this->session->set_flashdata('notifikasi', $this->notif->validasi($error));
			redirect('web_admin/form/'.$simpan_sebagai,'refresh');
		}
	}

	public function tampung_data_loker()
	{
		$notif_sukses	= ($this->uri->segment(3) == "add") ? "sukses_add" : "sukses_edit";
		
		$this->form_validation->set_rules('tmp_lok','Nama Perusahaan','required|min_length[3]');
		$this->form_validation->set_rules('judul_lok','Judul Loker','required|min_length[10]');
		$this->form_validation->set_rules('isi_lok','Konten Loker','required|min_length[30]');
		$this->form_validation->set_rules('alamat_lok','Isikan Alamat Loker','required|min_length[10]');
		$this->form_validation->set_rules('time_end_lok','Masa Berlaku','required');
		if($this->form_validation->run())     
		{   
			$data_loker = array(
				'id_pengirim_lok'	=> $this->session->userdata('data_login_admin')['id_adm'],
				'tmp_lok'			=> addslashes($this->input->post('tmp_lok')),
				'judul_lok' 		=> addslashes($this->input->post('judul_lok')),
				'isi_lok'			=> addslashes($this->input->post('isi_lok')),
				'lng_lok'			=> addslashes($this->input->post('lng_lok')),
				'lat_lok'			=> addslashes($this->input->post('lat_lok')),
				'alamat_lok' 		=> addslashes($this->input->post('alamat_lok')),
				'time_lok' 			=> date("l, j  F Y"),
				'time_end_lok' 		=> date_format(date_create($this->input->post('time_end_lok')),"l, j  F Y"),
				'verifikasi_lok' 	=> "1",
				'verifikasi_by_lok' => $this->session->userdata('data_login_admin')['id_adm']
				);
			// form mengandung foto
			if (!empty($_FILES['foto_lok']['name'])) 
			{
				$extensi 				 = explode("/",$_FILES['foto_lok']['type']);
				$config['upload_path'] 	 = './assets/upload/loker';
				$config['allowed_types'] = 'jpg|png|jpeg';	
				$config['file_name'] 	 = $data_loker['id_pengirim_lok']."_".date("ymdwhis").".".$extensi[1];

				$this->upload->initialize($config);
				$kirim_data = $this->M_admin->proses_tambah_data("loker",array_merge($data_loker,array('foto_lok' => $config['file_name'])));
				if ($kirim_data) {
					$this->load->library('upload', $config);
						//jika gagal upload
					if ( ! $this->upload->do_upload("foto_lok"))
					{
						$error_upload = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('notifikasi', $this->notif->sukses_tanpa_foto($error_upload));
						redirect('web_admin/data_loker','refresh');
					}
					//jika sukses upload
					else
					{ 
						$this->session->set_flashdata('notifikasi', $this->notif->$notif_sukses());
						redirect('web_admin/data_loker','refresh');
					}
				}
				else {
					$this->session->set_flashdata('notifikasi', $this->notif->fail());
					redirect('web_admin/data_loker','refresh');
				}
			}
			// form tdk mengandung foto
			else { 
				$kirim_data = $this->M_admin->proses_tambah_data("loker",$data_loker);
				if ($kirim_data) {
					$this->session->set_flashdata('notifikasi', $this->notif->$notif_sukses());
					redirect('web_admin/data_loker','refresh');
				}
				else
				{
					$this->session->set_flashdata('notifikasi', $this->notif->fail());
					redirect('web_admin/data_loker','refresh');
				}
			}
		}
		else
		{
			$error = validation_errors();
			$this->session->set_flashdata('notifikasi', $this->notif->validasi($error));
			redirect('web_admin/form/loker/add','refresh');
		}
	}

	public function hapus_data($id,$prev_url)
	{
		if($this->M_admin->proses_hapus($id,$prev_url) == "true"){
			
			$this->session->set_flashdata('notifikasi', $this->notif->sukses_hapus());
			redirect('web_admin/data_'.$prev_url,'refresh');
		}
		else {
			$this->session->set_flashdata('notifikasi', $this->notif->fail_hapus());
			redirect('web_admin/data_'.$prev_url,'refresh');
		}
	}
}


/* End of file admin.php */
/* Location: ./application/controllers/admin.php */