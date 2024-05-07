<?php

    require_once 'functions.php';

    session_start();

    require_once 'above_nav_content.php';
   
    echo <<<_END

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