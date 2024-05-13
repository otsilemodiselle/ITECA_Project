<?php
  require_once 'functions.php';
  session_start();

  if(isset($_SESSION['customer_id']))
  {
    $customer_id = $_SESSION['customer_id'];
    $courier_id = rand(231, 233);
    $today = date("Y-m-d");
    $delivery_date = date("Y-m-d", strtotime($today . "+10 days"));
    add_workitem($pdo, $delivery_date, $courier_id);
    $waybill = latestPrimaryKey();
    $order_desc = "";
    
    $query = "SELECT p.prod_id, p.prod_name, st.size, p.price
              FROM product p
              JOIN collection co ON p.prod_id = co.prod_id
              JOIN cart ca ON co.coll_id = ca.coll_id
              JOIN stock st ON ca.stock_id = st.stock_id
              WHERE co.customer_id = $customer_id;";

    $result = queryMysql($query);

    if($result->rowCount())
    {
      while ($row = $result->fetch())
      {
        $prod_id = $row['prod_id'];
        $prod_name = $row['prod_name'];
        $size = $row['size'];
        $price = $row['price'];

        $order_desc .= "#" . $prod_id . "-" . trimString($prod_name, 12) . "-Size:" . $size . "-R" . $price . "\n";
      }

      $order_total = $_POST['invoice_total'];
      $status = "Pending Payment";

      add_order($pdo, $waybill, $order_desc, $customer_id, $order_total, $status);
      header("Location: projectOrderPHPForm.php");
      exit;
    }

    
    
  }
  else
  {
    // Do some work
    header("Location: projectMessagePHPForm.php?msg=anonymous");
    exit;
  }
?>