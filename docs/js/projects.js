function openInNewWindow(event) {
    let imageId = event.target.id;
    if (imageId == 1) {
        window.open("images/demo/setlogic.gif", "_blank");
    }
    else if(imageId == 2) {
        window.open("images/demo/blackjack.gif", "_blank");
    }
    else if(imageId == 3) {
        window.open("images/demo/workportal.gif", "_blank");
    }
}

let gifArray = [document.getElementById("1"), document.getElementById("2"), document.getElementById("3")];

for (let i=0; i<gifArray.length; i++) {
    gifArray[i].addEventListener("click", openInNewWindow);
}