<section class="section">
  <div class="section-header">
    <h1>Metode Pembayaran</h1>
  </div>
  <div class="search-element" style="display:flex; margin-bottom:20px;" >
        <form class="form-inline" action="<?php echo site_url() . 'metode'; ?>" method="post">
            <input class="form-control" type="text" placeholder="Cari..." name="search" data-width="250" data-height="36">
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
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
<div class="floating-buttons">
  <button id="back-to-top" type="button" class="back-to-top btn btn-primary" data-toggle="tooltip" data-original-title="Kembali ke atas" data-placement="right" data-trigger="hover" aria-label="Kembali ke atas">
    <i class="fa fa-chevron-up" aria-hidden="true"></i></button>
</div>
