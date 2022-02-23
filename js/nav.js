console.log("Menu text")
function menuHook() {
  var body = document.querySelector("body");
  var burger = document.querySelector("[data-uha-interface='burger']");
  var menu = document.querySelector("[data-uha-interface='menu']").querySelector("ul");
  var menuOpen = false;
  function updateMenu() {
    if (menuOpen) {
      menu.classList.add("menu--primary--open");
      burger.setAttribute("aria-expanded", "true");
      body.classList.add("body--no-scroll");
    } else {
      menu.classList.remove("menu--primary--open");
      burger.setAttribute("aria-expanded", "false");
      body.classList.remove("body--no-scroll");
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
  console.log(burger, menu);
}
window.addEventListener("load", menuHook);