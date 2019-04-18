<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" href="logo/logo.png" type="image/gif" sizes="16x16">

    <meta charset="utf-8">
    <link rel="stylesheet" href="css.css">

    <title>Home</title>
  </head>

  <body>

    <div class="wrapper">
      <div id="header">
        <a href="home.php">
          <img src="logo/logo.png" class="Logo1" alt="Logo">
        </a>

        <div id="topnav">
          <ul>
            <?php include "php/inOrOut.php"; ?>
            <li>
              <a class="button" href="home.php" style="background-color: #B22222; color: #ffffff;">Home</a>
            </li>
          </ul>
        </div>
        <h1 style="float: right; margin-top: 2em;">Social Stories</h1>
      </div>

    </div>
    <div id="container">
      <div id="imglist">
        <div id="images"></div>
      </div>
    </div>

    <script src="javascript/ajax.js"></script>
    <script>ajaxFotos(10);</script>
  </body>
</html>

  <!-- ======================================================oude code voor het geval dat====================================================== -->

      <!-- <input type="button" class="button" id="profiel" value="Profiel"> -->
