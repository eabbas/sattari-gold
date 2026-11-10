<footer
    class="w-full bg-[url({{ asset('assets/img/footer.webp') }})] bg-cover bg-center mt-20 flex justify-center items-start relative max-lg:pb-23 max-sm:pb-20">
    <div class="w-full h-full absolute top-0 right-0 bg-[#5B3E14]/90"></div>
    <div class="2xl:container w-11/12 2xl:w-11/12 mx-auto h-full z-1">
        <div class="flex max-md:flex-col max-md:gap-8 justify-between items-start py-7">
            <div class="md:w-3/12 w-full flex">
                <div class="w-full h-full flex flex-col lg:gap-6 gap-4 justify-start max-lg:items-center items-start">
                    <div class="w-full flex flex-col lg:gap-6 gap-4 justify-start items-start ">
                        <div href="#" class="w-full flex justify-center items-center">
                            @if ($logo)
                                <a href="{{ route($logo->link) }}">
                                    <img src="{{ asset('storage/' . $logo->logo) }}" class="lg:w-20 w-15"
                                        alt="">
                                </a>
                            @endif
                        </div>
                        <p
                            class="w-full xl:text-sm lg:text-xs text-[11px] font-bold text-[#f4f1ff] max-lg:text-center leading-[22px]">
                            ستاری گلد، همراه شما در سرمایه‌گذاری هوشمندانه طلا و خرید زیورآلات زیبا و ارزشمند، با
                            تجربه‌ای آسان، شفاف و مطمئن.
                        </p>
                    </div>
                </div>
            </div>
            <div class="md:w-8/12 w-full h-full flex flex-col gap-4 justify-start items-start">
                <div class="w-full flex flex-col gap-10 sm:flex-row sm:justify-start sm:items-start">
                    <div class="w-full sm:w-1/3 flex flex-col gap-2 justify-start md:items-start">
                        <h4 class="lg:text-lg max-md:text-sm text-white font-bold">دسترسی سریع</h4>
                        <ul
                            class="max-lg:text-sm max-md:text-xs flex flex-col gap-1 justify-start md:items-start text-(--text-muted) font-bold">
                            <li>
                                <a href="{{ route('home') }}">خانه</a>
                            </li>
                            <li>
                                <a href="{{ route('product.index') }}">محصولات</a>
                            </li>
                            <li>
                                <a href="{{ route('aboutUs') }}">درباره ما</a>
                            </li>
                            <li>
                                <a href="{{ route('contactUs') }}">ارتباط با ما</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full sm:w-1/3 flex flex-col gap-2 justify-start md:items-start">
                        <h4 class="lg:text-lg max-md:text-sm text-white font-bold">دسته بندی محصولات</h4>
                        <ul
                            class="max-lg:text-sm flex flex-col gap-1 justify-start md:items-start text-(--text-muted) font-bold">
                            @foreach ($categories as $category)
                                <a href="{{ route('search.relatedProducts', [$category]) }}">
                                    {{ $category->title }}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-full sm:w-1/3 flex flex-col gap-2 justify-start md:items-start">
                        <h4 class="lg:text-lg max-md:text-sm text-white font-bold">نشانی ما</h4>
                        <ul
                            class="max-lg:text-sm flex flex-col gap-2 justify-start items-start text-(--text-muted) font-bold">
                            <li>بناب راسته بازار تیمچه اول پلاک 112</li>
                            <li>
                                <div class="w-full flex items-center justify-center gap-2">
                                    <a href="" class="p-1 bg-white rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="xl:size-5 size-4 fill-(--gold-primary)">
                                            <path
                                                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="" class="p-1 bg-white rounded-full">
                                        <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                            class="xl:size-5 size-4 fill-(--gold-primary)">
                                            <path
                                                d="M1764 11q33 24 27 64l-256 1536q-5 29-32 45-14 8-31 8-11 0-24-5l-527-215-298 327q-18 21-47 21-14 0-23-4-19-7-30-23.5t-11-36.5v-452l-472-193q-37-14-40-55-3-39 32-59l1664-960q35-21 68 2zm-342 1499l221-1323-1434 827 336 137 863-639-478 797z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="" class="p-1 bg-white rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="xl:size-5 size-4 fill-(--gold-primary)">
                                            <path
                                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <span class="w-full h-2 bg-red-500 rounded-full"></span>
        <div class="w-full flex flex-col gap-3 justify-between items-center max-lg:text-sm max-md:text-xs">
            <p class="text-(--text-muted)">طراحی و توسعه شرکت اندیشه گران طراحان دیجیتال <span
                    class="text-white font-bold">(فائوس)</span></p>
            <a href="tel:09147794595" class=" text-white font-bold">09147794595</a>
        </div>
    </div>
</footer>



<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="{{ asset('assets/js/cart.js') }}"></script>
</body>

</html>
