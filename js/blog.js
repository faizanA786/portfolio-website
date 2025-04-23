function chosenOption(event) {
    event.target.form.submit();
}

document.getElementById('month').addEventListener('change', chosenOption);