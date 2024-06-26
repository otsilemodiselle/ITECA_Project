<?php

    require_once 'src/functions.php';

    session_start();

    require_once 'src/above_nav_content.php';
   
    echo <<<_END

    <section class='container'>
      <div class='clearfix '>

        <nav class='nav-collections'>
              <ul class='collection-list'>
                  <li class='collection-option'>
                      <a href="#" class='collection-link'>Collections</a>
                  </li>
                  <li class='collection-option'>
                      <a href="catalogue.php?cat=best_sellers" class='collection-link'>Best Sellers</a>
                  </li>
                  <li class='collection-option'>
                      <a href="catalogue.php?cat=africa_ceremony" class='collection-link'>Africa Ceremony Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="catalogue.php?cat=empire" class='collection-link'>Empire Dress Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="catalogue.php?cat=butterfly" class='collection-link'>Butterfly Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="catalogue.php?cat=lace" class='collection-link'>Lace Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="catalogue.php?cat=classics" class='collection-link'>Classic Collection</a>
                  </li>
                  <li class='collection-option'>
                      <a href="catalogue.php?cat=sales" class='collection-link'>On Sale</a>
                  </li>
              </ul>
        </nav>

        <div class='main-carosel'>
            <div class="carousel">
                <div class="carousel_container">
                    <ul class="carousel_track">
                        <li class="carousel_slide current-slide">
                            <a href="#">
                                <img src="images/carousel_1.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                            <a href="product.php?prod_id=30">
                                <img src="images/carousel_2.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                            <a href="product.php?prod_id=13">
                                <img src="images/carousel_3.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                            <a href="product.php?prod_id=41">
                                <img src="images/carousel_4.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                            <a href="product.php?prod_id=36">
                                <img src="images/carousel_5.webp" alt="" class="carousel_img">
                            </a>
                        </li>
                        <li class="carousel_slide">
                        <a href="product.php?prod_id=9">
                            <img src="images/carousel_6.webp" alt="" class="carousel_img">
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
            <a href="catalogue.php?cat=africa_ceremony">
                <img src="images/shop_traditional.webp" class="promo_img_left">
                <p class= "promo_text_left">Shop Traditional <br> Shop Proudly SA<br><br><br></p>
            </a>
        </div>

        <div class='right-placart'>
            <p class="promo_text_right">Free Delivery <br> When You Spend <br> R1000 Or More<br><br></p>
            <img src="images/cargo-truck.png" class="promo_img_right">
        </div>

      </div>
    </section>

    <footer>
      <div class='end'>

      </div>
    </footer>

    <script src="js/carousel.js"></script>
    </body>
    </html>
  _END;

?>