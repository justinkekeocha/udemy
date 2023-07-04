<script setup>
import { ref } from 'vue'
import { camel } from 'radash';
import CoursesSlide from '../../Components/Slides/CoursesSlide.vue';
import Carousel from '../../Components/Carousels/Carousel.vue';
import StarRating from '../../Components/StarRating.vue'
import Slide from '../../Components/Slides/Slide.vue'
import SlideControls from '../../Components/Slides/SlideControls.vue';
const props = defineProps({ model: Object, courses: Object, topics: Object, instructors: Object })
//https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/slice
const coursesTab = ref([
    {
        title: 'Most popular',
        limit: 0
    },
    {
        title: 'New',
        limit: 3
    },
    {
        title: 'Trending',
        limit: 8
    },
])
</script>
<template>
    <Layout :title="'Online ' + model.title + ' courses | ' + $page.props.appName" description="hello">
        <main class="px-5 md:px-10 py-14">
            <h1 class="mb-10"> {{ model.title }} Courses</h1>
            <section>
                <h2 class="font-UdemySansBold h3 font-black">Courses to get you started</h2>
                <div class="border-b  border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#coursesTabContent" role="tablist">
                        <template v-for="row in coursesTab">
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 font-semibold font-UdemySansBold text-base  text-neutral-500 hover:text-black aria-selected:border-b-2 aria-selected:border-b-black aria-selected:text-black"
                                    :data-tabs-target="'#' + camel(row.title)" type="button" role="tab"
                                    aria-selected="false">{{ row.title }}</button>
                            </li>
                        </template>
                    </ul>
                </div>
                <div id="coursesTabContent">
                    <template v-for="row in coursesTab">
                        <div class="hidden" role="tabpanel" :id="camel(row.title)">
                            <!-- Slice picks different parts of the courses object and shows it -->
                            <CoursesSlide :courses="courses.slice(row.limit)"></CoursesSlide>
                        </div>
                    </template>

                </div>
            </section>

            <section class="mb-10">
                <h2 class="font-UdemySansBold h3 font-black">Featured Courses</h2>
                <div class="p-6 border border-gray-300 hover:bg-slate-50 transition-opacity">
                    <Carousel>
                        <template v-for="row in courses">
                            <div class="group">
                                <Link :href="row.link">
                                <div class="container">
                                    <div class="grid grid-cols-12 gap-7">
                                        <div class="col-span-12 md:col-span-5">
                                            <div class="bg-zinc-900">
                                                <img class="w-full h-auto object-center object-cover align-middle group-hover:opacity-80 transition-opacity"
                                                    :src="row.image">
                                            </div>
                                        </div>
                                        <div class="col-span-12 md:col-span-7">
                                            <div class="grid grid-cols-1 content-between max-w-lg">
                                                <div class="flex flex-col gap-1">
                                                    <p class="h3 mb-0">{{ row.title }}
                                                    </p>
                                                    <p class="line-clamp-3 text-ellipsis">{{ row.description }}</p>
                                                    <p class="text-xs line-clamp-1 text-ellipsis text-neutral-500">By {{
                                                        row.instructor.name }}</p>
                                                    <p class="text-xs">
                                                        <span class="text-teal-800">Updated <b
                                                                class="font-UdemySansBold">June
                                                                2023</b></span>
                                                        <span class="ms-2 text-neutral-500">67 total hours . 410 lectures .
                                                            All
                                                            levels</span>
                                                    </p>
                                                    <div class="flex">
                                                        <StarRating class="me-2" /> <span
                                                            class="bg-amber-400 text-yellow-950 font-UdemySansBold text-xs p-1">Highest
                                                            rated</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-xl">
                                                        <span class="font-UdemySansBold font-black">₦{{ row.price }}</span>
                                                        <span class="line-through text-gray-400 font-normal ms-2">₦{{
                                                            row.inflated_price }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </Link>
                            </div>

                        </template>
                        <template v-slot:carousel-controls>
                            <SlideControls></SlideControls>
                        </template>
                    </Carousel>
                </div>
            </section>

            <section class="mb-10">
                <h2 class="font-UdemySansBold h3 font-black">Popular Topics</h2>
                <div class="p-1">
                    <!--auto-cols-[calc((100%-(1)*.8rem)/2)]-->
                    <Slide class="grid-rows-2 !gap-2">
                        <template v-for="(row, index) in model.topics" :key="row.id">
                            <div class="border border-gray-300 hover:bg-slate-50 transition-opacity py-4 px-20 text-center">
                                <Link class="my-5" :href="row.link">
                                <p class="font-UdemySansBold">{{ row.title }}</p>
                                </Link>
                            </div>
                        </template>
                    </Slide>
                </div>
            </section>

            <section class="mb-10">
                <h2 class="font-UdemySansBold h3 font-black">Popular Instructors</h2>
                <div class="p-1">
                    <Slide class="grid-rows-1 gap-4">
                        <template v-for="(row, index) in instructors" :key="row.id">
                            <div class="border border-gray-300 hover:bg-slate-50 transition-opacity py-4 px-20 text-center">
                                <Link class="my-5" :href="row.link">
                                <p class="font-UdemySansBold">{{ row.name }}</p>
                                </Link>
                            </div>
                        </template>
                    </Slide>
                </div>
            </section>

        </main>
    </Layout>
</template>