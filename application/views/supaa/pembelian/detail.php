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
                  <p><b>ID Pembelian:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->id?></p>
                </div>
            </div>
          <?php //} ?>
            <div class="card">
                <div class="card-header">
                    <h4>Pembayaran</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Pembayaran Lain-lain</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</section>
