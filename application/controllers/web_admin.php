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

	public function data_sekolah()
	{
		$data['sekolah']	= $this->M_admin->get_sekolah();
		$data['title']		= "Data Sekolah";
		$data['halaman']	= "admin/halaman_data_sekolah";
		$this->template_admin($data);
	}

	public function form($nama_form)
	{
		$data['halaman']	= "admin/form_tambah_user";
		if ($nama_form == "sekolah") {
			$data['title']		= "Tambah Data Sekolah";
			$this->template_admin($data);
		}
		elseif ($nama_form == "perusahaan") {
			$data['title']		= "Tambah Data Perusahaan";
			$this->template_admin($data);
		}
	}

	public function tampung_data_form($simpan_sebagai)
	{
		$buntut = ($simpan_sebagai == "sekolah") ?  "sklh": "per";
		$new_id	= $this->M_admin->get_max_id_user($simpan_sebagai);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama '.$simpan_sebagai,'required');
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
					'add_by'	=> $this->session->userdata('data_login_admin')['username_adm'],
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
						$this->session->set_flashdata('notif_add', '
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									×
								</button>
								<h4>
									<i class="icon fa fa-info"></i>
									Info
								</h4>
								Penambahan data Berhasil, tapi logo gagal. Silahkan edit foto secara manual pada profil'.$simpan_sebagai.'<p>'.$error_upload['error'].'
							</div>');
						redirect('web_admin/data_'.$simpan_sebagai,'refresh');
					}
					//jika sukses upload
					else
					{ 
						$this->session->set_flashdata('notif_add', '
							<div class="alert alert-info alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									×
								</button>
								<h4>
									<i class="icon fa fa-info"></i>
									Info
								</h4>
								Penambahan data sukses DENGAN LOGO.<p> 
							</div>');
						redirect('web_admin/data_'.$simpan_sebagai,'refresh');
					}
				}
				else // gagal menyimpan data ke db
				{
					$this->session->set_flashdata('notif_add', '
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							<h4>
								<i class="icon fa fa-info"></i>
								Info
							</h4>
							Terdapat kesalahan saat simpan data.'.$this->db->last_query().'
						</div>');
					redirect('web_admin/data_'.$simpan_sebagai,'refresh');
				}
			}
			else // form tidak mengandung foto
			{
				$kirim_data = $this->M_admin->proses_tambah_data($simpan_sebagai,array_merge($data_general, $data_spesifik));
				if($kirim_data) //simpan data ke db
				{ 
					$this->session->set_flashdata('notif_add', '
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							<h4>
								<i class="icon fa fa-info"></i>
								Info
							</h4>
							Penambahan data sukses
						</div>');
					redirect('web_admin/data_'.$simpan_sebagai,'refresh');
				}
				else
				{
					$this->session->set_flashdata('notif_add', '
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							<h4>
								<i class="icon fa fa-info"></i>
								Info
							</h4>
							Terdapat duplikasi username sehingga penyimpanan data baru gagal.
						</div>');
					redirect('web_admin/data_'.$simpan_sebagai,'refresh');	
				}
			}
		}
		else 
		{
			$this->session->set_flashdata('notif_add', '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
						×
					</button>
					<h4>
						<i class="icon fa fa-info"></i>
						Info
					</h4>
					Gagal tambah data.'.validation_errors().'
				</div>');
			redirect('web_admin/form/'.$simpan_sebagai,'refresh');
		}
	}

	public function hapus_data($id,$prev_url)
	{
		if($this->M_admin->proses_hapus($id,$prev_url) == "true"){
			$this->session->set_flashdata('notif_hapus', '
				<div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-info"></i> Info</h4>
					Penghapusan data sukses.
				</div>');
			redirect('web_admin/data_'.$prev_url,'refresh');
		}
		else {
			$this->session->set_flashdata('notif_hapus', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-close"></i> Info</h4>
				Gagal menghapus data.
			</div>');
			redirect('web_admin/data_'.$prev_url,'refresh');
		}
	}
}


/* End of file admin.php */
/* Location: ./application/controllers/admin.php */