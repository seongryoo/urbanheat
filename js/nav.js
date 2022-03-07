function menuHook() {
  var burger = document.querySelector("[data-uha-interface='burger']");
  var menuWrapper = document.querySelector("[data-uha-interface='menu']");
  var menuFog = document.querySelector("[data-uha-interface='fog']");
  var menu = menuWrapper.querySelector("ul");
  var menuOpen = false;
  function updateMenu() {
    if (menuOpen) {
      menu.classList.add("menu--primary--open");
      menuWrapper.classList.remove("menu-wrapper--hidden");
      menuFog.classList.remove("menu-fog--cleared");
      burger.setAttribute("aria-expanded", "true");
      burger.classList.add("hamburger--fixed");
    } else {
      menu.classList.remove("menu--primary--open");
      menuWrapper.classList.add("menu-wrapper--hidden");
      menuFog.classList.add("menu-fog--cleared");
      burger.setAttribute("aria-expanded", "false");
      burger.classList.remove("hamburger--fixed");
    }
  }
  function pressBurger(event) {
    menuOpen = !menuOpen;
    updateMenu();
  }
  function closeMenu(event) {
    menuOpen = false;
    updateMenu();
  }
  burger.addEventListener("click", pressBurger);
  menuFog.addEventListener("click", closeMenu);
  updateMenu();
}
window.addEventListener("load", menuHook);