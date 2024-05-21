<?php
  require_once 'functions.php';

  session_start();

  $invoiceTotal = 0;
  $itemsCount = 0;

  if (isset($_POST['cart-action']))
  {
    $action = $_POST['cart-action'];

      switch ($action)
      {
        case 'Delete':
          $prod_id = ($_POST['prod_id']);
          $price = ($_POST['price']);
          $stock_id = ($_POST['stock_id']);
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
            $invoiceTotal -= $price;
            $itemsCount--;  
          }
          else
          {
            $i = 0;
            if (isset($_SESSION['cart']))
            {
              $count = count($_SESSION['cart']);
              for ($i = 0; $i < $count; ++$i)
              {
                if (isset($_SESSION['cart'][$i]) && $_SESSION['cart'][$i] == $stock_id)
                {
                  unset($_SESSION['cart'][$i]);
                  $invoiceTotal -= $price;
                  $itemsCount--; 
                }
              }
            }
            
          }
          
          unset($_POST['cart-action']);
          break;
      }
  }

  $invoiceTotal = 0;
  $itemsCount = 0;

  require_once 'above_nav_content.php';

  echo <<<_END
  <section class='clearfix container'>
        <div class="section-header">
            <h3 class="cat-heading">Cart</h3>
        </div>
        <div class='cart-container'>
  _END;

  if(isset($_SESSION['customer_id']))
  {
    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT p.prod_id, p.prod_img, p.prod_name, p.price, st.size, st.stock_id
              FROM product p
              JOIN collection co ON p.prod_id = co.prod_id
              JOIN cart ca ON co.coll_id = ca.coll_id
              JOIN stock st ON ca.stock_id = st.stock_id
              JOIN customer c ON co.customer_id = c.customer_id
              WHERE c.customer_id = $customer_id;";
    $result = queryMysql($query);
    
    if ($result->rowCount())
    {
      while ($row = $result->fetch())
      {
        $prod_id = $row['prod_id'];
        $prod_img = $row['prod_img'];
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $stock_id = $row['stock_id'];
        $size = $row['size'];
        $invoiceTotal += $price;
        $itemsCount++;

        echo<<<_END
        <form method="post" action="projectCartPHPForm.php">
        <div class='cart-banner clearfix'>
          <img src="Images/img/$prod_img" alt="" class="small-thumbnail">
          <p class="prod-price-panel">R$price</p> 
          <p class="prod-name-panel">$prod_name - Size: $size</p>
          <input type="hidden" name="prod_id" value="$prod_id">
          <input type="hidden" name="price" value="$price">
          <input type="hidden" name="stock_id" value="$stock_id">
          <input type="submit" name="cart-action" class="cart-delete button" value="Delete">
        </div>
        </form>   
        _END;
      }
    }
  }
  else
  {
    if(isset($_SESSION['cart']))
    {
      foreach($_SESSION['cart'] as $stock_id)
      {
        $queryProdData =  "SELECT p.prod_img, p.prod_name, p.price, p.prod_id, s.size
                          FROM product p
                          JOIN stock s ON p.prod_id = s.prod_id
                          WHERE s.stock_id = $stock_id;";
        $prodDataResult = queryMysql($queryProdData);

        $row = $prodDataResult->fetch();
        $prod_img = $row['prod_img'];
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $prod_id = $row['prod_id'];
        $size = $row['size'];
        $invoiceTotal += $price;
        $itemsCount++;

        echo<<<_END
        <form method="post" action="projectCartPHPForm.php">
        <div class='cart-banner clearfix'>
          <img src="Images/img/$prod_img" alt="" class="small-thumbnail">
          <p class="prod-price-panel">R$price</p> 
          <p class="prod-name-panel">$prod_name - Size: $size</p>
          <input type="hidden" name="stock_id" value="$stock_id">
          <input type="hidden" name="prod_id" value="$prod_id">
          <input type="hidden" name="price" value="$price">
          <input type="submit" name="cart-action" class="cart-delete button" value="Delete">
        </div>
        </form>  
        _END;
      }
    }
  }

  if ($invoiceTotal <= 0 || $itemsCount <= 0)
  {
    echo <<<_END
    </div>
    </div>
    <div class="clearfix cart-manager">
      <p class="cart-summary">
          $itemsCount Item(s)  Total: R$invoiceTotal
      </p>
    </div>
    </section>
    <footer>
      <div class='end'>
          
      </div>
    </footer>
    </body>
    </html>
    _END;
  }
  else
  {
    echo <<<_END
    </div>
    </div>
    <div class="clearfix cart-manager">
    <form method="post" action="checkout.php">
        <p class="cart-summary">
            $itemsCount Item(s)  Total: R$invoiceTotal
        </p>
        <input type="hidden" name="invoice_total" value="$invoiceTotal">
        <input type="hidden" name="items_Count" value="$itemsCount">
        <input type="submit" class="cart-checkout button" name="checkout" value="Checkout">
        </form>
    </div>
    </section>
    <footer>
      <div class='end'>
          
      </div>
    </footer>
    </body>
    </html>
    _END;
  }

  