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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental Management - Detail Histori</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">

  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/client.css">
</head>
<body>
  <div class="detail-history-page">

    <div class="container history-card">

      <div class="header" style="width: 100%;background-color: #84142d;text-align: left;color: white;padding: 40px 20px;">
        <h3 style="font-weight: 600;">Car Rental Management</h3>
        <h6 style="margin-top: 20px;">Invoice</h6>
        <h6>#<?= $transId ?></h6>
      </div>

      <div class="body" style="width: 100%;text-align: left;padding: 40px 20px;background-color: white;">
        <ul style="list-style-type: none;padding-left: 0;">
          <li>#<?= $transId ?></li>
          <li><?= $dataUser['name'] ?></li>
          <li><?= $dataUser['phone'] ?></li>
        </ul>

        <table class="table" style="width: 100%;">
          <tr>
            <td>Tipe Mobil</td>
            <td><?= $dataCar['name'] ?></td>
          </tr>
          <tr>
            <td>Nomor Polisi</td>
            <td><?= $dataCar['number'] ?></td>
          </tr>
          <tr>
            <td>Biaya/hari</td>
            <td>Rp <?= $priceCar ?>/hari</td>
          </tr>
          <tr>
            <td>Tanggal Pemesanan</td>
            <td><?= $dataTrans['start_date'] ?></td>
          </tr>
          <tr>
            <td>Tanggal Pengembalian</td>
            <td><?= $dataTrans['end_date'] ?></td>
          </tr>
          <tr>
            <td>Total Biaya</td>
            <td>Rp <?= $priceTotal ?></td>
          </tr>
          <tr>
            <td>Catatan Pemesan</td>
            <td><?= $dataTrans['note'] ?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><?= $status ?></td>
          </tr>
        </table>

      </div>

      <div style="padding: 20px 0;">
        <a href="history.php">Kembali</a>
      </div>

    </div>

  </div>
</body>
</html>