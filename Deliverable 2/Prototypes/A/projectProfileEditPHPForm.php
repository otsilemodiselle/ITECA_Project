<?php
   require_once 'functions.php';

   session_start();

   require_once 'above_nav_content.php';

  echo<<<_END
  <section class='clearfix container'>
    <div class="section-header">
        <h3 class="cat-heading">Edit Profile</h3>
    </div>
    <div class='profileview-container clearfix'>
       
        <div class="edit-div edit-name-div clearfix">
            <label for="" class="edit-caption">Name: </label>
            <label for="" class="current-data current-name">Otsile</label>
            <button class="edit-button edit-name" onclick="showEditName()">Edit</button><br><br>
            <div class="edit-elements edit-elements-name" hidden>
                <input type="text" class="edit-input edit-name-input" maxlength="68" onchange="editName()"><br>
                <label for="" class="edit-verify-feedback edit-name-verify"></label><br>
                <button class="save-edit save-name-edit" >Save</button>
                <button class="cancel-edit cancel-name-edit" onclick="hideEditName()" >Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-surname-div clearfix">
            <label for="" class="edit-caption">Surname: </label>
            <label for="" class="current-data current-surname">Modiselle</label>
            <button class="edit-button edit-surname" onclick="showEditSurname()">Edit</button><br><br>
            <div  class="edit-elements edit-elements-surname" hidden>
                <input type="text" class="edit-input edit-surname-input" maxlength="68" onchange="editSurname()"><br>
                <label for="" class="edit-verify-feedback edit-surname-verify"></label><br>
                <button class="save-edit save-surname-edit" >Save</button>
                <button class="cancel-edit cancel-surname-edit" onclick="hideEditSurname()">Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-number-div clearfix">
            <label for="" class="edit-caption">Contact no: </label>
            <label for="" class="current-data current-number">0615022558</label>
            <button class="edit-button edit-number" onclick="showEditNumber()">Edit</button><br><br>
            <div class="edit-elements edit-elements-number" hidden>
                <input type="text" class="edit-input edit-number-input" maxlength="10" onchange="editNumber()"><br>
                <label for="" class="edit-verify-feedback edit-number-verify"></label><br>
                <button class="save-edit save-number-edit" >Save</button>
                <button class="cancel-edit cancel-number-edit" onclick="hideEditNumber()">Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-email-div clearfix">
            <label for="" class="edit-caption">Email: </label>
            <label for="" class="current-data current-email">iamotsile@gmail.com</label>
            <button class="edit-button edit-email" onclick="showEditEmail()">Edit</button><br><br>
            <div  class="edit-elements edit-elements-email" hidden>
                <input type="text" class="edit-input edit-email-input" maxlength="128" onchange="editEmail()"><br>
                <label for="" class="edit-verify-feedback edit-email-verify"></label><br>
                <button class="save-edit save-email-edit" >Save</button>
                <button class="cancel-edit cancel-email-edit" onclick="hideEditEmail()">Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-card-div clearfix">
            <label for="" class="edit-caption">Card no: </label>
            <label for="" class="current-data current-card">4480 **** **** 6000</label>
            <button class="edit-button edit-card" onclick="showEditCard()">Edit</button><br><br>
            <div  class="edit-elements edit-elements-card" hidden>
                <input type="text" class="edit-input edit-card-input" maxlength="16" onchange="editCard()"><br>
                <label for="" class="edit-verify-feedback edit-card-verify"></label><br>    
                <button class="save-edit save-card-edit" >Save</button>
                <button class="cancel-edit cancel-card-edit" onclick="hideEditCard()" >Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-expiry-div clearfix">
            <label for="" class="edit-caption">Expiry Date: </label>
            <label for="" class="current-data current-expiry">03/29</label>
            <button class="edit-button edit-expiry" onclick="showEditExpiry()">Edit</button><br><br>
            <div class="edit-elements edit-elements-expiry" hidden>
                <input type="text" class="edit-input edit-expiry-input" maxlength="4" onchange="editExpiry()"><br>
                <label for="" class="edit-verify-feedback edit-expiry-verify">test</label><br>
                <button class="save-edit save-expiry-edit" >Save</button>
                <button class="cancel-edit cancel-expiry-edit" onclick="hideEditExpiry()">Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-address-div clearfix">
            <label for="" class="edit-caption">Delivery Address: </label><br>
            <label for="" class="current-data current-address">447 Acorn Road, Lynnwood Glen, Pretoria, 0081</label>
            <button class="edit-button edit-address" onclick="showEditAddress()">Edit</button><br><br>
            <div class="edit-elements edit-elements-address" hidden>
                <div class="edit-captions-address-div">
                    <label for="" class="edit-caption">Street Address: </label><br>
                    <label for="" class="edit-caption">Suburb: </label><br>
                    <label for="" class="edit-caption">City: </label><br>
                    <label for="" class="edit-caption">Area Code: </label><br>
                
                </div>
                <div class="edit-inputs-address-div">
                    <input type="text" class="edit-input edit-street-input" ><br>
                    <input type="text" class="edit-input edit-suburb-input" ><br>
                    <input type="text" class="edit-input edit-city-input" ><br>
                    <input maxlength="4" type="text" class="edit-input edit-code-input" onchange="editAddress()"><br>
                </div>
                <br><br><br><br>         
                <div class="edit-verification-div">
                    <label for="" class="edit-verify-feedback edit-address-verify"><label><br>
                </div>     
                <div class="edit-buttons-div">
                    <button class="save-edit save-name-edit" >Save</button>
                    <button class="cancel-edit cancel-name-edit" onclick="hideEditAddress()">Cancel</button>
                </div>  
            
            
            </div>    
            
        </div>

        <div class="edit-div edit-password-div clearfix">
            <label for="" class="edit-caption">Password: </label>
            <label for="" class="current-data current-password">******</label>
            <button class="edit-button edit-password" onclick="showEditPassword()">Edit</button><br><br>
            <div class="edit-elements edit-elements-password" hidden>
                <div class="edit-captions-password-div">
                    <label for="" class="edit-caption">New Password: </label><br>
                    <label for="" class="edit-caption">Confirm Password:</label>
                </div>
                <div class="edit-inputs-password-div">
                    <input type="password" class="edit-input edit-password-input" maxlength="255" onkeyup="editPassword()"><br>
                    <input type="password" class="edit-input edit-confirm-input" maxlength="255" onkeyup="editPassword()"><br>
                    
                </div>
                <div class="edit-verification-div">
                    <label for="" class="edit-verify-feedback edit-password-verify"></label><br>
                </div>
                <div class="edit-buttons-div">
                    <button class="save-edit save-password-edit" >Save</button>
                    <button class="cancel-edit cancel-password-edit" onclick="hideEditPassword()">Cancel</button>
                </div>
                
            </div>
        </div>
        
        
    </div>
  </section>

    <footer>
        <div class='end'>
            
        </div>
    </footer>
    <script src="profileEdit.js"></script>
    </body>
    </html>
  _END;
?>