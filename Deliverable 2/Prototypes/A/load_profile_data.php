<?php
  require_once 'functions.php';
  

  $customer_id = $_SESSION['customer_id'];

  $queryFetchPersonalData = "SELECT s.email, s.address, s.contact_number, c.name, c.surname, c.card_no, c.exp_date
                            FROM stakeholders s
                            JOIN customer c ON s.stakeholder_id = c.stakeholder_id
                            WHERE customer_id = $customer_id;";

$result = queryMysql($queryFetchPersonalData);

  if ($result->rowCount())
  {
    $row = $result->fetch();
    $email = $row['email'];
    $address = $row['address'];
    $contact = $row['contact_number'];
    $name = $row['name'];
    $surname = $row['surname'];
    $card_no = $row['card_no'];
    $exp_date = $row['exp_date'];
  } 

                  
?>