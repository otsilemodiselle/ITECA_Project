<?php
  require_once 'functions.php';

  echo <<<_END
  <!DOCTYPE html>
  <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!--<meta http-equiv="refresh" content="3" >-->
          <title>Bride & Joy</title>
          <link rel="stylesheet" href="projectPHPStyles.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <script>
              function showEditName()
              {
                  document.getElementsByClassName("edit-elements-name")[0].hidden =false;
                  document.getElementsByClassName("edit-name")[0].hidden =true;
              }
              function hideEditName()
              {
                  document.getElementsByClassName("edit-elements-name")[0].hidden =true;
                  document.getElementsByClassName("edit-name")[0].hidden =false;
                  document.getElementsByClassName("edit-name-input")[0].value = "";
                  document.getElementsByClassName("edit-name-verify")[0].textContent = "";
              }
              function showEditSurname()
              {
                  document.getElementsByClassName("edit-elements-surname")[0].hidden =false;
                  document.getElementsByClassName("edit-surname")[0].hidden =true;
              }
              function hideEditSurname()
              {
                  document.getElementsByClassName("edit-elements-surname")[0].hidden =true;
                  document.getElementsByClassName("edit-surname")[0].hidden =false;
                  document.getElementsByClassName("edit-surname-input")[0].value = "";
                  document.getElementsByClassName("edit-surname-verify")[0].textContent = "";   
              }
              function showEditNumber()
              {
                  document.getElementsByClassName("edit-elements-number")[0].hidden =false;
                  document.getElementsByClassName("edit-number")[0].hidden =true;
              }
              function hideEditNumber()
              {
                  document.getElementsByClassName("edit-elements-number")[0].hidden =true;
                  document.getElementsByClassName("edit-number")[0].hidden =false;
                  document.getElementsByClassName("edit-number-input")[0].value = "";
                  document.getElementsByClassName("edit-number-verify")[0].textContent = "";
              }
              function showEditEmail()
              {
                  document.getElementsByClassName("edit-elements-email")[0].hidden =false;
                  document.getElementsByClassName("edit-email")[0].hidden =true;
              }
              function hideEditEmail()
              {
                  document.getElementsByClassName("edit-elements-email")[0].hidden =true;
                  document.getElementsByClassName("edit-email")[0].hidden =false;
                  document.getElementsByClassName("edit-email-input")[0].value = "";
                  document.getElementsByClassName("edit-email-verify")[0].textContent = "";
              }
              function showEditCard()
              {
                  document.getElementsByClassName("edit-elements-card")[0].hidden =false;
                  document.getElementsByClassName("edit-card")[0].hidden =true;
              }
              function hideEditCard()
              {
                  document.getElementsByClassName("edit-elements-card")[0].hidden =true;
                  document.getElementsByClassName("edit-card")[0].hidden =false;
                  document.getElementsByClassName("edit-card-input")[0].value = "";
                  document.getElementsByClassName("edit-card-verify")[0].textContent = "";
              }
              function showEditExpiry()
              {
                  document.getElementsByClassName("edit-elements-expiry")[0].hidden =false;
                  document.getElementsByClassName("edit-expiry")[0].hidden =true;
              }
              function hideEditExpiry()
              {
                  document.getElementsByClassName("edit-elements-expiry")[0].hidden =true;
                  document.getElementsByClassName("edit-expiry")[0].hidden =false;
                  document.getElementsByClassName("edit-expiry-input")[0].value = "";
                  document.getElementsByClassName("edit-expiry-verify")[0].textContent = "";
              }
              function showEditAddress()
              {
                  document.getElementsByClassName("edit-elements-address")[0].hidden =false;
                  document.getElementsByClassName("edit-address")[0].hidden =true;
              }
              function hideEditAddress()
              {
                  document.getElementsByClassName("edit-elements-address")[0].hidden =true;
                  document.getElementsByClassName("edit-address")[0].hidden =false;
                  document.getElementsByClassName("edit-street-input")[0].value = "";
                  document.getElementsByClassName("edit-suburb-input")[0].value = "";
                  document.getElementsByClassName("edit-city-input")[0].value = "";
                  document.getElementsByClassName("edit-code-input")[0].value = "";
                  document.getElementsByClassName("edit-address-verify")[0].textContent = "";
              }
              function showEditPassword()
              {
                  document.getElementsByClassName("edit-elements-password")[0].hidden =false;
                  document.getElementsByClassName("edit-password")[0].hidden =true;
              }
              function hideEditPassword()
              {
                  document.getElementsByClassName("edit-elements-password")[0].hidden =true;
                  document.getElementsByClassName("edit-password")[0].hidden =false;
                  document.getElementsByClassName("edit-password-input")[0].value = "";
                  document.getElementsByClassName("edit-confirm-input")[0].value = "";
                  document.getElementsByClassName("edit-password-verify")[0].textContent = "";
              }
              function editName()
              {
                  var name = document.getElementsByClassName("edit-name-input")[0].value;
                  var nameFeedback = "";
                  var alphabetical = /^[a-zA-Z]+$/;       
                  
                  if (name.length < 2){   
                      nameFeedback = "Name too short. ";}
                  if (!alphabetical.test(name)){
                      nameFeedback += "\n Alphabetical characters only.";}      
                  document.getElementsByClassName("edit-name-verify")[0].textContent = nameFeedback;
              }
              function editSurname()
              {
                  var surname = document.getElementsByClassName("edit-surname-input")[0].value;
                  var surnameFeedback = "";
                  var alphabetical = /^[a-zA-Z]+$/;       
                  
                  if (surname.length < 2){   
                      surnameFeedback = "Same too short. ";}
                  if (!alphabetical.test(surname)){
                      surnameFeedback += "\n Alphabetical characters only."}      
                  document.getElementsByClassName("edit-surname-verify")[0].textContent = surnameFeedback;
              }
              function editNumber()
              {
                  var number = document.getElementsByClassName("edit-number-input")[0].value;
                  var numberFeedback = "";
                  var numerical = /^[\d/]+$/;       
              
                  if (number.length < 10){   
                      numberFeedback = "Contact no. must be 10 digits. ";}
                  if (!numerical.test(number)){
                      numberFeedback += "Numeric characters only."}      
                  document.getElementsByClassName("edit-number-verify")[0].textContent = numberFeedback;
              }
              function editEmail()
              {
                  var email = document.getElementsByClassName("edit-email-input")[0].value;
                  var emailFeedback = "";
                  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;       
              
                  if (!emailPattern.test(email)){
                      emailFeedback = "\n Email format incorrect."}      
                  document.getElementsByClassName("edit-email-verify")[0].textContent = emailFeedback;
              }
              function editPassword()
              {
                  var password = document.getElementsByClassName("edit-password-input")[0].value;
                  var confirm = document.getElementsByClassName("edit-confirm-input")[0].value;
                  var passwordFeedback = "";
                  var passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W\_])[A-Za-z\d\W\_]{8,}$/;     
              
              
                  if (password.length < 6){   
                      passwordFeedback = "Six characters minimum. ";}
                  if (password.length > 255){   
                      passwordFeedback = "Password too long. ";}
                  if (!passPattern.test(password)){
                      passwordFeedback +=  "Must contain a lowercase, uppercase, numeric, and symbol character. ";}
                  if (!password==confirm){
                      passwordFeedback += "New password not successfully confirmed.";}
                  document.getElementsByClassName("edit-password-verify")[0].textContent = passwordFeedback;
              }
              function editCard()
              {
                  var card = document.getElementsByClassName("edit-card-input")[0].value;
                  var cardFeedback ="";
                  var numerical = /^[\d/]+$/; 

                  if (card.length < 16){   
                      cardFeedback = "Card no. must be 16 digits. ";}
                  if (!numerical.test(card)){
                      cardFeedback += "\n Numeric characters only."}      
                  document.getElementsByClassName("edit-card-verify")[0].textContent = cardFeedback;
              }
              function editExpiry()
              {
                  var expiry = document.getElementsByClassName("edit-expiry-input")[0].value;
                  var expiryFeedback ="";
                  var numerical = /^[\d/]+$/; 
                  var validDate = /^(0[1-9]|1[0-2])([0-9]{2})$/;

                  if (expiry.length < 4){   
                      expiryFeedback = "Expiry date must be 4 digits. ";}
                  if (!numerical.test(expiry)){
                      expiryFeedback += "Numeric characters only. ";}  
                  if (!validDate.test(expiry)){
                      expiryFeedback += "invalid card expiry date.";}
                  document.getElementsByClassName("edit-expiry-verify")[0].textContent = expiryFeedback;
              }
              function editAddress()
              {
                  var street = document.getElementsByClassName("edit-street-input")[0].value;
                  var suburb = document.getElementsByClassName("edit-suburb-input")[0].value;
                  var city = document.getElementsByClassName("edit-city-input")[0].value;
                  var code = document.getElementsByClassName("edit-code-input")[0].value;
                  var addressFeedback ="";
                  var numerical = /^[\d/]+$/;            

                  if (code.length < 4){   
                      addressFeedback = "Postal code must be 4 digits. \n";}
                  if (!numerical.test(code)){
                      addressFeedback += "\n Postal code must be numeric."}      
                  document.getElementsByClassName("edit-address-verify")[0].textContent = addressFeedback;
              }
          </script>
      </head>
      <body> 
      
      <header>
      <div class='clearfix' id='top-title-div'>
          <img src="dance burgundy.png" class='title-icon'  alt="">
          <a class='title-home' href="projectIndexPHPForm.php">Bride & Joy</a>

