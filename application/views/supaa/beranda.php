<section class="section">
  <div class="section-header">
    <h1>Beranda</h1>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-hand-holding-usd"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pembelian Berjalan</h4>
          </div>
          <div class="card-body">
            <?php echo $pembelian_berjalan ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-coins"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Menunggu Bayar</h4>
          </div>
          <div class="card-body">
            <?php echo $menunggu_pembayaran ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-home"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Unit Tersedia</h4>
          </div>
          <div class="card-body">
            <?php echo $unit_tersedia ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Jumlah Pengguna</h4>
          </div>
          <div class="card-body">
            <?php echo $pengguna ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4>Pembayaran Terbaru</h4>
        </div>
        <div class="card-body">
        </br>
          <ul class="list-unstyled list-unstyled-border">
            <li class="media">
              <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-1.png" alt="avatar" width="50">
              <div class="media-body">
                <div class="float-right text-primary">Now</div>
                <div class="media-title">Farhan A Mujib</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-2.png" alt="avatar" width="50">
              <div class="media-body">
                <div class="float-right">12m</div>
                <div class="media-title">Ujang Maman</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-3.png" alt="avatar" width="50">
              <div class="media-body">
                <div class="float-right">17m</div>
                <div class="media-title">Rizal Fakhri</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-4.png" alt="avatar" width="50">
              <div class="media-body">
                <div class="float-right">21m</div>
                <div class="media-title">Alfa Zulkarnain</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-4.png" alt="avatar" width="50">
              <div class="media-body">
                <div class="float-right">21m</div>
                <div class="media-title">Alfa Zulkarnain</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
          </ul>
        </br>
          <div class="text-center pt-1 pb-1">
            <a href="#" class="btn btn-primary btn-lg btn-round">
              View All
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4>Pembelian Minggu Ini</h4>
        </div>
        <div class="card-body">
          <div class="summary">
            <div class="summary-info">
              <h4><?=$jml_weekly_pembelian?> Unit</h4>
              <div class="text-muted">Total pemasukan dari pembelian tersebut sebesar <?="Rp".number_format($weekly_pemasukan, 2);?></div>
            </div>
            <div class="summary-item">
              <h6>Pembelian Terbaru</h6>
              <ul class="list-unstyled list-unstyled-border">
                <?php if ($weekly_pembelian == NULL) { ?>
                  <div class="" style="color:#e83e8c">
                    <span class="text-small">Belum ada unit terjual minggu ini.</span>
                  </div>
                <?php } ?>
                <?php foreach ($weekly_pembelian as $key => $value) {?>
                <li class="media">
                  <div class="media-body">
                    <div class="media-right">$405</div>
                    <div class="media-title"><a href="<?=site_url('pembelian/detail/'.$value->id)?>"><?=$value->id?></a></div>
                    <div class="text-muted text-small">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday</div>
                  </div>
                </li>
              <?php } ?>
              </ul>
            </div>
            <div class="text-center pt-1 pb-1">
              <a href="<?=site_url('pembelian')?>" class="btn btn-primary btn-lg btn-round">
                Lihat Semua
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
