<?php
  include "database/data.php";
  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $filepath = $_GET['filepath'];

  $sql = "DELETE FROM fotos WHERE filepath='$filepath' ";
  $con->query($sql);
  header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/profiel.php");
?>
