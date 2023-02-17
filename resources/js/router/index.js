import {createRouter, createWebHistory} from 'vue-router';
import LoginView from '../view/LoginView';
import HomeView from "../view/HomeView";
import RoomAdd from "../view/RoomAdd";
import MenuProfileView from "../view/menu/MenuProfileView";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            alias: '/',
            component: LoginView,
            name: 'login',
        },
        {
            path: '/',
            component: HomeView,
            children: [
                {
                    path: 'profile',
                    name: 'profile',
                    components: {
                        default: RoomAdd,
                        menu: MenuProfileView,
                    },
                },
                    ]
                },
        ],
})

export default router;




