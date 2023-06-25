<script setup>
const props = defineProps({ category: Object })
</script>
<template>
    <Layout :title="'Online ' + category.title + ' courses | ' + $page.props.appName" description="hello">
        <main class="px-5 py-10">
            <h1 class="mb-10"> {{ category.title }} Courses</h1>
            <h2 class="font-UdemySansBold h3 font-black">Courses to get you started</h2>
            <section>

                <div class="mb-4 border-b  border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#coursesTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 font-semibold font-UdemySansBold text-base  text-neutral-500 hover:text-black aria-selected:border-b-2 aria-selected:border-b-black aria-selected:text-black"
                                id="most-popular-tab" data-tabs-target="#mostPopular" type="button" role="tab"
                                aria-controls="profile" aria-selected="false">Most popular</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 font-semibold font-UdemySansBold text-base  text-neutral-500 hover:text-black aria-selected:border-b-2 aria-selected:border-b-black aria-selected:text-black"
                                id="new-tab" data-tabs-target="#new" type="button" role="tab" aria-controls="dashboard"
                                aria-selected="false">New</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 font-semibold font-UdemySansBold text-base  text-neutral-500 hover:text-black aria-selected:border-b-2 aria-selected:border-b-black aria-selected:text-black"
                                id="settings-tab" data-tabs-target="#trending" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">Trending</button>
                        </li>
                    </ul>
                </div>
                <div id="coursesTabContent">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="mostPopular" role="tabpanel"
                        aria-labelledby="most-popular-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                                class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                            Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript
                            swaps classes to control the content visibility and styling.</p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="new" role="tabpanel"
                        aria-labelledby="new-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                                class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                                content</strong>. Clicking another tab will toggle the visibility of this one for the next.
                            The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="trending" role="tabpanel"
                        aria-labelledby="settings-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                                class="font-medium text-gray-800 dark:text-white">Settings tab's associated
                                content</strong>. Clicking another tab will toggle the visibility of this one for the next.
                            The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                        aria-labelledby="contacts-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                                class="font-medium text-gray-800 dark:text-white">Contacts tab's associated
                                content</strong>. Clicking another tab will toggle the visibility of this one for the next.
                            The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                </div>

            </section>
        </main>
    </Layout>
</template>