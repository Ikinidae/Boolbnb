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

const form = document.getElementById("form");
if (form) {
    form.onsubmit = function () { return validationForm() };
}

function validationForm() {
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const price = document.getElementById('price').value;
    const rooms = document.getElementById('rooms').value;
    const beds = document.getElementById('beds').value;
    const bathrooms = document.getElementById('bathrooms').value;
    const mq = document.getElementById('mq').value;
    const image = document.getElementById('image').value;
    const services = document.getElementById('services').value;


    if (title != "" & description != "" & price != "" & rooms != "" & beds != "" & bathrooms != "" & mq != "" & image != "") {
        if (title.length == 0) {
            alert('Required field');
            return false;
        }
        if (description.length == 0) {
            alert('Required field');
            return false;
        }
        if (price.length == 0) {
            alert('Required field');
            return false;
        }
        if (rooms.length == 0) {
            alert('Required field');
            return false;
        }
        if (beds.length == 0) {
            alert('Required field');
            return false;
        }
        if (bathrooms.length == 0) {
            alert('Required field');
            return false;
        }
        if (mq.length == 0) {
            alert('Required field');
            return false;
        }
        if (image.length == 0) {
            alert('Required field');
            return false;
        }
        if (services.length == 0) {
            alert('Required field');
            return false;
        }
    } else {
        alert('compila tutti i campi');
        return false;
    }
    return true;
}
