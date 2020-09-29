<?php
  require '../connection.php';

  $id = $_GET['id'];
  
  $queryData = mysqli_query($conn, "SELECT * FROM cars WHERE id='$id' ");
  $item = mysqli_fetch_assoc($queryData);
  unlink('../../data/images/'.$item['image']);

  $queryDelete = mysqli_query($conn, "DELETE FROM cars WHERE id='$id' ");
  if($queryDelete):
    echo "<script>alert('Hapus Data Sukses!');window.location.href='../../admin/car-data.php'</script>";
  else:
    echo "<script>alert('Hapus Data Gagal!');window.location.href='../../admin/car-data.php'</script>";
  endif;
?>