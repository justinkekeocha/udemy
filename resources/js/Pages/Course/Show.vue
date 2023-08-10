<script setup>
import StarRating from '../../Components/StarRating.vue'
import CourseCard from '../../Components/Cards/CourseCard.vue';
import Button3 from '../../Components/Buttons/Button3.vue';
const props = defineProps({ model: Object, related: Object, ratings: Object })
import { DateTime } from "luxon";
</script>
<template>
    <Layout :title="model.title + ' | ' + $page.props.appName" description="hello">
        <section class="py-4 md:px-48 mb-10 block bg-zinc-900 text-white">
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
                <span class="hidden sm:flex items-center">
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
            <div class="px-5 md:px-0">
                <h1 class=" h2 font-UdemySansBold ">{{ model.title }}</h1>
                <p class="mb-5 text-lg">Consequatur in facere molestiae tenetur qui officia ut. Excepturi qui est
                    delectus
                    soluta id
                    distinctio natus.</p>
                <div class="flex items-center text-sm mb-2">
                    <StarRating :rating="model.rating" class="[&>*]:text-amber-200" />
                    <span class="text-violet-300 underline me-2">({{ model.ratings_count }} ratings) </span>
                    <span>18,278 students</span>
                </div>
                <p class="text-sm mb-2">Created by <span class="text-violet-300 underline">{{ model.instructor.name
                }}</span>
                </p>
                <div class="flex items-center font-UdemySans text-sm mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <!--https://www.freecodecamp.org/news/how-to-format-dates-in-javascript/-->
                    <span class="ms-2">Last updated {{ new Date(model.updated_at).toLocaleDateString('en-us', {
                        year: "numeric", month: "numeric"
                    }) }}</span>
                </div>
                <div class="flex items-center font-UdemySans text-sm mb-14">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>

                    <!--https://www.freecodecamp.org/news/how-to-format-dates-in-javascript/-->
                    <span class="ms-2">English</span>
                </div>
                <p class="h1 font-UdemySansBold">₦{{ model.price }}</p>
                <Button3>Go to cart</Button3>
                <p class="text-center text-xs mb-5">30-Day Money-Back Guarantee</p>
                <div class="flex items-center justify-between underline font-UdemySansBold px-8 text-sm">
                    <button>Share</button>
                    <Link href="#">
                    Gift this course
                    </Link>
                    <button class="">Apply coupon</button>
                </div>
            </div>
        </section>

        <section class="px-5 md:px-48">
            <section class="mb-10">
                <div class="border border-gray-300 px-5 py-5">
                    <h2 class="font-UdemySansBold text-2xl">What you will learn</h2>
                    <div class="container">
                        <div class="grid grid-cols-12 gap-7">
                            <div class="col-span-12 md:col-span-6 flex flex-col gap-3">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="ms-3">Extensive, informative and interesting video lecture</span>
                                </div>
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="ms-3">Lab Exercises</span>
                                </div>
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="ms-3">All Powerpoint Demonstrations Used in Course</span>
                                </div>

                            </div>
                            <div class="col-span-12 md:col-span-6 flex flex-col gap-3">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="ms-3">Extensive, informative and interesting video lecture</span>
                                </div>
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="ms-3">Lab Exercises</span>
                                </div>
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="ms-3">All Powerpoint Demonstrations Used in Course</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-10">
                <h2 class="font-UdemySansBold text-2xl mb-5">This course includes:</h2>
                <div class="container">
                    <div class="grid grid-cols-12 gap-7">
                        <div class="col-span-12 md:col-span-6 flex flex-col gap-3">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                                <span class="ms-3">7.5 hours on-demand video</span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                                </svg>
                                <span class="ms-3">6 coding exercises</span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                </svg>

                                <span class="ms-3">1 article</span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                </svg>

                                <span class="ms-3">24 downloadable resources</span>
                            </div>


                        </div>
                        <div class="col-span-12 md:col-span-6 flex flex-col gap-3">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>

                                <span class="ms-3">Access on mobile and TV</span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 h-6">
                                    <path
                                        d="M18.1777 8C23.2737 8 23.2737 16 18.1777 16C13.0827 16 11.0447 8 5.43875 8C0.85375 8 0.85375 16 5.43875 16C11.0447 16 13.0828 8 18.1788 8H18.1777Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="ms-3">Full time access</span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                                </svg>

                                <span class="ms-3">Certificate of completion</span>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-10">
                <div class="border border-gray-300 px-5 py-5 text-sm">
                    <p class="font-UdemySansBold  mb-2">Top companies offer this course to their employees</p>
                    <p class="mb-5">This course was selected for our collection of top-rated courses trusted by businesses
                        worldwide.
                        <Link href="#" class="text-violet-800 underline">
                        Learn more
                        </Link>
                    </p>
                    <div class="flex justify-between flex-wrap items-center">
                        <img src="https://s.udemycdn.com/partner-logos/v4/nasdaq-dark.svg" alt="Nasdaq" height="38"
                            width="115" loading="lazy">
                        <img src="https://s.udemycdn.com/partner-logos/v4/volkswagen-dark.svg" alt="Volkswagen" height="38"
                            width="44" loading="lazy">
                        <img src="https://s.udemycdn.com/partner-logos/v4/box-dark.svg" alt="Box" height="38" width="67"
                            loading="lazy">
                        <img src="https://s.udemycdn.com/partner-logos/v4/netapp-dark.svg" alt="NetApp" height="38"
                            width="115" loading="lazy">
                        <img src="https://s.udemycdn.com/partner-logos/v4/eventbrite-dark.svg" alt="Eventbrite" height="38"
                            width="115" loading="lazy">

                    </div>
                </div>
            </section>
            <section class="mb-10">
                <h2 class="font-UdemySansBold text-2xl mb-5">Course content</h2>
                <p class="text-sm mb-3"><span>14 sections • 72 lectures •
                        <span><span>7h&nbsp;49m</span> total length</span></span>
                </p>

                <div data-accordion="open">
                    <div>

                        <button type="button"
                            class="flex items-center justify-between w-full py-3 px-8 border border-b-0  border-gray-300 !bg-gray-100 !text-black"
                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                            aria-controls="accordion-collapse-body-1">
                            <div class="flex items-center gap-3">
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                                <span class="font-black font-UdemySansBold">What is Flowbite?</span>
                            </div>
                            <span class="justify-self-end text-sm">1 lecture • <span>1min</span></span>
                        </button>

                        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                            <div class="p-5 border border-b-0 border-gray-200">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of
                                    interactive components built on top of Tailwind CSS including buttons, dropdowns,
                                    modals,
                                    navbars, and more.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button"
                            class="flex items-center justify-between w-full py-3 px-8 border border-b-0  border-gray-300 !bg-gray-100 !text-black"
                            data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                            aria-controls="accordion-collapse-body-2">
                            <div class="flex items-center gap-3">
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink" aria-hidden="false"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                                <span class="font-black font-UdemySansBold">What is Flowbite?</span>
                            </div>
                            <span class="justify-self-end text-sm">1 lecture • <span>1min</span></span>
                        </button>

                        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="p-5 border border-b-0 border-gray-200">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of
                                    interactive components built on top of Tailwind CSS including buttons, dropdowns,
                                    modals,
                                    navbars, and more.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button"
                            class="flex items-center justify-between w-full py-3 px-8 border border-b-0  border-gray-300 !bg-gray-100 !text-black"
                            data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                            aria-controls="accordion-collapse-body-3">
                            <div class="flex items-center gap-3">
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink" aria-hidden="false"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                                <span class="font-black font-UdemySansBold">What is Flowbite?</span>
                            </div>
                            <span class="justify-self-end text-sm">1 lecture • <span>1min</span></span>
                        </button>

                        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                            <div class="p-5 border border-b-0 border-gray-200">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of
                                    interactive components built on top of Tailwind CSS including buttons, dropdowns,
                                    modals,
                                    navbars, and more.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-10">
                <h2 class="font-UdemySansBold text-2xl mb-5">Requirements</h2>
                <ul class="list-disc list-inside mb-5">
                    <li>
                        Some basic knowledge of HTML is required for this course.
                    </li>
                </ul>
                <h2 class="font-UdemySansBold text-2xl mb-5">Description</h2>
                <p class="mb-3">{{ model.description }}
                </p>
                <h2 class="font-UdemySansBold text-2xl mb-5">Who this course is for:</h2>
                <ul class="list-disc list-inside mb-5">
                    <li>
                        Web Designers looking to improve their skill set
                    </li>
                    <li>
                        Programmers who need to learn Javascript for their web applications
                    </li>
                    <li>
                        People looking to start programming and need a first programming language to learn
                    </li>
                    <li>
                        Students who want to learn Javascript
                    </li>
                </ul>
            </section>
            <section class="mb-10">
                <h2 class="font-UdemySansBold text-2xl mb-5">Students also bought</h2>
                <div>
                    <template v-for="row in related">
                        <div class="flex flex-wrap md:flex-nowrap items-start gap-5 mb-5">
                            <div class="flex items-center gap-3">
                                <div>
                                    <img :src="row.image" class="h-16 w-16 object-cover">
                                </div>
                                <div class="flex flex-col gap-2 w-72">
                                    <p class="text-ellipsis line-clamp-2 font-UdemySansBold">{{ row.title }}</p>
                                    <p class="text-sm"><span class=" text-teal-800 font-extrabold">52.5 total hours •
                                        </span> <span>Updated
                                            {{
                                                new
                                                    Date(row.updated_at).toLocaleDateString('en-us', {
                                                        year: "numeric", month: "numeric"
                                                    }) }}</span></p>
                                </div>
                            </div>
                            <div class="flex flex-wrap items-start gap-3 ms-16 md:ms-0">
                                <div class="flex items-center gap-1">
                                    <span class="text-sm text-yellow-950 font-black">{{ row.rating }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4 fill-[#b4690e]">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4">
                                        <path
                                            d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                                    </svg>
                                    <span class="text-sm">141,056</span>
                                </div>
                                <div class="flex md:flex-col gap-1">
                                    <span class="text-sm font-UdemySansBold">₦{{ row.price }}</span>
                                    <span class="text-sm line-through text-neutral-500">₦{{ row.inflated_price }}</span>
                                </div>
                                <button class="border border-zinc-900 rounded-full p-2 hidden md:block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </template>

                </div>
            </section>
            <section class="mb-10">
                <div class="border border-gray-300 px-5 py-5">
                    <h2 class="font-UdemySansBold text-2xl">Frequently Bought Together</h2>
                    <div>
                        <template v-for="row in related.slice(0, 3)">
                            <Link :href="row.link">
                            <div class="flex flex-wrap md:flex-nowrap items-start gap-5 mb-5">
                                <div class="flex items-start gap-3">
                                    <img :src="row.image" class="h-16 w-16 md:h-32 md:w-80 object-cover">
                                    <div class="flex flex-col w-72">
                                        <p class="text-ellipsis line-clamp-2 font-UdemySansBold">{{ row.title }}</p>
                                        <p class="text-gray-400 text-xs">{{ row.instructor.name }}</p>
                                        <div class="flex items-center">
                                            <StarRating :rating="row.rating" class="me-0" />
                                            <span class="text-gray-400 text-xs">({{ row.ratings_count }}) </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-start gap-3 ms-16 md:ms-0">

                                    <div class="flex md:flex-col gap-1">
                                        <span class=" font-UdemySansBold">₦{{ row.price }}</span>
                                        <span class="text-sm line-through text-neutral-500">₦{{ row.inflated_price }}</span>
                                    </div>

                                </div>
                            </div>
                            </Link>
                        </template>
                        <div class="flex items-center justify-between">
                            <div class="text-xl">
                                <span>
                                    Total:
                                </span>
                                <span class="font-bold">
                                    ₦30,300
                                </span>
                                <span class="text-base line-through text-neutral-500">
                                    ₦34,300
                                </span>
                            </div>
                            <button class="w-28 bg-[#a435f0] text-white px-3 h-12 font-UdemySansBold mb-2">Go to
                                cart</button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-10">
                <h2 class="font-UdemySansBold text-2xl mb-5">Instructor</h2>
                <h3 class="underline text-violet-700">
                    <Link :href="model.instructor.link">
                    {{ model.instructor.name }}
                    </Link>
                </h3>
                <p class="text-base text-neutral-500 mb-3">Career Building Digital Skills Training</p>
                <div class="flex gap-5 mb-5">
                    <div>
                        <img :src="model.instructor.image"
                            class="border border-slate-500 w-32 h-32 rounded-full object-cover">
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class=" w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>{{ model.rating }} Instructor Rating</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <!--https://www.svgrepo.com/svg/48200/medal-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="#000000" version="1.1" id="Layer_1" viewBox="0 0 479.999 479.999" xml:space="preserve"
                                class="w-4 h-4">
                                <g>
                                    <g>
                                        <g>
                                            <path
                                                d="M399.652,211.652c-9.977-9.01-15.472-20.97-15.474-33.678c-0.003-12.716,5.494-24.686,15.467-33.699     c19.555-17.627,19.994-30.869,16.918-38.875c-2.916-7.591-11.312-16.64-34.748-16.64c-1.634,0-3.341,0.045-5.063,0.134     c-13.817,0.702-26.591-4.215-35.577-13.662c-8.473-8.909-12.779-20.984-12.128-33.983c0.831-16.001-2.102-27.648-8.719-34.618     C316.21,2.293,310.887,0,304.934,0c-9.77,0-20.277,6.154-31.23,18.291c-9.02,9.989-20.988,15.49-33.704,15.49     s-24.685-5.501-33.702-15.489C195.341,6.154,184.835,0,175.069,0c-5.949,0-11.271,2.292-15.388,6.626     c-6.618,6.968-9.556,18.615-8.732,34.605c0.653,13.02-3.654,25.096-12.129,34.005c-8.418,8.851-20.123,13.725-32.959,13.725     c-0.002,0-0.003,0-0.005,0c-0.864,0-1.743-0.022-2.601-0.065c-1.732-0.09-3.439-0.135-5.073-0.135     c-23.434,0-31.829,9.049-34.746,16.641c-3.075,8.006-2.638,21.249,16.906,38.865c9.982,9.021,15.479,20.992,15.477,33.708     c-0.002,12.708-5.497,24.668-15.47,33.674c-19.555,17.64-19.99,30.888-16.912,38.896c2.917,7.588,11.308,16.634,34.714,16.634     c1.646,0,3.363-0.046,5.099-0.136c11.571-0.595,22.418,2.78,30.921,9.454l-61.907,145.91c-1.361,3.21-0.953,6.897,1.077,9.73     c2.031,2.835,5.403,4.401,8.867,4.148l56.259-4.165l28.927,43.423c1.866,2.801,4.999,4.456,8.32,4.456     c0.339,0,0.681-0.018,1.024-0.053c3.69-0.378,6.867-2.769,8.254-6.21l54.668-135.668l60.318,135.985     c1.479,3.334,4.655,5.599,8.289,5.909c0.285,0.024,0.57,0.036,0.854,0.036c3.323,0,6.454-1.657,8.318-4.453l28.95-43.426     l56.23,4.165c3.482,0.261,6.877-1.335,8.903-4.199c2.025-2.865,2.401-6.582,0.991-9.795L347.827,275     c7.491-5.215,16.566-8.024,26.293-8.024c0.868,0,1.753,0.022,2.618,0.066c1.744,0.091,3.461,0.137,5.102,0.137     c0.002,0,0.005,0,0.007,0c23.405-0.001,31.795-9.048,34.712-16.637C419.635,242.534,419.202,229.286,399.652,211.652z      M173.526,448.677l-21.652-32.504c-2-3.003-5.479-4.696-9.061-4.429l-45.736,3.387l50.871-119.896     c2.298,6.012,3.346,12.603,3.002,19.458c-0.825,15.996,2.113,27.64,8.731,34.607c4.118,4.334,9.439,6.625,15.389,6.625     c0,0,0.003,0,0.004,0c9.77-0.002,20.274-6.158,31.221-18.294c4.87-5.394,10.604-9.465,16.847-12.082L173.526,448.677z      M387.517,415.112l-45.473-3.368c-3.591-0.265-7.059,1.424-9.059,4.426l-22.1,33.151l-55.095-124.212     c6.657,2.59,12.765,6.82,17.909,12.518c10.952,12.142,21.46,18.298,31.231,18.297c5.954,0,11.278-2.294,15.398-6.633     c6.617-6.971,9.552-18.613,8.721-34.586c-0.408-8.127,1.119-15.887,4.386-22.74L387.517,415.112z M397.889,243.367     c-0.291,0.756-4.059,3.811-16.044,3.811c-1.298,0-2.666-0.036-4.078-0.11c-1.214-0.062-2.44-0.093-3.647-0.093     c-18.357,0-35.201,7.081-47.431,19.94c-12.29,12.921-18.546,30.25-17.614,48.811c0.596,11.455-1.38,17.823-3.252,19.796     c-0.345,0.363-0.486,0.402-0.893,0.402c-0.597,0-6.128-0.328-16.382-11.696c-12.86-14.243-30.102-22.088-48.549-22.088     s-35.688,7.845-48.552,22.091c-10.25,11.364-15.78,11.693-16.377,11.693c-0.405,0-0.545-0.039-0.889-0.4     c-1.872-1.971-3.849-8.34-3.258-19.816c0.931-18.541-5.325-35.869-17.616-48.791c-13.033-13.704-31.26-20.852-51.087-19.848     c-1.4,0.072-2.77,0.109-4.069,0.109c-11.986,0-15.755-3.054-16.045-3.81c-0.361-0.938,0.576-6.891,11.644-16.873     c14.229-12.85,22.066-30.081,22.069-48.519c0.004-18.444-7.833-35.686-22.076-48.558c-11.058-9.967-11.997-15.909-11.637-16.846     c0.29-0.757,4.064-3.814,16.076-3.814c1.291,0,2.651,0.036,4.053,0.108c1.202,0.061,2.42,0.092,3.619,0.092     c0.004,0,0.004,0,0.007,0c18.367-0.001,35.221-7.082,47.451-19.94c12.287-12.918,18.542-30.246,17.61-48.805     c-0.59-11.472,1.387-17.844,3.26-19.815c0.342-0.36,0.482-0.4,0.887-0.4c0.597,0,6.124,0.328,16.381,11.693     c12.86,14.243,30.102,22.088,48.549,22.088c18.447,0,35.688-7.845,48.55-22.089C298.804,20.328,304.335,20,304.934,20     c0.407,0,0.548,0.04,0.892,0.401c1.871,1.972,3.846,8.343,3.249,19.828c-0.931,18.542,5.324,35.868,17.61,48.786     c12.233,12.862,29.087,19.945,47.458,19.945c1.198,0,2.416-0.031,3.631-0.093c1.391-0.071,2.751-0.108,4.042-0.108     c12.014,0,15.788,3.056,16.079,3.813c0.359,0.937-0.581,6.878-11.649,16.855c-14.233,12.862-22.07,30.105-22.066,48.549     c0.003,18.438,7.841,35.669,22.073,48.523C397.314,236.477,398.249,242.429,397.889,243.367z" />
                                            <path
                                                d="M240.582,88.649c-52.742,0-95.65,42.9-95.65,95.633c0,52.738,42.908,95.644,95.65,95.644     c52.734,0,95.637-42.905,95.637-95.644C336.22,131.55,293.317,88.649,240.582,88.649z M240.582,259.926     c-41.714,0-75.65-33.934-75.65-75.644c0-41.704,33.936-75.633,75.65-75.633c41.706,0,75.637,33.929,75.637,75.633     C316.22,225.992,282.288,259.926,240.582,259.926z" />
                                            <path
                                                d="M244.48,133.235c-1.32-0.138-13.278-1.188-26.266,4.285c-12.493,5.266-28.061,17.508-31.277,45.929     c-0.621,5.488,3.324,10.44,8.811,11.061c0.383,0.043,0.762,0.064,1.138,0.064c5.019,0,9.346-3.77,9.924-8.876     c3.895-34.408,32.361-32.862,35.648-32.566c5.477,0.54,10.358-3.439,10.93-8.913C253.962,138.727,249.973,133.809,244.48,133.235     z" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span>128,790 Reviews</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path
                                    d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z">
                                </path>
                            </svg>
                            <span>1,328,477 Students</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>323 Courses</span>
                        </div>
                    </div>
                </div>
                <p class="text-sm">
                    {{ model.instructor.about }}
                </p>
            </section>
            <section class="mb-10">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 fill-[#b4690e]">
                        <path fill-rule="evenodd"
                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <h2 class="font-UdemySansBold text-2xl mb-5">{{ model.rating }} course rating <span
                            class="text-xl text-neutral-500">•</span> {{
                                model.ratings_count }}
                        ratings
                    </h2>
                </div>
                <div class="container mx-auto">
                    <div class="grid grid-cols-12 md:gap-10">
                        <template v-for="row in ratings">
                            <div class="col-span-12 md:col-span-6">
                                <div class="border-t border-gray-300 py-5">
                                    <div class="flex items-start gap-3 ">
                                        <img :src="row.user.image" class="w-12 h-12 rounded-full object-cover">
                                        <div class="flex flex-col">
                                            <p class="text-ellipsis line-clamp-2 font-UdemySansBold">{{ row.user.name }}</p>
                                            <div class="flex mb-5">
                                                <StarRating :rating="row.rating" class="me-0" />
                                                <span class="font-UdemySansBold text-sm text-neutral-500"> {{
                                                    DateTime.fromISO(row.updated_at).toRelativeCalendar() }}</span>
                                            </div>
                                            <p class="mb-5">{{ row.review }}</p>
                                            <div class="flex">
                                                <span class="text-xs me-3 text-neutral-500">Helpful?</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7.5 15h2.25m8.024-9.75c.011.05.028.1.052.148.591 1.2.924 2.55.924 3.977a8.96 8.96 0 01-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398C20.613 14.547 19.833 15 19 15h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 00.303-.54m.023-8.25H16.48a4.5 4.5 0 01-1.423-.23l-3.114-1.04a4.5 4.5 0 00-1.423-.23H6.504c-.618 0-1.217.247-1.605.729A11.95 11.95 0 002.25 12c0 .434.023.863.068 1.285C2.427 14.306 3.346 15 4.372 15h3.126c.618 0 .991.724.725 1.282A7.471 7.471 0 007.5 19.5a2.25 2.25 0 002.25 2.25.75.75 0 00.75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 002.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384" />
                                                </svg>


                                            </div>
                                        </div>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-28 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </section>
            <section class="mb-10">
                <h2 class="font-UdemySansBold text-2xl mb-5">More Courses by
                    <Link :href="model.instructor.link" class="text-violet-700">
                    {{ model.instructor.name
                    }}
                    </Link>
                </h2>
                <div class="flex gap-4 flex-wrap md:flex-nowrap">
                    <template v-for="row in model.instructor.instructed_courses.slice(0, 3)" v-if="model">
                        <CourseCard :course="row" class="max-w-full md:max-w-[15rem]"></CourseCard>
                    </template>
                </div>

            </section>



        </section>
    </Layout>
</template>