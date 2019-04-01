
<?php
if(isset($_FILES['image'])){
  $errors = array();
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];

  // de explode string-functie breekt een string in een array
  // hierbij breek je de string na de . (punt) waardoor je de bestands type hebt
  $filename_deel = explode('.',$_FILES['image']['name']);
  // end laat de laatste waarde van de array zoen
  $bestandstype = end($filename_deel);
  // voor het geval er JPG ipv jpg is geschreven
  $file_ext = strtolower($bestandstype);

  $bestandstypen = array("jpeg","jpg","png");

  if(in_array($file_ext,$bestandstypen)=== false){
  $errors[] = "Dit bestandstype kan niet, kies een JPEG of een PNG bestand.";
  }

  if($file_size > 2097152){
    $errors[] ='Het bestand moet kleiner zijn dan 2 MB';
  }
  if(empty($errors)==true){
     // move_upload_file stuurt je bestand naar een andere lokatie

     move_uploaded_file($file_tmp,"uploads/".$file_name);
     echo "Gelukt";
  } else{
     print_r($errors);
  }

  bestanden_upload($file_name);

}
function bestanden_upload($file_name){
  $sql="INSERT INTO fotos(Datum,user,filepath,description,titel)
  values('$file_name', '','','','')"
}

 ?>

<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="upload.css">
    <meta charset="utf-8">
    <title> geupload</title>
  </head>
  <body>


    </div>
        <div class="wrapper">
          <div id="header">
            <div id="logo">
              <img src="">
          </div>

          <div id="topnav">
            <ul>
              <li>
                <input type="button" class="button" id="logIn" value="Log in">
              </li>
              <li>
                <input type="button" class="button" id="signIn" value="Sign in">
              </li>
              <li>
                <input type="button" class="button" id="profiel" value="Profiel">
              </li>
            </ul>
          </div>
        </div>
</div>zs


<div class="container">
    <h3>foto uploaden</h3>

      <div id="midle" class="midle">
    <div id="uploadbox">
    beste <div id=naam>uw naam</div> upload hier je foto
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <!-- <select class="select" name="categorie">
    </select> -->
    <input type="submit"/>
    </form>
    </div>
    <!-- //einde upload -->
        </div>

      </div>
      <!-- //einde wrapper -->
    </div>
  </body>
</html>
