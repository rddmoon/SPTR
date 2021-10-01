<section class="section">
    <div class="section-header">
        <h1>Perumahan</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Perumahan</h4>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <a href="<?=site_url('perumahan/add')?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah Unit</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($perumahan->result() as $key => $value){
                            ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?=$value->nama?></td>
                                <td><?=$value->jumlah_unit?></td>
                                <td><?=$value->lokasi?></td>
                                <td>
                                    <form class="" action="<?=site_url('perumahan/delete')?>" method="post">
                                        <a href="<?=site_url('perumahan/list_unit/'.$value->id)?>" class="btn btn-info">
                                            <i class="fa fa-home"></i> Unit
                                        </a>
                                        <a href="<?=site_url('perumahan/edit/'.$value->id)?>" class="btn btn-warning">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <input type="hidden" name="perumahan_id" value="<?=$value->id?>">
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



                        