<?php
  require_once 'functions.php';

  session_start();

  require_once 'above_nav_content.php';

  echo <<<_END
  <script>
      function signupNameVerify(){
          var name = document.getElementsByClassName("signup-name-input")[0].value;
          var nameFeedback = "";
          var alphabetical = /^[a-zA-Z]+$/;       
          
          if (name.length < 2){   
              nameFeedback = "Name too short. ";}
          if (name.length > 68){
              nameFeedback = "Name too long. ";}
          if (!alphabetical.test(name)){
              nameFeedback += " Alphabetical characters only."}      
          document.getElementsByClassName("signup-name-verify")[0].textContent = nameFeedback;
          return nameFeedback
          
      }
      function signupSurnameVerify(){
          var surname = document.getElementsByClassName("signup-surname-input")[0].value;
          var surnameFeedback = "";
          var alphabetical = /^[a-zA-Z]+$/;       
          
          if (surname.length < 2){   
              surnameFeedback = "Surname too short. ";}
          if (surname.length > 68){
              surnameFeedback = "Surname too long. ";}
          if (!alphabetical.test(surname)){
              surnameFeedback += " Alphabetical characters only."}      
          document.getElementsByClassName("signup-surname-verify")[0].textContent = surnameFeedback;
          return surnameFeedback;
      }
      function signupNumberVerify(){
          var number = document.getElementsByClassName("signup-number-input")[0].value;
          var numberFeedback = "";
          var numerical = /^[\d/]+$/;       
          
          if (number.length < 10){   
              numberFeedback = "Contact no. too short. ";}
          if (!numerical.test(number)){
              numberFeedback += " Numeric characters only."}      
          document.getElementsByClassName("signup-number-verify")[0].textContent = numberFeedback;
          return numberFeedback;
      }
      function signupEmailVerify(){
          var email = document.getElementsByClassName("signup-email-input")[0].value;
          var emailFeedback = "";
          var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;       
          
          if (!emailPattern.test(email)){
              emailFeedback = " Email format incorrect."}      
          document.getElementsByClassName("signup-email-verify")[0].textContent = emailFeedback;
          return emailFeedback;
      }
      function signupPasswordVerify(){
          var password = document.getElementsByClassName("signup-password-input")[0].value;
          var passwordFeedback = "";
          var passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W\_])[A-Za-z\d\W\_]{8,}$/;     
          
          
          if (password.length < 6){   
              passwordFeedback = "Six characters minimum. ";}
          if (password.length > 255){   
              passwordFeedback = "Password too long. ";}
          if (!passPattern.test(password)){
              passwordFeedback +=  "Must contain a lowercase, uppercase, numeric, and symbol character. ";}
          document.getElementsByClassName("signup-password-verify")[0].textContent = passwordFeedback;
          return passwordFeedback;
      }
      function signupConfirmVerify(){
          var confirm = document.getElementsByClassName("signup-confirm-input")[0].value;
          var password = document.getElementsByClassName("signup-password-input")[0].value;
          var confirmFeedback = "";
              
          
          if (!(confirm == password)){   
              confirmFeedback = "Passwords must match. ";}
              
          document.getElementsByClassName("signup-confirm-verify")[0].textContent = confirmFeedback;
          return confirmFeedback;
      }
      function signupValidate(){
          var checker = "";
          var success = "Sign up processing"
          var failure = "Please review sign info"
          checker += signupNameVerify();
          checker += signupSurnameVerify();
          checker += signupNumberVerify();
          checker += signupEmailVerify();
          checker += signupPasswordVerify();
          checker += signupConfirmVerify();

          if (checker == ""){
            document.getElementsByClassName("signup-button")[0].style.pointerEvents = 'auto';
          }
          
        

      }
  </script>

  <section class='clearfix container'>
    <div class="section-header">
        <h3 class="cat-heading">Sign up</h3>
    </div>
    <div class='signup-container clearfix'>
        <div class="signup-window">
            <div class="signup-elements">
            <form method="post" action="signup2.php">

                <label class="signup-name">Name: </label>
                <input onchange="signupNameVerify()" class="signup-name-input" type="text" maxlength="68" name="name">
                <p class = "verify-prompt signup-name-verify"></p>

                <label class="signup-surname">Surname: </label>
                <input onchange="signupSurnameVerify()" class="signup-surname-input" type="text" maxlength="68" name="surname"> 
                <p class ="verify-prompt signup-surname-verify"></p>

                <label class="signup-number">Contact #: </label>
                <input onchange="signupNumberVerify()" class="signup-number-input" type="text" maxlength="10" name="contact">
                <p class = "verify-prompt signup-number-verify"></p>

                <label class="signup-email">Email:</label>
                <input onchange="signupEmailVerify()" class="signup-email-input" type="text" maxlength="128" name="email"> 
                <p class = "verify-prompt signup-email-verify"></p>

                <label class="signup-password">Password:</label>
                <input onchange="signupPasswordVerify()" class="signup-password-input" type="password" name="pass"> 
                <p class = "verify-prompt signup-password-verify"></p>

                <label class="signup-confirm">Confirm: </label> 
                <input onchange="signupConfirmVerify(); signupValidate();" class="signup-confirm-input" type="password" name="confirm">
                <p class = "verify-prompt signup-confirm-verify"></p><br>
                
                <input type="submit" style="pointer-events: none;" class="signup-button" value="Signup">
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