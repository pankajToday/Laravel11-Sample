<template>
    <Head title="Login" />


    <div class="w-full h-screen bg-white">
        <div class="flex items-center w-full h-full">
            <div v-if="logIn" class="w-[480px] h-[500px] bg-[#333333] bg-opacity-70 mx-auto rounded-[30px] shadow-sm px-[70px] py-[30px]">
                <img alt="logo" class="mx-auto w-[150px]" src="/project-assets/img/login.png">
                <div class="text-[21px] text-white font-normal mt-4">Login</div>
                <!--<div class="text-[12px] font-normal">Don’t have an account?
                    <a href="/register" class="font-semibold underline">Sign up</a></div>-->
                <div class="w-full">
                    <input v-model="email" type="email" class="w-full rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" maxlength="40" placeholder="Your email">
                    <span v-if="errors && errors.email" class="text-xs text-red-600">Error : {{ errors.email[0]}}</span>

                    <input v-model="password" type="password" class="w-full rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080] mt-3" maxlength="10" placeholder="Password">
                    <span v-if="errors && errors.password" class="text-xs  text-red-600">Error : {{ errors.password[0]}}</span>

                    <div @click.prevent="forgetPwd=true,logIn=false" class="mt-3 text-white underline text-xs font-normal cursor-pointer">Forgot password?</div>
                    <button @click="Login" class="w-full mt-8 bg-black text-white border-2 border-[#383838] h-12 rounded-xl text-[17px] font-medium">Log In</button>
                </div>
            </div>
             <div v-if="forgetPwd" class="w-[480px] h-[300px] bg-[#030303] bg-opacity-70 mx-auto rounded-[30px] shadow-sm px-[70px] py-[30px]">
                <div class="text-[21px] text-white font-normal">Forgot Password</div>
                <div class="text-[12px] text-white font-normal">Please enter your email to get password reset link</div>
                <div class="w-full mt-6">
                    <input type="email" v-model="email" class="w-full rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" placeholder="Your email">
                    <span v-if="errors && errors.email" class="text-xs text-red-600">{{ errors.email[0]}}</span>

                    <button @click="forgetPassword" class="w-full mt-8 bg-black text-white border-2 border-[#383838] h-12 rounded-xl text-[17px] font-medium">Send Reset link</button>
                    <div @click="logIn = true; forgetPwd = false; " class="text-[12px] underline cursor-pointer mt-1 text-center text-white font-normal">Back to login</div>

                </div>
            </div>
             <div v-if="resetPwd" class="w-[480px] h-auto bg-[#030303] bg-opacity-70 mx-auto rounded-[30px] shadow-sm px-[70px] py-[30px]">
                <div class="text-[21px] text-white font-normal">Forgot Password</div>
                <div class="text-[12px] text-white font-normal">Please enter password to reset password.</div>
                <div class="w-full mt-6">
                    <input type="hidden" v-model="user_token" >
                    <input type="email" v-model="email" class="w-full mt-2 rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" placeholder="Your email">
                    <span v-if="errors && errors.email" class="text-xs text-red-600">{{ errors.email[0]}}</span>

                    <div class="text-[12px] text-white  mt-2  font-normal">Enter OTP if reset mail not received! </div>

                    <input type="text" v-model="otp" maxlength="15" class="w-full  mt-2 rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" placeholder="OTP">
                    <span v-if="errors && errors.otp" class="text-xs text-red-600">{{ errors.otp[0]}}</span>


                    <input type="password"  maxlength="10" v-model="password" class="w-full rounded-lg  mt-2 h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" placeholder="New Password">
                    <span v-if="errors && errors.password" class="text-xs text-red-600">{{ errors.password[0]}}</span>

                    <input type="password" maxlength="10"  v-model="confirm_password" class="w-full rounded-lg h-14  mt-2 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" placeholder="Confirm Password">
                    <span v-if="errors && errors.confirm_password" class="text-xs text-red-600">{{ errors.confirm_password[0]}}</span>

                    <button @click="resetPassword" class="w-full mt-8 mt-2  bg-black text-white border-2 border-[#383838] h-12 rounded-xl text-[17px] font-medium">Reset Password</button>
                </div>
            </div>
        </div>

        <p class="px-2 py-2 mt-[10px] text-black text-xs flex items-center justify-center font-bold">
            <a title="Portfolio"  href="https://my-react-portfoliy.netlify.app/#portfolio" class="px-1 "  target="_blank" > Developed By <span class="text-red-600">Pankaj Kumar</span></a>
            <a title="Github Profile" href="https://github.com/pankajToday"  target="_blank" class="px-1">
                <svg width="16px" height="16px" viewBox="0 -0.5 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Github-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-700.000000, -560.000000)" fill="#ee3c2f"> <path d="M723.9985,560 C710.746,560 700,570.787092 700,584.096644 C700,594.740671 706.876,603.77183 716.4145,606.958412 C717.6145,607.179786 718.0525,606.435849 718.0525,605.797328 C718.0525,605.225068 718.0315,603.710086 718.0195,601.699648 C711.343,603.155898 709.9345,598.469394 709.9345,598.469394 C708.844,595.686405 707.2705,594.94548 707.2705,594.94548 C705.091,593.450075 707.4355,593.480194 707.4355,593.480194 C709.843,593.650366 711.1105,595.963499 711.1105,595.963499 C713.2525,599.645538 716.728,598.58234 718.096,597.964902 C718.3135,596.407754 718.9345,595.346062 719.62,594.743683 C714.2905,594.135281 708.688,592.069123 708.688,582.836167 C708.688,580.205279 709.6225,578.054788 711.1585,576.369634 C710.911,575.759726 710.0875,573.311058 711.3925,569.993458 C711.3925,569.993458 713.4085,569.345902 717.9925,572.46321 C719.908,571.928599 721.96,571.662047 724.0015,571.651505 C726.04,571.662047 728.0935,571.928599 730.0105,572.46321 C734.5915,569.345902 736.603,569.993458 736.603,569.993458 C737.9125,573.311058 737.089,575.759726 736.8415,576.369634 C738.3805,578.054788 739.309,580.205279 739.309,582.836167 C739.309,592.091712 733.6975,594.129257 728.3515,594.725612 C729.2125,595.469549 729.9805,596.939353 729.9805,599.18773 C729.9805,602.408949 729.9505,605.006706 729.9505,605.797328 C729.9505,606.441873 730.3825,607.191834 731.6005,606.9554 C741.13,603.762794 748,594.737659 748,584.096644 C748,570.787092 737.254,560 723.9985,560" id="Github"> </path> </g> </g> </g>
                </svg>
            </a>
            <a title="Medium Post" href="https://ankuprsdpkp.medium.com" target="_blank" class="px-1">
                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C3.79086 2 2 3.79086 2 6V18C2 20.2091 3.79086 22 6 22H18C20.2091 22 22 20.2091 22 18V6C22 3.79086 20.2091 2 18 2H6ZM4 6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V6ZM7 7C6.44772 7 6 7.44772 6 8C6 8.55228 6.44772 9 7 9V15C6.44772 15 6 15.4477 6 16C6 16.5523 6.44772 17 7 17H8H9C9.55228 17 10 16.5523 10 16C10 15.4477 9.55228 15 9 15V11.3028L11.1679 14.5547C11.3534 14.8329 11.6656 15 12 15C12.3344 15 12.6466 14.8329 12.8321 14.5547L15 11.3028V15C14.4477 15 14 15.4477 14 16C14 16.5523 14.4477 17 15 17H16H17C17.5523 17 18 16.5523 18 16C18 15.4477 17.5523 15 17 15V9C17.5523 9 18 8.55228 18 8C18 7.44772 17.5523 7 17 7H16C15.6656 7 15.3534 7.1671 15.1679 7.4453L12 12.1972L8.83205 7.4453C8.64658 7.1671 8.33435 7 8 7H7Z" fill="#f64b2c"></path> </g>
                </svg>
            </a>
        </p>

    </div>
