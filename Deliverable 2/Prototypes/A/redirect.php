<?php
  session_start();

  if (isset($_SESSION['customer_id']))
  {
    $name = $_SESSION['forename'];
    $wishlist_count = $_SESSION['wishlist_count'];
    $cart_count = $_SESSION['cart_count'];

    echo "Welcome back $name. You have $wishlist_count items in your wishlist and $cart_count items in your cart.";
  }
  else echo "Please login";

  
?>