var signupModal = document.getElementById("signup-modal");

var signupBtn = document.getElementById("open-signup-modal");

var signupBtn2 = document.getElementById("open-signup-modal-sub")

var closeSignupSpan = document.getElementsByClassName("close-signup")[0];

signupBtn.onclick = function() {
  signupModal.style.display = "block";
}

signupBtn2.onclick = function() {
  signupModal.style.display = "block";
}

closeSignupSpan.onclick = function() {
  signupModal.style.display = "none";
}

window.onclick = function(event)  {
  if (event.target == modal) {
    signupModal.style.display = "none";
  }
}