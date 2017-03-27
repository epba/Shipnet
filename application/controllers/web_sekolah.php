<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_sekolah extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login_sekolah'))) {
			redirect('web_login/form/sklh','refresh');
		}
		$this->load->model('M_sekolah');
	}

	public function template_sekolah($data)
	{
		$kumpulan_data	=	array_merge(array("menu" => "sekolah/menu","logout" => "web_logout/sekolah"),$data);
		$this->load->view('template', $kumpulan_data);
	}

	public function beranda()
	{
		$data['title']		= "Beranda";
		$data['halaman']	= "sekolah/halaman_beranda";
		$this->template_sekolah($data);
	}

	public function data_alumni()
	{
		$data['title']		= "Data Alumni";
		$data['halaman']	= "sekolah/halaman_data_alumni";
		$data['alumni']		= $this->M_sekolah->get_data_alumni();
		$this->template_sekolah($data);
	}

	public function form_alumni()
	{
		if ($this->uri->segment(3) == "add") {
			$data['title']		= "Tambah Alumni";
			$data['halaman']	= "sekolah/form_alumni";	
		}
		elseif ($this->uri->segment(3) == "edit") {
			$data['title']		= "Edit Alumni";
			$data['halaman']	= "sekolah/form_alumni";	
		}
		$this->template_sekolah($data);
	}

	public function tampung_data_alumni()
	{
		$this->form_validation->set_rules('nim_al','Nim','required');
		$this->form_validation->set_rules('nama_al','Nama','required');
		if($this->form_validation->run())     
		{
			$data['username_al']	= $this->session->userdata('data_login_sekolah')['id_sklh']."-".$this->input->post('nim_al');
			$data['nama_al']		= addslashes($this->input->post('nama_al'));
			$data['alamat_al']		= addslashes($this->input->post('alamat_al'));
			$data['cp_al']			= addslashes($this->input->post('cp_al'));
			$data['email_al']		= addslashes($this->input->post('email_al'));
			$data['id_sklh']		= $this->session->userdata('data_login_sekolah')['id_sklh'];

			if ($this->uri->segment(3) == "add") {
				if($this->M_sekolah->proses_add("alumni",$data)){
					$this->session->set_flashdata('notifikasi', $this->notif->sukses_add());
					redirect('Web_sekolah/data_alumni','refresh');
				}
				else
				{
					$this->session->set_flashdata('notifikasi', $this->notif->fail());
					redirect('Web_sekolah/data_alumni','refresh');
				}
			}
		}
		else {
			$error = validation_errors();
			$this->session->set_flashdata('notifikasi', $this->notif->validasi($error));
			redirect('Web_sekolah/form_alumni/add','refresh');
		}
	}

	public function upload_alumni()
	{
		$alumni = $this->input->post('excel');
		$config['upload_path']      = 'assets/upload/sekolah';
		$config['allowed_types']    = 'xls|xlsx';
		$config['file_name']        = date('y_h_i_s');

		$this->upload->initialize($config);     
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('excel'))
		{
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}
		else
		{
			$a = $this->upload->data();
            $file = 'upload/'.$a['orig_name']; //get excell file name
            $this->load->library('Excel');
            $objPHPExcel = PHPExcel_IOFactory::load($file); //load file excell from $file           
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection(); //collect data
            
            //extract to a PHP readable array format

            foreach ($cell_collection as $cell) 
            {
            	$kolom = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            	$baris = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            	$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
            	if ($baris == 1) {
            		$header[$baris][$kolom] = $data_value;
            	} else {
            		$arr_data[$baris][$kolom] = $data_value;
            	}
            }
            $data['header'] = $header;
            $data['values'] = $arr_data;

            foreach ($data['values'] as $al)
            {
            	$alu['username_al'] = $al['A'];
            	$alu['nama_al'] 	= MD5($al['A']);
            	$alu['thn_lulus_al']= $al['B'];

            	$this->db->where('al_username', $alu['al_username']);
            	$c = $this->db->get('alumni');

            	if($c->num_rows() == null) {
            		$masuk = $this->db->insert('alumni', $alu); 
            	}
            	else
            	{
            		$gagal['NO'] = array('nim' => $al['A'],'nama' => $al['B']);  
            	}              
            }
        }

        if ($masuk) {
        	@unlink($file);

        	$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Berhasil add alumni</div>");
        	redirect('dashboard/alumni'); 
        }
        else
        {
        	$k['a'] = $al;  
        	$this->session->set_flashdata("k", "<div class=\"alert alert-danger\">gagal add alumni</div>");
        	redirect('dashboard/alumni'); 
        }
    }
    

    public function data_perusahaan()
    {
    	$data['title']		= "Data Perusahaan";
    	$data['halaman']	= "sekolah/halaman_data_perusahaan";
    	$this->template_sekolah($data);
    }

    public function data_loker()
    {
    	$data['title']		= "Data Loker";
    	$data['halaman']	= "sekolah/halaman_data_loker";
    	$this->template_sekolah($data);
    }

}

/* End of file institusi.php */
/* Location: ./application/controllers/institusi.php */