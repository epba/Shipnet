<?php echo $this->session->flashdata('notifikasi'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <a href="<?php echo base_url(); ?>web_perusahaan/form_loker/add">
          <button class="btn bg-navy btn-md pull-right">Tambah Data</button>
        </a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped table-bordered tbl-all">
          <thead>
            <th>No.</th>
            <th>Judul Loker</th>
            <th>Masa Berlaku</th>
            <th>Actions</th>
          </thead>
          <tbody>
            <?php foreach($loker as $l => $val){ ?>
            <tr>
              <td><?php echo ++$l; ?></td>
              <td><?php echo $val->judul_lok ?></td>
              <td><?php echo $val->time_end_lok ?></td>
              <td>
                <a href="<?php echo site_url('web_perusahaan/edit/'.$val->id_lok); ?>" class="btn btn-success btn-xs" data-toggle="tooltip" title="Detail"><i class="fa fa-search "></i>
                </a> 
                <a href="<?php echo site_url('web_perusahaan/remove/'.$val->id_lok); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Ubah"><i class="fa fa-edit "></i>
                </a>
                <a href="<?php echo site_url('web_perusahaan/remove/'.$val->id_lok); ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash "></i>
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>


        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>