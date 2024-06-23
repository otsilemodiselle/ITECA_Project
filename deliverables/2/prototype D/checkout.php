<?php
  
  require_once 'src/functions.php';
  require_once 'src/login.php';
  require_once 'src/header.php';

  echo <<<_END
   <main>
    
    <section class="section-checkout">

      <div class="checkout-container">

        <div class="checkout-details">
          <h2>Delivery Details</h2>
          
          <div class="delivery-details">
            <p>
            123, Tiger Street, Durban, 1308
            </p>

            <p>
              083 123 4567
            </p>
            <button class="checkout-edit-btn " id="open-address-modal">
              <svg class="edit-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>
            </button>
          </div>

          <br>

          <h2>Payment Method</h2>

          <div class="payment-details">
            <p>
            Susan Miller
            </p>
            <p>
              xxxx-4011
            </p>
            <div>
              <label for="cvc-box">CVC:</label>
              <input class="cvc-box" type="text" required maxlength="3" placeholder="---">
            </div>
            <button class="checkout-edit-btn " id="open-payment-method-modal">
              <svg  class="edit-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>
            </button>
          </div>

        </div>

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

            <button class="btn-pay-now">
              PAY NOW
            </button>
            
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
            <option value="">Kwa-Zulu-Natal</option>
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
            <img class="card-type-logo" src="visa.svg" alt="">
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
  _END;

  require_once 'src/footer.php';
?>