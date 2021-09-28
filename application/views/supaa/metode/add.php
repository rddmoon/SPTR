<section class="section">
  <div class="section-header">
    <h1>Metode Pembayaran</h1>
  </div>
  <div class="row">
    <div class="col-12 col-offset-12">
      <div class="card">
        <div class="card-header">
          <h4>Masukkan Data Metode</h4>
        </div>
        <div class="card-body">
          <?php //echo validation_errors(); ?>
          <form class="" action="" method="post">
            <div class="form-group">
              <label>Nama Metode</label>
              <input type="text" name="nama_metode" value="<?=set_value('nama_metode')?>" class="form-control <?= form_error('nama_metode') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('nama_metode') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>Banyak Cicilan</label>
              <div class="" style="max-width:200px">
                <input type="number" min="1" name="banyaknya_cicilan" value="<?=set_value('banyaknya_cicilan')?>" class="form-control <?= form_error('banyaknya_cicilan') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                  <?= form_error('banyaknya_cicilan') ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Simpan</button>
              <a href="<?=site_url('metode')?>" type="button" class="btn btn-danger pull-right">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
