<template>
    <layout>
        <Head title="Vendors" />
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">{{pageName}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">{{pageName}}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <!--- give table header --->
                            <div class="d-flex justify-content-start">
                                <input type="search" v-model="searchValue" class="form-control" placeholder="Search Vendor">
                            </div>
                            <button @click="addVendorModel = !addVendorModel"  class="btn mb-2 btn-pill btn-primary"  >Add New</button>
                        </div>

                        <EasyDataTable
                                :headers="headers"
                                :items="items"
                                :loading="loading"
                                 table-class-name="vendor-table"
                                class="hide-pagination-table"
                                :search-field="searchField"
                                :search-value="searchValue"
                                hide-footer="false"
                                show-index
                                alternating
                                must-sort
                        >

                            <template #item-name="{ name,id }">
                                <div class="player-wrapper d-flex align-center">
                                    <div class="ms-2 text-decoration-none ">
                                        <a  :href="route('vendor.show',id)" target="_blank"  class="">
                                            <span class="text-subtitle-1 mb-0 ">{{ name }}</span>
                                        </a>

                                    </div>
                                </div>
                            </template>
                            <template #item-actions="item">
                                <div class="operation-wrapper">
                                    <div class="d-flex gap-2">
                                        <a href="#" @click.prevent="editVendor(item)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2 align-middle">
                                                <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                            </svg>
                                        </a>
                                        <a href="#" @click.prevent="deleteVendor(item.id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash align-middle">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </template>

                        </EasyDataTable>

                    </div>
                </div>
            </div>


            <div v-if="addVendorModel"   class="fixed inset-0 px-2 z-10 overflow-hidden flex items-center justify-center backdrop-blur-sm transition-opacity ">
                <div class="absolute inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>
                
                <div class="w-full sm:w-96 md:w-1/2 lg:w-2/3 bg-white rounded-md shadow-xl overflow-hidden z-50" >
                    <!-- Modal Header -->
                    <div class=" bg-gray-100 text-white px-2 py-3 flex justify-between">
                        <span class="text-lg text-black">  {{vendor.id ?'Edit':'Add'}} Vendor</span>
                        <button @click="modalClose()" type="button" class="btn-close my-1"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="p-4 text-dark max-h-[400px] overflow-auto">
                        <div class="w-full flex justify-between">
                            <div class="row mx-1 border border-gray-100 rounded-md">
                                <div class="relative flex items-center justify-center mb-4">
                                    <h2
                                        class="absolute text-black !bg-white text-lg font-medium px-4 mb-1 border border-gray-50 rounded-md">
                                         Login Information
                                    </h2>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Name <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="vendor.name" class="form-control form-control-lg mb-3" type="text" placeholder="Vendor Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label  text-sm-right">Email <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="vendor.email"  class="form-control form-control-lg mb-3" type="email" placeholder="Vendor Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label  text-sm-right">Password <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="vendor.password"  class="form-control form-control-lg mb-3" type="password" placeholder="Login Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label  text-sm-right">Confirm Password <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="vendor.confirm_password"  class="form-control form-control-lg mb-3" type="password" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label  text-sm-right">Mobile <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                       <div  class="flex justify-between items-center">
                                        <input v-model="vendor.country_code"  class="!w-[100px] form-control form-control-lg mb-3 " type="text" placeholder="+91" maxlength="5">
                                        <input v-model="vendor.mobile"  class="form-control form-control-lg mb-3" type="text" placeholder="Mobile">
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label text-sm-right">Status <span
                                                    class="text-red-500">*</span></label>
                                        </div>
                                        <div class="col-8">
                                            <select v-model="vendor.status" class="form-control mb-2">
                                                <option selected="">Select One</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="w-50 flex justify-end items-center">
                                                <div class="w-full  my-2">
                                                    <!-- Upload Container -->
                                                    <div @dragover.prevent @dragleave.prevent @drop.prevent="handleDrop('user_image')" :class="['w-full flex justify-between items-center hover:bg-green-100',
                                                        'border-2 border-dashed rounded-lg text-center transition-colors duration-200',
                                                        isDragging ? 'border-blue-500 bg-blue-50' : 'border-gray-300 hover:border-gray-400',

                                                    ]" @click="$refs.fileUserImage.click()">
                                                        <div class="my-2 mx-1">
                                                            <!-- Upload Icon -->
                                                            <div class="w-full mb-4">
                                                                <svg class="mx-auto h-12 w-12 text-gray-400"
                                                                    stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                                    <path d="M24 8L24 32M16 16L24 8L32 16" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path
                                                                        d="M8 32V36C8 37.1046 8.89543 38 10 38H38C39.1046 38 40 37.1046 40 36V32"
                                                                        stroke-width="2" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </div>

                                                            <!-- Upload Text -->
                                                            <div class="w-full">
                                                                <!-- <p class="mb-2 text-sm text-gray-600">
                                                                <span class="font-semibold">Click to upload</span> or drag and drop
                                                            </p>-->
                                                                <p class="text-xs text-gray-500"> Click to upload user image or drag and
                                                                    drop PNG, JPG, GIF up to 10MB</p>

                                                                <!-- Hidden File Input -->
                                                                <input ref="fileUserImage" type="file" class="hidden"
                                                                    accept="image/*" @change="handleFileSelect()" multiple />
                                                            </div>
                                                        </div>
                                                        <!-- Preview Section -->
                                                        <div v-if="vendor.user_image"
                                                            class="w-full flex justify-center items-center my-2 gap-4">
                                                            <div
                                                                class="relative rounded-lg overflow-hidden border border-gray-200">
                                                                <img :src="vendor.user_image"
                                                                    class="w-full h-32 object-contain"
                                                                    alt="user_image" />
                                                                <div
                                                                    class="absolute inset-0 bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
                                                                    <button @click.stop="removeFile('user_image')"
                                                                        class="absolute top-2 right-2 text-white bg-red-500 rounded-full p-1 hover:bg-red-600">
                                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row mx-1 border border-gray-100 rounded-md">
                                <div class="relative flex items-center justify-center mb-4">
                                    <h2
                                        class="absolute text-black !bg-white text-lg font-medium px-4 mb-1 border border-gray-50 rounded-md">
                                         Shop Profile
                                    </h2>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label  text-sm-right"> Name <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="vendor.shop_name" class="form-control form-control-lg mb-3" type="text" placeholder="Shop Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label  text-sm-right"> Email <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="vendor.shop_email"  class="form-control form-control-lg mb-3" type="email" placeholder="Shop Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label  text-sm-right"> Mobile <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                       <div  class="flex justify-between items-center">
                                        <input v-model="vendor.shop_country_code"  class="!w-[100px] form-control form-control-lg mb-3 " type="text" placeholder="+91" maxlength="5">
                                        <input v-model="vendor.shop_mobile"  class="form-control form-control-lg mb-3" type="text" placeholder="Shop Mobile">
                                       </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label  text-sm-right">Website</label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="vendor.website"  class="form-control form-control-lg mb-3" type="link" placeholder="Shop Website Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="w-50 flex justify-end items-center">
                                            <div class="w-full  my-2">
                                                <!-- Upload Container -->
                                                <div @dragover.prevent @dragleave.prevent @drop.prevent="handleDrop('shop_image')" :class="['w-full flex justify-between items-center hover:bg-green-100',
                                                    'border-2 border-dashed rounded-lg text-center transition-colors duration-200',
                                                    isDragging ? 'border-blue-500 bg-blue-50' : 'border-gray-300 hover:border-gray-400',

                                                ]" @click="$refs.fileInput.click()">
                                                    <div class="my-2 mx-1">
                                                        <!-- Upload Icon -->
                                                        <div class="w-full mb-4">
                                                            <svg class="mx-auto h-12 w-12 text-gray-400"
                                                                stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                                <path d="M24 8L24 32M16 16L24 8L32 16" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M8 32V36C8 37.1046 8.89543 38 10 38H38C39.1046 38 40 37.1046 40 36V32"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </div>

                                                        <!-- Upload Text -->
                                                        <div class="w-full">
                                                            <!-- <p class="mb-2 text-sm text-gray-600">
                                                            <span class="font-semibold">Click to upload</span> or drag and drop
                                                        </p>-->
                                                            <p class="text-xs text-gray-500"> Click to upload shop image or drag and
                                                                drop PNG, JPG, GIF up to 10MB</p>

                                                            <!-- Hidden File Input -->
                                                            <input ref="fileInput" type="file" class="hidden"
                                                                accept="image/*" @change="handleFileSelect()" multiple />
                                                        </div>
                                                    </div>
                                                    <!-- Preview Section -->
                                                    <div v-if="vendor.shop_image"
                                                        class="w-full flex justify-center items-center my-2 gap-4">
                                                        <div
                                                            class="relative rounded-lg overflow-hidden border border-gray-200">
                                                            <img :src="vendor.shop_image"
                                                                class="w-full h-32 object-contain"
                                                                alt="shop_image" />
                                                            <div
                                                                class="absolute inset-0 bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
                                                                <button @click.stop="removeFile('shop_image')"
                                                                    class="absolute top-2 right-2 text-white bg-red-500 rounded-full p-1 hover:bg-red-600">
                                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                        viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="border-t px-4 py-2 flex justify-end">
                        <button @click="modalClose()" type="button"
                            class="px-3 py-1 mx-2  text-black  rounded-md w-full sm:w-auto bg-gray-100">Close</button>
                        <button v-if="vendor.id" @click="updateVendor()" type="button"
                            class="px-3 py-1  mx-2 text-white  rounded-md w-full sm:w-auto  bg-indigo-500"
                            data-bs-dismiss="modal">Update</button>
                        <button v-if="!vendor.id" @click="addVendor()" type="button"
                            class="px-3 py-1  mx-2 text-white  rounded-md w-full sm:w-auto bg-indigo-500">Save </button>
                    </div>
                   
                </div>
            </div>


        </div>
    </layout>
