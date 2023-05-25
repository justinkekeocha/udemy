<script setup>
   defineProps(['target'])
</script>

<template>
    <div data-popover :id="target" role="tooltip" class="absolute z-10 invisible opacity-0 inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 shadow-sm  dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
      <div class="px-3 py-2">
      <slot>
         </slot>
      </div>
    </div>
</template>