<?php
  require '../connection.php';

  $name = $_POST['name'];
  $policeNum = $_POST['police_number'];
  $price = $_POST['price'];
  $image = $_FILES['image'];

  $imageName = $image['name'];
  $imageSize = $image['size'];
  $imageTmp = $image['tmp_name'];
  $imageType = $image['type'];

  $imageExtention = explode('.', $imageName);
  $imageExtention = strtolower(end($imageExtention));

  $formatAllow = array('jpg', 'jpeg', 'png');
  $rand = mt_rand(10000000, 99999999);
  $newImageName = 'CAR'.$rand.'.'.$imageExtention;

  if(in_array($imageExtention, $formatAllow) === false):
    echo "<script>alert('Format tidak didukung!');window.location.href='../../admin/add-car.php'</script>";
  endif;
  
  if($imageSize > 2097152):
    echo "<script>alert('Ukuran terlalu besar! Maksimal 2MB');window.location.href='../../admin/add-car.php'</script>";
  endif;

  move_uploaded_file($imageTmp, '../../data/images/'.$newImageName);

  $queryAdd = mysqli_query($conn, "INSERT INTO cars
  (name, number, price, image) VALUES 
  ('$name', '$policeNum', '$price', '$newImageName') ");

  if($queryAdd):
    echo "<script>alert('Tambah Data Sukses!');window.location.href='../../admin/car-data.php'</script>";
  else:
    echo "<script>alert('Tambah Data Gagal!');window.location.href='../../admin/add-car.php'</script>";
  endif;
?>