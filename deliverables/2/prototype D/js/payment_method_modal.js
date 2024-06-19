var paymentMethodModal = document.getElementById("payment-method-modal");

var paymentMethodBtn = document.getElementById("open-payment-method-modal");

var closePaymentMethod = document.getElementsByClassName("close-payment-method")[0];

paymentMethodBtn.onclick = function() {
  paymentMethodModal.style.display = "block";
}

closePaymentMethod.onclick = function() {
  paymentMethodModal.style.display = "none";
}

window.onclick = function(event)  {
  if (event.target == modal) {
    paymentMethodModal.style.display = "none";
  }
}