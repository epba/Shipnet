<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <a href="http://localhost/shipnet//web_admin/form/perusahaan">
          <button class="btn bg-navy btn-md pull-right">Tambah Data</button>
        </a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <tr>
          <th>Judul Lok</th>
            <th>Isi Lok</th>
            <th>Foto Lok</th>
            <th>Alamat Lok</th>
            <th>Time Lok</th>
            <th>Time End Lok</th>
            <th>Actions</th>
          </tr>
          <?php foreach($loker as $l){ ?>
          <tr>
            <td><?php echo $l['judul_lok']; ?></td>
            <td><?php echo $l['isi_lok']; ?></td>
            <td><?php echo $l['foto_lok']; ?></td>
            <td><?php echo $l['alamat_lok']; ?></td>
            <td><?php echo $l['time_lok']; ?></td>
            <td><?php echo $l['time_end_lok']; ?></td>
            <td>
              <a href="<?php echo site_url('loker/edit/'.$l['id_lok']); ?>" class="btn btn-info">Edit</a> 
              <a href="<?php echo site_url('loker/remove/'.$l['id_lok']); ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </table>


        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>