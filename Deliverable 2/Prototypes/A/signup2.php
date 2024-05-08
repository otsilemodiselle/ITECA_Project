<?php
  require_once 'functions.php';

  if (isset($_POST['email'])){
    $email = sanitizeString($_POST['email']);

    $queryCheckExistingEmail = "SELECT * 
                                FROM stakeholders
                                WHERE email = '$email';";

    $emailExistsResult = queryMysql($queryCheckExistingEmail);

    if(!$emailExistsResult->rowCount()){

      if (isset($_POST['name'])){
        $name = sanitizeString($_POST['name']);
        $name = ucfirst(strtolower($name));
      }
      if (isset($_POST['surname'])){
        $surname = sanitizeString($_POST['surname']);
        $surname = ucfirst(strtolower($surname));
      }
      if (isset($_POST['contact'])){
        $contact = sanitizeString($_POST['contact']);
      }
      if (isset($_POST['contact'])){
        $contact = sanitizeString($_POST['contact']);
      }
      if (isset($_POST['pass'])){
        $password = sanitizeString($_POST['pass']);
      }

      add_stakeholder($pdo, $email, $contact);

      $hash = password_hash($password, PASSWORD_DEFAULT);

      $queryNewStakeID = "SELECT stakeholder_id
                          FROM stakeholders
                          WHERE email = '$email';";

      $resultNewStakeID = queryMysql($queryNewStakeID);

      $row = $resultNewStakeID->fetch();
      $stakeholder_id = $row['stakeholder_id'];

      add_customer($pdo, $stakeholder_id, $name, $surname, $hash);

      $queryNewCustomerID = "SELECT customer_id
                          FROM customer
                          WHERE stakeholder_id = '$stakeholder_id';";

      $resultNewCustomerID = queryMysql($queryNewCustomerID);

      $row = $resultNewCustomerID->fetch();
      $new_customer_id = $row['customer_id'];

      session_start();

      $_SESSION['customer_id'] = $new_customer_id;
      $_SESSION['forename'] = $name;
      $_SESSION['surname'] = $surname;

      header("Location: projectIndexPHPForm.php");
      exit;


    }
    else{
      header("Location: projectMessagePHPForm.php?msg=signupfail");
      exit;
    }
  }
?>