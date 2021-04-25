<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">
      <!--  Contents -->
      <?php if ($this->fungsi->hitung_rows("tb_lahan","id",$this->session->id) == null) { ?>
        <div class="alert alert-danger">
          Anda belum bergabung pada fitur Gotong Royong, apakah anda ingin bergabung ?
          <a href="<?=base_url("donasi/tambah");?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Mari Bergabung</a>      
        </div>
      <?php } ?>
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --