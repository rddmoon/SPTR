<section class="section">
    <div class="section-header">
        <h1>Pembayaran Tambahan</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Masukkan Data Pembayaran Tambahan</h4>
                </div>
                <div class="card-body">

                  <form class="" action="" method="post">
                    <div class="form-group">
                      <label>Pembeli</label>
                      <div class="" style="max-width:400px">
                        <select id="id_pembeli" name="id_pembeli" class="form-control <?= form_error('id_pembeli') ? 'is-invalid' : '' ?>">
                          <option value="">- Pilih Pembeli -</option>
                          <?php foreach ($pembeli as $key => $value) {?>
                            <option value="<?=$value->id?>"><?=$value->nama_pembeli?> - NIK <?=$value->NIK?></option>
                          <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                          <?= form_error('id_pembeli') ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>ID Pembelian</label>
                        <div class="" style="max-width:400px">
                            <select id="id_pembelian" name="id_pembelian" class="form-control <?= form_error('id_pembelian') ? 'is-invalid' : '' ?>" >
                                <option value="">- Pilih ID Pembelian -</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('id_pembelian') ?>
                            </div>
                        </div>
                    </div>
                      <!-- <div class="form-group">
                      <div class="" style="max-width:400px">
                        <input name="id_pembelian" list="pembelian" type="text" class="form-control">
                          <datalist id="pembelian">
                          </datalist>
                      </div>
                    </div> -->
                    <div class="form-group">
                        <label>Biaya</label>
                        <div class="" style="max-width:400px">
                            <input type="text" name="biaya" value="<?=set_value('biaya')?>" class="form-control <?= form_error('biaya') ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= form_error('biaya')?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Jatuh Tempo</label>
                      <div class="" style="max-width: 400px">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fa fa-calendar-alt"></i>
                            </div>
                          </div>
                          <input type="date" name="tanggal_jatuh_tempo" value="<?=set_value('tanggal_jatuh_tempo')?>" class="form-control datepicker <?= form_error('tanggal_jatuh_tempo') ? 'is-invalid' : '' ?>" placeholder="DD-MM-YYY">
                          <div class="invalid-feedback">
                						<?= form_error('tanggal_jatuh_tempo') ?>
                					</div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Bayar</label>
                      <div class="" style="max-width: 400px">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fa fa-calendar-alt"></i>
                            </div>
                          </div>
                          <input type="date" name="tanggal_bayar" value="<?=set_value('tanggal_bayar')?>" class="form-control datepicker <?= form_error('tanggal_bayar') ? 'is-invalid' : '' ?>" placeholder="DD-MM-YYY">
                        </div>
                      </div>
                      <div class="" style="color:#e83e8c">
                        <small class="" style="color:#e83e8c">
                          Kosongi jika pembeli belum melakukan pembayaran.
                        </small>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pembayaran</label>
                        <div class="" style="max-width:400px">
                            <input type="text" name="jenis_pembayaran" value="<?=set_value('jenis_pembayaran')?>" class="form-control <?= form_error('jenis_pembayaran') ? 'is-invalid' : '' ?>" placeholder="Kelebihan tanah, tambahan bangunan, dll">
                            <div class="invalid-feedback">
                                <?= form_error('jenis_pembayaran')?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <div class="" style="max-width:400px">
                            <input type="text" name="keterangan" value="<?=set_value('keterangan')?>" class="form-control <?= form_error('keterangan') ? 'is-invalid' : '' ?>" placeholder="Pembayaran...">
                            <div class="invalid-feedback">
                                <?= form_error('keterangan')?>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="nama_pembeli" value="<?=$value->nama_pembeli?>" hidden>
                    <div class="form-group">
                        <button onclick="return confirm('Apakah Anda yakin data yang dimasukkan sudah benar?')" type="submit" class="btn btn-success">Simpan</button>
                        <a href="<?=site_url('pembayaran_tambahan')?>" type="button" class="btn btn-danger">Batal</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
      $(document).ready(function(){
       $('#id_pembeli').change(function(){
        var pembeli_id = $('#id_pembeli').val();
        if(pembeli_id != '')
        {
         $.ajax({
          url:"<?php echo base_url(); ?>pembayaran_tambahan/get_pembelian_by_pembeli",
          method:"POST",
          data:{pembeli_id:pembeli_id},
          success:function(data)
          {
           $('#id_pembelian').html(data);
          }
         });
        }
        else
        {
         $('#id_pembelian').html('<option value="">- Pilih ID Pembelian -</option>');
        }
       });
      });
    </script>
</section>
