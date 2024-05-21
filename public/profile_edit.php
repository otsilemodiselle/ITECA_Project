<?php
   require_once 'functions.php';

   session_start();

   

   require_once 'above_nav_content.php';

   require_once 'load_profile_data.php';

   $customer_id = $_SESSION['customer_id'];

  if (isset($_POST['save-name-edit']))
  {
    $new_name = sanitizeString($_POST['name-edit-input']);
    $formatted_name = ucfirst(strtolower($new_name));
    update_name($pdo, $formatted_name, $customer_id);
    header('location: projectProfileEditPHPForm.php');
    exit;
  }

  if (isset($_POST['save-surname-edit']))
  {
    $new_surname = sanitizeString($_POST['surname-edit-input']);
    $formatted_surname = ucfirst(strtolower($new_surname));
    update_surname($pdo, $formatted_surname, $customer_id);
    header('location: projectProfileEditPHPForm.php');
    exit;
  }

  if (isset($_POST['save-contact-edit']))
  {
    $new_contact = sanitizeString($_POST['number-edit-input']);
    update_contact($pdo, $new_contact, $customer_id);
    header('location: projectProfileEditPHPForm.php');
    exit;
  }

  if (isset($_POST['save-email-edit']))
  {
    $new_email = sanitizeString($_POST['email-edit-input']);
    update_email($pdo, $new_email, $customer_id);
    header('location: projectProfileEditPHPForm.php');
    exit;
  }

  if (isset($_POST['save-card-edit']))
  {
    $new_card = sanitizeString($_POST['card-edit-input']);
    update_card($pdo, $new_card, $customer_id);
    header('location: projectProfileEditPHPForm.php');
    exit;
  }

  if (isset($_POST['save-exp-edit']))
  {
    $exp_date = sanitizeString($_POST['exp-edit-input']);
    update_exp($pdo, $exp_date, $customer_id);
    header('location: projectProfileEditPHPForm.php');
    exit;
  }

  if (isset($_POST['save-address-edit']))
  {
    $street = sanitizeString($_POST['street-edit-input']);
    $suburb = sanitizeString($_POST['suburb-edit-input']);
    $city = sanitizeString($_POST['city-edit-input']);
    $code = sanitizeString($_POST['code-edit-input']);
    $address = $street . ', ' . $suburb . ', ' . $city . ', ' . $code;
    update_address($pdo, $address, $customer_id);
    header('location: projectProfileEditPHPForm.php');
    exit;
  }

  if (isset($_POST['save-password-edit']))
  {
    $password = sanitizeString($_POST['password-edit-input']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    update_password($pdo, $hashed_password, $customer_id);
    header('location: projectProfileEditPHPForm.php');
    exit;
  }

  $card_no = maskCard($card_no);

  echo<<<_END
  <section class='clearfix container'>
    <div class="section-header">
        <h3 class="cat-heading">Edit Profile</h3>
    </div>
    
    <div class='profileview-container clearfix'>
        
        <div class="edit-div edit-name-div clearfix">
            <label for="" class="edit-caption">Name: </label>
            <label for="" class="current-data current-name">$name</label>
            <button class="edit-button edit-name button" onclick="showEditName()">Edit</button><br><br>
            <form method="post" action="projectProfileEditPHPForm.php">
            <div class="edit-elements edit-elements-name" hidden>                
                <input onchange="editName(); nameSaveEnable();" type="text" class="edit-input edit-name-input" maxlength="68" name="name-edit-input"><br>
                <label for="" class="edit-verify-feedback edit-name-verify"></label><br>
                <input type="submit" name="save-name-edit" class="save-edit save-name-edit button" style="pointer-events: none;" value="Save">
                <button class="cancel-edit cancel-name-edit button" onclick="hideEditName()" >Cancel</button>
            </div>
            </form>
        </div>

        <div class="edit-div edit-surname-div clearfix">
            <label for="" class="edit-caption">Surname: </label>
            <label for="" class="current-data current-surname">$surname</label>
            <button class="edit-button edit-surname button" onclick="showEditSurname()">Edit</button><br><br>
            <form method="post" action="projectProfileEditPHPForm.php">
            <div  class="edit-elements edit-elements-surname" hidden>
                <input type="text" name="surname-edit-input" class="edit-input edit-surname-input" maxlength="68" onchange="editSurname(); surnameSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-surname-verify"></label><br>
                <input type="submit" name="save-surname-edit" class="save-edit save-surname-edit button" style="pointer-events: none;" value="Save">
                <button class="cancel-edit cancel-surname-edit button" onclick="hideEditSurname()">Cancel</button>
            </div>
            </form>
        </div>

        <div class="edit-div edit-number-div clearfix">
            <label for="" class="edit-caption">Contact no: </label>
            <label for="" class="current-data current-number">$contact</label>
            <button class="edit-button edit-number button" onclick="showEditNumber()">Edit</button><br><br>
            <form method="post" action="projectProfileEditPHPForm.php">
            <div class="edit-elements edit-elements-number" hidden>
                <input type="text" name="number-edit-input" class="edit-input edit-number-input" maxlength="10" onchange="editNumber(); numberSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-number-verify"></label><br>
                <input type="submit" name="save-contact-edit" class="save-edit save-number-edit button" style="pointer-events: none;" value="Save">
                <button class="cancel-edit cancel-number-edit button" onclick="hideEditNumber()">Cancel</button>
            </div>
            </form>
        </div>

        <div class="edit-div edit-email-div clearfix">
            <label for="" class="edit-caption">Email: </label>
            <label for="" class="current-data current-email">$email</label>
            <button class="edit-button edit-email button" onclick="showEditEmail()">Edit</button><br><br>
            <form method="post" action="projectProfileEditPHPForm.php">
            <div  class="edit-elements edit-elements-email" hidden>
                <input type="text" name="email-edit-input" class="edit-input edit-email-input" maxlength="128" onchange="editEmail(); emailSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-email-verify"></label><br>
                <input type="submit" name="save-email-edit" class="save-edit save-email-edit button" style="pointer-events: none;" value="Save">
                <button class="cancel-edit cancel-email-edit button" onclick="hideEditEmail()">Cancel</button>
            </div>
            </form>
        </div>

        <div class="edit-div edit-card-div clearfix">
            <label for="" class="edit-caption">Card no: </label>
            <label for="" class="current-data current-card">$card_no</label>
            <button class="edit-button edit-card button" onclick="showEditCard()">Edit</button><br><br>
            <form method="post" action="projectProfileEditPHPForm.php">
            <div  class="edit-elements edit-elements-card" hidden>
                <input type="text" name="card-edit-input" class="edit-input edit-card-input" maxlength="16" onchange="editCard(); cardSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-card-verify"></label><br>    
                <input type="submit" name="save-card-edit" class="save-edit save-card-edit button" style="pointer-events: none;" value="Save">
                <button class="cancel-edit cancel-card-edit button" onclick="hideEditCard()" >Cancel</button>
            </div>
            </form>
        </div>

        <div class="edit-div edit-expiry-div clearfix">
            <label for="" class="edit-caption">Expiry Date: </label>
            <label for="" class="current-data current-expiry">$exp_date</label>
            <button class="edit-button edit-expiry button" onclick="showEditExpiry()">Edit</button><br><br>
            <form method="post" action="projectProfileEditPHPForm.php">
            <div class="edit-elements edit-elements-expiry" hidden>
                <input type="text" name="exp-edit-input" class="edit-input edit-expiry-input" maxlength="4" onchange="editExpiry(); expSaveEnable();"><br>
                <label for="" class="edit-verify-feedback edit-expiry-verify"></label><br>
                <input type="submit" name="save-exp-edit" class="save-edit save-expiry-edit button" style="pointer-events: none;" value="Save">
                <button class="cancel-edit cancel-expiry-edit button" onclick="hideEditExpiry()">Cancel</button>
            </div>
            </form>
        </div>

        <div class="edit-div edit-address-div clearfix">
            <label for="" class="edit-caption">Delivery Address: </label><br>
            <label for="" class="current-data current-address">$address</label>
            <button class="edit-button edit-address button" onclick="showEditAddress()">Edit</button><br><br>
            <form method="post" action="projectProfileEditPHPForm.php">
            <div class="edit-elements edit-elements-address" hidden>
                <div class="edit-captions-address-div">
                    <label for="" class="edit-caption">Street Address: </label><br>
                    <label for="" class="edit-caption">Suburb: </label><br>
                    <label for="" class="edit-caption">City: </label><br>
                    <label for="" class="edit-caption">Area Code: </label><br>
                
                </div>
                <div class="edit-inputs-address-div">
                    <input type="text" name="street-edit-input" class="edit-input edit-street-input" onchange="editAddress(); addressSaveEnable();"><br>
                    <input type="text" name="suburb-edit-input" class="edit-input edit-suburb-input" onchange="editAddress(); addressSaveEnable();"><br>
                    <input type="text" name="city-edit-input" class="edit-input edit-city-input" onchange="editAddress(); addressSaveEnable();"><br>
                    <input maxlength="4" name="code-edit-input" type="text" class="edit-input edit-code-input" onchange="editAddress(); addressSaveEnable();"><br>
                </div>
                <br><br><br><br>         
                <div class="edit-verification-div">
                    <label for="" class="edit-verify-feedback edit-address-verify"><label><br>
                </div>     
                <div class="edit-buttons-div">
                    <input type="submit" name="save-address-edit" class="save-edit save-address-edit button" style="pointer-events: none;" value="Save">
                    <button class="cancel-edit cancel-address-edit button" onclick="hideEditAddress()">Cancel</button>
                </div>  
            
            
            </div>  
            </form>  
            
        </div>

        <div class="edit-div edit-password-div clearfix">
            <label for="" class="edit-caption">Password: </label>
            <label for="" class="current-data current-password">******</label>
            <button class="edit-button edit-password" onclick="showEditPassword()">Edit</button><br><br>
            <form method="post" action="projectProfileEditPHPForm.php">
            <div class="edit-elements edit-elements-password" hidden>
                <div class="edit-captions-password-div">
                    <label for="" class="edit-caption">New Password: </label><br>
                    <label for="" class="edit-caption">Confirm Password:</label>
                </div>
                <div class="edit-inputs-password-div">
                    <input type="text" class="edit-input edit-password-input" maxlength="255" onchange="editPassword();passwordSaveEnable();"><br>
                    <input type="text" name="password-edit-input" class="edit-input edit-confirm-input" maxlength="255" onchange="editPassword(); passwordSaveEnable();"><br>
                    
                </div>
                <div class="edit-verification-div">
                    <label for="" class="edit-verify-feedback edit-password-verify"></label><br>
                </div>
                <div class="edit-buttons-div">
                    <input type="submit" name="save-password-edit" class="save-edit save-password-edit button" style="pointer-events: none;" value="Save">
                    <button class="cancel-edit cancel-password-edit button" onclick="hideEditPassword()">Cancel</button>
                </div>
                
            </div>
            </form>
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