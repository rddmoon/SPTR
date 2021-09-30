<section class="section">
    <div class="section-header">
        <h1>Perumahan</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data Perumahan</h4>
                </div>
                <div class="card-body">
                    <form class="" action="" method="post">
                        <div class="form-group">
                            <label>Nama Perumahan</label>
                            <input type="hidden" name="perumahan_id" value="<?=$perumahan->id?>">
                            <input type="text" name="nama" value="<?=$this->input->post('nama') ?? $perumahan->nama?>" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= form_error('nama') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Unit</label>
                            <div class="" style="max-width:200px">
                                <input type="number" min="1" name="jumlah_unit" value="<?=$this->input->post('jumlah_unit') ?? $perumahan->jumlah_unit?>" class="form-control" <?= form_error('jumlah_unit') ? 'is-invalid' : '' ?>>
                                <div class="invalid-feedback">
                                    <?= form_error('jumlah_unit') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" value="<?=$this->input->post('lokasi') ?? $perumahan->lokasi?>" class="form-control" <?= form_error('lokasi') ? 'is-invalid' : '' ?>>
                            <div class="invalid-feedback">
                                <?= form_error('lokasi') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="<?=site_url('perumahan')?>" type="button" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>