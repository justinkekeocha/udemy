<script setup>
import Input1 from '../../Components/Forms/Inputs/Input1.vue';
import Button3 from '../../Components/Buttons/Button3.vue';

</script>
<template>
    <Layout :title="'Log in and start learning | ' + $page.props.appName" description="hello">
        <section class="my-10 max-w-xs mx-auto ">
            <h1 class="text-base font-UdemySansBold mb-3">Log in to your {{ $page.props.appName }} account</h1>
            <div class="flex flex-col gap-2">
                <Button1 class="w-full !font-black !text-black !text-base !mb-0">
                    <div class="flex items-center gap-4">
                        <!--https://icons8.com/icon/set/google/color-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-6 h-6">
                            <path fill="#FFC107"
                                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                            <path fill="#FF3D00"
                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                            <path fill="#4CAF50"
                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                            <path fill="#1976D2"
                                d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                        </svg>
                        <span class="font-UdemySansBold"> Continue with Google</span>
                    </div>
                </Button1>

                <Button1 class="w-full !font-black !text-black !text-base !mb-0">
                    <div class="flex items-center gap-2">
                        <!--https://icons8.com/icon/set/google/color-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8">
                            <path fill="#4267b2" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z" />
                            <path fill="#fff"
                                d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z" />
                        </svg>
                        <span class="font-UdemySansBold"> Continue with Facebook</span>
                    </div>
                </Button1>
                <Button1 class="w-full !font-black !text-black !text-base !mb-0">
                    <div class="flex items-center gap-2">
                        <!--https://icons8.com/icon/set/google/color-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8">
                            <path fill="#000"
                                d="M40.084,32.613c-0.848,1.835-1.254,2.655-2.342,4.274c-1.521,2.264-3.67,5.089-6.326,5.109c-2.361,0.018-2.971-1.507-6.176-1.482c-3.204,0.016-3.872,1.51-6.237,1.484c-2.654-0.022-4.688-2.568-6.21-4.826c-4.259-6.34-4.707-13.768-2.076-17.721c1.861-2.803,4.807-4.449,7.572-4.449c2.817,0,4.588,1.514,6.916,1.514c2.262,0,3.638-1.517,6.896-1.517c2.464,0,5.07,1.313,6.931,3.575C32.942,21.836,33.931,30.337,40.084,32.613z" />
                            <path fill="#000"
                                d="M30.046,12.072c1.269-1.577,2.232-3.804,1.882-6.072c-2.069,0.138-4.491,1.418-5.905,3.075c-1.282,1.51-2.345,3.752-1.931,5.922C26.351,15.066,28.689,13.764,30.046,12.072z" />
                            <path fill="#000"
                                d="M36.736,20.421C28,30.001,20,21.001,9.228,27.842c0.375,3.027,1.53,6.303,3.565,9.331c1.521,2.258,3.556,4.804,6.21,4.826c2.365,0.025,3.033-1.469,6.237-1.484c3.205-0.024,3.814,1.5,6.176,1.482c2.656-0.021,4.805-2.846,6.326-5.109c1.088-1.619,1.494-2.439,2.342-4.274C34.878,30.688,33.389,24.314,36.736,20.421z" />
                        </svg>
                        <span class="font-UdemySansBold"> Continue with Apple</span>
                    </div>
                </Button1>
                <form class="flex flex-col gap-2">
                    <Input1 label="Email"></Input1>
                    <Input1 label="Password"></Input1>
                    <Button3 class="mt-2" type="submit">Go to cart</Button3>
                </form>
                <p class="text-center">or
                    <Link href="#" class="underline text-violet-700 font-UdemySansBold">Forgot Password</Link>
                </p>
                <hr>
                <p class="text-center">Don't have an account?
                    <Link :href="route('signup')" class="underline text-violet-700 font-UdemySansBold">Sign up</Link>
                </p>
                <p class="text-center">or
                    <Link href="#" class="underline text-violet-700 font-UdemySansBold">Forgot Password</Link>
                </p>
            </div>


        </section>
    </Layout>
</template>