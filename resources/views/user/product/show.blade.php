@extends('app.document')
@section('title')
    ستاری گلد | {{ $product['title'] }}
@endsection
@section('content')
    <main class="max-w-[1700px] mx-auto mb-50">
        <!-- ادرس -->
        <section class="w-11/12 mx-auto mt-20">
            <a href="" class="cursor-pointer text-sm text-(--color-text-muted)">خانه</a>
            <span class="cursor-pointer text-sm text-(--color-text-muted)">/</span>
            <a href="" class="cursor-pointer text-sm text-(--color-text-muted)">محصولات</a>
            <span class="cursor-pointer text-sm text-(--color-text-muted)">/</span>
            <a href="" class="cursor-pointer text-sm text-(--color-text-muted)">{{ $product->title }}</a>
        </section>
        <!-- عکس و قسمت -->
        <section class="w-11/12 mx-auto flex flex-col lg:flex-row items-center justify-between mt-10">
            <!-- عکس محصول -->
            <div class="w-full lg:w-4/12">
                <div class="flex flex-col items-center">
                    <div class="w-full flex items-center justify-center">
                        <img id="product-image" src="{{ asset('storage/' . $product->mainImg) }}" alt=""
                            class="w-full min-h-60  md:min-h-115 max-w-115 max-h-88 sm:max-h-100 md:max-h-115 object-cover rounded-lg">
                    </div>
                    <div
                        class="flex justify-start gap-x-2 mt-4 pb-4 overflow-x-auto [&::-webkit-scrollbar]:w-[2px] [&::-webkit-scrollbar-thumb]:bg-(--color-primary-500) [&::-webkit-scrollbar-thumb]:rounded-full">
                        @foreach ($product->media as $media)
                            <img onclick="changeImage('{{ asset('storage/' . $media->media_path) }}')"
                                src="{{ asset('storage/' . $media->media_path) }}"
                                class="w-20 md:w-23 h-20 md:h-23 border-2 border-(--color-zinc-200) rounded-md opacity-70 hover:opacity-100 hover:border-(--color-zinc-300)"
                                alt="img product">
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- توضیحات و قیمت -->
            <div class="w-full lg:w-8/12 flex items-center justify-between gap-5 lg:gap-1">
                <div class="w-full lg:w-8/12 lg:px-8 py-6">
                    <!-- عنوان -->
                    <div class="w-full flex flex-col items-center justify-center gap-2">
                        <!-- عنوان اصلی -->
                        <h2 class="text-3xl md:text-5xl text-(--color-text) font-bold cursor-default mb-8">
                            {{ $product->title }}</h2>
                        <!-- توضیح عنوان -->
                        <h5 class="text-sm md:text-base text-(--color-text-secondary) cursor-default">عیار999.9 | بانکی و
                            استاندارد جهانی</h5>
                        <!-- نظر -->
                        <div class="flex items-center justify-center gap-3 cursor-default">
                            <span class="flex gap-[1px]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="size-3 md:size-4 fill-(--color-primary)">
                                    <path class="fa-secondary"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    <path class="fa-primary" d="" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="size-3 md:size-4 fill-(--color-primary)">
                                    <path class="fa-secondary"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    <path class="fa-primary" d="" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="size-3 md:size-4 fill-(--color-primary)">
                                    <path class="fa-secondary"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    <path class="fa-primary" d="" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="size-3 md:size-4 fill-(--color-primary)">
                                    <path class="fa-secondary"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    <path class="fa-primary" d="" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="size-3 md:size-4 fill-(--color-primary)">
                                    <path class="fa-secondary"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    <path class="fa-primary" d="" />
                                </svg>
                            </span>
                            <span class="text-sm text-(--color-text-secondary)">|</span>
                            <span class="text-xs text-(--color-text-secondary)">(4.8) 555.254</span>
                        </div>
                    </div>
                    <div class="w-full flex flex-col items-start justify-start mt-5 cursor-default gap-5">
                        @if ($product['primary_price'])
                            @if ($product['secondary_price'])
                                <div class="flex flex-col items-start gap-2 text-end">
                                    <span
                                        class="text-gray-400 font-bold line-through">{{ $product['primary_price'] }}</span>
                                    <div class="text-(--color-primary) font-bold hidden md:flex gap-3">
                                        <span class="cursor-default text-4xl">{{ $product->secondary_price }}</span>
                                        <span class="cursor-default text-3xl">تومان</span>
                                    </div>
                                </div>
                            @else
                                <div class="text-(--color-primary) font-bold hidden md:flex gap-3">
                                    <span class="cursor-default text-4xl">{{ $product->primary_price }}</span>
                                    <span class="cursor-default text-3xl">تومان</span>
                                </div>
                            @endif
                        @else
                            <span class="text-(--color-primary) font-bold text-xl">برای استعلام قیمت تماس
                                بگیرید</span>
                        @endif
                        <div class="text-base text-(--color-text-secondary) flex gap-1">
                            <span class="flex items-center gap-1">
                                <span>
                                    <svg class="size-4 fill-(--color-success)" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M244 130.6l-12-13.5-4.2-4.7c-26-29.2-65.3-42.8-103.8-35.8c-53.3 9.7-92 56.1-92 110.3v3.5c0 32.3 13.4 63.1 37.1 85.1L253 446.8c.8 .7 1.9 1.2 3 1.2s2.2-.4 3-1.2L443 275.5c23.6-22 37-52.8 37-85.1v-3.5c0-54.2-38.7-100.6-92-110.3c-38.5-7-77.8 6.6-103.8 35.8l-4.2 4.7-12 13.5c-3 3.4-7.4 5.4-12 5.4s-8.9-2-12-5.4zm34.9-57.1C311 48.4 352.7 37.7 393.7 45.1C462.2 57.6 512 117.3 512 186.9v3.5c0 36-13.1 70.6-36.6 97.5c-3.4 3.8-6.9 7.5-10.7 11l-184 171.3c-.8 .8-1.7 1.5-2.6 2.2c-6.3 4.9-14.1 7.5-22.1 7.5c-9.2 0-18-3.5-24.8-9.7L47.2 299c-3.8-3.5-7.3-7.2-10.7-11C13.1 261 0 226.4 0 190.4v-3.5C0 117.3 49.8 57.6 118.3 45.1c40.9-7.4 82.6 3.2 114.7 28.4c6.7 5.3 13 11.1 18.7 17.6l4.2 4.7 4.2-4.7c4.2-4.7 8.6-9.1 13.3-13.1c1.8-1.5 3.6-3 5.4-4.5z" />
                                    </svg>
                                </span>
                                <span>قیمت هر گرم : </span>
                            </span>
                            <span class="text-xl text-(--color-primary) md:text-base md:text-(--color-text-secondary)">
                                24.230.000 </span>
                            <span class="">تومان</span>
                        </div>
                        <div class="flex items-center gap-1 px-3 py-1 bg-(--color-success)/10 rounded-full mt-3">
                            <span class="">
                                <svg class="size-3 fill-(--color-success)" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M244 130.6l-12-13.5-4.2-4.7c-26-29.2-65.3-42.8-103.8-35.8c-53.3 9.7-92 56.1-92 110.3v3.5c0 32.3 13.4 63.1 37.1 85.1L253 446.8c.8 .7 1.9 1.2 3 1.2s2.2-.4 3-1.2L443 275.5c23.6-22 37-52.8 37-85.1v-3.5c0-54.2-38.7-100.6-92-110.3c-38.5-7-77.8 6.6-103.8 35.8l-4.2 4.7-12 13.5c-3 3.4-7.4 5.4-12 5.4s-8.9-2-12-5.4zm34.9-57.1C311 48.4 352.7 37.7 393.7 45.1C462.2 57.6 512 117.3 512 186.9v3.5c0 36-13.1 70.6-36.6 97.5c-3.4 3.8-6.9 7.5-10.7 11l-184 171.3c-.8 .8-1.7 1.5-2.6 2.2c-6.3 4.9-14.1 7.5-22.1 7.5c-9.2 0-18-3.5-24.8-9.7L47.2 299c-3.8-3.5-7.3-7.2-10.7-11C13.1 261 0 226.4 0 190.4v-3.5C0 117.3 49.8 57.6 118.3 45.1c40.9-7.4 82.6 3.2 114.7 28.4c6.7 5.3 13 11.1 18.7 17.6l4.2 4.7 4.2-4.7c4.2-4.7 8.6-9.1 13.3-13.1c1.8-1.5 3.6-3 5.4-4.5z" />
                                </svg>
                            </span>
                            <span class="text-sm text-(--color-success)">قیمت لحظه‌ ای</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="flex items-center gap-1">
                                <span class="">
                                    <svg class="size-3 fill-(--color-success)" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M244 130.6l-12-13.5-4.2-4.7c-26-29.2-65.3-42.8-103.8-35.8c-53.3 9.7-92 56.1-92 110.3v3.5c0 32.3 13.4 63.1 37.1 85.1L253 446.8c.8 .7 1.9 1.2 3 1.2s2.2-.4 3-1.2L443 275.5c23.6-22 37-52.8 37-85.1v-3.5c0-54.2-38.7-100.6-92-110.3c-38.5-7-77.8 6.6-103.8 35.8l-4.2 4.7-12 13.5c-3 3.4-7.4 5.4-12 5.4s-8.9-2-12-5.4zm34.9-57.1C311 48.4 352.7 37.7 393.7 45.1C462.2 57.6 512 117.3 512 186.9v3.5c0 36-13.1 70.6-36.6 97.5c-3.4 3.8-6.9 7.5-10.7 11l-184 171.3c-.8 .8-1.7 1.5-2.6 2.2c-6.3 4.9-14.1 7.5-22.1 7.5c-9.2 0-18-3.5-24.8-9.7L47.2 299c-3.8-3.5-7.3-7.2-10.7-11C13.1 261 0 226.4 0 190.4v-3.5C0 117.3 49.8 57.6 118.3 45.1c40.9-7.4 82.6 3.2 114.7 28.4c6.7 5.3 13 11.1 18.7 17.6l4.2 4.7 4.2-4.7c4.2-4.7 8.6-9.1 13.3-13.1c1.8-1.5 3.6-3 5.4-4.5z" />
                                    </svg>
                                </span>
                                <span class="text-(--color-text-secondary) text-sm">اخرین بروزرسانی : </span>
                            </span>
                            <span class="text-(--color-text-secondary) text-sm">1404/7/7_14:32</span>
                        </div>
                        <div class="w-full flex items-center justify-between mt-3">
                            <div class="">تعداد : </div>
                            <div
                                class="w-38 flex items-center justify-between border-1 border-(--color-border-gold) rounded-xl shadow-1">
                                <button onclick="increaseValue()"
                                    class="w-10 h-10 rounded-full bg-(--color-primary-light)/30 flex items-center justify-center shadow">
                                    <svg class="size-5 fill-(--color-primary)" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z">
                                        </path>
                                    </svg>
                                </button>
                                <input class="w-13" maxlength="10" minlength="0" type="number" name=""
                                    id="numberInput" disabled value="0">
                                <button onclick="decreaseValue()"
                                    class="w-10 h-10 rounded-full bg-(--color-primary-light)/30 flex items-center justify-center shadow">
                                    <svg class="size-5 fill-(--color-primary)" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M432 256c0 13.3-10.7 24-24 24L40 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l368 0c13.3 0 24 10.7 24 24z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button
                            class="w-full bg-[image:var(--gradient-gold)] cursor-pointer hidden md:flex items-center justify-between px-5 py-3 rounded-md">
                            <span></span>
                            <span class="text-(--color-text-inverse)">افزودن به سبد خرید</span>
                            <span></span>
                        </button>
                        <div class="w-full cursor-pointer">
                            <input type="checkbox" name="love" id="1" class="hidden peer" required>
                            <label for="1"
                                class="flex items-center justify-center gap-3 py-3 px-2 border-2 border-(--color-zinc-300) rounded-2xl cursor-pointer peer-checked:bg-(--color-danger)/10 peer-checked:border-(--color-danger) peer-checked:text-(--color-danger)">
                                <svg class="size-4" stroke="currentColor" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path stroke="currentColor" fill="currentColor"
                                        d="M244 130.6l-12-13.5-4.2-4.7c-26-29.2-65.3-42.8-103.8-35.8c-53.3 9.7-92 56.1-92 110.3v3.5c0 32.3 13.4 63.1 37.1 85.1L253 446.8c.8 .7 1.9 1.2 3 1.2s2.2-.4 3-1.2L443 275.5c23.6-22 37-52.8 37-85.1v-3.5c0-54.2-38.7-100.6-92-110.3c-38.5-7-77.8 6.6-103.8 35.8l-4.2 4.7-12 13.5c-3 3.4-7.4 5.4-12 5.4s-8.9-2-12-5.4zm34.9-57.1C311 48.4 352.7 37.7 393.7 45.1C462.2 57.6 512 117.3 512 186.9v3.5c0 36-13.1 70.6-36.6 97.5c-3.4 3.8-6.9 7.5-10.7 11l-184 171.3c-.8 .8-1.7 1.5-2.6 2.2c-6.3 4.9-14.1 7.5-22.1 7.5c-9.2 0-18-3.5-24.8-9.7L47.2 299c-3.8-3.5-7.3-7.2-10.7-11C13.1 261 0 226.4 0 190.4v-3.5C0 117.3 49.8 57.6 118.3 45.1c40.9-7.4 82.6 3.2 114.7 28.4c6.7 5.3 13 11.1 18.7 17.6l4.2 4.7 4.2-4.7c4.2-4.7 8.6-9.1 13.3-13.1c1.8-1.5 3.6-3 5.4-4.5z" />
                                </svg>
                                <span class="text-(--color-text) text-base">افزودن به علاقه مندی</span>
                            </label>
                        </div>
                        <div
                            class="fixed bottom-0 left-1/2 -translate-x-1/2 z-50 flex items-center justify-between md:hidden bg-white w-full h-20 px-5 gap-2">
                            <button
                                class="w-[50%] bg-[image:var(--gradient-gold)] cursor-pointer flex items-center justify-between py-3 rounded-md">
                                <span></span>
                                <span class="text-(--color-text-inverse)">افزودن به سبد خرید</span>
                                <span></span>
                            </button>
                            <div class="text-(--color-primary) font-bold">
                                <span class="cursor-default text-lg sm:text-2xl">28.550.000</span>
                                <span class="cursor-default text-base sm:text-xl">تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full lg:w-4/12 bg-(--color-primary)/5 border-1 border-(--color-border-gold) rounded-lg  hidden md:flex flex-col items-center overflow-hidden">
                    <div class="w-full flex items-center gap-1 bg-gradient-to-l from-(--color-primary-light) via-inherit">
                        <img class="w-33" src="{{ asset('assets/img/gold.webp') }}" alt="">
                        <div class="flex flex-col gap-3">
                            <span class="text-lg font-bold">چرا شمش طلای 10 گرمی؟</span>
                            <span class="text-[14px] text-(--color-text-secondary) line-clamp-2">طلا مطمعن برای سرمایه
                                گذاری و پس‌انداز</span>
                        </div>
                    </div>
                    <span class="w-full h-[1px] bg-gradient-to-r via-(--color-primary) to-(--color-primary)"></span>
                    <div class="w-full px-8 py-8 flex items-center justify-between">
                        <div class="flex flex-col gap-3">
                            <span class="text-lg font-bold">عیار999.9</span>
                            <span class="text-[14px] text-(--color-text-secondary) line-clamp-2">طلای خاص با
                                استاندارد</span>
                        </div>
                        <div
                            class="w-14 h-14 flex items-center justify-center shadow text-(--color-primary) rounded-full bg-(--color-bg)">
                            <svg class="size-9" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 512 512">
                                <path
                                    d="M73 127L256 49.4 439 127c5.9 2.5 9.1 7.8 9 12.8c-.4 91.4-38.4 249.3-186.3 320.1c-3.6 1.7-7.8 1.7-11.3 0C102.4 389 64.5 231.2 64 139.7c0-5 3.1-10.2 9-12.8zM457.7 82.8L269.4 2.9C265.2 1 260.7 0 256 0s-9.2 1-13.4 2.9L54.3 82.8c-22 9.3-38.4 31-38.3 57.2c.5 99.2 41.3 280.7 213.6 363.2c16.7 8 36.1 8 52.8 0C454.8 420.7 495.5 239.2 496 140c.1-26.2-16.3-47.9-38.3-57.2zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                            </svg>
                        </div>
                    </div>
                    <span class="w-full h-[1px] bg-gradient-to-r via-(--color-primary)"></span>
                    <div class="w-full px-8 py-8 flex items-center justify-between">
                        <div class="flex flex-col gap-3">
                            <span class="text-lg font-bold">وزن استاندارد 10 گرم</span>
                            <span class="text-[14px] text-(--color-text-secondary) line-clamp-2">مناسب برای خرید در مقیاس
                                کوچک</span>
                        </div>
                        <div
                            class="w-14 h-14 flex items-center justify-center shadow text-(--color-primary) rounded-full bg-(--color-bg)">
                            <svg class="size-9" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512">
                                <path
                                    d="M520 48H393.3C381 19.7 352.8 0 320 0s-61 19.7-73.3 48H120c-13.3 0-24 10.7-24 24s10.7 24 24 24H241.6c5.8 28.6 26.9 51.7 54.4 60.3V464H120c-13.3 0-24 10.7-24 24s10.7 24 24 24H320 520c13.3 0 24-10.7 24-24s-10.7-24-24-24H344V156.3c27.5-8.6 48.6-31.7 54.4-60.3H520c13.3 0 24-10.7 24-24s-10.7-24-24-24zm-8 147.8L584.4 320H439.6L512 195.8zM386 337.1C396.8 382 449.1 416 512 416s115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L536.1 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L392.7 305.1c-5.7 9.8-9.3 21.1-6.7 32.1zM54.4 320l72.4-124.2L199.3 320H54.4zm72.4 96c62.9 0 115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L150.9 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L7.6 305.1c-5.7 9.8-9.3 21.1-6.7 32.1C11.7 382 64 416 126.8 416zM320 48a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                        </div>
                    </div>
                    <span class="w-full h-[1px] bg-gradient-to-r via-(--color-primary)"></span>
                    <div class="w-full px-8 py-8 flex items-center justify-between">
                        <div class="flex flex-col gap-3">
                            <span class="text-lg font-bold">عیار999.9</span>
                            <span class="text-[14px] text-(--color-text-secondary) line-clamp-2">طلای خاص با
                                استاندارد</span>
                        </div>
                        <div
                            class="w-14 h-14 flex items-center justify-center shadow text-(--color-primary) rounded-full bg-(--color-bg)">
                            <svg class="size-9" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path
                                    d="M24 32c13.3 0 24 10.7 24 24V408c0 13.3 10.7 24 24 24H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H72c-39.8 0-72-32.2-72-72V56C0 42.7 10.7 32 24 32zM168 224c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24s-24-10.7-24-24V248c0-13.3 10.7-24 24-24zm120-72V328c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24s24 10.7 24 24zm72 40c13.3 0 24 10.7 24 24V328c0 13.3-10.7 24-24 24s-24-10.7-24-24V216c0-13.3 10.7-24 24-24zM480 88V328c0 13.3-10.7 24-24 24s-24-10.7-24-24V88c0-13.3 10.7-24 24-24s24 10.7 24 24z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- توضیحات ، مشخصات -->
        <section class="w-11/12 mx-auto mt-24 flex flex-col">
            <ul
                class="w-full sm:w-fit flex items-center justify-start text-xs sm:text-sm md:text-lg gap-5 border-b-1 border-(--color-border-strong) sm:px-1 md:px-4">
                <li class="text-(--color-primary) border-b-2 border-(--color-primary) md:p-2">
                    <a href="">مشخصات محصول</a>
                </li>
                <li
                    class="text-(--color-text-secondary) md:p-2 cursor-pointer hover:text-(--color-primary) hover:border-b-2 border-(--color-primary) transition-all">
                    <a href="">نحوه خرید و تحویل</a>
                </li>
                <li
                    class="text-(--color-text-secondary) md:p-2 cursor-pointer hover:text-(--color-primary) hover:border-b-2 border-(--color-primary) transition-all">
                    <a href="">سوالات متداول</a>
                </li>
                <li
                    class="text-(--color-text-secondary) md:p-2 cursor-pointer hover:text-(--color-primary) hover:border-b-2 border-(--color-primary) transition-all">
                    <a href="">نظرات کاربران</a>
                </li>
            </ul>
            <div class="w-full flex gap-5 cursor-default">
                <div class="w-full md:w-7/12 text-gray-500 text-sm divide-y divide-zinc-200">
                    <p class="lg:text-lg font-bold mt-10 pb-5">مشخصات کلی</p>
                    @foreach ($product->attributes as $attribute)
                        <div class="flex items-center justify-start p-3 pb-6 w-full my-4">
                            <div class="text-sm w-3/12 font-semibold">{{ $attribute->attribute_key }} : </div>
                            <div class="md:text-lg text-(--color-zinc-600) w-9/12 font-bold">
                                {{ $attribute->attribute_value }}</div>
                        </div>
                    @endforeach
                </div>
                <div
                    class="w-full md:w-5/12 bg-(--color-primary)/10 bg-gradient-to-br from-(--color-primary-light) via-inherit border-2 border-(--color-border-gold) rounded-lg px-5 py-3 hidden md:flex flex-col items-center overflow-hidden">
                    <div class="w-full flex items-center justify-between gap-1">
                        <div class="flex flex-col gap-3">
                            <span class="text-lg font-bold">سرمایه گذاری مطمعن با طلا</span>
                            <span class="text-[14px] text-(--color-text-secondary) line-clamp-3">شمش های طلا با بالاترین
                                استاندارد های بین‍‌المللی و تحت نظارت پارلمان ;با برسو با اططمینان سرمایه کذاری کنید</span>
                        </div>
                        <img class="w-23 lg:w-33" src="{{ asset('assets/img/gold.webp') }}" alt="">
                    </div>
                    <div class="w-full py-4 flex items-center gap-5">
                        <div
                            class="w-10 lg:w-14 h-10 lg:h-14 flex items-center justify-center shadow text-(--color-primary) rounded-full bg-(--color-bg)">
                            <svg class="size-6 lg:size-9" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 512 512">
                                <path
                                    d="M73 127L256 49.4 439 127c5.9 2.5 9.1 7.8 9 12.8c-.4 91.4-38.4 249.3-186.3 320.1c-3.6 1.7-7.8 1.7-11.3 0C102.4 389 64.5 231.2 64 139.7c0-5 3.1-10.2 9-12.8zM457.7 82.8L269.4 2.9C265.2 1 260.7 0 256 0s-9.2 1-13.4 2.9L54.3 82.8c-22 9.3-38.4 31-38.3 57.2c.5 99.2 41.3 280.7 213.6 363.2c16.7 8 36.1 8 52.8 0C454.8 420.7 495.5 239.2 496 140c.1-26.2-16.3-47.9-38.3-57.2zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                            </svg>
                        </div>
                        <div class="flex flex-col gap-3">
                            <span class="text-lg font-bold">عیار999.9</span>
                            <span class="text-[14px] text-(--color-text-secondary) line-clamp-2">طلای خاص با
                                استاندارد</span>
                        </div>
                    </div>
                    <div class="w-full py-4 flex items-center gap-5">
                        <div
                            class="w-10 lg:w-14 h-10 lg:h-14 flex items-center justify-center shadow text-(--color-primary) rounded-full bg-(--color-bg)">
                            <svg class="size-6 lg:size-9" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512">
                                <path
                                    d="M520 48H393.3C381 19.7 352.8 0 320 0s-61 19.7-73.3 48H120c-13.3 0-24 10.7-24 24s10.7 24 24 24H241.6c5.8 28.6 26.9 51.7 54.4 60.3V464H120c-13.3 0-24 10.7-24 24s10.7 24 24 24H320 520c13.3 0 24-10.7 24-24s-10.7-24-24-24H344V156.3c27.5-8.6 48.6-31.7 54.4-60.3H520c13.3 0 24-10.7 24-24s-10.7-24-24-24zm-8 147.8L584.4 320H439.6L512 195.8zM386 337.1C396.8 382 449.1 416 512 416s115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L536.1 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L392.7 305.1c-5.7 9.8-9.3 21.1-6.7 32.1zM54.4 320l72.4-124.2L199.3 320H54.4zm72.4 96c62.9 0 115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L150.9 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L7.6 305.1c-5.7 9.8-9.3 21.1-6.7 32.1C11.7 382 64 416 126.8 416zM320 48a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                        </div>
                        <div class="flex flex-col gap-3">
                            <span class="text-lg font-bold">وزن استاندارد 10 گرم</span>
                            <span class="text-[14px] text-(--color-text-secondary) line-clamp-2">مناسب برای خرید در مقیاس
                                کوچک</span>
                        </div>
                    </div>
                    <div class="w-full py-4 flex items-center gap-5">
                        <div
                            class="w-10 lg:w-14 h-10 lg:h-14 flex items-center justify-center shadow text-(--color-primary) rounded-full bg-(--color-bg)">
                            <svg class="size-6 lg:size-9" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path
                                    d="M24 32c13.3 0 24 10.7 24 24V408c0 13.3 10.7 24 24 24H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H72c-39.8 0-72-32.2-72-72V56C0 42.7 10.7 32 24 32zM168 224c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24s-24-10.7-24-24V248c0-13.3 10.7-24 24-24zm120-72V328c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24s24 10.7 24 24zm72 40c13.3 0 24 10.7 24 24V328c0 13.3-10.7 24-24 24s-24-10.7-24-24V216c0-13.3 10.7-24 24-24zM480 88V328c0 13.3-10.7 24-24 24s-24-10.7-24-24V88c0-13.3 10.7-24 24-24s24 10.7 24 24z" />
                            </svg>
                        </div>
                        <div class="flex flex-col gap-3">
                            <span class="text-lg font-bold">عیار999.9</span>
                            <span class="text-[14px] text-(--color-text-secondary) line-clamp-2">طلای خاص با
                                استاندارد</span>
                        </div>
                    </div>
                    <div class="w-full bg-(--color-primary)/15 border-2 border-(--color-border-gold) rounded-lg px-5 py-3">
                        <div class="flex items-center justify-between mb-3">
                            <div class="">
                                <div class="text-lg">نیاز به <span class="text-(--color-primary)">مشاوره دارید</span>؟
                                </div>
                                <div class="text-sm text-(--color-text-secondary) mt-3">کارشناسان ما آماده پاسخگویی هستند
                                </div>
                            </div>
                            <div
                                class="w-10 lg:w-14 h-10 lg:h-14 flex items-center justify-center shadow text-(--color-primary) rounded-full bg-(--color-bg)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" class="size-6 lg:size-9 fill-white">
                                    <path stroke="currentColor"
                                        d="M3 18V12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12V18"
                                        stroke="#52525c" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path stroke="currentColor"
                                        d="M21 19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H18C17.4696 21 16.9609 20.7893 16.5858 20.4142C16.2107 20.0391 16 19.5304 16 19V16C16 15.4696 16.2107 14.9609 16.5858 14.5858C16.9609 14.2107 17.4696 14 18 14H21V19ZM3 19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H6C6.53043 21 7.03914 20.7893 7.41421 20.4142C7.78929 20.0391 8 19.5304 8 19V16C8 15.4696 7.78929 14.9609 7.41421 14.5858C7.03914 14.2107 6.53043 14 6 14H3V19Z"
                                        stroke="#52525c" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-center justify-end pt-3 ">
                            <button class="bg-[image:var(--gradient-gold)] text-white px-5 py-2 rounded-full">تماس با
                                ما</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- محصولات مرتبط -->
        <section class="w-11/12 mx-auto mt-24">
            <div class="w-full flex justify-between items-center mx-auto">
                <span class="w-48 min-w-fit text-xl cursor-default">محصولات مرتبط</span>
                <!-- <span class="h-[1px] w-full bg-gradient-to-r from-white via-(--color-zinc-500) to-white "></span> -->
                <div class="w-32 min-w-fit flex items-center justify-end">
                    <a href="" class="text-base text-(--color-primary) flex fle items-center gap-x-1 group">
                        مشاهده همه
                        <svg fill="currentColor" class="group-hover:-translate-x-1 transition size-2.5 md:size-3"
                            xmlns="http://www.w3.org/2000/svg" width="" height="" fill=""
                            viewBox="0 0 256 256">
                            <path
                                d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-full flex flex-row gap-10 p-5 ">
                @foreach ($product['categories'] as $category)
                    @foreach ($category['products'] as $pro)
                        @if ($pro['id'] != $product['id'])
                            <a href="{{ route('product.show', [$pro]) }}"
                                class="min-w-60 max-w-60 border-1 border-(--color-border-gold) p-1 rounded-md hover:shadow-lg hover:-translate-y-1 transition-all ease-out">
                                <div class="w-full relative">
                                    @if ($pro['media']->isNotEmpty())
                                        @foreach ($pro['media'] as $media)
                                            @if ($media['is_main'])
                                                @php
                                                    $imgSrc = asset('storage/' . $media['media_path']);
                                                @endphp
                                                @break

                                            @else
                                                @php
                                                    $imgSrc = asset('storage/default.jpg');
                                                @endphp
                                            @endif
                                        @endforeach
                                    @else
                                        @php
                                            $imgSrc = asset('storage/default.jpg');
                                        @endphp
                                    @endif
                                    <img class="rounded-md min-w-57 max-w-57 max-h-30" src="{{ $imgSrc }}"
                                        alt="">
                                    <svg class="absolute top-2 left-3 size-4 fill-red-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M244 130.6l-12-13.5-4.2-4.7c-26-29.2-65.3-42.8-103.8-35.8c-53.3 9.7-92 56.1-92 110.3v3.5c0 32.3 13.4 63.1 37.1 85.1L253 446.8c.8 .7 1.9 1.2 3 1.2s2.2-.4 3-1.2L443 275.5c23.6-22 37-52.8 37-85.1v-3.5c0-54.2-38.7-100.6-92-110.3c-38.5-7-77.8 6.6-103.8 35.8l-4.2 4.7-12 13.5c-3 3.4-7.4 5.4-12 5.4s-8.9-2-12-5.4zm34.9-57.1C311 48.4 352.7 37.7 393.7 45.1C462.2 57.6 512 117.3 512 186.9v3.5c0 36-13.1 70.6-36.6 97.5c-3.4 3.8-6.9 7.5-10.7 11l-184 171.3c-.8 .8-1.7 1.5-2.6 2.2c-6.3 4.9-14.1 7.5-22.1 7.5c-9.2 0-18-3.5-24.8-9.7L47.2 299c-3.8-3.5-7.3-7.2-10.7-11C13.1 261 0 226.4 0 190.4v-3.5C0 117.3 49.8 57.6 118.3 45.1c40.9-7.4 82.6 3.2 114.7 28.4c6.7 5.3 13 11.1 18.7 17.6l4.2 4.7 4.2-4.7c4.2-4.7 8.6-9.1 13.3-13.1c1.8-1.5 3.6-3 5.4-4.5z">
                                        </path>
                                    </svg>
                                </div>
                                <div class=" flex flex-col gap-3 mt-3">
                                    <div class="font-bold text-xl">{{ $pro->title }}</div>
                                    <div class="font-bold text-(--color-text-secondary)">{{ $pro->summary }}</div>
                                    <div class="text-(--color-primary) flex items-center justify-between px-3 pb-2">
                                        @if ($pro['primary_price'])
                                            @if ($pro['secondary_price'])
                                                <div class="flex flex-col items-start gap-2 text-end">
                                                    <span
                                                        class="text-xs text-gray-400 font-bold line-through">{{ $pro['primary_price'] }}</span>
                                                    <div class="">
                                                        <span class="text-lg font-bold">{{ $pro->secondary_price }}</span>
                                                        <span class="text-base">تومان</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="">
                                                    <span class="text-lg font-bold">{{ $pro->primary_price }}</span>
                                                    <span class="text-base">تومان</span>
                                                </div>
                                            @endif
                                        @else
                                            <span class="text-[var(--gold)] w-full text-[10px]">برای استعلام قیمت
                                                تماس بگیرید</span>
                                        @endif
                                        <div
                                            class="w-10 h-10 flex items-center justify-center shadow text-(--color-primary) rounded-full bg-(--color-bg)">
                                            <svg width="24" height="24" viewBox="0 0 24 24" class="size-6"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" clip-rule="evenodd"
                                                    d="M3.03998 2.292C2.85221 2.22609 2.64595 2.23748 2.46657 2.32365C2.28719 2.40982 2.14939 2.56373 2.08348 2.7515C2.01758 2.93927 2.02896 3.14554 2.11513 3.32491C2.20131 3.50429 2.35521 3.64209 2.54298 3.708L2.80398 3.799C3.47198 4.034 3.91098 4.189 4.23398 4.348C4.53698 4.497 4.66998 4.618 4.75798 4.746C4.84798 4.878 4.91798 5.06 4.95798 5.423C4.99798 5.803 4.99998 6.298 4.99998 7.038V9.64C4.99998 12.582 5.06298 13.552 5.92998 14.466C6.79598 15.38 8.18998 15.38 10.98 15.38H16.282C17.843 15.38 18.624 15.38 19.175 14.93C19.727 14.48 19.885 13.716 20.2 12.188L20.7 9.763C21.047 8.023 21.22 7.154 20.776 6.577C20.332 6 18.816 6 17.131 6H6.49198C6.48776 5.75351 6.47342 5.50731 6.44898 5.262C6.39498 4.765 6.27898 4.312 5.99698 3.9C5.71298 3.484 5.33498 3.218 4.89398 3.001C4.48198 2.799 3.95798 2.615 3.34198 2.398L3.03998 2.292ZM15.517 8.457C15.817 8.743 15.829 9.217 15.543 9.517L12.686 12.517C12.6159 12.5905 12.5317 12.649 12.4384 12.689C12.345 12.729 12.2445 12.7496 12.143 12.7496C12.0414 12.7496 11.9409 12.729 11.8476 12.689C11.7543 12.649 11.67 12.5905 11.6 12.517L10.457 11.317C10.3861 11.2463 10.3302 11.1621 10.2924 11.0694C10.2546 10.9767 10.2357 10.8774 10.2369 10.7773C10.2381 10.6773 10.2593 10.5784 10.2993 10.4867C10.3393 10.3949 10.3972 10.3121 10.4697 10.243C10.5422 10.174 10.6278 10.1202 10.7214 10.0848C10.815 10.0494 10.9147 10.033 11.0148 10.0367C11.1148 10.0405 11.2131 10.0642 11.3038 10.1065C11.3945 10.1488 11.4758 10.2088 11.543 10.283L12.143 10.913L14.457 8.483C14.5941 8.33904 14.7828 8.25544 14.9816 8.25057C15.1804 8.24569 15.3729 8.31994 15.517 8.457Z"
                                                    fill="black"></path>
                                                <path fill="currentColor"
                                                    d="M7.5 18C7.89782 18 8.27936 18.158 8.56066 18.4393C8.84196 18.7206 9 19.1022 9 19.5C9 19.8978 8.84196 20.2794 8.56066 20.5607C8.27936 20.842 7.89782 21 7.5 21C7.10218 21 6.72064 20.842 6.43934 20.5607C6.15804 20.2794 6 19.8978 6 19.5C6 19.1022 6.15804 18.7206 6.43934 18.4393C6.72064 18.158 7.10218 18 7.5 18ZM16.5 18C16.8978 18 17.2794 18.158 17.5607 18.4393C17.842 18.7206 18 19.1022 18 19.5C18 19.8978 17.842 20.2794 17.5607 20.5607C17.2794 20.842 16.8978 21 16.5 21C16.1022 21 15.7206 20.842 15.4393 20.5607C15.158 20.2794 15 19.8978 15 19.5C15 19.1022 15.158 18.7206 15.4393 18.4393C15.7206 18.158 16.1022 18 16.5 18Z"
                                                    fill="black"></path>
                                                <path stroke="currentColor"
                                                    d="M15.0742 8.8568C14.9303 8.87118 14.8255 9.10815 14.7562 9.22021C14.6354 9.41529 14.5162 9.57762 14.3665 9.75099C14.0074 10.1667 13.4839 10.4894 13.0467 10.8173C12.7359 11.0504 12.3724 11.3453 12.0162 11.5011C11.6944 11.6419 11.3865 11.1364 11.244 10.9225"
                                                    stroke="black" stroke-width="3" stroke-linecap="round"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </section>
    </main>
    <script>
        function changeImage(imageSrc) {
            document.getElementById("product-image").src = imageSrc;
        }

        function increaseValue() {
            var input = document.getElementById("numberInput");
            input.value = parseInt(input.value) + 1;
        }

        function decreaseValue() {
            var input = document.getElementById("numberInput");
            input.value = parseInt(input.value) - 1;
        }
    </script>
@endsection
