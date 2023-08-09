<script setup>
import Slide from './Slide.vue';
import CourseCard from '../Cards/CourseCard.vue';
defineProps({ courses: Object })
</script>
<template>
    <Slide>
        <template v-for="(row, index) in courses" :key="row.id">
            <CourseCard :course="row"></CourseCard>
        </template>
    </Slide>
</template>