<?php
   require_once 'functions.php';

   session_start();

   require_once 'above_nav_content.php';

 if(isset($_GET['prod_id']))
 {
    $clickedProduct = $_GET['prod_id'];

    $prod_id = $clickedProduct;

    $query =  "SELECT prod_name, price, prod_desc, prod_img
              FROM product
              WHERE prod_id = '$prod_id';";

    $result = queryMysql($query);

    $row = $result->fetch();

    $prod_name = $row['prod_name'];
    $price = $row['price'];
    $prod_desc = $row['prod_desc'];
    $prod_img = $row['prod_img'];

    echo <<<_END
    <section class='container'>
    <div class='clearfix prod-container'>
        <img src="Images/img/$prod_img" alt="" class="prod-img">
        <div class="prod-header-div">
            <h3 class="prod-heading">
                $prod_name
            </h3>
        </div>
        <div class="prod-desc-div">
            <p class="description">
                $prod_desc
            </p>
            <h3 class="price">
                R$price
            </h3>
        </div>
    _END;

    $query = "SELECT DISTINCT size
              FROM stock
              WHERE prod_id = $prod_id";
    
    $result = queryMysql($query);

    $arrAvailableSizes = array();
    $arrAvailableSizes[] = "";

    while ($row = $result->fetch())
    {
      $arrAvailableSizes[] = $row['size'];
    }

    echo <<<_END
      <form>
        <div class="prod-action-div">
        <label for="sizes-list" class="sizes-label">Size</label>
        <select name="Sizes" id="sizes-list">
    _END;

    foreach ($arrAvailableSizes as $size){
      echo '<option value='.$size.'>'.$size.'</option>';
    }

    echo <<<_END
        </select>
        <button class="cart-button">Add to Cart</button>
        <button class="wishlist-button">Add to Wishlist</button>
      </form>
      </div>
        <div class="prod-socials-div">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-pinterest"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>
      </div>            
    _END;
  }

 
  echo <<<_END
 
  </section>

  <footer>
      <div class='end'>
          
      </div>
  </footer>
  </body>
  </html>
 _END;


?>