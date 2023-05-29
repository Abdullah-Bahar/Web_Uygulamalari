const arrows = document.querySelectorAll(".arrow");
const menuLists = document.querySelectorAll(".menu-list")


arrows.forEach((arrow, i) => {
    const widthRatio = Math.floor(window.innerWidth / 350);
    let clickCounter = 0;
    const imageItem = menuLists[i].querySelectorAll("img").length;
    arrow.addEventListener("click", function () {
    clickCounter++;
        if (imageItem - (3 + clickCounter) + (4 - widthRatio) >= 0) {
            menuLists[i].style.transform = `translateX(${menuLists[i].computedStyleMap().get
                ("transform")[0].x.value - 350}px)`
        } else {
            menuLists[i].style.transform = "translateX(0)";
            clickCounter = 0;
        }
    });
});






