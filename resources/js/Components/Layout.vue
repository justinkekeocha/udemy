<template>
  <Head>
    <title>{{ title }} </title>
    <meta name="description"  :content="description" />
    <link href="/favicon.png" rel="icon">
  </Head>
  <Navbar />
  <slot />
</template>

<script setup>
   import Navbar from '/resources/js/Components/Navbar.vue'
   defineProps(['title', 'description'])
</script>