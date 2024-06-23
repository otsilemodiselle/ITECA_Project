<?php
  
  require_once 'src/functions.php';
  require_once 'src/login.php';
  require_once 'src/header.php';

  echo <<<_END
   <main>
    
    <section class="section-cart">

      <div class="cart-container">

        <div class="cart-full">

          <div class="cart-order-summary">
            <h3>
              Order Summary
            </h3>
            <table>
              <tbody>
                <tr>
                  <td> Cart total</td>
                  <td>R4299</td>
                </tr>
                <tr>
                  <td>Delivery fee</td>
                  <td>R0</td>
                </tr>
                <tr>
                  <td class="bold-line">Order total</td>
                  <td class="bold-line">R4299</td>
                </tr>
                <tr>
                  <td class="table-directive">Total to pay</td>
                  <td class="table-directive">R4299</td>
                </tr>
              </tbody>
            </table>

            <button class="btn-checkout">
              Checkout
            </button>
            
          </div>

          <div class="cart-items-container">

            <div class="cart-item">
              <div class="cart-item-photocase">
                <img src="steel_blue_sports_suit.webp" alt="">
              </div>

              <a href="">&times;
              </a>

              <p class="cart-item-title">Velit ipsum autem</p>

              <p class="cart-item-size">M</p>

              <p class="cart-item-price">R4299</p>
            </div>

            <div class="cart-item">
              <div class="cart-item-photocase">
                <img src="ornate_empire_traditional_lace.webp" alt="">
              </div>

              <a class="cart-item-remover">&times;</a>

              <p class="cart-item-title">Velit ipsum autem</p>

              <p class="cart-item-size">S</p>

              <p class="cart-item-price">R4299</p>
            </div>


          </div>

        </div>

        <div class="cart-empty">
          <p>Cart is empty</p>

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
          </svg>

        </div>

      </div>

    </section>

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
  _END;

  require_once 'src/footer.php';
?>