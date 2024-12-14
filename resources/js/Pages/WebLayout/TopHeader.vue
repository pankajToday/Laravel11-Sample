<template>
   <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between"
        >
            <a href="/#hero" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Easy Book</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <!-- lander page menu -->
                <ul v-if="landerPageMenu">
                    <li><a href="/#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="/privacy-policy#privacy-policy">Privacy Policy</a></li>
                    <li><a href="/login">Sign-in</a></li>
                    <li><a href="/sign-up">Sign-up</a></li>

                   <!-- <li class="dropdown">
                        <a href="#"
                            ><span>Dropdown</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i
                        ></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown">
                                <a href="#"
                                    ><span>Deep Dropdown</span>
                                    <i
                                        class="bi bi-chevron-down toggle-dropdown"
                                    ></i
                                ></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li>
                        </ul>
                    </li>-->
                    <li><a href="#contact">Contact</a></li>
                </ul>

                <!--  -->
                <ul v-else>
                    <li><a href="/#hero" class="active">Home</a></li>
                    <li><a href="/#about">About</a></li>
                    <li><a href="/#features">Features</a></li>
                    <li><a href="/#gallery">Gallery</a></li>
                    <li><a href="/#team">Team</a></li>
                    <li><a href="/#pricing">Pricing</a></li>
                    <li><a href="/privacy-policy#privacy-policy">Privacy Policy</a></li>
                    <li><a href="/#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>
</template>

<script>

export default {
    name: "TopHeader",
    components: {},
    data() {
        return {
            landerPageMenu : true ,

        };
    },
    created(){
        var winLocation =   window.location;
        var pathName = winLocation.pathname;

        if( pathName.length == 1){
            this.landerPageMenu = true
        }
        else{
            this.landerPageMenu =  false;
        }
    }
};


</script>
