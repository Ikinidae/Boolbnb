window.Vue = require('vue');

import FindAddress from './components/FindAddress.vue';

const app = new Vue({
    el: '#root',
    render: h => h(FindAddress)
});
