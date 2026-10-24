<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/MultiSelect.css') }}" type="text/css">
    <title>@yield('title')</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

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
    {{-- header --}}
    <section class="w-full py-2 bg-white flex gap-1 justify-between items-center px-3 z-2">

        <div class="h-full flex gap-6 justify-start items-center">
            <div class="flex flex-col gap-[3px] items-start justify-center lg:hidden"
                onclick="hamburger_menu_dashboard('open')">
                <span class="sm:w-5 sm:h-[3px] w-5 h-0.5 bg-black rounded-full"></span>
                <span class="sm:w-5 sm:h-[3px] w-5 h-0.5 bg-black rounded-full"></span>
                <span class="sm:w-5 sm:h-[3px] w-5 h-0.5 bg-black rounded-full"></span>
            </div>
            <a href="{{ route('home') }}" class=" h-full flex justify-center items-center">
                @if ($logo)
                    <img src="{{ asset('storage/' . $logo->logo) }}" alt="" class="size-12">
                @endif
            </a>
        </div>
        <div class="h-full flex gap-4 justify-end items-center">
            <div class="flex justify-start items-center relative group">
                <div class="flex gap-2 justify-start items-center" onclick="user_pup_up()">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-4 size-3">
                            <path
                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z">
                            </path>
                        </svg>
                    </div>
                    <span class="sm:text-sm text-xs">{{ Auth::user()['name'] }} {{ Auth::user()['family'] }}</span>
                </div>
                <div class="w-full h-dvh bg-black/30 fixed top-0 right-0 z-4 invisible opacity-0 transition_normal"
                    id="user_pup_up_item_colse" onclick="user_pup_up('open')"></div>
                <div class="max-h-0 bg-white absolute top-7 left-0 group-hover:max-h-50 group-hover:p-2 group-hover:border-1   overflow-y-hidden transition_normal z-6 rounded-xl"
                    id="user_pup_up_item">

                    <a href="{{ route('user.profile') }}"
                        class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4">
                            <path
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z">
                            </path>
                        </svg>
                        <span class="text-sm text-[#5b5c75] text-nowrap">حساب کاربری</span>
                    </a>
                    <a href="{{ route('user.logout') }}"
                        class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 20 20" id="entypo-log-out" class="w-4 fill-red-500">
                            <g>
                                <path
                                    d="M19 10l-6-5v3H6v4h7v3l6-5zM3 3h8V1H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H3V3z">
                                </path>
                            </g>
                        </svg>
                        <span class="text-sm text-red-500">خروج</span>
                    </a>

                </div>
            </div>
            <div class="relative sm:p-2.5 p-1.5 rounded-full bg-(--border)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4">
                    <path
                        d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112v25.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V208c0-61.9 50.1-112 112-112zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                </svg>
                <span class="sm:size-2 size-1 bg-red-500 rounded-full absolute top-1.5 right-1.5"></span>
            </div>
        </div>

    </section>
    {{-- header --}}
    <section
        class="w-full max-h-[91vh] h-[92vh] flex lg:justify-start justify-center items-start max-lg:pb-23 max-sm:pb-18">
        <!-- dashboard_start -->
        <div class="w-full h-dvh bg-black/50 fixed top-0 right-0 invisible opacity-0 transition_normal lg:hidden z-3"
            onclick="hamburger_menu_dashboard('close')" id="hamburger_menu_dashboard_item_close"></div>
        <div class="bg-white h-dvh p-1.5 justify-start max-lg:translate-x-full transition_normal z-99999 max-lg:fixed top-0 right-0"
            id="hamburger_menu_dashboard_item">
            <div class="w-full h-full flex flex-col gap-6 justify-start items-start rounded-l-4xl">
                <!-- item_dashboard -->
                <div class="w-full flex flex-col gap-2 justify-start items-start p-5 max-h-full overflow-y-auto">
                    <a href="{{ route('home') }}"
                        class="px-2 py-2 @if (Route::is('home')) bg-green-300 @endif rounded-xl flex gap-3 justify-start items-center max-lg:hidden"
                        title="خانه">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="xl:size-4 size-5">
                                <path
                                    d="M272.5 5.7c9-7.6 22.1-7.6 31.1 0l264 224c10.1 8.6 11.4 23.7 2.8 33.8s-23.7 11.3-33.8 2.8L512 245.5V432c0 44.2-35.8 80-80 80H144c-44.2 0-80-35.8-80-80V245.5L39.5 266.3c-10.1 8.6-25.3 7.3-33.8-2.8s-7.3-25.3 2.8-33.8l264-224zM288 55.5L112 204.8V432c0 17.7 14.3 32 32 32h48V312c0-22.1 17.9-40 40-40H344c22.1 0 40 17.9 40 40V464h48c17.7 0 32-14.3 32-32V204.8L288 55.5zM240 464h96V320H240V464z" />
                            </svg>
                        </div>
                        <span>خانه</span>
                    </a>
                    <a href="{{ route('product.index') }}"
                        class="px-2 py-2 @if (Route::is('product.index')) bg-green-300 @endif rounded-xl flex gap-3 justify-start items-center max-lg:hidden"
                        title="محصولات">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="xl:size-4 size-5">
                                <path
                                    d="M160 112v48H288V112c0-35.3-28.7-64-64-64s-64 28.7-64 64zm-48 96H48V416c0 26.5 21.5 48 48 48H352c26.5 0 48-21.5 48-48V208H336v56c0 13.3-10.7 24-24 24s-24-10.7-24-24V208H160v56c0 13.3-10.7 24-24 24s-24-10.7-24-24V208zm0-48V112C112 50.1 162.1 0 224 0s112 50.1 112 112v48h64c26.5 0 48 21.5 48 48V416c0 53-43 96-96 96H96c-53 0-96-43-96-96V208c0-26.5 21.5-48 48-48h64z" />
                            </svg>
                        </div>
                        <span>محصولات</span>
                    </a>
                    <a href="{{ route('user.profile') }}"
                        class="px-2 py-2 @if (Route::is('user.profile')) bg-green-300 @endif rounded-xl flex gap-3 justify-start items-center max-lg:hidden"
                        title="پروفایل">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="xl:size-4 size-5">
                                <path stroke-width="2"
                                    d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                            </svg>
                        </div>
                        <span>پروفایل</span>
                    </a>
                    <a href="{{ route('wallet.wallet', [Auth::user()]) }}"
                        class="px-2 py-2 rounded-xl @if (Route::is('wallet.wallet')) bg-green-300 @endif flex gap-3 justify-start items-center max-lg:hidden"
                        title="کیف پول">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5">
                                <path
                                    d="M88 32C39.4 32 0 71.4 0 120V392c0 48.6 39.4 88 88 88H424c48.6 0 88-39.4 88-88V216c0-48.6-39.4-88-88-88H120c-13.3 0-24 10.7-24 24s10.7 24 24 24H424c22.1 0 40 17.9 40 40V392c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V120c0-22.1 17.9-40 40-40H456c13.3 0 24-10.7 24-24s-10.7-24-24-24H88zM384 336a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                            </svg>
                        </div>
                        <span>کیف پول</span>
                    </a>
                    <a href="{{ route('deal.create') }}"
                        class="px-2 py-2 rounded-xl @if (Route::is('deal.create')) bg-green-300 @endif flex gap-3 justify-start items-center"
                        title="شروع معامله جدید">
                        <div>
                            <svg viewBox="0 0 512 512" class="xl:size-5 size-6">
                                <g>
                                    <path class="st0"
                                        d="M243.9,379.6c-0.3-0.5-0.6-1.1-1-1.6c-7.3-11.9-22.4-17.5-35.2-11.1c-0.3,0.2-0.5,0.3-0.8,0.4   c-7.6,4-11.7,6.2-19.6,10.4c-7,3.7-16.2,0.1-20.3-8.2c-9.8-20.6-18.4-41.4-25.7-62.5c-2.9-8.3-5.6-16.7-8.1-25.1   c-5.2-18.8-9.4-37.8-12.8-57.2c-2-11.6-3.7-23.2-5.1-35c-0.9-9.2,4.9-17.2,12.8-17.8c1.3-0.1,2.4-0.2,3.5-0.3   c7-0.5,11.5-0.8,19.5-1.4c14.3-1.4,24.1-14.2,23.9-28.1c-0.2-12.3-0.2-19.3,0.4-30.1c0.1-1.8,0.2-3.6,0.3-5.6   c0.6-13.9-8.6-27.3-22.9-29.2c-4.3-0.5-7.6-0.8-10.8-1.2c-3-0.3-6.1-0.7-10.1-1.1c-20.4-2.2-90.4-6.8-94.9,62.8   c1.2,56.7,9.2,111.8,23.9,164.9c15.7,52.8,38.2,103.7,67.3,152.4c40.9,56.6,97.7,15.5,113.8,2.8c6.6-5.2,9.9-7.8,16.5-13   c4.4-3.7,7.1-8.4,8.4-13.5c1.9-7.8,0.3-16.5-4.5-23.4C254.6,396.7,250.7,390.7,243.9,379.6z" />
                                    <path class="st0"
                                        d="M279.6,274h-38.7c-3.9,0-7,3.1-7,7s3.1,7,7,7h25.2v16.1c0,3.9,3.1,7,7,7c3.9,0,7-3.1,7-7V288   c17.8-0.3,32.2-14.8,32.2-32.7c0-18-14.7-32.7-32.7-32.7h-13c-10.3,0-18.7-8.4-18.7-18.7c0-10.3,8.4-18.7,18.7-18.7h38.7   c3.9,0,7-3.1,7-7c0-3.9-3.1-7-7-7h-25.2v-16.1c0-3.9-3.1-7-7-7c-3.9,0-7,3.1-7,7v16.1c-17.8,0.3-32.2,14.8-32.2,32.7   c0,18,14.7,32.7,32.7,32.7h13c10.3,0,18.7,8.4,18.7,18.7C298.3,265.6,289.9,274,279.6,274z" />
                                    <path class="st1"
                                        d="M273.1,27.8c-42.8,0-82.6,13.3-115.2,36.1c17.6,3.8,30.4,19.2,31.8,37.7c24-15.7,52.6-24.8,83.4-24.8   c84.4,0,152.8,68.4,152.8,152.8c0,84.4-68.4,152.8-152.8,152.8c-3.8,0-7.6-0.1-11.3-0.4c3.6,5.7,7,10.6,12.1,17.9l0.1,0.1   c6.4,9.3,9,20.5,7.3,31.3c107.7-4.3,193.6-92.9,193.6-201.6C474.9,118.2,384.6,27.8,273.1,27.8z" />
                                </g>
                            </svg>
                        </div>
                        <span class="text-nowrap">شروع معامله</span>
                    </a>
                    <a href="{{ route('deal.list') }}"
                        class="px-2 py-2 rounded-xl @if (Route::is('deal.list')) bg-green-300 @endif flex gap-3 justify-start items-center"
                        title="معاملات من">
                        <div>
                            <svg viewBox="0 0 16 16" class="xl:size-4 size-5">
                                <path
                                    d="m.427 1.927 1.215 1.215a8.002 8.002 0 1 1-1.6 5.685.75.75 0 1 1 1.493-.154 6.5 6.5 0 1 0 1.18-4.458l1.358 1.358A.25.25 0 0 1 3.896 6H.25A.25.25 0 0 1 0 5.75V2.104a.25.25 0 0 1 .427-.177ZM7.75 4a.75.75 0 0 1 .75.75v2.992l2.028.812a.75.75 0 0 1-.557 1.392l-2.5-1A.751.751 0 0 1 7 8.25v-3.5A.75.75 0 0 1 7.75 4Z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-nowrap">معاملات من</span>
                    </a>
                    @can('access', ['admin'])
                        <a href="{{ route('wallet.transactionsList') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('wallet.transactionsList')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="واریز و برداشت">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="xl:size-4 size-5">
                                    <path
                                        d="M216 32c0-13.3-10.7-24-24-24s-24 10.7-24 24V152H48c-13.3 0-24 10.7-24 24s10.7 24 24 24H168V320c0 13.3 10.7 24 24 24s24-10.7 24-24V200H336c13.3 0 24-10.7 24-24s-10.7-24-24-24H216V32zM8 488c0 13.3 10.7 24 24 24H352c13.3 0 24-10.7 24-24s-10.7-24-24-24H32c-13.3 0-24 10.7-24 24z" />
                                </svg>
                            </div>
                            <span class="text-nowrap">واریز و برداشت</span>
                        </a>
                        <a href="{{ route('deal.adminIndex') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('deal.adminIndex')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="معاملات">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="xl:size-4 size-5 rotate-90">
                                    <path
                                        d="M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 141.3V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.3l41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96zm352 333.3c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L448 370.7V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V370.7l-41.4-41.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96z" />
                                </svg>
                            </div>
                            <span class="text-nowrap">همه معاملات</span>
                        </a>
                        <a href="{{ route('user.index') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('user.index')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="لیست کاربران">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="xl:size-4 size-5">
                                    <path
                                        d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM405.3 320H618.7c11.8 0 21.3-9.6 21.3-21.3C640 239.8 592.2 192 533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 38.2-16.8 72.5-43.3 96c.2 0 .4 0 .7 0zM320 176a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm0 144a96 96 0 1 0 0-192 96 96 0 1 0 0 192zm-58.7 80H378.7c39.8 0 73.2 27.2 82.6 64H178.7c9.5-36.8 42.9-64 82.6-64zm0-48C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H485.3c14.7 0 26.7-11.9 26.7-26.7C512 411.7 452.3 352 378.7 352H261.3z" />
                                </svg>
                            </div>
                            <span class="text-nowrap">لیست کاربران</span>
                        </a>
                        <a href="{{ route('category.adminIndex') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('category.adminIndex')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="دسته بندی محصولات">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5">
                                    <path
                                        d="M64 80c0-26.5 21.5-48 48-48h80c17.7 0 33.6 7.1 45.3 19.7L248.3 64H400c26.5 0 48 21.5 48 48v32H64V80z" />
                                    <path
                                        d="M64 160v272c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V160H64zm48 64h288v208H112V224zm40 40c-13.3 0-24 10.7-24 24s10.7 24 24 24h208c13.3 0 24-10.7 24-24s-10.7-24-24-24H152z" />
                                </svg>
                            </div>
                            <span class="text-nowrap">دسته بندی محصولات</span>
                        </a>
                        <a href="{{ route('product.adminIndex') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('product.adminIndex')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="مدیریت کالا">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 20 20" id="entypo-dropbox" class="xl:size-4 size-5">
                                    <g>
                                        <path
                                            d="M6.109.902L.4 4.457l3.911 3.279L10 4.043 6.109.902zm7.343 15.09a.44.44 0 0 1-.285-.102L10 13.262l-3.167 2.629a.447.447 0 0 1-.529.03l-2.346-1.533v.904L10 19.098l6.042-3.807v-.904l-2.346 1.533a.44.44 0 0 1-.244.072zM19.6 4.457L13.89.902 10 4.043l5.688 3.693L19.6 4.457zM10 11.291l3.528 2.928 5.641-3.688-3.481-2.795L10 11.291zm-3.528 2.928L10 11.291 4.311 7.736l-3.48 2.795 5.641 3.688z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <span class="text-nowrap">مدیریت کالاها</span>
                        </a>
                        <a href="{{ route('Message.insert') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('Message.insert')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="پیام ها">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5">
                                    <path
                                        d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z" />
                                </svg>
                            </div>
                            <span class="text-nowrap">پیام ها</span>
                        </a>
                        <a href="{{ route('referenceSite.create') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('referenceSite.create')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="سایت های مرجع">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="xl:size-4 size-5">
                                    <path
                                        d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z" />
                                </svg>
                            </div>
                            <span class="text-nowrap">سایت های مرجع</span>
                        </a>
                        <a href="{{ route('transactionSetting.create') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('transactionSetting.create')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="تنظیمات تراکنش ها">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5">
                                <path
                                    d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                            </svg>
                            <span class="text-nowrap">تنظیمات تراکنش ها</span>
                        </a>
                        <a href="{{ route('header.create') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('header.create')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="تنظیمات هدر">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5">
                                <path
                                    d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                            </svg>
                            <span class="text-nowrap">تنظیمات هدر</span>
                        </a>
                        <a href="{{ route('logo.create') }}"
                            class="px-2 py-2 rounded-xl @if (Route::is('logo.create')) bg-green-300 @endif flex gap-3 justify-start items-center"
                            title="تنظیمات لوگو">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="xl:size-4 size-5">
                                <path
                                    d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                            </svg>
                            <span class="text-nowrap">تنظیمات لوگو</span>
                        </a>
                    @endcan
                </div>
                <!-- item_dashboard -->
            </div>
        </div>
        <!-- dashboard_end -->
        <div class="w-97/100 h-full overflow-y-auto flex flex-col gap-5 justify-start items-center py-5">
            <div class="w-98/100 flex justify-start items-center">
                @yield('content')
            </div>
        </div>
    </section>
    @include('app.bottomMenu')
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/MultiSelect.js') }}" defer></script>
</body>

</html>
