<script setup>
import StarRating from '../../Components/StarRating.vue'
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="45" fill="white" />
                                <polygon points="40,30 70,50 40,70" fill="black" />
                            </svg>
                        </div>
                        <div class="flex items-end justify-center mb-2">
                            <p class="font-UdemySansBold">Preview this course</p>
                        </div>

                    </div>
                </div>

            </div>
            <h1 class=" h2 font-UdemySansBold ">{{ model.title }}</h1>
            <p class="mb-5">{{ model.description }}</p>
            <div class="flex items-center text-sm mb-2">
                <StarRating :rating="model.rating" class="[&>*]:text-amber-200" />
                <span class="text-violet-300 underline me-2">({{ model.ratings_count }} ratings) </span>
                <span>18,278 students</span>
            </div>
            <p class="text-sm">Created by <span class="text-violet-300 underline">{{ model.instructor.name }}</span> </p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>


        </section>

    </Layout>
</template>