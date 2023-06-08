<script setup>
import { onMounted } from "vue";
import Button1 from "/resources/js/Components/Buttons/Button1.vue";
import { useGroupArrayByKey } from "../Composables/GroupArrayByKey";

onMounted(() => {
   const slidesContainer = document.querySelector(".slides-container");
   const slideWidth = slidesContainer.querySelector(".slide").clientWidth;
   const prevButton = document.querySelector(".prev");
   const nextButton = document.querySelector(".next");

   nextButton.addEventListener("click", () => {
      slidesContainer.scrollLeft += slideWidth;
   });

   prevButton.addEventListener("click", () => {
      slidesContainer.scrollLeft -= slideWidth;
   });
});

const props = defineProps({
   subCategories: Object,
   courses: Object,
});

const courseSubCategories = Object.values(
   useGroupArrayByKey(props.subCategories, "category_id")
)[0];
</script>

<style>
.slides-container {
   -ms-overflow-style: none;
   /* Internet Explorer 10+ */
   scrollbar-width: none;
   /* Firefox */
}

.slides-container::-webkit-scrollbar {
   display: none;
   /* Safari and Chrome */
}
</style>

<template>
   <Layout :title="'Online Courses - Learn Anything, On Your Schedule | ' + $page.props.appName" description="hello">
      <section>
         <div id="animation-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
               <!-- Item 1 -->
               <div class="hidden duration-1000 ease-out" data-carousel-item>
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
               <div class="hidden duration-1000 ease-out" data-carousel-item>
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
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
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
                     }" :data-tabs-target="'#' + row.name + '-tab'" type="button" role="tab">
                     {{ row.name }}
                  </button>
                  <!--<button
                     :class="{ 'inline-block p-4 text-gray-950': true, 'aria-selected:hover:text-gray-950': index === 0 }"
                     :data-tabs-target="'#' + row.name + '-tab'" type="button" role="tab">
                     {{ row.name }}
                  </button>-->
               </li>
            </ul>
         </div>
         <div id="coursesTab" class="border border-stone-400">
            <!-- Loop through subcategories-->
            <template v-for="(row, index) in courseSubCategories">
               <div class="hidden p-10" :id="row.name + '-tab'" role="tabpanel">
                  <h2 class="font-UdemySans text-2xl tracking-tight">
                     Expand your career opportunities with {{ row.name }}
                  </h2>
                  <p class="line-clamp-3 text-ellipsis md:w-2/3">
                     Take one of {{ $page.props.appName }}’s range of {{ row.name }} courses and
                     learn how to code using this incredibly useful language. Its simple syntax
                     and readability makes {{ row.name }} perfect for Flask, Django, data
                     science, and machine learning. You’ll learn how to build everything from
                     games to sites to apps. Choose from a range of courses that will appeal to
                  </p>
                  <Link class="my-5" type="button" href="#">
                  <Button1>Explore {{ row.name }}</Button1>
                  </Link>
                  <!-- Get only courses that belong to that subcategory-->
                  <div class="relative">
                     <div
                        class="slides-container h-72 flex snap-x snap-mandatory overflow-hidden overflow-x-auto space-x-2 rounded scroll-smooth before:w-[45vw] before:shrink-0 after:w-[45vw] after:shrink-0 md:before:w-0 md:after:w-0">
                        <template v-for="(row, index) in useGroupArrayByKey(courses, 'sub_category_id')[
                           row.id
                           ]">
                           <div>
                              <img class="w-full h-32 object-cover"
                                 src="https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?auto=compress&cs=tinysrgb&w=1600"
                                 alt="mountain_image" />
                           </div>
                           <div>
                           </div>
                        </template>
                        <!-- Slider controls -->
                        <button type="button"
                           class="absolute top-0 -left-10 z-10 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                           data-carousel-prev>
                           <span
                              class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                              <svg aria-hidden="true"
                                 class="w-5 h-5 text-white font-black sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                 </path>
                              </svg>
                              <span class="sr-only">Previous</span>
                           </span>
                        </button>
                        <button type="button"
                           class="absolute top-0 -right-8 z-10 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                           data-carousel-next>
                           <span
                              class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                              <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                 </path>
                              </svg>
                              <span class="sr-only">Next</span>
                           </span>
                        </button>
                     </div>
                  </div>
               </div>
            </template>
         </div>
         <div class="relative">
            <div
               class="slides-container h-72 flex snap-x snap-mandatory overflow-hidden overflow-x-auto space-x-2 rounded scroll-smooth before:w-[45vw] before:shrink-0 after:w-[45vw] after:shrink-0 md:before:w-0 md:after:w-0">
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?auto=compress&cs=tinysrgb&w=1600"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/6263568/pexels-photo-6263568.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/3026364/pexels-photo-3026364.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/10343729/pexels-photo-10343729.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/13860053/pexels-photo-13860053.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/8576739/pexels-photo-8576739.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/1743367/pexels-photo-1743367.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/5920021/pexels-photo-5920021.jpeg?auto=compress&cs=tinysrgb&w=1600"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/12805075/pexels-photo-12805075.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="mountain_image" />
               </div>
               <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                  <img class="w-full h-full object-cover"
                     src="https://images.pexels.com/photos/547115/pexels-photo-547115.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="mountain_image" />
               </div>
            </div>

            <div class="absolute top-0 -left-4 h-full items-center hidden md:flex">
               <button role="button" class="prev px-2 py-2 rounded-full bg-neutral-100 text-neutral-900 group"
                  aria-label="prev">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="w-5 h-5 group-active:-translate-x-2 transition-all duration-200 ease-linear">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                  </svg>
               </button>
            </div>
            <div class="absolute top-0 -right-4 h-full items-center hidden md:flex">
               <button role="button" class="next px-2 py-2 rounded-full bg-neutral-100 text-neutral-900 group"
                  aria-label="next">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="w-5 h-5 group-active:translate-x-2 transition-all duration-200 ease-linear">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>
               </button>
            </div>
         </div>

         <!--<div class="mb-1">
            <ul class="flex flex-wrap -mb-px text-base font-bold text-center" data-tabs-toggle="#coursesTab"
               role="tablist">
               <li class="mr-2" role="presentation">
                  <button class="inline-block p-4 text-gray-950 aria-selected:hover:text-gray-950" id="profile-tab"
                     data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                     Profile
                  </button>
               </li>
               <li class="mr-2" role="presentation">
                  <button
                     class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                     id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                     aria-selected="false">
                     Dashboard
                  </button>
               </li>
               <li class="mr-2" role="presentation">
                  <button
                     class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                     id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                     aria-selected="false">
                     Settings
                  </button>
               </li>
               <li role="presentation">
                  <button
                     class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                     id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                     aria-selected="false">
                     Contacts
                  </button>
               </li>
            </ul>
         </div>
         <div id="coursesTab" class="border border-stone-400">
            <div class="hidden p-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               <p class="text-sm text-gray-500 dark:text-gray-400">
                  This is some placeholder content the
                  <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                  Clicking another tab will toggle the visibility of this one for the next.
                  The tab JavaScript swaps classes to control the content visibility and
                  styling.
               </p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
               aria-labelledby="dashboard-tab">
               <p class="text-sm text-gray-500 dark:text-gray-400">
                  This is some placeholder content the
                  <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                  Clicking another tab will toggle the visibility of this one for the next.
                  The tab JavaScript swaps classes to control the content visibility and
                  styling.
               </p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
               aria-labelledby="settings-tab">
               <p class="text-sm text-gray-500 dark:text-gray-400">
                  This is some placeholder content the
                  <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                  Clicking another tab will toggle the visibility of this one for the next.
                  The tab JavaScript swaps classes to control the content visibility and
                  styling.
               </p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
               aria-labelledby="contacts-tab">
               <p class="text-sm text-gray-500 dark:text-gray-400">
                  This is some placeholder content the
                  <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                  Clicking another tab will toggle the visibility of this one for the next.
                  The tab JavaScript swaps classes to control the content visibility and
                  styling.
               </p>
            </div>
         </div>-->
      </section>
   </Layout>
</template>
