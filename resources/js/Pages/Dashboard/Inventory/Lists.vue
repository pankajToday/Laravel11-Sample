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
                                <input type="search" v-model="searchValue" class="form-control mx-2" placeholder="Search Items">
                                <select v-model="selectedCategory" id="categoryList" class="js-example-basic-single form-control mx-2" name="state">
                                    <option value="" selected>Select Category</option>
                                    <option :value="category.value"  v-for="category in categoryList">{{category.label}}</option>
                                </select>

                            </div>
                            <button @click="addInventorytModal = !addInventorytModal"  class="btn mb-2 btn-pill btn-primary"  >Add New</button>
                        </div>

                        <EasyDataTable
                                :headers="headers"
                                :items="items"
                                :loading="loading"
                                table-class-name="product-table"
                                :body-expand-row-class-name="bodyExpandRowClassNameFunction"
                                :search-field="searchField"
                                :search-value="searchValue"
                                hide-footer="false"
                                show-index
                                alternating
                                must-sort
                        >

                            <template #item-product_name="{ product_name,product_id ,product_img}">
                                <div class="player-wrapper d-flex align-center">
                                    <div class="ms-2 text-decoration-none ">
                                        <a  :href="route('inventories.show',product_id)" title="View Product" target="_blank"  class="flex mx-1 my-1 no-underline justify-start items-center text-indigo-500 font-bold">
                                            <img :src="product_img" class="h-10 w-10 rounded-lg shadow-sm">
                                            <span class="text-subtitle-1 mb-0  px-2">{{ product_name }}</span>

                                        </a>
                                    </div>
                                </div>
                            </template>
                            <template #expand="item">
                                <div style="padding: 15px">
                                    <EasyDataTable
                                        :headers="inventoryHeaders"
                                        :items="item.inventory"
                                        :loading="loading"
                                        hide-footer="false"
                                        table-class-name="inventory-table"
                                        show-index
                                        alternating
                                        must-sort
                                    >
                                        <template #item-actions="item">
                                            <div class="operation-wrapper">
                                                <div class="d-flex gap-2">
                                                    <a href="#" @click.prevent="editInventory(item)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2 align-middle">
                                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="#" @click.prevent="deleteInventory(item.id)">
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
                            </template>

                        </EasyDataTable>

                    </div>
                </div>
            </div>

            <div v-if="addInventorytModal"  class="fixed inset-0 px-2 z-10 overflow-hidden flex items-center justify-center backdrop-blur-sm transition-opacity ">
                <div  class="absolute inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>
                <!-- Modal Content -->
                <div  class="w-full sm:w-96 md:w-1/2 lg:w-2/3 bg-white rounded-md shadow-xl overflow-hidden z-50">
                    <!-- Modal Header -->
                    <div class=" bg-gray-100 text-white px-2 py-3 flex justify-between">
                        <span class="text-lg text-black">{{inventory.id ?'Edit':'Add'}} Product   </span>
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
                                        <select v-model="product.inventory_id" class="form-control" name="inventoryLs">
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
                                        <label class="col-form-label text-sm-right">Type</label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="product.type"  class="form-control form-control-lg mb-2" type="text" placeholder="Product Type">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Min-Stock <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="product.min_stock_hold" class="form-control form-control-lg mb-2" type="number" placeholder="Minimum Stock">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label text-sm-right">Max-Stock <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="product.max_stock_hold" class="form-control form-control-lg mb-2" type="number" placeholder="Max Stock">
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
                                <div class="w-full my-2">
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
                            <div v-if="product && product.inventory && !product.inventory.product_id" class="row mx-1 border border-gray-100 rounded-md">
                                <div class="relative flex items-center justify-center mb-4">
                                    <h2 class="absolute text-black !bg-white text-lg font-medium px-4 mb-1 border border-gray-50 rounded-md">
                                        Product Inventory
                                    </h2>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-2">
                                        <label class="col-form-label text-sm-right">Base Price <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="product.inventory.base_price"  class="form-control form-control-lg mb-2" type="number" placeholder="Product Base Price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">MRP Price <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="product.inventory.mrp_price" class="form-control form-control-lg mb-2" type="number" placeholder="Product MRP. Price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Quantity</label>
                                    </div>
                                    <div class="col-8">
                                        <input v-model="product.inventory.quantity"  class="form-control form-control-lg mb-2" type="number" placeholder="Product Quantity">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Sale Price <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="product.inventory.sale_price" class="form-control form-control-lg mb-2" type="number" placeholder="Sale Price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <select  v-model="product.inventory.discount_id" class="form-control form-control-lg mb-2" >
                                            <option value="flat" selected>Flat Discount</option>
                                            <option value="percentage">Percentage %</option>
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <input  v-model="product.inventory.discount_amount" class="form-control form-control-lg mb-2" type="text" placeholder="Max Stock">
                                    </div>
                                    <div class="col-1 py-2 cursor-pointer">
                                          <span class="group relative">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <ToolTipCom  :message="discountTooltip"></ToolTipCom>
                                          </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <select  v-model="product.inventory.tax_id" class="form-control form-control-lg mb-2" >
                                            <option value="gst" selected>GST</option>
                                            <option value="vat">VAT</option>
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <input  v-model="product.inventory.tax_rate" class="form-control form-control-lg mb-2" type="text" placeholder="Allowed Tax Rate for Goods.">
                                    </div>
                                    <div class="col-1 py-2 cursor-pointer">
                                          <span class="group relative">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <ToolTipCom  :message="taxTooltip"></ToolTipCom>
                                          </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <select  v-model="product.inventory.code_type" class="form-control form-control-lg mb-2" >
                                            <option value="barcode" selected>Barcode</option>
                                            <option value="qrcode">QR-code</option>
                                        </select>
                                    </div>
                                    <div class="col-8">
                                        <input type="number"  v-model="product.inventory.code_number" class="form-control form-control-lg mb-2"  placeholder="Product Description"></input>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Purchase Date </label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="product.inventory.purchase_date" class="form-control form-control-lg mb-2" type="date" placeholder="Product Buy Date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Expiry </label>
                                    </div>
                                    <div class="col-8">
                                        <input  v-model="product.inventory.expiry" class="form-control form-control-lg mb-2" type="date" placeholder="Product Expiry Date">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Status <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <select v-model="product.inventory.status" class="form-control mb-2">
                                            <option value="in-stock">In-Stock</option>
                                            <option value="out-stock">Out-Stock</option>
                                            <option value="expired">Expired</option>
                                            <option value="damaged">Damaged</option>
                                            <option value="returned">Returned</option>
                                            <option value="ordered">Ordered</option>
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

    //---------------  define  data ================
    const  pageName = ref("Inventory");
    const loading = ref(false)
    const selectedItems = ref([]);
    const serverItemsLength = ref(0);
    const serverOptions = ref({
        page: 1,
        rowsPerPage: 5,
        sortBy: 'name',
        sortType: 'asc'
    });

    const bodyExpandRowClassNameFunction = (item, rowNumber) => {
        return 'can-expand';
    };


    const headers = [
        { text: "Name", value: "product_name", sortable: true ,    width: 200,},
        { text: "Category", value: "category_name", sortable: true ,    width: 180,},
        { text: "Sku", value: "sku", sortable: true, width: 160},
        { text: "Type", value: "product_type", sortable: true, width: 160},
        { text: "Min Stock", value: "min_stock", sortable: true, width: 60},
        { text: "Max Stock", value: "max_stock", sortable: true, width: 60},
        { text: "Status", value: "status", sortable: true, width: 90},

    ];
    const inventoryHeaders = [
        { text: "Buy Date", value: "purchase_date", sortable: true, width: 90},
        { text: "Sku", value: "sku", sortable: true, width: 160},
        { text: "Quantity", value: "quantity", sortable: true, width: 90},
        { text: "₹ Base", value: "base_price", sortable: true, width: 90},
        { text: "₹ MRP", value: "mrp_price", sortable: true, width: 90},
        { text: "₹ Sale", value: "sale_price", sortable: true, width: 90},
        { text: "Expiry", value: "expiry_date", sortable: true, width: 90},
        { text: "QuCode", value: "qucode", sortable: true, width: 90},
        { text: "BarCode", value: "barcode", sortable: true, width: 90},
        { text: "Status", value: "status", sortable: true, width: 90},
        { text: "Action", value: "actions",  width: 300, sortable: false,
            html: true// Enable HTML rendering for this column
        },
    ];

    const searchField = ref('name');
    const searchValue = ref('');
    const items = ref([]);
    const sortBy = ref(["name", "type"]);
    const sortType = ref(["desc", "asc"]);
    const categoryList = ref([]);
    const itemsSelected = ref([]);
    const inventory = ref({
            product_id:"" ,
            quantity:1,
            status:"in-stock",
            base_price:0,
            mrp_price:0,
            sale_price:0,
            discount_id:'flat',
            discount_amount:0,
            tax_id:'gst',
            tax_rate:0,
            tax_amt:0,
            code_number:0,
            code_type:'barcode',
            expiry:"",
            purchase_date:"",
    }
    );
    const discountTooltip = ref("Select product discount type and max allowed discount for sale.");
    const taxTooltip = ref("Select Tax Format and rate for good for sale.");
    const addInventorytModal = ref(false);
    const selectedCategory =ref("");

    // file upload....
    const fileData = ref("")
    const isDragging= ref(false);
    const uploading= ref(false);
    const uploadProgress = ref(0);
    const maxFileSize = ref(10 * 1024 * 1024) // 10MB in bytes


    //--------------- define  function ================
    const modalClose = ()=>{
        addInventorytModal.value =false;
        inventory.value = {
            product_id:"" ,
            quantity:1,
            status:"in-stock",
            base_price:0,
            mrp_price:0,
            sale_price:0,
            discount_id:'flat',
            discount_amount:0,
            tax_id:'gst',
            tax_rate:0,
            tax_amt:0,
            code_number:0,
            code_type:'barcode',
            expiry:"",
            purchase_date:""
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
            console.error(error);
        } finally {

        }
    };

    const fetchInventory = async () => {
        loading.value = true;
        try {
            const response = await axios.get(route('inventories.index'), {
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
                    category_id : item.category_id ,
                    category_name : item.category_name ,
                    product_id:item.product_id,
                    product_name:item.product_name ,
                    product_img:item.product_img,
                    sku:item.product_sku,
                    min_stock:item.min_stock_hold,
                    max_stock:item.min_stock_hold,
                    status:item.status,
                    'inventory' : item.inventory.map( (inventory,s) => ({
                        "id": inventory.id ,
                        "sku" : inventory.sku ,
                        "product_id" : inventory.product_id ,
                        "quantity" : inventory.quantity ,
                        "status" : inventory.status ,
                        "base_price" : inventory.base_price ,
                        "mrp_price" : inventory.mrp_price ,
                        "sale_price" : inventory.sale_price ,
                        "discount_id" : inventory.discount_id ,
                        "discount_amt" : inventory.discount_amt ,
                        "tax_type" : inventory.tax_type ,
                        "tax_rate" : inventory.tax_rate ,
                        "tax_amt" : inventory.tax_amt ,
                        "barcode" : inventory.barcode ,
                        "qucode" : inventory.qucode ,
                        "expiry_date" : inventory.expiry_date ,
                        "purchase_date" : inventory.purchase_date ,
                    }))

                }));
                serverItemsLength.value = items.value.length;
            }
        } catch (error) {
            console.error(error);
        } finally {
            loading.value = false;
        }
    };

    // Add these methods to handle edit and delete actions
    const editInventory = (data) => {
        // Handle edit action
        addInventorytModal.value = true;
        console.log(data)
        inventory.value = {
            id: data.id,
            name: data.name,
            type: data.type,
            product_id: data.product_id,
            status: data.status ? 'active' : 'inactive',
            min_stock_hold:data.min_stock_hold,
            max_stock_hold:data.max_stock_hold,
            description:data.description,
        };
    }

    const deleteInventory = (id) => {
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

                axios.delete(route('inventories.destroy',id) ).then( async (response)=>{
                    if (response.status === 200) {
                        await  fetchInventory();
                    }
                }).catch(( err  )=>{
                    console.log(err)
                }).finally( ()=>{
                    loading.value = false;
                })
            }
        });
    };

    const addInventory = ()=>{
        loading.value = true;
        axios.post(route('inventories.store'),product.value).then((res)=>{
            if( res.status === 200){
                addInventorytModal.value =false;
                fetchInventory();
            }
        }).catch( (err)=>{
            console.log( err);
        }).finally(()=>{
            loading.value = false;
        });
    }

    const  updateInventory = ()=>{

        loading.value = true;
        axios.put(route('inventories.update',inventory.value.id),inventory.value).then( async (res)=>{
            if( res.status === 200){
                modalClose();
                await  fetchInventory();
            }
        }).catch( (err)=>{
            console.log( err);
        }).finally(()=>{
            loading.value = false;
        });
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
    const debouncedFetch = debounce( fetchInventory, 300);

    // Watch for changes in search and server options
    watchEffect(() => {
        if( selectedCategory.value || searchValue.value){
            debouncedFetch();
        }
    });


    //---------------   Initial data fetch ================
    fetchInventory();
    fetchCategoryList();





</script>

<style scoped>
.can-expand{background-color:  red !important;}


</style>
