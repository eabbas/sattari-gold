<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/filters.js') }}"></script>
    <title>@yield('title')</title>
    <script>
        let url = "{{ url('/') }}/"
        let api = "{{ url('api/') }}/"
        let imgPath = "{{ asset('storage/') }}/"
        let flag = "{{ Auth::check() }}"
        let userId = null;
        let user = null
        if(flag){
            userId = "{{ Auth::id() }}"
            user = "{{ Auth::user() }}"
        }
    </script>
</head>

<body>
    <header class="fixed top-0 right-0 w-full flex justify-center py-4 transition-all duration-300 z-999" id="mainHeader">
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