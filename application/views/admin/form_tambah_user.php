<?php 
$uri  = $this->uri->segment(3);
$name = ($uri == "sekolah") ? "Nama Sekolah" : "Nama Perusahaan" ;
?>
<?php echo $this->session->flashdata('notifikasi'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary with-border">
      <?php echo form_open_multipart(site_url()."/web_admin/tampung_data_form/".$uri); ?>
      <div class="box-body">
        <div class="form-group">
          <label for="nama_instansi"><?php echo $name; ?> *</label>
          <input type="text" class="form-control" placeholder="" required="" minlength="3" name="nama" value="<?php echo set_value('nama') ?>">
        </div>
        <div class="form-group">
          <label for="username">Username *</label>
          <input type="text" class="form-control" style="text-transform: lowercase;" placeholder="Username untuk login (Bukan Nama)" required="" minlength="3" name="username">
        </div>
        <div class="form-group">
          <label for="alamat_instansi">Alamat *</label>
          <textarea class="form-control" placeholder="Alamat Lengkap" required="" minlength="10" rows="5" name="alamat" required=""></textarea>
        </div>
        <div class="form-group">
          <label for="no_telp">No. Telp *</label>
          <input type="number" class="form-control" placeholder="" required="" minlength="8" name="cp">
        </div>
        <div class="form-group">
          <label for="email">E-mail *</label>
          <input type="email" class="form-control" placeholder="" required="" name="email">
        </div>
        <div class="form-group">
          <label for="fax">Fax.</label>
          <input type="text" class="form-control" placeholder="" name="fax">
        </div>
        <div class="form-group">
          <label for="fax">Website</label>
          <input type="text" class="form-control" placeholder="" name="web">
        </div>
        <?php if($uri == "sekolah"){ ?>
        <div class="form-group">
          <label>Jenjang</label>
          <select class="form-control" name="level">
            <option value="sma" selected="">SMA</option>
            <option value="smk">SMK</option>
            <option value="kuliah">PERGURUAN TINGGI</option>
          </select>
        </div>
        <?php } ?>
        <div class="form-group">
          <label for="exampleInputFile">Logo / Foto</label>
          <input type="file" name="logo">
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<!-- </div> -->