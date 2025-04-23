function clearConfirm(event) {
    let popup = document.getElementById("popup");
    popup.style.visibility = "visible";
}

function clear(event) {
    document.getElementById("title").value = "";
    document.getElementById("description").value = "";

    let popup = document.getElementById("popup");
    popup.style.visibility = "hidden";
}

function cancel(event) {
    let popup = document.getElementById("popup");
    popup.style.visibility = "hidden";
}

function checkFields(event) {
    let title = document.getElementById("title");
    let desc = document.getElementById("description");

    if (title.value.trim() === "" || desc.value.trim() === "") {
        event.preventDefault();
        desc.style.border = "0.1rem solid red";
        title.style.border = "0.1rem solid red";

        if (title.value.trim() !== "") {
            title.style.border = "none";
        }
        if (desc.value.trim() !== "") {
            desc.style.border = "none";
        }
        console.log("Fields empty");
    }
    else {
        console.log("Redirecting to viewBlog.php");
    }
}

//form buttons
document.getElementById("reset").addEventListener("click", clearConfirm);
document.getElementById("submit").addEventListener("click", checkFields);

//popup buttons
document.getElementById("confirm").addEventListener("click", clear);
document.getElementById("cancel").addEventListener("click", cancel);




