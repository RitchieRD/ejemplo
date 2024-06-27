import "./bootstrap";

import Vue from "vue";
import { createInertiaApp, InertiaLink } from "@inertiajs/inertia-vue";
import axios from "axios";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import PrimeVue from "primevue/config";

// Libreria PrimeVUE 2 -------------------
import "primevue/resources/themes/saga-blue/theme.css";
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";
// ----------------------------------------

// Libreria Bootstrap 5 -------------------
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
// ----------------------------------------

// Libreria SWEET ALERT 2 -------------------
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
// ----------------------------------------

Vue.prototype.$http = axios;
Vue.use(VueSweetalert2);

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
