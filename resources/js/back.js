require('./bootstrap');

// window.Vue = require('vue');

// Vue.component('find-address', require('./components/FindAddress.vue').default);
// import { h } from 'vue';
// import FindAddress from './components/FindAddress.vue';

// const app = new Vue({
//     el: '#root',
//     render: h => h(FindAddress)
// });


// Tomtom search

// const API_KEY = 'k8V0aFCAwuHo8eDICtxR16HCuAjRAWff';

// var handleResults = function(result) {
//     console.log('log3', result);
// };

// var search = function(){
//     tt.services.fuzzySearch({
//         key: API_KEY,
//         query: document.getElementById("query").value,
//     }).then(handleResults);
// }

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
