<template>
    <Head title="Dashboard" />

    <layout>
        <div class="w-full">
            <div class="w-full flex items-center justify-between">
                <div class="flex items-center">
                    <div class="text-lg font-bold text-slate-800">Dashboard</div>
                </div>
<!--                <div class="flex items-center">-->
<!--                    <select class="py-2 px-8 text-sm cursor-pointer font-bold text-slate-50 focus:outline-none rounded bg-slate-600 hover:bg-slate-700">-->
<!--                        <option selected class="py-2">This Month</option>-->
<!--                        <option class="py-2">This Week</option>-->
<!--                    </select>-->
<!--                </div>-->
            </div>
            <div class="w-full mt-4">
                <div class="w-full bg-slate-100 rounded p-4">
<!--                    <div class="text-base font-[600] text-gray-800">Sales</div>-->
                    <div class="w-full grid grid-cols-4 gap-4">
                        <div class="p-4 rounded-md bg-white shadow">
                            <div class="text-base font-[600] text-gray-700">Total Sales</div>
                            <div class="text-3xl font-[800] text-gray-900 mt-2">$ 1000</div>
                        </div>
                        <div class="p-4 rounded-md bg-white shadow">
                            <div class="text-base font-[600] text-gray-700">Total Orders</div>
                            <div class="text-3xl font-[800] text-gray-900 mt-2">778989</div>
                        </div>
                        <div class="p-4 rounded-md bg-white shadow">
                            <div class="text-base font-[600] text-gray-700">Total Products</div>
                            <div class="text-3xl font-[800] text-gray-900 mt-2">709</div>
                        </div>
                        <div class="p-4 rounded-md bg-white shadow">
                            <div class="text-base font-[600] text-gray-700">Registrations</div>
                            <div class="text-3xl font-[800] text-gray-900 mt-2">600</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </layout>
</template>

<script>
import Layout from "../Components/Menus/layout.vue";
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

import {eventBus} from "../events.js";

import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';


export default {
    name: "Dashboard",
    components: { Layout,Head},
    data(){
        return{

        }
    },
    methods:{

    },
    created() {

    },
    watch:{
        /*'duration_visitor':{
            handler: 'orderGraph'
        },*/
    }
}
</script>

<style scoped>
.switch {
    position: relative;
    display: inline-block;
    width: 42px;
    height: 21px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 3px;
    bottom: 2px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
    background-color: #2196F3;
}

input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(21px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>
