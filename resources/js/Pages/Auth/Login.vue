<template>
    <!---  add css  -->
    <dashboard-css-component ></dashboard-css-component>


    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-flex">
                <div class="auth-full-page position-relative">
                    <img src="/assets/dashboard/img/login.svg" class="auth-bg" alt="Login Image">

                </div>
            </div>
            <div class="col-xl-6">
                <div class="auth-full-page d-flex p-4 p-xl-5">
                    <div class="d-flex flex-column w-100 h-100">
                        <div class="auth-form">

                            <div class="text-center">
                                <h1 class="h2">Welcome back!</h1>
                                <p class="lead">
                                    Sign in to your account to continue
                                </p>
                            </div>

                            <div class="mb-3">
                                <div class="d-grid gap-2 mb-3">
                                    <a @click="socialLogin('facebook')" class='btn btn-facebook btn-lg position-relative shadow'
                                       href='#'>
                                        <i class="fab fa-fw fa-facebook fs-3 float-start"></i>
                                        <span class="position-absolute mx-auto w-100 left-0">Continue with Facebook</span>
                                    </a>
                                    <a @click="socialLogin('google')"  class='btn btn-google btn-lg position-relative shadow' href='#'>
                                        <i class="fab fa-fw fa-google fa-google-colored fs-3  float-start"></i>
                                        <span class="position-absolute mx-auto w-100 left-0">Continue with Google</span>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <hr>
                                    </div>
                                    <div class="col-auto text-uppercase d-flex align-items-center">Or</div>
                                    <div class="col">
                                        <hr>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input v-model="email" class="form-control form-control-lg" type="email" name="email"
                                           placeholder="Enter your email"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input v-model="password" class="form-control form-control-lg" type="password" name="password"
                                           placeholder="Enter your password"/>
                                    <small>
                                        <a href='/auth-reset-password-cover'>Forgot password?</a>
                                    </small>
                                </div>
                                <div>
                                    <div class="form-check align-items-center">
                                        <input v-model="remember" id="customControlInline" type="checkbox" class="form-check-input"
                                               value="remember-me" name="remember-me" checked>
                                        <label class="form-check-label text-small" for="customControlInline">Remember
                                            me</label>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <button v-if="!loading"  @click="login" class='btn btn-lg btn-primary' >Sign in</button>
                                    <button v-else  class='btn btn-lg btn-primary' disabled >Verifying....</button>
                                </div>
                            </div>

                            <div class="text-center">
                                Don't have an account? <a href='/auth-sign-up-cover'>Sign up</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="mb-0">
                                &copy; 2024 - <a href='/'>My DayBook</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
    import  DashboardCssComponent from "@/DashboardLayout/DashboardCss.vue";

    export default {
        name: "Login.vue",
        components:{DashboardCssComponent},
        data(){
            return{
                email:"demo@example.com",
                password:"password",
                remember:1,
                loading:false

            }
        },
        methods:{
            login(){
                this.loading =true;
                let payload ={ email:this.email , password:  this.password , remember: this.remember }
                axios.post('/api/login',payload).then( (res)=>{
                    if( res.status === 200 ){
                        console.log("Login success.");
                        this.loading =false;
                        this.$inertia.get('/dashboard');
                    }
                } ).catch((error) =>{
                    this.loading =false;
                })
            },
            socialLogin( mode ){

            }
        },
        created(){},
    }
</script>

<style scoped>

</style>