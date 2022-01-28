<section class="section">
  <div class="section-header">
    <h1>Pembayaran Tambahan</h1>
  </div>
  <div class="search-element" style="display:flex; margin-bottom:20px;" >
        <form class="form-inline" action="<?php echo site_url() . 'pembayaran_tambahan'; ?>" method="post">
            <input class="form-control" type="text" placeholder="Cari..." name="search" data-width="250" data-height="36">
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Pembayaran Tambahan</h4>
        </div>
        <div class="text-center">
            <a href="<?=site_url('pembayaran_tambahan/add')?>" class="btn btn-primary" hidden>
            <i class="fa fa-plus"></i> Buat Pembayaran Tambahan Baru</a>
        </div>
        <br>
        <div class="card-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="nav-item"><a class="nav-link active" href="#semua" aria-controls="semua" role="tab" data-toggle="tab">Semua</a></li>
            <li role="presentation" class="nav-item"><a class="nav-link" href="#buka" aria-controls="buka" role="tab" data-toggle="tab">Belum Bayar</a></li>
            <li role="presentation" class="nav-item"><a class="nav-link" href="#lunas" aria-controls="lunas" role="tab" data-toggle="tab">Lunas</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="semua">
              <table class="table table-hover table-responsive">
                <thead>
                  <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Pembelian</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pembayaran_tambahan->result() as $key => $value) { ?>
                  <tr class="text-center">
                    <td><?=$no++?></td>
                    <td><?=$value->id_pembelian?></td>
                    <td><?=$value->nama_pembeli?></td>
                    <td><?="Rp".number_format($value->biaya, 2);?></td>
                    <?php if($value->tanggal_bayar == null){ ?>
                      <td>-</td>
                    <?php } ?>
                    <?php if($value->tanggal_bayar != null){ ?>
                      <td><?=date('d-m-Y', strtotime($value->tanggal_bayar))?></td>
                    <?php } ?>
                    <td><?=$value->jenis_pembayaran?></td>
                    <?php
                      if ($value->tanggal_bayar == null) {?>
                        <td><span class="badge badge-primary">Menunggu</span></td>
                    <?php } ?>
                    <?php
                      if ($value->tanggal_bayar != null) {?>
                        <td><span class="badge badge-success">Lunas</span></td>
                    <?php } ?>
                    <td style="min-width:310px">
                      <a href="<?=site_url('pembayaran_tambahan/detail/'.$value->id)?>" class="btn btn-info">
                        <i class="fa fa-eye"></i> Detail
                      </a>
                      <?php if($value->tanggal_bayar == null){ ?>
                        <a href="<?=site_url('pembayaran_tambahan/bayar/'.$value->id)?>" class="btn btn-primary">
                          <i class="fa fa-coins"></i> Bayar
                        </a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>

            </div>
            <div role="tabpanel" class="tab-pane" id="buka">
              <table class="table table-hover table-responsive">
                <thead>
                  <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Pembelian</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pembayaran_tambahan_buka->result() as $key => $value) {
                  ?>
                  <?php if($value->tanggal_bayar == null){ ?>
                    <tr class="text-center">
                      <td><?=$no++?></td>
                      <td><?=$value->id_pembelian?></td>
                      <td><?=$value->nama_pembeli?></td>
                      <td><?="Rp".number_format($value->biaya, 2);?></td>
                      <td>-</td>
                      <td><?=$value->jenis_pembayaran?></td>
                      <td style="min-width:310px">
                        <a href="<?=site_url('pembayaran_tambahan/detail/'.$value->id)?>" class="btn btn-info">
                          <i class="fa fa-eye"></i> Detail
                        </a>
                        <a href="<?=site_url('pembayaran_tambahan/bayar/'.$value->id)?>" class="btn btn-primary">
                          <i class="fa fa-coins"></i> Bayar
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="lunas">
              <table class="table table-hover table-responsive">
                <thead>
                  <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Pembelian</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pembayaran_tambahan_lunas->result() as $key => $value) {
                  ?>
                    <tr class="text-center">
                      <td><?=$no++?></td>
                      <td><?=$value->id_pembelian?></td>
                      <td><?=$value->nama_pembeli?></td>
                      <td><?="Rp".number_format($value->biaya, 2);?></td>
                      <td><?=date('d-m-Y', strtotime($value->tanggal_bayar))?></td>
                      <td><?=$value->jenis_pembayaran?></td>
                      <td style="min-width:310px">
                        <a href="<?=site_url('pembayaran_tambahan/detail/'.$value->id)?>" class="btn btn-info">
                          <i class="fa fa-eye"></i> Detail
                        </a>
                      </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<div class="floating-buttons">
  <button id="back-to-top" type="button" class="back-to-top btn btn-primary" data-toggle="tooltip" data-original-title="Kembali ke atas" data-placement="right" data-trigger="hover" aria-label="Kembali ke atas">
    <i class="fa fa-chevron-up" aria-hidden="true"></i></button>
</div>
