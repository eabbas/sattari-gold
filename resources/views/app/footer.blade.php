<footer class="relative w-full mt-20 bg-[#211B12] text-white overflow-hidden max-lg:pb-20">

    <!-- Decorative Background -->
    <div class="absolute inset-0 opacity-[0.06] pointer-events-none"
        style="background-image: url('{{ asset('assets/img/footer.webp') }}'); background-size: cover; background-position: center;">
    </div>

    <div class="relative z-10 w-11/12 2xl:container mx-auto">

        <!-- Main Footer -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 py-14">

            <!-- Brand -->
            <div class="lg:col-span-4 flex flex-col gap-5 max-sm:items-center">

                @if ($logo)
                    <a href="{{ route($logo->link) }}" class="inline-flex items-center">
                        <img src="{{ asset('storage/' . $logo->logo) }}" class="w-20 object-contain" alt="ستاری گلد">
                    </a>
                @endif

                <div class="flex flex-col gap-3 max-sm:text-center">
                    <h3 class="text-lg font-bold text-[#E3BC72]">
                        ستاری گلد
                    </h3>

                    <p class="text-sm leading-8 text-[#C7BDAE] max-w-sm">
                        ستاری گلد، همراه شما در سرمایه‌گذاری هوشمندانه طلا
                        و خرید زیورآلات زیبا و ارزشمند، با تجربه‌ای آسان،
                        شفاف و مطمئن.
                    </p>
                </div>
            </div>


            <!-- Quick Links -->
            <div class="lg:col-span-2 flex flex-col gap-5">

                <h4 class="font-bold text-base text-[#E3BC72]">
                    دسترسی سریع
                </h4>

                <ul class="flex flex-col gap-4 text-sm text-[#C7BDAE]">

                    <li>
                        <a href="{{ route('home') }}" class="hover:text-[#E3BC72] transition-colors">
                            خانه
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('product.index') }}" class="hover:text-[#E3BC72] transition-colors">
                            محصولات
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('aboutUs') }}" class="hover:text-[#E3BC72] transition-colors">
                            درباره ما
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contactUs') }}" class="hover:text-[#E3BC72] transition-colors">
                            ارتباط با ما
                        </a>
                    </li>

                </ul>
            </div>


            <!-- Categories -->
            <div class="lg:col-span-3 flex flex-col gap-5">

                <h4 class="font-bold text-base text-[#E3BC72]">
                    دسته‌بندی محصولات
                </h4>

                <ul class="grid grid-cols-2 sm:grid-cols-1 gap-x-3 gap-y-4 text-sm text-[#C7BDAE]">

                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('search.relatedProducts', [$category]) }}"
                                class="hover:text-[#E3BC72] transition-colors">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>


            <!-- Contact -->
            <div class="lg:col-span-3 flex flex-col gap-5">

                <h4 class="font-bold text-base text-[#E3BC72]">
                    راه‌های ارتباطی
                </h4>

                <ul class="flex flex-col gap-5 text-sm text-[#C7BDAE]">

                    <li class="flex items-center gap-3">

                        <span
                            class="w-9 h-9 shrink-0 rounded-lg bg-[#C9A45C]/10 flex items-center justify-center text-[#E3BC72]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3.09 5.18 2 2 0 0 1 5.08 3h3a2 2 0 0 1 2 1.72c.12.96.36 1.9.7 2.79a2 2 0 0 1-.45 2.11L9.06 10.9a16 16 0 0 0 4.04 4.04l1.27-1.27a2 2 0 0 1 2.11-.45c.89.34 1.83.58 2.79.7a2 2 0 0 1 1.73 2Z" />
                            </svg>
                        </span>

                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#A99B85]">تلفن تماس</span>
                            <a href="tel:09123456789" dir="ltr"
                                class="font-bold hover:text-[#E3BC72] transition-colors">
                                09123456789
                            </a>
                        </div>

                    </li>


                    <li class="flex items-center gap-3">

                        <span
                            class="w-9 h-9 shrink-0 rounded-lg bg-[#C9A45C]/10 flex items-center justify-center text-[#E3BC72]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="m22 7-9 6a2 2 0 0 1-2 0L2 7" />
                            </svg>
                        </span>

                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#A99B85]">ایمیل</span>
                            <a href="mailto:test@example.com" dir="ltr"
                                class="font-bold hover:text-[#E3BC72] transition-colors">
                                test@example.com
                            </a>
                        </div>

                    </li>


                    <li class="flex items-start gap-3">

                        <span
                            class="w-9 h-9 shrink-0 rounded-lg bg-[#C9A45C]/10 flex items-center justify-center text-[#E3BC72]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" />
                                <circle cx="12" cy="10" r="2.5" />
                            </svg>
                        </span>

                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#A99B85]">نشانی</span>
                            <span class="leading-7">
                                تهران، خیابان ولیعصر، پلاک 75
                            </span>
                        </div>

                    </li>

                </ul>

            </div>

        </div>


        <!-- Footer Bottom -->
        <div
            class="border-t border-white/10 py-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-center">

            <p class="text-xs sm:text-sm text-[#A99B85]">
                طراحی و توسعه توسط شرکت اندیشه گران طراحان دیجیتال
                <span class="text-[#E3BC72] font-bold">(فائوس)</span>
            </p>

            <a href="tel:09147794595" class="text-sm font-bold text-[#E3BC72] hover:text-white transition-colors"
                dir="ltr">
                09147794595
            </a>

            <p class="text-xs text-[#817665]">
                © تمامی حقوق محفوظ است.
            </p>

        </div>

    </div>
</footer>


<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/cart.js') }}"></script>

</body>

</html>
