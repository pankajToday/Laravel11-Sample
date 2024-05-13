<template>
    <div class="h-screen fixed left-0 z-50 family-poppins w-[220px] bg-slate-800">
        <div class="px-6 mt-4 w-full flex justify-center items-center" style="height: 65px;">
            <img class="h-20 w-auto mx-auto rounded-md" src="/project-assets/img/dashboard.jpg">
        </div>
        <div class="h-[580px] overflow-y-auto flex mt-8">
            <ul class="w-full py-3">
                <li v-for="(item, index) in sideMenu" class="w-full px-6 py-2 ">
                    <a @click="redirect(item.path)" @click.prevent="item.isOpen = !item.isOpen" class="flex items-center justify-between text-white font-normal w-full rounded p-1 cursor-pointer" style="font-size: 13px;">
                        <div class="flex items-center">
                            <div v-html="item.icon"></div>
                            <span class="ml-2.5" style="font-size: 13px">{{item.name}}</span>
                        </div>
                        <div class="ml-4" v-if="item.child.length">
                            <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-90' : item.isOpen, 'rotate-0' : !item.isOpen}" class="h-4 w-4 transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </a>

                    <div v-if="item.child.length">
                        <ul v-if="item.isOpen" class="px-3">
                            <li v-for="(ele, index) in item.child" class="py-1">
                                <a :href="ele.path" class="flex items-center font-normal text-gray-500 cursor-pointer" style="font-size: 13px">
                                    <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.8 10a2.2 2.2 0 004.4 0 2.2 2.2 0 00-4.4 0z"/></svg>
                                    <span>{{ele.submenu}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="w-full h-full flex">
            <div class="py-2 w-full">
                <div class="w-full px-6 py-2 flex items-center">

                    <a href="/my-account" target="_self" class="flex items-center justify-between text-white font-normal w-full rounded p-1 cursor-pointer" style="font-size: 13px;">
                        <div class="flex items-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="ml-2.5" style="font-size: 13px">My Account</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "sidebar",
    data(){
        return{
            sideMenu:[
                {name:'Dashboard',
                 icon:'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">\n' +
                     '<path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />\n' +
                    '<path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />\n' +
                    '</svg>',
                path:'/dashboard',
                child:[]
                },
                {name:'Users',
                 icon:'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">\n' +
                        '<path d="M16.5 6a3 3 0 00-3-3H6a3 3 0 00-3 3v7.5a3 3 0 003 3v-6A4.5 4.5 0 0110.5 6h6z" />\n' +
                        '<path d="M18 7.5a3 3 0 013 3V18a3 3 0 01-3 3h-7.5a3 3 0 01-3-3v-7.5a3 3 0 013-3H18z" />\n' +
                        '</svg>',
                path:'#',
                isOpen:true,
                child:[
                    {submenu:'All',path:"/users"},

                ],
                },

            ],
        }
    },
    methods:{
        redirect(path){
            window.open(path, '_self')
        }
    }
}
</script>

<style scoped>

</style>
