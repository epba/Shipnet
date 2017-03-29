<?php echo $this->session->flashdata('notifikasi'); ?>


<div class="box box-danger no-margin">
	<div class="box-header">
		<a href="<?php echo site_url(); ?>web_admin/form/perusahaan">
			<button class="btn bg-navy btn-md pull-right">Tambah Data</button>
		</a>
	</div>
	<div class="box-body">
		<table class="table tbl-all">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Perusahaan</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($perusahaan as $no => $perusahaan): ?>
					<?php $rujukan = ($perusahaan->add_by == "ADM1") ? "Admin" : "" ; ?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><?php echo $perusahaan->nama_per; ?></td>
						<td>
							<a href="<?php echo base_url(); ?>web_admin/data_detail_perusahaan/<?php echo $perusahaan->id_per ; ?>" class="btn btn-social-icon bg-olive btn-xs">
								<i class="fa fa-search"></i>
							</a>
							<span data-toggle="tooltip" title="Hapus">
								<a class="btn btn-social-icon btn-danger btn-xs" data-toggle="modal" data-target="#<?php echo $perusahaan->id_per; ?>_hapus"><i class="fa fa-trash"></i></a>
							</span>
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