</template>

<script setup >
    //---------------  Vue Imports ================
    import {  nextTick ,ref ,watchEffect} from 'vue';

    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    import layout from "@/DashboardLayout/Layout.vue";
    import Head from "@inertiajs/inertia-vue3/src/head";
    import EasyDataTable from "vue3-easy-data-table";
    import 'vue3-easy-data-table/dist/style.css';

    import Swal from 'sweetalert2/dist/sweetalert2.js'
    import 'sweetalert2/src/sweetalert2.scss'

    //---------------  define  data ================
    const  pageName = ref("Master Glossary");
    const loading = ref(false)
    const selectedItems = ref([]);
    const serverItemsLength = ref(0);
    const serverOptions = ref({
        page: 1,
        rowsPerPage: 5,
        sortBy: 'name',
        sortType: 'asc'
    });

    const headers = [
            { text: "User Name", value: "user_name", sortable: true , fixed: true,   width: 150,},
            { text: "Shop Name", value: "shop_name", sortable: true,fixed: true, width: 200},
            { text: "List Name", value: "list_name", sortable: true,fixed: true, width: 130},
            { text: "Items", value: "item_count", sortable: true,fixed: true, width: 130},
           
            { text: "Status", value: "status", sortable: true,fixed: true, width: 70},
            { text: "Action", value: "actions", fixed: true, width: 300, sortable: false,
                html: true// Enable HTML rendering for this column
            },
        ];

    const searchField = ref('name');
    const searchValue = ref('');
    const items = ref([]);
    const sortBy = ref(["name", "type"]);
    const sortType = ref(["desc", "asc"]);
    const itemsSelected = ref([]);
    const vendor = ref({id:"",name:"",type:"",status:"inactive"});
    const addVendorModel = ref(false);


    // Add these methods to handle edit and delete actions

    const fetchList = async (updateOptions) => {
        loading.value = true; 
        try {
            const response = await axios.get(route('master-glossary.index'), {
                params: {
                    page: serverOptions.value.page,
                    per_page: serverOptions.value.rowsPerPage,
                    sort_by: serverOptions.value.sortBy || 'name',
                    sort_type: serverOptions.value.sortType || 'asc',
                    search: searchValue.value,
                
                }
            });

            if (response.status === 200) {
                // Map the response data to include transformed values

                items.value = response.data.data.map(item => ({
                    id:item.id,
                    list_name:item.name,
                    shop_name :item.kirana_vendor_name , 
                    item_count : item.item_count ,
                    user_name : item.user_name, 
                    status : item.status ? 'Active':"Inactive", 
                    actions: `
                        <button class="text-blue-500 hover:text-blue-700 mr-2" @click="editVendor(${JSON.stringify(item)})">Edit</button>
                        <button class="text-red-500 hover:text-red-700" @click="deleteVendor(${item.id})">Delete</button>
                    `
                }));
                serverItemsLength.value = response.data.total;
                
                //serverItemsLength.value = items.value.length;
            }
        } catch (error) {
            console.log(error);
        } finally {
            loading.value = false;
        }
    };

    const editVendor = (item) => { console.log(item);
        // Handle edit action
        addVendorModel.value =true;
        vendor.value ={
            id:item.id,
            name:item.name,
            email :item.email , 
            country_code : item.country_code, 
            mobile :  item.mobile, 
            status: ( item.status ?'active':'inactive' ),
            user_id :item.user_id, 
            user_image:item.user_image,
            shop_name :item.shop_name, 
            shop_email  :item.shop_email,
            shop_country_code : item.shop_country_code,
            shop_mobile : item.shop_mobile,
            website: item.website,
            shop_image : item.shop_image,
        
        }
    };

    const deleteVendor = (id) => {
        // Handle delete action
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then( async (result) => {
            if (result.isConfirmed) {
                loading.value = true;

                axios.delete(route('vendor.destroy',id) ).then( async (response)=>{
                    if (response.status === 200) {
                        await  fetchList();
                    }
                }).catch(( err  )=>{
                  console.log(err)
                }).finally( ()=>{
                    loading.value = false;
                })
            }
        });
    };

    const  addVendor = ()=>{
        loading.value = true;
        axios.post(route('vendor.store'),vendor.value).then((res)=>{
            if( res.status === 200){
                modalClose();
                fetchList();
            }
        }).catch( (err)=>{
           console.log( err);
        }).finally(()=>{
            loading.value = false;
        });
    }

    const  updateVendor = ()=>{
        loading.value = true;
        axios.put(route('vendor.update',vendor.value.id),vendor.value).then( async (res)=>{
            if( res.status === 200){
                vendor.value = {id:"",name:"",type:"",status:""};
                addVendorModel.value =false;
              await  fetchList();
            }
        }).catch( (err)=>{
            console.log( err);
        }).finally(()=>{
            loading.value = false;
        });
    }

    const modalClose = ()=>{
        addVendorModel.value =false;
        vendor.value = {
            id:"",
            name:"",
            email :"" ,  
            password :"", 
            confirm_password :"",
            country_code :"", 
            mobile :"", 
            status :"", 
            user_id :"", 
            user_image:"",
            shop_name :"", 
            shop_email :"",
            shop_country_code :"",
            shop_mobile: "",
            website:"",
            shop_image :"",
        }
       
    }



    //--------------- data Watchers  ================
    // Add debounce function
    const debounce = ( fn, delay) => {
        let timeoutId;
        return (...args) => {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => fn(...args), delay);
        };
    };

    // Debounced version of fetchData
    const debouncedFetch = debounce( fetchList(), 300);

    // Watch for changes in search and server options
    watchEffect(() => {
        const { page, rowsPerPage, sortBy, sortType } = serverOptions.value;
      //  console.log( 'search ' + searchValue.value ,"page " +  page)
        const search = searchValue.value;
        if( search )
        debouncedFetch();
    });



    //---------------   Initial data fetch ================
    




</script>

<style scoped>
.vendor-table{
    --easy-table-rows-per-page-selector-z-index: 1;
    --easy-table-footer :0;
}
</style>
