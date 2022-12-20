import Vue from "vue";
import VueRouter from "vue-router";
import homeGuest from "./view/homeGuest.vue";
import showApartment from "./components/showApartmentGuest.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: "/home", name: "home", component: homeGuest },
        {
            path: "/home/:slug",
            name: "showApartment",
            component: showApartment,
        },


    ],
});

export default router;
