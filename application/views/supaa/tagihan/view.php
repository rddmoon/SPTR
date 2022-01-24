<section class="section">
  <div class="section-header">
    <h1>Tagihan Tunggakan Pembayaran</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <!-- <div class="card">
        <div class="card-header">
          <h4>Tagihan Tunggakan</h4>
        </div>
      </div> -->
      <?php $today = date('Y-m-d'); ?>
      <div class="card">
        <div class="card-header">
          <h4>Data Tunggakan</h4>
          <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><?=$sort?></a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Urutkan Dari</li>
                      <li><a href="<?=site_url('tagihan')?>" class="dropdown-item">Terlama</a></li>
                      <li><a href="<?=site_url('tagihan/terbaru')?>" class="dropdown-item">Terbaru</a></li>
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
                <h4><?=$no?>) ID Pembelian: <?=$value->id_pembelian?> --- Pembayaran: <?=$header?></h4>
              </div>
              <div class="accordion-body collapse" id="panel-body-<?=$no++?>" data-parent="#accordion" style="">
                <p class="mb-0">
                  Nama Pembeli: <?=$value->nama_pembeli?></br>
                  Jumlah: <?="Rp".number_format($value->biaya, 2);?></br>
                  Jatuh Tempo: <?=date('d M Y', strtotime($value->tanggal_jatuh_tempo))?></br>
                  Lama tunggakan: <?=round(abs(strtotime($today) - strtotime($value->tanggal_jatuh_tempo))/86400)?> hari
                </p>
              </br>
                <a href="<?=site_url('pembayaran/detail/'.$value->id)?>" class="btn btn-info btn-sm btn-round">
                  <i class="fa fa-eye"></i>
                  Tunggakan
                </a>
                &nbsp;&nbsp;
                <a href="<?=site_url('pembelian/detail/'.$value->id_pembelian)?>" class="btn btn-primary btn-sm btn-round">
                  <i class="fa fa-eye"></i>
                  Pembelian
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
