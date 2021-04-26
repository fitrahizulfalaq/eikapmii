<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('rayon') ?? $row->id ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?> : <?= $row->deskripsi?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
          <div class="card-body">            
            <div class="form-group">
              <label>Nama</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="deskripsi" placeholder="Ex: rayon Sunan Kalijaga" value="<?= $this->input->post('deskripsi') ?? $row->deskripsi?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('deskripsi')?>                        
            </div>
            <div class="form-group">
              <label>Komisariat</label>
              <select name="komisariat_id" class="form-control" id="komisariat_id" required>
                <option value="<?= set_value('komisariat_id') || $row->deskripsi;?>">Pilihan : <?= $this->fungsi->get_deskripsi("tb_komisariat",$row->komisariat_id)?></option>
                <?php
                  foreach ($this->fungsi->pilihan("tb_komisariat")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->deskripsi?></option>
                <?php }?>
              </select>
              <?php echo form_error('komisariat_id')?>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
