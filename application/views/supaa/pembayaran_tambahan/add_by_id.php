<section class="section">
    <div class="section-header">
        <h1>Pembayaran Tambahan</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Masukkan Data Pembayaran Tambahan</h4>
                </div>
                <div class="card-body">

                  <form class="" action="" method="post">
                    <div class="form-group">
                      <label>Pembeli</label>
                      <div class="" style="max-width:400px">
                        <select id="id_pembeli" name="id_pembeli" class="form-control" disabled>
                          <option value="<?=$pembeli->id?>"><?=$pembeli->nama_pembeli?> - NIK <?=$pembeli->NIK?></option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>ID Pembelian</label>
                        <div class="" style="max-width:400px">
                            <select id="id_pembelian" name="id_pembelian" class="form-control" disabled>
                                <option value="<?=$pembelian->id?>"><?=$pembelian->id?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Biaya</label>
                        <div class="" style="max-width:400px">
                            <input type="text" name="biaya" value="<?=set_value('biaya')?>" class="form-control <?= form_error('biaya') ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= form_error('biaya')?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Jatuh Tempo</label>
                      <div class="" style="max-width: 400px">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fa fa-calendar-alt"></i>
                            </div>
                          </div>
                          <input type="date" name="tanggal_jatuh_tempo" value="<?=set_value('tanggal_jatuh_tempo')?>" class="form-control datepicker <?= form_error('tanggal_jatuh_tempo') ? 'is-invalid' : '' ?>" placeholder="DD-MM-YYY">
                          <div class="invalid-feedback">
                						<?= form_error('tanggal_jatuh_tempo') ?>
                					</div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Bayar</label>
                      <div class="" style="max-width: 400px">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fa fa-calendar-alt"></i>
                            </div>
                          </div>
                          <input type="date" name="tanggal_bayar" value="<?=set_value('tanggal_bayar')?>" class="form-control datepicker <?= form_error('tanggal_bayar') ? 'is-invalid' : '' ?>" placeholder="DD-MM-YYY">
                        </div>
                      </div>
                      <div class="" style="color:#e83e8c">
                        <small class="" style="color:#e83e8c">
                          Kosongi jika pembeli belum melakukan pembayaran.
                        </small>

                      </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pembayaran</label>
                        <div class="" style="max-width:400px">
                            <input type="text" name="jenis_pembayaran" value="<?=set_value('jenis_pembayaran')?>" class="form-control <?= form_error('jenis_pembayaran') ? 'is-invalid' : '' ?>" placeholder="Kelebihan tanah, tambahan bangunan, dll">
                            <div class="invalid-feedback">
                                <?= form_error('jenis_pembayaran')?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <div class="" style="max-width:400px">
                            <input type="text" name="keterangan" value="<?=set_value('keterangan')?>" class="form-control <?= form_error('keterangan') ? 'is-invalid' : '' ?>" placeholder="Pembayaran...">
                            <div class="invalid-feedback">
                                <?= form_error('keterangan')?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button onclick="return confirm('Apakah Anda yakin data yang dimasukkan sudah benar?')" type="submit" class="btn btn-success">Simpan</button>
                        <a href="<?=site_url('pembelian/detail/'.$pembelian->id)?>" type="button" class="btn btn-danger">Batal</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</section>
