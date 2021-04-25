<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    <div class="col-12">     
      <div class="card-header">          
        <a href="<?=base_url("donasi/tambah");?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <?php if ($this->session->tipe_user == '2') { $this->load->view("template/message/status_log_book"); } ?>  
      <div class="card-header bg-primary">
        <h3 class="card-title">Riwayat Donasi</h3>
      </div>        
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list_admin">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="15%">Program</th>
                <th width="30%">Jumlah</th>
                <th width="30%">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td scope="row">
                    <p><?= $no++?></p>
                  </td>                  
                  <td scope="row">
                    <?= $data->program ?>
                  </td>
                  <td scope="row">
                    <?= $data->jumlah ?>
                  </td>
                  <td>
                    <?= $data->status == "1" ? '<span class="badge badge-success">Sudah Terverifikasi </span>' : '<span class="badge badge-danger">Belum Diverfikasi </span>' ?>
                  </td>
                </tr>
              <?php }?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --