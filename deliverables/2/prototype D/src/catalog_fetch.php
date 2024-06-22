<?php
  session_start();
  require_once 'functions.php';

  if(isset($_GET['cat'])){
    $clickedCatalogue = $_GET['cat'];

    $queryCountRecords = "SELECT COUNT(*) AS total_records FROM $clickedCatalogue;";

    $countResults = queryMysql($queryCountRecords);
    $rowCatelogCount = $countResults->fetch();

    $_SESSION['catelog_count'] = $rowCatelogCount['total_records'];


  }
  header("location: ../catalog.php?cat=$clickedCatalogue");
?>