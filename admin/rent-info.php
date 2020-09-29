<?php
  require '../config/connection.php';
  session_start();

  if(empty($_SESSION['status'])):
    header('location:../login.php?msg=noaccess');
  endif;
  
  if(isset($_SESSION['role'])):
    if($_SESSION['role'] != 1):
      header('location:../index.php?msg=login');
    endif;
  endif;

  $transId = $_GET['id'];
  $queryDataTrans = mysqli_query($conn, "SELECT * FROM transactions WHERE id='$transId' ");
  $dataTrans = mysqli_fetch_assoc($queryDataTrans);
  $userId = $dataTrans['user_id'];
  $carId = $dataTrans['car_id'];
  $priceTotal = number_format($dataTrans['price'], 0, '', '.');

  if($dataTrans['status'] == 'WA'):
    $status = 'Peminjaman sedang diproses';
  elseif($dataTrans['status'] == 'B'):
    $status = 'Mobil sedang dipinjam';
  else:
    $status = 'Mobil sudah dikembalikan';
  endif;
  
  $queryDataUser = mysqli_query($conn, "SELECT * FROM users WHERE id='$userId' ");
  $dataUser = mysqli_fetch_assoc($queryDataUser);
  
  $queryDataCar = mysqli_query($conn, "SELECT * FROM cars WHERE id='$carId' ");
  $dataCar = mysqli_fetch_assoc($queryDataCar);
  $priceCar = number_format($dataCar['price'], 0, '', '.');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CRM - Detail Info Penyewaan</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/admin/sb-admin-2.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body id="page-top">
  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Car Rent Management</div>
      </a>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">Penyewaan</div>

      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-list"></i>
          <span>Data</span></a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">Mobil</div>

      <li class="nav-item">
        <a class="nav-link" href="add-car.php">
          <i class="fas fa-plus"></i>
          <span>Tambah Data</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="car-data.php">
          <i class="fas fa-list"></i>
          <span>Data</span></a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">Pengguna</div>

      <li class="nav-item">
        <a class="nav-link" href="user-data.php">
          <i class="fas fa-list"></i>
          <span>Data</span></a>
      </li>

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="../assets/img/profile.png">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../config/admin/logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center mb-4">
            <a href="index.php" class="mr-3 a-btn-color-primary">
              <i class="fas fa-angle-left fa-2x"></i>
            </a>
            <h1 class="h3 mb-0 text-gray-800">Detail Info Penyewaan</h1>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card shadow mb-4">
                <div class="card-header">
                  #<?= $transId ?>
                </div>
                <div class="card-body">
                  <table id="rent-info-table">
                    <tr>
                      <td style="width: 16%;">Nama</td>
                      <td style="width: 10%;">:</td>
                      <td style="width: 84%;"><?= $dataUser['name'] ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?= $dataUser['email'] ?></td>
                    </tr>
                    <tr>
                      <td>Nomor Telepon</td>
                      <td>:</td>
                      <td><?= $dataUser['phone'] ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?= $dataUser['address'] ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Sewa</td>
                      <td>:</td>
                      <td><?= $dataTrans['start_date'] ?> - <?= $dataTrans['end_date'] ?></td>
                    </tr>
                    <tr>
                      <td>Jenis Mobil</td>
                      <td>:</td>
                      <td><?= $dataCar['name'] ?></td>
                    </tr>
                    <tr>
                      <td>Nomor Polisi</td>
                      <td>:</td>
                      <td><?= $dataCar['number'] ?></td>
                    </tr>
                    <tr>
                      <td>Total Harga</td>
                      <td>:</td>
                      <td>Rp <?= $priceTotal ?></td>
                    </tr>
                    <tr>
                      <td>Catatan</td>
                      <td>:</td>
                      <td><?= $dataTrans['note'] ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td>:</td>
                      <td><?= $status ?></td>
                    </tr>
                  </table>

                  <div class="row">
                    <?php if($dataTrans['status'] == 'WA'): ?>
                      <div class="col-md-12 pt-3">
                        <a href="../config/admin/confirm-order.php?status=WA&id=<?= $transId ?>" class="btn btn-color-primary btn-block">Konfirmasi Peminjaman</a>
                      </div>
                    <?php elseif($dataTrans['status'] == 'B'): ?>
                      <div class="col-md-12 pt-3">
                        <a href="../config/admin/confirm-order.php?status=B&id=<?= $transId ?>" class="btn btn-color-primary btn-block">Konfirmasi Pengembalian</a>
                      </div>
                    <?php else: ?>
                      <div class="col-md-12 pt-3 text-center">
                        <h4 class="text-muted">Peminjaman Sudah Selesai</h4>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Car Rent Management 2020</span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/plugins/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/admin/sb-admin-2.min.js"></script>
</body>
</html>
