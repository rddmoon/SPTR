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

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

        </ul>
        <form class="form-inline mr-auto">
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url()?>assets/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?=$this->fungsi->user_login()->nama?></div></a>
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
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <!-- supaa -->
            <a href="<?=site_url('beranda')?>">ITG</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?=site_url('beranda')?>">ITG</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Menu <?=$this->session->userdata('role')?></li>
              <li>
                <a href="<?=site_url('beranda')?>" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Beranda</span></a>
              </li>
              <?php if($this->session->userdata('role') == 'supaa') {?>
              <li>
                <a href="<?=site_url('user')?>" class="nav-link"><i class="fas fa-user-alt"></i> <span>Pengguna</span></a>
              </li>
              <li>
                <a href="<?=site_url('pembeli')?>" class="nav-link"><i class="fas fa-address-book"></i> <span>Pembeli</span></a>
              </li>
              <li>
                <a href="<?=site_url('perumahan')?>" class="nav-link"><i class="fas fa-city"></i> <span>Perumahan</span></a>
              </li>
              <li>
                <a href="<?=site_url('unit')?>" class="nav-link"><i class="fas fa-home"></i> <span>Unit Rumah</span></a>
              </li>
              <li>
                <a href="<?=site_url('pembelian')?>" class="nav-link"><i class="fas fa-hand-holding-usd"></i> <span>Pembelian</span></a>
              </li>
              <li>
                <a href="<?=site_url('pembayaran')?>" class="nav-link"><i class="fas fa-coins"></i> <span>Pembayaran</span></a>
              </li>
              <li>
                <a href="<?=site_url('pembayaran_tambahan')?>" class="nav-link"><i class="fas fa-cart-plus"></i> <span>Pembayaran Tambahan</span></a>
              </li>
              <li>
                <a href="<?=site_url('metode')?>" class="nav-link"><i class="fas fa-credit-card"></i> <span>Metode Pembayaran</span></a>
              </li>
            <?php } ?>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <?php echo $contents ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021
        </div>
      </footer>
    </div>
  </div>

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