_END;

  if (isset($_SESSION['customer_id'])){

    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT COUNT(w.wish_id) AS wishlist_count
    FROM wishlist w
    JOIN collection co ON w.coll_id = co.coll_id
    JOIN customer c ON co.customer_id = c.customer_id
    WHERE c.customer_id = $customer_id;";
    $result =queryMysql($query);
    $row = $result->fetch();
    $retrieved_wishlist_count = $row['wishlist_count'];

    $query = "SELECT COUNT(ca.cart_id) AS cart_count
    FROM cart ca
    JOIN collection co ON ca.coll_id = co.coll_id
    JOIN customer c ON co.customer_id = c.customer_id
    WHERE c.customer_id = $customer_id;";
    $result =queryMysql($query);
    $row = $result->fetch();
    $retrieved_cart_count = $row['cart_count'];

    $_SESSION['wishlist_count'] = $retrieved_wishlist_count;
    $_SESSION['cart_count'] = $retrieved_cart_count;
  }
  else{
    if (!isset($_SESSION['wishlist'])) {
      $_SESSION['wishlist'] = array();}
    $_SESSION['wishlist_count'] = count($_SESSION['wishlist']);
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();}
    $_SESSION['cart_count'] = count($_SESSION['cart']);
  }
  


  if((!isset($_SESSION['cart_count'])) || ($_SESSION['cart_count'] == 0)){
    $cart_icon = "empty_cart.png";
  }
  else{
      $cart_icon = "full_cart.png";
  }  
  
  
  if (isset($_SESSION['wishlist_count'])){
      $wishlist_count = $_SESSION['wishlist_count'];
  }
  // else{ $wishlist_count = 0;}

  if (isset($_SESSION['cart_count'])){
      $cart_count = $_SESSION['cart_count'];
  }
  // else{ $cart_count = 0;}

  if (isset($_SESSION['customer_id'])){
      $login_name=$_SESSION['forename'];
      echo <<<_END
        <ul class='clearfix title-list'>
              <li class='title-options'>                    
                  <a onclick='Loggoutds()' href="destroy_session.php"  class='title-link'>Sign-Out</a>
              </li>

              <li class='title-options' class='title-link'>                    
                  <a href="" class='title-link' class='title-link'>Hello $login_name!</a>
              </li>

              <li class='title-options'>                    
                  <a href="projectWishlistPHPForm.php" class='title-link'>Wishlist ($wishlist_count)</a>
                  <img src="wishlist.png" class="wishlist_icon">
              </li>

              <li class='title-options'>                    
                  <a href="projectCartPHPForm.php" class='title-link'>Cart ($cart_count)</a>
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
                  <a  href="projectSignupPHPForm.php" class='title-link'>Sign-up</a>
              </li>
              <li class='title-options'>
                  <a href="projectWishlistPHPForm.php" class='title-link'>Wishlist ($wishlist_count)</a>
                  <img src="wishlist.png" class="wishlist_icon">                    
              </li>
              <li class='title-options'>
                  <a href="projectCartPHPForm.php" class='title-link'>Cart ($cart_count)</a>
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
?>