<template>
    <div class="w-full h-screen bg-white">
        <div class="flex items-center w-full h-full">
            <div class="w-[480px] h-[420px] bg-[#030303] bg-opacity-70 mx-auto rounded-[30px] shadow-sm px-[70px] py-[30px]">
                <img alt="logo" class="mx-auto" src="https://tinyurl.com/2pwl3wu7">
                <div class="text-[21px] text-white font-normal mt-4">Login</div>
                <!--<div class="text-[12px] font-normal">Don’t have an account?
                    <a href="/register" class="font-semibold underline">Sign up</a></div>-->
                <div class="w-full mt-4">
                    <input v-model="username" type="email" class="w-full rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" maxlength="40" placeholder="Your email">
                    <span v-if="errors && errors.email" class="text-xs text-white">Error : {{ errors.email[0]}}</span>

                    <input v-model="password" type="password" class="w-full mt-2 rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" placeholder="New Password">
                    <span v-if="errors && errors.email" class="text-xs text-white">Error : {{ errors.email[0]}}</span>

                    <input v-model="password_confirmation"  type="password" class="w-full mt-2 rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080] mt-3" placeholder="Confirm Password">
                    <span v-if="errors && errors.email" class="text-xs text-white">Error : {{ errors.email[0]}}</span>

                    <button @click="updatePassword" class="w-full mt-4 mb-8 bg-green border-2 border-[#383838] h-12 rounded-xl text-[17px] font-medium">Reset Password</button>

                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import Swal from "sweetalert2";
    import 'sweetalert2/dist/sweetalert2.min.css';

    export default {
        name: "ResetPassword",
        props:['data'],
        data(){
            return{
                errors:null,
                errorsMsg:null,
                username:"",
                password:'',
                password_confirmation:"",
                resetPassword:"",
                logIn:"",
            }
        },
        methods:{
            updatePassword(){
                var loginData ={
                    password:this.password,
                    password_confirmation:this.password_confirmation,
                    email:this.data.email,
                    token: this.data.token
                };

                var url = route('resetPassword');
                axios.post( url ,loginData ).then(response => {
                    if( response.data.status == 200 )
                    {
                        this.$inertia.get('/')
                    }
                    Swal.fire({
                        position: 'center',
                        icon: response.data.status == 200?'success':'error',
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }).catch((error) => {
                    if(error.response)
                    {
                        if( error.response.status == 422 ){
                            this.errors = error.response.data.errors;
                        }
                    }
                    console.log("Error",error);
                });
            },
        },
        created(){
            this.username = this.data.email;
            console.log(this.data)
        }

    }
</script>

<style scoped>

</style>
