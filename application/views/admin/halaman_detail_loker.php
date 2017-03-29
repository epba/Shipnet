<div class="row">
	<section class="invoice">
		<!-- title row -->
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">
					<i class="fa fa-globe"></i> <?php echo $loker->judul_lok; ?>
				</h2>
			</div>
			<!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row">
			<section class="col-lg-3 invoice-col">
				<address>
				<img class="img-responsive" src="<?php echo base_url();?>assets/upload/loker/<?php echo  $loker->foto_lok;?>"; ?>
				</address>
			</section>
			<section class="col-lg-3 invoice-col">
				<address>
					Dari : 
					<i><?php echo $loker->tmp_lok; ?></i>
					<br>
					<br>
					Masa Berlaku : <?php echo $loker->time_end_lok; ?>
				</address>
			</section>
			<section class="col-lg-3 invoice-col">
				<span class="label bg-navy">
					Alamat
				</span>
				<br>
				<br>
				<address>
					<?php echo $loker->alamat_lok; ?>
				</address>
			</section>
		</div>
	</section>
</div>