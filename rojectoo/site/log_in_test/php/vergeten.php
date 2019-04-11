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
    $email_mail = "";

    foreach ($statement as $rij) {
      if($email === $rij['email']){
        $id = $rij['id'];
        $email_mail = $rij['email'];
      }
    }

    if($id == 0){
      echo "Dit is geen geldig emailadress";
    } else {
      echo "<p style=color:black;>Email is verstuurd</p>  ";
      // the message
      $msg = "";

      // use wordwrap() if lines are longer than 70 characters
      $msg = wordwrap($msg,70);

      // send email
      mail($email,"Wachtwoord aanpassen",$msg);
    }
  }
?>
