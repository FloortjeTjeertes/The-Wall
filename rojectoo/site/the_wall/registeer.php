<?php
  include "php/database/data.php";

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $vertificatie = $_GET['vertificatie'];
  $boolean = "true";

  $sql = "UPDATE account SET active='$boolean' WHERE vertificatie='$vertificatie'";

  $con->query($sql);

  echo "<p>Account is geactiveerd<p>";
  echo "<a href=http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php>Naar de log in website<a>"

?>
