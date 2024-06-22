<?php
  session_start();

  require_once 'functions.php';

      if (!empty($_POST['inputted-email']) && !empty($_POST['inputted-password'])) 
      {
        $inputEmail = sanitizeString($_POST['inputted-email']);
        $inputPassword = sanitizeString($_POST['inputted-password']);
        
        $query = "SELECT stakeholder_id FROM stakeholders WHERE email='$inputEmail'";
        $result = queryMysql($query);
        
        if (!$result->rowCount()) 
        {
          header("Location: index.php");
          exit;
        }
        else
        {
      
          $row = $result->fetch();
          $retrieved_st_id = $row['stakeholder_id'];
      
          $query = "SELECT * FROM customer WHERE stakeholder_id='$retrieved_st_id'";
          $result = queryMysql($query);
      
          $row = $result->fetch();
          $retrieved_customer_id =$row['customer_id'];
          $retrieved_name = $row['name'];
          $retrieved_surname = $row['surname'];
          $retrieved_pw = $row['password'];
      
          if (password_verify(str_replace("'", "", $inputPassword), $retrieved_pw))
          {
            session_start();
      
            $_SESSION['customer_id'] = $retrieved_customer_id;
            $_SESSION['forename'] = $retrieved_name;
            $_SESSION['surname'] = $retrieved_surname;

            if (isset($_SESSION['cart']))
            {
              foreach($_SESSION['cart'] as $temp_cart_item)
              {
                  $query = "SELECT prod_id
                          FROM stock
                          WHERE stock_id = $temp_cart_item;";

                  $result = queryMysql($query);

                  if ($result->rowCount())
                  {
                      $row = $result->fetch();
                      $prod_id = $row['prod_id'];

                      add_collection($pdo, $retrieved_customer_id, $prod_id);
                      $coll_id = latestPrimaryKey();
                      add_cart($pdo, $coll_id, $temp_cart_item);
                  }
                  
              }
              unset($_SESSION['cart']);
            } 

            if (isset($_SESSION['wishlist'])) 
            {
              foreach($_SESSION['wishlist'] as $temp_wishlist_item)
              {
                  add_collection($pdo, $retrieved_customer_id, $temp_wishlist_item);
                  $coll_id = latestPrimaryKey();
                  add_wishlist($pdo, $coll_id);
              }
              unset($_SESSION['wishlist']);
            }
      
            header("Location: index.php");
            exit;
          }
          else 
          {
            header("Location: index.php");
            exit;
          }
        }
      }
  
?>