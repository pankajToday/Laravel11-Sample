<template>
    <div class="absolute bottom-[calc(100%+0.5rem)] left-[0%] -translate-x-[50%] hidden group-hover:block w-[200px] ">
        <div class="bottom-full rounded bg-black px-4 py-1 text-xs text-white">
            {{message}}
            <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0" /></svg>
        </div>
    </div>
</template>

<script setup >
    import {  ref , defineProps} from 'vue';

    const  props=  defineProps({
        message: {
            type: String,
            default: ' Tooltip message',
        },
    });
</script>

<style scoped>

</style>