require('./bootstrap');
const { event } = require('jquery');

console.log("ti prego");

const password = document.getElementById('password');
const passwordConfirm = document.getElementById('password_confirm');

passwordConfirm.addEventListener("input", (event) => {
    if (password.value !== passwordConfirm.value) {
        passwordConfirm.setCustomValidity("Passwords don't match");
        passwordConfirm.reportValidity();
    } else {
        passwordConfirm.setCustomValidity("");
    }
});

const email = document.getElementById("email");

email.addEventListener("input", (event) => {
    if (email.validity.typeMismatch) {
        email.setCustomValidity("I am expecting an e-mail address!");
        email.reportValidity();
    } else {
        email.setCustomValidity("");
    }
});
