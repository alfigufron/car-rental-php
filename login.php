<?php
  require 'config/connection.php';
  session_start();

  if(isset($_SESSION['status'])):
    if($_SESSION['status'] == 'login'):
      header('location:index.php?msg=login');
    endif;
  endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental Management - Masuk</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">

  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/client.css">
</head>
<body>
  <div class="login-page">
    
    <div class="login-card">
      <h3>Masuk</h3>
      <form action="config/login.php" method="post">

        <div class="form-group">
          <input type="text" class="form-control" name="username" id="" placeholder="Username">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" name="password" id="" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-danger btn-block">Masuk</button>

      </form>
      <p>Belum memiliki akun? <a href="register.php">Buat</a></p>
      <a href="index.php" class="nav-link">Kembali</a>
    </div>
    
  </div>
</body>
</html>