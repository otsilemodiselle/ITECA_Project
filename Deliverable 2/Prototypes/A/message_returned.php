<?php
  session_start();

  if(isset($_GET['msg'])){
    $message_type = $_GET['msg'];

    switch ($message_type)
    {
      case "signupfail":
        $returned_message = "Email address taken. Please try again, or login.";
        break;
      case "orderfail":
        $returned_message = "";
        break;
      case "ordersuccess":
        $returned_message = "";
        break;
      case "anonymous":
        $returned_message = "Please login or signup.";
        break;
      case "loginfail":
        $returned_message = "Login details incorrect.";
        break;
    }
  }
?>