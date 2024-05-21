function cvvValidation()
{
  var number = document.getElementsByClassName("cvv-box")[0].value;
  var cvvFeedback = "";
  var numerical = /^\d{3}$/;  // This regex matches exactly 3 digits

  if (!numerical.test(number)) {
      cvvFeedback = "CVV no. must be 3 digits and numeric.";
  }

  document.getElementsByClassName("cvv-feedback")[0].textContent = cvvFeedback;
  return cvvFeedback === ""; 
}

function checkoutEnable()
{   
  isValidCVV = cvvValidation(); 

  if (isValidCVV) {
    document.getElementsByClassName("pay-now")[0].style.pointerEvents = 'auto';
  } 
  else 
  {
    document.getElementsByClassName("pay-now")[0].style.pointerEvents = 'none';
  }  
}