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
                                <input type="search" v-model="searchValue" class="form-control" placeholder="Search Category">
                            </div>
                            <button @click="addCategoryModal = !addCategoryModal"  class="btn mb-2 btn-pill btn-primary"  >Add New</button>
                        </div>

                        <EasyDataTable
                                :headers="headers"
                                :items="items"
                                :loading="loading"
                                 table-class-name="category-table"
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
                                        <a  :href="route('categories.show',id)" target="_blank"  class="">
                                            <span class="text-subtitle-1 mb-0 ">{{ name }}</span>
                                        </a>

                                    </div>
                                </div>
                            </template>
                            <template #item-actions="item">
                                <div class="operation-wrapper">
                                    <div class="d-flex gap-2">
                                        <a href="#" @click.prevent="editCategory(item)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2 align-middle">
                                                <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                            </svg>
                                        </a>
                                        <a href="#" @click.prevent="deleteCategory(item.id)">
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


            <div v-if="addCategoryModal"  class="modal fade show modal-overlay" id="" tabindex="-1" role="dialog" aria-modal="true" style="display: block;">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> {{category.id ?'Edit':'Add'}} Category</h5>
                            <button @click="addCategoryModal = !addCategoryModal"  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body m-1">
                            <div class="row">
                                <div class="col-3">
                                    <label class="col-form-label col-sm-2 text-sm-right">Name</label>
                                </div>
                                <div class="col-8">
                                    <input  v-model="category.name" class="form-control form-control-lg mb-3" type="text" placeholder="Category Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label class="col-form-label col-sm-2 text-sm-right">Type</label>
                                </div>
                                <div class="col-8">
                                    <input v-model="category.type"  class="form-control form-control-lg mb-3" type="text" placeholder="Category Type">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label class="col-form-label col-sm-2 text-sm-right">Status</label>
                                </div>
                                <div class="col-8">
                                    <select v-model="category.status" class="form-control mb-3">
                                        <option selected="">Select One</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button  @click="addCategoryModal = false"  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button v-if="!category.id"   @click="addCategory"  type="button" class="btn  btn-primary" data-bs-dismiss="modal">Save</button>
                            <button v-if="category.id" @click="updateCategory" type="button" class="btn btn-primary">Update</button>
                        </div>
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
    const  pageName = ref("Vendor");
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
        { text: "Name", value: "name", sortable: true , fixed: true,   width: 200,},
        { text: "Type", value: "type", sortable: true,fixed: true, width: 200},
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
    const category = ref({id:"",name:"",type:"",status:"inactive"});
    const addCategoryModal = ref(false);


    //--------------- define  function ================
    const fetchCategories = async (updateOptions) => {
        loading.value = true;

        try {
            const response = await axios.get(route('categories.index'), {
                params: {
                    page: serverOptions.value.page,
                    per_page: serverOptions.value.rowsPerPage,
                    sort_by: serverOptions.value.sortBy || 'name',
                    sort_type: serverOptions.value.sortType || 'asc',
                    search: searchValue.value
                }
            });

            if (response.status === 200) {
                // Map the response data to include transformed values
                items.value = response.data.data.map( (item,i) => ({
                    id: item.id, // Keep the id for actions
                    name: item.name,
                    type: item.type || 'N/A',
                    status: item.status === 1 ? 'Active' : 'Inactive'
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
    const editCategory = (data) => {
        // Handle edit action
        addCategoryModal.value =true;
        category.value ={id:data.id,name:data.name,type:data.type,status: ( data.status ?'active':'inactive' )}
    };

    const deleteCategory = (id) => {
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

                axios.delete(route('categories.destroy',id) ).then( async (response)=>{
                    if (response.status === 200) {
                        await  fetchCategories();
                    }
                }).catch(( err  )=>{
                  console.log(err)
                }).finally( ()=>{
                    loading.value = false;
                })
            }
        });
    };

    const  addCategory = ()=>{
        loading.value = true;
        axios.post(route('categories.store'),category.value).then((res)=>{
            if( res.status === 200){
                category.value = {id:"",name:"",type:"",status:""};
                addCategoryModal.value =false;
                fetchCategories();
            }
        }).catch( (err)=>{
           console.log( err);
        }).finally(()=>{
            loading.value = false;
        });
    }

    const  updateCategory = ()=>{
        loading.value = true;
        axios.put(route('categories.update',category.value.id),category.value).then( async (res)=>{
            if( res.status === 200){
                category.value = {id:"",name:"",type:"",status:""};
                addCategoryModal.value =false;
              await  fetchCategories();
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
    const debouncedFetch = debounce( fetchCategories, 300);

    // Watch for changes in search and server options
    watchEffect(() => {
        const { page, rowsPerPage, sortBy, sortType } = serverOptions.value;
      //  console.log( 'search ' + searchValue.value ,"page " +  page)
        const search = searchValue.value;
        if( search )
        debouncedFetch();
    });



    //---------------   Initial data fetch ================
    fetchCategories(serverOptions.value);




</script>

<style scoped>
.category-table{
    --easy-table-rows-per-page-selector-z-index: 1;
    --easy-table-footer :0;
}
</style>
