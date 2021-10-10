<section class="section">
    <div class="section-header">
        <h1>Pembelian</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Masukkan Data Pembelian</h4>
                </div>
                <div class="card-body">
                  <form class="" action="" method="post">
                      <div class="form-group">
                          <label>Pembeli</label>
                          <?php date_default_timezone_set('Asia/Jakarta');
                          $now = date('ymdhis'); ?>
                          <input type="hidden" name="pembelian_id" value="<?=$now?>">
                          <div class="" style="max-width:400px">
                              <select name="id_pembeli" class="form-control <?= form_error('id_pembeli') ? 'is-invalid' : '' ?>">
                                  <option value="">- Pilih Pembeli -</option>
                                  <?php foreach ($pembeli->result() as $key => $value) {?>
                                  <option value="<?=$value->id?>"><?=$value->nama_pembeli?> - <?=$value->NIK?></option>
                                <?php } ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?= form_error('id_pembeli') ?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Perumahan</label>
                          <div class="" style="max-width:400px">
                              <select name="perumahan" class="form-control <?= form_error('perumahan') ? 'is-invalid' : '' ?>">
                                  <option value="">- Pilih Perumahan -</option>
                                  <?php foreach ($perumahan->result() as $key => $value) {?>
                                  <option value="<?=$value->id?>"><?=$value->nama?></option>
                                <?php } ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?= form_error('id_perumahan') ?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Unit</label>
                          <div class="" style="max-width:400px">
                              <select name="id_unit" class="form-control <?= form_error('id_unit') ? 'is-invalid' : '' ?>">
                                  <option value="">- Pilih Unit -</option>
                                  <?php foreach ($unit->result() as $key => $value) {?>
                                  <option value="<?=$value->id?>"><?=$value->blok?> Cluster <?=$value->cluster?></option>
                                <?php } ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?= form_error('id_unit') ?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Cluster</label>
                          <input type="text" name="cluster" value="<?=set_value('cluster')?>" class="form-control <?= form_error('cluster') ? 'is-invalid' : '' ?>">
                          <div class="invalid-feedback">
                              <?= form_error('cluster') ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Blok</label>
                          <input type="text" name="blok" value="<?=set_value('blok')?>" class="form-control <?= form_error('blok') ? 'is-invalid' : '' ?>">
                          <div class="invalid-feedback">
                              <?= form_error('blok') ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Tipe Rumah</label>
                          <div class="" style="max-width:200px">
                              <input type="number" min="1" name="tipe_rumah" value="<?=set_value('tipe_rumah')?>" class="form-control <?= form_error('tipe_rumah') ? 'is-invalid' : '' ?>">
                              <div class="invalid-feedback">
                                  <?= form_error('tipe_rumah')?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Luas Tanah</label>
                          <div class="" style="max-width:200px">
                              <input type="number" min="1" name="luas_tanah" value="<?=set_value('luas_tanah')?>" class="form-control <?= form_error('luas_tanah') ? 'is-invalid' : '' ?>">
                              <div class="invalid-feedback">
                                  <?= form_error('luas_tanah')?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Tingkat Rumah</label>
                          <div class="" style="max-width:200px">
                              <input type="number" min="1" name="tingkat_rumah" value="<?=set_value('tingkat_rumah')?>" class="form-control <?= form_error('tingkat_rumah') ? 'is-invalid' : '' ?>">
                              <div class="invalid-feedback">
                                  <?= form_error('tingkat_rumah')?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>BEP</label>
                          <input type="text" name="BEP" value="<?=set_value('BEP')?>" class="form-control <?= form_error('BEP') ? 'is-invalid' : '' ?>">
                          <div class="invalid-feedback">
                              <?= form_error('BEP')?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Harga Jual</label>
                          <input type="text" name="harga_jual" value="<?=set_value('harga_jual')?>" class="form-control <?= form_error('harga_jual') ? 'is-invalid' : '' ?>">
                          <div class="invalid-feedback">
                              <?= form_error('harga_jual')?>
                          </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a href="<?=site_url('pembelian')?>" type="button" class="btn btn-danger">Batal</a>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</section>
