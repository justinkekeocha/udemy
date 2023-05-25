import './bootstrap';

import { createApp, h, computed} from 'vue'
import { createInertiaApp,Head, Link, usePage } from '@inertiajs/vue3'
import Layout from '/resources/js/Components/Layout.vue'
import { initFlowbite } from 'flowbite'


createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
      const app =  createApp({ render: () => h(App, props) })
      app.use(plugin)
      .component('Layout', Layout)
      .component('Head', Head)
      .component('Link', Link)
      .provide('page', computed( () => usePage().props))
      .mount(el)

      initFlowbite();
  },
})