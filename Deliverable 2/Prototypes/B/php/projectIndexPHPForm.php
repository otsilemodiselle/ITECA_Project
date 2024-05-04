<?php
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
  _END;

  if (isset($_SESSION['customer_id']))
  {
    $name = $_SESSION['forename'];
    $wishlist_count = $_SESSION['wishlist_count'];
    $cart_count = $_SESSION['cart_count'];

    echo <<<_END
    
    <header>
        <div class='clearfix' id='top-title-div'>
            <img src="dance burgundy.png" class='title-icon'  alt="">
            <a class='title-home' href:"index.html">Bride & Joy</a>
            <ul class='clearfix title-list'>
                <li class='title-options'>
                    <a href="" class='title-link'>Wishlist ($wishlist_count)</a>
                </li>
                <li class='title-options'>
                    <a href="" class='title-link'>Cart ($cart_count)</a>
                </li>
                <li class='title-options'>
                    <a href="" class='title-link'>Log Out</a>
                </li>
            </ul>
        </div>
  _END;
  }
  else
  {
    echo <<<_END
    <header>
      <div class='clearfix' id='top-title-div'>
          <img src="dance burgundy.png" class='title-icon'  alt="">
          <a class='title-home' href:"index.html">Bride & Joy</a>
          <ul class='clearfix title-list'>
              <li class='title-options'>
                  <a href="" class='title-link'>Login</a>
              </li>
              <li class='title-options'>
                  <a href="" class='title-link'>Sign-up</a>
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
                  <a href="" class='nav-link'>Brides</a>
              </li>   
              <li class='nav-options'>
                  <a href="" class='nav-link'>Grooms</a>
              </li>
              <li class='nav-options'>
                  <a href="" class='nav-link'>Flower Girls</a>
              </li>
              <li class='nav-options'>
                  <a href="" class='nav-link'>Ring Bearers</a>
              </li>
              <li class='nav-options'>
                  <a href="" class='nav-link'>Traditional</a>
              </li>
              <li class='nav-options'>
                  <a href="" class='nav-link'>On Sale</a>
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
                      <a href="" class='collection-link'>Best Sellers</a>
                  </li>
                  <li class='collection-option'>
                      <a href="" class='collection-link'>Africa Ceremony Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="" class='collection-link'>Empire Dress Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="" class='collection-link'>Butterfly Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="" class='collection-link'>Lace Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="" class='collection-link'>Classic Collection</a>
                  </li><li class='collection-option'>
                      <a href="" class='collection-link'>On Sale</a>
                  </li>
              </ul>
        </nav>

        <div class='main-carosel'>
            <div class="carousel">
                <div class="carousel_container">
                    <ul class="carousel_track">
                        <li class="carousel_slide current-slide">
                            <img src="carousel_1.webp" alt="" class="carousel_img">
                        </li>
                        <li class="carousel_slide">
                            <img src="carousel_2.webp" alt="" class="carousel_img">
                        </li>
                        <li class="carousel_slide">
                            <img src="carousel_3.webp" alt="" class="carousel_img">
                        </li>
                        <li class="carousel_slide">
                            <img src="carousel_4.webp" alt="" class="carousel_img">
                        </li>
                        <li class="carousel_slide">
                            <img src="carousel_5.webp" alt="" class="carousel_img">
                        </li>
                        <li class="carousel_slide">
                            <img src="carousel_6.webp" alt="" class="carousel_img">
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
        </div>

        <div class='right-placart'>
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