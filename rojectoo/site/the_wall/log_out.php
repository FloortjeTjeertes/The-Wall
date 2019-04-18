<?php
  session_start();
  $_SESSION['session'] = "false";
  $_SESSION['id'] = 0;
  $_SESSION['vertificatie'] = "0";
  $_SESSION['active'] = "false";
  header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
?>
