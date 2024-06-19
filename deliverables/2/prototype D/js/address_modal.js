var addressModal = document.getElementById("address-modal");

var addressBtn = document.getElementById("open-address-modal");

var closeAddressSpan = document.getElementsByClassName("close-address")[0];

addressBtn.onclick = function() {
  addressModal.style.display = "block";
}

closeAddressSpan.onclick = function() {
  addressModal.style.display = "none";
}

window.onclick = function(event)  {
  if (event.target == modal) {
    addressModal.style.display = "none";
  }
}