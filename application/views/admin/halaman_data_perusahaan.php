<?php echo $this->session->flashdata('notif_add'); ?>
<?php echo $this->session->flashdata('notif_hapus'); ?>

<div class="box box-danger no-margin">
	<div class="box-header">
		<a href="<?php echo site_url(); ?>/web_admin/form/perusahaan">
			<button class="btn bg-navy btn-md pull-right">Tambah Data</button>
		</a>
	</div>
	<div class="box-body">
		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Perusahaan</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($perusahaan as $no => $perusahaan): ?>
					<tr>
						<td><?php echo $no+1; ?></td>
						<td><?php echo $perusahaan->nama_per; ?></td>
						<td>
							<a class="btn btn-social-icon bg-olive btn-xs" data-toggle="modal" data-target="#<?php echo $perusahaan->id_per; ?>"><i class="fa fa-search"></i></a>

							<a class="btn btn-social-icon btn-danger btn-xs" data-toggle="modal" data-target="#<?php echo $perusahaan->id_per; ?>_hapus"><i class="fa fa-trash"></i></a>

							<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true" id="<?php echo $perusahaan->id_per;?>">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true text-red">×</span></button>
												<h4 class="modal-title"><?php echo $perusahaan->nama_per; ?></h4>
											</div>
											<div class="modal-body">
												<div class="box-body box-profile">
													<img class="profile-user-img img-responsive img-circle" src='<?php echo base_url()."assets/upload/perusahaan/".$perusahaan->logo_per; ?>' alt="No IMG">
													<br>
													<ul class="list-group list-group-unbordered">
														<li class="list-group-item">
															<b>Username Admin</b><i class="pull-right"><?php echo $perusahaan->username_per; ?></i>
														</li>
														<li class="list-group-item">
															<b>Alamat</b><i class="pull-right"><?php echo $perusahaan->alamat_per; ?></i>
														</li>
														<li class="list-group-item">
															<b>Fax</b><i class="pull-right"><?php echo $perusahaan->fax_per; ?></i>
														</li>
														<li class="list-group-item">
															<b>Telp.</b><i class="pull-right"><?php echo $perusahaan->cp_per; ?></i>
														</li>
														<li class="list-group-item">
															<b>Email</b><i class="pull-right"><?php echo $perusahaan->email_per; ?></i>
														</li>
														<li class="list-group-item">
															<b>Website</b><i class="pull-right"><?php echo $perusahaan->web_per; ?></i>
														</li>
														<li class="list-group-item">
															<b>Ditambahkan Oleh</b><i class="pull-right"><?php echo $perusahaan->add_by; ?></i>
														</li>
													</ul>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>

								<div class="modal fade modal-danger" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true" id="<?php echo $perusahaan->id_per;?>_hapus">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span></button>
													<h4 class="modal-title">Hapus Data</h4>
												</div>
												<div class="modal-body">
													<p>Yakin akan menghapus <?php echo $perusahaan->nama_per; ?>?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
													<a href="<?php echo base_url()."web_admin/hapus_data/".$perusahaan->id_per."/perusahaan/".$perusahaan->logo_per; ?>"><button type="button" class="btn btn-outline">Yakin</button>
													</a>
												</div>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>

