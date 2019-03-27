import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const CreateTechnologyIndex = require('../components/CreateTechnologyComponent.vue').default
const EditTechnologyIndex = require('../components/EditTechnologyComponent.vue').default

const routes = [
    {
        path: '/impact-tracker/:id/create',
        name: 'create.technology',
        component: CreateTechnologyIndex,
    },
    {
        path: '/impact-tracker/:idp/:pivotID/edit',
        name: 'edit.technology',
        component: EditTechnologyIndex,
    },
]

export default new VueRouter({
    mode: 'history',
    routes
})
