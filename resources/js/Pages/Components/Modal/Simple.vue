<template>
    <div v-if="isVisible" class="modal-overlay" tabindex="-1" @click.self="closeModal">
        <div class="modal-content">
            <header class="modal-header">
                <h3>{{ title }}</h3>
                <button class="close-button" @click="closeModal">X</button>
            </header>
            <div class="modal-body">
                <slot></slot>
            </div>
            <footer class="modal-footer">
                <button class="confirm-button" @click="closeModal">Confirm</button>
                <button class="cancel-button" @click="closeModal">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script setup >
    //---------------  Vue Imports ================
    import {  nextTick ,ref  , defineProps} from 'vue';
    import { toast } from 'vue3-toastify';

    //---------------  define  data ================

    const  props=  defineProps({
        title: {
            type: String,
            default: 'Modal Title',
        },
        isVisible: {
            type: Boolean,
            default: false,
        },
        backdrop: {
            type: Boolean,
            default: true,
        },
    });


    const closeModal = ()=> {
        isVisible.value = false;
    }



</script>

<style scoped>

    .modal-overlay {
        z-index: 9;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        z-index: 9;
        background: white;
        border-radius: 8px;
        padding: 20px;
        width: 400px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        z-index: 9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .close-button {
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .modal-body {
        z-index: 9;
        margin: 20px 0;
    }

    .modal-footer {
        z-index: 9;
        display: flex;
        justify-content: flex-end;
    }

    .confirm-button,
    .cancel-button {
        margin-left: 10px;
    }


</style>