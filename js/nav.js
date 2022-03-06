function menuHook() {
  var burger = document.querySelector("[data-uha-interface='burger']");
  var menuWrapper = document.querySelector("[data-uha-interface='menu']");
  var menu = menuWrapper.querySelector("ul");
  var menuOpen = false;
  function updateMenu() {
    if (menuOpen) {
      menu.classList.add("menu--primary--open");
      menuWrapper.classList.remove("menu-wrapper--hidden");
      burger.setAttribute("aria-expanded", "true");
    } else {
      menu.classList.remove("menu--primary--open");
      menuWrapper.classList.add("menu-wrapper--hidden");
      burger.setAttribute("aria-expanded", "false");
    }
  }
  function pressBurger(event) {
    menuOpen = !menuOpen;
    updateMenu();
  }
  burger.addEventListener("click", pressBurger);
  updateMenu();
}
window.addEventListener("load", menuHook);