<?php

  echo <<<_END
    
        <section class="section-components">
          
          <div id="login-modal" class="modal">
            <div class="login-modal-content" >
              
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
              <input type="text" id="login-email-box" placeholder="me@example.com" required/>
              <label for="login-password-box" class="login-label-password">Password</label>
              <input type="password" id="login-password-box" required>
                
              <a href="" class="btn-submit-login">Login</a>
              
            </div>
          </div>

          <div id="signup-modal" class="modal">
            <div class="signup-modal-content" >
              
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
              <input type="text" id="signup-email-box" placeholder="me@example.com" required/>
              <label for="signup-password-box" class="signup-label-password">Password</label>
              <input type="password" id="signup-password-box" required>
              <label for="signup-name-box" class="signup-label-name">First Name</label>
              <input type="text" id="signup-name-box" required/>
              <label for="signup-surname-box" class="signup-label-surname">Last Name</label>
              <input type="text" id="signup-surname-box" required/> 
                
              <a href="" class="btn-submit-signup">Login</a>
              
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