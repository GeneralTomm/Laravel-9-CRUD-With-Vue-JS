import { createRouter,createWebHistory } from "vue-router";
import UserTable from '../components/UserTable.vue';
import UserEditForm from '../components/UserEditForm.vue';
import UserCreateForm from '../components/UserCreateForm.vue';
const routes = [
    {
        path:'/',
        name:'user-table',
        component:UserTable
    },
    {
        path:'/edit/:id',
        name:'edit',
        component:UserEditForm
    },
    {
        path:'/create',
        name:'create',
        component:UserCreateForm
    }
];
const router = createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes
});
export default router;