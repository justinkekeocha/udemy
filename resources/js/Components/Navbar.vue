<script setup>
import Popover from "@/Components/Popover.vue";
import { useCategoryStore } from "@/Stores/CategoryStore";
import { useSubCategoryStore } from "@/Stores/SubCategoryStore";
import { useTopicStore } from "@/Stores/TopicStore";
import Dropdown from "./Dropdown.vue";
import { onMounted } from 'vue'

const categoryStore = useCategoryStore();
const subCategoryStore = useSubCategoryStore();
const topicStore = useTopicStore();
</script>

<template>
    <nav class="bg-white border-gray-200 shadow-[0_2px_4px_rgba(0,0,0,0.08)] md:shadow-none dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">

            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 text-sm zinc-900 rounded-lg md:hidden  focus:outline-none focus:ring-0 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <div class="max-w-screen-xl flex flex-wrap items-center justify-between p-4">
                <Link href="/" class="flex items-center">
                <img src="https://www.udemy.com/staticx/udemy/images/v7/logo-udemy.svg" class="h-8"
                    :alt="$page.props.appName + ' Logo'" />
                </Link>
            </div>
            <!--md:gap-x-5-->
            <div class="flex hidden md:flex flex-col  md:flex-row items-start md:items-center justify-between  w-full md:w-auto text-base md:text-sm gap-4 md:grow order-2 md:order-none p-4 md:p-0 border border-gray-100 rounded-lg md:border-0 mt-4 md:mt-0 bg-gray-50 md:bg-white "
                id="navbar-cta">
                <button class=" hover:text-purple-600" data-popover-target="categories" data-popover-offset="10"
                    data-popover-placement="bottom">
                    Categories
                </button>

                <Popover target="categories" class="text-sm text-gray-500 h-5/6 w-32 md:w-64">
                    <ul
                        class="font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <template v-if="categoryStore.categories" v-for="(item, index) in categoryStore.categories">
                            <li :data-dropdown-toggle="'subCategory' + item.id + 'Dropdown'"
                                data-dropdown-placement="right-start" data-dropdown-trigger="hover"
                                data-dropdown-offset-distance="13" data-dropdown-offset-skidding="-9">
                                <div class="flex items-center justify-between w-full py-2 hover:text-purple-600">
                                    <Link :href="item.link">
                                    {{ item.title }}
                                    </Link>
                                    <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </li>
                        </template>
                    </ul>
                    <!--subcategories dropdown-->
                    <template v-if="categoryStore.categories" v-for="(item, index) in categoryStore.categories">
                        <Dropdown class="h-full border border-gray-200 shadow-sm w-32 md:w-64"
                            :id="'subCategory' + item.id + 'Dropdown'">
                            <ul class=" text-gray-700 px-3 py-2">
                                <template v-if="subCategoryStore.groupByCategory"
                                    v-for="(item, index) in subCategoryStore.groupByCategory[item.id]">
                                    <li :data-dropdown-toggle="'topic' + item.id + 'Dropdown'"
                                        data-dropdown-placement="right-start" data-dropdown-trigger="hover"
                                        data-dropdown-offset-distance="0" data-dropdown-offset-skidding="-9">
                                        <div class="flex items-center justify-between w-full py-2 hover:text-purple-600">
                                            <Link :href="item.link">
                                            {{ item.title }}
                                            </Link>
                                            <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </li>
                                    <Dropdown class="h-full border border-gray-200 shadow-sm w-32 md:w-64"
                                        :id="'topic' + item.id + 'Dropdown'">
                                        <ul class="text-gray-700 px-3 py-2">
                                            <li class="font-UdemySansBold  py-2">Popular topics</li>
                                            <template v-if="topicStore.groupBySubCategory"
                                                v-for="(item, index) in topicStore.groupBySubCategory[item.id]">
                                                <li>
                                                    <div
                                                        class="flex items-center justify-between w-full  py-2 hover:text-purple-600">
                                                        <Link :href="item.link">
                                                        {{ item.title }}
                                                        </Link>
                                                    </div>
                                                </li>

                                            </template>
                                        </ul>
                                    </Dropdown>
                                </template>
                            </ul>
                        </Dropdown>
                    </template>
                </Popover>

                <div class="relative h-[3.0rem] grow order-1 md:order-none w-full md:w-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block h-full w-full p-0 pl-12  text-gray-900 border-stone-900 focus:border-stone-900 focus:ring-0 bg-gray-50 rounded-full"
                        placeholder="Search for anything" required />
                </div>

                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <Link href="/" data-popover-target="udemyBusinessPopover" data-popover-offset="10"
                        data-popover-placement="bottom">{{
                            $page.props.appName
                        }} Business</Link>
                    <Link href="/" data-popover-target="teachPopover" data-popover-offset="10"
                        data-popover-placement="bottom">Teach on {{ $page.props.appName }}</Link>
                    <!--Popovers-->
                    <Popover target="udemyBusinessPopover" class="max-w-xs text-xl p-2 font-extrabold">
                        <p class="mb-5">Get your team access to over 22,000 top Udemy courses, anytime,
                            anywhere.
                        </p>
                        <Link href="#">
                        <Button2 class="!mb-0 w-full">Try Udemy Business</Button2>
                        </Link>
                    </Popover>
                    <Popover target="teachPopover" class="max-w-xs text-xl p-2 font-extrabold">
                        <p class="mb-5">Turn what you know into an opportunity and reach millions around the
                            world.
                        </p>
                        <Link href="#">
                        <Button2 class="!mb-0 w-full">Learn more</Button2>
                        </Link>
                    </Popover>
                </div>

                <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-1 w-full md:w-auto ">
                    <Link :href="route('login')">
                    <Button1 class="!mb-0 w-full md:w-auto">Log in</Button1>
                    </Link>
                    <Link :href="route('login')">
                    <Button2 class="!mb-0  w-full md:w-auto">Sign up</Button2>
                    </Link>
                    <Button1 class="hidden md:block !p-2 !mb-0 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 stroke-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </Button1>
                </div>
            </div>

            <div class="mx-3">
                <Link href="/" data-popover-target="cartPopover" data-popover-offset="25" data-popover-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6 stroke-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                </Link>
                <Popover target="cartPopover" class="py-5 px-16 text-center text-sm">
                    <p class="text-neutral-500  mb-5">Your cart is empty.</p>
                    <p class="text-violet-800 font-extrabold">Keep shopping</p>
                </Popover>
            </div>
        </div>
    </nav>
</template>
