import {onFormReset, onFormSubmit} from "./user.js";

document.addEventListener("reset", function() {
    onFormReset();
});

document.addEventListener("submit", function(event) {
    event.preventDefault();
    onFormSubmit();
});

