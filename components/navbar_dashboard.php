<nav class="bg-sky-600 px-10 py-5 flex justify-between items-center">
  <a href="/pengelolaan/pages/dashboard.php" class="text-2xl font-bold text-white ">Dashboard</a>

  <div class="flex justify-between items-center text-white gap-5">
    <h5 class="font-medium text-xl">Hi, <?php echo $_SESSION['username'] ?></h5>

    <span>||</span>
    <div class="flex gap-8">

      <a href="/pengelolaan/pages/add.php" class="border px-3 rounded-lg flex items-center hover:bg-white hover:text-white">Tambah
        Data</a>

      <form action="dashboard.php" method="post">
        <button name="logout" class="bg-white text-gray-800 px-5 font-semibold rounded-lg py-2">Logout</button>
      </form>

    </div>


  </div>

</nav>

<?php

if (isset($_POST['logout'])) {
  session_destroy();

  header("Location: /pengelolaan/");
}

?>