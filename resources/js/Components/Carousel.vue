<script setup>
import CarouselControls from "../Components/Buttons/CarouselControls.vue";
defineOptions({
    inheritAttrs: false
})
defineProps({
    dataCarousel: {
        type: String,
        default: 'static'
    }

})
</script>
<template>
    <div class="relative w-full" :data-carousel="dataCarousel">
        <!-- Carousel wrapper -->
        <!--h-56 md:h-96-->
        <div class="relative h-[26rem] overflow-hidden " v-bind="$attrs">
            <!--Items-->
            <slot></slot>
        </div>
        <!-- Carousel controls -->
        <slot name="carousel-controls">
            <CarouselControls></CarouselControls>
        </slot>
    </div>
</template>
