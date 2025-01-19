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

<script setup>
import  "@/DashboardLayout/DashboardCss.vue";
import HeaderCom from "@/DashboardLayout/HeaderCom.vue";
import MenuBar from "@/DashboardLayout/Menu.vue";
import FooterComp from "@/DashboardLayout/FooterCom.vue";


</script>

<style></style>
