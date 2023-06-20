<script setup>
import { onMounted, onBeforeMount } from 'vue'
import Button1 from "../Components/Buttons/Button1.vue";
import { useGroupArrayByKey } from "../Composables/GroupArrayByKey";
import Slide from "../Components/Slide.vue"
import CarouselControls from '../Components/Buttons/CarouselControls.vue'
import StarRating from "../Components/StarRating.vue";
import Card1 from "../Components/Cards/Card1.vue";
import { Link } from '@inertiajs/vue3';
import Carousel from '../Components/Carousel.vue';


const props = defineProps({
    categories: Object,
    subCategories: Object,
    courses: Object,
});

//Get on the first subCategory
// const courseSubCategories = Object.values(
//     useGroupArrayByKey(props.subCategories, "category_id")
// )[0]

// console.log(useGroupArrayByKey(props.subCategories, "category_id"))

//Group subCategories according to category_id
const groupSubcategories = useGroupArrayByKey(props.subCategories, "category_id")

//Group courses according to subCategory
const groupCoursesbySubCategory = useGroupArrayByKey(props.courses, 'sub_category_id');



</script>

<template>
    <Layout :title="'Online Courses - Learn Anything, On Your Schedule | ' + $page.props.appName" description="hello">
        <section>
            <Carousel>
                <!-- Item 1 -->
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <div>
                        <img src="../../../public/assets/img/carousel-1.jpg" class="block w-full object-cover object-center"
                            alt="..." />
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
                <!-- Item 3 -->
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="../../../public/assets/img/carousel-3.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
                    <div class="absolute w-[30rem] bg-white top-14 left-20 p-8 shadow-[0px_2px_4px_0px_#00000024]">
                        <h1 class="text-3xl font-black font-SuisseWorks mb-3">
                            New to Udemy? Lucky you.
                        </h1>
                        <p class="text-base mb-3">
                            Enjoy new-learner savings with courses starting at ₦3,500 for a very limited time.
                        </p>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="../../../public/assets/img/carousel-4.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
                    <div class="absolute w-[30rem] bg-white top-14 left-20 p-8 shadow-[0px_2px_4px_0px_#00000024]">
                        <h1 class="text-3xl font-black font-SuisseWorks mb-3">
                            Build ready-for-anything teams
                        </h1>
                        <p class="text-base mb-3">
                            See why leading organizations choose to learn with Udemy Business.
                        </p>
                        <Button1 class="!bg-black hover:bg-black text-white">Request a demo</Button1>
                    </div>
                </div>
            </Carousel>

        </section>

        <section class="p-5 mb-5">
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
                    <li class="mr-2" role="presentation" v-for="(row, index) in groupSubcategories[1]" :key="index">
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
                <template v-for="(row, index) in groupSubcategories[1]">
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
                        <Link class="my-5" type="button" :href="row.link">
                        <Button1>Explore {{ row.title }}</Button1>
                        </Link>
                        <!-- Get only courses that belong to that subcategory-->
                        <Slide>
                            <template v-for="(row, index) in groupCoursesbySubCategory[
                                row.id
                            ]">

                                <div>
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

        <section class="py-14 px-10 bg-slate-50">
            <h2 class="font-UdemySans text-2xl leading-5 tracking-tight mb-9">How learners like you are achieving their
                goals
            </h2>
            <Slide>
                <template v-for="n in 8">
                    <Card1 class="min-w-[25rem]">
                        <img class="mb-5" src="https://s.udemycdn.com/browse_components/student-quote-unit/quote.svg"
                            width="17.78" height="16">
                        <p class="mb-5"> I am proud to say that after a few months of taking this course...<span
                                class="font-extrabold">I passed
                                my exam and am now an AWS Certified Cloud Practitioner!</span> This content was exactly what
                            the
                            CCP
                            exam covered.</p>
                        <p class="font-extrabold mb-5"><span
                                class="bg-zinc-900 rounded-full text-white font-black p-1 me-2">WA</span>
                            Will
                            A
                        </p>
                        <hr>
                        <div class="flex font-black text-violet-700 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 h-12 me-2">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>[NEW] Ultimate AWS Certified Cloud Practitioner - 2022</span>
                        </div>
                    </Card1>
                </template>
            </Slide>
        </section>

        <section class="py-14 px-10 bg-white">
            <h2 class="font-UdemySans text-2xl leading-5 tracking-tight mb-9">Students are viewing
            </h2>
            <Slide>
                <template v-for="(row, index) in groupCoursesbySubCategory[
                    1
                ]">

                    <div>
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
        </section>

        <!--Categories section-->
        <section class="container mx-auto p-5 mb-12">
            <h2 class="font-UdemySans text-2xl leading-5 tracking-tight mb-9">Top categories
            </h2>
            <div class="grid grid-cols-12 gap-5">
                <template v-for="row in categories">
                    <div class="col-span-12 md:col-span-3">
                        <Link :href="row.link">
                        <div class=" bg-white ">
                            <img class="w-full transition ease-in-out hover:scale-105 duration-150" :src="row.image" />
                        </div>
                        <p class="mt-5 font-black">{{ row.title }}</p>
                        </Link>
                    </div>
                </template>
            </div>
        </section>

        <section class="py-14 px-10 bg-slate-50">
            <h2 class="font-UdemySans text-2xl leading-5 tracking-tight mb-9">Featured topics by
                category
            </h2>
            <div class="container mx-auto">
                <div class="grid grid-cols-12 gap-5 mb-3">
                    <template v-for="row in categories.slice(0, 4)">
                        <div class="col-span-12 md:col-span-3">
                            <h3 class="text-xl">{{ row.title }}</h3>
                            <template v-for="row in groupSubcategories[row.id].slice(0, 2)">
                                <Link :href="row.link">
                                <p class="underline font-bold  text-violet-700 mb-1">{{ row.title }}</p>
                                </Link>
                                <p class="text-sm text-neutral-500 mb-5">7,070,015 students</p>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
            <Link type="button" href="#">
            <Button1>Explore more topics</Button1>
            </Link>
        </section>

        <section class="p-12">
            <h2 class="text-2xl leading-5 tracking-tight text-center mb-2">Trusted by over 13,400 great teams
            </h2>
            <p class="text-center mb-5">Leading companies use the same courses to help employees keep their skills fresh.
            </p>
            <div class="grid grid-cols-12 gap-5 mb-3">
                <div class="col-span-6 md:col-span-2">
                    <img src="https://s.udemycdn.com/partner-logos/v4/nasdaq-dark.svg">
                </div>
                <div class="col-span-6 md:col-span-2">
                    <img src="https://s.udemycdn.com/partner-logos/v4/volkswagen-dark.svg">
                </div>
                <div class="col-span-6 md:col-span-2">
                    <img src="https://s.udemycdn.com/partner-logos/v4/box-dark.svg">
                </div>
                <div class="col-span-6 md:col-span-2">
                    <img src="https://s.udemycdn.com/partner-logos/v4/netapp-dark.svg">
                </div>
                <div class="col-span-6 md:col-span-2">
                    <img src="https://s.udemycdn.com/partner-logos/v4/eventbrite-dark.svg">
                </div>
                <div class="col-span-6 md:col-span-2">
                    <img src="https://s.udemycdn.com/partner-logos/v4/tcs-dark.svg">
                </div>
            </div>
        </section>

        <section class="p-0 md:py-16 md:px-56 bg-slate-50">
            <Carousel>
                <template v-for="n in 8">
                    <Card1 class="duration-1000 ease-in-out" data-carousel-item>
                        <div class="container mx-auto">
                            <div class="grid grid-cols-12 gap-5 mb-3 h-full">
                                <div class="col-span-12 md:col-span-6">
                                    <img class="mb-5"
                                        src="https://s.udemycdn.com/browse_components/student-quote-unit/quote.svg"
                                        width="17.78" height="16">
                                    <p class="mb-16">Thanks to Udemy Business, Booz Allen has armed our workforce,
                                        specifically
                                        its<span class="font-extrabold"> data scientists, with highly relevant and in-demand
                                            tech
                                            skills</span> that are enabling consultants to stay ahead of big data trends and
                                        raise
                                        the bar on proficiency, skills, and competencies to meet client demand.</p>

                                    <Link href="#">
                                    <p class="underline font-extrabold  text-violet-700 mb-1">Read full story</p>
                                    </Link>
                                </div>
                                <div class="col-span-12 md:col-span-6">
                                    <div class="flex flex-col items-center">
                                        <img class="w-36 h-36 rounded-full mb-10"
                                            src="https://s.udemycdn.com/home/ub-case-studies/James_Hemgen.jpeg"
                                            alt="Rounded avatar">
                                        <p class="font-black text-xl">Jim Hemgen</p>
                                        <p class=" text-neutral-500 mb-4">Principal</p>
                                        <p>Booz Allexkgnfkgn Hamilton</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </Card1>
                </template>
                <template v-slot:carousel-controls>
                    <CarouselControls previousControlCustom="-left-9" nextControlCustom="-right-9"></CarouselControls>
                </template>
            </Carousel>
        </section>




    </Layout>
</template>
