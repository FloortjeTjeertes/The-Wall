<?php
  $db = "CREATE DATABASE IF NOT EXISTS `accounts`";
  $dt = "CREATE TABLE IF NOT EXISTS `account` (
          id              INT(6)        UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          gebruikersnaam  VARCHAR(30)   NOT NULL,
          wachtwoord      VARCHAR(30)   NOT NULL,
          email           VARCHAR(60)   NOT NULL
    )"
?>