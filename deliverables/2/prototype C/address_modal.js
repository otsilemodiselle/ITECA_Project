var loginModal = document.getElementById("address-modal");

var btn = document.getElementById("open-address-modal");

var span = document.getElementsByClassName("close-address")[0];

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