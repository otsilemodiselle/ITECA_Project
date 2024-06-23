function clearLoginEmail() {
    document.getElementById('login-email-box').value = '';
}

function clearLoginPassword() {
    document.getElementById('login-password-box').value = '';
}

function sizeCheck() {
  var selectElement = document.getElementsByName("sizes")[0];
  var cartButton = document.getElementsByClassName("cart-button")[0];

  if (selectElement.selectedIndex === 0 && selectElement.value === "") {
      cartButton.disabled = true;
  } else {
      cartButton.disabled = false;
  }
}

