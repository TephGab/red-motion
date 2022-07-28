import { createRouter, createWebHistory } from "vue-router";

// Front end 
import Index from '../pages/Index.vue';
import About from '../components/About.vue';
import Contact from '../components/Contact.vue';

import Dashboard from '../admin/Dashboard.vue';
import Create from '../admin/books/Create.vue';
import AdmBooks from '../admin/books/Index.vue';

import AdminBlog from '../admin/blog/Index.vue';
import AdminBlogCreate from '../admin/blog/Create.vue';

const routes = [
    {
        path: '/',
        name: 'index',
        component: Index
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
    {
        path: '/home',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/admbooks',
        name: 'admbooks',
        component: AdmBooks
    },
    {
        path: '/create',
        name: 'admin.create',
        component: Create
    },
    // {
    //     path: '/admin',
    //     name: 'admin.index',
    //     component: AdminIndex
    // },
    {
        path: '/blogadm',
        name: 'blogadm.index',
        component: AdminBlog
    },
    {
        path: '/blogadm/create',
        name: 'blogadm.create',
        component: AdminBlogCreate
    },
    // {
    //     path: '/books/:id/edit',
    //     name: 'books.edit',
    //     component: Edit,
    //     props: true
    // },
]

export default createRouter({
    history: createWebHistory(),
    routes
});