function menuHook() {
  var burger = document.querySelector("[data-uha-interface='burger']");
  var menu = document.querySelector("[data-uha-interface='menu']").querySelector("ul");
  var menuOpen = false;
  function updateMenu() {
    if (menuOpen) {
      menu.classList.add("menu--primary--open");
      burger.setAttribute("aria-expanded", "true");
    } else {
      menu.classList.remove("menu--primary--open");
      burger.setAttribute("aria-expanded", "false");
    }
  }
  function pressBurger(event) {
    menuOpen = !menuOpen;
    updateMenu();
  }
  burger.addEventListener("click", pressBurger);
}
window.addEventListener("load", menuHook);