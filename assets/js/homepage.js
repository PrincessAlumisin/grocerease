const menu = document.querySelector(".bx-menu")
const navBar = document.querySelector(".nav-bar")

menu.onclick = () => {
  navBar.classList.toggle("active");
  if (navBar.classList.contains("active")) {
    menu.classList.replace("bx-menu", "bx-menu-alt-right");
  } else {
    menu.classList.replace("bx-menu-alt-right", "bx-menu");
  }
}