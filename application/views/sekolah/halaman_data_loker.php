<?php echo $this->session->flashdata('notifikasi'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <a href="<?php echo base_url(); ?>web_sekolah/form_loker/add">
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
            <th>Status</th>
            <th>Actions</th>
          </thead>
          <tbody>
            <?php foreach($loker as $l => $val){ ?>
            <tr>
              <td><?php echo ++$l; ?></td>
              <td><?php echo $val->judul_lok ?></td>
              <td><?php echo $val->time_end_lok ?></td>
              <td><?php $status = ($val->verifikasi_lok == "0") ? "Waiting" : "Published" ; echo $status; ?></td>
              <td>
                <span data-toggle="tooltip" title="Detail">
                <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>web_sekolah/data_detail_loker/<?php echo $val->id_lok ; ?>">
                    <i class="fa fa-search "></i>
                  </a> 
                </span>
                <?php if($val->verifikasi_lok == "0" && $val->verifikasi_by_lok == ""){ ?>
                <span data-toggle="tooltip" title="Setujui">
                  <a class="btn bg-navy btn-xs" data-toggle="modal" data-target="#acc_<?php echo $val->id_lok; ?>">
                    <i class="fa fa-check "></i>
                  </a>
                </span>
                <?php } ?>

                <!-- Model ACC -->
                <div class="modal fade modal-info" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true" id="acc_<?php echo $val->id_lok;?>">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Setujui Loker</h4>
                        </div>
                        <div class="modal-body">
                          <p>Yakin akan menyetujui loker <?php echo $val->judul_lok; ?>?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                          <a href="<?php echo base_url()."web_sekolah/acc_loker/".$val->id_lok; ?>"><button type="button" class="btn btn-outline">Yakin</button>
                          </a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- Model ACC -->

                <!-- EDIT LOKER 
                <a href="<?php echo site_url('web_perusahaan/form_loker/edit/'.$val->id_lok); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Ubah"><i class="fa fa-edit "></i>
                </a> -->
                <!-- HAPUS LOKER
                <span data-toggle="tooltip" title="Hapus">
                  <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus_<?php echo $val->id_lok;?>"><i class="fa fa-trash "></i>
                  </a>
                </span>
              -->
              <!-- Model Hapus 
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
                  </div>
                </div>
                Modal Hapus -->
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