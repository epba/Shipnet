<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek_data_form_login($tabel,$username,$password,$uri)
	{
		$this->db->where('username_adm', $username);
		$cek_username	= $this->db->get("admin")->result();
		if(count($cek_username) === 1){
			foreach ($cek_username as $data) {
				if ($tabel == "admin") {
					if(password_verify($password,$data->password_adm)){
						$array = array(
							'id_adm' => $data->id_adm,
							'username_adm' => $data->username_adm,
							'nama_adm' => $data->nama_adm
							);
						$this->session->set_userdata('data_login_admin', $array );
						redirect('web_admin/beranda','refresh');
					}
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
		}
	}
}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */