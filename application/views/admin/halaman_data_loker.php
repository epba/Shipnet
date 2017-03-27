<?php echo $this->session->flashdata('notifikasi'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped table-bordered tbl-all">
          <thead>
            <th>No.</th>
            <th>Nama Perusahaan</th>
            <th>Judul Loker</th>
            <!-- <th>Rujukan</th> -->
            <th>Actions</th>
          </thead>
          <tbody>
            <?php foreach($loker as $l => $val){ ?>
            <tr>
              <td><?php echo ++$l; ?></td>
              <td><?php echo $val->tmp_lok ?></td>
              <td><?php echo $val->judul_lok ?></td>
              <!-- <td><?php echo $rujukan; ?></td> -->
              <td>
                <span data-toggle="tooltip" title="Detail">
                  <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#detail_<?php echo $val->id_lok; ?>">
                    <i class="fa fa-search "></i>
                  </a> 
                </span>
                <!-- Model Hapus -->
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
                  <!-- Model Hapus -->
                  <!-- Model Detail -->
                  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true" id="detail_<?php echo $val->id_lok;?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-body">
                            <div class="box-body box-profile">
                              <img class="img-responsive" src='<?php echo base_url()."assets/upload/loker/".$val->foto_lok; ?>' alt="No IMG">
                              <br>
                              <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                  <b>Nama Perusahaan</b><i class="pull-right"><?php echo $val->tmp_lok; ?></i>
                                </li>
                                <li class="list-group-item">
                                  <b>Judul Loker</b><i class="pull-right"><?php echo $val->judul_lok; ?></i>
                                </li>
                                <li class="list-group-item">
                                  <b>Masa Berlaku</b><i class="pull-right"><?php echo $val->time_end_lok; ?></i>
                                </li>
                              </ul>
                              <b>Konten</b><i class="pull-right"><?php echo $val->isi_lok; ?></i>

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
                    <!-- Model Detail -->
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