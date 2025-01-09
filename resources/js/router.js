import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
// import Home from './components/Home'
// import Hello from './components/Hello'

export default new VueRouter({
    mode: 'history',
    base: '/spa',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: () => import(/* webpackChunkName: "Home" */'./components/Home')
        },
        {
            path: '/hello',
            name: 'hello',
            component: () => import(/* webpackChunkName: "Hello" */'./components/Hello')
        },
        {
            path: '/error/:status_code?',
            name: 'error',
            component: () => import(/* webpackChunkName: "Hello" */'./template/error')
        },{
            path: '/openApp',
            name: 'openApp',
            component: () => import(/* webpackChunkName: "openApp" */'./components/openApp')
        },
    ],
});