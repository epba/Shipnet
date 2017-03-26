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
                <span data-toggle="tooltip" title="Hapus">
                  <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus_<?php echo $val->id_lok;?>"><i class="fa fa-trash "></i>
                  </a>
                </span>
                <div class="modal fade modal-danger" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true" id="hapus_<?php echo $val->id_lok;?>">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Hapus Data</h4>
                        </div>
                        <div class="modal-body">
                          <p>Yakin akan menghapus <?php echo $val->judul_lok; ?>?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                          <a href="<?php echo base_url()."web_perusahaan/hapus_loker/".$val->id_lok."/".$val->foto_lok; ?>"><button type="button" class="btn btn-outline">Yakin</button>
                          </a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                </td>
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