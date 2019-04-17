<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <title>wachtwoord vergeten</title>
  </head>
  <body>
    <form action="vergeten.php" method="post" id="form">
      <p>Voer je email in</p>
      <div id="fout" style="color:red"><?php include "php/vergeten.php"; ?></div>
      <label for="email">email</label>
      <input type="text" name="email">
      <input type="submit" value="submit">
    </form>
  </body>
</html>
