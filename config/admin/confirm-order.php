<?php
  require '../connection.php';

  $status = $_GET['status'];
  $id = $_GET['id'];

  if($status == 'WA'):
    $queryUpdate = mysqli_query($conn, "UPDATE transactions SET
    status='B' WHERE id='$id' ");
  else:
    $queryUpdate = mysqli_query($conn, "UPDATE transactions SET
    status='R' WHERE id='$id' ");
  endif;

  if($queryUpdate):
    echo "<script>alert('Konfirmasi Berhasil');window.location.href='../../admin/index.php'</script>";
  else:
    echo "<script>alert('Konfirmasi Gagal');window.location.href='../../admin/index.php'</script>";
  endif;
?>