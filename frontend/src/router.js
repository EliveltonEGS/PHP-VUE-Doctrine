import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'list',
            component: () => import('./components/List.vue')
        },
        {
            path: '/create',
            name: 'create',
            component: () => import('./components/Create.vue')
        },
        {
            path: '/update/:id',
            name: 'update',
            component: () => import('./components/Update.vue')
        },
        {
            path: '/delete/:id',
            name: 'delete',
            component: () => import('./components/Remove.vue')
        }
    ]
})