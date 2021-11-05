<section class="section">
    <div class="section-header">
        <h1>Detail Pembelian</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <?php //foreach ($pembelian->result() as $key => $value) { ?>

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
                  <p><b>ID Pembelian</b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->id?></p>
                  <p><b>Pembeli</b></p>
                  <p>NIK :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->NIK?></p>
                  <p>Nama :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->nama_pembeli?></p>
                  <p>Alamat :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->alamat?></p>
                  <p>No. Telepon :&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->telepon?></p>
                  <p><b>Unit Rumah</b></p>
                  <p>Perumahan :&nbsp;&nbsp;&nbsp;&nbsp;<?=$perumahan_selected->nama?></p>
                  <p>Cluster :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->cluster?></p>
                  <p>Blok :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->blok?></p>
                  <p>Tipe Rumah :&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->tipe_rumah?></p>
                  <p><b>Metode </b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$metode_selected->nama_metode?></p>
                  <p><b>Cicilan ke</b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$cicilan_ke?><b> / </b> <?=$metode_selected->banyaknya_cicilan?></p>
                  <p><b>Tanggal Pembelian</b>&nbsp;&nbsp;&nbsp;&nbsp;<?=date('d M Y', strtotime($pembelian->tanggal_beli))?></p>
                  <p><b>Harga Beli</b>&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->harga_beli, 2);?></p>
                  <p><b>Cicilan Perbulan</b>&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->cicilan_perbulan, 2);?></p>
                  <p><b>Tunggakan</b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->tunggakan?></p>
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
          <?php //} ?>
            <div class="card">
                <div class="card-header">
                    <h4>Pembayaran</h4>
                </div>
                <div class="card-body">
                  <?php foreach ($pembayaran as $key => $value) {?>
                    <div class="col-12 col-md-6 col-lg-6">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h4><?=$value->keterangan?></h4>
                          <div class="card-header-action">
                            <a href="#" class="btn btn-primary">
                              View All
                            </a>
                          </div>
                        </div>
                        <div class="card-body">
                          <p>Write something here</p>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Pembayaran Lain-lain</h4>
                </div>
                <div class="card-body">
                  <?php foreach ($pembayaran_tambahan as $key => $value) {?>
                    <div class="col-12 col-md-6 col-lg-6">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h4><?=$value->keterangan?></h4>
                          <div class="card-header-action">
                            <a href="#" class="btn btn-primary">
                              View All
                            </a>
                          </div>
                        </div>
                        <div class="card-body">
                          <p>Write something here</p>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
