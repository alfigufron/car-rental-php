<?php
  require 'config/connection.php';
  session_start();
  
  if(isset($_SESSION['role'])):
    if($_SESSION['role'] == 1):
      header('location:admin/index.php?msg=login');
    endif;
  endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Rental Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">

  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/plugins/jquery-ui/css/jquery-ui.css">
  <link rel="stylesheet" href="assets/plugins/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/plugins/owl-carousel/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/plugins/aos/css/aos.css">
  <link rel="stylesheet" href="assets/plugins/icomoon/style.css">
  <link rel="stylesheet" href="assets/plugins/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/css/client/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle" style="position: absolute;z-index: 2;color: white;right: 0;padding: 20px;"><span class="icon-menu h3"></span></a>
    
    <div class="header-top bg-light">

      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

        <div class="container">
          <div class="d-flex align-items-center">
            <div class="ml-auto">
              <nav class="site-navigation position-relative text-right" role="navigation">
                
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                  <li>
                    <a href="index.php" class="nav-link text-left">Beranda</a>
                  </li>
                  <?php if(isset($_SESSION['status'])): ?>
                    <li>
                      <a href="order.php" class="nav-link text-left">Pesan</a>
                    </li>
                    <li>
                      <a href="history.php" class="nav-link text-left">Histori</a>
                    </li>
                    <li>
                      <a href="account.php" class="nav-link text-left">Akun</a>
                    </li>
                    <li>
                      <a href="config/logout.php" class="nav-link text-left">Keluar</a>
                    </li>
                  <?php else: ?>
                    <li>
                      <a href="login.php" class="nav-link text-left">Masuk</a>
                    </li>
                    <li>
                      <a href="register.php" class="nav-link text-left">Daftar</a>
                    </li>
                  <?php endif; ?>
                </ul>

              </nav>
            </div>
          </div>
        </div>

      </div>
    
    </div>
    
    <div class="hero-slide owl-carousel site-blocks-cover">
      <div class="intro-section" style="background-image: url('assets/img/hero_1.jpg');">
      </div>

      <div class="intro-section" style="background-image: url('assets/img/hero_2.jpg');">
      </div>

    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="assets/img/hero_2.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <span class="text-serif text-primary">Tentang Kami</span>
            <h3 class="heading-92913 text-black">Car Rental Management</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta iusto, enim at, quibusdam numquam doloremque debitis accusamus quam adipisci illum a veniam voluptatibus cum. Soluta obcaecati quia officiis odit voluptatum?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta iusto, enim at, quibusdam numquam doloremque debitis accusamus quam adipisci illum a veniam voluptatibus cum. Soluta obcaecati quia officiis odit voluptatum?</p>
            <!-- <p><a href="#" class="btn btn-primary py-3 px-4">Learn More</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <div class="py-5">
      <div class="container">
        <div class="row">

          <div class="col-md-6 col-lg-4 text-center mt-3">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <i class="fa fa-car fa-3x"></i>
              </span>
              <h3>Mobil Baru dan Terawat</h3>
              <p>Kami memiliki Armada dan varian kendaraan yang banyak sesuai kebutuhan transportasi Anda. Semua armada kami secara rutin diservice sehingga laik jalan dan terawat.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 text-center mt-3">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <i class="fa fa-credit-card fa-3x"></i>
              </span>
              <h3>Harga Terjangkau</h3>
              <p>Kami menyediakan jasa sewa mobil untuk wilayah Jakarta, Bogor, Depok, Tangerang, Bekasi dan Sekitarnya dengan harga terjangkau. Harga kami dijamin lebih terjangkau.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 text-center mt-3">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <i class="fa fa-phone fa-3x"></i>
              </span>
              <h3>Layanan 24 Jam</h3>
              <p>Kami menyediakan jasa sewa mobil untuk wilayah Jakarta, Bogor, Depok, Tangerang, Bekasi dan Sekitarnya selama 24 jam sehari dan 7 hari dalam seminggu.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 text-center mt-3">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <i class="fas fa-check-circle fa-3x"></i>
              </span>
              <h3>Profesional dan Berpengalaman</h3>
              <p>Kami memiliki staf dan manajemen yang berpengalaman dalam menjalankan usaha jasa sewa/rental mobil ini. Dengan pengalaman yang kami miliki, kami menjadi semakin tahu setiap kebutuhan pelanggan kami.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 text-center mt-3">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <i class="fas fa-user-circle fa-3x"></i>
              </span>
              <h3>Pengemudi Berpengalaman</h3>
              <p>Kami memiliki team pengemudi yang berpengalaman dan secara rutin mengikuti safety driving course. Keamanan dan kenyamanan pelanggan menjadi prioritas kami.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 text-center mt-3">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <i class="fas fa-percent fa-3x"></i>
              </span>
              <h3>Promo dan Diskon</h3>
              <p>Dapatkan promo menarik dari kami untuk pelanggan baru dan pelanggan setia kami. Diskon khusus untuk Anda yang sering menggunakan jasa rental mobil ini.</p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <span class="text-serif text-primary">Daftar</span>
            <h3 class="heading-92913 text-black text-center">Armada yang Tersedia</h3>
          </div>
        </div>

        <div class="row">

          <?php
            $queryData = mysqli_query($conn, "SELECT * FROM cars");
            while($item = mysqli_fetch_assoc($queryData)):
              $price = number_format($item['price'], 0, '', '.');
          ?>
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="service-39381">
                <img src="data/images/<?= $item['image'] ?>" alt="Image" class="img-fluid">
                <div class="p-4">
                  <h3><i class="fas fa-car mr-1"></i><?= $item['name'] ?></h3>
                  <div class="d-flex">
                    <div class="mr-auto">
                      Rp <?= $price ?> / hari
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>

        </div>
      </div>
    </div>

    <div class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/plugins/jquery-ui/js/jquery-ui.js"></script>
  <script src="assets/plugins/popper/js/popper.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/plugins/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="assets/plugins/jquery-stellar/js/jquery.stellar.min.js"></script>
  <script src="assets/plugins/jquery-countdown/js/jquery.countdown.min.js"></script>
  <script src="assets/plugins/aos/js/aos.js"></script>
  <script src="assets/plugins/jquery-sticky/js/jquery.sticky.js"></script>
  <script src="assets/js/client/main.js"></script>
</body>
</html>