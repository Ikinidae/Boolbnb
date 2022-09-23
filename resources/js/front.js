require('./bootstrap');

// importiamo la libreria vue
window.Vue = require('vue');

// importiamo il componente base App.vue e lo assegnamo alla variabile App
import App from './App.vue';

// importiamo la libreria vue-router
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import PageHome from './pages/PageHome.vue';
import PageShow from './pages/PageShow.vue';
import Page404 from './pages/Page404.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: PageHome,
    },
    {
     path: '/show/:id',
     name: 'show',
     component: PageShow,
     props: true,
    },
    {
     // questa è la pagina di dettaglio di un post
     path: '*',
     name: 'page404',
     component: Page404,

    },

    // {
    // path: '/search',
    // name: 'AdvancedSearch',
    // component: AdvancedSearch,
    // props: true,
    // },
];


const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
});


const app = new Vue({
    el: '#papera',
    render: h => h(App),
    router,
});
