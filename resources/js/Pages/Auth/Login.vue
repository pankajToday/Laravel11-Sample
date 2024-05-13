<!--<script setup>-->
<!--import { Head, Link, useForm } from '@inertiajs/inertia-vue3';-->
<!--import AuthenticationCard from '@/Components/AuthenticationCard.vue';-->
<!--import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';-->
<!--import Checkbox from '@/Components/Checkbox.vue';-->
<!--import InputError from '@/Components/InputError.vue';-->
<!--import InputLabel from '@/Components/InputLabel.vue';-->
<!--import PrimaryButton from '@/Components/PrimaryButton.vue';-->
<!--import TextInput from '@/Components/TextInput.vue';-->

<!--defineProps({-->
<!--    canResetPassword: Boolean,-->
<!--    status: String,-->
<!--});-->

<!--const form = useForm({-->
<!--    email: '',-->
<!--    password: '',-->
<!--    remember: false,-->
<!--});-->

<!--const submit = () => {-->
<!--    form.transform(data => ({-->
<!--        ...data,-->
<!--        remember: form.remember ? 'on' : '',-->
<!--    })).post(route('login'), {-->
<!--        onFinish: () => form.reset('password'),-->
<!--    });-->
<!--};-->
<!--</script>-->

<!--<template>-->
<!--    <Head title="Log in" />-->

<!--    <AuthenticationCard>-->
<!--        <template #logo>-->
<!--            <AuthenticationCardLogo />-->
<!--        </template>-->

<!--        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">-->
<!--            {{ status }}-->
<!--        </div>-->

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <InputLabel for="email" value="Email" />-->
<!--                <TextInput-->
<!--                    id="email"-->
<!--                    v-model="form.email"-->
<!--                    type="email"-->
<!--                    class="mt-1 block w-full"-->
<!--                    required-->
<!--                    autofocus-->
<!--                />-->
<!--                <InputError class="mt-2" :message="form.errors.email" />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <InputLabel for="password" value="Password" />-->
<!--                <TextInput-->
<!--                    id="password"-->
<!--                    v-model="form.password"-->
<!--                    type="password"-->
<!--                    class="mt-1 block w-full"-->
<!--                    required-->
<!--                    autocomplete="current-password"-->
<!--                />-->
<!--                <InputError class="mt-2" :message="form.errors.password" />-->
<!--            </div>-->

<!--            <div class="block mt-4">-->
<!--                <label class="flex items-center">-->
<!--                    <Checkbox v-model:checked="form.remember" name="remember" />-->
<!--                    <span class="ml-2 text-sm text-gray-600">Remember me</span>-->
<!--                </label>-->
<!--            </div>-->

<!--            <div class="flex items-center justify-end mt-4">-->
<!--                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">-->
<!--                    Forgot your password?-->
<!--                </Link>-->

<!--                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Log in-->
<!--                </PrimaryButton>-->
<!--            </div>-->
<!--        </form>-->
<!--    </AuthenticationCard>-->
<!--</template>-->

<template>
    <div class="w-full h-screen bg-white">
        <div class="flex items-center w-full h-full">
            <div v-if="logIn" class="w-[480px] h-[420px] bg-[#030303] bg-opacity-70 mx-auto rounded-[30px] shadow-sm px-[70px] py-[30px]">
                <img alt="logo" class="mx-auto" src="https://mocha-assets.noetictechnology.com/a8d8d21e-1a15-4968-9217-fe89fb3c8d2e/project-assets/images/logo/logo.png">
                <div class="text-[21px] text-white font-normal mt-4">Login</div>
                <!--                <div class="text-[12px] font-normal">Don’t have an account? <a href="/register" class="font-semibold underline">Sign up</a></div>-->
                <div class="w-full mt-4">
                    <input type="email" class="w-full rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" placeholder="Your email">
                    <input type="password" class="w-full rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080] mt-3" placeholder="Password">
                    <div @click.prevent="logIn = false, forgetPassword = true" class="mt-3 text-white underline text-xs font-normal cursor-pointer">Forgot password?</div>
                    <button @click="redirect" class="w-full mt-8 bg-black text-white border-2 border-[#383838] h-12 rounded-xl text-[17px] font-medium">Log In</button>
                </div>
            </div>
            <div v-if="forgetPassword" class="w-[480px] h-[300px] bg-[#030303] bg-opacity-70 mx-auto rounded-[30px] shadow-sm px-[70px] py-[30px]">
<!--                <div class="text-[21px] text-white font-normal">Forgot Password</div>-->
                <div class="text-[12px] text-white font-normal">Please enter your email to get password reset link</div>
                <div class="w-full mt-6">
                    <input type="email" class="w-full rounded-lg h-14 bg-white border border-[#535353] focus:outline-none text-sm font-normal text-black placeholder-[#808080]" placeholder="Your email">
                    <button class="w-full mt-8 bg-black text-white border-2 border-[#383838] h-12 rounded-xl text-[17px] font-medium">Send Reset link</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return{
            forgetPassword: false,
            logIn: true,
        }
    },
    methods:{
        redirect(){
            window.open('/dashboard', '_self')
        }
    }
}
</script>
