<script setup>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue';
defineProps(['title', 'description'])
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
