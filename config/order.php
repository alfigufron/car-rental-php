<?php
  session_start();
  require 'connection.php';

  $user = $_SESSION['user'];
  $startDate = $_POST['start_date'];
  $endDate = $_POST['end_date'];
  $car = $_POST['car'];
  $note = $_POST['note'];
  $dateNow = date('m/d/Y');
  $status = 'WA';
  $rand = mt_rand(10000, 99999);
  $transId = 'CRM-'.$rand;

  $queryDataUser = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' ");
  $dataUser = mysqli_fetch_assoc($queryDataUser);
  $userId = $dataUser['id'];

  $queryDataCar = mysqli_query($conn, "SELECT * FROM cars WHERE id='$car' ");
  $dataCar = mysqli_fetch_assoc($queryDataCar);
  $priceCar = $dataCar['price'];

  $start = explode('/', $startDate);
  $start = $start[2].$start[0].$start[1];
  $end = explode('/', $endDate);
  $end = $end[2].$end[0].$end[1];
  $day = intval($end)-intval($start)+1;
  $price = $priceCar*$day;

  $queryInsert = mysqli_query($conn, "INSERT INTO transactions
  (id, user_id, car_id, date, start_date, end_date, price, note, status) VALUES
  ('$transId', '$userId', '$car', '$dateNow', '$startDate', '$endDate', '$price', '$note', '$status')");

  if($queryInsert):
    echo "<script>alert('Pemesanan Berhasil');window.location.href='../history.php'</script>";
  else:
    echo "<script>alert('Pemesanan gagal');window.location.href='../order.php'</script>";
  endif;

  // WA = Tunggu Acc Admin
  // B = Dipinjam
  // R = Dikembalikan
?>