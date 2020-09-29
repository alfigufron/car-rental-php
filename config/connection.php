<?php
  $conn = mysqli_connect('localhost','root','','db_rentcar');
  if(!$conn) {
    echo "Connection Failed";
  }
?>