<?php
  session_start();
  require 'connection.php';

  $user = $_POST['username'];
  $pw = $_POST['password'];

  $queryGet = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pw' ");
  $amount = mysqli_num_rows($queryGet);

  if($amount == 1):
    $data = mysqli_fetch_assoc($queryGet);
    if($data['role'] == 1):
      $_SESSION['user'] = $user;
      $_SESSION['role'] = 1;
      $_SESSION['status'] = 'login';
      header('location:../admin/index.php?msg=login');
    else:
      $_SESSION['user'] = $user;
      $_SESSION['role'] = 0;
      $_SESSION['status'] = 'login';
      header('location:../index.php?msg=login');
    endif;
  else:
    header('location:../login.php?msg=fail');
  endif;
?>