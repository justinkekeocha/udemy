<script setup>
defineProps(['rating'])
</script>
<template>
   <div class="flex items-center me-2">
      <span class="text-sm font-bold text-yellow-600 me-2">{{ rating }}</span>
      <div class="stars" :style="'--star-rating:' + rating"></div>
   </div>
</template>

<!--https://css-tricks.com/five-methods-for-five-star-ratings/-->
<style>
:root {
   --star-color: #fff;
   --star-background: #fc0;
}

.stars {
   --star-percent: calc(var(--star-rating) / 5 * 100%);
   display: inline-block;
   font-family: Times;
   line-height: 1;
}

.stars::before {
   content: '★★★★★';
   letter-spacing: 3px;
   background: linear-gradient(90deg, var(--star-background) var(--star-percent), var(--star-color) var(--star-percent));
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
}
</style>