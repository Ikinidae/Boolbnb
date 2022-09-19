const { event } = require('jquery');

require('./bootstrap');

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
