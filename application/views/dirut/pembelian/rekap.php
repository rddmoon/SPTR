<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ITG</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/summernote/dist/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/assets/css/components.css">
  <!-- CSS -->
  <style>
    .back-to-top {
     position: fixed;
     bottom: 30px;
     right: 30px;
     width: 64px;
     height: 64px;
     border-radius: 50%;
     text-decoration: none;
     z-index: 9999;
     cursor: pointer;
     transition: opacity 0.1s ease-out;
    }
    .back-to-top:hover{
     opacity: 0.7;
    }
    .glow{
      font-size: 15px;
      color: #fff;
      font-weight: bold;
      animation: glow 1s ease-in-out infinite alternate;
      -moz-animation: glow 1s ease-in-out infinite alternate;
      -webkit-animation: glow 1s ease-in-out infinite alternate;
    }

  </style>

  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      var showAfter = 150;
      if ($(this).scrollTop() > showAfter ) {
        $('.back-to-top').show();
       $('.back-to-top').fadeIn();
      }
      else {
       $('.back-to-top').hide();
      }

     $(window).scroll(function(){
      if ($(this).scrollTop() > showAfter ) {
       $('.back-to-top').fadeIn();
      }
      else {
       $('.back-to-top').fadeOut();
      }
     });

     $('.back-to-top').click(function(){
      $('html, body').animate({scrollTop : 0},1000);
      return false;
     });

    });
  </script>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <div id="clock" class="glow">
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url()?>assets/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?=ucwords($this->fungsi->user_login()->nama)?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?=site_url('user/profil/'.$this->session->userdata('user_id'))?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a>
              <!-- <a href="<?=site_url('user/edit_profil/'.$this->session->userdata('user_id'))?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a onclick="return confirm('Apakah anda yakin ingin Logout?')" href="<?=site_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <!-- <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a> -->
              <a href="javascript:history.back()" class="nav-link"><i class="fas fa-arrow-left"></i><span style="font-size:16px;font-weight:bold">Kembali</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="section-header">
              <h1>Rekap Pembelian </h1>

            </div>
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <h6><b>ID Pembelian&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->id?></b></h6>
                        <?php
                        if ($pembelian->status_pembelian == "berjalan") {?>
                          <h6><b>Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-primary" style="font-size:14px;"><?=$pembelian->status_pembelian?></span></b></h6>
                        <?php } ?>
                        <?php
                        if ($pembelian->status_pembelian == "dibatalkan") {?>
                          <h6><b>Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-danger" style="font-size:14px;"><?=$pembelian->status_pembelian?></span></b></h6>
                        <?php } ?>
                        <?php
                        if ($pembelian->status_pembelian == "selesai") {?>
                          <h6><b>Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success" style="font-size:14px;"><?=$pembelian->status_pembelian?></span></b></h6>
                        <?php } ?>
                    </div>
                  </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="card card-statistic-1">
                                <div class="card-wrap">
                                  <div class="card-header">
                                    <h6><b><i class="fas fa-address-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;Pembeli</b></h6>
                                  </div>
                                  <div class="card-body" style="font-size: 14px">
                                    NIK:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->NIK?><br>
                                    Nama:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->nama_pembeli?><br>
                                    Alamat:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->alamat?><br>
                                    No. Telepon:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->telepon?><br><br>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="card card-statistic-1">
                                <div class="card-wrap">
                                  <div class="card-header">
                                    <h6><b><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Unit</b></h6>
                                  </div>
                                  <div class="card-body" style="font-size: 14px">
                                    Perumahan:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$perumahan_selected->nama?><br>
                                    Cluster:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->cluster?><br>
                                    Blok:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->blok?><br>
                                    Tipe Rumah:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->tipe_rumah?><br><br>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="card card-statistic-1">
                                <div class="card-wrap">
                                  <div class="card-header">
                                    <h6><b><i class="fas fa-coins"></i>&nbsp;&nbsp;&nbsp;&nbsp;Pembayaran</b></h6>
                                  </div>
                                  <div class="card-body" style="font-size: 14px">
                                    <b>Metode:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$metode_selected->nama_metode?><br>
                                    <b>Cicilan ke:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$cicilan_ke?><b> / </b> <?=$metode_selected->banyaknya_cicilan?><br>
                                    <b>Cicilan Perbulan:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->cicilan_perbulan, 2);?><br>
                                    <b>Tunggakan:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->tunggakan?><br><br>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="card card-statistic-1">
                                <div class="card-wrap">
                                  <div class="card-header">
                                    <h6><b><i class="fas fa-hand-holding-usd"></i>&nbsp;&nbsp;&nbsp;&nbsp;Pembelian</b></h6>
                                  </div>
                                  <div class="card-body" style="font-size: 14px">
                                    <b>Tanggal Pembelian:</b>&nbsp;
                                      <?php setlocale(LC_TIME, 'IND');
                                            $thedate = explode("-", $pembelian->tanggal_beli);
                                            $s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
                                            echo " ".$s."";?><br />
                                    <b>Harga Beli:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->harga_beli, 2);?><br>
                                    <b>Total Uang Masuk:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->uang_masuk, 2);?><br>
                                    <b>Total Uang Lainnya:</b>&nbsp;&nbsp;<?="Rp".number_format($pembelian->uang_lainnya, 2);?><br><br>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    <!-- Pembayaran -->
                    <h2 class="section-title">Pembayaran</h2>
                    <p class="section-lead">
                    Pembayaran-pembayaran menyangkut DP dan cicilan pada pembelian ini.
                    </p>
                    <div class="row">
                      <?php foreach($pembayaran->result() as $key) {?>
                        <?php if($key->jenis == 0){
                                  $header = "DP" ;
                                }
                                else {
                                  setlocale(LC_TIME, 'IND');
            											$thedate = explode("-", $key->tanggal_jatuh_tempo);
            											$s = strftime('%B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
            											$header = "Cicilan " . $key->jenis . " (".$s.")";
                                }?>
                        <?php if($key->blokir == "lunas"){?>
                          <div class="col-12 col-md-6">
                            <div class="card card-success">
                              <div class="card-header">
                                <h4 style="color:#63ed7a"><?=$header?></h4>
                                <div class="card-header-action" style="font-weight:bold;color:#63ed7a">
                                  LUNAS&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a data-collapse="#mycard-collapse-<?=$key->jenis?>" class="btn btn-icon btn-light" href="#"><i class="fas fa-plus"></i></a>
                                </div>
                              </div>
                              <div class="collapse" id="mycard-collapse-<?=$key->jenis?>" style="">
                                <div class="card-body">
                                  <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                                  <?php if($key->jenis == 0) {?>
                                    <p>Dibayar:
                                      <?php setlocale(LC_TIME, 'IND');
                                            $thedate = explode("-", $key->tanggal_bayar);
                                            $s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
                                            echo $s;
                                    ?></p>
                                  <?php }else { ?>
                                    <p>Jatuh Tempo:
                                      <?php setlocale(LC_TIME, 'IND');
                                            $thedate = explode("-", $key->tanggal_jatuh_tempo);
                                            $s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
                                            echo $s;
                                    ?></p>
                                    <p>Dibayar:
                                      <?php setlocale(LC_TIME, 'IND');
                                            $thedate = explode("-", $key->tanggal_bayar);
                                            $s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
                                            echo $s;
                                    ?></p>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>

                        <?php if($key->blokir == "buka"){?>
                          <div class="col-12 col-md-6">
                            <div class="card card-primary">
                              <div class="card-header">
                                <h4><?=$header?></h4>
                                <div class="card-header-action" style="font-weight:bold;color:#6777ef">
                                  MENUNGGU&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a data-collapse="#mycard-collapse-<?=$key->jenis?>" class="btn btn-icon btn-light" href="#"><i class="fas fa-plus"></i></a>
                                </div>
                              </div>
                              <div class="collapse" id="mycard-collapse-<?=$key->jenis?>" style="">
                                <div class="card-body">
                                  <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                                  <p>Jatuh Tempo:
                                    <?php setlocale(LC_TIME, 'IND');
                                          $thedate = explode("-", $key->tanggal_jatuh_tempo);
                                          $s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
                                          echo $s;
                                          ?>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>

                        <?php if($key->blokir == "blokir"){?>
                          <div class="col-12 col-md-6">
                            <div class="card card-primary">
                              <div class="card-header">
                                <h4><?=$header?></h4>
                                <div class="card-header-action" style="font-weight:bold;color:#fc544b">
                                  MELEBIHI JATUH TEMPO&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a data-collapse="#mycard-collapse-<?=$key->jenis?>" class="btn btn-icon btn-light" href="#"><i class="fas fa-plus"></i></a>
                                </div>
                              </div>
                              <div class="collapse" id="mycard-collapse-<?=$key->jenis?>" style="">
                                <div class="card-body">
                                  <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                                  <p>Jatuh Tempo:
                                    <?php setlocale(LC_TIME, 'IND');
                                          $thedate = explode("-", $key->tanggal_jatuh_tempo);
                                          $s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
                                          echo $s;
                                          ?>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    </div>

                    <!-- Pembayaran Tambahan -->
                    <h2 class="section-title">Pembayaran Tambahan/Lain-lain</h2>
                    <p class="section-lead">
                    Pembayaran-pembayaran menyangkut kelebihan tanah, tambahan bangunan, dan pembayaran tambahan lainnya pada pembelian ini.
                    </p>
                  </br>
                    <div class="row">
                      <?php $no = 1;
                      foreach($pembayaran_tambahan->result() as $key) {?>
                        <?php if($key->tanggal_bayar != NULL){?>
                          <div class="col-12 col-md-6">
                            <div class="card card-success">
                              <div class="card-header">
                                <h4 style="color:#63ed7a">Pembayaran <?=$no++?></h4>
                                <div class="card-header-action" style="font-weight:bold;color:#63ed7a">
                                  LUNAS&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a data-collapse="#mycard-collapse-t-<?=$no?>" class="btn btn-icon btn-light" href="#"><i class="fas fa-plus"></i></a>
                                </div>
                              </div>
                              <div class="collapse" id="mycard-collapse-t-<?=$no?>" style="">
                                <div class="card-body">
                                  <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                                  <p>Jenis: <?=$key->jenis_pembayaran?></p>
                                  <p>Dibayar:
                                    <?php setlocale(LC_TIME, 'IND');
                                          $thedate = explode("-", $key->tanggal_bayar);
                                          $s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
                                          echo $s;
                                  ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>

                        <?php if($key->tanggal_bayar == NULL){?>
                          <div class="col-12 col-md-6">
                            <div class="card card-primary">
                              <div class="card-header">
                                <h4>Pembayaran <?=$no++?></h4>
                                <div class="card-header-action" style="font-weight:bold;color:#6777ef">
                                  MENUNGGU&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a data-collapse="#mycard-collapse-t-<?=$no?>" class="btn btn-icon btn-light" href="#"><i class="fas fa-plus"></i></a>
                                </div>
                              </div>
                              <div class="collapse" id="mycard-collapse-t-<?=$no?>" style="">
                                <div class="card-body">
                                  <p>Nominal: <?="Rp".number_format($key->biaya, 2);?></p>
                                  <p>Jenis: <?=$key->jenis_pembayaran?></p>
                                  <p>Jatuh Tempo:
                                    <?php setlocale(LC_TIME, 'IND');
                                          $thedate = explode("-", $key->tanggal_jatuh_tempo);
                                          $s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
                                          echo $s;
                                  ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <div class="floating-buttons">
          <button id="back-to-top" type="button" class="back-to-top btn btn-primary" data-toggle="tooltip" data-original-title="Kembali ke atas" data-placement="right" data-trigger="hover" aria-label="Kembali ke atas">
            <i class="fa fa-chevron-up" aria-hidden="true"></i></button>
        </div>

      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?=date('Y')?> ITG
        </div>
      </footer>
    </div>
  </div>
  <!-- clock -->
  <script>
  setInterval(displayTime, 1000);

  function displayTime() {

    const timeNow = new Date();

    let hoursOfDay = timeNow.getHours();
    let minutes = timeNow.getMinutes();
    let seconds = timeNow.getSeconds();
    let weekDay = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"]
    let today = weekDay[timeNow.getDay()];
    let months = timeNow.toLocaleString("id-ID", {
        month: "long"
    });
    let days = timeNow.toLocaleString("id-ID", {
        day: "numeric"
    });
    let year = timeNow.getFullYear();

    hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    let time = hoursOfDay + ":" + minutes + ":" + seconds;

    document.getElementById('clock').innerHTML = today + ", " + days + " " + months + " " + year + "<br>" + time;

    }
  displayTime();
  </script>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?=base_url()?>assets/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?=base_url()?>assets/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?=base_url()?>assets/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="<?=base_url()?>assets/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="<?=base_url()?>assets/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>assets/assets/js/custom.js"></script>

</body>
</html>
