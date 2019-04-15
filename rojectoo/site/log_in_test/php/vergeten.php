<?php
  include "php/database/data.php";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con = mysqli_connect($servername,$uid,$pwd,$database);
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    $sql = 'SELECT * FROM account';
    $statement = $con->query($sql);

    $email = $_POST['email'];
    $id = 0;

    foreach ($statement as $rij) {
      if($email === $rij['email']){
        $id = $rij['id'];
        $vertificatie = $rij['vertificatie'];
      }
    }

    if($id == 0){
      echo "Dit is geen geldig emailadress";
    } else {
      echo "<p style=color:black;>Email is verstuurd</p>";

      $link = "http://localhost/test/wachtwoord_vergeten?vertificatie=" . $vertificatie . "&id=" . $id;

      // the message
      $msg = "Klik deze link om je wachtwoord aan te passen\n" . $link;

      // use wordwrap() if lines are longer than 70 characters
      $msg = wordwrap($msg,70);

      // send email
      mail($email,"Wachtwoord aanpassen",$msg);
    }
  }
?>
