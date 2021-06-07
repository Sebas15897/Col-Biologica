const hamburger = document.querySelector(".hamburger")
const navMenu = document.querySelector(".nav-menu")

hamburger.addEventListener("click", mobileMenu)

function mobileMenu() {
    console.log("HIZO CLICK");
    hamburger.classList.toggle("active")
    navMenu.classList.toggle("active")
}
