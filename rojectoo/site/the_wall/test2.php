<?php
  ini_set('display_errors', 1);
  session_start();
  echo $_SESSION['id'] . "<br>";
  echo $_SESSION['vertificatie'] . "<br>";
  echo $_SESSION['active'] . "<br>";
  echo $_SESSION['session'];
?>
