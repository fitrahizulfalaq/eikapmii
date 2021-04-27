<!-- Main content -->
<section class="content">
  <div class="container-fluid">    
    <div class="row">      
      <!-- Menu-->
      <div class="col-lg-2 col-4">      	
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('profil')?>">
            <img src="<?= base_url("")?>/assets/dist/img/profil.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('profil')?>" class="small-box-footer">
            Profil
          </a>
        </div>
      </div>
      <?php if ($this->session->tipe_user < 4) { } else { ?>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('komisariat')?>">
            <img src="<?= base_url("")?>/assets/dist/img/kelompok.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('komisariat')?>" class="small-box-footer">
            Komisariat
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('rayon')?>">
            <img src="<?= base_url("")?>/assets/dist/img/kelompok.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('rayon')?>" class="small-box-footer">
            Rayon
          </a>
        </div>
      </div>    
      <?php } ?>
      <?php if ($this->session->tipe_user < 2) { } else { ?>
        <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('anggota')?>">
            <img src="<?= base_url("")?>/assets/dist/img/pendaftaran.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('anggota')?>" class="small-box-footer">
            Anggota
          </a>
        </div>
      </div>
      <?php } ?>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('video')?>">
            <img src="<?= base_url("")?>/assets/dist/img/video.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('video')?>" class="small-box-footer">
            Video
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('modul')?>">
            <img src="<?= base_url("")?>/assets/dist/img/modul.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('modul')?>" class="small-box-footer">
            Modul
          </a>
        </div>
      </div>  
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('info')?>">
            <img src="<?= base_url("")?>/assets/dist/img/info.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('info')?>" class="small-box-footer">
            Info
          </a>
        </div>
      </div>
      <?php if ($this->session->tipe_user < 3) { } else { ?>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('statistik')?>">
            <img src="<?= base_url("")?>/assets/dist/img/statistik.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('statistik')?>" class="small-box-footer">
            Statistik
          </a>
        </div>
      </div>
      <?php } ?>
      <?php if ($this->session->tipe_user < 10) { } else { ?>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('laporan')?>">
            <img src="<?= base_url("")?>/assets/dist/img/laporan.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('laporan')?>" class="small-box-footer">
            Laporan
          </a>
        </div>
      </div>
      <?php } ?>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/tentang')?>">
            <img src="<?= base_url("")?>/assets/dist/img/tentang.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/tentang')?>" class="small-box-footer">
            Tentang
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content