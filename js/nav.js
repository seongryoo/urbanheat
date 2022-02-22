console.log("Menu text")
function menuHook() {
  var burger = document.querySelector("[data-uha-interface='burger']");
  var menu = document.querySelector("[data-uha-interface='menu']").querySelector("ul");
  var menuOpen = false;
  function pressBurger() {
    menuOpen = !menuOpen;
    if (menuOpen) {
      menu.classList.add("menu--primary--open");
    } else {
      menu.classList.remove("menu--primary--open");
    }
  }
  function checkPress(event) {
    if (event.isComposing || event.code === 229) {
      return;
    }
    if (event.code === "Space" || event.key === " " || event.keyCode === 32) {
      console.log("Ping!");
    }
  }
  burger.addEventListener("click", pressBurger);
  burger.addEventListener("keydown", checkPress);
  console.log(burger, menu);
}
window.addEventListener("load", menuHook);