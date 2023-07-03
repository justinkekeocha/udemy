import "./bootstrap";
//https://laravel.com/docs/10.x/vite#configuring-vite
import "../css/app.css";
import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import Layout from "/resources/js/Components/Layout.vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/src/js/vue";
import { createPinia } from "pinia";
import Button1 from "../js/Components/Buttons/Button1.vue";
import Button2 from "../js/Components/Buttons/Button2.vue";

createInertiaApp({
  resolve: (name) => {
    const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
    return pages[`./Pages/${name}.vue`];
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });

    // app.config.globalProperties.$getProps = () => usePage().props
    /**TODO:
     * Nothing just testing
     */

    app
      .use(plugin)
      .use(ZiggyVue)
      .use(createPinia())
      .component("Layout", Layout)
      .component("Head", Head)
      .component("Link", Link)
      .component("Button1", Button1)
      .component("Button2", Button2)
      .mount(el);
  },
});
