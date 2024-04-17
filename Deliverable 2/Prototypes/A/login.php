<?php
  require_once 'functions.php';

  if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
  {
    $em_temp = sanitizeString($_SERVER['PHP_AUTH_USER']);
    $pw_temp = sanitizeString($_SERVER['PHP_AUTH_PW']);
    $query = "SELECT stakeholder_id FROM stakeholders WHERE email='$em_temp'";
    $result = queryMysql($query);
    
    if (!$result->rowCount()) die ("Incorrect login details");

    $row = $result->fetch();
    $retrieved_st_id = $row['stakeholder_id'];

    $query = "SELECT * FROM customer WHERE stakeholder_id='$retrieved_st_id'";
    $result = queryMysql($query);

    $row = $result->fetch();
    $retrieved_name = $row['name'];
    $retrieved_surname = $row['surname'];
    $retrieved_pw = $row['password'];

    if (password_verify(str_replace("'", "", $pw_temp), $retrieved_pw))
      echo htmlspecialchars("Welcome, $retrieved_name $retrieved_surname.");
    else die("Incorrect login details");
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Retricted Area"');
    header('HTTP/1.1 401 Unauthorized');
    die ("Please enter your email and password");
  }