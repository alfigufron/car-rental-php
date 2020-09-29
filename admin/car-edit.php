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

  $id = $_GET['id'];
  $queryData = mysqli_query($conn, "SELECT * FROM cars WHERE id='$id' ");
  $item = mysqli_fetch_assoc($queryData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CRM - Ubah Data Mobil</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/admin/sb-admin-2.min.css">
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

      <li class="nav-item">
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

      <li class="nav-item active">
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
          <div class="d-sm-flex mb-4">
            <a href="car-data.php" class="mr-3 a-btn-color-primary">
              <i class="fas fa-angle-left fa-2x"></i>
            </a>
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Mobil</h1>
          </div>

          <div class="row">
            <div class="col-md-12">

              <div class="card shadow mb-4">
                <div class="card-body">
                  <form action="../config/admin/car-edit.php" method="post">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">

                    <div class="form-group">
                      <label>Nama Mobil</label>
                      <input type="text" class="form-control" name="name" id="" value="<?= $item['name'] ?>">
                    </div>

                    <div class="form-group">
                      <label>Nomor Polisi</label>
                      <input type="text" class="form-control" name="police_number" id="" value="<?= $item['number'] ?>">
                    </div>

                    <div class="form-group">
                      <label>Harga Sewa Perhari</label>
                      <input type="number" class="form-control" name="price" id="" value="<?= $item['price'] ?>">
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-color-primary btn-block">Simpan Perubahan</button>
                    </div>

                  </form>
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
