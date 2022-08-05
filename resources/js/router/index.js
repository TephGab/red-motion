import { createRouter, createWebHistory } from "vue-router";

// Front end 
import Index from '../pages/Index.vue';
import About from '../components/About.vue';
import Contact from '../components/Contact.vue';
import Books from '../components/Books.vue';
import Dkfondation from '../components/Dkfondation.vue';
import Blog from '../components/Blog.vue';

import Dashboard from '../admin/Dashboard.vue';
import Create from '../admin/books/Create.vue';
import AdmBooks from '../admin/books/Index.vue';

import AdmBlog from '../admin/blog/Index.vue';
// import AdminBlogCreate from '../admin/blog/Create.vue';

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
        path: '/books',
        name: 'books',
        component: Books
    },
    {
        path: '/dkfondation',
        name: 'dkfondation',
        component: Dkfondation
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
    {
        path: '/blog',
        name: 'blog',
        component: Blog
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
        path: '/admblog',
        name: 'admblog',
        component: AdmBlog
    },
    // {
    //     path: '/create',
    //     name: 'admin.create',
    //     component: Create
    // },
    // {
    //     path: '/admin',
    //     name: 'admin.index',
    //     component: AdminIndex
    // },
    // {
    //     path: '/blogadm',
    //     name: 'blogadm.index',
    //     component: AdminBlog
    // },
    // {
    //     path: '/blogadm/create',
    //     name: 'blogadm.create',
    //     component: AdminBlogCreate
    // },
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