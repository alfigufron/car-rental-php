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
  <title>Car Rental Management - Buat Akun</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">

  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/client.css">
</head>
<body>
  <div class="register-page">
    
    <div class="register-card">
      <h3>Buat Akun</h3>
      <form action="config/register.php" method="post">

        <div class="form-group">
          <input type="text" class="form-control" name="name" id="" placeholder="Nama Lengkap">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="username" id="" placeholder="Username">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" name="password" id="" placeholder="Password">
        </div>

        <div class="form-group">
          <input type="email" class="form-control" name="email" id="" placeholder="Email">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="phonenumber" id="" placeholder="Nomor Telepon">
        </div>

        <div class="form-group">
          <textarea class="form-control" name="address" id="" rows="3" placeholder="Alamat Lengkap"></textarea>
        </div>

        <button type="button" class="btn btn-danger btn-block" id="btn-register">Buat</button>

      </form>
      <p>Sudah memiliki akun? <a href="login.php">Masuk</a></p>
      <a href="index.php" class="nav-link">Kembali</a>
    </div>
  </div>

  <script>
    let btnRegister = document.getElementById('btn-register');

    btnRegister.addEventListener('click', function() {
      let arrInput = [];
      let inputs = document.querySelectorAll('.form-control');

      inputs.forEach(function(input) {
        arrInput.push(input.value);
      });

      let response = arrInput.indexOf("");
      if(response == -1) {
        btnRegister.setAttribute('type', 'submit');
        btnRegister.click();
      }else {
        alert('Harap isi data dengan lengkap!');
      }
    });
  </script>
</body>
</html>