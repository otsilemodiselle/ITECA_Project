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
    $stock_details = "";
    $prod_details = "";
    
    $query = "SELECT p.prod_id, st.stock_id
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
        $prod_details .= $prod_id . ',';
        $stock_id = $row['stock_id'];
        $stock_details .= $stock_id . ',';
      }

      $order_total = $_POST['invoice_total'];
      $status = "Pending Payment";

      add_order($pdo, $waybill, $stock_details, $customer_id, $order_total, $status, $prod_details);
      $order_id = latestPrimaryKey();
      $_SESSION['order_id'] = $order_id;

      $queryEmptyCart = "DELETE co FROM collection co
                JOIN cart ca ON co.coll_id = ca.coll_id
                WHERE customer_id = $customer_id;";

      queryMysql($queryEmptyCart);

      header("Location: ../order_checkout.php");
      exit;
    }

    
    
  }
  else
  {
    // Do some work
    header("Location: ../message.php?msg=anonymous");
    exit;
  }
?>