<section class="section">
    <div class="section-header">
        <h1>Pembelian</h1>
    </div>
    <div class="search-element" style="display:flex; margin-bottom:20px;" >
        <form class="form-inline" action="<?php echo site_url() . 'pembelian'; ?>" method="post">
            <input class="form-control" type="text" placeholder="Cari..." name="search" data-width="250" data-height="36">
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pembelian</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <a href="<?=site_url('pembelian/add')?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Buat Pembelian Baru</a>
                    </div>
                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="nav-item"><a class="nav-link active" href="#semua" aria-controls="semua" role="tab" data-toggle="tab">Semua</a></li>
                      <li role="presentation" class="nav-item"><a class="nav-link" href="#berjalan" aria-controls="berjalan" role="tab" data-toggle="tab">Berjalan</a></li>
                      <li role="presentation" class="nav-item"><a class="nav-link" href="#selesai" aria-controls="selesai" role="tab" data-toggle="tab">Selesai</a></li>
                      <li role="presentation" class="nav-item"><a class="nav-link" href="#dibatalkan" aria-controls="dibatalkan" role="tab" data-toggle="tab">Dibatalkan</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="semua">
                        <table class="table table-hover">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">No</th>
                                  <th scope="col">No Pembelian</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Metode</th>
                                  <th scope="col">Cicilan Ke</th>
                                  <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                              foreach ($pembelian->result() as $key => $value){
                              $nama_pembeli = $this->m_pembelian->get_nama_pembeli($value->id_pembeli)->nama_pembeli;
                              $nama_metode = $this->m_pembelian->get_nama_metode($value->id_metode)->nama_metode;
                              $cicilan_ke = $this->m_pembelian->get_cicilan_ke($value->id);
                              ?>
                              <tr class="text-center">
                                  <td><?=$no++?></td>
                                  <td><?=$value->id?></td>
                                  <td><?=$nama_pembeli?></td>
                                  <?php
                                  if ($value->status_pembelian == "berjalan") {?>
                                    <td><span class="badge badge-primary"><?=$value->status_pembelian?></span></td>
                                  <?php } ?>
                                  <?php
                                  if ($value->status_pembelian == "dibatalkan") {?>
                                    <td><span class="badge badge-danger"><?=$value->status_pembelian?></span></td>
                                  <?php } ?>
                                  <?php
                                  if ($value->status_pembelian == "selesai") {?>
                                    <td><span class="badge badge-success"><?=$value->status_pembelian?></span></td>
                                  <?php } ?>
                                  <td><?=$nama_metode?></td>
                                  <td><?=$cicilan_ke?></td>
                                  <td style="min-width:215px">
                                      <form class="" action="<?=site_url('pembelian/delete')?>" method="post">
                                          <a href="<?=site_url('pembelian/detail/'.$value->id)?>" class="btn btn-info">
                                              <i class="fa fa-eye"></i> Detail
                                          </a>
                                          <a href="<?=site_url('pembelian/edit/'.$value->id)?>" class="btn btn-warning" hidden>
                                              <i class="fa fa-edit"></i> Ubah
                                          </a>
                                          <input type="hidden" name="pembelian_id" value="<?=$value->id?>">
                                          <?php if($value->status_pembelian == "dibatalkan"){ ?>
                                          <!-- <button onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger">
                                              <i class="fa fa-trash-alt"></i> Hapus
                                          </button> -->
                                        <?php } ?>
                                      </form>
                                  </td>
                              </tr>
                              <?php } ?>
                          </tbody>
                        </table>

                      </div>
                      <div role="tabpanel" class="tab-pane" id="berjalan">
                        <table class="table table-hover">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">No</th>
                                  <th scope="col">No Pembelian</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Metode</th>
                                  <th scope="col">Cicilan Ke</th>
                                  <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                              foreach ($pembelian_berjalan->result() as $key => $value){
                              $nama_pembeli = $this->m_pembelian->get_nama_pembeli($value->id_pembeli)->nama_pembeli;
                              $nama_metode = $this->m_pembelian->get_nama_metode($value->id_metode)->nama_metode;
                              $cicilan_ke = $this->m_pembelian->get_cicilan_ke($value->id);
                              ?>
                              <tr class="text-center">
                                  <td><?=$no++?></td>
                                  <td><?=$value->id?></td>
                                  <td><?=$nama_pembeli?></td>
                                  <td><span class="badge badge-primary"><?=$value->status_pembelian?></span></td>
                                  <td><?=$nama_metode?></td>
                                  <td><?=$cicilan_ke?></td>
                                  <td style="min-width:215px">
                                      <form class="" action="<?=site_url('pembelian/delete')?>" method="post">
                                          <a href="<?=site_url('pembelian/detail/'.$value->id)?>" class="btn btn-info">
                                              <i class="fa fa-eye"></i> Detail
                                          </a>
                                          <a href="<?=site_url('pembelian/edit/'.$value->id)?>" class="btn btn-warning" hidden>
                                              <i class="fa fa-edit"></i> Ubah
                                          </a>
                                          <input type="hidden" name="pembelian_id" value="<?=$value->id?>">
                                          <?php if($value->status_pembelian == "dibatalkan"){ ?>
                                          <!-- <button onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger">
                                              <i class="fa fa-trash-alt"></i> Hapus
                                          </button> -->
                                        <?php } ?>
                                      </form>
                                  </td>
                              </tr>
                              <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="selesai">
                        <table class="table table-hover">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">No</th>
                                  <th scope="col">No Pembelian</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Metode</th>
                                  <th scope="col">Cicilan Ke</th>
                                  <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                              foreach ($pembelian_selesai->result() as $key => $value){
                              $nama_pembeli = $this->m_pembelian->get_nama_pembeli($value->id_pembeli)->nama_pembeli;
                              $nama_metode = $this->m_pembelian->get_nama_metode($value->id_metode)->nama_metode;
                              $cicilan_ke = $this->m_pembelian->get_cicilan_ke($value->id);
                              ?>
                              <tr class="text-center">
                                  <td><?=$no++?></td>
                                  <td><?=$value->id?></td>
                                  <td><?=$nama_pembeli?></td>
                                  <td><span class="badge badge-success"><?=$value->status_pembelian?></span></td>
                                  <td><?=$nama_metode?></td>
                                  <td><?=$cicilan_ke?></td>
                                  <td style="min-width:215px">
                                      <form class="" action="<?=site_url('pembelian/delete')?>" method="post">
                                          <a href="<?=site_url('pembelian/detail/'.$value->id)?>" class="btn btn-info">
                                              <i class="fa fa-eye"></i> Detail
                                          </a>
                                          <a href="<?=site_url('pembelian/edit/'.$value->id)?>" class="btn btn-warning" hidden>
                                              <i class="fa fa-edit"></i> Ubah
                                          </a>
                                          <input type="hidden" name="pembelian_id" value="<?=$value->id?>">
                                          <?php if($value->status_pembelian == "dibatalkan"){ ?>
                                          <!-- <button onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger">
                                              <i class="fa fa-trash-alt"></i> Hapus
                                          </button> -->
                                        <?php } ?>
                                      </form>
                                  </td>
                              </tr>
                              <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="dibatalkan">
                        <table class="table table-hover">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">No</th>
                                  <th scope="col">No Pembelian</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Metode</th>
                                  <th scope="col">Cicilan Ke</th>
                                  <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                              foreach ($pembelian_dibatalkan->result() as $key => $value){
                              $nama_pembeli = $this->m_pembelian->get_nama_pembeli($value->id_pembeli)->nama_pembeli;
                              $nama_metode = $this->m_pembelian->get_nama_metode($value->id_metode)->nama_metode;
                              $cicilan_ke = $this->m_pembelian->get_cicilan_ke($value->id);
                              ?>
                              <tr class="text-center">
                                  <td><?=$no++?></td>
                                  <td><?=$value->id?></td>
                                  <td><?=$nama_pembeli?></td>
                                  <td><span class="badge badge-danger"><?=$value->status_pembelian?></span></td>
                                  <td><?=$nama_metode?></td>
                                  <td><?=$cicilan_ke?></td>
                                  <td style="min-width:215px">
                                      <form class="" action="<?=site_url('pembelian/delete')?>" method="post">
                                          <a href="<?=site_url('pembelian/detail/'.$value->id)?>" class="btn btn-info">
                                              <i class="fa fa-eye"></i> Detail
                                          </a>
                                          <a href="<?=site_url('pembelian/edit/'.$value->id)?>" class="btn btn-warning" hidden>
                                              <i class="fa fa-edit"></i> Ubah
                                          </a>
                                          <input type="hidden" name="pembelian_id" value="<?=$value->id?>">
                                          <?php if($value->status_pembelian == "dibatalkan"){ ?>
                                          <!-- <button onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger">
                                              <i class="fa fa-trash-alt"></i> Hapus
                                          </button> -->
                                        <?php } ?>
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
    </div>
</section>
<div class="floating-buttons">
  <button id="back-to-top" type="button" class="back-to-top btn btn-primary" data-toggle="tooltip" data-original-title="Kembali ke atas" data-placement="right" data-trigger="hover" aria-label="Kembali ke atas">
    <i class="fa fa-chevron-up" aria-hidden="true"></i></button>
</div>
