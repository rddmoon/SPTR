<section class="section">
  <div class="section-header">
    <h1>Pengguna</h1>
  </div>
  <div class="row">
    <div class="col-12 col-offset-12">
      <div class="card">
        <div class="card-header">
          <h4>Ubah Data Pengguna</h4>
        </div>
        <div class="card-body">
          <?php //echo validation_errors(); ?>
          <form class="" action="" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="hidden" name="user_id" value="<?=$user->id?>">
              <input type="text" name="username" value="<?=$this->input->post('username') ?? $user->username?>" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('username') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?=$this->input->post('nama') ?? $user->nama?>" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('nama') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>Password</label> <small> (Jika tidak diganti, biarkan kosong)</small>
                <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
      						<?= form_error('password') ?>
      					</div>
            </div>
            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control <?= form_error('passconf') ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
    						<?= form_error('passconf') ?>
    					</div>
            </div>
            <div class="form-group">
              <label>Role</label>
              <select name="role" class="form-control <?= form_error('role') ? 'is-invalid' : '' ?>">
                <?php $role = $this->input->post('role') ? $this->input->post('role') : $user->role ?>
                <option value="supaa" <?=$role == 'supaa' ? 'selected' : null?>>Supaa</option>
                <option value="dirut" <?=$role == 'dirut' ? 'selected' : null?>>Dirut</option>
                <option value="dirut_keuangan" <?=$role == 'dirut_keuangan' ? 'selected' : null?>>Dirut Keuangan</option>
                <option value="keuangan" <?=$role == 'keuangan' ? 'selected' : null?>>Keuangan</option>
                <option value="marketing" <?=$role == 'marketing' ? 'selected' : null?>>Marketing</option>
                <option value="penagihan" <?=$role == 'penagihan' ? 'selected' : null?>>Penagihan</option>
                <option value="kasir" <?=$role == 'kasir' ? 'selected' : null?>>Kasir</option>
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
