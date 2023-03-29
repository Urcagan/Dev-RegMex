import {createRouter, createWebHistory} from "vue-router";


import homePageIndex from '../components/pages/home/index.vue';
// import indexDK_A from  '../components/DK_A/home/index.vue';
import notFound from '../components/notFound.vue';


const routes = [
    // Pages
    {
        path: "/",
        name: 'MainPage',
        component: () => import ('../components/main.vue'),
    },
    {
        path: "/mgk",
        name: 'MGKmenu',
        component: () => import ('../components/MGK/index.vue')
    },
    {
        path: "/mgk/n1",
        name: 'MGK.H1',
        component: () => import ('../components/MGK/H1/H1.vue')
    },
    {
        path: "/upv",
        name: 'UPVmenu',
        component: () => import ('../components/UPV/index.vue')
    },
    {
        path: "/test",
        name: 'Test',
        component: homePageIndex,
    },

    // 111ДК 1 А
    {
        // path: "/DK_A",
        path: '/DK_A/home',
        name: 'DK_A',
        // component: indexDK_A
        component: ()=> import('../components/DK_A/home/index.vue')
    },
    // {
    //     path: '/DK_A/pressure',
    //     name: 'DK_A_pressure',
    //     // component: DK_A
    //     component: ()=> import('../components/DK_A/pressure.vue')
    // },

    // Маршруты для насосов Н1
    // {
    //     path: '/DK_A/table',
    //     name: 'DK_A_table',
    //     // component: DK_A
    //      component: ()=> import('../components/MGK/H1/A/tableDisplay.vue')
    // },

    // {
    //     path: '/DK_A/pressure',
    //     name: 'DK_A_pressure',
    //     // component: DK_A
    //     component: ()=> import('../components/MGK/H1/A/chartPressure.vue')
    // },
    // {
    //     path: '/DK_A/ti',
    //     name: 'DK_A_ti',
    //     // component: DK_A
    //     component: ()=> import('../components/MGK/H1/A/chartTI.vue')
    // },
    // {
    //     path: '/DK_A/xvi',
    //     name: 'DK_A_xvi',
    //     // component: DK_A
    //     component: ()=> import('../components/MGK/H1/A/chartXVI.vue')
    // },
    // {
    //     path: '/DK_A/zvi',
    //     name: 'DK_A_zvi',
    //     // component: DK_A
    //     component: ()=> import('../components/MGK/H1/A/chartZVI.vue')
    // },

    {
        path: '/DK_B/table',
        name: 'DK_B_table',
        component: ()=> import('../components/MGK/H1/B/tableDisplay.vue')
    },

    // Маршрут для несуществующего пути
    {
    path: '/:pathMatch(.*)*',
        component: notFound
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    // routes: [
    // ]
});

export default router
