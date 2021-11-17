<section class="section">
    <div class="section-header">
        <h1>Pembayaran Tambahan</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Masukkan Data Pembayaran Tambahann</h4>
                </div>
                <div class="card-body">
                  
                  <form class="" action="" method="post">
                      <div class="form-group">
                          <label>Pembelian</label>
                          <?php date_default_timezone_set('Asia/Jakarta');
                          $now = date('ymdhis');
                          $tglbeli = date('Y-m-d');
                          ?>
                          <div class="" style="max-width:400px">
                            <input name="id_pembelian" list="pembelian" type="text" class="form-control <?= form_error('id_pembelian') ? 'is-invalid' : '' ?>">
                              <datalist id="pembelian">
                                  <?php foreach ($pembelian->result() as $key => $value) {?>
                                  <option value="<?=$value->id?>"><?=$value->nama_pembeli?></option>
                                  <?php } ?>
                              </datalist>
                            <div class="invalid-feedback">
                                <?= form_error('id_pembelian') ?>
                            </div>
                          </div>
                        </div>
                      <div class="form-group">
                        <label>Perumahan</label>
                          <div class="" style="max-width:400px">
                              <select id="perumahan" name="perumahan" class="form-control <?= form_error('perumahan') ? 'is-invalid' : '' ?>" >
                                  <option value="">- Pilih Perumahan -</option>
                                  <?php
                                  foreach($perumahan as $row)
                                  {
                                   echo '<option value="'.$row->id.'">'.$row->nama.'</option>';
                                  }
                                  ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?= form_error('perumahan') ?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Unit</label>
                          <div class="" style="max-width:400px">
                              <select id="id_unit" name="id_unit" class="form-control <?= form_error('id_unit') ? 'is-invalid' : '' ?>" >
                                  <option value="">- Pilih Unit -</option>
                              </select>
                              <div class="invalid-feedback">
                                  <?= form_error('id_unit') ?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Harga Beli</label>
                        <div class="" style="max-width:400px">
                          <input id="harga_beli" type="text" name="harga_beli" value="<?=set_value('harga_beli')?>" class="form-control <?= form_error('harga_beli') ? 'is-invalid' : '' ?>">
                          <div class="invalid-feedback">
                            <?= form_error('harga_beli')?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Metode</label>
                        <div class="" style="max-width:400px">
                          <select name="id_metode" class="form-control <?= form_error('id_metode') ? 'is-invalid' : '' ?>" >
                            <option value="">- Pilih Metode -</option>
                            <?php
                            foreach($metode->result() as $key)
                            {
                              echo '<option value="'.$key->id.'">'.$key->nama_metode.'</option>';
                            }
                            ?>
                          </select>
                          <div class="invalid-feedback">
                            <?= form_error('id_metode') ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>DP/Pembayaran Awal</label>
                          <div class="" style="max-width:400px">
                              <input type="text" name="DP" value="<?=set_value('DP')?>" class="form-control <?= form_error('DP') ? 'is-invalid' : '' ?>">
                              <div class="invalid-feedback">
                                  <?= form_error('DP')?>
                              </div>
                          </div>
                      </div>
                      <!-- <div class="form-group">
                        <label>Cicilan Perbulan (Metode cash isi dengan jumlah sisa pembayaran)</label>
                          <div class="" style="max-width:400px">
                            <input type="text" name="cicilan_perbulan" value="" class="form-control ">
                              <div class="invalid-feedback">
                              </div>
                          </div>
                      </div> -->
                      <!-- <input type="hidden" name="cicilan_perbulan" value=""> -->
                      <input type="hidden" name="tanggal_beli" value="<?=$tglbeli?>">
                      <input type="hidden" name="status_pembelian" value="berjalan">
                      <div class="form-group">
                          <button onclick="return confirm('Apakah Anda yakin data yang dimasukkan sudah benar?')" type="submit" class="btn btn-success">Simpan</button>
                          <a href="<?=site_url('pembelian')?>" type="button" class="btn btn-danger">Batal</a>
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
       $('#perumahan').change(function(){
        var perumahan_id = $('#perumahan').val();
        if(perumahan_id != '')
        {
         $.ajax({
          url:"<?php echo base_url(); ?>pembelian/get_unit_by_perumahan",
          method:"POST",
          data:{perumahan_id:perumahan_id},
          success:function(data)
          {
           $('#id_unit').html(data);
          }
         });
        }
        else
        {
         $('#id_unit').html('<option value="">- Pilih Unit -</option>');
        }
       });

       $('#id_unit').change(function()
        {
            $.ajax({
             type:"POST",
             data:"value="+$(this).val(),
             url:"<?php echo base_url(); ?>pembelian/get_harga_beli",
             success:function(msg)
             {
                $('#harga_beli').val(msg);
             }

          });



        });

      });
    </script>
</section>
