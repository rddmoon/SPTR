<section class="section">
  <div class="section-header">
    <h1>Pengguna</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Pengguna</h4>
        </div>
        <div class="card-body">
          <div class="text-right">
            <a href="<?=site_url('user/add')?>" class="btn btn-primary">
              <i class="fa fa-user-plus"></i> Tambah</a>
          </div>
        </br>
          <table class="table table-hover">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Akses</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($user->result() as $key => $value) {
              ?>
              <tr class="text-center">
                <td><?=$no++?></td>
                <td><?=$value->username?></td>
                <td><?=$value->nama?></td>
                <td><?=$value->role?></td>
                <td>
                  <a href="<?=site_url('user/edit/')?>" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Ubah</a>
                  <a href="<?=site_url('user/delete/')?>" class="btn btn-danger">
                      <i class="fa fa-trash-alt"></i> Hapus</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>
