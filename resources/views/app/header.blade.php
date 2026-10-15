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
        if (flag) {
            userId = "{{ Auth::id() }}"
            user = "{{ Auth::user() }}"
        }
    </script>
</head>

<body>
    <header class="fixed top-0 right-0 w-full flex justify-center py-4 transition-all duration-300 z-999" id="mainHeader">
        <div class="2xl:container w-full mx-auto">
            <div class="w-11/12 mx-auto flex items-center justify-between">
                <div class="lg:w-1/4 flex justify-start items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="lsm:w-8 w-6 fill-[#c39862] lg:hidden cursor-pointer"
                        id="hamburgerMenu" viewBox="0 0 448 512">
                        <path
                            d="M0 88C0 74.7 10.7 64 24 64H424c13.3 0 24 10.7 24 24s-10.7 24-24 24H24C10.7 112 0 101.3 0 88zM0 248c0-13.3 10.7-24 24-24H424c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zM448 408c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H424c13.3 0 24 10.7 24 24z" />
                    </svg>
                    @if ($logo)
                    <a href="{{ route($logo->link) }}" class="max-lg:hidden">
                        <img src="{{ asset('storage/' . $logo->logo) }}" class="size-15" alt="">
                    </a>
                    @endif
                </div>
                <ul class="w-1/2 hidden lg:flex justify-center items-center gap-7">
                    {{-- @foreach ($menus as $index => $menu)
                        @if ($index == 0)
                            <li>
                                <a href="{{ route($menu->link) }}"
                    class="relative py-4 px-2 xl:text-lg font-bold after:absolute after:content-[''] after:min-w-full after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 transition-all duration-300 hover:text-[#C3924D] text-[#c3924d]">{{ $menu->title }}</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route($menu->link) }}"
                            class="relative py-4 px-2 xl:text-lg font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D]">{{ $menu->title }}</a>
                    </li>
                    @endif
                    @endforeach --}}
                    <li>
                        <a href="{{ route('home') }}"
                            class="relative py-2 px-2 xl:text-lg font-bold after:absolute after:content-[''] after:min-w-full after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 transition-all duration-300 hover:text-[#C3924D] text-[#c3924d]">خانه</a>
                    </li>
                    <li class="relative drop_down">
                        <div class="flex items-center">
                            <span
                                class="py-2 px-2 xl:text-lg font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D] cursor-pointer">دسته
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
                                <a href="{{ route('search.relatedProducts', [$category]) }}"
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
                            class="relative py-2 px-2 xl:text-lg font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D]">محصولات</a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative py-2 px-2 xl:text-lg font-bold text-gray-700 after:absolute after:content-[''] after:min-w-0 after:transition-all after:duration-300 after:h-0.75 after:rounded-full after:bg-[#c3924d] after:bottom-0 after:right-0 hover:after:min-w-full transition-all duration-300 hover:text-[#C3924D]">درباره
                            ما</a>
                    </li>
                </ul>
                <div class="lg:w-1/4 flex gap-4 justify-end items-center">
                    <div class="flex items-center gap-4 p-1.5 bg-white rounded-full border-2 border-gray-200">
                        @if (!Auth::check())
                        <a href="{{ route('user.login') }}" class="flex items-center gap-3 rounded-full px-4 py-2"
                            style="background:#94570E; background: linear-gradient(0deg, rgba(148, 87, 14, 1) 0%, rgba(219, 167, 96, 1) 100%);">
                            <div class="flex items-center gap-1 font-bold">
                                <span class="text-white text-sm">ورود</span>
                                <span class="text-white text-sm">/</span>
                                <span class="text-white text-sm">ثبت نام</span>
                            </div>
                        </a>
                        @endif
                        <button id="openSearchSectionBtn" class="cursor-pointer rounded-full bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6 text-gray-800"><path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z"/></svg>
                        </button>
                    </div>
                    @if (Auth::check())
                    <a href="{{ route('user.profile') }}" class="cursor-pointer p-2 rounded-full bg-white max-lg:hidden">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-6 text-gray-800"><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        {{-- search section --}}
        <div class="fixed w-full h-dvh top-0 right-0 bg-black/50 transition-all duration-300 backdrop-blur-xs invisible opacity-0"
            id="searchSection">
            <form action="{{ route('search.page') }}" method="POST"
                class="w-full py-3 px-5 bg-white relative -translate-y-full transition-all duration-500">
                @csrf
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 lg:w-6 fill-gray-500 cursor-pointer absolute right-10 top-1/2 -translate-y-1/2 max-md:hidden"
                    viewBox="0 0 448 512">
                    <path
                        d="M440.6 273.4c4.7-4.5 7.4-10.8 7.4-17.4s-2.7-12.8-7.4-17.4l-176-168c-9.6-9.2-24.8-8.8-33.9 .8s-8.8 24.8 .8 33.9L364.1 232 24 232c-13.3 0-24 10.7-24 24s10.7 24 24 24l340.1 0L231.4 406.6c-9.6 9.2-9.9 24.3-.8 33.9s24.3 9.9 33.9 .8l176-168z" />
                </svg>
                <div
                    class="w-11/12 lg:w-10/12 mx-auto flex items-center gap-2 lg:gap-3.5 border-1 py-1.5 px-3 border-gray-200 rounded-full">
                    <input type="text" name="title" class="w-full py-1 outline-none" placeholder="جستجو ..."
                        id="" required>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-400 w-4 lg:w-6" viewBox="0 0 512 512">
                            <path
                                d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        {{-- search section --}}
        <!-- hamburger menu -->
        <div class="fixed w-full h-dvh top-0 right-0 bg-black/40 backdrop-blur-xs transition-all duration-300 invisible opacity-0 z-2"
            id="menuBlock">
            <div class="w-2/3 bg-white h-full transition-all duration-300 ease-in-out delay-200 translate-x-full">
                <div class="w-full flex justify-center p-4 border-b-2 border-[#A56920]/30">
                    @if ($logo)
                    <a href="{{ route($logo->link) }}">
                        <img src="{{ asset('storage/' . $logo->logo) }}" class="w-20 lg:w-24" alt="">
                    </a>
                    @endif
                </div>
                <ul class="w-full p-5 flex flex-col items-start gap-5">
                    <li class="w-full">
                        <a href="{{ route('home') }}"
                            class="text-[#c3924d] sm:text-lg font-bold py-3 block border-b-1 border-[#c3924d]/30">خانه</a>
                    </li>
                    <li class="w-full border-b-1 border-[#c3924d]/30">
                        <div class="w-full cursor-pointer flex items-center gap-4 menu_item">
                            <span class="text-gray-800 sm:text-lg font-bold py-3 block ">دسته
                                بندی</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="size-4 fill-[#c3924d] transition-all duration-300">
                                <path
                                    d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z">
                                </path>
                            </svg>
                        </div>
                        <ul class="space-y-3 text-gray-700 max-h-0 overflow-auto mr-5 transition-all duration-300">
                            @foreach ($categories as $category)
                            <li>
                                <a
                                    href="{{ route('search.relatedProducts', [$category]) }}">{{ $category->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="w-full">
                        <a href="#"
                            class="text-gray-800 sm:text-lg font-bold py-3 block border-b-1 border-[#c3924d]/30">محصولات
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="#"
                            class="text-gray-800 sm:text-lg font-bold py-3 block border-b-1 border-[#c3924d]/30">درباره
                            ما</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- hamburger menu -->

        <!-- button_menu_start -->
        <div class="w-full  fixed bottom-1 right-0 flex justify-center lg:hidden">
            <div class="w-97/100 min-h-full bg-white rounded-full px-4 py-2 flex sm:gap-3 gap-2 items-center shadow-[0_0_10px_5px] shadow-gray-200">
                <div class="w-1/4 h-full flex justify-center items-center">
                    <a href="" class="flex flex-col gap-1 items-center">
                        <div class="sm:p-2 p-1.5 rounded-full" style="background: #A56920; background: linear-gradient(0deg, rgba(165, 105, 32, 1) 0%, rgba(227, 171, 90, 1) 100%);">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="sm:size-5 size-4 fill-white">
                                <path d="M272.5 5.7c9-7.6 22.1-7.6 31.1 0l264 224c10.1 8.6 11.4 23.7 2.8 33.8s-23.7 11.3-33.8 2.8L512 245.5V432c0 44.2-35.8 80-80 80H144c-44.2 0-80-35.8-80-80V245.5L39.5 266.3c-10.1 8.6-25.3 7.3-33.8-2.8s-7.3-25.3 2.8-33.8l264-224zM288 55.5L112 204.8V432c0 17.7 14.3 32 32 32h48V312c0-22.1 17.9-40 40-40H344c22.1 0 40 17.9 40 40V464h48c17.7 0 32-14.3 32-32V204.8L288 55.5zM240 464h96V320H240V464z" />
                            </svg>
                        </div>
                        <span class="text-[#A56920] font-bold max-sm:text-xs">خانه</span>
                    </a>
                </div>
                <span class="w-0.5 h-1/2 bg-[#e5b369] rounded-full"></span>
                <div class="w-1/4 h-full flex justify-center items-center">
                    <a href="#" class="flex flex-col gap-1 items-center">
                        <div class="sm:p-2 p-1.5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4 fill-[#A56920]">
                                <path d="M160 112v48H288V112c0-35.3-28.7-64-64-64s-64 28.7-64 64zm-48 96H48V416c0 26.5 21.5 48 48 48H352c26.5 0 48-21.5 48-48V208H336v56c0 13.3-10.7 24-24 24s-24-10.7-24-24V208H160v56c0 13.3-10.7 24-24 24s-24-10.7-24-24V208zm0-48V112C112 50.1 162.1 0 224 0s112 50.1 112 112v48h64c26.5 0 48 21.5 48 48V416c0 53-43 96-96 96H96c-53 0-96-43-96-96V208c0-26.5 21.5-48 48-48h64z" />
                            </svg>
                        </div>
                        <span class="text-[#A56920] font-bold max-sm:text-xs">محصولات</span>
                    </a>
                </div>
                <span class="w-0.5 h-1/2 bg-[#e5b369] rounded-full"></span>
                <div class="w-1/4 h-full flex justify-center items-center">
                    <a href="{{ route('user.profile') }}" class="flex flex-col gap-1 items-center">

                        <div class="sm:p-2 p-1.5 rounded-full bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4 fill-[#A56920]"><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                        </div>

                        <span class="text-[#A56920] font-bold max-sm:text-xs">پروفایل</span>
                    </a>
                </div>
                <span class="w-0.5 h-1/2 bg-[#e5b369] rounded-full"></span>
                <div class="w-1/4 h-full flex justify-center items-center">
                    <a href="" class="flex flex-col gap-1 items-center">

                        <div class="sm:p-2 p-1.5 rounded-full bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4 fill-[#A56920]"><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                        </div>

                        <span class="text-[#A56920] font-bold max-sm:text-xs">سپرده طلا</span>
                    </a>
                </div>

            </div>
        </div>
        <!-- button_menu_start -->
    </header>