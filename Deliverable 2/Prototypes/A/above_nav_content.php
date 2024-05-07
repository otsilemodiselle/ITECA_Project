<?php
  require_once 'functions.php';

  if((!isset($_SESSION['cart_count'])) || ($_SESSION['cart_count'] == 0)){
    $cart_icon = "empty_cart.png";
  }
  else{
      $cart_icon = "full_cart.png";
  }  

  if (isset($_SESSION['wishlist_count'])){
      $wishlist_count = $_SESSION['wishlist_count'];
  }
  else{ $wishlist_count = 0;}

  if (isset($_SESSION['cart_count'])){
      $cart_count = $_SESSION['cart_count'];
  }
  else{ $cart_count = 0;}

  if (isset($_SESSION['customer_id'])){
      $login_name=$_SESSION['forename'];
      echo <<<_END
        <ul class='clearfix title-list'>
              <li class='title-options'>                    
                  <a onclick='Loggoutds()' href="destroy_session.php"  class='title-link'>Sign-Out</a>
              </li>

              <li class='title-options' class='title-link'>                    
                  <a href="" class='title-link' class='title-link'>Hello $login_name!</a>
              </li>

              <li class='title-options'>                    
                  <a href="" class='title-link'>Wishlist ($wishlist_count)</a>
                  <img src="wishlist.png" class="wishlist_icon">
              </li>

              <li class='title-options'>                    
                  <a href="" class='title-link'>Cart ($cart_count)</a>
                  <img src="$cart_icon" class="cart_icon">
              </li>
              
        </ul>
    </div>
    _END;
  } else{
      echo <<<_END
        <ul class='clearfix title-list'>
              <li class='title-options'>
                  <a href="projectLoginPHPForm.php" class='title-link'>Login</a>
              </li>
              <li class='title-options'>
                  <a  href="" class='title-link'>Sign-up</a>
              </li>
              <li class='title-options'>
                  <a href="" class='title-link'>Wishlist ($wishlist_count)</a>
                  <img src="wishlist.png" class="wishlist_icon">                    
              </li>
              <li class='title-options'>
                  <a href="" class='title-link'>Cart ($cart_count)</a>
                  <img src="$cart_icon" class="cart_icon">
              </li>
        </ul>
    </div>
    _END;
  }
?>