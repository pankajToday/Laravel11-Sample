<template>
    <div class="w-full family-poppins fixed top-0 bg-white border-b border-gray-200 flex items-center z-40 justify-between px-5" style="height: 65px; box-shadow: 0px 10px 30px 0px rgb(82 63 105 / 8%);">
        <div class="flex h-full items-center">
            <div class="w-[220px]"></div>
            <!-- <div class="relative">
                <svg class="w-5 h-5 absolute text-gray-600 top-2 left-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="3">
                    <path fill-rule="evenodd" stroke="3" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                </svg>
                <input type="search" class="pr-6 pl-10 py-1.5 border border-gray-300 bg-gray-50 text-sm rounded font-medium text-gray-800 focus:outline-none w-[440px] placeholder-gray-600" placeholder="Search features, Payments...">
            </div> -->
        </div>

        <div @click="dropdown = true, notBot = true" class="flex items-center cursor-pointer hover:text-blue-600">
            <div class="w-11 h-11 rounded-full bg-slate-800 flex items-center justify-center">
                <span class="text-lg font-semibold text-white">PK</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
        <div v-if="dropdown" class="w-52 rounded-md bg-slate-800 absolute shadow-xl right-6" style="top:65px">
            <div class="relative flex p-2">
                <div class="w-full z-20">
                    <a href="/my-account" class="flex items-center text-gray-200 cursor-pointer hover:text-white px-3 py-2.5 hover:bg-gray-600 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-normal">Manage account</span>
                    </a>
                    <div @click.prevent="logout" class="flex items-center text-gray-200 cursor-pointer hover:text-white px-3 py-2.5 hover:bg-gray-600 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="text-sm font-normal">Logout</span>
                    </div>
                </div>
                <div class="absolute h-4 w-4 rotate-45 transform bg-slate-800" style="top: -4px; right:31px"></div>
            </div>
        </div>
        <div v-if="notBot" @click.prevent="dropdown = false, notBot = false" class="w-full h-screen inset-0 fixed bg-transparent" style=""></div>
    </div>
</template>

<script>
export default {
    name: "topbar",
    data(){
        return{
            notBot: false,
            dropdown: false
        }
    },
    methods:{
        logout(){
            var url =  '/logout';
            axios.post( url  ).then(response => {
                if( response.status === 204 ){
                    this.$inertia.get(route('login'));
                }

            }).catch((error) => {
                if( error.response.status == 422 ){
                    this.errors = error.response.data.errors;
                    console.log("Error",this.errors );
                }
                // console.log("Error",error);
            });
        },
    }
}
</script>

<style scoped>

</style>
