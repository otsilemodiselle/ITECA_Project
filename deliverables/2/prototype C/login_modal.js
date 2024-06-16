var loginModal = document.getElementById("login-modal");

var btn = document.getElementById("open-login-modal");

var btn2 = document.getElementById("open-login-modal-sub");

var span = document.getElementsByClassName("close-login")[0];

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