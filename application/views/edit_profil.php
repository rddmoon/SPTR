<section class="section">
  <div class="section-header">
    <h1>Profil</h1>
  </div>
  <div class="row">
    <div class="col-12 col-offset-12">
      <div class="card">
        <div class="card-header">
          <h4>Ubah Profil</h4>
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
              <label>Password Saat Ini</label>
                <input type="password" name="password_lama" value="<?=$this->input->post('password_lama')?>" class="form-control <?= form_error('password_lama') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
      						<?= form_error('password_lama') ?>
      					</div>
            </div>
            <div class="form-group">
              <label>Password</label>
                <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
      						<?= form_error('password') ?>
      					</div>
                <div class="" style="color:#e83e8c">
                  <small class="" style="color:#e83e8c">
                    Jika tidak diganti, biarkan kosong.
                  </small>
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
              <button type="submit" class="btn btn-success">Simpan</button>
              <a href="<?=site_url('user/profil/'.$user->id)?>" type="button" class="btn btn-danger pull-right">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
