<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "pengelolaan";


$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
  die("Koneksi Gagal :" . mysqli_connect_error());
}
