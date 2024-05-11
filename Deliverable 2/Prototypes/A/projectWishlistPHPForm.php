<?php
  require_once 'functions.php';

  session_start();

  if (isset($_POST['wishlist-action']))
  {
    $action = $_POST['wishlist-action'];

      switch ($action)
      {
        case 'Delete':
          $prod_id = ($_POST['prod_id']);
          if(isset($_SESSION['customer_id']))
          {
            $customer_id = $_SESSION['customer_id'];
            $query = "SELECT coll_id
                    FROM collection
                    WHERE customer_id = $customer_id AND prod_id = $prod_id;";
            
            $result = queryMysql($query);

            $row = $result->fetch();
            $coll_id = $row['coll_id'];

            $queryDeleteInCollection = "DELETE FROM collection WHERE coll_id = $coll_id;";
            queryMysql($queryDeleteInCollection);          
          }
          else
          {
            if (isset($_SESSION['wishlist']))
            {
              $count = count($_SESSION['wishlist']);
              for ($i = 0; $i < $count; ++$i)
              {
                if (isset($_SESSION['wishlist'][$i]) && $_SESSION['wishlist'][$i] == $prod_id)
                {
                  unset($_SESSION['wishlist'][$i]);
                }
              }
            }
            
          }
          
          unset($_POST['wishlist-action']);
          break;

        case 'Add to Cart':
          $prod_id = ($_POST['prod_id']);
          header("Location: projectProductPHPForm.php?prod_id=$prod_id");
          exit;
          unset($_POST['wishlist-action']);
          break;
        
      }
  }

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
    
    if ($result->rowCount())
    {
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
            <div class='wishlist-banner clearfix'>
              <img src="Images/img/$prod_img" alt="" class="small-thumbnail">
              <p class="prod-price-panel">R$price</p> 
              <p class="prod-name-panel">$prod_name</p>
              <input type="hidden" name="prod_id" value="$prod_id">
              <input type="submit" name="wishlist-action" class="wish-delete" value="Delete">
              <input type="submit" name="wishlist-action" class="wish-cart" value="Add to Cart">
            </div>
        </form>
        _END;
      }

      echo<<<_END
      </div>
      </section>
      _END;
    }
    else
    {
      echo<<<_END
      </div>
      </section>
      _END;
    }
  }
  else
  {
    if(isset($_SESSION['wishlist']))
    {
      foreach($_SESSION['wishlist'] as $prod_id)
      {
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
            <div class='wishlist-banner clearfix'>
              <img src="Images/img/$prod_img" alt="" class="small-thumbnail">
              <p class="prod-price-panel">R$price</p> 
              <p class="prod-name-panel">$prod_name</p>
              <input type="hidden" name="prod_id" value="$prod_id">
              <input type="submit" name="wishlist-action" class="wish-delete" value="Delete">
              <input type="submit" name="wishlist-action" class="wish-cart" value="Add to Cart">
            </div>
        </form>
        _END;
      }

      echo<<<_END
      </div>
      </section>
      _END;
    }
  }

  echo<<<_END
  <footer>
        <div class='end'>
            
        </div>
    </footer>
  </body>
  </html>
  _END;
?>