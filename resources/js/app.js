/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router'

Vue.use(VueRouter)

Vue.component('create-counter', require('./pages/counter/Create.vue').default);
Vue.component('edit-counter', require('./pages/counter/Edit.vue').default);

import Index from "./pages/counter/Index.vue";
import Create from "./pages/counter/Create.vue";
import Edit from "./pages/counter/Edit.vue";

const routes = [
    {
        path: '/home',
        // name: 'counter.index',
        component: Index
    },
    {
        path: '/counter/create',
        // name: 'counter.create',
        component: Create
    },
    {
        path: '/counter/:id/edit',
        // name: 'counter.edit',
        component: Edit,
        props: true
    },
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
