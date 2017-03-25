<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Notif {

	function sukses_all()
	{
		$notif = '<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-info"></i>Info</h4>
		Penambahan data sukses DENGAN LOGO.<p></div>';
		return $notif;
	}

	function sukses_tanpa_foto($error_upload)
	{
		$notif = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-info"></i>Info</h4>
		Penambahan data sukses, sedangkan foto gagal disimpan.<p>'.$error_upload['error'].'</div>';
		return $notif;
	}
	
}

/* End of file notif.php */
/* Location: ./application/*models|controllers*/