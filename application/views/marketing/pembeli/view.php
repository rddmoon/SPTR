<section class="section">
  <div class="section-header">
    <h1>Pembeli</h1>
  </div>
  <div class="search-element" style="display:flex; margin-bottom:20px;" >
        <form class="form-inline" action="<?php echo site_url() . 'pembeli'; ?>" method="post">
            <input class="form-control" type="text" placeholder="Cari..." name="search" data-width="250" data-height="36">
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Pembeli</h4>
        </div>
        <div class="card-body">
          <div class="text-right">
            <a href="<?=site_url('pembeli/add')?>" class="btn btn-primary">
              <i class="fa fa-user-plus"></i> Tambah</a>
          </div>
        </br>
          <table class="table table-hover table-responsive">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">TTL</th>
                <th scope="col">Status</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($pembeli->result() as $key => $value) {
              ?>
              <tr class="text-center">
                <td><?=$no++?></td>
                <td><?=$value->nama_pembeli?></td>
                <td><?=$value->NIK?></td>
                <td style="min-width:200px"><?=$value->alamat?></td>
                <td><?=$value->telepon?></td>
                <td><?=$value->ttl?></td>
                <td><?=$value->status_perkawinan?></td>
                <td><?=$value->pekerjaan?></td>
                <td style="min-width:210px">
                  <form class="" action="<?=site_url('pembeli/delete')?>" method="post">
                    <a href="<?=site_url('pembeli/edit/'.$value->id)?>" class="btn btn-warning">
                      <i class="fa fa-edit"></i> Ubah
                    </a>
                    <input type="hidden" name="pembeli_id" value="<?=$value->id?>">
                    <button onclick="return confirm('Apakah anda yakin akan menghapus data?')" class="btn btn-danger" hidden>
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
