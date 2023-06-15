<script setup>
import Button1 from "../Components/Buttons/Button1.vue";
import { useGroupArrayByKey } from "../Composables/GroupArrayByKey";
import Slide from "../Components/Slide.vue"
import StarRating from "../Components/StarRating.vue";


const props = defineProps({
    subCategories: Object,
    courses: Object,
});

const courseSubCategories = Object.values(
    useGroupArrayByKey(props.subCategories, "category_id")
)[0];
</script>

<template>
    <Layout :title="'Online Courses - Learn Anything, On Your Schedule | ' + $page.props.appName" description="hello">
        <section>
            <div id="animation-carousel" class="relative w-full" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                        <div>
                            <img src="../../../public/assets/img/carousel-1.jpg"
                                class="block w-full object-cover object-center" alt="..." />
                        </div>
                        <div class="absolute w-[28rem] bg-white top-14 left-20 p-8 shadow-[0px_2px_4px_0px_#00000024]">
                            <h1 class="text-3xl font-black font-SuisseWorks mb-3">
                                Learning that gets you
                            </h1>
                            <p class="text-lg">
                                Skills for your present (and your future). Get started with us.
                            </p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                        <img src="../../../public/assets/img/carousel-2.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
                        <div class="absolute w-[30rem] bg-white top-14 left-20 p-8 shadow-[0px_2px_4px_0px_#00000024]">
                            <h1 class="text-3xl font-black font-SuisseWorks mb-3">
                                Unlock the power of your people
                            </h1>
                            <p class="text-base mb-3">
                                Udemy Business is trusted by 12.5K+ companies around the world. Find out
                                what we can do for yours.
                            </p>
                            <Button1 class="!bg-black hover:bg-black text-white">Request a demo</Button1>
                        </div>
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white font-black sm:w-6 sm:h-6 dark:text-gray-800"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </section>

        <section class="p-5">
            <h2 class="text-3xl font-extrabold font-SuisseWorks mb-3">
                A broad selection of courses
            </h2>
            <p class="text-xl font-light">
                Choose from over 210,000 online video courses with new additions published every
                month
            </p>
            <div class="mb-1">
                <ul class="flex flex-wrap -mb-px text-base font-bold text-center" data-tabs-toggle="#coursesTab"
                    role="tablist">
                    <li class="mr-2" role="presentation" v-for="(row, index) in courseSubCategories" :key="index">
                        <button :class="{
                                'inline-block p-4 text-gray-500 aria-selected:text-gray-950': true,
                            }" :data-tabs-target="'#' + row.title + '-tab'" type="button" role="tab">
                            {{ row.title }}
                        </button>
                    </li>
                </ul>
            </div>
            <div id="coursesTab" class="border border-stone-400">
                <!-- Loop through subcategories-->
                <template v-for="(row, index) in courseSubCategories">
                    <div class="hidden p-10" :id="row.title + '-tab'" role="tabpanel">
                        <h2 class="font-UdemySans text-2xl tracking-tight">
                            Expand your career opportunities with {{ row.title }}
                        </h2>
                        <p class="line-clamp-3 text-ellipsis md:w-2/3">
                            Take one of {{ $page.props.appName }}’s range of {{ row.title }} courses and
                            learn how to code using this incredibly useful language. Its simple syntax
                            and readability makes {{ row.title }} perfect for Flask, Django, data
                            science, and machine learning. You’ll learn how to build everything from
                            games to sites to apps. Choose from a range of courses that will appeal to
                        </p>
                        <Link class="my-5" type="button" href="#">
                        <Button1>Explore {{ row.title }}</Button1>
                        </Link>
                        <!-- Get only courses that belong to that subcategory-->
                        <Slide>
                            <template v-for="(row, index) in useGroupArrayByKey(courses, 'sub_category_id')[
                                row.id
                            ]">
                                <div class="slide w-56">

                                    <!-- <Popover :target="'course' + row.id + 'Popover'" class="z-50 hidden">
                                        <h3 class="text-base line-clamp-2 text-ellipsis tracking-tight mb-0">
                                            {{ row.title }}
                                        </h3>
                                    </Popover>-->
                                    <Link class="my-5" :href="row.link">
                                    <img class="w-full h-32 object-cover border border-stone-400 hover:transition-opacity hover:opacity-80"
                                        :src="row.image" alt="" />
                                    <div class="p-5">
                                        <h3 class="text-base line-clamp-2 text-ellipsis tracking-tight mb-0">
                                            {{ row.title }}
                                        </h3>
                                        <p class="text-xs line-clamp-1 text-ellipsis text-gray-400">{{
                                            row.instructor.name }}</p>
                                        <div class="flex">
                                            <span class="text-sm font-bold text-yellow-600">4.6</span>
                                            <StarRating />
                                            <span class="text-gray-400 text-xs ms-1">(499,666) </span>
                                        </div>
                                        <p class="mb-3 font-bold">₦ {{ row.price }} <span
                                                class="line-through text-gray-400 text-sm font-normal ms-1">{{
                                                    row.inflated_price }}</span>
                                        </p>
                                    </div>
                                    </Link>
                                </div>
                            </template>
                        </Slide>
                    </div>
                </template>
            </div>
        </section>
    </Layout>
</template>
