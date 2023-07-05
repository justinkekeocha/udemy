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

console.log(props.instructors)
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
                        <template v-for="(row, index) in topics" :key="row.id">
                            <div
                                class="snap-start border border-gray-300 hover:bg-slate-50 transition-opacity py-4 px-20 text-center">
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
                    <Slide class="grid-rows-1 gap-4 ">
                        <template v-for="(row, index) in instructors" :key="row.id">
                            <div class="snap-start border border-gray-300 hover:bg-slate-50 transition-opacity p-4">
                                <Link class="my-5" :href="row.link">
                                <div class="flex gap-x-6">
                                    <img class="w-16 h-16 rounded-full shadow-lg" :src="row.image" :alt="row.name" />
                                    <div class="flex flex-col gap-1">
                                        <p class="font-UdemySansBold line-clamp-1 text-ellipsis">{{ row.name }}</p>
                                        <p class="line-clamp-1 text-ellipsiss">Lorem, Ipsum</p>
                                        <div class="flex items-center">
                                            <span class="text-sm font-bold text-yellow-600 me-1">4.7</span>
                                            <div class="flex items-center">
                                                <svg aria-hidden="true" class="w-4 h-4 text-yellow-400" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <title>First star</title>
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <span class="text-yellow-500 text-xs ms-1">Instructor Rating</span>
                                        </div>
                                        <p class="text-xs"><span class="font-UdemySansBold me-1">2,343,382</span>
                                            <span>students</span>
                                        </p>
                                        <p class="text-xs"><span class="font-UdemySansBold me-1">{{
                                            row.instructed_courses_count
                                        }}</span>
                                            <span>courses</span>
                                        </p>
                                    </div>
                                </div>
                                </Link>
                            </div>
                        </template>
                    </Slide>
                </div>
            </section>


            <section class="mb-10">
                <h2 class="font-UdemySansBold h3 font-black">All {{ model.title }} Courses</h2>
                <div class="flex border border-gray-300 p-3 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10 fill-zinc-900 text-white me-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>
                    <p class="font-UdemySansBold">Not sure? All courses have a 30-day money-back guarantee</p>
                </div>
            </section>

        </main>
    </Layout>
</template>