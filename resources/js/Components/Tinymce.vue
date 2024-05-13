<template>
    <div class="w-full">
        <editor
            v-model="content"
            initial-value="TinyMCE has landed!"
            api-key="ymgtoisr798edgf1wspubj7c2csbss3nqug6al8h1jiv2wki"
            :init="inital"
            @selectionChange="emitData"
        />
    </div>
</template>

<script>
import editor from '@tinymce/tinymce-vue';
import tinymceConfig from './tinymcePlugins/tinymce';
import {eventBus} from "../../models/events";

export default {
    name: "tinymce",
    props:['content'],
    components: {
        editor
    },
    methods:{
        emitData(){
            eventBus.$emit('tinymce_change', this.content);
        }
    },
    computed: {
        inital(){
            return tinymceConfig.config;
        }
    }
}
</script>

<style scoped>

</style>
