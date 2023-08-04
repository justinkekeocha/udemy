<script setup>
const props = defineProps({ model: Object, })
//console.log(props.model.subCategory.link)
</script>
<template>
    <Layout :title="model.title + ' | ' + $page.props.appName" description="hello">
        <section class="py-4 md:px-56 mb-96 block bg-zinc-900 text-white">
            <div class="flex items-center text-sm text-violet-300 font-UdemySansBold px-5 md:px-0 mb-2 md:mb-12">
                <span class="hidden md:flex items-center">
                    <Link :href="model.category.link">
                    {{ model.category.title }}
                    </Link>
                    <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <span class="flex items-center">
                    <Link :href="model.subCategory.link">
                    {{ model.subCategory.title }}
                    </Link>
                    <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <Link :href="model.link">
                {{ model.title }}
                </Link>
            </div>
            <div class="bg-zinc-900">
                <div class="block relative">
                    <div class="absolute w-full h-full bg-gradient-to-b from-transparent to-[rgba(28,29,31,0.9)]"></div>

                    <img class="object-contain h-full md:h-80 w-full" :src="model.image">
                    <div class="absolute flex flex-col items-center justify-center top-0 left-0 h-full w-full">
                        <div class="flex flex-col flex-grow items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-20 h-20 fill-white">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <div class=" flex items-end justify-center mb-4">
                            <p class="font-UdemySansBold">Preview this course</p>
                        </div>

                    </div>
                </div>

            </div>
            <h1 class=" h2 font-UdemySansBold ">{{ model.title }}</h1>
            <p>{{ model.description }}</p>
        </section>

    </Layout>
</template>