</template>

<script>
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';

    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


export default {
    name: "Welcome",
    components:{Head},
    data(){
        return{
            errors:"",
            user_token:"",
            resetPwd:false,
            forgetPwd: false,
            logIn: true,
            username:"user",
            password:"password",
            email:"user@example.com",
            remember:"1",
            confirm_password:"password"
        }
    },
    methods:{
        Login(){
            var loginData ={
                email: this.email ,
                password: this.password,
                remember :this.remember,
            };

            var url = '/api/login';
            axios.post( url ,loginData ).then(response => {
                if( response.status === 200 &&  response.data.status === 'success' ){
                    toast.success('Login Success');
                    this.$inertia.get('/dashboard');
                }
                else
                {
                    toast.error('Login failed!');
                }
            }).catch((error) => {
                if( error.response.status == 422 ){
                    this.errors = error.response.data.errors;
                }

                toast.error('Something went wrong!');
                console.log("Error",error);
            });
        },
        forgetPassword(){
            var loginData ={
                email: this.email ,
            };

            var url = route('forgetPassword');
            axios.post( url ,loginData ).then(response => {
                this.forgetPwd = false ;
                this.resetPwd =true ;

                this.password = '';
                this.confirm_password ='';

                toast( response.data.message );

            }).catch((error) => {
                if( error.response.status == 422 ){
                    this.errors = error.response.data.errors;
                }
                console.log("Error",error);
                toast( 'Something went wrong!' );
            });
        },
        resetPassword(){
            var loginData ={
                email: this.email ,
                otp:this.otp ,
                password:this.password,
                password_confirmation: this.confirm_password,
                token: this.token
            };

            var url = route('resetPassword');
            axios.post( url ,loginData ).then(response => {
                if( response.data.status == 200 )
                {
                    this.resetPwd =false;
                    this.forgetPwd= false;
                    this.logIn= true;
                }

                toast( response.data.message );


            }).catch((error) => {
                if( error.response.status == 422 ){
                    this.errors = error.response.data.errors;
                }
                console.log("Error",error);
                toast( 'Something went wrong!' );
            });
        },
        reset(){
            this.email ='';
            this.username ='';
            this.password = '';
            this.confirm_password ='';
        }
    },
    created(){

    },
}
</script>
