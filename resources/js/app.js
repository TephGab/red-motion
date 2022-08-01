import "./bootstrap";

import { createApp } from "vue";
import router from './router';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import LaravelVuePagination from 'laravel-vue-pagination';

import AddBook from './admin/books/Create.vue';
import EditBook from './admin/books/Edit.vue';
import ShowBook from './components/ShowBook.vue';

const app = createApp();
app.component('AddBook', AddBook);
app.component('EditBook', EditBook);
app.component('ShowBook', ShowBook);
app.component('Pagination', LaravelVuePagination);
app.use(VueSweetalert2);
app.use(router).mount("#app");