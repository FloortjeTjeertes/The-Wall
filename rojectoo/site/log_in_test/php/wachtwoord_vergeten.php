<?php
  include "database/data.php";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if($password1 === $password2){
      $con = mysqli_connect($servername,$uid,$pwd,$database);
      if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
      }
      $email = $_GET['email'];
      $sql = "UPDATE account SET wachtwoord=$password1 WHERE email=$email";
      $con->query($sql);
      echo "Wachtwoord aangepast";
    } else {
      echo "Wachtwoorden zijn niet hetzelfde";
    }
  }
?>
