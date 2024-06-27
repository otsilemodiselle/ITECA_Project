<?php

  echo <<<_END
    
        <section class="section-components">
          
          <div id="login-modal" class="modal">
            <form class="login-modal-content"  id="login-form" method="post" action="index.php">
              
              <span class="close-login">&times;</span>
              
              
              <div class="login-logo">
                <span class="logo-a">Bride</span>
                <span class="logo-b">&</span>
                <span class="logo-c">Joy</span>
              </div>
              <p class="login-slogan">Find your red carpet garment.</p>
              
              <div class="login-underline"></div>
              <h3 class="login-heading">Login</h3>
              <p class="login-instruction">Enter your email address and password to log in to your account.</p>

              <label for="login-email-box" class="login-label-email">Email</label>

              <input type="text" id="login-email-box" name="inputted-email" placeholder="me@example.com" required/>

              <label for="login-password-box" class="login-label-password">Password</label>

              <input type="password" name="inputted-password" id="login-password-box" required>
              
              <a href="#" onclick="document.getElementById('login-form').submit(); clearLoginEmail(); clearLoginPassword();" class="btn-submit-login">Login</a>
            </form>
              
            </form>
          </div>

          <div id="signup-modal" class="modal">
            <form class="signup-modal-content" method="post" id="signup-form" action="src/sign_up_script.php" >
              
              <span class="close-signup">&times;</span>
              
              
              <div class="signup-logo">
                <span class="logo-a">Bride</span>
                <span class="logo-b">&</span>
                <span class="logo-c">Joy</span>
              </div>
              <p class="signup-slogan">Find your red carpet garment.</p>
              
              <div class="signup-underline"></div>
              <h3 class="signup-heading">sign-up</h3>
              <p class="signup-instruction">Planning for a big day? Sign up</p>
                
              <label for="signup-email-box" class="signup-label-email">Email</label>
              <input type="text" id="signup-email-box" name="email" required/>
              <label for="signup-password-box" class="signup-label-password">Password</label>
              <input type="password" name="pass" id="signup-password-box" required>
              <label for="signup-name-box" class="signup-label-name">First Name</label>
              <input type="text" name="name" id="signup-name-box" required/>
              <label for="signup-surname-box" class="signup-label-surname">Last Name</label>
              <input type="text" name="surname" id="signup-surname-box" required/> 
                
              <input class="btn-submit-signup" value="Sign up" name="btn-sign-up" type="submit">
              
            </form>
          </div>

          <div id="address-modal" class="modal">
            <div class="address-modal-content">

              <span class="close-address">&times;</span>

              <h3 class="address-modal-header">Edit Delivery Details</h3>

              <label class="lbl-contact" for="edit-contact-box">Contact Number</label>

              <input type="text" id="edit-contact-box">

              <label class="lbl-street"  for="edit-street-box">Street address</label>

              <input type="text" id="edit-street-box">

              <label class="lbl-suburb"  for="edit-suburb-box">Suburb</label>

              <input type="text" id="edit-suburb-box">

              <label class="lbl-province"  for="edit-province-select">Province</label>

              <select name="province-selection" id="province-select-box">
                <option value="">Gauteng</option>
                <option value="">Limpopo</option>
                <option value="">Western Cape</option>
                <option value="">KwaZulu-Natal</option>
                <option value="">Mpumalanga</option>
                <option value="">Free State</option>
                <option value="">Northern Cape</option>
                <option value="">Eastern Cape</option>
                <option value="">Nothern West</option>
              </select>

              <label class="lbl-city"  for="edit-city-box">City</label>

              <input type="text" id="edit-city-box">

              <label class="lbl-postal"  for="edit-postal-box">Postal Code</label>

              <input type="text" id="edit-postal-box">

              <button class="btn-save-address">
                Save
              </button>
            </div>
          </div>

          <div id="payment-method-modal" class="modal">
            <div class="payment-method-content">

              <span class="close-payment-method">&times;</span>

              <h3 class="payment-method-header">Edit Card Details</h3>

              <label for="card-name-box" class="lbl-card-name">Name on Card</label>

              <input type="text" id="card-name-box">

              <label for="card-nubmer-box" id="lbl-card-number">Card Number</label>

              <input type="text" maxlength="16" id="card-number-box">

              <div class="card-type-photoframe">
                <img class="card-type-logo" src="images/visa.svg" alt="">
              </div>

              <label for="" class="lbl-expiry-date">Expiry Date</label>

              <select name="" id="month-selection-box">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
                <option value="">6</option>
                <option value="">7</option>
                <option value="">8</option>
                <option value="">9</option>
                <option value="">10</option>
                <option value="">11</option>
                <option value="">12</option>
              </select>

              <select name="" id="year-selection-box">
                <option value="">2024</option>
                <option value="">2025</option>
                <option value="">2025</option>
                <option value="">2026</option>
                <option value="">2027</option>
                <option value="">2028</option>
                <option value="">2029</option>
                <option value="">2030</option>
              </select>

              <button class="btn-payment-method-save">
                Save
              </button>
            </div>
          </div>

          <div id="payment-confirmatin" class="modal">
            <div class="payment-confirmatin-content">
              
              <h3>PAYMENT SUCCESSFUL</h3>

              <p>Your order is being fulfilled</p>

              <ion-icon name="checkmark-circle-outline"></ion-icon>

              <button>OK</button>

            </div>
          </div>

        </section>

      </main>

      <footer>

        <nav class="grid--4-cols">
          
          <div >
            <p class="footer-header">Contact us</p>
            <p>11 Aramist Street, 2nd Floor, Menlyn, Pretoria, 0081</p>
            <a href="tel:0871234567"> 087-123-4567</a>
            <a href="mailto:info@bridenjoy.co.za">info@bridenjoy.co.za</a>
          </div>

          <div>
            <p class="footer-header">Account</p>
            <a href="">Sign-up</a>
            <a href="">Login</a>
            <a href="">iOS app</a>
            <a href="">Android app</a>
          </div>

          <div>
            <p class="footer-header">Resources</p>
            <a href="">About Bride&Joy</a>
            <a href="">Careers</a>
            <a href="">Help center</a>
            <a href="">Privacy & Terms</a>
          </div>

          <div>
            <p class="footer-header">Free Delivery</p>
            <p>For any purchase over R1000</p>
            <p>Copyright &copy; 2027 by Bride&Joy Pty. Ltd., All rights reserved</p>
            <div class="footer-socials-box">
              <a href="">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
              <a href="">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
              <a href="">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </div>
          </div>

          <div class="payment-menthods-box ">
            <img class="logo-payment logo-visa" src="images/visa.svg" alt="">
            <img class="logo-payment logo-mastercard" src="images/mastercard.svg" alt="">
            <img class="logo-payment logo-amex" src="images/amex.svg" alt="">
            <img class="logo-payment logo-fnb" src="images/fnb.png" alt="">
            <img class="logo-payment logo-ebucks" src="images/ebucks.png" alt="">
            <img class="logo-payment logo-ozow" src="images/ozow.png" alt="">
            <img class="logo-payment logo-mobicred" src="images/mobicred.webp" alt="">
          </div>
        </nav>

        

      </footer>

      <script src="js/general_form_handling.js"></script>
      <script src="js/sub_menu.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
      <script src="js/login_modal.js"></script>
      <script src="js/signup_modal.js"></script>
      <script src="js/address_modal.js"></script>
      <script src="js/payment_method_modal.js></script>
    </body>
    </html>
  _END;
?>