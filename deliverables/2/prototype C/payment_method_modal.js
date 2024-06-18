var loginModal = document.getElementById("payment-method-modal");

var btn = document.getElementById("open-payment-method-modal");

var span = document.getElementsByClassName("close-payment-method")[0];

btn.onclick = function() {
  loginModal.style.display = "block";
}

btn2.onclick = function() {
  loginModal.style.display = "block";
}

span.onclick = function() {
  loginModal.style.display = "none";
}

window.onclick = function(event)  {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}