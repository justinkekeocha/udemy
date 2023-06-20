<script setup>
import { onMounted } from "vue";
import SlideControls from "../Components/Buttons/SlideControls.vue";
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
        <div class="slides-container flex snap-x snap-mandatory overflow-hidden space-x-2 scroll-smooth overflow-x-hidden"
            data-slide-container>
            <slot></slot>
            <!-- Slider controls -->
            <slot name="slide-controls">
                <SlideControls></SlideControls>
            </slot>
        </div>
    </div>
</template>