<section class="section">
    <div class="section-header">
        <h1>Unit Perumahan</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Unit Perumahan</h4>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <a href="<?=site_url('unit/add')?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Cluster</th>
                                <th scope="col">Blok</th>
                                <th scope="col">Tipe Rumah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($list_unit->result() as $key => $value){
                            ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?=$value->cluster?></td>
                                <td><?=$value->blok?></td>
                                <td><?=$value->tipe_rumah?></td>
                                <td>
                                    <form class="" action="<?=site_url('unit/delete')?>" method="post">
                                        <a href="<?=site_url('unit/detail/'.$value->id)?>" class="btn btn-info">
                                            <i class="fa fa-eye"></i> Detail
                                        </a>
                                        <a href="<?=site_url('unit/edit/'.$value->id)?>" class="btn btn-warning">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <input type="hidden" name="unit_id" value="<?=$value->id?>">
                                        <button onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger">
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
