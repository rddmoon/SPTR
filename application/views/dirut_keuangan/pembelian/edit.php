<section class="section">
    <div class="section-header">
        <h1>Pembelian</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data Pembelian</h4>
                </div>
                <div class="card-body">
                  <?php //echo print_r($unit_selected); ?>
                  <form class="" action="" method="post">
                      <div class="form-group">
                          <label>Pembeli</label>
                          <input type="hidden" name="pembelian_id" value="<?=$pembelian->id?>">
                          <div class="" style="max-width:400px">
                              <select name="id_pembeli" class="form-control <?= form_error('id_pembeli') ? 'is-invalid' : '' ?>">
                                <?php $spembeli = $this->input->post('id_pembeli') ? $this->input->post('id_pembeli') : $pembelian->id_pembeli; ?>
                                  <option value="">- Pilih Pembeli -</option>
                                  <?php foreach ($pembeli as $key => $value) {?>
                                    <option value="<?=$value->id?>" <?=$spembeli == $value->id ? 'selected' : null?>><?=$value->nama_pembeli?> - <?=$value->NIK?></option>;
                                <?php } ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?= form_error('id_pembeli') ?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Perumahan</label>
                          <div class="" style="max-width:400px">
                              <select id="perumahan" name="perumahan" class="form-control <?= form_error('perumahan') ? 'is-invalid' : '' ?>" >
                                <?php $sperumahan = $this->input->post('perumahan') ? $this->input->post('perumahan') : $perumahan_selected; ?>
                                  <option value="">- Pilih Perumahan -</option>
                                  <?php foreach ($perumahan as $key => $value) {?>
                                    <option value="<?=$value->id?>" <?=$sperumahan == $value->id ? 'selected' : null?>><?=$value->nama?></option>;
                                <?php } ?>
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
                                <?php $this->input->post('id_unit') ? $this->input->post('id_unit') : $unit_selected->id; ?>
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
                          <input id="harga_beli" type="text" name="harga_beli" value="<?=$this->input->post('harga_beli') ?? $pembelian->harga_beli?>" class="form-control <?= form_error('harga_beli') ? 'is-invalid' : '' ?>">
                          <div class="invalid-feedback">
                            <?= form_error('harga_beli')?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Metode</label>
                        <div class="" style="max-width:400px">
                          <select name="id_metode" class="form-control <?= form_error('id_metode') ? 'is-invalid' : '' ?>" >
                            <?php $smetode = $this->input->post('id_metode') ? $this->input->post('id_metode') : $pembelian->id_metode; ?>
                            <option value="">- Pilih Metode -</option>
                            <?php
                            foreach($metode as $key) { ?>
                              <option value="<?=$key->id?>" <?=$smetode == $key->id ? 'selected' : null?>><?=$key->nama_metode?></option>;
                            <?php } ?>
                          </select>
                          <div class="invalid-feedback">
                            <?= form_error('id_metode') ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>DP/Pembayaran Awal</label>
                          <div class="" style="max-width:400px">
                              <input type="text" name="DP" value="<?=$this->input->post('DP') ?? $pembelian->DP?>" class="form-control <?= form_error('DP') ? 'is-invalid' : '' ?>">
                              <div class="invalid-feedback">
                                  <?= form_error('DP')?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Cicilan Perbulan (Metode cash isi dengan jumlah sisa pembayaran)</label>
                          <div class="" style="max-width:400px">
                            <input type="text" name="cicilan_perbulan" value="<?=$this->input->post('cicilan_perbulan') ?? $pembelian->cicilan_perbulan?>" class="form-control <?= form_error('cicilan_perbulan') ? 'is-invalid' : '' ?>">
                              <div class="invalid-feedback">
                                <?= form_error('cicilan_perbulan')?>
                              </div>
                          </div>
                      </div>
                      <input type="hidden" name="status_pembelian" value="berjalan">
                      <div class="form-group">
                        <label>Status Pembelian</label>
                        <select name="status_pembelian" class="form-control <?= form_error('status_pembelian') ? 'is-invalid' : '' ?>">
                          <?php $status = $this->input->post('status_pembelian') ? $this->input->post('status_pembelian') : $pembelian->status_pembelian ?>
                          <option value="">- Pilih Status -</option>
                          <option value="berjalan" <?=$status == 'berjalan' ? 'selected' : null?>>berjalan</option>
                          <option value="dibatalkan" <?=$status == 'dibatalkan' ? 'selected' : null?>>dibatalkan</option>
                          <option value="dibatalkan" <?=$status == 'selesai' ? 'selected' : null?>>selesai</option>
                        </select>
                        <div class="invalid-feedback">
              						<?= form_error('status_perkawinan') ?>
              					</div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-success">Simpan</button>
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
         var perumahan_selected = <?php echo $perumahan_selected; ?>;
         var unit_selected = <?php echo $unit_selected->id; ?>;
         var unit_blok = <?php echo $unit_selected->blok; ?>;
         var unit_cluster = <?php echo $unit_selected->cluster; ?>;

          $.ajax({
           url:"<?php echo base_url(); ?>pembelian/get_unit_by_perumahan_edit",
           method:"POST",
           data:{perumahan_id:perumahan_id},
           success:function(data)
           {
            $('#id_unit').html(data);
           }
          });
         }
        });

       $('#id_unit').change(function()
        {
          var unit_id = $('#id_unit').val();
          var unit2 = <?=$unit_selected->id?>;
          var harga = <?=$unit_selected->harga_jual?>;
          if(unit_id != unit2)
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
        }
        // else if(unit_id == '')
        // {
        //   $('#harga_beli').val(0);
        // }
        else {
          $('#harga_beli').val(harga);
        }
        });

      });
    </script>
</section>
