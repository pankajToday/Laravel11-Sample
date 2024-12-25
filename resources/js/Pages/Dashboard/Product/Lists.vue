<template>
    <layout>
        <Head :title="pageName" />
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
                                <input type="search" v-model="searchValue" class="form-control mx-2" placeholder="Search Product">
                                <select v-model="selectedCategory" id="categoryList" class="js-example-basic-single form-control mx-2" name="state">
                                    <option value="" selected>Select Category</option>
                                    <option :value="category.value"  v-for="category in categoryList">{{category.label}}</option>
                                </select>

                            </div>
                            <button @click="addProductModal = !addProductModal"  class="btn mb-2 btn-pill btn-primary"  >Add New</button>
                        </div>

                        <EasyDataTable
                                :headers="headers"
                                :items="items"
                                :loading="loading"
                                table-class-name="product-table"
                                class="hide-pagination-table"
                                :search-field="searchField"
                                :search-value="searchValue"
                                hide-footer="false"
                                show-index
                                alternating
                                must-sort
                        >

                            <template #item-name="{ name,id ,image,unit_size,unit}">
                                <div class="player-wrapper d-flex align-center">
                                    <div class="ms-2 text-decoration-none ">
                                        <a  :href="route('products.show',id)" title="View Product" target="_blank"  class="flex mx-1 my-1 no-underline justify-start items-center">
                                            <img :src="image" class="h-10 w-10 rounded-lg shadow-sm">
                                            <div class="flex flex-col">
                                                <span class="text-subtitle-1 mb-0 px-1 text-indigo-500 font-bold">{{ name }}</span>
                                                 <span class="text-subtitle-2 mb-0 px-1 text-xs text-gray-800">{{ unit_size }} {{unit}}</span>
                                            </div>

                                        </a>
                                    </div>
                                </div>
                            </template>
                            <template #item-in_stock_quantity="{in_stock_quantity}">
                                {{ in_stock_quantity.quantity}} {{in_stock_quantity.quantity_type }}
                            </template>
                            <template #item-actions="item">
                                <div class="operation-wrapper">
                                    <div class="d-flex gap-2">
                                        <a href="#" @click.prevent="editProduct(item)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2 align-middle">
                                                <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                            </svg>
                                        </a>
                                        <a href="#" @click.prevent="deleteProduct(item.id)">
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

            <div v-if="addProductModal"  class="fixed inset-0 px-2 z-10 overflow-hidden flex items-center justify-center backdrop-blur-sm transition-opacity ">
                <div  class="absolute inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>
                <!-- Modal Content -->
                <div  class="w-full sm:w-96 md:w-1/2 lg:w-2/3 bg-white rounded-md shadow-xl overflow-hidden z-50">
                    <!-- Modal Header -->
                    <div class=" bg-gray-100 text-white px-2 py-3 flex justify-between">
                        <span class="text-lg text-black">{{product.id ?'Edit':'Add'}} Product   </span>
                        <button @click="modalClose()"  type="button" class="btn-close my-1" ></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="p-4 text-dark max-h-[400px] overflow-auto">
                        <div class="w-full flex justify-between">
                            <div class="row mx-1 border border-gray-100 rounded-md">
                                <div class="relative flex items-center justify-center mb-4">
                                    <h2 class="absolute text-black !bg-white text-lg font-medium px-4 mb-1 border border-gray-50 rounded-md">
                                        Product Detail
                                    </h2>
                                </div>
                                <div class="row">
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label text-sm-right">Category <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <select v-model="product.category_id" class="form-control" name="categoryLs">
                                            <option value="" selected>Select Category</option>
                                            <option :value="category.value"  v-for="category in categoryList">{{category.label}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Name <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="product.name" class="form-control form-control-lg mb-2" type="text" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Brand<span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <multiselect
                                              v-model="product.brand_id"
                                             tag-placeholder="Add this as new tag" 
                                             placeholder="Search or add a tag" 
                                             :options="brandOptions" 
                                             :multiple="false" 
                                             :taggable="true"
                                              @tag="addTag">
                                        </multiselect>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Type</label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="product.type"  class="form-control form-control-lg mb-2" type="text" placeholder="Product Type">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Food Type</label>
                                    </div>
                                    <div class="col-8">
                                        <select  v-model="product.food_type"  class="form-control form-control-lg mb-2" >
                                            <option value="" selected>Select One</option>
                                            <option value="veg">Veg</option>
                                            <option value="non-veg">Non Veg</option>

                                        </select>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Description </label>
                                    </div>
                                    <div class="col-8">
                                        <textarea  v-model="product.description" class="form-control form-control-lg mb-2"  placeholder="Product Description"></textarea>
                                    </div>
                                </div>
                                <div class="w-50 my-2">
                                    <!-- Upload Container -->
                                    <div
                                            @dragover.prevent
                                            @dragleave.prevent
                                            @drop.prevent="handleDrop"
                                            :class="['w-full flex justify-between items-center hover:bg-green-100',
                                                        'border-2 border-dashed rounded-lg text-center transition-colors duration-200',
                                                        isDragging ? 'border-blue-500 bg-blue-50' : 'border-gray-300 hover:border-gray-400',

                                                      ]"
                                            @click="$refs.fileInput.click()"
                                    >
                                        <div class="my-2 mx-1">
                                            <!-- Upload Icon -->
                                            <div class="w-full mb-4">
                                                <svg
                                                        class="mx-auto h-12 w-12 text-gray-400"
                                                        stroke="currentColor"
                                                        fill="none"
                                                        viewBox="0 0 48 48"
                                                >
                                                    <path
                                                            d="M24 8L24 32M16 16L24 8L32 16"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                    />
                                                    <path
                                                            d="M8 32V36C8 37.1046 8.89543 38 10 38H38C39.1046 38 40 37.1046 40 36V32"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>

                                            <!-- Upload Text -->
                                            <div class="w-full">
                                                <!-- <p class="mb-2 text-sm text-gray-600">
                                                     <span class="font-semibold">Click to upload</span> or drag and drop
                                                 </p>-->
                                                <p class="text-xs text-gray-500"> Click to upload or drag and drop PNG, JPG, GIF up to 10MB</p>

                                                <!-- Hidden File Input -->
                                                <input
                                                        ref="fileInput"
                                                        type="file"
                                                        class="hidden"
                                                        accept="image/*"
                                                        @change="handleFileSelect"
                                                        multiple
                                                />
                                            </div>
                                        </div>
                                        <!-- Preview Section -->
                                        <div v-if="product.image" class="w-full flex justify-center items-center my-2 gap-4">
                                            <div class="relative rounded-lg overflow-hidden border border-gray-200">
                                                <img
                                                        :src="product.image.preview"
                                                        class="w-full h-32 object-contain"
                                                        :alt="product.image.name"
                                                />
                                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
                                                    <button
                                                            @click.stop="removeFile()"
                                                            class="absolute top-2 right-2 text-white bg-red-500 rounded-full p-1 hover:bg-red-600"
                                                    >
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload Progress (optional) -->
                                    <div v-if="uploading" class="mt-4">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div
                                                    class="bg-blue-600 h-2.5 rounded-full"
                                                    :style="{ width: `${uploadProgress}%` }"
                                            ></div>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-2">Uploading... {{ uploadProgress }}%</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Status <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <select v-model="product.status" class="form-control mb-2">
                                            <option selected="">Select One</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="border-t px-4 py-2 flex justify-end">
                        <button  @click="modalClose()"  type="button" class="px-3 py-1 mx-2  text-black  rounded-md w-full sm:w-auto bg-gray-100" >Close</button>
                        <button v-if="product.id"   @click="updateProduct()"  type="button" class="px-3 py-1  mx-2 text-white  rounded-md w-full sm:w-auto  bg-indigo-500" data-bs-dismiss="modal">Update</button>
                        <button v-if="!product.id" @click="addProduct()" type="button" class="px-3 py-1  mx-2 text-white  rounded-md w-full sm:w-auto bg-indigo-500">Save </button>
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
    import ToolTipCom  from "@/Components/Tooltip/BlackTooltip.vue";
    import EasyDataTable from "vue3-easy-data-table";
    import 'vue3-easy-data-table/dist/style.css';

    import Swal from 'sweetalert2/dist/sweetalert2.js'
    import 'sweetalert2/src/sweetalert2.scss'

    import Multiselect from 'vue-multiselect'
    import "vue-multiselect/dist/vue-multiselect.css"

    //---------------  define  data ================
    const pageName = ref("Products");
    const loading = ref(false)
    const serverItemsLength = ref(0);
    const serverOptions = ref({
        page: 1,
        rowsPerPage: 5,
        sortBy: 'name',
        sortType: 'asc'
    });

    const headers = [
        { text: "Name", value: "name", sortable: true , fixed: true,   width: 200},
        { text: "Category", value: "category_name", sortable: true , fixed: true,   width: 180},
        { text: "Brand", value: "brand_id", sortable: true ,fixed: true, },
        { text: "Sku", value: "sku"  , fixed: true,  width: 180},
        { text: "Type", value: "type", sortable: true , fixed: true,},
        { text: "Food Type", value: "food_type", sortable: true,fixed: true, width: 90},
        { text: "Status", value: "status", sortable: true,fixed: true, width: 70},
        { text: "Action", value: "actions", fixed: true, width: 300, sortable: false,
            html: true// Enable HTML rendering for this column
        },
    ];

    const searchField = ref('name');
    const searchValue = ref('');
    const items = ref([]);
    const categoryList = ref([]);
    const product = ref({
        id:"",
        name:"",
        type:"",
        brand_id:"",
        category_id:"",
        category_name:"",
        description:"",
        status:"active" ,
        sku:"",
        food_type:""

    });
   
    const addProductModal = ref(false);
    const selectedCategory =ref("");

    // Add this to your existing data refs
    const brandOptions = ref([]);

    // file upload....
    const fileData = ref("")
    const isDragging= ref(false);
    const uploading= ref(false);
    const uploadProgress = ref(0);
    const maxFileSize = ref(10 * 1024 * 1024) // 10MB in bytes


    //--------------- define  function ================
    const modalClose = ()=>{
        addProductModal.value =false;
        product.value = {
            id:"",
            name:"",
            brand_id:"",
            type:"",
            category_id:"",
            category_name:"",
            description:"",
            status:"inactive" ,
            food_type:"",
        }
        fileData.value ='';
        uploadProgress.value =0;
    }

    const fetchCategoryList = async () => {
        try {
            const response = await axios.get(route('categories.index'), {});

            if (response.status === 200) {
                categoryList.value = response.data.data.map( (item)=>({
                       label: item.name, value:item.id
                }));
            }
        } catch (error) {
            console.log(error);
        } finally {

        }
    };

    const fetchProducts = async (updateOptions) => {
        loading.value = true;
        try {
            const response = await axios.get(route('products.index'), {
                params: {
                    page: serverOptions.value.page,
                    per_page: serverOptions.value.rowsPerPage,
                    sort_by: serverOptions.value.sortBy || 'name',
                    sort_type: serverOptions.value.sortType || 'asc',
                    search: searchValue.value,
                    selected_category:selectedCategory.value
                }
            });

            if (response.status === 200) {
                // Map the response data to include transformed values
                items.value = response.data.data.map( (item,i) => ({
                    id: item.id, // Keep the id for actions
                    name: item.name,
                    category_id:item.category_id,
                    category_name:item.category_name,
                    unit: item.unit,
                    unit_size:item.unit_size,
                    brand_id:item.brand_id,
                    type: item.type || 'N/A',
                    sku:item.sku,
                    in_stock_quantity:item.in_stock_quantity,
                    inventory_status:item.inventory_status,
                    price:  item && item.price ? '₹'+item.price.mrp_price:"N/A",
                    status: item.product_status === 1 ? 'Active' : 'Inactive',
                    image:item.image??'/assets/img/dummy-product-5.jpg',
                    min_stock_hold:item.min_stock_hold,
                    max_stock_hold:item.max_stock_hold,
                    description:item.description,

                }));
                serverItemsLength.value = items.value.length;
            }
        } catch (error) {
            console.log(error);
        } finally {
            loading.value = false;
        }
    };

    // Add these methods to handle edit and delete actions
    const editProduct = (data) => {
        // Handle edit action
        addProductModal.value = true;
        product.value = {
            id: data.id,
            name: data.name,
            type: data.type,
            category_id: data.category_id,
            brand_id:data.brand_id,
            status: data.status ? 'active' : 'inactive',
            description:data.description,
            food_type:data.food_type,
        };
    }

    const deleteProduct = (id) => {
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

                axios.delete(route('products.destroy',id) ).then( async (response)=>{
                    if (response.status === 200) {
                        await  fetchProducts();
                    }
                }).catch(( err  )=>{
                    console.log(err)
                }).finally( ()=>{
                    loading.value = false;
                })
            }
        });
    };

    const addProduct = ()=>{
        loading.value = true;
        axios.post(route('products.store'),product.value).then((res)=>{
            if( res.status === 200){
                addProductModal.value =false;
                fetchProducts();
            }
        }).catch( (err)=>{
            console.log( err);
        }).finally(()=>{
            loading.value = false;
        });
    }

    const  updateProduct = ()=>{

        loading.value = true;
        axios.put(route('products.update',product.value.id),product.value).then( async (res)=>{
            if( res.status === 200){
                modalClose();
                await  fetchProducts();
            }
        }).catch( (err)=>{
            console.log( err);
        }).finally(()=>{
            loading.value = false;
        });
    }

