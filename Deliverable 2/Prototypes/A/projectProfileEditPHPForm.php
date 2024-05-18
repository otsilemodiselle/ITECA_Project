<?php
   require_once 'functions.php';

   session_start();

   require_once 'above_nav_content.php';

   require_once 'load_profile_data.php';

  echo<<<_END
  <section class='clearfix container'>
    <div class="section-header">
        <h3 class="cat-heading">Edit Profile</h3>
    </div>
    <div class='profileview-container clearfix'>
       
        <div class="edit-div edit-name-div clearfix">
            <label for="" class="edit-caption">Name: </label>
            <label for="" class="current-data current-name">$name</label>
            <button class="edit-button edit-name" onclick="showEditName()">Edit</button><br><br>
            <div class="edit-elements edit-elements-name" hidden>
                <input onchange="editName(); nameSaveEnable();" type="text" class="edit-input edit-name-input" maxlength="68" name="name-edit-input"><br>
                <label for="" class="edit-verify-feedback edit-name-verify"></label><br>
                <button class="save-edit save-name-edit" style="pointer-events: none;">Save</button>
                <button class="cancel-edit cancel-name-edit" onclick="hideEditName()" >Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-surname-div clearfix">
            <label for="" class="edit-caption">Surname: </label>
            <label for="" class="current-data current-surname">$surname</label>
            <button class="edit-button edit-surname" onclick="showEditSurname()">Edit</button><br><br>
            <div  class="edit-elements edit-elements-surname" hidden>
                <input type="text" class="edit-input edit-surname-input" maxlength="68" onchange="editSurname(); surnameSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-surname-verify"></label><br>
                <button class="save-edit save-surname-edit" style="pointer-events: none;">Save</button>
                <button class="cancel-edit cancel-surname-edit" onclick="hideEditSurname()">Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-number-div clearfix">
            <label for="" class="edit-caption">Contact no: </label>
            <label for="" class="current-data current-number">$contact</label>
            <button class="edit-button edit-number" onclick="showEditNumber()">Edit</button><br><br>
            <div class="edit-elements edit-elements-number" hidden>
                <input type="text" class="edit-input edit-number-input" maxlength="10" onchange="editNumber(); numberSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-number-verify"></label><br>
                <button class="save-edit save-number-edit" style="pointer-events: none;">Save</button>
                <button class="cancel-edit cancel-number-edit" onclick="hideEditNumber()">Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-email-div clearfix">
            <label for="" class="edit-caption">Email: </label>
            <label for="" class="current-data current-email">$email</label>
            <button class="edit-button edit-email" onclick="showEditEmail()">Edit</button><br><br>
            <div  class="edit-elements edit-elements-email" hidden>
                <input type="text" class="edit-input edit-email-input" maxlength="128" onchange="editEmail(); emailSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-email-verify"></label><br>
                <button class="save-edit save-email-edit" style="pointer-events: none;">Save</button>
                <button class="cancel-edit cancel-email-edit" onclick="hideEditEmail()">Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-card-div clearfix">
            <label for="" class="edit-caption">Card no: </label>
            <label for="" class="current-data current-card">$card_no</label>
            <button class="edit-button edit-card" onclick="showEditCard()">Edit</button><br><br>
            <div  class="edit-elements edit-elements-card" hidden>
                <input type="text" class="edit-input edit-card-input" maxlength="16" onchange="editCard(); cardSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-card-verify"></label><br>    
                <button class="save-edit save-card-edit" style="pointer-events: none;">Save</button>
                <button class="cancel-edit cancel-card-edit" onclick="hideEditCard()" >Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-expiry-div clearfix">
            <label for="" class="edit-caption">Expiry Date: </label>
            <label for="" class="current-data current-expiry">$exp_date</label>
            <button class="edit-button edit-expiry" onclick="showEditExpiry()">Edit</button><br><br>
            <div class="edit-elements edit-elements-expiry" hidden>
                <input type="text" class="edit-input edit-expiry-input" maxlength="4" onchange="editExpiry(); expSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-expiry-verify"></label><br>
                <button class="save-edit save-expiry-edit" style="pointer-events: none;">Save</button>
                <button class="cancel-edit cancel-expiry-edit" onclick="hideEditExpiry()">Cancel</button>
            </div>
        </div>

        <div class="edit-div edit-address-div clearfix">
            <label for="" class="edit-caption">Delivery Address: </label><br>
            <label for="" class="current-data current-address">$address</label>
            <button class="edit-button edit-address" onclick="showEditAddress()">Edit</button><br><br>
            <div class="edit-elements edit-elements-address" hidden>
                <div class="edit-captions-address-div">
                    <label for="" class="edit-caption">Street Address: </label><br>
                    <label for="" class="edit-caption">Suburb: </label><br>
                    <label for="" class="edit-caption">City: </label><br>
                    <label for="" class="edit-caption">Area Code: </label><br>
                
                </div>
                <div class="edit-inputs-address-div">
                    <input type="text" class="edit-input edit-street-input" onchange="editAddress(); addressSaveEnable();"><br>
                    <input type="text" class="edit-input edit-suburb-input" onchange="editAddress(); addressSaveEnable();"><br>
                    <input type="text" class="edit-input edit-city-input" onchange="editAddress(); addressSaveEnable();"><br>
                    <input maxlength="4" type="text" class="edit-input edit-code-input" onchange="editAddress(); addressSaveEnable();"><br>
                </div>
                <br><br><br><br>         
                <div class="edit-verification-div">
                    <label for="" class="edit-verify-feedback edit-address-verify"><label><br>
                </div>     
                <div class="edit-buttons-div">
                    <button class="save-edit save-address-edit" style="pointer-events: none;">Save</button>
                    <button class="cancel-edit cancel-address-edit" onclick="hideEditAddress()">Cancel</button>
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
                    <input type="text" class="edit-input edit-password-input" maxlength="255" onchange="editPassword();passwordSaveEnable();"><br>
                    <input type="text" class="edit-input edit-confirm-input" maxlength="255" onchange="editPassword(); passwordSaveEnable();"><br>
                    
                </div>
                <div class="edit-verification-div">
                    <label for="" class="edit-verify-feedback edit-password-verify"></label><br>
                </div>
                <div class="edit-buttons-div">
                    <button class="save-edit save-password-edit" style="pointer-events: none;">Save</button>
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