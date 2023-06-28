import { createWebHistory, createRouter } from "vue-router";
import Home from "@/views/Home.vue";
import About from "@/views/About.vue";
import Error404 from "@/views/404.vue";
import Conversion from "@/views/Conversion.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/conversion",
        name: "Conversion",
        component: Conversion,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'Error404',
        component: Error404,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
