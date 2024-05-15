<?php
  require_once('functions.php');
  session_start();

  $action = $_POST['order-action'];
  switch ($action)
      {
        case 'Edit': 
          // do stuff
          break;
        case 'Cancel Order':
          // do stuff
          break;
        case 'Pay Now':
          // do stuff
          break;
      }
?>