// Add this function to fetch brands
    const fetchBrands = async () => {
            try { 
                brandOptions.value =[];
                const response = await axios.post('/api/get-brands')
                    if (response.status === 200 && response.data.length > 0) {
                        response.data.forEach( (brand) => {
                            brandOptions.value.push(brand)
                        })
                    } 
            } catch (error) {
                console.log(error)
            }
        }
    // Add this function to add brands option list
    const addTag = (newTag) => {
        brandOptions.value.push(newTag)
        product.value.brand_id = newTag;
    }



    // file upload

    // For file input change event
    const handleFileSelect = (e) => {
        const selectedFiles = Array.from(e.target.files)
        processFiles(selectedFiles)
    }

    // For drag and drop
    const handleDrop = (e) => {
        const droppedFiles = Array.from(e.dataTransfer.files)
        processFiles(droppedFiles)
    }

    const processFiles = (uploadedFiles) => {
        uploadedFiles.forEach(fileObj => {
            // Validate file type and size
            if (!fileObj.type.startsWith('image/')) {
                alert('Please upload only image files.')
                return
            }
            if (fileObj.size > maxFileSize.value) {
                alert('File size should not exceed 10MB.')
                return
            }

            // Create preview URL
            const reader = new FileReader()
            reader.onload = (e) => {
                product.value.image = {
                    file:fileObj,
                    name: fileObj.name,
                    preview: e.target.result
                };

            }
            // Read the actual file object (fileObj), not file.value
            reader.readAsDataURL(fileObj)

        })
    }

    const removeFile = (index)=> {
        //files.splice(index, 1)
        fileData.value ="";
    }

     const uploadFiles = async ()=> {
        if (!file.value) return

        uploading.value = true;
        uploadProgress.value = 0

        // Simulate upload progress
        const increment = 100 / file.value.length
         try {
             // Here you would normally make an API call to upload the file
             await simulateFileUpload(file, increment)
         } catch (error) {
             console.error('Upload failed:', error)
             alert(`Failed to upload ${file.name}`)
         }

        uploading.value = false
        file.value = '';
    };
    // Simulate file upload - replace with actual API call
    const simulateFileUpload =  (file, increment) =>{
        return new Promise(resolve => {
            setTimeout(() => {
                uploadProgress.value += increment
                resolve()
            }, 1000)
        })
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
    const debouncedFetch = debounce( fetchProducts, 300);

    // Watch for changes in search and server options
    watchEffect(() => {
        if( selectedCategory.value || searchValue.value){
            debouncedFetch();
        }
    });

    watchEffect(() => {
        if( addProductModal.value){
            fetchBrands();
        }
    });
    

    //---------------   Initial data fetch ================
    fetchProducts(serverOptions.value);
    fetchCategoryList();





</script>

<style scoped>
    .product-table{
        --easy-table-rows-per-page-selector-z-index: 1;
        --easy-table-footer :0;
    }



</style>

