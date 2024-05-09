<?php
  require_once 'functions.php';

  echo <<<_END
  <!DOCTYPE html>
  <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!--<meta http-equiv="refresh" content="3" >-->
          <title>Bride & Joy</title>
          <link rel="stylesheet" href="projectPHPStyles.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>
      <body> 
      <script>

      </script>
      <header>
      <div class='clearfix' id='top-title-div'>
          <img src="dance burgundy.png" class='title-icon'  alt="">
          <a class='title-home' href="projectIndexPHPForm.php">Bride & Joy</a>

_END;

  if (isset($_SESSION['customer_id'])){

    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT COUNT(w.wish_id) AS wishlist_count
    FROM wishlist w
    JOIN collection co ON w.coll_id = co.coll_id
    JOIN customer c ON co.customer_id = c.customer_id
    WHERE c.customer_id = $customer_id;";
    $result =queryMysql($query);
    $row = $result->fetch();
    $retrieved_wishlist_count = $row['wishlist_count'];

    $query = "SELECT COUNT(ca.cart_id) AS cart_count
    FROM cart ca
    JOIN collection co ON ca.coll_id = co.coll_id
    JOIN customer c ON co.customer_id = c.customer_id
    WHERE c.customer_id = $customer_id;";
    $result =queryMysql($query);
    $row = $result->fetch();
    $retrieved_cart_count = $row['cart_count'];

    $_SESSION['wishlist_count'] = $retrieved_wishlist_count;
    $_SESSION['cart_count'] = $retrieved_cart_count;
  }
  else{
    if (!isset($_SESSION['wishlist'])) {
      $_SESSION['wishlist'] = array();}
    $_SESSION['wishlist_count'] = count($_SESSION['wishlist']);
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();}
    $_SESSION['cart_count'] = count($_SESSION['cart']);
  }
  


  if((!isset($_SESSION['cart_count'])) || ($_SESSION['cart_count'] == 0)){
    $cart_icon = "empty_cart.png";
  }
  else{
      $cart_icon = "full_cart.png";
  }  
  
  
  if (isset($_SESSION['wishlist_count'])){
      $wishlist_count = $_SESSION['wishlist_count'];
  }
  // else{ $wishlist_count = 0;}

  if (isset($_SESSION['cart_count'])){
      $cart_count = $_SESSION['cart_count'];
  }
  // else{ $cart_count = 0;}

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
                  <a  href="projectSignupPHPForm.php" class='title-link'>Sign-up</a>
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

  echo <<<_END
   <div id='top-nav-div'>
     <nav id='top-nav'>
       <ul class='clearfix nav-list'>
           <li class='nav-options'>
               <a href="projectCataloguePHPForm.php?cat=womens" class='nav-link'>Brides</a>
           </li>   
           <li class='nav-options'>
               <a href="projectCataloguePHPForm.php?cat=mens" class='nav-link'>Grooms</a>
           </li>
           <li class='nav-options'>
               <a href="projectCataloguePHPForm.php?cat=girls" class='nav-link'>Flower Girls</a>
           </li>
           <li class='nav-options'>
               <a href="projectCataloguePHPForm.php?cat=boys" class='nav-link'>Ring Bearers</a>
           </li>
           <li class='nav-options'>
               <a href="projectCataloguePHPForm.php?cat=traditional" class='nav-link'>Traditional</a>
           </li>
           <li class='nav-options'>
               <a href="projectCataloguePHPForm.php?cat=sales" class='nav-link'>On Sale</a>
           </li>
       </ul>
     </nav>
   </div>
 </header>
 _END;
?>