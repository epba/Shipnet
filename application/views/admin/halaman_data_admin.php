<div class="box box-danger">
	<div class="box-header">
		<button class="btn bg-navy btn-md pull-right">Tambah Data</button>
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
				<?php foreach ($admin as $no => $data_admin): ?>

					<tr>
						<td><?php echo $no+1; ?> </td>
						<td><?php echo $data_admin->nama; ?></td>
						<td></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
