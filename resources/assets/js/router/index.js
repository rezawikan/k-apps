import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const CreateTechnologyIndex = require('../components/CreateTechnologyComponent.vue')
const EditTechnologyIndex = require('../components/EditTechnologyComponent.vue')

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
