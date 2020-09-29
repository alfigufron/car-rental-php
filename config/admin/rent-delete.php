<?php
  require '../connection.php';

  $id = $_GET['id'];

  $queryDelete = mysqli_query($conn, "DELETE FROM transactions WHERE id='$id' ");
  if($queryDelete):
    echo "<script>alert('Hapus Data Sukses!');window.location.href='../../admin/index.php'</script>";
  else:
    echo "<script>alert('Hapus Data Gagal!');window.location.href='../../admin/index.php'</script>";
  endif;

?>