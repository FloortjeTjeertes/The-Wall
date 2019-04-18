<?php
  ini_set('display_errors', 1);
  $servername = "127.0.0.1";
  $uid = "c3652JRJman";
  $pwd = "Hallojoep1";
  $database = "c3652theWall";

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $sql = "SELECT * FROM fotos";
  if($result=mysqli_query($con,$sql)){
    $num_rows=mysqli_num_rows($result);
  }

  $nummer = $_GET['nummer'];
  $nummerLater1 = $nummer + 10;
  $nummerLater2 = $nummer - 10;
  $boolean = 1;

  if($nummerLater2 <= 0){
    $boolean = 0;
  } else if($nummerLater1 > $num_rows){
    $boolean = 2;
  }

  $sql = "SELECT * FROM fotos LIMIT $nummerLater2 , $nummer";
  $statement = $con->query($sql);

  foreach ($statement as $rij) {
    echo '<div id="fotolijst">
    Titel: '. $rij['titel'] . '
    <br>
    <img id="foto" src= ' . $rij['filepath'] . '></img>
    <br> Auther: ' . $rij['user'] . '
    <br> Description:<br>' . $rij['description'] . "<br>";
  }
  if($boolean == 0){
    echo "<img id=rechts class=pijl src=img/pijltje_rechts.png onclick=ajaxFotos(" . $nummerLater1 . ")>";
  } else if ($boolean == 1){
    echo "<img id=links class=pijl src=img/pijltje_links.png onclick=ajaxFotos(" . $nummerLater2 . ")>";
    echo "<img id=rechts class=pijl src=img/pijltje_rechts.png onclick=ajaxFotos(" . $nummerLater1 . ")>";
  } else {
    echo "<img id=links class=pijl src=img/pijltje_links.png onclick=ajaxFotos(" . $nummerLater2 . ")>";
  }
  echo "</div>";

?>
