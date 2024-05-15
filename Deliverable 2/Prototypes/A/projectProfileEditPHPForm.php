<?php
   require_once 'functions.php';

   session_start();

   require_once 'above_nav_content.php';

   echo<<<_END
   <script>

        function showEditName(){
            document.getElementsByClassName("edit-elements-name")[0].hidden =false;
            document.getElementsByClassName("edit-name")[0].hidden =true;
        }
        function hideEditName(){
            document.getElementsByClassName("edit-elements-name")[0].hidden =true;
            document.getElementsByClassName("edit-name")[0].hidden =false;
            document.getElementsByClassName("edit-name-input")[0].value = "";
            document.getElementsByClassName("edit-name-verify")[0].textContent = "";
        }

        function showEditSurname(){
            document.getElementsByClassName("edit-elements-surname")[0].hidden =false;
            document.getElementsByClassName("edit-surname")[0].hidden =true;
        }
        function hideEditSurname(){
            document.getElementsByClassName("edit-elements-surname")[0].hidden =true;
            document.getElementsByClassName("edit-surname")[0].hidden =false;
            document.getElementsByClassName("edit-surname-input")[0].value = "";
            document.getElementsByClassName("edit-surname-verify")[0].textContent = "";
            
        }

        function showEditNumber(){
            document.getElementsByClassName("edit-elements-number")[0].hidden =false;
            document.getElementsByClassName("edit-number")[0].hidden =true;
        }
        function hideEditNumber(){
            document.getElementsByClassName("edit-elements-number")[0].hidden =true;
            document.getElementsByClassName("edit-number")[0].hidden =false;
            document.getElementsByClassName("edit-number-input")[0].value = "";
            document.getElementsByClassName("edit-number-verify")[0].textContent = "";
        }

        function showEditEmail(){
            document.getElementsByClassName("edit-elements-email")[0].hidden =false;
            document.getElementsByClassName("edit-email")[0].hidden =true;
        }
        function hideEditEmail(){
            document.getElementsByClassName("edit-elements-email")[0].hidden =true;
            document.getElementsByClassName("edit-email")[0].hidden =false;
            document.getElementsByClassName("edit-email-input")[0].value = "";
            document.getElementsByClassName("edit-email-verify")[0].textContent = "";
        }

        function showEditCard(){
            document.getElementsByClassName("edit-elements-card")[0].hidden =false;
            document.getElementsByClassName("edit-card")[0].hidden =true;
        }
        function hideEditCard(){
            document.getElementsByClassName("edit-elements-card")[0].hidden =true;
            document.getElementsByClassName("edit-card")[0].hidden =false;
            document.getElementsByClassName("edit-card-input")[0].value = "";
            document.getElementsByClassName("edit-card-verify")[0].textContent = "";
        }

        function showEditExpiry(){
            document.getElementsByClassName("edit-elements-expiry")[0].hidden =false;
            document.getElementsByClassName("edit-expiry")[0].hidden =true;
        }
        function hideEditExpiry(){
            document.getElementsByClassName("edit-elements-expiry")[0].hidden =true;
            document.getElementsByClassName("edit-expiry")[0].hidden =false;
            document.getElementsByClassName("edit-expiry-input")[0].value = "";
            document.getElementsByClassName("edit-expiry-verify")[0].textContent = "";
        }

        function showEditAddress(){
            document.getElementsByClassName("edit-elements-address")[0].hidden =false;
            document.getElementsByClassName("edit-address")[0].hidden =true;
        }
        function hideEditAddress(){
            document.getElementsByClassName("edit-elements-address")[0].hidden =true;
            document.getElementsByClassName("edit-address")[0].hidden =false;
            document.getElementsByClassName("edit-street-input")[0].value = "";
            document.getElementsByClassName("edit-suburb-input")[0].value = "";
            document.getElementsByClassName("edit-city-input")[0].value = "";
            document.getElementsByClassName("edit-code-input")[0].value = "";
            document.getElementsByClassName("edit-address-verify")[0].textContent = "";
        }

        function showEditPassword(){
            document.getElementsByClassName("edit-elements-password")[0].hidden =false;
            document.getElementsByClassName("edit-password")[0].hidden =true;
        }
        function hideEditPassword(){
            document.getElementsByClassName("edit-elements-password")[0].hidden =true;
            document.getElementsByClassName("edit-password")[0].hidden =false;
            document.getElementsByClassName("edit-password-input")[0].value = "";
            document.getElementsByClassName("edit-confirm-input")[0].value = "";
            document.getElementsByClassName("edit-password-verify")[0].textContent = "";
        }

        function editName(){
            var name = document.getElementsByClassName("edit-name-input")[0].value;
            var nameFeedback = "";
            var alphabetical = /^[a-zA-Z]+$/;       
            
            if (name.length < 2){   
                nameFeedback = "Name too short. ";}
            if (!alphabetical.test(name)){
                nameFeedback += "\n Alphabetical characters only.";}      
            document.getElementsByClassName("edit-name-verify")[0].textContent = nameFeedback;
        }

        function editSurname(){
            var surname = document.getElementsByClassName("edit-surname-input")[0].value;
            var surnameFeedback = "";
            var alphabetical = /^[a-zA-Z]+$/;       
            
            if (surname.length < 2){   
                surnameFeedback = "Same too short. ";}
            if (!alphabetical.test(surname)){
                surnameFeedback += "\n Alphabetical characters only."}      
            document.getElementsByClassName("edit-surname-verify")[0].textContent = surnameFeedback;
            }

        function editNumber(){
            var number = document.getElementsByClassName("edit-number-input")[0].value;
            var numberFeedback = "";
            var numerical = /^[\d/]+$/;       
        
            if (number.length < 10){   
                numberFeedback = "Contact no. must be 10 digits. ";}
            if (!numerical.test(number)){
                numberFeedback += "Numeric characters only."}      
            document.getElementsByClassName("edit-number-verify")[0].textContent = numberFeedback;
        }

        function editEmail(){
            var email = document.getElementsByClassName("edit-email-input")[0].value;
            var emailFeedback = "";
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;       
        
            if (!emailPattern.test(email)){
                emailFeedback = "\n Email format incorrect."}      
            document.getElementsByClassName("edit-email-verify")[0].textContent = emailFeedback;
        }

        function editPassword(){
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

        function editCard(){
            var card = document.getElementsByClassName("edit-card-input")[0].value;
            var cardFeedback ="";
            var numerical = /^[\d/]+$/; 

            if (card.length < 16){   
                cardFeedback = "Card no. must be 16 digits. ";}
            if (!numerical.test(card)){
                cardFeedback += "\n Numeric characters only."}      
            document.getElementsByClassName("edit-card-verify")[0].textContent = cardFeedback;
        }

        function editExpiry(){
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

        function editAddress(){
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
  _END;

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
    </body>
    </html>
  _END;
?>