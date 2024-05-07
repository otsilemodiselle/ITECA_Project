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

  if(isset($_GET['cat'])){
    $clickedCatalogue = $_GET['cat'];

    $_SESSION['browsed_catalogue'] = $clickedCatalogue;

    echo <<<_END
    <section class='container'>
        <div class="section-header">
            <h3 class="cat-heading">$clickedCatalogue</h3>
        </div>
        <div class='clearfix'>
    _END;

    $catalogueTable = $clickedCatalogue;

    function individualQuery($catalogueTable){
      $query = "SELECT i.prod_id, p.prod_img, p.prod_name, p.price
                FROM product p
                JOIN $catalogueTable i ON p.prod_id = i.prod_id;";
      return $query;
    }
    
    $query = individualQuery($catalogueTable);
    $result = queryMysql($query);

    while ($row = $result->fetch())
    {
      $cat_prod_id = $row['prod_id'];
      $cat_prod_img = $row['prod_img'];
      $cat_prod_name = $row['prod_name'];
      $cat_price = $row['price'];
      echo <<<_END
      <a href="projectProductPHPForm.php?prod_id=$cat_prod_id">
        <div class='card'>
            <img src="Images/img/$cat_prod_img" alt="" class="thumbnail">
            <p class="prod-name card-detail"><strong>$cat_prod_name</strong></p>
            <p class="price card-detail"><strong>R$cat_price</strong></p>
        </div>
      </a>
      _END;
    }
  
    echo <<<_END
    </div>
    </section>

    <footer>
        <div class='end'>
            
        </div>
    </footer>
    </body>
    </html>
    _END;
  }

?>


  