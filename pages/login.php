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
  <title>Login Page</title>
</head>

<body>
  <?php include('../components/navbar.php') ?>

  <form action="login.php" method="post" class="flex justify-center flex-col items-center gap-8 mt-36">
    <input type="text" name="username" class="border border-purple-800 py-2 w-80 rounded-md px-3 focus:outline-none" placeholder="Username" required>

    <input type="password" name="password" class="border border-purple-800 py-2 w-80 rounded-md px-3 focus:outline-none" placeholder="Password" required>

    <button type="submit" name="login" class="py-2 bg-purple-800 w-80 text-white font-bold rounded-md">Login</button>

    <p>Belum punya akun ? <a style="color: blue;" href="./register.php">Registerasi</a></p>
  </form>


</body>

</html>


<?php
if (isset($_POST['login'])) {
  include('../utils/db.php');

  $username = $_POST['username'];
  $password = $_POST['password'];


  $sql = "SELECT * FROM users WHERE username='$username'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 0) {
    echo "<script>alert('Email atau Password salah')</script>";
  } else {

    while ($user = mysqli_fetch_array($result)) {

      if ($user['username'] === $username && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: ./dashboard.php');
      }
    }
  }
}




?>