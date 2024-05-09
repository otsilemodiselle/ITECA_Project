<?php
  require_once('functions.php');

  $prod_id = $_POST['prod_id'];

  if(isset($_SESSION['customer_id'])){
    if( (isset($_SESSION['customer_id'])) (isset($_POST['cartButton'])) && (isset($_POST['sizes'])) ){

      $customer_id = $_SESSION['customer_id'];
    
      add_collection($customer_id, $prod_id);
      $coll_id = latestPrimaryKey();
  
      $size = $_POST['sizes'];
  
      $query = "SELECT stock_id
                FROM stock
                WHERE prod_id = '$prod_id' AND size = '$size';";
      
      $result = queryMysql($query);
  
      $row = $result->fetch();
      $stock_id = $row['stock_id'];
  
      add_cart($coll_id, $stock_id);
    }
    elseif(isset($_POST['wishlistButton'])){
  
      add_collection($customer_id, $prod_id);
      $coll_id = latestPrimaryKey();
  
      add_wishlist($coll_id);
      exit;
    }
  }else{
    if( (isset($_SESSION['customer_id'])) && (isset($_POST['cartButton'])) && (isset($_POST['sizes'])) ){
        $size = $_POST['sizes'];
    
        $query = "SELECT stock_id
                  FROM stock
                  WHERE prod_id = '$prod_id' AND size = '$size';";
        
        $result = queryMysql($query);
    
        $row = $result->fetch();
        $stock_id = $row['stock_id'];
        $_SESSION['cart'][] = $stock_id;
        exit;
      }
      elseif(isset($_POST['wishlistButton'])){
        
        $_SESSION['wishlist'][] = $prod_id;
        exit;
      }
    }

    

?>