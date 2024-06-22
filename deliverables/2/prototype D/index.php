<?php
  
  require_once 'src/functions.php';
  require_once 'src/login.php';
  require_once 'src/header.php';

  echo <<<_END
    <main>
        
        <section class="section-categories">

          <div class="categories">
            
            <figure class="figure-categories">
              <a href="src/src/catalog_fetch.php?cat=womens">
                <img class="categories" src="images/ornate_empire_traditional_lace.webp" alt="">
              </a>
              <figcaption>Bride Dresses</figcaption>
            </figure>
          
          
            <figure class="figure-categories">
              <a href="src/catalog_fetch.php?cat=mens">
                <img src="images/double_breasted_tangerine_groom.webp" alt="">
              </a>
              <figcaption>Groom Suits</figcaption>
            </figure>
          
          
            <figure class="figure-categories">
              <a href="src/catalog_fetch.php?cat=girls">
                <img src="images/zulu_royal_ring_bearer.webp" alt="">
              </a>
              <figcaption>Flower Girl Dresses</figcaption>
            </figure>
          
          
            <figure class="figure-categories">
              <a href="src/catalog_fetch.php?cat=boys">
                <img src="images/miniature_sabbath_suit.webp" alt="">
              </a>
              <figcaption>Ring Bearer Suits</figcaption>
            </figure>
            
          </div>

        </section>

        <section class="section-traditional">

          <div class="banner-traditional" role="img">
            Shop Local Shop Proudly SA       
            
          </div>

          <div class="mini-catalog-traditional grid grid--7-cols ">
  _END;

  
  $arrTraditional = ['1','43','27','45','47','44'];
  for ($i = 0; $i <= 5; $i++){
    $card_prod_id = $arrTraditional[$i];
    $cardInfo = cardLoader($card_prod_id);
    $cardProdName = trimString($cardInfo['prod_name'], 20);

    echo <<<_END
    <a href="">
      <div class="shopping-card">
        <div class="shopping-card-photoframe">
          <img src="images/{$cardInfo['prod_img']}" alt="">
        </div>
        <div class="shopping-card-details">
          <label>$cardProdName</label> 
        </div>
        <div class="shopping-card-price">
          <label for="">R{$cardInfo['price']}</label>
          <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>

          </button>
        </div>
      </div>          
    </a>
    _END;
  }

  echo <<<_END
    <div class="shop-more shop-more-traditional-box">
              <a class="btn-shop-more " href="src/catalog_fetch.php?cat=traditional">View All &rarr;</a> 
            </div>

          </div>

        </section>

        <section class="section-sales">

          <div class="mini-catalog-sales grid grid--7-cols">

            <div class="shop-more shop-more-sales-box">
              <a class="btn-shop-more" href="src/catalog_fetch.php?cat=sales">&larr; View All </a> 
            </div>
  _END;

  $arrSales = ['28','41','39'];
  for ($i = 0; $i <= 2; $i++){
    $card_prod_id = $arrSales[$i];
    $cardInfo = cardLoader($card_prod_id);
    $cardProdName = trimString($cardInfo['prod_name'], 20);

    echo <<<_END
      <a href="">
        <div class="shopping-card on-sale">
          <div class="shopping-card-photoframe">
            <img src="images/{$cardInfo['prod_img']}" alt="">
          </div>
          <div class="shopping-card-details">
            <label>$cardProdName</label> 
          </div>
          <div class="shopping-card-price">
            <label for="">R{$cardInfo['price']}</label>
            <button>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
              </svg>

            </button>
          </div>
        </div>          
      </a>
    _END;
  }

  echo <<<_END
    <figure class="figure-sales mid-end">
              <a href="">
                <img src="images/velvet_ballerina_bride.webp" alt="">
              </a>
            </figure>

          </div>

        </section>

        <section class="section-empire">

          <div class="mini-catalog-empire grid grid--7-cols">

            <figure class="figure-empire start-mid">
              <a href="">
                <img src="images/ornate_empire_waist_fairy_sleeveless.webp" alt="">
              </a>
              <figcaption>Best Seller Empire Dresses</figcaption>
            </figure>
  _END;


  $arrEmpire = ['34','19','29'];
  for ($i = 0; $i <= 2; $i++){
    $card_prod_id = $arrEmpire[$i];
    $cardInfo = cardLoader($card_prod_id);
    $cardProdName = trimString($cardInfo['prod_name'], 20);

    echo <<<_END
      <a href="">
        <div class="shopping-card">
          <div class="shopping-card-photoframe">
            <img src="images/{$cardInfo['prod_img']}" alt="">
          </div>
          <div class="shopping-card-details">
            <label>$cardProdName</label> 
          </div>
          <div class="shopping-card-price">
            <label for="">R{$cardInfo['price']}</label>
            <button>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
              </svg>

            </button>
          </div>
        </div>          
      </a>
    _END;
  }

  echo <<<_END
    <div class="shop-more shop-more-empire-box">
              <a class="btn-shop-more" href="src/catalog_fetch.php?cat=empire">View All &rarr;</a> 
            </div>

          </div>

        </section>

        <section class="section-euro-suits">

          <div class="mini-catalog-euro-suits grid grid--7-cols">

            <div class="shop-more shop-more-euro-suits-box">
              <a class="btn-shop-more" href="src/catalog_fetch.php?cat=mens">&larr; View All </a> 
            </div>
  _END;

  $arrEuro = ['6','10','35'];
  for ($i = 0; $i <= 2; $i++){
    $card_prod_id = $arrEuro[$i];
    $cardInfo = cardLoader($card_prod_id);
    $cardProdName = trimString($cardInfo['prod_name'], 20);

    echo <<<_END
      <a href="">
        <div class="shopping-card">
          <div class="shopping-card-photoframe">
            <img src="images/{$cardInfo['prod_img']}" alt="">
          </div>
          <div class="shopping-card-details">
            <label>$cardProdName</label> 
          </div>
          <div class="shopping-card-price">
            <label for="">R{$cardInfo['price']}</label>
            <button>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
              </svg>

            </button>
          </div>
        </div>          
      </a>
    _END;
  }

  echo <<<_END
    <figure class="figure-euro-suits mid-end">
              <a href="">
                <img src="images/steel_blue_sports_suit.webp" alt="">
              </a>
              <figcaption>Classic Euro Groom Suits</figcaption>
            </figure>

          </div>

        </section>
  _END;

  require_once 'src/footer.php';
?>