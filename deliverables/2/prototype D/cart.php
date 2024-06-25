<?php
  
  require_once 'src/functions.php';
  require_once 'src/login.php';

  $invoiceTotal = 0;
  $itemsCount = 0;

  if(isset($_POST['delete-item']))
  {
      $prod_id = ($_POST['prod_id']);
      $price = ($_POST['price']);
      $stock_id = ($_POST['stock_id']);

      if(isset($_SESSION['customer_id']))
      {
        $customer_id = $_SESSION['customer_id'];
        $query = "SELECT coll_id
                  FROM collection
                  WHERE customer_id = $customer_id 
                  AND prod_id = $prod_id;";

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
  }

  $invoiceTotal = 0;
  $itemsCount = 0;

  require_once 'src/header.php';

  echo <<<_END
   <main>
    
    <section class="section-cart">

    <div class="cart-container">
  _END;

  if($cart_count > 0)
  {
    if(isset($_SESSION['customer_id']))
    {
      echo <<<_END
            <div class="cart-full">

              <div class="cart-items-container">
      _END;

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

            echo <<<_END
            <form method="post" action="cart.php" id="cart-item-form">
                <div class="cart-item">
                  <div class="cart-item-photocase">
                    <img src="images/$prod_img" alt="" onclick="">
                  </div>

                  <input id="cart-remover" type="submit" name="delete-item" value="&times;">

                  <p class="cart-item-title">$prod_name</p>

                  <p class="cart-item-size">$size</p>

                  <p class="cart-item-price">R$price</p>
                  <input type="hidden" name="prod_id" value="$prod_id">
                  <input type="hidden" name="price" value="$price">
                  <input type="hidden" name="stock_id" value="$stock_id">
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
        echo <<<_END
            <div class="cart-full">

              <div class="cart-items-container">
        _END;
        
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
            <form method="post" action="cart.php" id="cart-item-form">
                  <div class="cart-item">
                    <div class="cart-item-photocase">
                      <img src="images/$prod_img" alt="" onclick="">
                    </div>

                    <input id="cart-remover" type="submit" name="delete-item" value="&times;">

                    <p class="cart-item-title">$prod_name</p>

                    <p class="cart-item-size">$size</p>

                    <p class="cart-item-price">R$price</p>
                    <input type="hidden" name="prod_id" value="$prod_id">
                    <input type="hidden" name="price" value="$price">
                  </div>
              </form>
          _END;
        }
      }
    }
    echo <<<_END
      </div>

        <div class="cart-order-summary">
          <h3>
            Order Summary
          </h3>
          <table>
            <tbody>
              <tr>
                <td> Cart total</td>
                <td>R$invoiceTotal</td>
              </tr>
              <tr>
                <td>Delivery fee</td>
                <td>R0</td>
              </tr>
              <tr>
                <td class="bold-line">Order total</td>
                <td class="bold-line">R$invoiceTotal</td>
              </tr>
              <tr>
                <td class="table-directive">Total to pay</td>
                <td class="table-directive">R$invoiceTotal</td>
              </tr>
              <tr>
                <td class="table-directive">Total items</td>
                <td class="table-directive">$itemsCount</td>
              </tr>
            </tbody>
          </table>

          <form method="post" action="src/checkout_script.php">

            <input type="hidden" name="invoice_total" value="$invoiceTotal">
            <input type="hidden" name="items_Count" value="$itemsCount">
            <input class="btn-checkout" type="submit" class="cart-checkout button" name="checkout" value="Checkout">

          </form>
        </div>

      </div>
    _END;
  }
  else
  {
    echo <<<_END
      <div class="cart-empty">
        <p>Cart is empty</p>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </svg>
      </div>
      </div>

      </section>

      </main>
    _END;
  }

  require_once 'src/footer.php';
?>