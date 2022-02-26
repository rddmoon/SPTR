<section class="section">
  <div class="section-header">
    <h1>Tunggakan Pembayaran</h1>
  </div>
  <div class="search-element" style="display:flex; margin-bottom:20px;" >
        <form class="form-inline" action="<?php echo site_url() . $site; ?>" method="post">
            <input class="form-control" type="text" placeholder="Cari..." name="search" data-width="250" data-height="36">
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
  <div class="row">
    <div class="col-12">
      <?php $today = date('Y-m-d'); ?>
      <div class="card">
        <div class="card-header">
          <h4>Data Tunggakan</h4>
          <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><?=$sort?></a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Urutkan Dari</li>
                      <li><a href="<?=site_url('tunggakan')?>" class="dropdown-item">Terlama</a></li>
                      <li><a href="<?=site_url('tunggakan/terbaru')?>" class="dropdown-item">Terbaru</a></li>
                    </ul>
                  </div>
        </div>
        <div class="card-body">
          <div id="accordion">
            <div class="accordion">
              <?php $no = 1;
              foreach ($tagihan as $key => $value) {?>
              <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-<?=$no?>" aria-expanded="false">
                <?php if($value->jenis == 0){
                          $header = "DP" ;
                        }
                        else {
                          $header = "Cicilan ".$value->jenis;
                        }?>
                <h4><?=$no?>)&nbsp ID Pembelian: &nbsp<?=$value->id_pembelian?></h4>
              </div>
              <div class="accordion-body collapse" id="panel-body-<?=$no++?>" data-parent="#accordion" style="">
                <p class="mb-0">
                  Nama Pembeli: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?=$value->nama_pembeli?></br>
                  Jumlah Tunggakan: &nbsp<?=$value->tunggakan?></br>
                  Cicilan Perbulan: &nbsp&nbsp&nbsp&nbsp&nbsp<?="Rp".number_format($value->cicilan_perbulan, 2);?></br>
                  Total Tunggakan: &nbsp&nbsp&nbsp&nbsp<?="Rp".number_format($value->total_tunggakan, 2);?></br>
                  Lama tunggakan: &nbsp&nbsp&nbsp&nbsp<?php
                  $date1 = new DateTime($today);
                  $date2 = new DateTime($value->tanggal_jatuh_tempo);
                  $datediff = date_diff($date1, $date2);
                  // $days = round(abs(strtotime($today) - strtotime($value->tanggal_jatuh_tempo))/86400);
                  $tahun = $datediff->y;
                  $bulan = $datediff->m;
                  $hari = $datediff->d;
                  // echo $datediff->format('%y tahun, %m bulan, %d hari.');
                  if ($tahun > 0) {
                    echo $tahun. ' tahun ';
                  }
                  if ($bulan > 0) {
                    echo $bulan . ' bulan ';
                  }
                  if ($hari > 0) {
                    echo $hari . ' hari';
                  }
                  if ($hari == 0 && $bulan == 0 && $tahun == 0) {
                    echo 'Baru hari ini';
                  }
                  // echo ' ' . $days . ' hari.';
                  ?>
                </p>
              </br>
                <a href="<?=site_url('tunggakan/detail/'.$value->id_pembelian)?>" class="btn btn-info btn-sm btn-round">
                  <i class="fa fa-eye"></i>
                  Tunggakan
                </a>
                &nbsp;&nbsp;
                <a href="<?=site_url('pembelian/detail/'.$value->id_pembelian)?>" class="btn btn-primary btn-sm btn-round">
                  <i class="fa fa-eye"></i>
                  Pembelian
                </a>
                &nbsp;&nbsp;
                <a href="<?=site_url('tunggakan/cetak/'.$value->id_pembelian)?>" target="_blank" class="btn btn-warning btn-sm btn-round">
                  <i class="fa fa-print"></i>
                  Cetak
                </a>
              </div>
            </br>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="floating-buttons">
  <button id="back-to-top" type="button" class="back-to-top btn btn-primary" data-toggle="tooltip" data-original-title="Kembali ke atas" data-placement="right" data-trigger="hover" aria-label="Kembali ke atas">
    <i class="fa fa-chevron-up" aria-hidden="true"></i></button>
</div>
