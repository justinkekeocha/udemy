<script setup>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
defineProps(['title', 'description'])
//https://flowbite.com/docs/getting-started/vue/#data-attributes
// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
</script>

<template>
    <Head>
        <title>{{ title }} </title>
        <meta name="description" :content="description" />
        <link href="/favicon.png" rel="icon">
    </Head>

    <Navbar />


    <slot />
    <Footer></Footer>
</template>
