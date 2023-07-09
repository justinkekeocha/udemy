<script setup>
import Slide from './Slide.vue';
import StarRating from '../StarRating.vue'
defineProps({ courses: Object })
</script>
<template>
    <Slide>
        <template v-for="(row, index) in courses" :key="row.id">
            <div class="flex flex-col max-w-[15rem]">
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
                        <StarRating :rating="row.rating" />
                        <span class="text-gray-400 text-xs">(499,666) </span>
                    </div>
                    <p class="mb-3 font-UdemySansBold font-black">₦{{ row.price }} <span
                            class="line-through text-gray-400 text-sm font-normal ms-1">₦{{
                                row.inflated_price }}</span>
                    </p>
                </div>
                </Link>
            </div>
        </template>
    </Slide>
</template>