/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';

Vue.use(VueRouter)


import Index from "./pages/Index.vue";


const routes = [
    {
        path: '/',
        name: 'index',
        component: Index
    }
]

const router = new VueRouter({
    mode: "history",
    routes
});


// Vue.component('example-component', require('./components/ExampleComponent.vue'));


const app = new Vue({
    router
}).$mount("#app");

// const app = new Vue({
//     el: '#app',
//     router: router
// });
