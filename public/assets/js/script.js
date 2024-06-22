const button_menu = document.querySelector("#button-menu");
button_menu.addEventListener("click", (e) => {
    document.querySelector(".hidden-menu").classList.toggle("show-menu")
})