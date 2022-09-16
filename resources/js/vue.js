window.Vue = require('vue');

// Vue.component('find-address', require('./components/FindAddress.vue').default);
// import { h } from 'vue';
import FindAddress from './components/FindAddress.vue';

const app = new Vue({
    el: '#root',
    render: h => h(FindAddress)
});
