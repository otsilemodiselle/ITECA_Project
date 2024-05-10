<?php
  require_once 'functions.php';

  session_start();

  require_once 'above_nav_content.php';

  echo<<<_END
  <section class='clearfix container'>
        <div class="section-header">
            <h3 class="cat-heading">Wishlist</h3>
        </div>
        <div class='wish-container'>
  _END;

  if(isset($_SESSION['customer_id']))
  {
    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT prod_id
              FROM collection co
              JOIN wishlist w ON co.coll_id = w.coll_id
              JOIN customer c ON co.customer_id = c.customer_id
              WHERE c.customer_id = $customer_id;";
    $result = queryMysql($query);
    
    while ($row = $result->fetch())
    {
      $prod_id = $row['prod_id'];

      $queryProdData =  "SELECT prod_img, prod_name, price
                        FROM product
                        WHERE prod_id = $prod_id;";
      $prodDataResult = queryMysql($queryProdData);

      $row = $prodDataResult->fetch();
      $prod_img = $row['prod_img'];
      $prod_name = $row['prod_name'];
      $price = $row['price'];

      echo<<<_END
      <form method="post" action="projectWishlistPHPForm.php">
        <input type="hidden" name="prod_id" value="$prod_id>
        <a href="projectProductPHPForm.php?prod_id=$prod_id">
          <div class='wishlist-banner clearfix'>
            <img src="Images/img/$prod_img" alt="" class="small-thumbnail">
            <input class="panel-selection" type="checkbox">
            <p class="prod-price-panel">$price</p> 
            <p class="prod-name-panel">$prod_name</p>
            <input type="submit" name="wish-delete" class="wish-delete" value="Delete">
          </div>
        </a>
      </form>
      _END;
    }
  }
  else
  {

  }

  echo<<<_END
  </div>
  <button class="wish-clear">
      Clear Wishlist
  </button>
  <button class="wish-delete-selection">
      Delete Selected
  </button>
  <button class="wish-go-to-cart">
      Go to Cart
  </button>
  </section>
  _END;

  echo<<<_END
  <footer>
        <div class='end'>
            
        </div>
    </footer>
  </body>
  </html>
  _END;
?>