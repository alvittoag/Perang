<?php
session_start();

if (empty($_SESSION['username'])) {
  header('Location: /pengelolaan/pages/login.php');
}

include('../utils/db.php');

$search_val = '';

if (isset($_POST['search_button'])) {
  $search_val = $_POST['search'];
}


$user_id = $_SESSION['id'];

$sql = "SELECT * FROM barang WHERE user_id='$user_id' AND nama LIKE '%$search_val%' ORDER BY id DESC";

$res = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Dashboard Page</title>
</head>

<body>
  <?php include('../components/navbar_dashboard.php') ?>

  <form action="dashboard.php" method="post" class="my-10 flex justify-center items-center gap-3 w-full">
    <input type="text" name="search" class="border w-[40rem] border-gray-300 px-5 rounded-2xl py-2 focus:outline-sky-600" placeholder="Cari data barang yang anda inginkan. Ex : Tv, Laptop dll.">

    <button type="submit" name="search_button" class="bg-sky-600 py-2 px-6 text-white rounded-md">Search</button>

  </form>


  <?php
  if (mysqli_num_rows($res) === 0) echo "<h1 class='text-center mt-36 text-2xl'>Anda belum memilki data barang</h1>";

  ?>

  <div class="p-10 grid grid-cols-5 items-center gap-8">

    <?php
    while ($barang = mysqli_fetch_array($res)) {
      $format = number_format($barang['harga']);

      echo "
      <div class='border border-gray-300 p-5 rounded-xl space-y-6'>
        <div>
          <h1 class='text-2xl font-medium text-slate-600'>$barang[nama]</h1>
          <h5 class='text-slate-600 text-xl font-medium'>Rp.$format</h5>
          <p>Stok : $barang[stok]</p>
        </div>


        <div class='text-white space-x-2'>
          <a href='./delete.php?id=$barang[id]' class='bg-red-600 py-2 px-3 rounded-md'>Delete</a>
          <a href='./edit.php?id=$barang[id]' class='bg-green-600 py-2 px-3 rounded-md'>Edit</a>
        </div>
      </div>
      ";
    }

    ?>

  </div>

</body>

</html>