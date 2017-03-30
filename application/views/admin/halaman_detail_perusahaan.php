<div class="row">
	<section class="invoice">
		<!-- title row -->
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">
					<i class="fa fa-globe"></i> <?php echo $perusahaan->nama_per; ?>
				</h2>
			</div>
			<!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row">
			<section class="col-lg-3 invoice-col">
				<address>
					<img class="img-responsive" src="<?php echo base_url();?>assets/upload/perusahaan/<?php echo  $perusahaan->logo_per;?>"; ?>
				</address>
			</section>
			<section class="col-lg-3 invoice-col">
				<address>
					Username : 
					<i><?php echo $perusahaan->username_per; ?></i>
					<br>
					<br>
					Ditambahkan oleh :
					<br>
					<?php 	
					if (!isset($perusahaan->nama_adm)) {
						echo $perusahaan->nama_sklh;
					} 
					else {
						echo $perusahaan->nama_adm ;
					}?>
				</address>
			</section>
			<section class="col-lg-3 invoice-col">
				<span class="label bg-navy">
					Kontak
				</span>
				<br>
				<br>
				<address>
					No.Telp :
					<?php echo $perusahaan->cp_per; ?>
					<br>
					E-mail :
					<br>
					<?php echo $perusahaan->email_per; ?>
					<br>
					Fax :
					<br>
					<?php echo $perusahaan->fax_per; ?>
				</address>
			</section>
			<section class="col-lg-3 invoice-col">
				<span class="label bg-navy">
					Alamat
				</span>
				<br>
				<br>
				<address>
					<?php echo $perusahaan->alamat_per; ?>
				</address>
			</section>
		</div>
	</section>
</div>