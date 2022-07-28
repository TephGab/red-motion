import "./bootstrap";

import { createApp } from "vue";
import router from './router';

import AddBook from './admin/books/Create.vue';

// createApp('create-book', require('./admin/books/Create.vue').default);


const app = createApp();
app.component('AddBook', AddBook);
app.use(router).mount("#app");

// require('./bootstrap');

// window.Vue = require('vue').default;

// import VueRouter from 'vue-router';

// Vue.use(VueRouter)

// import Index from "./pages/Index.vue";

// const routes = [
//     {
//         path: '/',
//         name: 'index',
//         component: Index
//     }
// ]

// const router = new VueRouter({
//     mode: "history",
//     routes
// });

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     router
// }).$mount("#app");
