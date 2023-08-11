<script setup>
defineProps({
    modelValue: String,
    label: String,
})
defineEmits(['update:modelValue'])
defineOptions({
    inheritAttrs: false
})
</script>
<template>
    <!--This input has a floating label-->
    <!-- v-bind="$attrs" : binds fallthrough attributes https://vuejs.org/guide/components/attrs.html#disabling-attribute-inheritance-->
    <div class="relative">
        <input
            class="block px-2.5 pb-2.5 pt-5 w-full text-sm text-black border border-black appearance-none focus:outline-none focus:border-black focus:ring-0 peer"
            placeholder="" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" v-bind="$attrs" />

        <label
            class="absolute text-black font-black font-UdemySansBold text-sm duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">{{
                label }}</label>
        <slot></slot>

    </div>
</template>
