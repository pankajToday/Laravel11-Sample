<template>
    <nav class="sidebar " :class="isCollapsed ? 'collapsed' : ''">

        <div class="" data-simplebar="">

            <div class="simplebar-placeholder" style="width: 260px; height:700px;"></div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                        style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Logo  --->
                            <a class="sidebar-brand flex" href="#">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px"
                                    height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20"
                                    xml:space="preserve">
                                    <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z"></path>
                                    <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z"></path>
                                    <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z"></path>
                                </svg>

                                <span class="align-middle me-3">{{ appName }}</span>
                            </a>

                            <!-- Menu -->
                            <ul class="sidebar-nav">

                                <li v-for="menu in menuItems" class="sidebar-item">
                                    <a v-if="menu && menu.sub_menu && !menu.sub_menu.length" :href="menu.url"
                                        class="sidebar-link flex">
                                        <span v-if="!menu.icon"   class="align-middle">
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
                                        </span>
                                        <span v-else class="align-middle" v-html="menu.icon"></span>

                                        <span class="align-middle">{{ menu.name }}</span>
                                        <!-- <span class="badge badge-sidebar-primary">5</span>-->
                                    </a>
                                    <a @click="menu.isCollapsed = !menu.isCollapsed" v-else  data-bs-toggle="collapse"
                                        class="sidebar-link flex collapsed">
                                        <span v-if="!menu.icon" class="align-middle">
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
                                        </span>
                                        <span v-else class="align-middle" v-html="menu.icon"></span>

                                        <span class="align-middle">  {{ menu.name }}</span>
                                        <!-- <span class="badge badge-sidebar-primary">5</span>-->
                                    </a>
                                    <ul v-if="  menu && menu.sub_menu && menu.sub_menu.length"  :id="menu.slug" :class="menu.isCollapsed?'collapsed':'collapse'" class="sidebar-dropdown list-unstyled  ">
                                        <li v-for=" (subMenu ,i ) in menu.sub_menu"  class="sidebar-item">
                                            <a class="sidebar-link flex" :href="subMenu.url">
                                              >  {{ subMenu.name }}
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </li>

                                <li class="sidebar-item">
                                    <a data-bs-target="#ecommerce" data-bs-toggle="collapse"
                                        class="sidebar-link flex  collapsed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" data-lucide="shopping-bag"
                                            class="lucide lucide-shopping-bag align-middle">
                                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                                            <path d="M3 6h18"></path>
                                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                                        </svg>
                                        <span class="align-middle">E-Commerce</span>
                                    </a>
                                    <ul id="ecommerce" class="sidebar-dropdown list-unstyled collapse "
                                        data-bs-parent="#sidebar">
                                        <li class="sidebar-item"><a class="sidebar-link flex"
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
const appName = import.meta.env.VITE_APP_NAME;

const menuItems = ref([
    {
        name: "Dashboard",
        slug: "dashboard",
        url: "/dashboard",
        icon: "",
        sub_menu: [],
        isCollapsed: false,

    },
    {
        name: "Category",
        slug: "category",
        url: "/categories",
        icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <rect x="3" y="3" width="7" height="7" rx="1"/>
    <rect x="14" y="3" width="7" height="7" rx="1"/>
    <rect x="3" y="14" width="7" height="7" rx="1"/>
    <rect x="14" y="14" width="7" height="7" rx="1"/>
</svg>
`,
        sub_menu: [],
        isCollapsed: false,
    },
    {
        name: "Vendor",
        slug: "vendor",
        url: "/vendors",
        icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <rect x="3" y="7" width="18" height="14" rx="2"/>
    <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
    <line x1="12" y1="11" x2="12" y2="17"/>
    <line x1="8" y1="11" x2="8" y2="17"/>
    <line x1="16" y1="11" x2="16" y2="17"/>
</svg>
`,
        sub_menu: [],
        isCollapsed: false,
    },

    {
        name: "Product",
        slug: "products",
        url: "/products",
        icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
    <line x1="3" y1="6" x2="21" y2="6"/>
    <path d="M16 10a4 4 0 0 1-8 0"/>
</svg>
`,
        sub_menu: [],
        isCollapsed: false,
    },
    {
        name: "Inventory",
        slug: "inventory",
        url: "/inventory",
        icon: "",
        sub_menu: [],
        isCollapsed: false,
    },
    {
        name: "Order",
        slug: "order",
        url: "/orders",
        icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
        <polyline points="22 4 12 14.01 9 11.01"/>
    </svg>`,
        sub_menu: [],
        isCollapsed: false,
    },
    {
        name: "Glossary List",
        slug: "glossary-list",
        url: "/glossary",
        icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 6h16"/>
        <path d="M4 10h16"/>
        <path d="M4 14h16"/>
        <path d="M4 18h10"/>
        <rect x="4" y="4" width="16" height="16" rx="2"/>
    </svg>`,
        sub_menu: [
            {
                name: "Master Glossary",
                slug: "master-glossary",
                url: "/master-glossary",
                isCollapsed: false,
            },
            {
                name: "user Glossary",
                slug: "user-glossary",
                url: "/user-glossary",
                isCollapsed: false,
            },
        ],
        isCollapsed: false,
    },
    {
        name: "Payment",
        slug: "payment",
        url: "/payments",
        icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <circle cx="12" cy="12" r="10"/>
  <path d="M12 6v12" />
  <path d="M9 12h6" />
</svg>
`,
        sub_menu: [],
        isCollapsed: false,
    },
    {
        name: "Barrows",
        slug: "barrows",
        url: "/barrows",
        icon: "",
        sub_menu: [],
        isCollapsed: false,
    },
    {
        name: "Expences",
        slug: "expences",
        url: "/expences",
        icon: "",
        sub_menu: [],
        isCollapsed: false,
    },
    {
        name: "Todo Dairy",
        slug: "todo-dairy",
        url: "/todo-dairy",
        icon: "",
        sub_menu: [],
         isCollapsed: false,
    }
]);

eventBus.$on('sideBar', (data) => {
    isCollapsed.value = data;
})


</script>
