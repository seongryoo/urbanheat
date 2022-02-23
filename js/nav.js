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
  function pressBurger() {
    menuOpen = !menuOpen;
    updateMenu();
  }
  function checkPress(event) {
    if (event.isComposing || event.code === 229) {
      return;
    }
    if (event.code === "Space" || event.key === " " || event.keyCode === 32) {
      pressBurger();
    }
  }
  burger.addEventListener("click", pressBurger);
  burger.addEventListener("keydown", checkPress);
}
window.addEventListener("load", menuHook);