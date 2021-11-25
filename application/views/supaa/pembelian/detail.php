<section class="section">
    <div class="section-header">
        <h1>Detail Pembelian</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pembelian</h4>
                </div>
                <div class="card-body">
                  <div class="text-right">
                    <?php
                    if ($pembelian->status_pembelian == "berjalan") {?>
                      <p><b>Status:</b>&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-primary"><?=$pembelian->status_pembelian?></span></p>
                    <?php } ?>
                    <?php
                    if ($pembelian->status_pembelian == "dibatalkan") {?>
                      <p><b>Status:</b>&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-danger"><?=$pembelian->status_pembelian?></span></p>
                    <?php } ?>
                    <?php
                    if ($pembelian->status_pembelian == "selesai") {?>
                      <p><b>Status:</b>&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success"><?=$pembelian->status_pembelian?></span></p>
                    <?php } ?>
                  </div>
                  <p><b>ID Pembelian</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->id?></p>
                  <p><b>Pembeli</b></p>
                  <p>NIK :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->NIK?></p>
                  <p>Nama :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->nama_pembeli?></p>
                  <p>Alamat :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->alamat?></p>
                  <p>No. Telepon :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->telepon?></p>
                  <p><b>Unit Rumah</b></p>
                  <p>Perumahan :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$perumahan_selected->nama?></p>
                  <p>Cluster :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->cluster?></p>
                  <p>Blok :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->blok?></p>
                  <p>Tipe Rumah :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->tipe_rumah?></p>
                  <p><b>Metode </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$metode_selected->nama_metode?></p>
                  <p><b>Cicilan ke</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$cicilan_ke?><b> / </b> <?=$metode_selected->banyaknya_cicilan?></p>
                  <p><b>Tanggal Pembelian</b>&nbsp;&nbsp;<?=date('d M Y', strtotime($pembelian->tanggal_beli))?></p>
                  <p><b>Harga Beli</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->harga_beli, 2);?></p>
                  <p><b>Cicilan Perbulan</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->cicilan_perbulan, 2);?></p>
                  <p><b>Tunggakan</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->tunggakan?></p>
                  <p><b>Total Uang Masuk</b>&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->uang_masuk, 2);?></p>
                  <div class="text-center">
                    <?php if($pembelian->status_pembelian == "berjalan"){ ?>
                    <form class="" action="<?=site_url('pembelian/edit_pembeli/'.$pembelian->id)?>" method="post">
                        <button onclick="return confirm('Apakah Anda yakin akan mengganti pembeli?')" class="btn btn-warning">
                          <i class="fas fa-users-cog"></i> Pindah Tangan
                        </button>
                      </form>
                  </br>
                  <form class="" action="<?=site_url('pembelian/edit_dibatalkan/'.$pembelian->id)?>" method="post">
                      <button onclick="return confirm('Apakah Anda yakin akan membatalkan pembelian?')" class="btn btn-danger">
                        <i class="fa fa-times-circle"></i> Batalkan Pembelian
                      </button>
                    </form>
                  <?php } ?>
                  </div>
                </br>
                </div>
            </div>
            <!-- Pembayaran -->
            <h2 class="section-title">Pembayaran</h2>
            <p class="section-lead">
            Pembayaran-pembayaran menyangkut DP dan cicilan pada pembelian ini.
            </p>
            <div class="row">
              <?php foreach($pembayaran->result() as $key) {?>
                <?php if($key->jenis == 0){
                          $header = "DP" ;
                        }
                        else {
                          $header = "Cicilan ".$key->jenis;
                        }?>
                <?php if($key->blokir == "lunas"){?>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-success">
                        <div class="card-header">
                          <h4 style="color:#63ed7a"><?=$header?></h4>
                          <div class="card-header-action">
                            <a href="#" class="btn btn-success">
                              Cetak
                            </a>
                          </div>
                        </div>
                      <div class="card-body">
                        <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                        <?php if($key->jenis == 0) {?>
                          <p>Dibayar: <?=date('d M Y', strtotime($key->tanggal_bayar))?></p>
                          <p></br></p>
                        <?php }else { ?>
                          <p>Jatuh Tempo: <?=date('d M Y', strtotime($key->tanggal_jatuh_tempo))?></p>
                          <p>Dibayar: <?=date('d M Y', strtotime($key->tanggal_bayar))?></p>
                        <?php } ?>
                        <p><span style="color:#47c363"><b>LUNAS</b></span></p>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <?php if($key->blokir == "buka"){?>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4><?=$header?></h4>
                        <div class="card-header-action">
                          <a href="<?=site_url('pembayaran/bayar/'.$key->id)?>" onclick="return confirm('Apakah Anda yakin akan mengubah status pembayaran <?=$header?> menjadi lunas?')" class="btn btn-primary">
                            Bayar
                          </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                        <p>Jatuh Tempo: <?=date('d M Y', strtotime($key->tanggal_jatuh_tempo))?></p>
                        <p>Dibayar: -</p>
                        <p><span style="color:#6777ef"><b>MENUNGGU PEMBAYARAN</b></span></p>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <?php if($key->blokir == "blokir"){?>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-secondary">
                      <div class="card-header">
                        <h4 style="color:#808184"><?=$header?></h4>
                        <div class="card-header-action">
                          <a href="#" class="btn btn-secondary disabled">
                            Diblokir
                          </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                        <p>Jatuh Tempo: <?=date('d M Y', strtotime($key->tanggal_jatuh_tempo))?></p>
                        <p>Dibayar: -</p>
                        <p><span style="color:#808184"><b>MELEBIHI JATUH TEMPO</b></span></p>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>

            <!-- Pembayaran Tambahan -->
            <h2 class="section-title">Pembayaran Tambahan/Lain-lain</h2>
            <p class="section-lead">
            Pembayaran-pembayaran menyangkut kelebihan tanah, tambahan bangunan, dan pembayaran tambahan lainnya pada pembelian ini.
            </p>
            <?php if($pembelian->status_pembelian == "berjalan"){ ?>
              <div class="text-center">
                  <a href="<?=site_url('pembayaran_tambahan/add_by_id/'.$pembelian->id)?>" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Buat Pembayaran Tambahan Baru</a>
              </div>
            <?php } ?>
          </br>
            <div class="row">
              <?php $no = 1;
              foreach($pembayaran_tambahan->result() as $key) {?>
                <?php if($key->tanggal_bayar != NULL){?>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-success">
                        <div class="card-header">
                          <h4 style="color:#63ed7a">Pembayaran <?=$no++?></h4>
                          <div class="card-header-action">
                            <a href="#" class="btn btn-success">
                              Cetak
                            </a>
                          </div>
                        </div>
                      <div class="card-body">
                        <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                        <p>Jenis: <?=$key->jenis_pembayaran?></p>
                        <p>Dibayar: <?=date('d M Y', strtotime($key->tanggal_bayar))?></p>
                        <br><br>
                        <p><span style="color:#47c363"><b>LUNAS</b></span></p>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <?php if($key->tanggal_bayar == NULL){?>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4>Pembayaran <?=$no++?></h4>
                        <div class="card-header-action">
                          <a href="<?=site_url('pembayaran_tambahan/bayar/'.$key->id)?>" class="btn btn-primary">
                            Bayar
                          </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                        <p>Jenis: <?=$key->jenis_pembayaran?></p>
                        <p>Jatuh Tempo: <?=date('d M Y', strtotime($key->tanggal_jatuh_tempo))?></p>
                        <p>Dibayar: -</p>
                        <p><span style="color:#6777ef"><b>MENUNGGU PEMBAYARAN</b></span></p>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
        </div>
    </div>
</section>
<div class="floating-buttons">
  <button id="back-to-top" type="button" class="back-to-top btn btn-primary" data-toggle="tooltip" data-original-title="Kembali ke atas" data-placement="right" data-trigger="hover" aria-label="Kembali ke atas">
    <i class="fa fa-chevron-up" aria-hidden="true"></i></button>
</div>
