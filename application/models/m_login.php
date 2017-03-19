<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek_data_form_login($tabel,$username,$password,$uri)
	{
		switch ($tabel) {
			case 'admin':
			$kolom_username	= "username_adm";
			break;
			case 'perusahaan':
			$kolom_username	= "username_per";
			break;
			
			default:
				# code...
			break;
		}

		$this->db->where($kolom_username, $username);
		$cek_username	= $this->db->get($tabel)->result();
		if(count($cek_username) === 1)
		{
			foreach ($cek_username as $data) {
				switch ($tabel) {
					case 'admin':
					if(password_verify($password,$data->password_adm))
					{
						$array = array(
							'id_adm' => $data->id_adm,
							'username_adm' => $data->username_adm,
							'nama_adm' => $data->nama_adm
							);
						$this->session->set_userdata('data_login_admin', $array );
						redirect('web_admin/beranda','refresh');
					}
					break;
					case 'perusahaan':
					if(password_verify($password,$data->password_per))
					{
						$array = array(
							'id_per' => $data->id_per,
							'username_per' => $data->username_per,
							'nama_per' => $data->nama_per,
							'cp_per' => $data->cp_per,
							'email_per' => $data->email_per,
							'fax_per' => $data->fax_per,
							'alamat_per' => $data->alamat_per,
							'web_per' => $data->web_per,
							'logo_per' => $data->logo_per
							);
						$this->session->set_userdata('data_login_admin', $array);
						redirect('web_perusahaan/beranda','refresh');
					}
					break;
					default:
				 		# code...
					break;
				}
			}
		}
		else {
			$this->session->set_flashdata('fail_login', '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i>Pastikan username / password benar.</h4>
				</div>'
				);
			redirect('web_login/form/'.$uri,'refresh');
			// echo $this->db->last_query();
		}
	}
}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */