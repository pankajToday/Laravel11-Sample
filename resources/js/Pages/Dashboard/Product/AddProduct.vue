<template>
    <layout>
        <Head title="Products" />
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Products</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <!--- give table header --->
                            <span>Product List  </span>
                            <button  class="btn mb-2 btn-pill btn-primary">Add New</button>
                        </div>
                        <div class="table-responsive ">
                            <table class="table mb-0  table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-striped table-hover">
                                <tr v-for="index in 10">
                                    <th scope="row">{{index}}</th>
                                    <td>Cell</td>
                                    <td>
                                        <img src="/assets/img/dummy-product.jpg" width="48" height="48" class="rounded-circle me-2" alt="dummy-product">
                                    </td>
                                    <td>TATA</td>
                                    <td>Cosmetic</td>
                                    <td>₹ 10</td>
                                    <td>Cell</td>

                                    <td>
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="edit-2" class="lucide lucide-edit-2 align-middle"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path></svg></a>
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash" class="lucide lucide-trash align-middle"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg></a>
                                    </td>
                                </tr>
                                <tr v-if="loading">
                                    <td colspan="8" >
                                        <div class="w-100 d-flex justify-content-center ">
                                            <div class="spinner-border text-primary me-2" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </layout>
</template>

<script setup lang="ts">
    import {  nextTick ,ref ,watchEffect} from 'vue';

    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    import layout from "@/DashboardLayout/Layout.vue";
    import Head from "@inertiajs/inertia-vue3/src/head";


    const API_URL = `https://api.github.com/repos/vuejs/core/commits?per_page=3&sha=`
    const branches = ['main', 'v2-compat']

    const currentBranch = ref(branches[0])
    const commits = ref([])
    const loading = ref(false)

    watchEffect(async () => {
        loading.value =true;
        // this effect will run immediately and then
        // re-run whenever currentBranch.value changes
        const url = `${API_URL}${currentBranch.value}`
        commits.value = await (await fetch(url)).json()
        loading.value =false;
    })

    function truncate(v) {
        const newline = v.indexOf('\n')
        return newline > 0 ? v.slice(0, newline) : v
    }

    function formatDate(v) {
        return v.replace(/T|Z/g, ' ')
    }




</script>

<style scoped>

</style>