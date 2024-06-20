import "./bootstrap";

import Vue from "vue";
import { createInertiaApp, InertiaLink } from "@inertiajs/inertia-vue";
import axios from "axios";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

// Libreria Bootstrap 5 -------------------
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
// ----------------------------------------

Vue.prototype.$http = axios;

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        Vue.component("inertia-link", InertiaLink);
        new Vue({
            render: (h) => h(App, props),
        }).$mount(el);
    },
});
