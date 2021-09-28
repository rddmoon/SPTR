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
            <div class="form-group mb-0">
              <label>Alamat</label>
              <textarea name="alamat" value="<?=set_value('alamat')?>" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>"></textarea>
              <div class="invalid-feedback">
    						<?= form_error('alamat') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-phone"></i>
                  </div>
                </div>
                <input type="text" name="telepon" value="<?=set_value('telepon')?>" class="form-control phone-number <?= form_error('telepon') ? 'is-invalid' : '' ?>" placeholder="08xxxxxxxxxx">
                <div class="invalid-feedback">
      						<?= form_error('telepon') ?>
      					</div>
              </div>
            </div>
            <div class="form-group">
              <label>Tempat Tanggal Lahir</label>
              <br>
              <div class="form-group" style="max-width: 300px">
                <label>Tempat</label>
                <input type="text" name="tempat" value="<?=set_value('tempat')?>" class="form-control <?= form_error('tempat') ? 'is-invalid' : '' ?>" placeholder="Kota">
                <div class="invalid-feedback">
                  <?= form_error('tempat') ?>
                </div>
                <label>Tanggal Lahir</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-calendar-alt"></i>
                    </div>
                  </div>
                  <input type="date" name="tl" value="<?=set_value('tl')?>" class="form-control datepicker <?= form_error('tl') ? 'is-invalid' : '' ?>" placeholder="DD-MM-YYY">
                  <div class="invalid-feedback">
        						<?= form_error('tl') ?>
        					</div>
                </div>

              </div>
            </div>
            <div class="form-group">
              <label>Status Perkawinan</label>
              <select name="status_perkawinan" class="form-control <?= form_error('status_perkawinan') ? 'is-invalid' : '' ?>">
                <option value="">- Pilih Status -</option>
                <option value="Kawin" <?=set_value('status_perkawinan') == 'Kawin' ? "selected" : null?>>Kawin</option>
                <option value="Belum Kawin" <?=set_value('status_perkawinan') == 'Belum Kawin' ? "selected" : null?>>Belum Kawin</option>
              </select>
              <div class="invalid-feedback">
    						<?= form_error('status_perkawinan') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="pekerjaan" value="<?=set_value('pekerjaan')?>" class="form-control <?= form_error('pekerjaan') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('pekerjaan') ?>
    					</div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Simpan</button>
              <a href="<?=site_url('pembeli')?>" type="button" class="btn btn-danger pull-right">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
