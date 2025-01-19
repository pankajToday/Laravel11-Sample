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

                                    <template #item-quantity="{ quantity ,quantity_type}">
                                        {{ quantity }} {{ quantity_type.toUpperCase() }}
                                    </template>
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
                        <span class="text-lg text-black">{{inventory.id ?'Edit':'Add'}} Inventory   </span>
                        <button @click="modalClose()"  type="button" class="btn-close my-1" ></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="p-4 text-dark max-h-[400px] overflow-auto">
                        <div class="w-full flex justify-between">

                            <div class="row mx-1 border border-gray-100 rounded-md">
                                <div class="relative flex items-center justify-center mb-4">
                                    <h2 class="absolute text-black !bg-white text-lg font-medium px-4 mb-1 border border-gray-100 rounded-md">
                                      {{ inventory.id ?"Edit":"Add" }}  Product Inventory
                                    </h2>
                                </div>

                                <div class="row">
                                    <div class="col-4 mb-2">
                                        <label class="col-form-label text-sm-right">Product  <span class="text-red-500">*</span></label>
                                    </div>
                                    <div  class="col-4" >
                                        <Multiselect
                                        v-model="inventory.product_id"
                                        :options="productList"
                                        :searchable="true"
                                        mode="single"
                                        placeholder="Select product"
                                        label="label"
                                        track-by="value"
                                        :required="true"
                                        class="form-control p-0 border-0"
                                        @update:model-value="fetchProductUnitList"
                                        :loading="loadingProductList"
                                        />
                                    </div>
                                    <div  class="col-4" >
                                        <Multiselect
                                        v-model="inventory.product_detail_id"
                                        :options="productUnitList"
                                        :searchable="true"
                                        mode="single"
                                        placeholder="Select Product Unit"
                                        label="label"
                                        track-by="value"
                                        :required="true"
                                        class="form-control p-0 border-0"
                                        :loading="loadingProductUnitList" 
                                        />
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Vendor</label>
                                    </div>
                                    <div class="col-4">
                                        <input v-model="inventory.vendor"  class="form-control form-control-lg mb-2" type="text" placeholder="Product Vendor">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Bill Number</label>
                                    </div>
                                    <div class="col-3">
                                        <input v-model="inventory.bill_number"  class="form-control form-control-lg mb-2" type="text" placeholder="Product Bill Number">
                                    </div>
                               
                                    <div class="col-2">
                                        <label class="col-form-label text-sm-right">Bill Date</label>
                                    </div>
                                    <div class="col-3">
                                        <input v-model="inventory.bill_date"  class="form-control form-control-lg mb-2" type="text" placeholder="Product Bill Date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Batch No.</label>
                                    </div>
                                    <div class="col-4">
                                        <input v-model="inventory.batch_number"  class="form-control form-control-lg mb-2" type="text" placeholder="Product Batch Number">
                                    </div>
                                </div>

                            
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Quantity</label>
                                    </div>
                                    <div class="col-4">
                                        <input v-model="inventory.quantity"  class="form-control form-control-lg mb-2" type="number" placeholder="Product Quantity">
                                    </div>
                                    <div class="col-4">
                                        <Multiselect
                                        v-model="inventory.quantity_type"
                                        :options="unitList"
                                        :searchable="true"
                                        placeholder="Select Unit"
                                        :required="true"
                                        class="form-control p-0 border-0"
                                        />

                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Purchase Date </label>
                                    </div>
                                    <div class="col-3">
                                        <input  v-model="inventory.purchase_date" 
                                        class="form-control form-control-lg mb-2"
                                         type="date" 
                                         :max="getCurrentDate()"
                                         :min="getMin5Date()"
                                         placeholder="Product Expiry Date">
                                    </div>
                                
                                    <div class="col-2">
                                        <label class="col-form-label text-sm-right">Expiry </label>
                                    </div>
                                    <div class="col-3">
                                        <input  v-model="inventory.expiry_date" 
                                        class="form-control form-control-lg mb-2"
                                         type="date" 
                                         :min="getMinDate()"
                                         placeholder="Product Expiry Date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">QR/Bar Code</label>
                                    </div>
                                    <div class="col-4">
                                        <select v-model="inventory.code_type" class="form-control form-control-lg mb-2" >
                                            <option value="qrcode" >QR Code</option>
                                            <option value="barcode" >Barcode</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input v-model="inventory.code_number"  class="form-control form-control-lg mb-2" type="text" placeholder="Product Batch Number">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <label class="col-form-label text-sm-right">Status <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="col-8">
                                        <select v-model="inventory.status" class="form-control mb-2">
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
                        <button v-if="inventory.id"   @click="updateInventory()"  type="button" class="px-3 py-1  mx-2 text-white  rounded-md w-full sm:w-auto  bg-indigo-500" data-bs-dismiss="modal">Update</button>
                        <button v-if="!inventory.id" @click="addInventory()" type="button" class="px-3 py-1  mx-2 text-white  rounded-md w-full sm:w-auto bg-indigo-500">Save </button>
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

    import Multiselect from '@vueform/multiselect'
    import '@vueform/multiselect/themes/default.css'

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
        { text: "Qr/Bar Code", value: "code_number", sortable: true, width: 90},
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
            id:'',
            sku:"",
            product_id:"" ,
            quantity:1,
            quantity_type:'pack',
            status:"in-stock",
            base_price:0,
            mrp_price:0,
            sale_price:0,
            discount_id:'flat',
            discount_amt:0,
            tax_type:'gst',
            tax_rate:0,
            code_number:0,
            code_type:'',
            expiry_date:"",
            purchase_date: new Date().toISOString().split('T')[0],
    }
    );
    const discountTooltip = ref("Select product discount type and max allowed discount for sale.");
    const taxTooltip = ref("Select Tax Format and rate for good for sale.");
    const addInventorytModal = ref(false);
    const selectedCategory =ref("");

    const productList = ref([])
    const selectedProduct = ref('')
    const unitList = ref([  'kg', 'gram', 'liter','ml',  'piece',  'dozen', 'box','pack',"other" ])
    const productUnitList = ref([])
    const loadingProductUnitList = ref(false)
    const loadingProductList = ref(false)
     
   


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
            discount_amt:0,
            tax_type:'gst',
            tax_rate:0,
            tax_amt:0,
            code_number:0,
            code_type:'',
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

    const fetchProductUnitList = async () => {
        try {
            loadingProductUnitList.value = true;
            productUnitList.value = [];

            const response = await axios.post( 'api/get-product-unit', { product_id : inventory.value.product_id  });

            if (response.status === 200) {
                productUnitList.value.push({value:'',label:'Select Unit'})
                productUnitList.value= response.data; 
               
                inventory.value.product_detail_id = '';//response.data[0].value;
                loadingProductUnitList.value = false;
            }
        } catch (error) {
            console.error(error);
        } finally {
            loadingProductUnitList.value = false;   
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
                    product_type:item.product_type,
                    status:item.status,
                    'inventory' : item.inventory.map( (inventory) => ({
                        "id": inventory.id ,
                        "sku" : inventory.sku ,
                        "product_id" : inventory.product_id ,
                        "quantity" : inventory.quantity ,
                        "quantity_type" : inventory.quantity_type ,
                        "status" : inventory.status ,
                        "base_price" : inventory.base_price ,
                        "mrp_price" : inventory.mrp_price ,
                        "sale_price" : inventory.sale_price ,
                        "discount_id" : inventory.discount_id ,
                        "discount_amt" : inventory.discount_amt ,
                        "tax_type" : inventory.tax_type ,
                        "tax_rate" : inventory.tax_rate ,
                        "expiry_date" : inventory.expiry_date ,
                        "purchase_date" : inventory.purchase_date ,
                        "code_type" : inventory.code_type ,
                        "code_number" : inventory.code_number ,
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
        inventory.value =  data;
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
        if (new Date(inventory.value.purchase_date) > new Date()) {
            toast.error("Purchase date cannot be in the future");
            return;
        }
    


        loading.value = true;
        axios.post(route('inventories.store'),inventory.value).then((res)=>{
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

    const fetchProductList=  async () => {
        loadingProductList.value = false; 
        try {
            const response = await axios.get(route('products.index'), {
                params: {}
            });

            if (response.status === 200) {
                // Map the response data to include transformed values
                productList.value  = response.data.data.map( (item,i) => ({
                    label: item.name, 
                    value: item.id
                }));
                loadingProductList.value = false;
            }
        } catch (error) {
            console.log(error);
        } finally {
            loadingProductList.value = false;
        }
    };

    const  updateInventory = ()=>{
        if (new Date(inventory.value.purchase_date) > new Date()) {
            toast.error("Purchase date cannot be in the future");
            return;
        }

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

    const getCurrentDate = () => {
        return new Date().toISOString().split('T')[0];
    }
    
    const getMin5Date = () => {
        const date = new Date();
        date.setDate(date.getDate() - 5);
        return date.toISOString().split('T')[0];
    }

    const getMinDate = () => {
        const date = new Date();
        date.setDate(date.getDate());
        return date.toISOString().split('T')[0];
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
    fetchProductList();





</script>

<style scoped>
.can-expand{background-color:  red !important;}


</style>
