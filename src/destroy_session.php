<?php
  session_start();
  $message = "You have logged out, goodbye.";
  echo "<script>alert('".addslashes($message)."');</script>";
  destroy_session_and_data();
  header('location: ../index.php');
  exit();


  function destroy_session_and_data()
    {
        $_SESSION = array();
        setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
    }
?>