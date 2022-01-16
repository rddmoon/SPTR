<section class="section">
  <div class="section-header">
    <h1>Pembeli</h1>
  </div>
  <div class="row">
    <div class="col-12 col-offset-12">
      <div class="card">
        <div class="card-header">
          <h4>Ubah Data Pembeli</h4>
        </div>
        <div class="card-body">
          <form class="" action="" method="post">
            <div class="form-group">
              <label>Nama</label>
              <input type="hidden" name="pembeli_id" value="<?=$pembeli->id?>">
              <input type="text" name="nama" value="<?=$this->input->post('nama') ?? $pembeli->nama_pembeli?>" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('nama') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>NIK</label>
              <input type="text" name="NIK" value="<?=$this->input->post('NIK') ?? $pembeli->NIK?>" class="form-control <?= form_error('NIK') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('NIK') ?>
    					</div>
            </div>
            <div class="form-group mb-0">
              <label>Alamat</label>
              <textarea name="alamat" style="height:150px" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>"><?php echo $this->input->post('alamat') ?? $pembeli->alamat;?></textarea>
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
                <input type="text" name="telepon" value="<?=$this->input->post('telepon') ?? $pembeli->telepon?>" class="form-control phone-number <?= form_error('telepon') ? 'is-invalid' : '' ?>" placeholder="08xxxxxxxxxx">
                <div class="invalid-feedback">
      						<?= form_error('telepon') ?>
      					</div>
              </div>
            </div>
            <?php $ttl = explode(',', $pembeli->ttl);
                  // $trimmed_array = array_map('trim', $ttl);
                  // $date = new DateTime($trimmed_array[1].' '.$trimmed_array[2].''.$trimmed_array[3]);
                  $date = new DateTime($ttl[1]);
                  $lahir = $date->format('Y-m-d');
                  $kota = $ttl[0];
            ?>
            <div class="form-group">
              <label>Tempat Tanggal Lahir</label>
              <br>
              <div class="form-group" style="max-width: 300px">
                <label>Tempat</label>
                <input type="text" name="tempat" value="<?=$this->input->post('tempat') ?? $kota?>" class="form-control <?= form_error('tempat') ? 'is-invalid' : '' ?>" placeholder="Kota">
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
                  <input type="date" name="tl" value="<?=$this->input->post('tl') ?? $lahir?>" class="form-control datepicker <?= form_error('tl') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
        						<?= form_error('tl') ?>
        					</div>
                </div>

              </div>
            </div>
            <div class="form-group">
              <label>Status Perkawinan</label>
              <select name="status_perkawinan" class="form-control <?= form_error('status_perkawinan') ? 'is-invalid' : '' ?>">
                <?php $status = $this->input->post('status_perkawinan') ? $this->input->post('status_perkawinan') : $pembeli->status_perkawinan; ?>
                <option value="">- Pilih Status -</option>
                <option value="Kawin" <?=$status == 'Kawin' ? 'selected' : null?>>Kawin</option>
                <option value="Belum Kawin" <?=$status == 'Belum Kawin' ? 'selected' : null?>>Belum Kawin</option>
              </select>
              <div class="invalid-feedback">
    						<?= form_error('status_perkawinan') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="pekerjaan" value="<?=$this->input->post('pekerjaan') ?? $pembeli->pekerjaan?>" class="form-control <?= form_error('pekerjaan') ? 'is-invalid' : '' ?>">
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
