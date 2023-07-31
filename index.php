<?php
session_start();

if (!empty($_SESSION['username'])) {
  header('Location: /pengelolaan/pages/dashboard.php');
}

?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
</head>

<body>
  <?php include('./components/navbar.php') ?>

  <div class="flex justify-center items-center h-[100vh] px-20">

    <h1 class="font-bold text-transparent text-5xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600 text-center">
      PHP Adalah Fundamental Terbaik Programmer Kampus indonesia </h1>
  </div>


</body>

</html>