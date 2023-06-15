<script setup>
import { watchEffect } from "vue";
import Button1 from "/resources/js/Components/Buttons/Button1.vue";
import Popover from "/resources/js/Components/Popover.vue";
import { initDropdowns } from "flowbite";
import { useCategoryStore } from "../Stores/CategoryStore";
import { useSubCategoryStore } from "../Stores/SubCategoryStore";

const categoryStore = useCategoryStore();
categoryStore.getCategories();

const subCategoryStore = useSubCategoryStore();
watchEffect(async () => {
    await subCategoryStore.getSubCategories();
    initDropdowns();
});
</script>

<template>
    <nav class="flex flex-row flex-wrap gap-x-5 p-1 bg-white border-gray-200 dark:bg-gray-900 shadow-md items-center">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between p-4">
            <Link href="/" class="flex items-center">
            <img src="https://www.udemy.com/staticx/udemy/images/v7/logo-udemy.svg" class="h-8"
                :alt="$page.props.appName + ' Logo'" />
            </Link>
        </div>
        <div class="flex items-center -ml-5">
            <button class="text-sm hover:text-purple-600" data-popover-target="categories" data-popover-placement="bottom">
                Categories
            </button>
            <Popover target="categories" class="z-50">
                <ul
                    class="text-sm font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <template v-for="row in categoryStore.categories">
                        <li class="w-full px-4 py-2 hover:text-purple-600"
                            :data-dropdown-toggle="'subCategory' + row.id + 'Dropdown'"
                            data-dropdown-placement="right-start" data-dropdown-trigger="hover"
                            data-dropdown-offset-distance="15">
                            <Link :href="route('category.show', [{ name: row.title }])"
                                class="flex items-center justify-between">
                            {{ row.title }}
                            <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            </Link>
                        </li>
                    </template>
                </ul>
            </Popover>

            <template v-if="subCategoryStore.groupedSubCategories"
                v-for="(subCategory, index) in subCategoryStore.groupedSubCategories">
                <div :id="'subCategory' + index + 'Dropdown'"
                    class="z-50 hidden bg-white divide-y divide-gray-100 shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li v-for="row in subCategory">
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{
                                    row.title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </template>
        </div>

        <div class="relative h-[3.0rem] grow">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block h-full w-full p-0 pl-12 text-sm text-gray-900 border-stone-900 focus:border-stone-900 focus:ring-0 bg-gray-50 rounded-full"
                placeholder="Search for anything" required />
        </div>

        <div class="flex gap-x-5 text-sm">
            <Link href="/">{{ $page.props.appName }} Business</Link>
            <Link href="/">Teach on {{ $page.props.appName }}</Link>
            <Link href="/">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6 stroke-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
            </Link>
        </div>

        <div class="flex gap-1">
            <Button1>Log in</Button1>
            <Button1 class="!bg-black hover:bg-black text-white">Sign up</Button1>
            <Button1 class="!p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 stroke-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
            </Button1>
        </div>
    </nav>
</template>

v-
