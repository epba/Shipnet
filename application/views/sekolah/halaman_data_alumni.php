<?php echo $this->session->flashdata('notifikasi'); ?>
<div class="box box-danger">
	<div class="box-header">
		<a href="<?php echo site_url(); ?>web_sekolah/form_alumni/add">
			<button class="btn bg-navy btn-md pull-right">Tambah Data</button>
		</a>
	</div>
	<div class="box-body">
		<table class="table tbl-all">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($alumni as $no => $data_alumni): ?>

					<tr>
						<td><?php echo $no+1; ?> </td>
						<td><?php echo str_replace($this->session->userdata('data_login_sekolah')['id_sklh']."-","", $data_alumni->username_al); ?></td>
						<td><?php echo $data_alumni->nama_al; ?></td>
						<td>
							<span data-toggle="tooltip" title="Detail">
								<a class="btn btn-social-icon bg-olive btn-xs" data-toggle="modal" data-target="#detail_<?php echo $data_alumni->id_al; ?>">
									<i class="fa fa-search"></i>
								</a>
							</span>
							<span data-toggle="tooltip" title="Hapus">
								<a class="btn btn-social-icon btn-danger btn-xs" data-toggle="modal" data-target="#<?php echo $data_alumni->id_al; ?>_hapus"><i class="fa fa-trash"></i>
								</a>
							</span>
							<!-- Modal Detail -->
							<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true" id="detail_<?php echo $data_alumni->id_al;?>">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true text-red">×</span></button>
												<h4 class="modal-title"><?php echo $data_alumni->nama_al; ?></h4>
											</div>
											<div class="modal-body">
												<div class="box-body box-profile">
													<img class="profile-user-img img-responsive img-circle" src='<?php echo base_url()."assets/upload/sekolah/".$data_alumni->logo_al; ?>' alt="No IMG">
													<br>
													<ul class="list-group list-group-unbordered">
														<li class="list-group-item">
															<b>Nim Alumni</b><i class="pull-right"><?php echo str_replace($this->session->userdata('data_login_sekolah')['id_sklh']."-","", $data_alumni->username_al); ?></i>
														</li>
														<li class="list-group-item">
															<b>Nama</b><i class="pull-right"><?php echo $data_alumni->nama_al; ?></i>
														</li>
														<li class="list-group-item">
															<b>Alamat </b><i class="pull-right"><?php echo $data_alumni->alamat_al; ?></i>
														</li>
														<li class="list-group-item">
															<b>Telp.</b><i class="pull-right"><?php echo $data_alumni->cp_al; ?></i>
														</li>
														<li class="list-group-item">
															<b>Email</b><i class="pull-right"><?php echo $data_alumni->email_al; ?></i>
														</li>
														<li class="list-group-item">
															<b>Tahun Lulus</b><i class="pull-right"><?php echo $data_alumni->thn_lulus_al; ?></i>
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
								<!-- Modal Detail / -->
								<!-- Modal Hapus -->
								<div class="modal fade modal-danger" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true" id="<?php echo $data_alumni->id_al;?>_hapus">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
												<h4 class="modal-title">Hapus Data</h4>
											</div>
											<div class="modal-body">
												<p>Yakin akan menghapus <?php echo $data_alumni->nama_al; ?>?</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
												<a href="<?php echo base_url().'web_sekolah/hapus_data/'.$data_alumni->id_al."/".$data_alumni->foto_al; ?>/alumni"><button type="button" class="btn btn-outline">Yakin</button>
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
