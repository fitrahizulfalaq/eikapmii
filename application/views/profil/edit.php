<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('profil');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Email</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" value="<?= $this->input->post('email') ?? $row->email ?>" readonly required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>                                                  
            </div>
            <div class="form-group">
              <label>Username</label>
              <div class="input-group mb-3">
                <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
                <input type="text" class="form-control" name="username" placeholder="username" value="<?= $this->input->post('username') ?? $row->username ?>" readonly required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-users"></span>
                  </div>
                </div>
              </div>                            
              <?php echo form_error('username')?>                        
            </div>
            <div class="form-group">
              <label>Password</label><small> (Kosongkan bila tidak diganti)</small>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Ex: Maksimal 20 digit" minlength="8" maxlenght="50" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock" onclick="showPassword()"></span>
                  </div>
                </div>
              </div>                            
              <?php echo form_error('password')?>                        
            </div>
            <div class="form-group">
              <label>Nama</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="nama" placeholder="Ex: Fitrah Izul Falaq" value="<?= $row->nama?>" minlength="6" maxlenght="50" required>
              </div>                            
              <?php echo form_error('nama')?>                        
            </div>
            <div class="form-group">
              <label>Kota Kelahiran</label>
              <input type="text" class="form-control" name="tempat_lahir" placeholder="Ex: Kota Probolinggo" value="<?= $row->tempat_lahir?>" minlength="3" maxlenght="50" required>
            </div>
            <div class="form-group">
              <label>Tanggal lahir</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span><i class="fas fa-building"></i></span></div></div>
                <select class="form-control" name="tanggal" required="">
                    <option value="">Tanggal</option>
                    <?php
                        for ($i=1; $i<=31 ; $i++) {
                    ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <select class="form-control" name="bulan" required="">
                    <option value="">Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <select class="form-control" name="tahun" required="">
                    <option value="">Tahun</option>
                    <?php
                        for ($i=1960; $i<=date('Y')-23 ; $i++) {
                    ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                        }
                    ?>
                </select>
              </div>                            
              <?php echo form_error('tgl_lahir')?>                        
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="kelamin" class="form-control" required>
                <option value="<?= $row->kelamin?>">Pilihan : <?= $row->kelamin?></option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <?php echo form_error('kelamin')?>
            </div>
            <div class="form-group">
              <label>HP</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span>+62</span></div></div>
                <input type="number" class="form-control" name="hp" placeholder="Ex: 85231519519" value="<?= $row->hp?>" minlength="11" maxlenght="50" required>
              </div>                            
              <?php echo form_error('hp')?>                        
            </div>
            <div class="form-group">
              <label>Provinsi</label>
              <select name="provinsi" class="form-control" id="provinsi" required>
                <option value="<?= $row->provinsi ?>">Pilih : <?= $this->fungsi->get_deskripsi_advanced("provinces","id", $row->provinsi,"name") ?></option>
                <?php
                  $this->db->order_by('name','ASC');
                  foreach ($this->fungsi->pilihan("provinces")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->name?></option>
                <?php }?>
              </select>
              <?php echo form_error('provinsi')?>
            </div>
            <div class="form-group">
              <label>Kota</label>
              <select name="kota" class="kota form-control" id="kota" required>
                <option value="<?= $row->kota?>">Pilihan : <?= $this->fungsi->get_deskripsi_advanced("regencies","id",$row->kota,"name" )?></option>
              </select>
              <?php echo form_error('kota')?>
            </div>
            <div class="form-group">
              <label>Kecamatan</label>
              <select name="kecamatan" class="kecamatan form-control" id="kecamatan" required>
                <option value="<?= $row->kecamatan?>">Pilihan : <?= $this->fungsi->get_deskripsi_advanced("districts","id",$row->kecamatan,"name")?></option>
              </select>
              <?php echo form_error('kecamatan')?>
            </div>
            <div class="form-group">
              <label>Kelurahan</label>
              <select name="kelurahan" class="kelurahan form-control" id="kelurahan" required>
                <option value="<?= $row->kelurahan?>">Pilihan : <?= $this->fungsi->get_deskripsi_advanced("villages","id",$row->kelurahan,"name")?></option>
              </select>
              <?php echo form_error('kelurahan')?>
            </div>            
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="domisili" placeholder="Ex: Jl. Semarang No. 5, Sumbersari, Klojen, Kota Malang" value="<?= $row->domisili?>" minlength="30" maxlenght="100" required>
              </div>                            
              <?php echo form_error('domisili')?>                        
            </div>
            <div class="form-group">
              <label>Status Pernikahan</label>
              <select name="pernikahan" class="form-control" required>
                <option value="<?= $row->pernikahan?>">Pilihan : <?= $row->pernikahan?></option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah">Menikah</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
              </select>
              <?php echo form_error('pernikahan')?>
            </div>
            <div class="form-group">
              <label>Pendidikan Terakhir</label>
              <select name="pendidikan_terakhir" class="form-control" required>
                <option value="<?= $row->pendidikan_terakhir?>">Pilihan : <?= $row->pendidikan_terakhir?></option>
                <option value="SD sederajat">SD sederajat</option>
                <option value="SMP sederajat">SMP sederajat</option>
                <option value="SMA sederajat">SMA sederajat</option>
                <option value="Diploma 3">Diploma 3</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
              <?php echo form_error('pendidikan_terakhir')?>
            </div>
            <div class="form-group">
              <label>Pekerjaan Utama</label>
              <select name="pekerjaan_utama" class="form-control" required>
                <option value="<?= $row->pekerjaan_utama ?>">Pilih : <?= $this->fungsi->get_deskripsi("tb_pekerjaan",$row->pekerjaan_utama) ?></option>
                <?php
                  foreach ($this->fungsi->pilihan("tb_pekerjaan")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->deskripsi?></option>
                <?php }?>
              </select>
              <?php echo form_error('pekerjaan_utama')?>
            </div>
            <div class="form-group">
              <label>Angkatan</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-calendar"></span></div></div>
                <select class="form-control" name="angkatan" required="">
                    <option value="<?= $row->angkatan?>">Pilihan : <?= $row->angkatan?></option>
                    <?php
                        for ($i=1960; $i<=date('Y')-6 ; $i++) {
                    ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                        }
                    ?>
                </select>
              </div>                            
              <?php echo form_error('angkatan')?>                        
            </div>
            <div class="form-group">
              <label>Tahun Bergabung</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-calendar"></span></div></div>
                <select class="form-control" name="tahun_bergabung" required="">
                    <option value="<?= $row->tahun_bergabung?>">Pilihan : <?= $row->tahun_bergabung?></option>
                    <?php
                        for ($i=1960; $i<=date('Y')-6 ; $i++) {
                    ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                        }
                    ?>
                </select>
              </div>                            
              <?php echo form_error('tahun_bergabung')?>                        
            </div>
            <?php if($row->foto != null) {?>
            <div>
              <img src="<?=base_url('assets/dist/img/foto-user/'.$row->foto)?>" style="width: 10%"><br>
              <input type="hidden" name="foto" value="<?= $this->input->post('foto') ?? $row->foto; ?>">
              <a href="<?= site_url('profil/hapusfoto/'.$row->id);?>"><small>Hapus foto?</small></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>Foto</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
              <small>Maksimal ukuran file 514 Kb</small>
              <br>                     
            </div>            
            <?php } ?>            
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