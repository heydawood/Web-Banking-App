// drop down menu script
var menu = document.getElementById("menu");
menu.style.maxHeight = "0px";
function togglemenu() {
    if (menu.style.maxHeight == "0px") {
        menu.style.maxHeight = "390px";
    }
    else {
        menu.style.maxHeight = "0px";
    }
}