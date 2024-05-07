<?php
   require_once 'functions.php';

   session_start();

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
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           </head>
           <body> 
           <script>

           </script>
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
 _END;

 if(isset($_GET['prod_id']))
 {
    $clickedProduct = $_GET['prod_id'];

    $prod_id = $clickedProduct;

    $query =  "SELECT prod_name, price, prod_desc, prod_img
              FROM product
              WHERE prod_id = '$prod_id';";

    $result = queryMysql($query);

    $row = $result->fetch();

    $prod_name = $row['prod_name'];
    $price = $row['price'];
    $prod_desc = $row['prod_desc'];
    $prod_img = $row['prod_img'];

    echo <<<_END
    <section class='container'>
    <div class='clearfix prod-container'>
        <img src="Images/img/$prod_img" alt="" class="prod-img">
        <div class="prod-header-div">
            <h3 class="prod-heading">
                $prod_name
            </h3>
        </div>
        <div class="prod-desc-div">
            <p class="description">
                $prod_desc
            </p>
            <h3 class="price">
                R$price
            </h3>
        </div>
    _END;

    $query = "SELECT DISTINCT size
              FROM stock
              WHERE prod_id = $prod_id";
    
    $result = queryMysql($query);

    $arrAvailableSizes = array();
    $arrAvailableSizes[] = "";

    while ($row = $result->fetch())
    {
      $arrAvailableSizes[] = $row['size'];
    }

    echo <<<_END
      <form>
        <div class="prod-action-div">
        <label for="sizes-list" class="sizes-label">Size</label>
        <select name="Sizes" id="sizes-list">
    _END;

    foreach ($arrAvailableSizes as $size){
      echo '<option value='.$size.'>'.$size.'</option>';
    }

    echo <<<_END
        </select>
        <button class="cart-button">Add to Cart</button>
        <button class="wishlist-button">Add to Wishlist</button>
      </form>
      </div>
        <div class="prod-socials-div">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-pinterest"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>
      </div>            
    _END;
  }

 
  echo <<<_END
 
  </section>

  <footer>
      <div class='end'>
          
      </div>
  </footer>
  </body>
  </html>
 _END;


?>