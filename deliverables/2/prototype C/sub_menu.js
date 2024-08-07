document.addEventListener("DOMContentLoaded", function() {
  const menuButton = document.querySelector(".btn-burger");
  const submenu = document.querySelector(".sub-menu");

  if (menuButton && submenu) {
    menuButton.addEventListener("click", function(event) {
      event.stopPropagation();
      submenu.classList.toggle("visible");
    });

    document.addEventListener("click", function() {
      submenu.classList.remove("visible");
    });

    submenu.addEventListener("click", function(event) {
      event.stopPropagation();
    });
  } else {
    console.error('Menu button or submenu not found');
  }
});

// document.addEventListener
// (
//   "DOMContentLoaded",d
//   function()
//   {
//     const menuButton = document.getElementsByClassName("btn-burger");
//     const submenu = document.getElementsByClassName("sub-menu");

//     menuButton.addEventListener
//     (
//       "click",
//       function(event)
//       {
//         event.stopPropagation();
//         submenu.classList.toggle("visible");
//       }
//     );

//     document.addEventListener
//     (
//       "click",
//       function()
//       {
//         submenu.classList.remove("visible");
//       }
//     );

//     submenu.addEventListener
//     (
//       "click",
//       function(event)
//       {
//         event.stopPropagation();
//       }
//     );
//   }
// );