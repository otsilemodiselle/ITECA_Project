
  function showEditName()
  {
      document.getElementsByClassName("edit-elements-name")[0].hidden =false;
      document.getElementsByClassName("edit-name")[0].hidden =true;
  }

  function hideEditName()
  {
      document.getElementsByClassName("edit-elements-name")[0].hidden =true;
      document.getElementsByClassName("edit-name")[0].hidden =false;
      document.getElementsByClassName("edit-name-input")[0].value = "";
      document.getElementsByClassName("edit-name-verify")[0].textContent = "";
  }

  function showEditSurname()
  {
      document.getElementsByClassName("edit-elements-surname")[0].hidden =false;
      document.getElementsByClassName("edit-surname")[0].hidden =true;
  }

  function hideEditSurname()
  {
      document.getElementsByClassName("edit-elements-surname")[0].hidden =true;
      document.getElementsByClassName("edit-surname")[0].hidden =false;
      document.getElementsByClassName("edit-surname-input")[0].value = "";
      document.getElementsByClassName("edit-surname-verify")[0].textContent = "";   
  }

  function showEditNumber()
  {
      document.getElementsByClassName("edit-elements-number")[0].hidden =false;
      document.getElementsByClassName("edit-number")[0].hidden =true;
  }

  function hideEditNumber()
  {
      document.getElementsByClassName("edit-elements-number")[0].hidden =true;
      document.getElementsByClassName("edit-number")[0].hidden =false;
      document.getElementsByClassName("edit-number-input")[0].value = "";
      document.getElementsByClassName("edit-number-verify")[0].textContent = "";
  }

  function showEditEmail()
  {
      document.getElementsByClassName("edit-elements-email")[0].hidden =false;
      document.getElementsByClassName("edit-email")[0].hidden =true;
  }

  function hideEditEmail()
  {
      document.getElementsByClassName("edit-elements-email")[0].hidden =true;
      document.getElementsByClassName("edit-email")[0].hidden =false;
      document.getElementsByClassName("edit-email-input")[0].value = "";
      document.getElementsByClassName("edit-email-verify")[0].textContent = "";
  }

  function showEditCard()
  {
      document.getElementsByClassName("edit-elements-card")[0].hidden =false;
      document.getElementsByClassName("edit-card")[0].hidden =true;
  }

  function hideEditCard()
  {
      document.getElementsByClassName("edit-elements-card")[0].hidden =true;
      document.getElementsByClassName("edit-card")[0].hidden =false;
      document.getElementsByClassName("edit-card-input")[0].value = "";
      document.getElementsByClassName("edit-card-verify")[0].textContent = "";
  }

  function showEditExpiry()
  {
      document.getElementsByClassName("edit-elements-expiry")[0].hidden =false;
      document.getElementsByClassName("edit-expiry")[0].hidden =true;
  }

  function hideEditExpiry()
  {
      document.getElementsByClassName("edit-elements-expiry")[0].hidden =true;
      document.getElementsByClassName("edit-expiry")[0].hidden =false;
      document.getElementsByClassName("edit-expiry-input")[0].value = "";
      document.getElementsByClassName("edit-expiry-verify")[0].textContent = "";
  }

  function showEditAddress()
  {
      document.getElementsByClassName("edit-elements-address")[0].hidden =false;
      document.getElementsByClassName("edit-address")[0].hidden =true;
  }

  function hideEditAddress()
  {
      document.getElementsByClassName("edit-elements-address")[0].hidden =true;
      document.getElementsByClassName("edit-address")[0].hidden =false;
      document.getElementsByClassName("edit-street-input")[0].value = "";
      document.getElementsByClassName("edit-suburb-input")[0].value = "";
      document.getElementsByClassName("edit-city-input")[0].value = "";
      document.getElementsByClassName("edit-code-input")[0].value = "";
      document.getElementsByClassName("edit-address-verify")[0].textContent = "";
  }

  function showEditPassword()
  {
      document.getElementsByClassName("edit-elements-password")[0].hidden =false;
      document.getElementsByClassName("edit-password")[0].hidden =true;
  }

  function hideEditPassword()
  {
      document.getElementsByClassName("edit-elements-password")[0].hidden =true;
      document.getElementsByClassName("edit-password")[0].hidden =false;
      document.getElementsByClassName("edit-password-input")[0].value = "";
      document.getElementsByClassName("edit-confirm-input")[0].value = "";
      document.getElementsByClassName("edit-password-verify")[0].textContent = "";
  }

  function editName()
  {
      var name = document.getElementsByClassName("edit-name-input")[0].value;
      var nameFeedback = "";
      var alphabetical = /^[a-zA-Z]+$/;       
      
      if (name.length < 2){   
          nameFeedback = "Name too short. ";}
      if (!alphabetical.test(name)){
          nameFeedback += "\n Alphabetical characters only.";}      
      document.getElementsByClassName("edit-name-verify")[0].textContent = nameFeedback;
  }

  function editSurname()
  {
      var surname = document.getElementsByClassName("edit-surname-input")[0].value;
      var surnameFeedback = "";
      var alphabetical = /^[a-zA-Z]+$/;       
      
      if (surname.length < 2){   
          surnameFeedback = "Same too short. ";}
      if (!alphabetical.test(surname)){
          surnameFeedback += "\n Alphabetical characters only."}      
      document.getElementsByClassName("edit-surname-verify")[0].textContent = surnameFeedback;
  }

  function editNumber()
  {
      var number = document.getElementsByClassName("edit-number-input")[0].value;
      var numberFeedback = "";
      var numerical = /^[\d/]+$/;       

      if (number.length < 10){   
          numberFeedback = "Contact no. must be 10 digits. ";}
      if (!numerical.test(number)){
          numberFeedback += "Numeric characters only."}      
      document.getElementsByClassName("edit-number-verify")[0].textContent = numberFeedback;
  }

  function editEmail()
  {
      var email = document.getElementsByClassName("edit-email-input")[0].value;
      var emailFeedback = "";
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;       

      if (!emailPattern.test(email)){
          emailFeedback = "\n Email format incorrect."}      
      document.getElementsByClassName("edit-email-verify")[0].textContent = emailFeedback;
  }

  function editPassword()
  {
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

  function editCard()
  {
      var card = document.getElementsByClassName("edit-card-input")[0].value;
      var cardFeedback ="";
      var numerical = /^[\d/]+$/; 

      if (card.length < 16){   
          cardFeedback = "Card no. must be 16 digits. ";}
      if (!numerical.test(card)){
          cardFeedback += "\n Numeric characters only."}      
      document.getElementsByClassName("edit-card-verify")[0].textContent = cardFeedback;
  }

  function editExpiry()
  {
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

  function editAddress()
  {
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