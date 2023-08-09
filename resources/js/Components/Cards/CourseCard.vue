<script setup>
const props = defineProps({ course: Object })
import StarRating from '../StarRating.vue'
</script>
<template>
    <div class="flex flex-col max-w-[15rem]">
        <Link class="my-5" :href="course.link">
        <img class="w-full h-32 object-cover border border-stone-400 hover:transition-opacity hover:opacity-80"
            :src="course.image" alt="" />
        <div class="p-5">
            <h3 class="text-base line-clamp-2 text-ellipsis tracking-tight mb-0">
                {{ course.title }}
            </h3>
            <p class="text-xs line-clamp-1 text-ellipsis text-gray-400">{{
                course.instructor.name }}</p>
            <div class="flex items-center">
                <StarRating :rating="course.rating" />
                <span class="text-gray-400 text-xs">({{ course.ratings_count }}) </span>
            </div>
            <p class="mb-3 font-UdemySansBold font-black">₦{{ course.price }} <span
                    class="line-through text-gray-400 text-sm font-normal ms-1">₦{{
                        course.inflated_price }}</span>
            </p>
        </div>
        </Link>
    </div>
</template>