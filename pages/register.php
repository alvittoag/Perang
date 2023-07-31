<?php
session_start();

if (!empty($_SESSION['username'])) {
  header('Location: /pengelolaan/pages/dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Register Page</title>
</head>

<body>
  <?php include('../components/navbar.php') ?>

  <form action="register.php" method="post" class="flex justify-center flex-col items-center gap-8 mt-36">
    <input type="text" name="username" class="border border-purple-800 py-2 w-80 rounded-md px-3 focus:outline-none"
      placeholder="Username" required>

    <input type="password" name="password" class="border border-purple-800 py-2 w-80 rounded-md px-3 focus:outline-none"
      placeholder="Password" required>

    <input type="password" name="confirm_password"
      class="border border-purple-800 py-2 w-80 rounded-md px-3 focus:outline-none" placeholder="Konfirmasi Password"
      required>

    <button type="submit" name="register"
      class="py-2 bg-purple-800 w-80 text-white font-bold rounded-md">Registrasi</button>

  </form>

</body>

</html>

<?php

include('../utils/db.php');

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if($password !== $confirm_password) {
    echo "<script>alert('Password tidak sama')</script>";
  } else {

    $hash = password_hash($password, PASSWORD_DEFAULT);
  
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash')";
  
    mysqli_query($conn, $sql);
  
  
    header("Location: ./login.php");
  }

}

?>