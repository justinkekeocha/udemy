<script setup>
import CarouselControls from "../Components/Buttons/CarouselControls.vue";
</script>
<template>
    <div class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <!--h-56 md:h-96-->
        <div class="relative h-[40rem] md:h-96 overflow-hidden ">
            <!--Items-->
            <slot></slot>
        </div>
        <!-- Carousel controls -->
        <slot name="carousel-controls">
            <CarouselControls previousControlCustom="top-10"></CarouselControls>
        </slot>
    </div>
</template>
