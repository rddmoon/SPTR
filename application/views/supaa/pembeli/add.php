<section class="section">
  <div class="section-header">
    <h1>Pembeli</h1>
  </div>
  <div class="row">
    <div class="col-12 col-offset-12">
      <div class="card">
        <div class="card-header">
          <h4>Masukkan Data Pembeli</h4>
        </div>
        <div class="card-body">
          <?php //echo validation_errors(); ?>
          <form class="" action="" method="post">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?=set_value('nama')?>" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('nama') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>NIK</label>
              <input type="text" name="NIK" value="<?=set_value('NIK')?>" class="form-control <?= form_error('NIK') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('NIK') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    +62
                  </div>
                </div>
                <input type="text" class="form-control phone-number">
              </div>
            </div>
            <div class="form-group">
              <label>Role</label>
              <select name="role" class="form-control <?= form_error('role') ? 'is-invalid' : '' ?>">
                <option value="">- Pilih Role -</option>
                <option value="supaa" <?=set_value('role') == 'supaa' ? "selected" : null?>>Supaa</option>
                <option value="dirut" <?=set_value('role') == 'dirut' ? "selected" : null?>>Dirut</option>
                <option value="dirut_keuangan" <?=set_value('role') == 'dirut_keuangan' ? "selected" : null?>>Dirut Keuangan</option>
                <option value="keuangan" <?=set_value('role') == 'keuangan' ? "selected" : null?>>Keuangan</option>
                <option value="marketing" <?=set_value('role') == 'marketing' ? "selected" : null?>>Marketing</option>
                <option value="penagihan" <?=set_value('role') == 'penagihan' ? "selected" : null?>>Penagihan</option>
                <option value="kasir" <?=set_value('role') == 'kasir' ? "selected" : null?>>Kasir</option>
              </select>
              <div class="invalid-feedback">
    						<?= form_error('role') ?>
    					</div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Simpan</button>
              <a href="<?=site_url('user')?>" type="button" class="btn btn-danger pull-right">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
