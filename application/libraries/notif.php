<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Notif {
	function __construct()
	{
		$this->sukses_open = '<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-info"></i>Info</h4>';
		$this->closing = '<p></div>';
	}


	function sukses_dengan_foto()
	{
		$notif = $this->sukses_open.'Penambahan data sukses DENGAN LOGO. '.$this->closing;
		return $notif;
	}

	function sukses_tanpa_foto($error_upload)
	{
		$notif = $this->sukses_open.'Penambahan data sukses, sedangkan foto gagal disimpan.<p>'.$error_upload['error'].$this->closing;
		return $notif;
	}

	function  sukses_tanpa_upload()
	{
		$notif = $this->sukses_open.'Penambahan data sukses.'.$this->closing;
		return $notif;
	}
	
}

/* End of file notif.php */
/* Location: ./application/*models|controllers*/