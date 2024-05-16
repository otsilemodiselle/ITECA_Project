<?php
  require_once 'functions.php';
  sesion_start();
  require_once 'above_nav_content.php';

  $customer_id = $_SESSION['customer_id'];

  echo<<<_END
    <section class='clearfix container'>
    <div class="section-header">
        <h3 class="cat-heading">Profile View</h3>
    </div>
    
        <div class="customer-details clearfix">
            <p class="personal-details">
                Otsile Modiselle<br>
                0615022558<br>
                iamotsile@gmail.com
            </p>
            <button class="personal-edit">
                Edit
            </button>
        </div>
        <div class="customer-payment clearfix">
            <p class="customer-pay-details">
                Card: VISA ****5017<br>
                Expiry Date: 03/26
                <br>447 Acorn Rd, Pretoria, 0081
            </p>
            <button class="customer-pay-edit">
                Edit
            </button>
        </div>
        <br>
        <div class="myorders-subsection">
            <div class="subsection-header clearfix">
                <h3 class="cat-heading">My Orders</h3>
            </div>
            <div class='myorders-container'>
  _END;

  echo<<<_END
    <div class='myorder-banner clearfix'>
    <p class="myorder-detail-panel">Order ref: XXXXXXX Total: R4500  Date: 2023/12/01</p>                
        <button class="log-return">
            Log a Return
        </button>
    </div>
  _END;

  echo<<<_END
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