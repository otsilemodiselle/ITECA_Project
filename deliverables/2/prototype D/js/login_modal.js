var loginModal = document.getElementById("login-modal");

var loginBtn = document.getElementById("open-login-modal");

var loginBtn2 = document.getElementById("open-login-modal-sub");

var closeLoginSpan = document.getElementsByClassName("close-login")[0];

var loginSubmit = document.getElementsByClassName("btn-submit-login")[0];

loginBtn.onclick = function() {
  loginModal.style.display = "block";
}

loginBtn2.onclick = function() {
  loginModal.style.display = "block";
}

closeLoginSpan.onclick = function() {
  loginModal.style.display = "none";
  document.body.style.overflow = 'auto';
}

// loginSubmit.onclick = function() {
//   loginModal.style.display = "none";
//   document.body.style.overflow = 'auto';
// }

window.onclick = function(event)  {
  if (event.target == modal) {
    loginModal.style.display = "none";
  }
}