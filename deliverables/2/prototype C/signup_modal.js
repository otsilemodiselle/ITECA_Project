var signupModal = document.getElementById("signup-modal");

var btn = document.getElementById("open-signup-modal");

var btn2 = document.getElementById("open-signup-modal-sub")

var span = document.getElementsByClassName("close-signup")[0];

btn.onclick = function() {
  signupModal.style.display = "block";
}

btn2.onclick = function() {
  signupModal.style.display = "block";
}

span.onclick = function() {
  signupModal.style.display = "none";
}

window.onclick = function(event)  {
  if (event.target == modal) {
    signupModal.style.display = "none";
  }
}