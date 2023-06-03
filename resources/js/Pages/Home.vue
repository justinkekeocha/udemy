<script setup>
import { useSubCategoryStore } from "../Stores/SubCategoryStore";
import Button1 from "/resources/js/Components/Buttons/Button1.vue";

const subCategoryStore = useSubCategoryStore();
subCategoryStore.getSubCategories();
</script>

<template>
  <Layout
    title="Online Courses - Learn Anything, On Your Schedule | Udemy"
    description="hello"
  >
    <section>
      <div id="animation-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
          <!-- Item 1 -->
          <div class="hidden duration-1000 ease-out" data-carousel-item>
            <img
              src="../../../public/assets/img/carousel-1.jpg"
              class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
              alt="..."
            />
            <div
              class="absolute w-[28rem] bg-white top-14 left-20 p-8 shadow-[0px_2px_4px_0px_#00000024]"
            >
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
            <img
              src="../../../public/assets/img/carousel-2.jpg"
              class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
              alt="..."
            />
            <div
              class="absolute w-[30rem] bg-white top-14 left-20 p-8 shadow-[0px_2px_4px_0px_#00000024]"
            >
              <h1 class="text-3xl font-black font-SuisseWorks mb-3">
                Unlock the power of your people
              </h1>
              <p class="text-base mb-3">
                Udemy Business is trusted by 12.5K+ companies around the world. Find out
                what we can do for yours.
              </p>
              <Button1 class="!bg-black hover:bg-black text-white"
                >Request a demo</Button1
              >
            </div>
          </div>
        </div>
        <!-- Slider controls -->
        <button
          type="button"
          class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
          data-carousel-prev
        >
          <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
          >
            <svg
              aria-hidden="true"
              class="w-5 h-5 text-white font-black sm:w-6 sm:h-6 dark:text-gray-800"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"
              ></path>
            </svg>
            <span class="sr-only">Previous</span>
          </span>
        </button>
        <button
          type="button"
          class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
          data-carousel-next
        >
          <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
          >
            <svg
              aria-hidden="true"
              class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
              ></path>
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
      </p>

      <div class="mb-1">
        <ul
          class="flex flex-wrap -mb-px text-base font-bold text-center"
          data-tabs-toggle="#coursesTab"
          role="tablist"
        >

        {{ Object.entries(subCategoryStore.groupedSubCategories)[0] }}
          <li
            class="mr-2"
            role="presentation"
            v-for="subCategory in Object.values(subCategoryStore.groupedSubCategories)[0]"
          >
            <button
              class="inline-block p-4 text-gray-950 aria-selected:hover:text-gray-950"
              id="profile-tab"
              data-tabs-target="#profile"
              type="button"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
            >
              {{ subCategory.name }}
            </button>
          </li>

          <li class="mr-2" role="presentation">
            <button
              class="inline-block p-4 text-gray-950 aria-selected:hover:text-gray-950"
              id="profile-tab"
              data-tabs-target="#profile"
              type="button"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
            >
              Profi
            </button>
          </li>
          <li class="mr-2" role="presentation">
            <button
              class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
              id="dashboard-tab"
              data-tabs-target="#dashboard"
              type="button"
              role="tab"
              aria-controls="dashboard"
              aria-selected="false"
            >
              Dashboard
            </button>
          </li>
          <li class="mr-2" role="presentation">
            <button
              class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
              id="settings-tab"
              data-tabs-target="#settings"
              type="button"
              role="tab"
              aria-controls="settings"
              aria-selected="false"
            >
              Settings
            </button>
          </li>
          <li role="presentation">
            <button
              class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
              id="contacts-tab"
              data-tabs-target="#contacts"
              type="button"
              role="tab"
              aria-controls="contacts"
              aria-selected="false"
            >
              Contacts
            </button>
          </li>
        </ul>
      </div>
      <div id="coursesTab" class="border border-stone-400">
        <div
          class="hidden p-5"
          id="profile"
          role="tabpanel"
          aria-labelledby="profile-tab"
        >
          <p class="text-sm text-gray-500 dark:text-gray-400">
            This is some placeholder content the
            <strong class="font-medium text-gray-800 dark:text-white"
              >Profile tab's associated content</strong
            >. Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and
            styling.
          </p>
        </div>
        <div
          class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
          id="dashboard"
          role="tabpanel"
          aria-labelledby="dashboard-tab"
        >
          <p class="text-sm text-gray-500 dark:text-gray-400">
            This is some placeholder content the
            <strong class="font-medium text-gray-800 dark:text-white"
              >Dashboard tab's associated content</strong
            >. Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and
            styling.
          </p>
        </div>
        <div
          class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
          id="settings"
          role="tabpanel"
          aria-labelledby="settings-tab"
        >
          <p class="text-sm text-gray-500 dark:text-gray-400">
            This is some placeholder content the
            <strong class="font-medium text-gray-800 dark:text-white"
              >Settings tab's associated content</strong
            >. Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and
            styling.
          </p>
        </div>
        <div
          class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
          id="contacts"
          role="tabpanel"
          aria-labelledby="contacts-tab"
        >
          <p class="text-sm text-gray-500 dark:text-gray-400">
            This is some placeholder content the
            <strong class="font-medium text-gray-800 dark:text-white"
              >Contacts tab's associated content</strong
            >. Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and
            styling.
          </p>
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
