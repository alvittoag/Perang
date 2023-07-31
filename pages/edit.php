<?php
session_start();

if (empty($_SESSION['username'])) {
  header('Location: /pengelolaan/pages/login.php');
}

include('../utils/db.php');

$id = $_GET['id'];

$sql = "SELECT * FROM barang WHERE id='$id'";

$res = mysqli_query($conn, $sql);

$barang = mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Edit Barang Pages</title>
</head>

<body>
  <?php include('../components/navbar_dashboard.php') ?>

  <form action="edit.php" method="post" class="w-80 mx-auto py-36 space-y-6">

    <input type="hidden" name="id" value="<?php echo $barang['id'] ?>">

    <input type="text" name="nama" value="<?php echo $barang['nama'] ?>" class="border border-gray-300 px-3 rounded-md py-2 w-full" placeholder="Masukan Nama Barang" required>

    <input type="number" name="harga" value="<?php echo $barang['harga'] ?>" class="border border-gray-300 px-3 rounded-md py-2 w-full" placeholder="Masukan Harga Barang" required>

    <input type="number" name="stok" value="<?php echo $barang['stok'] ?>" class="border border-gray-300 px-3 rounded-md py-2 w-full" placeholder="Masukan Stok Barang" required>

    <button type="submit" name="edit" class="bg-sky-600 w-full py-2 rounded-md text-white font-medium">Edit</button>
  </form>
</body>

</html>

<?php
if (isset($_POST['edit'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $id_brg = $_POST['id'];

  $sql = "UPDATE barang SET nama='$nama', harga='$harga', stok='$stok' WHERE id='$id_brg'";

  mysqli_query($conn, $sql);

  header('Location: ./dashboard.php');
}
?>