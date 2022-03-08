import Home from '../components/Home'
import Login from '../components/Login'
import Register from '../components/Register'
import Posts from '../components/Posts'
import Post from '../components/Post'
import Stats from '../components/Stats'
import KeywordStats from '../components/KeywordStats'
import Dashboard from '../components/Dashboard'
import AddPost from '../components/AddPost'
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const router =  new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            component: Home,
            name: 'home'
        },
        {
            path: '/login',
            component: Login,
            name: 'login'
        },
        {
            path: '/register',
            component: Register,
            name: 'register'
        },
        {
            path: '/posts',
            component: Posts,
            name: 'posts',
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/posts/:postId',
            component: Post,
            name: 'post',
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/addpost',
            component: AddPost,
            name: 'add-post',
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/stats',
            component: Stats,
            name: 'site-statistics'
        },
        {
            path: '/keywords',
            component: KeywordStats,
            name: 'keyword-statistics'
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'dashboard',
            meta: {
                requiresAuth: true
            }
        }
    ]
});

export default router;