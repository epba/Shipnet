<div class="row">
	<section class="invoice">
		<!-- title row -->
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">
					<i class="fa fa-globe"></i> <?php echo $sekolah->nama_sklh; ?>
				</h2>
			</div>
			<!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row">
			<section class="col-lg-3 invoice-col">
				<address>
				<img width="150px" height="110px" src="<?php echo base_url();?>assets/upload/sekolah/<?php echo  $sekolah->logo_sklh;?>"; ?>
				</address>
			</section>
			<section class="col-lg-3 invoice-col">
				<address>
					Username : 
					<i><?php echo $sekolah->username_sklh; ?></i>
					<br>
					<br>
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
					<?php echo $sekolah->cp_sklh; ?>
					<br>
					E-mail :
					<br>
					<?php echo $sekolah->email_sklh; ?>
					<br>
					Fax :
					<br>
					<?php echo $sekolah->fax_sklh; ?>
				</address>
			</section>
			<section class="col-lg-3 invoice-col">
				<span class="label bg-navy">
					Alamat
				</span>
				<br>
				<br>
				<address>
					<?php echo $sekolah->alamat_sklh; ?>
				</address>
			</section>
		</div>
	</section>
</div>