<?php
  require '../connection.php';

  $id = $_POST['id'];
  $name = $_POST['name'];
  $policeNum = $_POST['police_number'];
  $price = $_POST['price'];

  $queryUpdate = mysqli_query($conn, "UPDATE cars SET 
  name='$name', number='$policeNum', price='$price' WHERE id='$id' ");

  if($queryUpdate):
    echo "<script>alert('Ubah Data Sukses!');window.location.href='../../admin/car-data.php'</script>";
  else:
    echo "<script>alert('Ubah Data Gagal!');window.location.href='../../admin/car-data.php'</script>";
  endif;
?>