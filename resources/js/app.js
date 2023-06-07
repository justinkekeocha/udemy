import "./bootstrap";

import { createApp, h} from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import Layout from "/resources/js/Components/Layout.vue";
//import { initFlowbite } from "flowbite";
import 'flowbite';
import { ZiggyVue } from "../../vendor/tightenco/ziggy/src/js/vue";
import { createPinia } from "pinia";


createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
        
       // app.config.globalProperties.$getProps = () => usePage().props

        app.use(plugin)
            .use(ZiggyVue)
            .use(createPinia())
            .component("Layout", Layout)
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);

        //initFlowbite();
    },
});
