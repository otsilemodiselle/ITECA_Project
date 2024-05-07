<?php

    require_once 'functions.php';

    session_start();

    echo <<<_END
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!--<meta http-equiv="refresh" content="3" >-->
                <title>Float Example</title>
                <link rel="stylesheet" href="projectPHPStyles.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
            </head>
            <body> 
            <script>

            </script>
            <header>
            <div class='clearfix' id='top-title-div'>
                <img src="dance burgundy.png" class='title-icon'  alt="">
                <a class='title-home' href="projectIndexPHPForm.php">Bride & Joy</a>

    _END;

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

    <section class='container'>
      <div class='clearfix '>

        <nav class='nav-collections'>
              <ul class='collection-list'>
                  <li class='collection-option'>
                      <a href="" class='collection-link'>Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="projectCataloguePHPForm.php?cat=best_sellers" class='collection-link'>Best Sellers</a>
                  </li>
                  <li class='collection-option'>
                      <a href="projectCataloguePHPForm.php?cat=africa_ceremony" class='collection-link'>Africa Ceremony Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="projectCataloguePHPForm.php?cat=empire" class='collection-link'>Empire Dress Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="projectCataloguePHPForm.php?cat=butterfly" class='collection-link'>Butterfly Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="projectCataloguePHPForm.php?cat=lace" class='collection-link'>Lace Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="projectCataloguePHPForm.php?cat=classics" class='collection-link'>Classic Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="projectCataloguePHPForm.php?cat=sales" class='collection-link'>On Sale</a>
                  </li>
              </ul>
        </nav>

        <div class='main-carosel'>
            <div class="carousel">
                <div class="carousel_container">
                    <ul class="carousel_track">
                        <li class="carousel_slide current-slide">
                            <a href="">
                                <img src="carousel_1.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                            <a href="projectProductPHPForm.php?prod_id=30">
                                <img src="carousel_2.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                            <a href="projectProductPHPForm.php?prod_id=13">
                                <img src="carousel_3.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                            <a href="projectProductPHPForm.php?prod_id=41">
                                <img src="carousel_4.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                            <a href="projectProductPHPForm.php?prod_id=36">
                                <img src="carousel_5.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                        <a href="projectProductPHPForm.php?prod_id=9">
                            <img src="carousel_6.webp" alt="" class="carousel_img">
                        </a>
                        </li>
                    </ul>
                </div>
                <button class="carousel_button carousel_button--left is-hidden">&lt;</button>
                <button class="carousel_button carousel_button--right">&gt;</button>
                <div class="carousel_nav">
                    <button class="carousel_indicator current-slide"></button>
                    <button class="carousel_indicator"></button>
                    <button class="carousel_indicator"></button>
                    <button class="carousel_indicator"></button>
                    <button class="carousel_indicator"></button>
                    <button class="carousel_indicator"></button>
                </div>
            </div>
        </div>

        <div class='left-placart'>
            <a href="projectCataloguePHPForm.php?cat=africa_ceremony">
                <img src="shop_traditional.webp" class="promo_img_left">
                <p class= "promo_text_left">Shop Traditional <br> Shop Proudly SA<br><br><br></p>
            </a>
        </div>

        <div class='right-placart'>
            <p class="promo_text_right">Free Delivery <br> When You Spend <br> R1000 Or More<br><br></p>
            <img src="cargo-truck.png" class="promo_img_right">
        </div>

      </div>
    </section>

    <footer>
      <div class='end'>

      </div>
    </footer>

    <script src="carousel.js"></script>
    </body>
    </html>
  _END;

?>