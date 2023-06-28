<script setup>
import { onMounted } from "vue";
import SlideControls from "./SlideControls.vue";
onMounted(() => {
    //Get all slideContainers
    const slideContainers = document.querySelectorAll("[data-slide-container]");

    for (var i = 0; i < slideContainers.length; i++) {
        //find the respective controls in each container
        let slideContainer = slideContainers[i];
        let nextButton =
            slideContainers[i].querySelectorAll("[data-slide-next]")[0];
        let previousButton = slideContainers[i].querySelectorAll(
            "[data-slide-previous]"
        )[0];

        const slideDistance = window.screen.availWidth / 2.5;
        //add a click event to each of the slide
        nextButton.addEventListener("click", () => {
            slideContainer.scrollLeft += slideDistance;
        });

        previousButton.addEventListener("click", () => {
            slideContainer.scrollLeft -= slideDistance;
        });
    }
});
</script>

<!-- https://codepen.io/disguy-droid/details/wvxrPEL -->
<template>
    <div class="relative">
        <!--slides-container h-72 flex snap-x snap-mandatory overflow-hidden overflow-x-auto space-x-2 rounded scroll-smooth before:w-[45vw] before:shrink-0 after:w-[45vw] after:shrink-0 md:before:w-0 md:after:w-0
        slides-container flex snap-x snap-mandatory overflow-hidden space-x-2 scroll-smooth overflow-x-hidden
        
        -->
        <div class="slides-container flex snap-x snap-mandatory space-x-2 scroll-smooth overflow-x-auto"
            data-slide-container>
            <slot></slot>
            <!-- Slider controls -->
            <slot name="slide-controls">
                <SlideControls></SlideControls>
            </slot>
        </div>
    </div>
</template>

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
<style scoped>
/*:slotted(div) {
    @apply w-auto;
}*/
</style> 