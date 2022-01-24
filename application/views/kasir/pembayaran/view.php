
<section class="section">
  <div class="section-header">
    <h1>Pembayaran</h1>
  </div>
  <div class="search-element" style="display:flex; margin-bottom:20px;" >
        <form class="form-inline" action="<?php echo site_url() . 'pembayaran'; ?>" method="post">
            <input class="form-control" type="text" placeholder="Cari..." name="search" data-width="250" data-height="36">
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Pembayaran</h4>
        </div>
        <div class="card-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="nav-item"><a class="nav-link active" href="#semua" aria-controls="semua" role="tab" data-toggle="tab">Semua</a></li>
            <li role="presentation" class="nav-item"><a class="nav-link" href="#buka" aria-controls="buka" role="tab" data-toggle="tab">Belum Bayar</a></li>
            <li role="presentation" class="nav-item"><a class="nav-link" href="#lunas" aria-controls="lunas" role="tab" data-toggle="tab">Lunas</a></li>
            <li role="presentation" class="nav-item"><a class="nav-link" href="#blokir" aria-controls="blokir" role="tab" data-toggle="tab">Diblokir</a></li>
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
                  foreach ($pembayaran->result() as $key => $value) { ?>
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
                    <?php if($value->jenis == 0){ ?>
                      <td>DP</td>
                    <?php } ?>
                    <?php if($value->jenis > 0){ ?>
                      <td>Cicilan <?=$value->jenis?></td>
                    <?php } ?>
                    <?php  if ($value->blokir == "buka") {?>
                      <td><span class="badge badge-primary">Menunggu</span></td>
                    <?php } ?>
                    <?php  if ($value->blokir == "lunas") {?>
                      <td><span class="badge badge-success">Lunas</span></td>
                    <?php } ?>
                    <?php  if ($value->blokir == "blokir") {?>
                      <td><span class="badge badge-secondary">Diblokir</span></td>
                    <?php } ?>
                    <td style="min-width:310px">
                      <a href="<?=site_url('pembayaran/detail/'.$value->id)?>" class="btn btn-info">
                        <i class="fa fa-eye"></i> Detail
                      </a>
                      <?php if($value->blokir == "blokir"){ ?>
                        <!-- <a href="<?=site_url('pembayaran/buka_blokir/'.$value->id)?>" onclick="return confirm('Apakah Anda yakin akan membuka blokir?')" class="btn btn-warning">
                          <i class="fa fa-key"></i> Buka Blokir
                        </a> -->
                      <?php } ?>
                      <?php if($value->blokir == "buka"){ ?>
                        <a href="<?=site_url('pembayaran/bayar/'.$value->id)?>" class="btn btn-primary">
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
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pembayaran_buka->result() as $key => $value) {
                  ?>
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
                    <?php if($value->jenis == 0){ ?>
                      <td>DP</td>
                    <?php } ?>
                    <?php if($value->jenis > 0){ ?>
                      <td>Cicilan <?=$value->jenis?></td>
                    <?php } ?>
                    <td><span class="badge badge-primary">Menuggu</span></td>
                    <td style="min-width:310px">
                      <a href="<?=site_url('pembayaran/detail/'.$value->id)?>" class="btn btn-info">
                        <i class="fa fa-eye"></i> Detail
                      </a>
                      <a href="<?=site_url('pembayaran/bayar/'.$value->id)?>" class="btn btn-primary">
                        <i class="fa fa-coins"></i> Bayar
                      </a>
                    </td>
                  </tr>
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
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pembayaran_lunas->result() as $key => $value) {
                  ?>
                  <tr class="text-center">
                    <td><?=$no++?></td>
                    <td><?=$value->id_pembelian?></td>
                    <td><?=$value->nama_pembeli?></td>
                    <td><?="Rp".number_format($value->biaya, 2);?></td>
                    <?php if($value->tanggal_bayar == null){ ?>
                      <td>-</td>
                    <?php } ?>
                    <?php if($value->tanggal_bayar != null){ ?>
                      <?php if($value->tanggal_bayar == null){ ?>
                        <td>-</td>
                      <?php } ?>
                      <?php if($value->tanggal_bayar != null){ ?>
                        <td><?=date('d-m-Y', strtotime($value->tanggal_bayar))?></td>
                      <?php } ?>
                    <?php } ?>
                    <?php if($value->jenis == 0){ ?>
                      <td>DP</td>
                    <?php } ?>
                    <?php if($value->jenis > 0){ ?>
                      <td>Cicilan <?=$value->jenis?></td>
                    <?php } ?>
                    <td><span class="badge badge-success">Lunas</span></td>

                    <td style="min-width:210px">
                      <a href="<?=site_url('pembayaran/detail/'.$value->id)?>" class="btn btn-info">
                        <i class="fa fa-eye"></i> Detail
                      </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="blokir">
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
                  foreach ($pembayaran_blokir->result() as $key => $value) {
                  ?>
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
                    <?php if($value->jenis == 0){ ?>
                      <td>DP</td>
                    <?php } ?>
                    <?php if($value->jenis > 0){ ?>
                      <td>Cicilan <?=$value->jenis?></td>
                    <?php } ?>
                    <td><span class="badge badge-secondary">Diblokir</span></td>
                    <td style="min-width:310px">
                      <a href="<?=site_url('pembayaran/detail/'.$value->id)?>" class="btn btn-info">
                        <i class="fa fa-eye"></i> Detail
                      </a>
                      <?php if($value->blokir == "blokir"){ ?>
                        <!-- <a href="<?=site_url('pembayaran/buka_blokir/'.$value->id)?>" class="btn btn-warning">
                          <i class="fa fa-key"></i> Buka Blokir
                        </a> -->
                      <?php } ?>
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
