<?php
      require_once 'functions.php';

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
          $_SESSION['surname'] = $retrieved_name;
    
          $query = "SELECT COUNT(w.wish_id) AS wishlist_count
                    FROM wishlist w
                    JOIN collection co ON w.coll_id = co.coll_id
                    JOIN customer c ON co.customer_id = c.customer_id
                    WHERE c.customer_id = '$retrieved_customer_id';";
          $result =queryMysql($query);
          $row = $result->fetch();
          $retrieved_wishlist_count = $row['wishlist_count'];
    
          $query = "SELECT COUNT(ca.cart_id) AS cart_count
                    FROM cart ca
                    JOIN collection co ON ca.coll_id = co.coll_id
                    JOIN customer c ON co.customer_id = c.customer_id
                    WHERE c.customer_id = '$retrieved_customer_id';";
          $result =queryMysql($query);
          $row = $result->fetch();
          $retrieved_cart_count = $row['cart_count'];
    
          $_SESSION['wishlist_count'] = $retrieved_wishlist_count;
          $_SESSION['cart_count'] = $retrieved_cart_count;
    
          header("Location: projectIndexPHPForm.php");
          exit;
        }
        else {window.alert("Incorrect login details");}
      }
    
  
      echo <<<_END
          <!DOCTYPE html>
          <html lang="en">
              <head>
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <!--<meta http-equiv="refresh" content="3" >-->
                  <title>Float Example</title>
                  <link rel="stylesheet" href="projectPHPStyles.css">
                  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
              </head>
              <body> 
              <header>
              <div class='clearfix' id='top-title-div'>
                  <img src="dance burgundy.png" class='title-icon'  alt="">
                  <a class='title-home' href="projectIndexPHPForm.php">Bride & Joy</a>
      _END;
  
      if((!isset($_SESSION['cart_count'])) || ($_SESSION['cart_count'] == 0)){
        $cart_icon = "empty_cart.png";
    }
    else{
        $cart_icon = "full_cart.png";
    }  

    if (isset($_SESSION['wishlist_count'])){
        $wishlist_count = $_SESSION['wishlist_count'];
    }
    else{ $wishlist_count = 0;}

    if (isset($_SESSION['cart_count'])){
        $cart_count = $_SESSION['cart_count'];
    }
    else{ $cart_count = 0;}

    if (isset($_SESSION['customer_id'])){
        $login_name=$_SESSION['forename'];
        echo <<<_END
          <ul class='clearfix title-list'>
                <li class='title-options'>                    
                    <a href="destroy_session.php"  class='title-link'>Sign-Out</a>
                </li>

                <li class='title-options' class='title-link'>                    
                    <a href="" class='title-link' class='title-link'>Hello $login_name!</a>
                </li>

                <li class='title-options'>                    
                    <a href="" class='title-link'>Wishlist ($wishlist_count)</a>
                    <img src="wishlist.png" class="wishlist_icon">
                </li>

                <li class='title-options'>                    
                    <a href="" class='title-link'>Cart ($cart_count)</a>
                    <img src="$cart_icon" class="cart_icon">
                </li>
                
          </ul>
      </div>
      _END;
    } else{
        echo <<<_END
          <ul class='clearfix title-list'>
                <li class='title-options'>
                    <a href="projectLoginPHPForm.php" class='title-link'>Login</a>
                </li>
                <li class='title-options'>
                    <a  href="" class='title-link'>Sign-up</a>
                </li>
                <li class='title-options'>
                    <a href="" class='title-link'>Wishlist ($wishlist_count)</a>
                    <img src="wishlist.png" class="wishlist_icon">                    
                </li>
                <li class='title-options'>
                    <a href="" class='title-link'>Cart ($cart_count)</a>
                    <img src="$cart_icon" class="cart_icon">
                </li>
          </ul>
      </div>
      _END;
    }

  echo <<<_END
                <div id='top-nav-div'>
                    <nav id='top-nav'>
                        <ul class='clearfix nav-list'>
                            <li class='nav-options'>
                                <a href="projectCataloguePHPForm.php?cat=womens" class='nav-link'>Brides</a>
                            </li>   
                            <li class='nav-options'>
                                <a href="projectCataloguePHPForm.php?cat=mens" class='nav-link'>Grooms</a>
                            </li>
                            <li class='nav-options'>
                                <a href="projectCataloguePHPForm.php?cat=girls" class='nav-link'>Flower Girls</a>
                            </li>
                            <li class='nav-options'>
                                <a href="projectCataloguePHPForm.php?cat=boys" class='nav-link'>Ring Bearers</a>
                            </li>
                            <li class='nav-options'>
                                <a href="projectCataloguePHPForm.php?cat=traditional" class='nav-link'>Traditional</a>
                            </li>
                            <li class='nav-options'>
                                <a href="projectCataloguePHPForm.php?cat=sales" class='nav-link'>On Sale</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>
    
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
                          <form method="post" action="projectLoginPHPForm.php">
                            <div class="login-inputs-div">
                                <input type="text" name="inputEmail"><br>
                                <input type="text" name="inputPassword">
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
