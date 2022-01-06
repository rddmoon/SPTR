<section class="section">
  <div class="section-header">
    <h1>Beranda</h1>
  </div>
  <?php date_default_timezone_set('Asia/Jakarta');
  $today = date('Y-m-d');
  $yesterday = date('Y-m-d', strtotime("-1 day", strtotime($today)))?>
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
            <?php foreach ($weekly_pembayaran as $key => $value) {?>
            <li class="media">
              <div class="media-body">
                <?php if($value->tanggal_bayar = $today){ ?>
                <div class="float-right">Hari ini</div>
                <?php }elseif($value->tanggal_bayar = $yesterday){ ?>
                <div class="float-right"><?=date('d M Y', strtotime($value->tanggal_bayar))?></div>
                <div class="float-right">Kemarin</div>
                <?php }else{ ?>
                <div class="float-right"><?=date('d M Y', strtotime($value->tanggal_bayar))?></div>
                <?php } ?>
                <div class="media-title"><?=$value->nama_pembeli?></div>
                <div class="text-small">
                  <span class="" style="color:#6777ef"><?="Rp".number_format($value->biaya, 2);?></span><div class="bullet"></div>ID <?=$value->id_pembelian?><div class="bullet"></div>
                  <span class="text-muted">Oleh: <?=$value->nama_user?></span>
                </div>
              </div>
            </li>
          <?php } ?>
          </ul>
        </br>
          <div class="text-center pt-1 pb-1">
            <a href="<?=site_url('pembayaran')?>" class="btn btn-primary btn-lg btn-round">
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
                    <div class="media-right"><?=$value->blok?> <?=$value->cluster?></div>
                    <div class="media-title"><a href="<?=site_url('pembelian/detail/'.$value->id)?>"><?=$value->id?></a></div>
                    <div class="text-muted text-small"><?=$value->nama_pembeli?> <div class="bullet"></div> <?=date('d M Y', strtotime($value->tanggal_beli))?></div>
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
