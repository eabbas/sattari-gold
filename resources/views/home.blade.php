<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/filters.js') }}"></script>
    <title>طلای ستاری</title>
</head>

<body>
    <header class="fixed w-full flex justify-center py-4 transition-all duration-300 z-999" id="mainHeader">
        <div class="2xl:container w-full mx-auto">
            <div class="w-11/12 mx-auto flex items-center justify-between">
                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-[#c39862] lg:hidden" id="hamburgerMenu"
                        viewBox="0 0 448 512">
                        <path
                            d="M0 88C0 74.7 10.7 64 24 64H424c13.3 0 24 10.7 24 24s-10.7 24-24 24H24C10.7 112 0 101.3 0 88zM0 248c0-13.3 10.7-24 24-24H424c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zM448 408c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H424c13.3 0 24 10.7 24 24z" />
                    </svg>
                    <a href="{{ route($logo->link) }}">
                        <img src="{{ asset('storage/' . $logo->logo) }}" class="w-20 lg:w-24" alt="">
                    </a>
                </div>
                <ul class="hidden lg:flex justify-center items-center gap-7">
                    {{-- @foreach ($menus as $index => $menu)
                        @if ($index == 0)
                            <li>
                                <a href="{{ route($menu->link) }}"
                                    class="relative py-4 px-2 text-sm font-bold after:absolute after:content-[''] after:min-w-full after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 transition-all duration-300 hover:text-[#C3924D] text-[#c3924d]">{{ $menu->title }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route($menu->link) }}"
                                    class="relative py-4 px-2 text-sm font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D]">{{ $menu->title }}</a>
                            </li>
                        @endif
                    @endforeach --}}
                    <li>
                        <a href="#"
                            class="relative py-4 px-2 text-sm font-bold after:absolute after:content-[''] after:min-w-full after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 transition-all duration-300 hover:text-[#C3924D] text-[#c3924d]">خانه</a>
                    </li>
                    <li class="relative drop_down">
                        <div class="flex items-center">
                            <span
                                class="py-4 px-2 text-sm font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D] cursor-pointer">دسته
                                بندی</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="size-4 fill-[#c3924d] transition-all duration-300">
                                <path
                                    d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="w-80 h-dvh absolute top-15 right-0 flex justify-end items-start invisible opacity-0 transition-all duration-300">
                            <div
                                class="w-full flex flex-col justify-start items-start overflow-y-auto max-h-100 rounded-xl bg-[#faf5f0]">
                                @foreach ($categories as $category)
                                    <a href="{{ route('category.relatedProducts', [$category]) }}"
                                        class="w-full relative p-4 border-b-1 border-[#c3924d]/30">
                                        <div class="group pr-4">
                                            <span
                                                class="text-[15px] md:text-md text-gray-800 font-bold group-hover:pr-5 transition-all duration-300">{{ $category['title'] }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#"
                            class="relative py-4 px-2 text-sm font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D]">خدمات</a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative py-4 px-2 text-sm font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D]">تجزیه
                            و تحلیل</a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative py-4 px-2 text-sm font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D]">همکاری</a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative py-4 px-2 text-sm font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D]">درباره
                            ما</a>
                    </li>
                </ul>
                <div class="p-1 lg:pl-3 rounded-full bg-white flex flex-row items-center gap-4">
                    <a href="{{ route('user.login') }}" class="flex items-center gap-3 rounded-full px-4 py-2"
                        style="background: #94570E;
                        background: linear-gradient(0deg, rgba(148, 87, 14, 1) 0%, rgba(219, 167, 96, 1) 100%);">
                        <div class="size-4 flex justify-center items-center rounded-full bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-[#94570E]" viewBox="0 0 448 512">
                                <path
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                            </svg>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-white text-sm">ورود</span>
                            <span class="text-white text-sm">/</span>
                            <span class="text-white text-sm">ثبت نام</span>
                        </div>
                    </a>
                    <a href="{{ route('user.profile') }}" class="lg:inline-block hidden">
                        <svg class="w-[31px] h-[31px] text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="1.3"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </a>
                    <button id="openSearchSectionBtn" class="cursor-pointer hidden lg:inline-block">
                        <svg class="w-[20px] h-[20px] text-gray-800 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        {{-- search section --}}
        <div class="fixed w-full h-dvh top-0 right-0 bg-black/50 transition-all duration-300 backdrop-blur-xs invisible opacity-0" id="searchSection">
            <form action="{{ route('search.page') }}" method="POST" class="w-full py-3 px-5 bg-white relative -translate-y-full transition-all duration-500">
                @csrf
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 lg:w-6 fill-gray-500 cursor-pointer absolute right-10 top-1/2 -translate-y-1/2" viewBox="0 0 448 512">
                    <path d="M440.6 273.4c4.7-4.5 7.4-10.8 7.4-17.4s-2.7-12.8-7.4-17.4l-176-168c-9.6-9.2-24.8-8.8-33.9 .8s-8.8 24.8 .8 33.9L364.1 232 24 232c-13.3 0-24 10.7-24 24s10.7 24 24 24l340.1 0L231.4 406.6c-9.6 9.2-9.9 24.3-.8 33.9s24.3 9.9 33.9 .8l176-168z"/>
                </svg>
                <div class="w-11/12 lg:w-10/12 mx-auto flex items-center gap-2 lg:gap-3.5 border-1 py-1.5 px-3 border-gray-200 rounded-full">
                    <input type="text" name="title" class="w-full py-1 outline-none" placeholder="جستجو ..." id="">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-400 w-4 lg:w-6" viewBox="0 0 512 512">
                            <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        {{-- search section --}}
        <!-- hamburger menu -->
        <div class="fixed w-full h-dvh top-0 right-0 bg-black/40 backdrop-blur-xs transition-all duration-300 invisible opacity-0"
            id="menuBlock">
            <div class="w-2/3 bg-white h-full transition-all duration-300 ease-in-out delay-200 translate-x-full">
                <div class="w-full flex justify-center p-4 border-b-2 border-[#A56920]/30">
                    <a href="#">
                        <img src="./img/logo.png" class="w-20 lg:w-24" alt="">
                    </a>
                </div>
                <ul class="w-full p-5">
                    <li>
                        <a href="#"
                            class="text-[#c3924d] text-sm font-bold py-3 block border-b-1 border-[#c3924d]/30">خانه</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-800 text-sm font-bold py-3 block border-b-1 border-[#c3924d]/30">قیمت لحظه
                            ای</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-800 text-sm font-bold py-3 block border-b-1 border-[#c3924d]/30">خدمات</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-800 text-sm font-bold py-3 block border-b-1 border-[#c3924d]/30">تجزیه و
                            تحلیل</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-800 text-sm font-bold py-3 block border-b-1 border-[#c3924d]/30">همکاری</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-800 text-sm font-bold py-3 block border-b-1 border-[#c3924d]/30">درباره
                            ما</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- hamburger menu -->
    </header>

    <!-- hero -->
    <section
        class="2xl:container mx-auto w-full bg-[url('{{ asset('storage/' . $header->header_bg) }}')] bg-cover bg-no-repeat flex flex-col justify-center items-center pb-5 pt-20 lg:pt-10">
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
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.3" d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                    <span class="text-xs lg:text-sm font-bold text-white">{{ $header->btnText }}</span>
                </a>
                <!-- <a href="#" class="group flex justify-center items-center w-1/3 lg:w-1/4 gap-2 lg:gap-3 border-1 border-[#A56920] py-2 lg:py-3 pr-6 rounded-full">
                    <span class="text-xs lg:text-sm font-bold text-[#A56920]">فروش طلا</span>
                    <svg class="w-[31px] h-[31px] text-[#A56920] group-hover:-translate-x-[10px] transition-all duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                </a> -->
            </div>
        </div>
        <!-- value bar -->
        <div class="w-11/12 mx-auto bg-white p-3 rounded-xl  mt-4">
            <div class="bg-[#faf5f0] p-2.5 rounded-lg grid grid-cols-1 lg:grid-cols-3">

                <div
                    class="w-full flex flex-row justify-between lg:justify-center items-center gap-3 relative after:absolute after:content-[''] after:w-11/12 after:h-px after:bottom-0 after:left-1/2 after:-translate-x-1/2 lg:after:translate-x-0 py-3 lg:py-0 lg:after:w-0.5 lg:after:h-5 lg:after:rounded-full after:bg-[#e5b369] lg:after:left-0 lg:after:top-1/2 lg:after:-translate-y-1/2">
                    <span class="text-xs text-emerald-400 font-bold in-fa flex items-center">
                        <svg class="w-[24px] h-[24px] text-emerald-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.3" d="M12 6v13m0-13 4 4m-4-4-4 4" />
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.3" d="M12 6v13m0-13 4 4m-4-4-4 4" />
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.3" d="M12 6v13m0-13 4 4m-4-4-4 4" />
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
                        <svg class="size-8 lg:size-11 text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
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
                        <a href="#" class="block w-full rounded-md">
                            <img src="{{ asset('storage/' . $product['mainImg']) }}"
                                class="block w-full h-40 object-cover rounded-md" alt="">
                        </a>
                        <div class="w-full flex flex-col gap-2 p-3">
                            <a href="#" class="block">
                                <h3 class="text-gray-800 font-bold text-sm lg:text-base">{{ $product['title'] }}</h3>
                            </a>
                            @foreach ($product->categories as $category)
                                <span class="text-gray-500 text-xs font-bold">{{ $category->title }}</span>
                            @endforeach
                            <div class="w-full flex flex-row items-center justify-between mt-2">
                                <div class="flex flex-row items-center gap-1 lg:text-base">
                                    <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">از</span>
                                    <span
                                        class="text-xs lg:text-sm font-bold text-gray-800 in-fa">{{ $product->primary_price }}</span>
                                    <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                </div>
                                <a href="#"
                                    class="size-7 bg-[#efe7d8] rounded-full flex justify-center items-center">
                                    <svg class="size-5 text-[#e1a84f]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
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

    <!-- footer -->
    <footer class="2xl:container mx-auto w-full py-4 lg:py-10 bg-[#0f1315]">
        <div class="w-11/12 mx-auto flex flex-col lg:flex-row justify-between gap-5">
            <div class="lg:w-1/4 w-full flex flex-col items-center gap-4 lg:gap-8">
                <div class="w-full flex flex-row items-center justify-center lg:justify-normal gap-3">
                    <a href="#" class="size-12 bg-[#353533] rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7 fill-white" viewBox="0 0 448 512">
                            <path
                                d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                        </svg>
                    </a>
                    <a href="#" class="size-12 bg-[#353533] rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7 fill-white" viewBox="0 0 512 512">
                            <path
                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                        </svg>
                    </a>
                    <a href="#" class="size-12 bg-[#353533] rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7 fill-white" viewBox="0 0 496 512">
                            <path
                                d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z" />
                        </svg>
                    </a>
                    <a href="#" class="size-12 bg-[#353533] rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7 fill-white" viewBox="0 0 448 512">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg>
                    </a>
                </div>
                <div class="w-full flex justify-center lg:justify-normal gap-4">
                    <a href="#" class="block">
                        <img src="./img/enamad.png" class="max-w-28 rounded-xl" alt="">
                    </a>
                    <a href="#" class="block">
                        <img src="./img/enamad.png" class="max-w-28 rounded-xl" alt="">
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-2/4 flex flex-col items-center gap-4 lg:gap-8">
                <ul class="w-full flex flex-col lg:flex-row justify-center gap-4">
                    <li>
                        <a href="#" class="text-sm text-[#C3924D] font-bolc py-2 lg:py-4 block">
                            خانه
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-200 font-bolc py-2 lg:py-4 block">
                            قیمت لحظه ای
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-200 font-bolc py-2 lg:py-4 block">
                            خدمات
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-200 font-bolc py-2 lg:py-4 block">
                            تجزیه و تحلیل
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-200 font-bolc py-2 lg:py-4 block">
                            همکاری
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-200 font-bolc py-2 lg:py-4 block">
                            درباره ما
                        </a>
                    </li>
                </ul>
                <p class="text-xs text-white items-center gap-1 mt-10 hidden lg:flex">
                    <span>&#169;</span>
                    کلیه حقوق این وبسایت برای برند طلا و جواهرات ستاری محفوظ است
                </p>
            </div>
            <div class="lg:w-1/4 w-full flex flex-col items-center lg:items-end justify-center gap-4 lg:gap-8">
                <a href="#" class="w-1/2 gap-3 flex flex-col justify-center items-center">
                    <img src="./img/logo.png" class="w-full" alt="">
                    <span class="text-white font-bold">Sattari Gold</span>
                </a>
                <p class="text-xs text-white flex items-center gap-1 mt-10 lg:hidden">
                    <span>&#169;</span>
                    کلیه حقوق این وبسایت برای برند طلا و جواهرات ستاری محفوظ است
                </p>
            </div>
        </div>
    </footer>
    <!-- footer -->


    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/filterStore.js') }}"></script>
</body>

</html>
