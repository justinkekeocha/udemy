<script setup>
import Input1 from '../../Components/Forms/Inputs/Input1.vue';
import Button3 from '../../Components/Buttons/Button3.vue';
import { useForm } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const form = useForm({
    name: null,
    email: null,
    password: null,
})

const showPassword = ref(false)
</script>
<template>
    <Layout :title="'Sign up and start learning | ' + $page.props.appName" description="hello">

        <section class="my-10 max-w-xs mx-auto ">
            <h1 class="text-base font-UdemySansBold mb-3">Sig up and start learning</h1>
            <div class="flex flex-col gap-2">

                <form class="flex flex-col gap-2" @submit.prevent="form.post('/signup')">
                    <Input1 label="Full Name" v-model="form.name" type="text" required></Input1>
                    <Input1 label="Email" v-model="form.email" type="text" required></Input1>
                    <Input1 label="Password" v-model="form.password" :type="[showPassword ? 'text' : 'password']" required="">
                        <button type="button" class="absolute inset-y-4 right-4" @click="showPassword = !showPassword">
                            <template v-if="showPassword">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                    <path fill-rule="evenodd"
                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </template>
                            <template v-else>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M3.53 2.47a.75.75 0 00-1.06 1.06l18 18a.75.75 0 101.06-1.06l-18-18zM22.676 12.553a11.249 11.249 0 01-2.631 4.31l-3.099-3.099a5.25 5.25 0 00-6.71-6.71L7.759 4.577a11.217 11.217 0 014.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113z" />
                                    <path
                                        d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0115.75 12zM12.53 15.713l-4.243-4.244a3.75 3.75 0 004.243 4.243z" />
                                    <path
                                        d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 00-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 016.75 12z" />
                                </svg>

                            </template>
                        </button>
                    </Input1>
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