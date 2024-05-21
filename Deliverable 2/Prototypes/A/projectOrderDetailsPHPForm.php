<?php
  session_start();
  require_once('functions.php');

  require_once 'above_nav_content.php';

  echo <<<_END
  <section class='clearfix container'>
        <div class="section-header">
            <h3 class="cat-heading">Order Details</h3>
        </div>
        <div class='cart-container'>
  _END;

  if(isset($_SESSION['order_id']))
  {
    $order_id = $_SESSION['order_id'];

    $query = "SELECT * FROM order_ WHERE order_id = $order_id;";

    $result = queryMysql($query);

    if ($result->rowCount())
    {
      $row = $result->fetch();
      $waybill = $row['waybill'];
      $stock_details = $row['stock_details'];
      $prod_details = $row['prod_details'];
      $order_total = $row['order_total'];
      $status = $row['status'];
    }

    $stock_id = "";
    $prod_id = "";
    $item_count = 0;

    $stock_details_array = str_split($stock_details);
    $j = count($stock_details_array);
    for($i = 0; $i < $j; ++$i)
    {
      $stock_id .= $stock_details_array[$i];
      if($stock_details_array[$i+1]==',')
      {
         $queryProdData =  "SELECT p.prod_img, p.prod_name, p.price, s.size
                          FROM product p
                          JOIN stock s ON p.prod_id = s.prod_id
                          WHERE stock_id = $stock_id;";
        $prodDataResult = queryMysql($queryProdData);

        $row = $prodDataResult->fetch();
        $prod_img = $row['prod_img'];
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $size = $row['size'];

        echo<<<_END
        <form method="post" action="projectCartPHPForm.php">
        <div class='cart-banner clearfix'>
          <img src="Images/img/$prod_img" alt="" class="small-thumbnail">
          <p class="prod-price-panel">R$price</p> 
          <p class="prod-name-panel">$prod_name Size: $size</p>
          <input type="hidden" name="prod_id" value="$prod_id">
          <input type="hidden" name="price" value="$price">
        </div>
        </form>   
        _END;

        $stock_id = "";
        $i++;
        $item_count++;
      }

    }
  }

  echo <<<_END
  </div>
  </div>
  <div class="clearfix cart-manager">
    <p class="cart-summary">
        $item_count Item(s)  Total: R$order_total
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
?>