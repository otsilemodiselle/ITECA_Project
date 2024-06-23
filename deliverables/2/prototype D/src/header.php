<?php
  require_once 'functions.php';

  
  // Test if user is logged in
  if (isset($_SESSION['customer_id'])){ 

    // query database for amount of items saved in wishlist
    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT COUNT(w.wish_id) AS wishlist_count
    FROM wishlist w
    JOIN collection co ON w.coll_id = co.coll_id
    JOIN customer c ON co.customer_id = c.customer_id
    WHERE c.customer_id = $customer_id;";
    $result =queryMysql($query);
    $row = $result->fetch();
    $retrieved_wishlist_count = $row['wishlist_count'];

    // query database for amount of items saved in cart
    $query = "SELECT COUNT(ca.cart_id) AS cart_count
    FROM cart ca
    JOIN collection co ON ca.coll_id = co.coll_id
    JOIN customer c ON co.customer_id = c.customer_id
    WHERE c.customer_id = $customer_id;";
    $result =queryMysql($query);
    $row = $result->fetch();
    $retrieved_cart_count = $row['cart_count'];

    // hand over wishlist and cart counts of logged in user to session variables
    $_SESSION['wishlist_count'] = $retrieved_wishlist_count;
    $_SESSION['cart_count'] = $retrieved_cart_count;
  }

  // if user is not logged in, create temp wishlist array for carrying items
  else{
    if (!isset($_SESSION['wishlist'])) {
      $_SESSION['wishlist'] = array();}

    // if temp wishlist array already exists, count items held into session variable
    $_SESSION['wishlist_count'] = count($_SESSION['wishlist']);

    // if user is not logged in, create temp cart array for carrying items
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();}

    // if temp cart array already exists, count items held into session variable
    $_SESSION['cart_count'] = count($_SESSION['cart']);
  }

  // assign wishlist count to display variable for header
  if (isset($_SESSION['wishlist_count'])){
      $wishlist_count = $_SESSION['wishlist_count'];
  }

  // assign cart count to display variable for header
  if (isset($_SESSION['cart_count'])){
      $cart_count = $_SESSION['cart_count'];
  }

  echo <<<_END
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/universal.css">
      <link rel="stylesheet" href="css/header-styles.css">
      <link rel="stylesheet" href="css/main-styles.css">
      <link rel="stylesheet" href="css/footer-styles.css">
      <link rel="stylesheet" href="css/login_modal.css">
      <link rel="stylesheet" href="css/signup_modal.css">
      <link rel="stylesheet" href="css/product.css">
      <link rel="stylesheet" href="css/catelog.css">
      <link rel="stylesheet" href="css/cart.css">
      <link rel="stylesheet" href="css/checkout.css">
      <link rel="stylesheet" href="css/payment_method_modal.css">
      <link rel="stylesheet" href="css/address_modal.css">
      <link rel="stylesheet" href="css/carousel.css">
      <link rel="stylesheet" href="css/tablet_media_queries.css">
      <link rel="stylesheet" href="css/phone_media_queries.css">
      <link rel="stylesheet" href="css/wishlist.css">
      <title>Bride&Joy</title>
    </head>

    <body>

      <header>

        <nav>
          <div class="burger-box">
            <button class="btn-burger">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg> 
            </button>
          </div>

          <div class="logo-box">
            <a href="index.php">
              <span class="logo-a">Bride</span>
              <span class="logo-b">&</span>
              <span class="logo-c">Joy</span>
            </a>
          </div>

          <div class="category-box">
            <ul class="category-links-list">
              <li>
                <a class="link-womens" href="src/catalog_fetch.php?cat=womens">Womens</a>
              </li>
              <li>
                <a class="link-mens" href="src/catalog_fetch.php?cat=mens">Mens</a>
              </li>
              <li>
                <a class="link-girls" href="src/catalog_fetch.php?cat=girls">Girls</a>
              </li>
              <li>
                <a class="link-boys" href="src/catalog_fetch.php?cat=boys">Boys</a>
              </li>
            </ul>
          </div>

          <div class="search-box">
            <input class="searchbar" type="text" placeholder="Search "/>    
            <button class="btn-search">
              <svg class="icon-search" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
              </svg>
            </button>  
          </div>

          <div class="indicators-box">
            <ul class="indicators-list">
              <li>
                <a href="cart.php">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                  </svg>
                  <span class="cart-counter">$cart_count</span>
                </a>
              </li>
              <li>
                <a href="wishlist.php">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                  </svg>
                  <span class="wishlist-counter">$wishlist_count</span>
                </a>
              </li>
            </ul>
          </div>
  _END;

  if (isset($_SESSION['customer_id']))
  {
    $login_name=$_SESSION['forename'];
    echo <<<_END
      <div class="utility-box">
          <ul class="utility-links-list">
            <li>
              <a class="link-profile" href="#">$login_name's Profile</a>
            </li>
            <li>
              <a class="link-signup" id="open-signup-modal" href="src/logout.php">Log-out</a>
            </li>
          </ul>
        </div>
      </nav>
    _END;
  }
  else
  {
    echo <<<_END
        <div class="utility-box">
          <ul class="utility-links-list">
            <li>
              <a class="link-login" id="open-login-modal" href="#">Login</a>
            </li>
            <li>
              <a class="link-signup" id="open-signup-modal" href="#">Sign-up</a>
            </li>
          </ul>
        </div>
      </nav>
    _END;
  }



  echo <<<_END
    <div class="sub-menu">

        <ul class="sub-menu-links-list">
          <li>
            <a class="link-womens" href="src/catalog_fetch.php?cat=womens">Womens</a>
          </li>
          <li>
            <a class="link-mens" href="src/catalog_fetch.php?cat=mens">Mens</a>
          </li>
          <li>
            <a class="link-girls" href="src/catalog_fetch.php?cat=girls">Girls</a>
          </li>
          <li>
            <a class="link-boys" href="src/catalog_fetch.php?cat=boys">Boys</a>
          </li>
  _END;
  
  if (isset($_SESSION['customer_id']))
  {
    
    $login_name=$_SESSION['forename'];
    echo <<<_END
      <li>
            <a class="link-profile" href="#">$login_name's Profile</a>
          </li>
          <li>
            <a class="link-logout" href="src/logout.php">Log-out</a>
          </li>
  _END;
  }
  else
  {
    echo <<<_END
      <li>
            <a class="link-login" id="open-login-modal-sub" href="#">Login</a>
          </li>
          <li>
            <a class="link-signup" id="open-signup-modal-sub" href="#">Sign-up</a>
          </li>
  _END;
  }
  
  echo <<<_END
        </ul>
      </div>
    </header>
  _END;
?>