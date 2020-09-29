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

  $user = $_SESSION['user'];
  $queryData = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' ");
  $item = mysqli_fetch_assoc($queryData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental Management - Ubah Akun</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">

  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/client.css">
</head>
<body>
  <div class="register-page">
    
    <div class="register-card">
      <h3>Ubah Akun</h3>
      <form action="config/account.php" method="post">
        <input type="hidden" name="id" value="<?= $item['id'] ?>">

        <div class="form-group">
          <input type="text" class="form-control" name="name" value="<?= $item['name'] ?>" placeholder="Nama Lengkap">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="username" value="<?= $item['username'] ?>" placeholder="Username">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" name="password" value="<?= $item['password'] ?>" placeholder="Password">
        </div>

        <div class="form-group">
          <input type="email" class="form-control" name="email" value="<?= $item['email'] ?>" placeholder="Email">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="phonenumber" value="<?= $item['phone'] ?>" placeholder="Nomor Telepon">
        </div>

        <div class="form-group">
          <textarea class="form-control" name="address" rows="3" placeholder="Alamat Lengkap"><?= $item['address'] ?></textarea>
        </div>

        <button type="button" class="btn btn-danger btn-block" id="btn-edit">Simpan Perubahan</button>

      </form>
      <a href="index.php" class="nav-link">Kembali</a>
    </div>
  </div>

  <script>
    let btnEdit = document.getElementById('btn-edit');

    btnEdit.addEventListener('click', function() {
      let arrInput = [];
      let inputs = document.querySelectorAll('.form-control');

      inputs.forEach(function(input) {
        arrInput.push(input.value);
      });

      let response = arrInput.indexOf("");
      if(response == -1) {
        btnEdit.setAttribute('type', 'submit');
        btnEdit.click();
      }else {
        alert('Harap isi data dengan lengkap!');
      }
    });
  </script>
</body>
</html>