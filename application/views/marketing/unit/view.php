<section class="section">
    <div class="section-header">
        <h1>Unit</h1>
    </div>
    <div class="search-element" style="display:flex; margin-bottom:20px;" >
        <form class="form-inline" action="<?php echo site_url() . 'unit'; ?>" method="post">
            <input class="form-control" type="text" placeholder="Cari..." name="search" data-width="250" data-height="36">
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Unit</h4>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <a href="<?=site_url('unit/add')?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="nav-item"><a class="nav-link active" href="#semua" aria-controls="semua" role="tab" data-toggle="tab">Semua</a></li>
                      <li role="presentation" class="nav-item"><a class="nav-link" href="#tersedia" aria-controls="tersedia" role="tab" data-toggle="tab">Tersedia</a></li>
                      <li role="presentation" class="nav-item"><a class="nav-link" href="#terjual" aria-controls="terjual" role="tab" data-toggle="tab">Terjual</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="semua">
                        <table class="table table-hover" id="semua">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Perumahan</th>
                                  <th scope="col">Cluster</th>
                                  <th scope="col">Blok</th>
                                  <th scope="col">Tipe Rumah</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                              foreach ($unit->result() as $key => $value){
                            //   $nama_perumahan = $this->m_unit->get_nama_perumahan($value->id_perumahan)->nama;
                              ?>
                              <tr class="text-center">
                                  <td><?=$no++?></td>
                                  <td><?=$value->nama_perumahan?></td>
                                  <td><?=$value->cluster?></td>
                                  <td><?=$value->blok?></td>
                                  <td><?=$value->tipe_rumah?></td>
                                  <?php  if ($value->status == "tersedia") {?>
                                    <td><span class="badge badge-success">Tersedia</span></td>
                                <?php } ?>
                                <?php  if ($value->status == "terjual") {?>
                                    <td><span class="badge badge-danger">Terjual</span></td>
                                <?php } ?>
                                  <td style="min-width:295px">
                                      <form class="" action="<?=site_url('unit/delete')?>" method="post">
                                          <a href="<?=site_url('unit/detail/'.$value->id)?>" class="btn btn-info">
                                              <i class="fa fa-eye"></i> Detail
                                          </a>
                                          <a href="<?=site_url('unit/edit/'.$value->id)?>" class="btn btn-warning" hidden>
                                              <i class="fa fa-edit"></i> Ubah
                                          </a>
                                          <input type="hidden" name="unit_id" value="<?=$value->id?>">
                                          <button onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger" hidden>
                                              <i class="fa fa-trash-alt"></i> Hapus
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                              <?php } ?>
                          </tbody>
                      </table>

                      </div>
                      <div role="tabpanel" class="tab-pane" id="tersedia">
                        <table class="table table-hover" id="tersedia">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Perumahan</th>
                                  <th scope="col">Cluster</th>
                                  <th scope="col">Blok</th>
                                  <th scope="col">Tipe Rumah</th>
                                  <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                              foreach ($unit_tersedia->result() as $key => $value){
                            //   $nama_perumahan = $this->m_unit->get_nama_perumahan($value->id_perumahan)->nama;
                              ?>
                              <tr class="text-center">
                                  <td><?=$no++?></td>
                                  <td><?=$value->nama_perumahan?></td>
                                  <td><?=$value->cluster?></td>
                                  <td><?=$value->blok?></td>
                                  <td><?=$value->tipe_rumah?></td>
                                  <td style="min-width:295px">
                                    <form class="" action="<?=site_url('unit/delete')?>" method="post">
                                        <a href="<?=site_url('unit/detail/'.$value->id)?>" class="btn btn-info">
                                            <i class="fa fa-eye"></i> Detail
                                        </a>
                                        <a href="<?=site_url('unit/edit/'.$value->id)?>" class="btn btn-warning" hidden>
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <input type="hidden" name="unit_id" value="<?=$value->id?>">
                                        <button onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger" hidden>
                                            <i class="fa fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                  </td>
                              </tr>
                              <?php } ?>
                          </tbody>
                      </table>

                      </div>
                      <div role="tabpanel" class="tab-pane" id="terjual">
                        <table class="table table-hover" id="terjual">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Perumahan</th>
                                  <th scope="col">Cluster</th>
                                  <th scope="col">Blok</th>
                                  <th scope="col">Tipe Rumah</th>
                                  <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                              foreach ($unit_terjual->result() as $key => $value){
                            //   $nama_perumahan = $this->m_unit->get_nama_perumahan($value->id_perumahan)->nama;
                              ?>
                              <tr class="text-center">
                                  <td><?=$no++?></td>
                                  <td><?=$value->nama_perumahan?></td>
                                  <td><?=$value->cluster?></td>
                                  <td><?=$value->blok?></td>
                                  <td><?=$value->tipe_rumah?></td>
                                  <td style="min-width:295px">
                                      <form class="" action="<?=site_url('unit/delete')?>" method="post">
                                          <a href="<?=site_url('unit/detail/'.$value->id)?>" class="btn btn-info">
                                              <i class="fa fa-eye"></i> Detail
                                          </a>
                                          <a href="<?=site_url('unit/edit/'.$value->id)?>" class="btn btn-warning" hidden>
                                              <i class="fa fa-edit"></i> Ubah
                                          </a>
                                          <input type="hidden" name="unit_id" value="<?=$value->id?>">
                                          <button onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger" hidden>
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
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="floating-buttons">
  <button id="back-to-top" type="button" class="back-to-top btn btn-primary" data-toggle="tooltip" data-original-title="Kembali ke atas" data-placement="right" data-trigger="hover" aria-label="Kembali ke atas">
    <i class="fa fa-chevron-up" aria-hidden="true"></i></button>
</div>
