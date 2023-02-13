import {createRouter, createWebHistory} from 'vue-router';
import LoginView from '../view/LoginView';

const routes = [
    {
        path: '/',
        name: 'login',
        component: LoginView,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
