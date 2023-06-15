<script setup>
defineProps(['target'])
</script>

<template>
   <div data-popover :id="target"
      class="absolute z-10 invisible opacity-0 inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 shadow-sm"
      role="tooltip">
      <div class="px-3 py-2">
         <slot>
         </slot>
      </div>
      <div data-popper-arrow></div>
   </div>
</template>