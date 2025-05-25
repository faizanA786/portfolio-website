function openInNewWindow(event) {
    let imageId = event.target.id;
    if (imageId == 1) {
        window.open("images/demo/setlogic.gif", "_blank");
    }
    else if(imageId == 2) {
        window.open("images/demo/blackjack.gif", "_blank");
    }
}

let gifArray = [document.getElementById("1"), document.getElementById("2")];

for (let i=0; i<gifArray.length; i++) {
    gifArray[i].addEventListener("click", openInNewWindow);
}