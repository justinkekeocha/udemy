<script setup>
const props = defineProps(['previousControlCustom', 'nextControlCustom'])
// defineProps({
//     previousControlDefault: {
//         type: String,
//         default: 'absolute top-0 left-0 z-20 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none '
//     },
//     previousControlCustom: {
//         type: String,
//         default: ''
//     },

// })
</script>
<template>
    <button type="button"
        class="absolute top-0 left-2 z-20 flex items-center justify-center h-full cursor-pointer group focus:outline-none"
        :class="previousControlCustom" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-black
        dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white
        dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white font-black  dark:text-gray-800" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                </path>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 right-2 z-20 flex items-center justify-center h-full cursor-pointer group focus:outline-none"
        :class="nextControlCustom" data-carousel-next>
        <span class=" inline-flex items-center justify-center w-12 h-12 rounded-full bg-black
    dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white
    dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white  dark:text-gray-800" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</template>
