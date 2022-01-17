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
      <div class="card">
        <div class="card-header">
          <h4>Data Tunggakan</h4>
        </div>
        <div class="card-body">
          <div id="accordion">
            <div class="accordion">
              <?php $no = 1;
              foreach ($tagihan as $key => $value) {?>
              <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-<?=$no?>" aria-expanded="false">
                <h4><?=$no?>. <?=$value->id?></h4>
              </div>
              <div class="accordion-body collapse" id="panel-body-<?=$no++?>" data-parent="#accordion" style="">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
