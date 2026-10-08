<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
</head>

<body>
    
    <!-- heder_dashboard_mobilre_start -->
    <section class="w-full h-[9vh] py-2 bg-white flex gap-1 justify-between items-center px-3 z-2">

        <div class="h-full flex gap-4 justify-start items-center">
            <div class="flex flex-col gap-[3px] items-start justify-center " onclick="hamburger_menu_dashboard('open')">
                <span class="sm:w-5 sm:h-[3px] w-5 h-0.5 bg-black rounded-full"></span>
                <span class="sm:w-5 sm:h-[3px] w-5 h-0.5 bg-black rounded-full"></span>
                <span class="sm:w-5 sm:h-[3px] w-5 h-0.5 bg-black rounded-full"></span>
            </div>
            <div class=" h-full flex justify-center items-center">
                <img src="{{asset('img/logo.webp')}}" alt="" class="sm:size-10 size-9">
            </div>
        </div>
        <div class="h-full flex sm:gap-5 gap-3 justify-end items-center">
            <div class="flex justify-start items-center relative group">
                <div class="flex gap-2 justify-start items-center" onclick="user_pup_up()">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-4 size-3">
                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                        </svg>
                    </div>
                    <span class="sm:text-sm text-xs">محمد رضا علیافام</span>
                </div>
                <div class="w-full h-dvh bg-black/30 fixed top-0 right-0 z-4 invisible opacity-0 transition_normal" id="user_pup_up_item_colse" onclick="user_pup_up('open')"></div>
                <div class="max-h-0 bg-white absolute top-7 left-0 group-hover:max-h-50 group-hover:p-2 group-hover:border-1   overflow-y-hidden transition_normal z-6 rounded-xl" id="user_pup_up_item">

                    <a href="" class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4">
                            <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"></path>
                        </svg>
                        <span class="text-sm text-[#5b5c75] text-nowrap">حساب کاربری</span>
                    </a>
                    <a href="" class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" id="entypo-log-out" class="w-4 fill-red-500">
                            <g>
                                <path d="M19 10l-6-5v3H6v4h7v3l6-5zM3 3h8V1H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H3V3z"></path>
                            </g>
                        </svg>
                        <span class="text-sm text-red-500">خروج</span>
                    </a>

                </div>
            </div>
            <!-- <div class="sm:p-2.5 p-1.5 rounded-full bg-(--border)">
                
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4">
                    <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                </svg>
            </div> -->
            <div class="relative sm:p-2.5 p-1.5 rounded-full bg-(--border)">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4">
                    <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                </svg> -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4">
                    <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112v25.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V208c0-61.9 50.1-112 112-112zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                </svg>
                <span class="sm:size-2 size-1 bg-red-500 rounded-full absolute top-1.5 right-1.5"></span>
            </div>
        </div>

    </section>
    <!-- heder_dashboard_mobile_end -->


     <section class="w-full max-h-[91vh] h-[92vh] flex lg:justify-start justify-center items-start">

        <!-- dashboard_start -->
        <div class="w-full h-dvh bg-black/50 fixed top-0 right-0 invisible opacity-0 transition_normal lg:hidden z-3" onclick="hamburger_menu_dashboard('close')" id="hamburger_menu_dashboard_item_close"></div>
        <div class="xl:w-3/100 bg-white h-full flex flex-col p-1.5 justify-start items-start max-lg:translate-x-full transition_normal z-3 max-lg:fixed lg:top-10 top- right-0" id="hamburger_menu_dashboard_item">
            <div class="w-full h-full flex flex-col gap-6 justify-start items-start rounded-l-4xl py-5">
                <!-- <div class="w-full flex gap-3 justify-start items-center">
                    <img src="{{asset('img/logo.webp')}}" alt="" class="xl:size-15 size-11">
                    <div class="flex flex-col gap-2 justify-start items-start">
                        <h2 class="xl:text-2xl text-xl text-white">برسو گلد</h2>
                        <span class="text-(--text-muted) xl:text-sm text-xs">سرمایه امن ، آینده روشن</span>
                    </div>
                </div> -->
                <!-- item_dashboard -->
                <div class="w-full flex flex-col gap-2 justify-start items-center">
                    @can('access', ['admin'])
                    <div class="px-2 py-2 bg-green-300 rounded-xl flex gap-3 justify-start items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="xl:size-4 size-5 fill-green-700">
                                <path d="M272.5 5.7c9-7.6 22.1-7.6 31.1 0l264 224c10.1 8.6 11.4 23.7 2.8 33.8s-23.7 11.3-33.8 2.8L512 245.5V432c0 44.2-35.8 80-80 80H144c-44.2 0-80-35.8-80-80V245.5L39.5 266.3c-10.1 8.6-25.3 7.3-33.8-2.8s-7.3-25.3 2.8-33.8l264-224zM288 55.5L112 204.8V432c0 17.7 14.3 32 32 32h48V312c0-22.1 17.9-40 40-40H344c22.1 0 40 17.9 40 40V464h48c17.7 0 32-14.3 32-32V204.8L288 55.5zM240 464h96V320H240V464z"></path>
                            </svg>
                        </div>
                        <!-- <span class="xl:text-lg text-white font-bold">داشبورد</span> -->
                    </div>
                    <div class="px-3 py-3 rounded-xl flex gap-3 justify-start items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5">
                                <path d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zM160 224c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm128-64V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V160c0-17.7 14.3-32 32-32s32 14.3 32 32zm64 32c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V224c0-17.7 14.3-32 32-32zM480 96V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V96c0-17.7 14.3-32 32-32s32 14.3 32 32z" />
                            </svg>
                        </div>
                        
                    </div>
                   
                    <div class="px-3 py-3 rounded-xl flex gap-3 justify-start items-center">
                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" id="entypo-dropbox" class="xl:size-4 size-5"><g><path d="M6.109.902L.4 4.457l3.911 3.279L10 4.043 6.109.902zm7.343 15.09a.44.44 0 0 1-.285-.102L10 13.262l-3.167 2.629a.447.447 0 0 1-.529.03l-2.346-1.533v.904L10 19.098l6.042-3.807v-.904l-2.346 1.533a.44.44 0 0 1-.244.072zM19.6 4.457L13.89.902 10 4.043l5.688 3.693L19.6 4.457zM10 11.291l3.528 2.928 5.641-3.688-3.481-2.795L10 11.291zm-3.528 2.928L10 11.291 4.311 7.736l-3.48 2.795 5.641 3.688z"></path></g></svg>
                    </div>
                    <a href="{{ route('deal.adminIndex') }}" class="px-3 py-3 rounded-xl flex gap-3 justify-start items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="xl:size-4 size-5 rotate-90">
                            <path d="M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 141.3V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.3l41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96zm352 333.3c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L448 370.7V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V370.7l-41.4-41.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96z" />
                        </svg>
                        <!-- <span class="xl:text-lg text-white font-bold">داشبورد</span> -->
                    </a>
                    <a href="{{ route('wallet.transactionsList') }}" class="px-3 py-3 rounded-xl flex gap-3 justify-start items-center @if (Route::is('wallet.transactionsList')) text-[#FF0000] @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="xl:size-4 size-5">
                            <path d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z" />
                        </svg>
                    </a>
                    
                    <a href="{{ route('user.index') }}" class="px-3 py-3 rounded-xl flex gap-3 justify-start items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="xl:size-4 size-5"><path d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM405.3 320H618.7c11.8 0 21.3-9.6 21.3-21.3C640 239.8 592.2 192 533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 38.2-16.8 72.5-43.3 96c.2 0 .4 0 .7 0zM320 176a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm0 144a96 96 0 1 0 0-192 96 96 0 1 0 0 192zm-58.7 80H378.7c39.8 0 73.2 27.2 82.6 64H178.7c9.5-36.8 42.9-64 82.6-64zm0-48C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H485.3c14.7 0 26.7-11.9 26.7-26.7C512 411.7 452.3 352 378.7 352H261.3z"/></svg>
                    </a>
                    <div class="px-3 py-3 rounded-xl flex gap-3 justify-start items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="xl:size-4 size-5"><path d="M88 0C39.4 0 0 39.4 0 88V424c0 48.6 39.4 88 88 88H552c48.6 0 88-39.4 88-88V88c0-48.6-39.4-88-88-88H88zM48 88c0-22.1 17.9-40 40-40H552c22.1 0 40 17.9 40 40V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V88zm272 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM268.4 274c-1.1 .2-2.2 .5-3.3 .7c-25.7 6.3-47.4 22.9-60.3 45.3c-8.2 14.1-12.8 30.5-12.8 48c0 17.7 14.3 32 32 32H416c17.7 0 32-14.3 32-32c0-17.5-4.7-33.9-12.8-48c-1.1-1.8-2.2-3.6-3.3-5.4c-13.1-19.6-33.3-34.1-56.9-39.9c-1.1-.3-2.2-.5-3.3-.7c-6.3-1.3-12.9-2-19.6-2H320 288c-6.7 0-13.3 .7-19.6 2zm7-49.5a72 72 0 1 0 89.2-113.1A72 72 0 1 0 275.4 224.5zM397.3 352H242.7c6.6-18.6 24.4-32 45.3-32h64c20.9 0 38.7 13.4 45.3 32zM223.8 160a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM96 293.3c0 14.7 11.9 26.7 26.7 26.7h46.6c13.7-33.9 41.5-60.6 76.2-72.8c-7.9-4.6-17-7.2-26.8-7.2H149.3C119.9 240 96 263.9 96 293.3zM470.7 320h46.6c14.7 0 26.7-11.9 26.7-26.7c0-29.5-23.9-53.3-53.3-53.3H421.3c-9.8 0-18.9 2.6-26.8 7.2c34.6 12.2 62.5 38.9 76.2 72.8zM512 160a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/></svg>
                        </div>
                        
                    </div>
                    <div class="px-3 py-3 rounded-xl flex gap-3 justify-start items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5"><path d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z"/></svg>
                        </div>
                        
                    </div>
                      @endcan

                </div>
                <!-- item_dashboard -->
            </div>
        </div>
        <!-- dashboard_end -->
        <!-- dashbord_dashbord_items_start -->
        <div class="w-97/100 h-full overflow-y-auto flex flex-col gap-5 justify-start items-center py-5">
            <!-- tab_sub_items_dashboard -->

            <div class="w-98/100 bg-white rounded-xl py-2 px-4 flex justify-start items-center">
                <ul class="max-w-full flex gap-4 lg:gap-6 xl:gap-7 text-sm lg:text-base justify-start font-bold overflow-x-auto [&amp;::-webkit-scrollbar]:h-1.5  [&amp;::-webkit-scrollbar-thumb]:bg-(--border)  [&amp;::-webkit-scrollbar-thumb]:rounded-full text-nowrap py-2">
                    @can('access', ['admin'])
                    <li class="text-(--active) flex justify-center flex-col items-center cursor-pointer py-1 group transition_normal">
                        <div class="flex gap-2 justify-start items-center px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="xl:size-5 size-5 fill-green-700">
                                    <path d="M272.5 5.7c9-7.6 22.1-7.6 31.1 0l264 224c10.1 8.6 11.4 23.7 2.8 33.8s-23.7 11.3-33.8 2.8L512 245.5V432c0 44.2-35.8 80-80 80H144c-44.2 0-80-35.8-80-80V245.5L39.5 266.3c-10.1 8.6-25.3 7.3-33.8-2.8s-7.3-25.3 2.8-33.8l264-224zM288 55.5L112 204.8V432c0 17.7 14.3 32 32 32h48V312c0-22.1 17.9-40 40-40H344c22.1 0 40 17.9 40 40V464h48c17.7 0 32-14.3 32-32V204.8L288 55.5zM240 464h96V320H240V464z"></path>
                                </svg>
                            </div>
                            <span>خانه</span>
                        </div>
                        <div class="rounded-md w-full bg-(--active) h-[2px] transition_normal"></div>
                    </li>
                    <!-- <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                        <div class="flex gap-2 justify-start items-center px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5">
                                    <path d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zM160 224c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm128-64V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V160c0-17.7 14.3-32 32-32s32 14.3 32 32zm64 32c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V224c0-17.7 14.3-32 32-32zM480 96V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V96c0-17.7 14.3-32 32-32s32 14.3 32 32z"></path>
                                </svg>
                            </div>
                            <span>نمودار ها</span>
                        </div>
                        <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                    </li> -->
                    <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                        <div class="flex gap-2 justify-start items-center px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" id="entypo-dropbox" class="xl:size-4 size-5"><g><path d="M6.109.902L.4 4.457l3.911 3.279L10 4.043 6.109.902zm7.343 15.09a.44.44 0 0 1-.285-.102L10 13.262l-3.167 2.629a.447.447 0 0 1-.529.03l-2.346-1.533v.904L10 19.098l6.042-3.807v-.904l-2.346 1.533a.44.44 0 0 1-.244.072zM19.6 4.457L13.89.902 10 4.043l5.688 3.693L19.6 4.457zM10 11.291l3.528 2.928 5.641-3.688-3.481-2.795L10 11.291zm-3.528 2.928L10 11.291 4.311 7.736l-3.48 2.795 5.641 3.688z"></path></g></svg>
                            </div>
                            <span>مدیریت کالا ها</span>
                        </div>
                        <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                    </li>
                    <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                        <div class="flex gap-2 justify-start items-center px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="xl:size-4 size-5"><path d="M88 0C39.4 0 0 39.4 0 88V424c0 48.6 39.4 88 88 88H552c48.6 0 88-39.4 88-88V88c0-48.6-39.4-88-88-88H88zM48 88c0-22.1 17.9-40 40-40H552c22.1 0 40 17.9 40 40V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V88zm272 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM268.4 274c-1.1 .2-2.2 .5-3.3 .7c-25.7 6.3-47.4 22.9-60.3 45.3c-8.2 14.1-12.8 30.5-12.8 48c0 17.7 14.3 32 32 32H416c17.7 0 32-14.3 32-32c0-17.5-4.7-33.9-12.8-48c-1.1-1.8-2.2-3.6-3.3-5.4c-13.1-19.6-33.3-34.1-56.9-39.9c-1.1-.3-2.2-.5-3.3-.7c-6.3-1.3-12.9-2-19.6-2H320 288c-6.7 0-13.3 .7-19.6 2zm7-49.5a72 72 0 1 0 89.2-113.1A72 72 0 1 0 275.4 224.5zM397.3 352H242.7c6.6-18.6 24.4-32 45.3-32h64c20.9 0 38.7 13.4 45.3 32zM223.8 160a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM96 293.3c0 14.7 11.9 26.7 26.7 26.7h46.6c13.7-33.9 41.5-60.6 76.2-72.8c-7.9-4.6-17-7.2-26.8-7.2H149.3C119.9 240 96 263.9 96 293.3zM470.7 320h46.6c14.7 0 26.7-11.9 26.7-26.7c0-29.5-23.9-53.3-53.3-53.3H421.3c-9.8 0-18.9 2.6-26.8 7.2c34.6 12.2 62.5 38.9 76.2 72.8zM512 160a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"></path></svg>
                            </div>
                            <span>دسته بندی مشتریان</span>
                        </div>
                        <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                    </li>
                    

                    
                    
                    <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                        <a href="{{ route('user.index') }}" class="flex gap-2 justify-start items-center px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="xl:size-4 size-5"><path d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM405.3 320H618.7c11.8 0 21.3-9.6 21.3-21.3C640 239.8 592.2 192 533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 38.2-16.8 72.5-43.3 96c.2 0 .4 0 .7 0zM320 176a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm0 144a96 96 0 1 0 0-192 96 96 0 1 0 0 192zm-58.7 80H378.7c39.8 0 73.2 27.2 82.6 64H178.7c9.5-36.8 42.9-64 82.6-64zm0-48C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H485.3c14.7 0 26.7-11.9 26.7-26.7C512 411.7 452.3 352 378.7 352H261.3z"/></svg>

                            </div>
                            <span>کاربران</span>
                        </a>
                        <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                    </li>
                    <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                        <div class="flex gap-2 justify-start items-center px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" id="entypo-dropbox" class="xl:size-4 size-5"><g><path d="M6.109.902L.4 4.457l3.911 3.279L10 4.043 6.109.902zm7.343 15.09a.44.44 0 0 1-.285-.102L10 13.262l-3.167 2.629a.447.447 0 0 1-.529.03l-2.346-1.533v.904L10 19.098l6.042-3.807v-.904l-2.346 1.533a.44.44 0 0 1-.244.072zM19.6 4.457L13.89.902 10 4.043l5.688 3.693L19.6 4.457zM10 11.291l3.528 2.928 5.641-3.688-3.481-2.795L10 11.291zm-3.528 2.928L10 11.291 4.311 7.736l-3.48 2.795 5.641 3.688z"></path></g></svg>
                            </div>
                            <span>مدیریت کالا ها</span>
                        </div>
                        <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                    </li>
                    
                    <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                        <a href="{{ route('deal.adminIndex') }}" class="flex gap-2 justify-start items-center px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="xl:size-4 size-5 rotate-90">
                                    <path d="M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 141.3V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.3l41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96zm352 333.3c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L448 370.7V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V370.7l-41.4-41.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96z"></path>
                                </svg>
                            </div>
                            <span>معاملات</span>
                        </a>
                        <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                    </li>
                    <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                        <a href="{{ route('wallet.transactionsList') }}" class="flex gap-2 justify-start items-center px-2 @if (Route::is('wallet.transactionsList')) text-[#FF0000] @endif">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="xl:size-4 size-5">
                                    <path d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"></path>
                                </svg>
                            </div>
                            <span>واریز و برداشت</span>
                        </a>
                        <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                    </li>
                    <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                        <div class="flex gap-2 justify-start items-center px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5"><path d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z"/></svg>
                            </div>
                            <span>تنظیمات</span>
                        </div>
                        <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                    </li>
                    @endcan
                </ul>
            </div>
            <!-- tab_sub_items_dashboard -->

            <div class="w-98/100 flex justify-start items-center">
                @yield('content')
            </div>

           
        </div>


    </section>


    <script src="{{ asset('assets/js/app.js') }}" defer></script>
</body>

</html>
