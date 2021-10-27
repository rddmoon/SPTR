<section class="section">
    <div class="section-header">
        <h1>Unit</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Masukkan Data Unit</h4>
                </div>
                <div class="card-body">
                    <form class="" action="" method="post">
                        <div class="form-group">
                            <label>Nama Perumahan</label>
                            <div class="" style="max-width:400px">
                                <select name="id_perumahan" class="form-control <?= form_error('id_perumahan') ? 'is-invalid' : '' ?>">
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
                            <a href="<?=site_url('unit')?>" type="button" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>