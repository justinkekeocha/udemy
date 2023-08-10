<script setup>
import Input1 from '../../Components/Forms/Inputs/Input1.vue';
import Button3 from '../../Components/Buttons/Button3.vue';

</script>
<template>
    <Layout :title="'Sign up and start learning | ' + $page.props.appName" description="hello">
        <section class="my-10 max-w-xs mx-auto ">
            <h1 class="text-base font-UdemySansBold mb-3">Sig up and start learning</h1>
            <div class="flex flex-col gap-2">

                <form class="flex flex-col gap-2">
                    <Input1 label="Email"></Input1>
                    <Input1 label="Password"></Input1>
                    <div class="flex items-center gap-1 my-2">
                        <div class="rounded bg-gray-300 h-1 w-12"></div>
                        <div class="rounded bg-gray-300 h-1 w-12"></div>
                        <div class="rounded bg-gray-300 h-1 w-12"></div>
                        <div class="rounded bg-gray-300 h-1 w-12"></div>
                    </div>
                    <div class="flex">
                        <input type="checkbox" value=""
                            class="w-4 h-4 text-black bg-gray-100 border-2 border-black focus:ring-0">
                        <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Send me
                            special offers, personalized recommendations, and learning tips</label>
                    </div>
                    <Button3 class="mt-2" type="submit">Sign up</Button3>
                </form>
                <p class="text-xs">By sigining up, you agree to our
                    <Link class="underline" href="#">terms of use</Link> and
                    <Link class="underline" href="#">
                    privacy policy
                    </Link>
                </p>
                <hr>
                <p class="text-center text-sm">Already have an account?
                    <Link :href="route('login')" class="underline text-violet-700 font-UdemySansBold">Login</Link>
                </p>
            </div>


        </section>
    </Layout>
</template>