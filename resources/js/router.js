import Vue from 'vue'
import VueRouter from 'vue-router'

import Product from '../views/admin/product/ProductView'
import Category from '../views/admin/category/CategoryView'
import Post from '../views/admin/post/PostView'
import PostCreate from '../views/admin/post/PostCreate'
import PostEdit from '../views/admin/post/PostEdit'
import PostUpdate from '../views/admin/post/PostUpdate'

Vue.use(VueRouter)

const routes = [
    {
        path : "/admin/product",
        component : Product,
    },
    {
        path : "/admin/category",
        component : Category,
    },
    {
        path : '/admin/post',
        component : Post,
    },
    {
        path : '/admin/post/create',
        component : PostCreate,
    },
    {
        path : '/admin/post/:id/edit',
        component : PostEdit,
    },
    // {
    //     path : '/admin/post/:id',
    //     component : PostUpdate
    // }
];


const router = new VueRouter({
    mode : 'hash',
    routes,
});

export default router;
