<?php
      require_once '../src/functions.php';

      session_start();

      if (!empty($_POST['inputEmail']) && !empty($_POST['inputPassword'])) {
        $inputEmail = sanitizeString($_POST['inputEmail']);
        $inputPassword = sanitizeString($_POST['inputPassword']);
    
        
        $query = "SELECT stakeholder_id FROM stakeholders WHERE email='$inputEmail'";
        $result = queryMysql($query);
        
        if (!$result->rowCount()) 
            {die ("Incorrect login details");}
    
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
          header("Location: message.php?msg=loginfail");
          exit;
        }
      }
  
     require_once '../src/above_nav_content.php';

  echo <<<_END
    
            <section class='clearfix container'>
                <div class="section-header">
                    <h3 class="cat-heading">login</h3>
                </div>
                <div class='login-container clearfix'>
                    <div class="login-window">
                        <div class="login-elements clearfix">
                            <div class="login-captions-div">
                                <h3 class="login-email">Email:</h3><br>
                                <h3 class="login-password">Password:</h3>
                            </div>
                          <form method="post" action="login.php">
                            <div class="login-inputs-div">
                                <input type="text" name="inputEmail"><br>
                                <input type="password" name="inputPassword">
                            </div>
                            <input type="submit" value="Login" class="login-button">
                          </form>
                        </div>
                    </div>
                    
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
