<?php echo $this->session->flashdata('notifikasi'); ?>
<?php 
$act = $this->uri->segment(4);
if ($act=="add") {
	$id 				= "";
	$tmp_lok			= "";
	$judul_lok			= "";
	$isi_lok			= "";
	$foto_lok			= "";
	$lng_lok			= "";
	$lat_lok			= "";
	$alamat_lok			= "";
	$time_end_lok		= "";
}
elseif ($act == "edit"){
	$id 				= $data_lama->id_lok;
	$tmp_lok			= $data_lama->tmp_lok;
	$judul_lok			= $data_lama->judul_lok;
	$isi_lok			= $data_lama->isi_lok;
	$foto_lok			= "";
	$lng_lok			= $data_lama->lng_lok;
	$lat_lok			= $data_lama->lat_lok;
	$alamat_lok			= $data_lama->alamat_lok;
	$time_end_lok		= $data_lama->time_end_lok;
}
?>
<div class="box box-primary">
	<div class="box-header">
	</div>
	<div class="box-body">
		<?php echo form_open_multipart('web_admin/tampung_data_loker/'.$act."/".$id); ?>
		<div class="form-group">
			<label for="judul_lok" class="control-label">Nama Perusahaan</label>
			<input type="text" name="tmp_lok" value="<?php echo $tmp_lok; ?>" class="form-control" id="tmp_lok"  required=""  />
		</div>
		<div class="form-group">
			<label for="judul_lok" class="control-label">Judul Loker</label>
			<input type="text" name="judul_lok" value="<?php echo $judul_lok; ?>" class="form-control" id="judul_lok"  required=""  />
		</div>
		<div class="form-group">
			<label for="isi_lok" class="control-label">Konten</label>
			<textarea name="isi_lok" class="form-control textarea" id="isi_lok" required="" ><?php echo $isi_lok; ?></textarea>
		</div>
		<div class="form-group">
			<label for="foto_lok" class="control-label">Foto</label>
			<input type="file" name="foto_lok" id="foto_lok">
		</div>
		<div class="form-group">
			<label for="lng_lok" class="control-label">Longitude</label>
			<input type="text" name="lng_lok" class="form-control" value="<?php echo $lng_lok; ?>" id="lng_lok">
		</div>
		<div class="form-group">
			<label for="lat_lok" class="control-label">Latitude</label>
			<input type="text" name="lat_lok" class="form-control" value="<?php echo $lat_lok; ?>" id="lat_lok">
		</div>
		<div class="form-group">
			<label for="alamat_lok" class="control-label">Alamat</label>
			<textarea name="alamat_lok" class="form-control textarea" required="" id="alamat_lok"><?php echo $alamat_lok; ?></textarea>
		</div>
		<div class="form-group">
			<label for="time_end_lok" class="control-label" >Masa Berlaku</label>
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input class="form-control datepicker"  value="<?php echo date_format(date_create($time_end_lok),"Y-m-d") ?>" required="" name="time_end_lok" data-mask="" type="text">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>