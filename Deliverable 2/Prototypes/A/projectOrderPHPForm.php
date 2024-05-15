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

  if ($address === null) 
  {
    $address = "[delivery address not provided]";
    $bool_address = false;
  }
  else 
  {
    $address = trimString($address, 35);
    $bool_address = true;
  }
  if ($card_no === null) 
  {
    $card_no = "[card data not provided]";
    $bool_card = false;
  }
  else
  {
    $bool_card = true;
  }
  if ($exp_date === null) 
  {
    $exp_date = "[card data not provided]";
    $bool_exp_date = false;
  }
  else
  {
    $bool_exp_date = true;
  }

  $pay_clickable = (($bool_address == true) && ($bool_card == true) && ($bool_exp_date == true)) ? "" : "disabled";
  

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

  $item_count = substr_count($description, "\n");

  if(isset($_POST['order-action']))
  {
    $action = $_POST['order-action'];
  switch ($action)
      {
        case 'Edit': 
          header('location: projectProfileEditPHPForm.php');
          exit;
          break;
        case 'Cancel Order':
          header('location: projectMessagePHPForm.php?msg=EndOrder');
          exit;
          break;
        case 'Pay Now':
          header('location: projectMessagePHPForm.php?msg=pay');
          exit;
          break;
      }
  }

  echo <<<_END
  <form method="post" action="projectOrderPHPForm.php">
  <section class='clearfix container'>
  <div class="section-header">
      <h3 class="cat-heading">Order Checkout</h3>
  </div>
  <div class='order-container clearfix'>
      <div class="order-recipient clearfix">
          <p class="order-recip-details">
              Recipient: $forename $surname<br>
              Contact no.: $contact<br>
              Delivery Address: $address 
          </p>
          <input type="submit" class="recip-edit" name="order-action" value="Edit">
      </div>
      <div class="order-payment clearfix">
          <p class="order-pay-details">
              Card: VISA $card_no<br>
              Expiry Date: $exp_date
              <br>CVV: <input type="text" class="cvv-box" maxlength="3">
          </p>
          <input type="submit" class="pay-edit" name="order-action" value="Edit">
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
              Quantity: $item_count Item(s)
              <br>Order Total: R$order_total
          </p>
          <input type="submit" class="checkout" name="order-action" value="Cancel Order">
          <input type="submit" class="checkout" name="order-action" value="Pay Now" $pay_clickable>
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