@extends('app.document')
@section('title', 'طلای ستاری | صفحه اول')
@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-25 right-10 z-5000 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-25 right-10 z-5000 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    <!-- hero -->
    <section
        class="2xl:container mx-auto w-full @if ($header) bg-[url('{{ asset('storage/' . $header->header_bg) }}')] @endif bg-cover bg-no-repeat flex flex-col justify-center items-center pb-5 pt-20 lg:pt-10">
        @if ($header)
            <div class="w-10/12 lg:w-5/12 flex flex-col justify-center items-center">
                <img src="{{ asset('storage/' . $header->header_img) }}" class="w-1/2 lg:w-11/12" alt="">
                <h2 class="text-xl lg:text-3xl text-gray-800 font-bold flex justify-center items-center gap-1 mt-1.5">
                    <span>{{ $header->title }}</span>
                    {{-- <span class="text-[#c98323]">با طلا</span> --}}
                </h2>
                <p class="text-xs lg:text-sm text-gray-600 text-center mt-1.5">{{ $header->subTitle }}</p>
                <div class="w-full flex justify-center items-center gap-4 pt-5">
                    <a href="{{ route($header->btnLink) }}"
                        class="group flex justify-center items-center w-1/2 lg:w-1/3 gap-2 lg:gap-3 py-2 lg:py-3 rounded-full pl-6"
                        style="background: #A56920;
                    background: linear-gradient(0deg, rgba(165, 105, 32, 1) 0%, rgba(227, 171, 90, 1) 100%);">
                        <svg class="w-[31px] h-[31px] text-white group-hover:translate-x-[10px] transition-all duration-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                        <span class="text-xs lg:text-sm font-bold text-white">{{ $header->btnText }}</span>
                    </a>
                </div>
            </div>
        @endif
        <!-- value bar -->
        <div class="w-11/12 mx-auto bg-white p-3 rounded-xl  mt-4">
            <div class="bg-[#faf5f0] p-2.5 rounded-lg grid grid-cols-1 lg:grid-cols-3">

                <div
                    class="w-full flex flex-row justify-between lg:justify-center items-center gap-3 relative after:absolute after:content-[''] after:w-11/12 after:h-px after:bottom-0 after:left-1/2 after:-translate-x-1/2 lg:after:translate-x-0 py-3 lg:py-0 lg:after:w-0.5 lg:after:h-5 lg:after:rounded-full after:bg-[#e5b369] lg:after:left-0 lg:after:top-1/2 lg:after:-translate-y-1/2">
                    <span class="text-xs text-emerald-400 font-bold in-fa flex items-center">
                        <svg class="w-[24px] h-[24px] text-emerald-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 6v13m0-13 4 4m-4-4-4 4" />
                        </svg>
                        % 1.1 +
                    </span>
                    <span class="text-gray-800 font-bold in-fa">7,385,000</span>
                    <span class="text-gray-600 text-xs in-fa">طلای 18 عیار</span>
                    <img src="./img/gold-bar.png" class="w-8" alt="">
                </div>

                <div
                    class="w-full flex flex-row justify-between lg:justify-center items-center gap-3 relative after:absolute after:content-[''] after:w-11/12 after:h-px after:bottom-0 after:left-1/2 after:-translate-x-1/2 lg:after:translate-x-0 py-3 lg:py-0 lg:after:w-0.5 lg:after:h-5 lg:after:rounded-full after:bg-[#e5b369] lg:after:left-0 lg:after:top-1/2 lg:after:-translate-y-1/2">
                    <span class="text-xs text-emerald-400 font-bold in-fa flex items-center">
                        <svg class="w-[24px] h-[24px] text-emerald-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 6v13m0-13 4 4m-4-4-4 4" />
                        </svg>
                        % 1.16 +
                    </span>
                    <span class="text-gray-800 font-bold in-fa">73,500,000</span>
                    <span class="text-gray-600 text-xs in-fa">سکه امامی</span>
                    <img src="./img/coin.png" class="w-8" alt="">
                </div>

                <div class="w-full flex flex-row justify-between lg:justify-center items-center gap-3 py-3 lg:py-0">
                    <span class="text-xs text-emerald-400 font-bold in-fa flex items-center">
                        <svg class="w-[24px] h-[24px] text-emerald-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 6v13m0-13 4 4m-4-4-4 4" />
                        </svg>
                        % 1.1 +
                    </span>
                    <span class="text-gray-800 font-bold in-fa">7,385,000</span>
                    <span class="text-gray-600 text-xs in-fa">طلای 18 عیار</span>
                    <!-- <img src="./img/gold-bar.png" class="w-16" alt=""> -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-[#e1a84f]"
                        viewBox="0 0 512 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M256 464c7.4 0 27-7.2 47.6-48.4c8.8-17.7 16.4-39.2 22-63.6H186.4c5.6 24.4 13.2 45.9 22 63.6C229 456.8 248.6 464 256 464zM178.5 304h155c1.6-15.3 2.5-31.4 2.5-48s-.9-32.7-2.5-48h-155c-1.6 15.3-2.5 31.4-2.5 48s.9 32.7 2.5 48zm7.9-144H325.6c-5.6-24.4-13.2-45.9-22-63.6C283 55.2 263.4 48 256 48s-27 7.2-47.6 48.4c-8.8 17.7-16.4 39.2-22 63.6zm195.3 48c1.5 15.5 2.2 31.6 2.2 48s-.8 32.5-2.2 48h76.7c3.6-15.4 5.6-31.5 5.6-48s-1.9-32.6-5.6-48H381.8zm58.8-48c-21.4-41.1-56.1-74.1-98.4-93.4c14.1 25.6 25.3 57.5 32.6 93.4h65.9zm-303.3 0c7.3-35.9 18.5-67.7 32.6-93.4c-42.3 19.3-77 52.3-98.4 93.4h65.9zM53.6 208c-3.6 15.4-5.6 31.5-5.6 48s1.9 32.6 5.6 48h76.7c-1.5-15.5-2.2-31.6-2.2-48s.8-32.5 2.2-48H53.6zM342.1 445.4c42.3-19.3 77-52.3 98.4-93.4H374.7c-7.3 35.9-18.5 67.7-32.6 93.4zm-172.2 0c-14.1-25.6-25.3-57.5-32.6-93.4H71.4c21.4 41.1 56.1 74.1 98.4 93.4zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z" />
                    </svg>
                </div>

            </div>
        </div>
        <!-- value bar -->
    </section>
    <!-- hero -->

    <!-- why us? -->
    <section class="2xl:container mx-auto w-full bg-[#fbf7f3] py-5 lg:py-10 relative overflow-hidden">
        <div class="w-11/12 mx-auto">
            <img src="./img/img.png" class="absolute w-1/4 h-full left-0 top-0 hidden lg:block" alt="">
            <h2 class="text-md lg:text-2xl font-bold text-gray-800 mb-2">چرا گلدکس؟</h2>
            <span class="block text-sm lg:text-base text-gray-500">انتخاب هوشمندانه برای سرمایه گذاری</span>
            <div class="w-full lg:w-3/4 mt-5 grid gap-3 grid-cols-3 lg:grid-cols-6">

                <!-- items -->

                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg class="size-8 lg:size-11 text-[#e1a84f]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.356 3.066a1 1 0 0 0-.712 0l-7 2.666A1 1 0 0 0 4 6.68a17.695 17.695 0 0 0 2.022 7.98 17.405 17.405 0 0 0 5.403 6.158 1 1 0 0 0 1.15 0 17.406 17.406 0 0 0 5.402-6.157A17.694 17.694 0 0 0 20 6.68a1 1 0 0 0-.644-.949l-7-2.666Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">پشتیبانی تخصصی</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">با کارشناسان مجرب</span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg class="size-8 lg:size-11 text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">سرمایه‌گذاری مطمئن</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">با روش‌های معتبر</span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg class="size-8 lg:size-11 text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.3"
                                d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">کارمزد پایین</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">بازدهی حداکثر </span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg class="size-8 lg:size-11 text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12.356 3.066a1 1 0 0 0-.712 0l-7 2.666A1 1 0 0 0 4 6.68a17.695 17.695 0 0 0 2.022 7.98 17.405 17.405 0 0 0 5.403 6.158 1 1 0 0 0 1.15 0 17.406 17.406 0 0 0 5.402-6.157A17.694 17.694 0 0 0 20 6.68a1 1 0 0 0-.644-.949l-7-2.666Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">خرید و فروش آنلاین</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">در هر ساعت از شبانه‌روز</span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg class="size-8 lg:size-11 text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12.356 3.066a1 1 0 0 0-.712 0l-7 2.666A1 1 0 0 0 4 6.68a17.695 17.695 0 0 0 2.022 7.98 17.405 17.405 0 0 0 5.403 6.158 1 1 0 0 0 1.15 0 17.406 17.406 0 0 0 5.402-6.157A17.694 17.694 0 0 0 20 6.68a1 1 0 0 0-.644-.949l-7-2.666Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">قیمت‌های لحظه‌ای</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">به‌صورت آنی</span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg class="size-8 lg:size-11 text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12.356 3.066a1 1 0 0 0-.712 0l-7 2.666A1 1 0 0 0 4 6.68a17.695 17.695 0 0 0 2.022 7.98 17.405 17.405 0 0 0 5.403 6.158 1 1 0 0 0 1.15 0 17.406 17.406 0 0 0 5.402-6.157A17.694 17.694 0 0 0 20 6.68a1 1 0 0 0-.644-.949l-7-2.666Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">امنیت بالا</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500"> با بالاترین استانداردها</span>
                    </div>
                </div>

                <!-- items -->

            </div>
        </div>
    </section>
    <!-- why us? -->


    <!-- products -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div class="w-11/12 mx-auto">
            <!-- title -->
            <div class="w-full flex flex-row items-end justify-between">
                <div class="flex flex-col gap-3">
                    <h2 class="text-md lg:text-xl font-bold text-gray-800">محصولات ما</h2>
                    <span class="text-sm lg:text-base text-gray-500 font-bold">با اطمینان سرمایه گذاری کنید </span>
                </div>
                <div>
                    <a href="#" class="flex justify-end items-center gap-2 group">
                        <span
                            class="text-xs lg:text-sm font-bold text-gray-500 group-hover:text-[#e1a84f] transition-all duration-300">مشاهده
                            بیشتر</span>
                        <svg class="w-[31px] h-[31px] text-[#e1a84f] transition-all duration-300 group-hover:-translate-x-[10px]"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.3" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- title -->

            <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8 mt-8">
                <!-- items -->
                @foreach ($products as $product)
                    <div class="w-full rounded-xl flex flex-col" style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);">
                        <a href="{{ route('product.show', [$product]) }}" class="block w-full rounded-md">
                            <img src="{{ asset('storage/' . $product['mainImg']) }}"
                                class="block w-full h-40 object-cover rounded-md" alt="">
                        </a>
                        <div class="w-full flex flex-col gap-2 p-3">
                            <a href="{{ route('product.show', [$product]) }}" class="block">
                                <h3 class="text-gray-800 font-bold text-sm lg:text-base">{{ $product['title'] }}</h3>
                            </a>
                            @foreach ($product->categories as $category)
                                <span class="text-gray-500 text-xs font-bold">{{ $category->title }}</span>
                            @endforeach
                            <div class="w-full flex flex-row items-center justify-between mt-2">
                                @if ($product->primary_price)
                                    @if ($product->secondary_price)
                                        <div class="space-y-2">
                                            <div class="line-through text-[#a1a1aa] text-[10px] in-fa">
                                                {{ $product->primary_price }}
                                                تومان</div>
                                            <div class="flex flex-row items-center gap-1 lg:text-base">
                                                <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">از</span>
                                                <span
                                                    class="text-xs lg:text-sm font-bold text-gray-800 in-fa">{{ $product->secondary_price }}</span>
                                                <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex flex-row items-center gap-1 lg:text-base">
                                            <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">از</span>
                                            <span
                                                class="text-xs lg:text-sm font-bold text-gray-800 in-fa">{{ $product->primary_price }}</span>
                                            <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                        </div>
                                    @endif
                                @else
                                    <span class="text-[10px] text-gray-500">برای استعلام قیمت تماس
                                        بگیرید</span>
                                @endif
                                {{-- <div class="flex flex-row items-center gap-1 lg:text-base">
                                    <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">از</span>
                                    <span
                                        class="text-xs lg:text-sm font-bold text-gray-800 in-fa">{{ $product->primary_price }}</span>
                                    <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                </div> --}}
                                <a href="{{ route('product.show', [$product]) }}"
                                    class="size-7 bg-[#efe7d8] rounded-full flex justify-center items-center">
                                    <svg class="size-5 text-[#e1a84f]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="3" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- items -->
            </div>
        </div>
    </section>
    <!-- products -->

    <!-- app -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div class="w-11/12 mx-auto flex flex-col lg:flex-row gap-4 lg:gap-6">
            <div class="w-full lg:w-[30%] relative h-80 rounded-xl overflow-hidden"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <div class="w-full flex flex-col gap-3 p-5">
                    <h3 class="text-sm lg:text-xl text-gray-800 font-bold">اپلیکیشن گلدکس</h3>
                    <span class="text-xs lg:text-sm font-bold text-gray-500">همیشه و همه جا</span>
                    <span class="text-xs lg:text-sm font-bold text-gray-500">کنار شما هستیم</span>
                </div>
                <div class="absolute size-56 bg-[#ffd28aaf] rounded-full backdrop-blur-xs -left-16 -bottom-20"
                    style="box-shadow: 0px 0px 20px 20px #ffd28aaf;"></div>
                <div class="absolute size-40 bg-[#e1a84f] rounded-full backdrop-blur-xs left-5 -bottom-20"
                    style="box-shadow: 0px 0px 15px 15px #e1a84f;"></div>
                <img src="./img/mobile.png" class="absolute w-30 left-0 -bottom-6 rotate-[15deg]" alt="">
                <div class="absolute flex flex-row items-center gap-2 bottom-14 right-4">
                    <a href="#" class="flex flex-row items-center bg-[#f4f0ea] gap-1 py-1.5 px-2 rounded-md">
                        <span class="text-xs text-gray-700">Play Store</span>
                        <img src="./img/play-store.png" class="size-4" alt="">
                    </a>
                    <a href="#" class="flex flex-row items-center bg-[#f4f0ea] gap-1 py-1.5 px-2 rounded-md">
                        <span class="text-xs text-gray-700">Apple Store</span>
                        <img src="./img/apple-store.png" class="size-4" alt="">
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-[24%] relative h-80 rounded-xl overflow-hidden"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <img src="./img/educate.jpg" class="absolute size-full object-cover top-0 right-0" alt="">
                <div class="absolute w-full h-full bottom-0 pb-4 right-0"
                    style="background: #241C00;
                    background: radial-gradient(circle, rgba(36, 28, 0, 0.1) 0%, rgba(0, 0, 0, 1) 70%);">
                    <div class="relative w-full h-full">
                        <div class="absolute bottom-4 right-0 px-5 backdrop-blur-xs pt-3 w-full">
                            <h3 class="lg:text-lg font-bold text-white">
                                آموزش سرمایه گذاری در بازار طلا
                            </h3>
                            <div class="flex flex-col gap-1 mt-2">
                                <span class="text-xs lg:text-sm text-gray-200">آموزش های مفید</span>
                                <span class="text-xs lg:text-sm text-gray-200">آموزش های کامل و جامع</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="absolute size-14 rounded-full cursor-pointer border-1 border-white inset-1/2 -translate-y-1/2 translate-x-1/2 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-white w-4" viewBox="0 0 384 512">
                        <path
                            d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z" />
                    </svg>
                </div>
            </div>
            <div class="w-full lg:w-[44%] relative h-80 rounded-xl overflow-hidden">
                <img src="./img/gold-chart.jpg" class="size-full object-cover" alt="">
                <div class="absolute w-full h-full top-0 right-0 bg-black/40"></div>
                <div class="absolute top-1/2 right-[6%] -translate-y-1/2">
                    <h3 class="lg:text-xl font-bold text-white">تحلیل بازار طلا</h3>
                    <p class="text-sm text-white font-bold w-2/3 mt-3 leading-[2]">
                        با جدید ترین تحلیل های بازار طلا سرمایه گذاری خود را شروع کنید
                    </p>
                    <div class="mt-8">
                        <a href="#"
                            class="group flex justify-center items-center w-2/3 gap-2 lg:gap-3 py-1.5 lg:py-2 rounded-full pl-6"
                            style="background: #A56920;
                                            background: linear-gradient(0deg, rgba(165, 105, 32, 1) 0%, rgba(227, 171, 90, 1) 100%);">
                            <svg class="w-[31px] h-[31px] text-white group-hover:translate-x-[10px] transition-all duration-300"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.3" d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                            <span class="text-xs lg:text-sm font-bold text-white">مشاهده تحلیل ها</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- app -->

    <!-- contacts -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div
            class="w-11/12 mx-auto bg-[linear-gradient(90deg,#d8c3a5_0%,#f5efe6_30%,#ffffff_100%)] rounded-xl py-3 lg:py-5">
            <div class="w-full mb-4 lg:mb-8">
                <h2 class="lg:text-xl text-gray-800 font-bold mb-3">نظرات کاربران</h2>
                <span class="text-gray-500 font-bold text-sm">اعتماد شما بزرگترین سرمایه ماست</span>
            </div>
            <div class="w-full flex items-center gap-3 lg:gap-5 overflow-x-auto px-3"
                style="scrollbar-color: #e1a84f #e5e7eb00; scrollbar-width: thin;">
                <div class="pb-3">
                    <div class="w-[200px] lg:w-[360px] bg-white rounded-lg p-4">
                        <div class="flex items-center gap-4">
                            <img src="./img/mrolyafam.png" class="size-12 rounded-full object-cover" alt="">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-700 font-bold">محمدرضا علیافام</span>
                                <div class="flex flex-row items-center gap-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-[1.5] mt-6">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه

                        </p>
                        <div class="w-full flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-400 in-fa">14:22:53</span>
                            <span class="text-xs text-gray-400 in-fa">1404/05/21</span>
                        </div>
                    </div>
                </div>
                <div class="pb-3">
                    <div class="w-[200px] lg:w-[360px] bg-white rounded-lg p-4">
                        <div class="flex items-center gap-4">
                            <img src="./img/mrolyafam.png" class="size-12 rounded-full object-cover" alt="">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-700 font-bold">محمدرضا علیافام</span>
                                <div class="flex flex-row items-center gap-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-[1.5] mt-6">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه

                        </p>
                        <div class="w-full flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-400 in-fa">14:22:53</span>
                            <span class="text-xs text-gray-400 in-fa">1404/05/21</span>
                        </div>
                    </div>
                </div>
                <div class="pb-3">
                    <div class="w-[200px] lg:w-[360px] bg-white rounded-lg p-4">
                        <div class="flex items-center gap-4">
                            <img src="./img/mrolyafam.png" class="size-12 rounded-full object-cover" alt="">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-700 font-bold">محمدرضا علیافام</span>
                                <div class="flex flex-row items-center gap-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-[1.5] mt-6">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه

                        </p>
                        <div class="w-full flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-400 in-fa">14:22:53</span>
                            <span class="text-xs text-gray-400 in-fa">1404/05/21</span>
                        </div>
                    </div>
                </div>
                <div class="pb-3">
                    <div class="w-[200px] lg:w-[360px] bg-white rounded-lg p-4">
                        <div class="flex items-center gap-4">
                            <img src="./img/mrolyafam.png" class="size-12 rounded-full object-cover" alt="">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-700 font-bold">محمدرضا علیافام</span>
                                <div class="flex flex-row items-center gap-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-[1.5] mt-6">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه

                        </p>
                        <div class="w-full flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-400 in-fa">14:22:53</span>
                            <span class="text-xs text-gray-400 in-fa">1404/05/21</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contacts -->

    <!-- co-worker -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div class="w-11/12 mx-auto">
            <div class="w-full mb-4 lg:mb-8">
                <h2 class="lg:text-xl text-gray-800 font-bold mb-3">همکاران ما</h2>
                <span class="text-gray-500 font-bold text-sm">به همراه شما بزرگترین مسیر را ادامه میدهیم</span>
            </div>
            <div class="flex items-center justify-between gap-3 lg:gap-5 overflow-x-auto px-5"
                style="scrollbar-width: thin;">
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="./img/milligold.png" class="size-full object-cover rounded-lg" alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="./img/goldab.png" class="size-full object-cover rounded-lg" alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="./img/zarnid.png" class="size-full object-cover rounded-lg" alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="./img/milligold.png" class="size-full object-cover rounded-lg" alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="./img/goldab.png" class="size-full object-cover rounded-lg" alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="./img/zarnid.png" class="size-full object-cover rounded-lg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- co-worker -->


    <!-- app -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div class="w-11/12 mx-auto flex flex-col lg:flex-row gap-4 lg:gap-6">
            <div class="w-full lg:w-[34%] relative h-40 lg:h-44 rounded-xl overflow-hidden"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <div class="w-full flex flex-col gap-3 p-5">
                    <h3 class="text-sm lg:text-xl text-gray-800 font-bold">خبرنامه گلدکس</h3>
                    <span class="text-xs lg:text-sm font-bold text-gray-500">جدید ترین اخبار طلای آبشده و سپرده</span>
                </div>
                <div class="flex items-center gap-4 px-5">
                    <a href="#" class="block bg-[#fbf7f3] px-3 py-1 text-xs text-gray-500">
                        اخبار ایران درمورد بازار ارز
                    </a>
                    <a href="#" class="block bg-[#fbf7f3] px-3 py-1 text-xs text-gray-500">
                        اخبار جهان انس جهانی طلا
                    </a>
                </div>
                <div class="w-full flex justify-end p-2">
                    <a href="#"
                        class="group flex justify-center items-center w-1/3 gap-2 lg:gap-3 py-1.5 lg:py-2 rounded-full"
                        style="background: #A56920;
                                background: linear-gradient(0deg, rgba(165, 105, 32, 1) 0%, rgba(227, 171, 90, 1) 100%);">

                        <span class="text-xs lg:text-sm font-bold text-white">عضویت</span>
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-[24%] relative h-40 lg:h-44 rounded-xl flex flex-col justify-between p-3"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <div class="flex flex-col justify-between items-end">
                    <div class="flex flex-row-reverse items-center gap-1">
                        <svg class="w-[43px] h-[43px] text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />
                        </svg>
                        <span class="text-sm text-gray-600 font-bold in-fa">09123456789</span>
                    </div>
                </div>
                <div class="flex flex-col justify-between items-end">
                    <div class="flex flex-row-reverse items-center gap-1">
                        <svg class="w-[36px] h-[36px] text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                        </svg>
                        <span class="text-sm text-gray-600 font-bold in-fa">test@example.com</span>
                    </div>
                </div>
                <div class="flex flex-col justify-between items-end">
                    <div class="flex flex-row-reverse items-center gap-1">
                        <svg class="w-[43px] h-[43px] text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                        </svg>
                        <span class="text-sm text-gray-600 font-bold in-fa">تهران، خیابان ولیعصر، پلاک 75</span>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-[40%] relative h-40 lg:h-44 rounded-xl overflow-hidden bg-[linear-gradient(90deg,#d8c3a5_0%,#f5efe6_30%,#ffffff_100%)]"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <img src="./img/gold-bar.png" class="absolute -bottom-5 -left-5 w-1/3 object-cover" alt="">
                <div class="absolute top-1/2 right-[6%] -translate-y-1/2">
                    <h3 class="lg:text-xl font-bold text-gray-800">ارتباط با ما</h3>
                    <p class="text-sm text-gray-600 font-bold w-2/3 mt-3 leading-[2]">
                        پاسخگوی سوالات شما هستیم
                    </p>
                    <p class="text-sm text-gray-600 font-bold w-2/3 mt-3 leading-[2]">
                        پشتیبانی، مشاوره و همکاری با سامانه همیشه آنلاین گلدکس
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!-- app -->

@endsection
