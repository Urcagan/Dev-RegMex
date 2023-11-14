import {createRouter, createWebHistory} from "vue-router";


import homePageIndex from '../components/pages/home/index.vue';
// import indexDK_A from  '../components/DK_A/home/index.vue';
import notFound from '../components/notFound.vue';


const routes = [
    
    // Стартовая страница
    {
        path: "/",
        name: 'index',
        component: () => import ('../components/index.vue')
    }, 

    // Pages
    {
        path: "/monitoring",
        name: 'MainPage',
        component: () => import ('../components/Monitoring/main.vue')
    }, 
    {
        path: "/plant",
        name: 'plant',
        component: () => import ('../components/Monitoring/Main_Interface/plant.vue'),
        props: true
    },

// Работа с БД
    {
        path: "/Admin",
        name: 'MenuDB',
        component: () => import ('../components/UI_DB/main.vue')
    },
    {
        path: "/Complex",
        name: 'ComplexDB',
        component: () => import ('../components/UI_DB/complex.vue')
    },

    {
        path: "/mgk/n1a",
        name: 'MGK.H1A',
        component: () => import ('../components/Monitoring/MGK/111H1/H1.vue'),
        props: true
    },
    // {
    //     path: "/mgk/n1b",
    //     name: 'MGK.H1B',
    //     component: () => import ('../components/MGK/H1/H1B.vue')
    // },
    // {
    //     // Надо удалить маршрут
    //     path: "/upv",
    //     name: 'UPVmenu',
    //     component: () => import ('../components/UPV/index.vue')
    // },
    {
        path: "/test",
        name: 'Test',
        component: homePageIndex,
    },

    {
        path: "/brush",
        name: 'brush',
        component: ()=>import('../components/Test/brush.vue'),
    },

    {
        path: "/testdata",
        name: 'TestData',
        component: ()=>import('../components/Test/TestData.vue'),
    },

    {
        path: "/chartD3",
        name: 'Chart',
        component: ()=>import('../components/Test/D3.vue'),
    },
    {
        path: "/D3Line",
        name: 'D3Line',
        component: ()=>import('../components/Test/D3Line.vue'),
    },
    {
        path: "/D3MultiLine",
        name: 'D3MultiLine',
        component: ()=>import('../components/Test/D3MultiLine.vue'),
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

    // {
    //     path: '/DK_B/table',
    //     name: 'DK_B_table',
    //     component: ()=> import('../components/MGK/H1/B/tableDisplay.vue')
    // },
    
    // Маршрут для тестирования фильтра
    {
        path: '/time',
        name: 'time',
        component: ()=> import('../components/TimeSelect.vue')
    },

    {
        path: '/select',
        // name: 'DK_B_table',
        component: ()=> import('../components/MainSelect.vue')
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
