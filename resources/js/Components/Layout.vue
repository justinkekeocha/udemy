<script setup>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import { useCategoryStore } from "@/Stores/CategoryStore";
import { useSubCategoryStore } from "@/Stores/SubCategoryStore";
import { useTopicStore } from "@/Stores/TopicStore";
defineProps(['title', 'description'])
//https://flowbite.com/docs/getting-started/vue/#data-attributes
// initialize components based on data attribute selectors
const categoryStore = useCategoryStore();
categoryStore.getCategories();

const subCategoryStore = useSubCategoryStore();
subCategoryStore.getSubCategories();

const topicStore = useTopicStore();
topicStore.getTopics()

onMounted(() => {
    setTimeout(async () => {
        await initFlowbite();
    }, 1000);

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
