<?php
  require 'connection.php';

  $name = $_POST['name'];
  $user = $_POST['username'];
  $pw = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phonenumber'];
  $address = $_POST['address'];
  $role = 0;

  $queryAdd = mysqli_query($conn, "INSERT INTO users
  (username, password, role, name, email, phone, address) VALUES 
  ('$user', '$pw', '$role', '$name', '$email', '$phone', '$address')");

  if($queryAdd) {
    echo "<script>alert('Registrasi Berhasil');window.location.href='../login.php'</script>";
  }else {
    echo "<script>alert('Registrasi Gagal');window.location.href='../register.php'</script>";
  }
?>