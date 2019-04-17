<?php
  session_start();
  $_SESSION['session'] = "true";
  $_SESSION['id'] = 1;
  $_SESSION['vertificatie'] = "139KGP";
  $_SESSION['active'] = "true";
  echo $_SESSION['id'] . "<br>";
  echo $_SESSION['vertificatie'] . "<br>";
  echo $_SESSION['active'] . "<br>";
?>
