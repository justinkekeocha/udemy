<template>
    <footer class="bg-zinc-900 text-white pt-10 px-12 text-sm">
        <div class="container mx-auto mb-12">
            <div class="grid grid-cols-12">
                <div class="col-span-12 md:col-span-3">
                    <div class="flex flex-col gap-y-2">
                        <p>
                            <Link href="#" class="hover:underline">{{ $page.props.appName }} Business</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">Teach on Udemy</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">Get the app</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">About us</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">
                            Contact us</Link>
                        </p>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3">
                    <div class="flex flex-col gap-y-2">
                        <p>
                            <Link href="#" class="hover:underline">Careers</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">Blog</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">Help and support</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">Affliate</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">
                            Investors</Link>
                        </p>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3">
                    <div class="flex flex-col gap-y-2">
                        <p>
                            <Link href="#" class="hover:underline">Terms</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">Privacy policy</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">Cookie settings</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">Sitemap</Link>
                        </p>
                        <p>
                            <Link href="#" class="hover:underline">
                            Accessibility statement</Link>
                        </p>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3 md:justify-self-end">
                    <button class="border border-white min-w-[9rem] px-3 py-2 text-base">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 stroke-2 me-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                            </svg>
                            <span>English</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex justify-between py-8 text-sm">
            <Link href="#">
            <img src="../../../public/assets/img/logo-udemy-inverted.svg" class="h-8" />
            </Link>
            <span class="text-xs">© 2023 Udemy, Inc.</span>
        </div>
    </footer>
</template>