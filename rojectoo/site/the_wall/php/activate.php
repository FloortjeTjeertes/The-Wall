<?php
  include "database/data.php";
  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $id = $_GET['id'];
  $vertificatie = $_GET['vertificatie'];
  $boolean = false;

  $sql = 'SELECT * FROM account';
  $statement = $con->query($sql);

  foreach ($statement as $rij) {
    if($id == $rij['id'] && $vertificatie == $rij['vertificatie']){
      $boolean = true;
    }
  }

  if($boolean == true){
    $sql = 'UPDATE account SET activate="true" WHERE id='$id' AND vertificatie='$vertificatie'';
    $con->query($sql);
    echo "account is geactiveerd";
  } else {
    echo "link klopt niet";
  }
?>
