<template>

    <div class="wrapper">

        <!--- side menu   -->
        <menu-bar> </menu-bar>


        <div class="main">
            <!--- top header   -->
            <header-com />

            <main class="content">
                <slot></slot>

                <footer-comp />
            </main>
             <!--- page footer   -->

        </div>
    </div>
</template>

<script>
import  "@/DashboardLayout/DashboardCss.vue";
import HeaderCom from "@/DashboardLayout/HeaderCom.vue";
import MenuBar from "@/DashboardLayout/Menu-old.vue";
import FooterComp from "@/DashboardLayout/FooterCom.vue";


export default {
    name: "AppLayout",
    components: { HeaderCom,  MenuBar,FooterComp },
    data() {
        return {
            op:''
        };
    },
    methods() {},
    created(){

    }
};
</script>

<style></style>
