<?php
  $dt = "CREATE TABLE IF NOT EXISTS `account` (
          id              INT(10)        UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          gebruikersnaam  VARCHAR(32)   NOT NULL,
          wachtwoord      VARCHAR(256)  NOT NULL,
          email           VARCHAR(128)  NOT NULL,
          vertificatie    VARCHAR(20)   NOT NULL,
          active          VARCHAR(20)   NOT NULL
    )"
?>
