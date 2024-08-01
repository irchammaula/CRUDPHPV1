<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db_sekolah';
  $conn = mysqli_connect($host, $username, $password, $db);
  if($conn){
    //echo "Koneksi Berhasil";
  }
  
  mysqli_select_db($conn, $db);
?>
