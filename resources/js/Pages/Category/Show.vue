<script setup>
import { ref } from 'vue'
import { camel } from 'radash';
import CoursesSlide from '../../Components/Slides/CoursesSlide.vue';
import Carousel from '../../Components/Carousel.vue';
import CarouselControls from '../../Components/Buttons/CarouselControls.vue'
const props = defineProps({ category: Object, courses: Object })
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
    <Layout :title="'Online ' + category.title + ' courses | ' + $page.props.appName" description="hello">
        <main class="px-5 md:px-10 py-14">
            <h1 class="mb-10"> {{ category.title }} Courses</h1>
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

            <section>
                <h2 class="font-UdemySansBold h3 font-black">Featured Courses</h2>
                <div class="p-6 border border-gray-300 hover:bg-slate-50 transition-opacity">
                    <Carousel class="md:h-60" data-carousel="slide">
                        <template v-for="row in courses">
                            <Link :href="row.link">
                            <Card1 class="group duration-1000 ease-in-out" data-carousel-item>
                                <div class="container mx-auto">
                                    <div class="grid grid-cols-12 h-full">
                                        <div class="col-span-12 md:col-span-6">
                                            <div class="bg-zinc-900 ">
                                                <img class="w-full h-auto object-cover group-hover:opacity-80 transition-opacity"
                                                    :src="row.image">
                                            </div>
                                        </div>
                                        <div class="col-span-12 md:col-span-6">


                                        </div>
                                    </div>
                                </div>
                            </Card1>
                            </Link>
                        </template>
                        <template v-slot:carousel-controls>
                            <CarouselControls previousControlCustom="-left-10" nextControlCustom="-right-10">
                            </CarouselControls>
                        </template>
                    </Carousel>
                </div>
            </section>
        </main>
    </Layout>
</template>