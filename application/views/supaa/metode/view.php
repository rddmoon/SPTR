<section class="section">
  <div class="section-header">
    <h1>Metode Pembayaran</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Metode</h4>
        </div>
        <div class="card-body">
          <div class="text-right">
            <a href="<?=site_url('metode/add')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah</a>
          </div>
        </br>
          <table class="table table-hover">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Metode</th>
                <th scope="col">Banyak Cicilan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($metode->result() as $key => $value) {
              ?>
              <tr class="text-center">
                <td><?=$no++?></td>
                <td><?=$value->nama_metode?></td>
                <td><?=$value->banyaknya_cicilan?></td>
                <td style="min-width:209px">
                  <form class="" action="<?=site_url('metode/delete')?>" method="post">
                    <a href="<?=site_url('metode/edit/'.$value->id)?>" class="btn btn-warning">
                      <i class="fa fa-edit"></i> Ubah
                    </a>
                    <input type="hidden" name="metode_id" value="<?=$value->id?>">
                    <button onclick="return confirm('Apakah anda yakin akan menghapus data?')" class="btn btn-danger">
                      <i class="fa fa-trash-alt"></i> Hapus
                    </button>
                  </form>
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
