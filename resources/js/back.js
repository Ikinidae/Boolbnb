const { event } = require('jquery');

require('./bootstrap');

// const password = document.getElementById('password');
// const passwordConfirm = document.getElementById('password_confirm');

// passwordConfirm.addEventListener("input", (event) => {
//     if (password.value !== passwordConfirm.value) {
//         passwordConfirm.setCustomValidity("Passwords don't match");
//         passwordConfirm.reportValidity();
//     } else {
//         passwordConfirm.setCustomValidity("");
//     }
// });

// const email = document.getElementById("email");

// email.addEventListener("input", (event) => {
//     if (email.validity.typeMismatch) {
//         email.setCustomValidity("I am expecting an e-mail address!");
//         email.reportValidity();
//     } else {
//         email.setCustomValidity("");
//     }
// });


// window.prova = function () {
//     console.log('ciao');
// }
// window.check_title = function() {
//     const title = document.getElementById('title');
//     if (title.value == "") {
//         console.log('ciao');
//         title.setCustomValidity("Insert a title");
//         title.reportValidity();

//         title.focus();
//         return false;
//     }
// };

window.validationApartments = function () {
    // const submit = document.getElementById('submit');
    const title = document.getElementById('title');
    const description = document.getElementById('description');
    const price = document.getElementById('price');
    const rooms = document.getElementById('rooms');
    const beds = document.getElementById('beds');
    const bathrooms = document.getElementById('bathrooms');
    const mq = document.getElementById('mq');

    if (title.value == "") {
        // title.setCustomValidity("Insert a title");
        // submit.preventDefault();
        window.alert("Insert a title");
        title.focus();
        return false;
    }
    if (description.value == "") {
        window.alert("Insert a description");
        description.focus();
        return false;
    }
    if (isNaN(price.value)) {
        window.alert("Insert a price");
        price.focus();
        return false;
    }
    if (isNaN(rooms.value)) {
        window.alert("Insert a valid number");
        rooms.focus();
        return false;
    }
    if (isNaN(beds.value)) {
        window.alert("Insert a valid number");
        beds.focus();
        return false;
    }
    if (isNaN(bathrooms.value)) {
        window.alert("Insert a valid number");
        bathrooms.focus();
        return false;
    }
    if (isNaN(mq.value)) {
        window.alert("Insert a valid number");
        mq.focus();
        return false;
    }
    return true

}
