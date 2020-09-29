<?php
  require 'config/connection.php';
  session_start();
  
  if(empty($_SESSION['status'])):
    header('location:index.php?msg=noaccess');
  endif;

  if(isset($_SESSION['role'])):
    if($_SESSION['role'] == 1):
      header('location:admin/index.php?msg=login');
    endif;
  endif;

  $user = $_SESSION['user'];
  $queryDataUser = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' ");
  $dataUser = mysqli_fetch_assoc($queryDataUser);
  $userId = $dataUser['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Rental Management - Histori</title>
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

    <div class="container-fluid" style="padding: 80px 0;text-align: center;">
      <h3 style="padding-bottom: 40px;">Histori Penyewaan</h3>
      <table class="table">
        <thead style="background-color: #84142d;color: white;">
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Tanggal Pemesanan</th>
            <th>Total Biaya</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 0;
            $queryData = mysqli_query($conn, "SELECT * FROM transactions WHERE user_id='$userId' ");
            while($dataTrans = mysqli_fetch_assoc($queryData)):
              $price = number_format($dataTrans['price'], 0, '', '.');
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $dataTrans['id'] ?></td>
              <td><?= $dataTrans['date'] ?></td>
              <td>Rp <?= $price ?></td>
              <td>
                <a href="detail-history.php?id=<?= $dataTrans['id'] ?>" class="btn btn-primary btn-block">Detail</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
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