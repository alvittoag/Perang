<?php
session_start();

if (empty($_SESSION['username'])) {
  header('Location: /pengelolaan/pages/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Tambah Barang Page</title>
</head>

<body>

  <?php include('../components/navbar_dashboard.php') ?>

  <form action="add.php" method="post" class="w-80 mx-auto py-36 space-y-6">
    <input type="text" name="nama" class="border border-gray-300 px-3 rounded-md py-2 w-full" placeholder="Masukan Nama Barang" required>

    <input type="number" name="harga" class="border border-gray-300 px-3 rounded-md py-2 w-full" placeholder="Masukan Harga Barang" required>

    <input type="number" name="stok" class="border border-gray-300 px-3 rounded-md py-2 w-full" placeholder="Masukan Stok Barang" required>

    <button type="submit" name="tambah" class="bg-sky-600 w-full py-2 rounded-md text-white font-medium">Tambah</button>
  </form>

</body>

</html>

<?php

include('../utils/db.php');

if (isset($_POST['tambah'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $user_id = $_SESSION['id'];

  $sql = "INSERT INTO barang (nama, harga, stok, user_id) VALUES ('$nama', '$harga', '$stok', '$user_id')";

  mysqli_query($conn, $sql);

  header("Location: ./dashboard.php");
}

?>