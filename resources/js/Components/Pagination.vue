<template>
    <div class="flex items-center py-6 px-4 family-poppins">
        <ul class="flex">
            <li class="mr-1">
                <a @click.prevent="callPage(1)" class="rounded mt-1 py-1 px-2 inline-block bg-gray-100 text-gray-600 bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    <svg class="inline-block pb-1 w-5 h-5 font" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" >
                        <path fill-rule="evenodd" d="M1011 1376q0 13-10 23l-50 50q-10 10-23 10t-23-10L439 983q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23t-10 23L608 960l393 393q10 10 10 23zm384 0q0 13-10 23l-50 50q-10 10-23 10t-23-10L823 983q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23t-10 23L992 960l393 393q10 10 10 23z"/>
                    </svg>
                </a>
            </li>
            <li class=" mr-1">
                <a @click.prevent="callPage(prevPage)" class="rounded mt-1 py-1 px-2 inline-block bg-gray-100 text-gray-600 bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    <svg class="inline-block pb-1 w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.452 4.516c.446.436.481 1.043 0 1.576L8.705 10l3.747 3.908c.481.533.446 1.141 0 1.574-.445.436-1.197.408-1.615 0-.418-.406-4.502-4.695-4.502-4.695a1.095 1.095 0 010-1.576s4.084-4.287 4.502-4.695c.418-.409 1.17-.436 1.615 0z"/>
                    </svg>
                </a>
            </li>
            <li v-if="currentPage !== 1 && nextPage !== 1 && currentPage !== 2" class="mr-1">
                <a  @click.prevent="goToPage(1)" class="rounded py-2 px-3 h-8 mt-1 pt-1 inline-block text-gray-700 bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    1
                </a>
            </li>
            <li v-if="prevPage && prevPage>1" class="mr-1">
                <a class="rounded mt-1 py-1 px-2 inline-block text-gray-700 hover:bg-gray-700 hover:text-white bg-transparent" href="#">
                    <svg class="inline-block pb-1 w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.001 7.8a2.2 2.2 0 100 4.402A2.2 2.2 0 0010 7.8zm-7 0a2.2 2.2 0 100 4.402A2.2 2.2 0 003 7.8zm14 0a2.2 2.2 0 100 4.402A2.2 2.2 0 0017 7.8z"/>
                    </svg>
                </a>
            </li>
            <li v-if="prevPage" class="mr-1">
                <a @click.prevent="goToPage(prevPage)" class="rounded py-2 px-3 h-8 mt-1 pt-1 inline-block text-gray-700 bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    {{ prevPage }}
                </a>
            </li>
            <li class="mr-1">
                <a class=" rounded py-2 px-3 h-8 mt-1 pt-1 inline-block bg-gray-700 text-white bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    {{ currentPage }}
                </a>
            </li>
            <li v-if="nextPage" class="mr-1">
                <a @click.prevent="goToPage(nextPage)" class="rounded py-2 px-3 h-8 mt-1 pt-1 inline-block text-gray-700 bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    {{ nextPage }}
                </a>
            </li>
            <li v-if="currentPage !== lastPage && nextPage !== lastPage" class="mr-1">
                <a class="rounded mt-1 py-1 px-2 inline-block text-gray-700 hover:bg-gray-700 hover:text-white bg-transparent" href="#">
                    <svg class="inline-block pb-1 w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.001 7.8a2.2 2.2 0 100 4.402A2.2 2.2 0 0010 7.8zm-7 0a2.2 2.2 0 100 4.402A2.2 2.2 0 003 7.8zm14 0a2.2 2.2 0 100 4.402A2.2 2.2 0 0017 7.8z"/>
                    </svg>
                </a>
            </li>
            <li v-if="currentPage !== lastPage && nextPage !== lastPage" class="mr-1">
                <a @click.prevent="goToPage(lastPage)" class="rounded py-2 px-3 h-8 mt-1 pt-1 inline-block text-gray-700 bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    {{ lastPage }}
                </a>
            </li>
            <li class="mr-1">
                <a @click.prevent="callPage(nextPage)" class="rounded mt-1 py-1 px-2 inline-block bg-gray-100 text-gray-600 bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    <svg class="inline-block pb-1 w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.163 4.516c.418.408 4.502 4.695 4.502 4.695a1.095 1.095 0 010 1.576s-4.084 4.289-4.502 4.695c-.418.408-1.17.436-1.615 0-.446-.434-.481-1.041 0-1.574L11.295 10 7.548 6.092c-.481-.533-.446-1.141 0-1.576.445-.436 1.197-.409 1.615 0z"/>
                    </svg>
                </a>
            </li>
            <li class="mr-1">
                <a @click.prevent="callPage(meta.last_page)" class="rounded mt-1 py-1 px-2 inline-block bg-gray-100 text-gray-600 bg-transparent hover:bg-gray-700 hover:text-white focus:border-gray-500 transition ease-in-out duration-150" href="#">
                    <svg class="inline-block pb-1 w-5 h-5" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                        <path fill-rule="evenodd" d="M979 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23zm384 0q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>

    import {eventBus} from "../../models/events.js";

    export default {
        name: "Pagination",
        data(){
            return{

            }
        },
        props:{
            meta: {
                type: Object,
            },
            links: {
                type: Object
            },
            page_input_size:{
                type: Number,
            },
            location:{
                type: String
            }
        },
        methods: {
            callPage(page_no) {
                eventBus.$emit(this.location+'_pagination', page_no);
            },
            goToPage(page_no){
                if(page_no === this.meta.last_page || page_no >= this.meta.last_page)
                    eventBus.$emit(this.location+'_pagination', this.meta.last_page);
                else
                    eventBus.$emit(this.location+'_pagination', page_no);
            }
        },
        computed: {
            currentPage() {
                if(this.meta)
                    return this.meta.current_page
            },
            prevPage() {
                if(this.meta)
                {
                    if(this.meta.current_page > 1)
                        return this.meta.current_page -1;
                    else
                        return false;
                }
            },
            nextPage() {
                if(this.meta)
                {
                    if(this.meta.current_page < this.meta.last_page)
                        return this.meta.current_page + 1;
                    else
                        return false;
                }
            },
            lastPage() {
                if(this.meta)
                    return this.meta.last_page
            },
            firstPage() {
                if(this.meta)
                    return this.meta.from
            }

        },
    }
</script>

<style scoped>

</style>
