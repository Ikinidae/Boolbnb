require('./bootstrap');

window.Vue = require('vue');

// Vue.component('find-address', require('./components/FindAddress.vue').default);
// import { h } from 'vue';
import FindAddress from './components/FindAddress.vue';

const app = new Vue({
    el: '#root',
    render: h=>h(FindAddress)
});


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

