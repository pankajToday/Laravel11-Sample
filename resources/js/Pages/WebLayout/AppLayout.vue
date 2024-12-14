<template>
    <!-- Page header -->
    <top-header ></top-header>

    <main class="main">
        <slot />
    </main>

    <!-- Page footer -->
    <footer > </footer>
</template>


<style>
    /*-- Import only App Layout css only  --*/
    @import "@Asset/assets/vendor/bootstrap/css/bootstrap.min.css";
    @import "@Asset/assets/vendor/bootstrap-icons/bootstrap-icons.css";
    @import "@Asset/assets/vendor/aos/aos.css";
    @import "@Asset/assets/vendor/glightbox/css/glightbox.min.css";
    @import "@Asset/assets/vendor/swiper/swiper-bundle.min.css";
    @import "@Asset/assets/css/main.css";
</style>


<script setup>
    /*Add Page components*/
import TopHeader from '@/WebLayout/TopHeader.vue';
import Footer from '@/WebLayout/Footer.vue';



   /*--  add css  --*/




</script>
