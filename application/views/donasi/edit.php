<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('lahan')?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
          <div class="card-body">
            <div class="card-body">
            <div class="form-group">
              <label>Pernah Mengikuti Pelatihan Koperasi</label>
              <select name="pelatihan_koperasi" class="form-control" id="pelatihan_koperasi" required>
                <option value="<?= $row->pelatihan_koperasi; ?>">Pilihan : <?= $row->pelatihan_koperasi == "1" ? "Pernah" : "Belum"; ?> </option>
                <option value="1">Pernah Mengikuti</option>
                <option value="2">Belum Pernah</option>
              </select>
              <?php echo form_error('pelatihan_koperasi')?>
            </div>
            <div class="form-group">
              <label>Pernah Mengikuti Pelatihan Sertifikasi</label>
              <select name="pelatihan_sertifikasi" class="form-control" id="pelatihan_sertifikasi" required>
                <option value="<?= $row->pelatihan_sertifikasi;?>">Pilihan : <?= $row->pelatihan_sertifikasi == "1" ? "Pernah" : "Belum"; ?> </option>
                <option value="1">Pernah Mengikuti</option>
                <option value="2">Belum Pernah</option>
              </select>
              <?php echo form_error('pelatihan_sertifikasi')?>
            </div>
            <div class="form-group">
              <label>Pernah Mengikuti Pelatihan Lainnya</label>
              <select name="pelatihan_lainnya" class="form-control" id="pelatihan_lainnya" required>
                <option value="<?= $row->pelatihan_lainnya;?>">Pilihan : <?= $row->pelatihan_lainnya == "1" ? "Pernah" : "Belum"; ?> </option>
                <option value="1">Pernah Mengikuti</option>
                <option value="2">Belum Pernah</option>
              </select>
              <?php echo form_error('pelatihan_lainnya')?>
            </div>
            <div class="form-group">
              <label>Apakah Anda Petani ICS</label>
              <select name="petani_ics" class="form-control" id="petani_ics" required>
                <option value="<?= $row->petani_ics;?>">Pilihan : <?= $row->petani_ics == "1" ? "Ya" : "Tidak"; ?> </option>
                <option value="1">Ya</option>
                <option value="2">Tidak</option>
              </select>
              <?php echo form_error('petani_ics')?>
            </div>
            <div class="form-group">
              <label>Apakah Anda Petani SNI</label>
              <select name="petani_sni" class="form-control" id="petani_sni" required>
                <option value="<?= $row->petani_sni;?>">Pilihan : <?= $row->petani_sni == "1" ? "Ya" : "Tidak"; ?> </option>
                <option value="1">Ya</option>
                <option value="2">Tidak</option>
              </select>
              <?php echo form_error('petani_sni')?>
            </div>
            <div class="form-group">
              <label>Luasan SNI</label><small>(dalam Ha)</small>
              <div class="input-group mb-3">
                <input type="number" class="form-control" name="luasan_sni" placeholder="Ex: 1000" value="<?= $row->luasan_sni;?>" minlength="11" maxlenght="50" required>
                <div class="input-group-append"><div class="input-group-text"><span>Ha</span></div></div>
              </div>                            
              <?php echo form_error('luasan_sni')?>                        
            </div>
            <div class="form-group">
              <label>Tahun SNI</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-calendar"></span></div></div>
                <input type="number" class="form-control" name="tahun_sni" placeholder="Ex: 2019" value="<?= $row->tahun_sni;?>" minlength="4" maxlenght="4" required>
              </div>                            
              <?php echo form_error('tahun_sni')?>                        
            </div>
            <div class="form-group">
              <label>Memiliki sertifikat internasional</label>
              <select name="sertifikat_internasional" class="form-control" id="sertifikat_internasional" required>
                <option value="<?= $row->sertifikat_internasional;?>">Pilihan : <?= $row->sertifikat_internasional == "1" ? "Ya" : "Tidak"; ?> </option>
                <option value="1">Ya</option>
                <option value="2">Tidak</option>
              </select>
              <?php echo form_error('sertifikat_internasional')?>
            </div>
            <div class="form-group">
              <label>Luasan Sertifikat</label><small>(dalam Ha)</small>
              <div class="input-group mb-3">
                <input type="number" class="form-control" name="luasan_sertifikat_internasional" placeholder="Ex: 1000" value="<?= $row->luasan_sertifikat_internasional;?>" minlength="11" maxlenght="50" required>
                <div class="input-group-append"><div class="input-group-text"><span>Ha</span></div></div>
              </div>                            
              <?php echo form_error('luasan_sertifikat_internasional')?>                        
            </div>
            <div class="form-group">
              <label>Tahun Sertifikat Internasional</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-calendar"></span></div></div>
                <input type="number" class="form-control" name="tahun_sertifikat_internasional" placeholder="Ex: 2019" value="<?= $row->tahun_sertifikat_internasional;?>" minlength="4" maxlenght="4" required>
              </div>                            
              <?php echo form_error('tahun_sertifikat_internasional')?>                        
            </div>
            <div class="form-group">
              <label>Pengalaman Bertani</label>
              <select name="pengalaman_bertani" class="form-control" id="pengalaman_bertani" required>
                <option value="<?= $row->pengalaman_bertani;?>">Pilihan : <?= $row->pengalaman_bertani == "1" ? "Ya" : "Tidak"; ?> </option>
                <option value="1">Berpengalaman</option>
                <option value="2">Belum Berpengalaman</option>
              </select>
              <?php echo form_error('pengalaman_bertani')?>
            </div>
            <div class="form-group">
              <label>Jumlah Lahan</label><small>(dalam Ha)</small>
              <div class="input-group mb-3">
                <input type="number" class="form-control" name="jumlah_lahan" placeholder="Ex: 1000" value="<?= $row->jumlah_lahan;?>" minlength="11" maxlenght="50" required>
                <div class="input-group-append"><div class="input-group-text"><span>Ha</span></div></div>
              </div>                            
              <?php echo form_error('jumlah_lahan')?>                        
            </div>
            <div class="form-group">
              <label>Status Kepemilikan</label>
              <select name="status_kepemilikan" class="form-control" id="status_kepemilikan" required>
                <option value="<?= $row->status_kepemilikan;?>">Pilihan : <?= $row->status_kepemilikan; ?> </option>
                <option value="Pemilik">Pemilik</option>
                <option value="Sewa">Sewa</option>
                <option value="Tanah Keluarga">Tanah Keluarga</option>
                <option value="Tanah Adat">Tanah Adat</option>
                <option value="Penggarap / Bagi Hasil">Penggarap / Bagi Hasil</option>
              </select>
              <?php echo form_error('status_kepemilikan')?>
            </div>
            <div class="form-group">
              <label>Status Sertifikasi Laham</label>
              <select name="status_sertifikasi_lahan" class="form-control" id="status_sertifikasi_lahan" required>
                <option value="<?= $row->status_sertifikasi_lahan;?>">Pilihan : <?= $row->status_sertifikasi_lahan == "1" ? "Ada" : "Tidak"; ?> </option>
                <option value="1">Ada Sertifikat</option>
                <option value="2">Tidak Ada Sertifikat</option>
              </select>
              <?php echo form_error('status_sertifikasi_lahan')?>
            </div>
            <div class="form-group">
              <label>Tipe Pengolahan</label>
              <select name="tipe_pengolahan" class="form-control" id="tipe_pengolahan" required>
                <option value="<?= $row->tipe_pengolahan_lahan;?>">Pilihan : <?= $row->tipe_pengolahan_lahan; ?></option>
                <option value="Konvensional">Konvensional</option>
                <option value="Sertifikasi">Sertifikasi</option>
                <option value="Organik Tanpa Sertifikasi">Organik Tanpa Sertifikasi</option>
              </select>
              <?php echo form_error('tipe_pengolahan')?>
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
