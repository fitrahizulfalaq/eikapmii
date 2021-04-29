<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Tabel Rangkungan Komisariat</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table width="100%" class="table table-bordered">
                <thead>
                  <tr>
                    <td width="7%">No</td>
                    <td width="60%">Indikator</td>
                    <td width="33%">Nilai / Prosentase</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Jumlah Komisariat</td>
                    <td><?= $jumlah_komisariat?> Komisariat</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jumlah Rayon</td>
                    <td><?= $jumlah_rayon ?> Rayon</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Total Alumni</td>
                    <td><?= $total_alumni ?> Alumni</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Berdasarkan Kelamin</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="kelaminChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Berdasarkan Pekerjaan</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pekerjaanChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Berdasarkan Pendidikan</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pendidikanChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Berdasarkan Pernikahan</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pernikahanChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Berdasarkan Sebaran Per Provinsi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="provinsiChart" style="min-height: 250px; height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->