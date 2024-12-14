<template>
 <nav   class="sidebar " :class="isCollapsed?'collapsed':''">

            <div class="" data-simplebar="">

                <div class="simplebar-placeholder" style="width: 260px; height:700px;"></div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                             aria-label="scrollable content"
                             style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">

                                <!--- Logo  --->
                                <a class="sidebar-brand flex" href="#">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z"></path>
            <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z"></path>
            <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z"></path>
          </svg>

                                    <span class="align-middle me-3">{{appName}}</span>
                                </a>

                                <!-- Menu -->
                                <ul class="sidebar-nav">

                                    <li v-for="menu in menuItems"  class="sidebar-item">
                                        <a v-if="menu && menu.sub_menu &&  !menu.sub_menu.length"  :href="menu.url"
                                           class="sidebar-link flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round" data-lucide="sliders"
                                                 class="lucide lucide-sliders align-middle">
                                                <line x1="4" x2="4" y1="21" y2="14"></line>
                                                <line x1="4" x2="4" y1="10" y2="3"></line>
                                                <line x1="12" x2="12" y1="21" y2="12"></line>
                                                <line x1="12" x2="12" y1="8" y2="3"></line>
                                                <line x1="20" x2="20" y1="21" y2="16"></line>
                                                <line x1="20" x2="20" y1="12" y2="3"></line>
                                                <line x1="2" x2="6" y1="14" y2="14"></line>
                                                <line x1="10" x2="14" y1="8" y2="8"></line>
                                                <line x1="18" x2="22" y1="16" y2="16"></line>
                                            </svg>
                                            <span class="align-middle">{{menu.name}}</span>
                                            <!-- <span class="badge badge-sidebar-primary">5</span>-->
                                        </a>

                                        <a v-else :data-bs-target="'#'+menu.slug"   data-bs-toggle="collapse"
                                           class="sidebar-link flex collapsed">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round" data-lucide="sliders"
                                                 class="lucide lucide-sliders align-middle">
                                                <line x1="4" x2="4" y1="21" y2="14"></line>
                                                <line x1="4" x2="4" y1="10" y2="3"></line>
                                                <line x1="12" x2="12" y1="21" y2="12"></line>
                                                <line x1="12" x2="12" y1="8" y2="3"></line>
                                                <line x1="20" x2="20" y1="21" y2="16"></line>
                                                <line x1="20" x2="20" y1="12" y2="3"></line>
                                                <line x1="2" x2="6" y1="14" y2="14"></line>
                                                <line x1="10" x2="14" y1="8" y2="8"></line>
                                                <line x1="18" x2="22" y1="16" y2="16"></line>
                                            </svg>
                                            <span class="align-middle"> {{menu.name}}</span>
                                            <!-- <span class="badge badge-sidebar-primary">5</span>-->

                                            <ul :id="menuItems.slug" class="sidebar-dropdown list-unstyled collapse "
                                                data-bs-parent="#sidebar">
                                                <li class="sidebar-item">
                                                    <a class="sidebar-link flex" :href="menu.url">
                                                        {{menu.name}} <!--<span class="badge badge-sidebar-primary">5</span>-->
                                                    </a>
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                     <li class="sidebar-item">
                                         <a data-bs-target="#ecommerce" data-bs-toggle="collapse"
                                            class="sidebar-link flex flex collapsed">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"
                                                  data-lucide="shopping-bag"
                                                  class="lucide lucide-shopping-bag align-middle">
                                                 <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                                                 <path d="M3 6h18"></path>
                                                 <path d="M16 10a4 4 0 0 1-8 0"></path>
                                             </svg>
                                             <span class="align-middle">E-Commerce</span>
                                         </a>
                                         <ul id="ecommerce" class="sidebar-dropdown list-unstyled collapse "
                                             data-bs-parent="#sidebar">
                                             <li class="sidebar-item"><a class="sidebar-link flex flex"
                                                                         href="https://appstack.bootlab.io/ecommerce-products">
                                                 Products <span class="badge badge-sidebar-primary">New</span>
                                             </a></li>
                                             <li class="sidebar-item"><a class="sidebar-link flex"
                                                                         href="https://appstack.bootlab.io/ecommerce-products-details">
                                                 Product Details <span class="badge badge-sidebar-primary">New</span>
                                             </a></li>
                                             <li class="sidebar-item"><a class="sidebar-link flex"
                                                                         href="https://appstack.bootlab.io/ecommerce-orders">
                                                 Orders <span class="badge badge-sidebar-primary">New</span>
                                             </a></li>
                                             <li class="sidebar-item"><a class="sidebar-link flex"
                                                                         href="https://appstack.bootlab.io/ecommerce-customers">Customers</a>
                                             </li>
                                             <li class="sidebar-item"><a class="sidebar-link flex"
                                                                         href="https://appstack.bootlab.io/ecommerce-invoice">Invoice</a>
                                             </li>
                                             <li class="sidebar-item"><a class="sidebar-link flex"
                                                                         href="https://appstack.bootlab.io/ecommerce-pricing">Pricing</a>
                                             </li>
                                         </ul>
                                     </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                         style="height: 308px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal">
                    <div class="simplebar-scrollbar"></div>
                </div>
                <div class="simplebar-track simplebar-vertical">
                    <div class="simplebar-scrollbar"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal">
                    <div class="simplebar-scrollbar"></div>
                </div>
                <div class="simplebar-track simplebar-vertical">
                    <div class="simplebar-scrollbar"></div>
                </div>


            </div>
        </nav>
</template>


<script setup>
    import { ref } from 'vue'
    import { eventBus } from "@/../events.js";

    const isCollapsed = ref(false);
    const appName = import.meta.env.VITE_APP_NAME ;

    const menuItems = ref([
        {
            name:"Dashboard",
            slug:"dashboard",
            url:"/dashboard",
            icon:"",
            sub_menu:[],
        },
        {
            name:"Category",
            slug:"category",
            url:"/categories",
            icon:"",
            sub_menu:[],
        },
        {
            name:"Product",
            slug:"products",
            url:"/products",
            icon:"",
            sub_menu:[],
        }
    ]);

    eventBus.$on('sideBar',(data)=>{
        isCollapsed.value = data;
    })


</script>
