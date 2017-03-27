<?php echo $this->session->flashdata('notifikasi'); ?>

<div class="box box-danger">
	<div class="box-header">
		<a href="<?php echo site_url(); ?>/web_admin/form/sekolah">
			<button class="btn bg-navy btn-md pull-right">Tambah Data</button>
		</a>
	</div>
	<div class="box-body">
		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sekolah as $no => $data_sekolah): ?>

					<tr>
						<td><?php echo $no+1; ?> </td>
						<td><?php echo $data_sekolah->nama_sklh; ?></td>
						<td>
						<span data-toggle="tooltip" title="Detail">
								<a class="btn btn-social-icon bg-olive btn-xs" data-toggle="modal" data-target="#<?php echo $data_sekolah->id_sklh; ?>"><i class="fa fa-search"></i></a>
							</span>
							<span data-toggle="tooltip" title="Hapus">
								<a class="btn btn-social-icon btn-danger btn-xs" data-toggle="modal" data-target="#<?php echo $data_sekolah->id_sklh; ?>_hapus"><i class="fa fa-trash"></i></a>
							</span>
							<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true" id="<?php echo $data_sekolah->id_sklh;?>">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true text-red">×</span></button>
												<h4 class="modal-title"><?php echo $data_sekolah->nama_sklh; ?></h4>
											</div>
											<div class="modal-body">
												<div class="box-body box-profile">
													<img class="profile-user-img img-responsive img-circle" src='<?php echo base_url()."assets/upload/sekolah/".$data_sekolah->logo_sklh; ?>' alt="No IMG">
													<br>
													<ul class="list-group list-group-unbordered">
														<li class="list-group-item">
															<b>Username Sekolah</b><i class="pull-right"><?php echo $data_sekolah->username_sklh; ?></i>
														</li>
														<li class="list-group-item">
															<b>Alamat </b><i class="pull-right"><?php echo $data_sekolah->alamat_sklh; ?></i>
														</li>
														<li class="list-group-item">
															<b>Fax</b><i class="pull-right"><?php echo $data_sekolah->fax_sklh; ?></i>
														</li>
														<li class="list-group-item">
															<b>Telp.</b><i class="pull-right"><?php echo $data_sekolah->cp_sklh; ?></i>
														</li>
														<li class="list-group-item">
															<b>Email</b><i class="pull-right"><?php echo $data_sekolah->email_sklh; ?></i>
														</li>
														<li class="list-group-item">
															<b>Website</b><i class="pull-right"><?php echo $data_sekolah->web_sklh; ?></i>
														</li>
														<li class="list-group-item">
															<b>Jenjang</b><i class="pull-right"><?php echo $data_sekolah->level_sklh; ?></i>
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

								<div class="modal fade modal-danger" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true" id="<?php echo $data_sekolah->id_sklh;?>_hapus">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span></button>
													<h4 class="modal-title">Hapus Data</h4>
												</div>
												<div class="modal-body">
													<p>Yakin akan menghapus <?php echo $data_sekolah->nama_sklh; ?>?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
													<a href="<?php echo base_url()."web_admin/hapus_data/".$data_sekolah->id_sklh."/sekolah/".$data_sekolah->logo_sklh; ?>"><button type="button" class="btn btn-outline">Yakin</button>
													</a>
												</div>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
								</td>
							</tr>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
