<?php
  require 'connection.php';

  $id = $_POST['id'];
  $name = $_POST['name'];
  $user = $_POST['username'];
  $pw = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phonenumber'];
  $address = $_POST['address'];

  $queryUpdate = mysqli_query($conn, "UPDATE users SET
  name='$name', username='$user', password='$pw', 
  email='$email', phone='$phone', address='$address' 
  WHERE id='$id' ");

  if($queryUpdate):
    echo "<script>alert('Ubah Data Berhasil');window.location.href='../index.php'</script>";
  else:
    echo "<script>alert('Ubah Data Gagal');window.location.href='../account.php'</script>";
  endif;
?>