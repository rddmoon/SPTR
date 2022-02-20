
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
            <li role="presentation" class="nav-item"><a class="nav-link active" href="#lunas" aria-controls="lunas" role="tab" data-toggle="tab">Lunas</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="lunas">
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
