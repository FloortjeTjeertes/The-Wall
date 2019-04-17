<?php
  include "database/data.php";
  $email = $_GET['email'];

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
  $sql = 'SELECT * FROM account';
  $statement = $con->query($sql);

  $boolean = 0;
  $boolean2 = 0;

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    foreach ($statement as $rij) {
      if($email === $rij['email']){
        $boolean2 = 1;
      }
    }
  } else {
    echo "<input type=hidden id=check4 value=false>";
    echo "not a valid emailadress";
    $boolean = 1;
  }

  if($boolean2 == 1){
    echo "<input type=hidden id=check4 value=false>";
    echo "emailadress is al in gebruik";
  } else if($boolean == 0){
    echo "<input type=hidden id=check4 value=true>";
  }
?>
