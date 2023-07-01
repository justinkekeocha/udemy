<script setup>
import { onMounted } from "vue";
import CarouselControls from './CarouselControls.vue'
import { useSlide } from "../../Composables/Slide";

onMounted(() => {
    useSlide()
})

defineOptions({
    inheritAttrs: false
})
defineProps({
    dataSlideMotion: {
        type: String,
        default: 'slide'
    }
})
</script>

<template>
    <div class="relative" :data-slide-motion="dataSlideMotion">
        <div class="slides-container grid grid-flow-col auto-cols-[100%] gap-0 overflow-auto overflow-y-hidden snap-x snap-mandatory scroll-smooth touch-manipulation"
            data-slide-container v-bind="$attrs">
            <slot></slot>
            <!-- Slider controls -->
            <slot name="carousel-controls">
                <CarouselControls></CarouselControls>
            </slot>
        </div>
    </div>
</template>

<style scoped>
:slotted(div) {
    @apply snap-start duration-1000 ease-in-out;
}
</style> 


