<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('lahan');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Program</label>
              <select name="program_id" class="form-control" id="program_id" required>
                <option value="<?= set_value('program_id');?>">Pilihan : </option>
                <option value="Gotong Royong">Gotong Royong</option>
<!--                 <option value="Sewa">Sewa</option>
                <option value="Tanah Keluarga">Tanah Keluarga</option>
                <option value="Tanah Adat">Tanah Adat</option>
                <option value="Penggarap / Bagi Hasil">Penggarap / Bagi Hasil</option> -->
              </select>
              <?php echo form_error('program_id')?>
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <div class="input-group mb-3">
                <input type="number" class="form-control" name="jumlah" placeholder="Ex: 1000" value="<?= set_value('jumlah');?>" minlength="11" maxlenght="50" required>
                <div class="input-group-append"><div class="input-group-text"><span>Ha</span></div></div>
              </div>                            
              <?php echo form_error('jumlah')?>                        
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Tambah</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
