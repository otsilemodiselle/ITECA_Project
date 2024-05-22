<?php
   require_once 'src/functions.php';

   session_start();

  if (isset($_POST['prod_id']))
  {
    $prod_id = $_POST['prod_id'];
    $size = $_POST['sizes'];
      
    if(isset($_SESSION['customer_id']))
    {
      if( (isset($_POST['cartButton'])) && (isset($_POST['sizes'])) )
      {

        $customer_id = $_SESSION['customer_id'];
      
        add_collection($pdo, $customer_id, $prod_id);
        $coll_id = latestPrimaryKey();
    
        $query = "SELECT stock_id
                  FROM stock
                  WHERE prod_id = '$prod_id' AND size = '$size';";
        
        $result = queryMysql($query);

        if ($result->rowCount())
        {
          $row = $result->fetch();
          $stock_id = $row['stock_id'];
          add_cart($pdo, $coll_id, $stock_id);
        }
        unset($_POST['sizes']);
        
      }
      elseif(isset($_POST['wishlistButton']))
      {
        $customer_id = $_SESSION['customer_id'];

        add_collection($pdo, $customer_id, $prod_id);
        $coll_id = latestPrimaryKey();
    
        add_wishlist($pdo, $coll_id);
      }
    }
    else
    {
      if((isset($_POST['cartButton'])) && (isset($_POST['sizes'])) )
      {    
        $query = "SELECT stock_id
                  FROM stock
                  WHERE prod_id = '$prod_id' AND size = '$size';";
        
        $result = queryMysql($query);
        
        if ($result->rowCount())
        {
          $row = $result->fetch();
          $stock_id = $row['stock_id'];
          $_SESSION['cart'][] = $stock_id;
        }
        
        unset($_POST['sizes']);
      }
      elseif(isset($_POST['wishlistButton']))
      {
        
        $_SESSION['wishlist'][] = $prod_id;
      }
    }
  }

   require_once 'src/above_nav_content.php';

   echo <<<_END
   <script>
     function sizeCheck() {
         var selectElement = document.getElementsByName("sizes")[0];
         var cartButton = document.getElementsByClassName("cart-button")[0];
 
         if (selectElement.selectedIndex === 0 && selectElement.value === "") {
             cartButton.disabled = true;
         } else {
             cartButton.disabled = false;
         }
     }
   </script>
   _END; 

  if(isset($_GET['prod_id']) || isset($_SESSION['clicked_product']))
 {
    $clickedProduct = $_GET['prod_id'];
    $_SESSION['clicked_product'] = $clickedProduct;

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
        <img src="images/img/$prod_img" alt="" class="prod-img">
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
      <form method="post" action="product.php?prod_id=$prod_id">
        <div class="prod-action-div">
        <label for="sizes-list" class="sizes-label">Size</label>
        <select name="sizes" id="sizes-list" onchange="sizeCheck()">
    _END;

    foreach ($arrAvailableSizes as $size){
      echo '<option value='.$size.'>'.$size.'</option>';
    }

    echo <<<_END
        </select>
        <input type="hidden" name="prod_id" value=$prod_id>
        <input type="hidden" name="customer_id" value=$customer_id>
        <input type="submit" class="cart-button gray-button" value="Add to Cart" name="cartButton" disabled>
        <input type="submit" class="wishlist-button gray-button" value="Add to Wishlist" name="wishlistButton">
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