
const btnMenu = document.getElementById("btn-menu");
const asideMobile = document.getElementById("aside-mobile");
const closeAsideMobile = document.getElementById("close-aside-mobile");

btnMenu.addEventListener("click", () => {
    asideMobile.style.display = "block";
})

closeAsideMobile.addEventListener("click", () => {
    asideMobile.style.display = "none";
})


// Dropdown
// function categoryFormDropdown() {
//   document.getElementById("categoryFormDropdown").classList.toggle("show");
// }

// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// } 