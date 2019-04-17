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

      $sql = "SELECT * FROM account";
      $statement = $con->query($sql);

      $id = $_POST['id'];
      $vertificatie = $_POST['vertificatie'];
      $boolean = 0;

      foreach ($statement as $rij) {
        if($rij['id'] === $id){
          if($rij['vertificatie'] === $vertificatie){
            $boolean = 1;
          }
        }
      }

      if($boolean = 1){
        $password1 = password_hash($password1, PASSWORD_DEFAULT);
        $sql = "UPDATE account SET wachtwoord='$password1' WHERE id='$id'";
        $con->query($sql);
        echo "Wachtwoord aangepast<br><br";
      } else {
        echo "do not change the url";
      }
    } else {
      echo "Wachtwoorden zijn niet hetzelfde>";
    }
  }
?>
