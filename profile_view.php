<?php
  require_once '../src/functions.php';
  session_start();
  require_once '../src/above_nav_content.php';
  require_once '../src/load_profile_data.php';

  $customer_id = $_SESSION['customer_id'];
  if (!$card_no==null)
  {
    $card_no = maskCard($card_no);
  }

  if(!$address==null)
  {
    $address = trimString($address, 45);
  }

  if(isset($_POST['profile-view-action']))
  {
    $action = $_POST['profile-view-action'];
    switch ($action)
    {
      case 'Edit': 
        header('location: profile_edit.php');
        exit;
        break;
      case 'Cancel Order':
        $cancelled_status = "Cancelled";
        if(isset($_POST['order-id']))
        {
          $order_id = $_POST['order-id'];
          $queryCancelOrder = "DELETE FROM order_ WHERE order_id = $order_id;";
          queryMysql($queryCancelOrder);
          header('location: profile_view.php');
          exit;
        }
        break;
      case 'Complete Order':
        if(isset($_POST['order-id']))
        {
          $_SESSION['order_id'] = $_POST['order-id'];
          header('location: order_checkout.php');
          exit;
        }
        break;
      case 'Review':
        if(isset($_POST['order-id']))
        {
          $_SESSION['order_id'] = $_POST['order-id'];
          header('location: order_details.php');
          exit;
        }
        break;
      case '':
        header('location: message.php?msg=EndOrder');
        exit;
        break;
    }
  }

  echo<<<_END
    <section class='clearfix container'>
    <div class="section-header">
        <h3 class="cat-heading">Profile View</h3>
    </div>

        <form method="post" action="profile_view.php">
        <div class="customer-details clearfix">
            <p class="personal-details">
                $name $surname<br>
                $contact<br>
                $email
            </p>
            <input type="submit" class="personal-edit button" value="Edit" name="profile-view-action">
        </div>
        <div class="customer-payment clearfix">
            <p class="customer-pay-details">
                Card: $card_no<br>
                Expiry Date: $exp_date
                <br>$address
            </p>
            <input type="submit" class="customer-pay-edit button" value="Edit" name="profile-view-action">
        </div>
        </form> 
        <br>

        <div class="myorders-subsection">
            <div class="subsection-header clearfix">
                <h3 class="cat-heading">My Orders</h3>
            </div>
            <div class='myorders-container'>
  _END;

  $queryMyOrders = "SELECT * FROM order_
                    WHERE customer_id = $customer_id
                    ORDER BY waybill DESC;";

  $result = queryMysql($queryMyOrders);

  if ($result->rowCount())
  {
    while($row=$result->fetch())
    {
        $order_id = $row['order_id'];
        $waybill = $row['waybill'];
        $order_total = $row['order_total'];
        $status = $row['status'];

        echo<<<_END
        <form method="post" action="profile_view.php">
        <div class='myorder-banner clearfix'>
        <p class="myorder-detail-panel">Order ref: $waybill Total: R$order_total - $status </p>
        <input type="hidden" name="order-id" value=$order_id>
        _END;
        if ($status == "Fulfilled")
        {
          echo<<<_END
          <input type="submit" class="log-return" value="Review" name="profile-view-action">
          </div>
          </form> 
          _END;
        }
        else
        {
          echo<<<_END
          <input type="submit" class="log-return button" value="Complete Order" name="profile-view-action">
          <input type="submit" class="log-return button" value="Cancel Order" name="profile-view-action">
          </div>
          </form> 
          _END;
        }
    }
  }
    
  echo<<<_END
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