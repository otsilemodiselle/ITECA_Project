<?php
  require_once 'functions.php';
  session_start();
  require_once 'above_nav_content.php';

  $forename = $_SESSION['forename'];
  $surname = $_SESSION['surname'];
  $customer_id = $_SESSION['customer_id'];
  $order_id = $_SESSION['order_id'];

  $queryContact = "SELECT s.contact_number, s.address, c.card_no, c.exp_date
                  FROM stakeholders s
                  JOIN customer c ON s.stakeholder_id = c.stakeholder_id
                  WHERE c.customer_id = $customer_id;";

  $resultContact = queryMysql($queryContact);

  if ($resultContact->rowCount())
  {
    $row = $resultContact->fetch();
    $contact = $row['contact_number'];
    $address = $row['address'];
    $card_no = $row['card_no'];
    $exp_date = $row['exp_date'];
  }
  else
  {
    $contact = "[contact number";
    $address = "[delivery address not provided]";
    $card_no = "[card data not provided]";
    $exp_date = "[card data not provided]";
  }

  if ($address === null) {$address = "[delivery address not provided]";}
  if ($card_no === null) {$card_no = "[card data not provided]";}
  if ($exp_date === null) {$exp_date = "[card data not provided]";}
  

  $queryCourier = "SELECT j.trading_name, w.waybill, w.date, o.order_total, o.order_desc
                  FROM workitem w
                  JOIN courier cou ON cou.courier_id = w.courier_id
                  JOIN juristic j ON j.jurist_id = cou.jurist_id
                  JOIN stakeholders s ON s.stakeholder_id = j.stakeholder_id
                  JOIN order_ o ON o.waybill = w.waybill
                  WHERE order_id = $order_id;";

  $resultCourier = queryMysql($queryCourier);

  if ($resultContact->rowCount())
  {
    $row = $resultCourier->fetch();
    $courier_name = $row['trading_name'];
    $waybill = $row['waybill'];
    $delivery_date = $row['date'];
    $order_total = $row['order_total'];
    $description = $row['order_desc'];
  }
  else
  {
    $courier_name = "[courier data pending]";
    $waybill = "[courier data pending]";
    $delivery_date = "[courier data pending]";
    $order_total = "[order data pending]";
    $description = "[order data pending]";
  }

  $item_count = substr_count($description, "\n");

  echo <<<_END
  <form method="post" action="order_processing.php">
  <section class='clearfix container'>
  <div class="section-header">
      <h3 class="cat-heading">Order Checkout</h3>
  </div>
  <div class='order-container clearfix'>
      <div class="order-recipient clearfix">
          <p class="order-recip-details">
              $forename $surname<br>
              $contact<br>
              447 Acorn Rd, Pretoria, 0081 
          </p>
          <input type="submit" class="recip-edit" value="Edit">
      </div>
      <div class="order-payment clearfix">
          <p class="order-pay-details">
              Card: VISA $card_no<br>
              Expiry Date: $exp_date
              <br>CVV: <input type="text" class="cvv-box" maxlength="3">
          </p>
          <input type="submit" class="pay-edit" value="Edit">
      </div>
      <div class="order-summary">
          <p class="order-summary-details">
              Order Ref: $waybill
              <br>Courier: $courier_name
              <br>ETA: $delivery_date
          </p>
      </div>
      <div class="order-checkout clearfix">
          <p class="order-check-details">
              $description <br>
              Quantity: $item_count Item(s)
              <br>Order Total: R$order_total
          </p>
          <input type="submit" class="checkout" value="Pay Now">
      </div>
      
    </div>
  </section>
  </form>

  <footer>
    <div class='end'>
        
    </div>
  </footer>
  </body>
  </html>
  _END;
?>