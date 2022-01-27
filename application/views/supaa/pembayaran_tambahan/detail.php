<section class="section">
    <div class="section-header">
        <h1>Detail Pembayaran Tambahan</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pembayaran Tambahan</h4>
                </div>
                <div class="card-body">
                  <div class="text-right">
                    <?php  if ($pembayaran_tambahan->tanggal_bayar == NULL) {?>
                      <p><b>Status:</b>&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-primary">Menunggu</span></p>
                    <?php } ?>
                    <?php  if ($pembayaran_tambahan->tanggal_bayar != NULL) {?>
                      <p><b>Status:</b>&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success">Lunas</span></p>
                    <?php } ?>
                  </div>
                    <p><b>ID Pembelian</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembayaran_tambahan->id_pembelian?></p>
                    <p><b>Nama Pembeli</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembayaran_tambahan->nama_pembeli?></p>
                    <p><b>Biaya</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembayaran_tambahan->biaya, 2);?></p>
                    <p><b>Tanggal Pembayaran</b>&nbsp;&nbsp;&nbsp;&nbsp;
                      <?php if($pembayaran_tambahan->tanggal_bayar == NULL){ echo "-";} ?>
                      <?php if($pembayaran_tambahan->tanggal_bayar != NULL){ echo date('d M Y', strtotime($pembayaran_tambahan->tanggal_bayar));} ?>
                    </p>
                    <p><b>Tanggal Jatuh Tempo</b>&nbsp;&nbsp;&nbsp;&nbsp;<?=date('d M Y', strtotime($pembayaran_tambahan->tanggal_jatuh_tempo))?></p>
                    <p><b>Jenis Pembayaran</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembayaran_tambahan->jenis_pembayaran?></p>
                    <p><b>Keterangan</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembayaran_tambahan->keterangan?></p>
                    </br>
                    <p><b>Cetak Kwitansi</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=ucfirst($kwitansi->sudah_cetak)?></p>
                    <p><b>Kwitansi</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</p>
                    <div>
                      <?php if($pembayaran_tambahan->tanggal_bayar == NULL){ ?>
                              <a href="#" class="btn btn-info disabled">
                                Lihat
                              </a>
                              <a href="#" class="btn btn-primary disabled">
                                Cetak
                              </a>
                      <?php } ?>
                      <?php if($pembayaran_tambahan->tanggal_bayar != NULL){ ?>
                        <a href="<?=site_url('kwitansi/index/'.$pembayaran_tambahan->id_kwitansi)?>" target="_blank" class="btn btn-info">
                          Lihat
                        </a>
                        <a href="<?=site_url('kwitansi/cetak/'.$pembayaran_tambahan->id_kwitansi)?>" target="_blank" class="btn btn-success">
                          Cetak
                        </a>
                      <?php } ?>
                    </div>
                    <div class="text-center">
                      <a href="<?=site_url('pembayaran_tambahan/bayar/'.$pembayaran_tambahan->id)?>" onclick="return confirm('Apakah Anda yakin akan mengubah status <?=$pembayaran_tambahan->keterangan?> menjadi lunas?')" class="btn btn-primary">
                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-coins"></i> Dibayar&nbsp;&nbsp;&nbsp;&nbsp;
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
