<section class="section">
    <div class="section-header">
        <h1>Detail Unit <?= $unit->blok?></h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Unit <?= $unit->blok?></h4>
                </div>
                <div class="card-body">
                  <div class="text-right">
                    <?php
                    if ($unit->status == "tersedia") {?>
                      <p><b>Status:</b>&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success"><?=$unit->status?></span></p>
                    <?php } ?>
                    <?php
                    if ($unit->status == "terjual") {?>
                      <p><b>Status:</b>&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-danger"><?=$unit->status?></span></p>
                    <?php } ?>
                  </div>
                    <p>Nama Perumahan&nbsp;&nbsp;: <?=$unit->nama_perumahan?></p>
                    <p>Cluster&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$unit->cluster?></p>
                    <p>Blok&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$unit->blok?></p>
                    <p>Tipe Rumah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$unit->tipe_rumah?></p>
                    <p>Luas Tanah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$unit->luas_tanah?></p>
                    <p>Tingkat Rumah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$unit->tingkat_rumah?></p>
                    <p>BEP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$unit->BEP?></p>
                    <p>Harga Jual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$unit->harga_jual?></p>
                </div>
            </div>
        </div>
    </div>
</section>
