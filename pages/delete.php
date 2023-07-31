<?php
include('../utils/db.php');

$id = $_GET['id'];

$sql = "DELETE FROM barang where id='$id'";

mysqli_query($conn, $sql);

header("Location: ./dashboard.php");
