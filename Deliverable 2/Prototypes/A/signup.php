<?php
  require_once 'functions.php';

  $email = "iamotsie@gmail.com";
  $address = "447 Acorn Rd, Lynnwood Glen, Pretoria, 0081";
  $number = "0615022558";

  // add_stakeholder($pdo, $email, $address, $number);

  $query = "SELECT stakeholder_id FROM stakeholders WHERE email = '$email'";
  $result = queryMysql($query);
  $row = $result->fetch();
  $stakeholder_id = $row['stakeholder_id'];

  $name = "otsile";
  $surname = "modiselle";
  $password = "Chickenp0x";
  $hash = password_hash($password, PASSWORD_DEFAULT);

  add_customer($pdo, $stakeholder_id, $name, $surname, $hash);

  echo("done");
?>