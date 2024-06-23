<?php
  
  require_once 'src/functions.php';
  require_once 'src/login.php';
 

  if(isset($_GET['prod_id']))
  {
    $clickedProduct = $_GET['prod_id'];
    $prodQuery = "SELECT prod_img, prod_name, prod_desc, price
                  FROM product
                  WHERE prod_id = $clickedProduct;";
    $prodResult = queryMysql($prodQuery);
    $row = $prodResult->fetch();
    $prod_img = $row['prod_img'];
    $prod_name = $row['prod_name'];
    $prod_desc = $row['prod_desc'];
    $prod_price = $row['price'];
  }

  if (isset($_SESSION['customer_id']))
  {
    $customer_id = $_SESSION['customer_id'];
    if((isset($_POST['btn-add-to-cart'])) && (isset($_POST['product_size'])))
    {
      
      $product_size = $_POST['product_size'];

      add_collection($pdo, $customer_id, $clickedProduct);
      $coll_id = latestPrimaryKey();

      $queryStock = "SELECT stock_id
                    FROM stock
                    WHERE prod_id = $clickedProduct
                    AND size = $product_size;";
      
      $resultStock = queryMysql($queryStock);

      if ($resultStock->rowCount())
      {
        $row = $resultStock->fetch();
        $stock_id = $row['stock_id'];
        add_cart($pdo, $coll_id, $stock_id);
      }
      unset($_POST['product_size']);
    }
    elseif(isset($_POST['btn-add-to-wishlist']))
    {
      add_collection($pdo, $customer_id, $clickedProduct);
        $coll_id = latestPrimaryKey();
    
        add_wishlist($pdo, $coll_id);
    }
  }
  else
  {
    if((isset($_POST['btn-add-to-cart'])) && (isset($_POST['product_size'])) )
    { 
      $product_size = $_POST['product_size'];
      $queryStock = "SELECT stock_id
                FROM stock
                WHERE prod_id = '$clickedProduct' AND size = '$product_size';";
      
      $resultStock = queryMysql($queryStock);
      
      if ($resultStock->rowCount())
      {
        $row = $resultStock->fetch();
        $stock_id = $row['stock_id'];
        $_SESSION['cart'][] = $stock_id;
      }
      
      unset($_POST['product_size']);
    }
    elseif(isset($_POST['btn-add-to-wishlist']))
    {
      
      $_SESSION['wishlist'][] = $clickedProduct;
    }
  }

  require_once 'src/header.php';

  echo <<<_END
  <main>
    <section class="section-product">

      <div class="product-container">

        <div class="product-photoframe-box">
          <img src="images/$prod_img" alt="" class="product-img">
        </div>

        <div class="product-details-box1">

          <p class="product-title">$prod_name</p>

          <div class="product-socials-box">
            <a href="">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </div>

          <p class="product-price">R$prod_price</p>

        </div>

        <div class="product-details-box2">
          <p class="product-description">$prod_desc</p>
        </div>

        <div class="product-details-box3">

          <p class="product-price">Pick a size before adding to cart.</p>
  _END;

   $querySizes = "SELECT DISTINCT size
              FROM stock
              WHERE prod_id = $clickedProduct;";
    
    $sizesResult = queryMysql($querySizes);

    $arrAvailableSizes = array();

    while ($row = $sizesResult->fetch())
    {
      $arrAvailableSizes[] = $row['size'];
    }

    echo <<<_END
      <form id="form-product-submit" method="post" action="product.php?prod_id=$clickedProduct">
        <div>
      
    _END;

      foreach ($arrAvailableSizes as $size)
      {
        echo <<<_END
          <input type="radio" id="size-$size" value="$size" name="product_size">
          <label for="size-$size">$size</label>
        _END;
      }

    echo <<<_END
    </div>

        <div class="product-actions-box">
          <button class="btn-product-cart btn-product" name="btn-add-to-cart" onclick="document.getElementById('form-product-submit').submit()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            Add to Cart
          </button>
          <button name="btn-add-to-wishlist" class="btn-product-wishlist btn-product" onclick="document.getElementById('form-product-submit').submit()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
            Add to Wishlist
          </button>
        </div>
        

      </form>
      

    </section>
  </main>
  _END;

  require_once 'src/footer.php';