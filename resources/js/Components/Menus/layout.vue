<template>
    <div class="w-full">
        <topbar></topbar>
        <sidebar></sidebar>
        <div>
            <div class="pl-[220px] pt-[65px]">
                <div class="p-6 bg-slate-50">
                    <slot></slot>
                </div>
            </div>
        </div>
<!--        <div class="pl-[220px] mt-auto">-->
<!--            <app-footer></app-footer>-->
<!--        </div>-->
    </div>
</template>

<script>
import Topbar from "./topbar.vue";
import Sidebar from "./sidebar.vue";
import AppFooter from "./AppFooter.vue";
export default {
    name: "layout",
    components: {AppFooter, Sidebar, Topbar}
}
</script>

<style scoped>

</style>
