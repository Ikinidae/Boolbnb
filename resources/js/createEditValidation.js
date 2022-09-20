require('./bootstrap');
const { event } = require('jquery');

console.log("ti prego");

const title = document.getElementById("title");

title.addEventListener("input", (event) => {
    if (title.value.length == 0) {
        console.log("ti prego 2");
        title.setCustomValidity("inserisci qualcosa!");
        title.reportValidity();
    } else {
        title.setCustomValidity("");
    }
});
