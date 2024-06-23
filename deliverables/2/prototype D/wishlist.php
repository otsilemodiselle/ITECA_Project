<?php
  
  require_once 'src/functions.php';
  require_once 'src/login.php';
  require_once 'src/header.php';

  echo <<<_END
   <main>

    <section class="section-wishlist">

      <div class="wishlist-header">
        <p>Wishlist</p>
      </div>

      <div class="wishlist-container">

        <div class="wishlist-full">

          <div class="wishlist-items-container">

            <div class="wishlist-item">
              <div class="wishlist-item-photocase">
                <img src="steel_blue_sports_suit.webp" alt="">
              </div>

              <a href="">&times;
              </a>

              <p class="wishlist-item-title">Velit ipsum autem</p>

              <p class="wishlist-item-size">M</p>

              <p class="wishlist-item-price">R4299</p>
            </div>

            <div class="wishlist-item">
              <div class="wishlist-item-photocase">
                <img src="ornate_empire_traditional_lace.webp" alt="">
              </div>

              <a class="wishlist-item-remover">&times;</a>

              <p class="wishlist-item-title">Velit ipsum autem</p>

              <p class="wishlist-item-size">S</p>

              <p class="wishlist-item-price">R4299</p>
            </div>


          </div>

        </div>

        <div class="wishlist-empty">
          <p>wishlist is empty</p>

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
          </svg>

        </div>

      </div>

    </section>
    </main>
  _END;

    require_once 'src/footer.php';
?>

