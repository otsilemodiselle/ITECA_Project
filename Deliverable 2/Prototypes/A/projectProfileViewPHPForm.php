<?php
  require_once 'functions.php';
  session_start();
  require_once 'above_nav_content.php';
  require_once 'load_profile_data.php';

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
          header('location: projectProfileEditPHPForm.php');
          exit;
          break;
        case '':
          header('location: projectMessagePHPForm.php?msg=EndOrder');
          exit;
          break;
      }
    }

  echo<<<_END
    <section class='clearfix container'>
    <div class="section-header">
        <h3 class="cat-heading">Profile View</h3>
    </div>

        <form method="post" action="projectProfileViewPHPForm.php">
        <div class="customer-details clearfix">
            <p class="personal-details">
                $name $surname<br>
                $contact<br>
                $email
            </p>
            <input type="submit" class="personal-edit" value="Edit" name="profile-view-action">
        </div>
        <div class="customer-payment clearfix">
            <p class="customer-pay-details">
                Card: $card_no<br>
                Expiry Date: $exp_date
                <br>$address
            </p>
            <input type="submit" class="customer-pay-edit" value="Edit" name="profile-view-action">
        </div>
        <br>
        <div class="myorders-subsection">
            <div class="subsection-header clearfix">
                <h3 class="cat-heading">My Orders</h3>
            </div>
            <div class='myorders-container'>
  _END;

  $queryMyOrders = "SELECT * FROM order_
                    WHERE customer_id = $customer_id;";

  $result = queryMysql($queryMyOrders);

  if ($result->rowCount())
  {
    while($row=$result->fetch())
    {
        $order_id = $row['order_id'];
        $waybill = $row['waybill'];
        $order_desc = $row['order_desc'];
        $order_total = $row['order_total'];
        $status = $row['status'];

        echo<<<_END
            <div class='myorder-banner clearfix'>
            <p class="myorder-detail-panel">Order ref: $waybill Total: R$order_total </p>
        _END;
        if ($status == "Complete")
        {
            echo<<<_END
                    <input type="submit" class="log-return" value="Log a Return" name="view-profile-action">
            _END;
        }
        else
        {
            echo<<<_END
                    <input type="submit" class="log-return" value="Complete Order" name="view-profile-action">
                    <input type="submit" class="log-return" value="Cancel Order" name="view-profile-action">
            _END;
        }
        echo "</div>";
    }
  }
    
  

  

  echo<<<_END
    </div>
    </form>    
    </section>

    <footer>
        <div class='end'>
            
        </div>
    </footer>
    </body>
    </html>
  _END;
?>