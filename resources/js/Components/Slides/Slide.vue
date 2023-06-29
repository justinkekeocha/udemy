<script setup>
import { onMounted } from "vue";
import SlideControls from "./SlideControls.vue";
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
        default: 'static'
    }
})
</script>

<!-- https://codepen.io/disguy-droid/details/wvxrPEL -->
<template>
    <div class="relative" :data-slide-motion="dataSlideMotion">
        <!--slides-container h-72 flex snap-x snap-mandatory overflow-hidden overflow-x-auto space-x-2 rounded scroll-smooth before:w-[45vw] before:shrink-0 after:w-[45vw] after:shrink-0 md:before:w-0 md:after:w-0
        slides-container flex snap-x snap-mandatory overflow-hidden space-x-2 scroll-smooth overflow-x-hidden
        
        slides-container flex snap-x snap-mandatory space-x-2 scroll-smooth overflow-x-auto
        -->
        <div class="slides-container grid grid-flow-col auto-cols-max gap-4 overflow-auto overflow-y-hidden snap-x snap-mandatory scroll-smooth touch-manipulation"
            data-slide-container v-bind="$attrs">
            <slot></slot>
            <!-- Slider controls -->
            <slot name="slide-controls">
                <SlideControls></SlideControls>
            </slot>
        </div>
    </div>
</template>
<style scoped>
:slotted(div) {
    @apply snap-always snap-center;
}
</style> 