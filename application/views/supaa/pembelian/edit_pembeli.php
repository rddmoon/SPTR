<section class="section">
    <div class="section-header">
        <h1>Pembelian</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data Pembelian Pindah Tangan</h4>
                </div>
                <div class="card-body">
                  <form class="" action="" method="post">
                      <div class="form-group">
                          <label>Pembeli</label>
                          <div class="" style="max-width:400px">
                              <select name="id_pembeli" class="form-control <?=form_error('id_pembeli') ? 'is-invalid' : '' ?>">
                                <?php $spembeli = $this->input->post('id_pembeli') ? $this->input->post('id_pembeli') : $pembelian->id_pembeli; ?>
                                  <option value="">- Pilih Pembeli -</option>
                                  <?php foreach ($pembeli as $key => $value) {?>
                                    <option value="<?=$value->id?>" <?=$spembeli == $value->id ? 'selected' : null?>><?=$value->nama_pembeli?> - <?=$value->NIK?></option>;
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
                              <select id="perumahan" name="perumahan" class="form-control" disabled>
                                <option value="<?=$perumahan_selected->id?>"><?=$perumahan_selected->nama?></option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Unit</label>
                          <div class="" style="max-width:400px">
                              <select id="id_unit" name="id_unit" class="form-control" disabled>
                                <option value="<?=$unit_selected->id?>"><?=$unit_selected->blok?> cluster <?=$unit_selected->cluster?></option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Harga Beli</label>
                        <div class="" style="max-width:400px">
                          <input id="harga_beli" type="text" name="harga_beli" value="<?="Rp".number_format($pembelian->harga_beli, 2);?>" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Metode</label>
                        <div class="" style="max-width:400px">
                            <select id="id_metode" name="id_metode" class="form-control" disabled>
                              <option value="<?=$metode_selected->id?>"><?=$metode_selected->nama_metode?></option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>DP</label>
                          <div class="" style="max-width:400px">
                              <input type="text" name="DP" value="<?="Rp".number_format($pembelian->DP, 2);?>" class="form-control" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Cicilan Perbulan</label>
                          <div class="" style="max-width:400px">
                            <input type="text" name="cicilan_perbulan" value="<?="Rp".number_format($pembelian->cicilan_perbulan, 2);?>" class="form-control"disabled>
                          </div>
                      </div>
                      <input type="hidden" name="status_pembelian" value="berjalan">
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
