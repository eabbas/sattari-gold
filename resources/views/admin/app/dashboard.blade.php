<!DOCTYPE html>

<html lang="fa" dir="rtl">



<head>


    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">


    <link rel="stylesheet" href="{{ url('assets/css/MultiSelect.css') }}" type="text/css">



    <title>@yield('title')</title>




    <script src="{{ asset('assets/js/tailwind.js') }}"></script>


    <script src="{{ asset('assets/js/jquery.js') }}"></script>




    <script>
        let url = "{{ url('/') }}/";

        let api = "{{ url('api/') }}/";

        let imgPath = "{{ asset('storage/') }}/";

        let flag = @json(Auth::check());

        let userId = @json(Auth::id());

        let user = @json(Auth::user());
    </script>

</head>



<body class="m-0 bg-[#f6f8fa] text-[#263238]">



    {{-- Header --}}

    <header
        class="relative z-50 flex h-[76px] w-full items-center justify-between border-b border-[#edf0f2] bg-white px-8 max-lg:h-[66px] max-lg:px-[18px] max-sm:h-[60px] max-sm:px-3">



        <div class="flex items-center gap-6 max-lg:gap-3">



            <button type="button" onclick="hamburger_menu_dashboard('open')" aria-label="باز کردن منو"
                class="hidden h-10 w-10 flex-col items-center justify-center gap-[5px] rounded-xl transition hover:bg-[#f6f8fa] max-lg:flex">



                <span class="h-0.5 w-5 rounded-full bg-[#34434d]"></span>

                <span class="h-0.5 w-5 rounded-full bg-[#34434d]"></span>

                <span class="h-0.5 w-5 rounded-full bg-[#34434d]"></span>

            </button>



            <a href="{{ route('home') }}" class="flex h-12 items-center justify-center">

                @if ($logo)
                    <img src="{{ asset('storage/' . $logo->logo) }}" alt="لوگو"
                        class="h-11 w-11 object-contain max-sm:h-[38px] max-sm:w-[38px]">
                @endif

            </a>



        </div>



        <div class="flex items-center gap-[18px] max-sm:gap-2">



            {{-- User Dropdown --}}

            <div class="relative" id="user_dropdown">



                <button type="button" onclick="user_pup_up()"
                    class="flex items-center gap-2.5 rounded-xl px-3 py-[9px] transition hover:bg-[#f6f8fa] max-sm:gap-[7px] max-sm:p-[7px]">



                    <span
                        class="flex h-[34px] w-[34px] items-center justify-center rounded-[11px] bg-[#e9f7f1] text-[#16a37a] max-sm:h-[30px] max-sm:w-[30px]">

                        <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="currentColor">


                            <circle cx="12" cy="8" r="4" />


                            <path d="M4 21a8 8 0 0 1 16 0z" />


                        </svg>

                    </span>



                    <span class="text-[13px] font-semibold text-[#34434d] max-sm:text-[11px]">

                        {{ Auth::user()['name'] }} {{ Auth::user()['family'] }}

                    </span>



                    <svg id="user_dropdown_arrow" class="h-3.5 w-3.5 text-[#87929e] transition-transform duration-200"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">


                        <path d="m6 9 6 6 6-6" />


                    </svg>



                </button>



                <div id="user_pup_up_item"
                    class="invisible absolute left-0 top-[calc(100%+10px)] z-50 w-[230px] -translate-y-2 overflow-hidden rounded-[14px] border border-transparent bg-white opacity-0 shadow-[0_4px_24px_rgba(30,50,65,.08)] transition-all duration-200">



                    <a href="{{ route('user.profile') }}"
                        class="flex items-center gap-3 rounded-lg p-3 text-[13px] text-[#596773] transition hover:bg-[#f6f8fa] hover:text-[#16a37a]">



                        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">


                            <circle cx="12" cy="8" r="4" />


                            <path d="M4 21a8 8 0 0 1 16 0" />


                        </svg>



                        <span>حساب کاربری</span>



                        @if (count(Auth::user()->roles) > 0)
                            <span class="mr-auto whitespace-nowrap text-[10px] text-[#a0aab3]">

                                {{ Auth::user()->roles[0]['name'] }}

                            </span>
                        @endif

                    </a>



                    <a href="{{ route('user.logout') }}"
                        class="flex items-center gap-3 rounded-lg p-3 text-[13px] text-[#e05252] transition hover:bg-[#fff1f1]">



                        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                            <path d="M10 17l5-5-5-5M15 12H3m9-9h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7" />


                        </svg>



                        <span>خروج از حساب</span>

                    </a>



                </div>



            </div>



            {{-- Notifications --}}

            <button type="button" aria-label="اعلان‌ها"
                class="relative flex h-10 w-10 items-center justify-center rounded-xl bg-[#f6f8fa] text-[#65727e] max-sm:h-[35px] max-sm:w-[35px]">



                <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                    <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9ZM10 21h4" />


                </svg>



                <span class="absolute right-2 top-2 h-2 w-2 rounded-full border-2 border-[#f6f8fa] bg-[#e05252]"></span>

            </button>



        </div>



    </header>



    {{-- Dashboard --}}

    <main
        class="flex h-[calc(100dvh-76px)] items-stretch gap-6 p-6 px-7 max-lg:h-[calc(100dvh-66px)] max-lg:gap-0 max-lg:p-[18px] max-sm:h-[calc(100dvh-60px)] max-sm:p-3">



        {{-- Sidebar Overlay --}}

        <div id="hamburger_menu_dashboard_item_close" onclick="hamburger_menu_dashboard('close')"
            class="invisible fixed inset-0 z-[60] bg-[rgba(20,32,40,.35)] opacity-0 transition-all duration-300">

        </div>



        {{-- Sidebar --}}

        <aside id="hamburger_menu_dashboard_item"
            class="relative flex h-full w-[270px] min-w-[270px] flex-col overflow-hidden rounded-[18px] border border-[#edf0f2] bg-white p-3 transition-transform duration-300 max-lg:fixed max-lg:bottom-0 max-lg:right-0 max-lg:top-0 max-lg:z-[70] max-lg:h-dvh max-lg:w-[285px] max-lg:min-w-[285px] max-lg:translate-x-full max-lg:rounded-l-[20px] max-lg:rounded-r-none max-lg:p-[18px]">



            <div class="px-[13px] pb-4 pt-3 text-[11px] font-bold text-[#a0aab3]">

                منوی اصلی

            </div>




            <nav
                class="min-h-0 flex-1 flex flex-col gap-1 overflow-y-auto overflow-x-hidden px-0.5 pb-3 [scrollbar-color:#e5e9ec_transparent] [scrollbar-width:thin]">




                {{-- Main Links --}}

                <a href="{{ route('home') }}"
                    class="flex min-h-11 items-center gap-3 rounded-[11px] px-3 py-2.5 text-[12.5px] font-medium transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('home')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                    @if (Route::is('home')) data-active="true" @endif>



                    <svg class="h-[19px] w-[19px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                        <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1V10Z" />


                    </svg>

                    خانه

                </a>



                <a href="{{ route('user.profile') }}"
                    class="flex min-h-11 items-center gap-3 rounded-[11px] px-3 py-2.5 text-[12.5px] font-medium transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('user.profile')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                    @if (Route::is('user.profile')) data-active="true" @endif>



                    <svg class="h-[19px] w-[19px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                        <circle cx="12" cy="8" r="4" />


                        <path d="M4 21a8 8 0 0 1 16 0" />


                    </svg>

                    پروفایل

                </a>



                {{-- Financial Management --}}

                <div class="my-2 h-px bg-[#edf0f2]"></div>



                <button type="button" data-submenu-toggle aria-expanded="false"
                    class="flex min-h-11 w-full items-center gap-3 rounded-[11px] px-3 py-2.5 text-[12.5px] font-semibold text-[#596773] transition hover:bg-[#f6f9f8]">



                    <svg class="h-[19px] w-[19px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                        <rect x="2" y="5" width="20" height="15" rx="3" />


                        <path d="M2 10h20M16 15h2M6 5V3h12v2" />


                    </svg>



                    <span>مدیریت مالی</span>



                    <svg class="mr-auto h-4 w-4 shrink-0 transition-transform duration-200" data-submenu-arrow
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">


                        <path d="m6 9 6 6 6-6" />


                    </svg>

                </button>



                <div data-submenu class="max-h-0 overflow-hidden transition-[max-height] duration-300 ease-in-out">



                    <div class="mr-6 flex flex-col gap-1 border-r border-[#edf0f2] pr-3">



                        <a href="{{ route('wallet.wallet', [Auth::user()]) }}"
                            class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('wallet.wallet')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                            @if (Route::is('wallet.wallet')) data-active="true" @endif>



                            <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">


                                <rect x="3" y="5" width="18" height="16" rx="3" />


                                <path d="M3 9h18M16 15h2M6 5V3h12v2" />


                            </svg>

                            کیف پول

                        </a>



                        <a href="{{ route('wallet.userTransactions', [Auth::user()]) }}"
                            class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('wallet.userTransactions')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                            @if (Route::is('wallet.userTransactions')) data-active="true" @endif>



                            <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                                <path d="M3 12a9 9 0 1 0 2.5-6.2L3 8" />


                                <path d="M3 3v5h5M12 7v5l3 2" />


                            </svg>

                            تراکنش‌های من

                        </a>



                        <a href="{{ route('creditCard.create') }}"
                            class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('creditCard.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                            @if (Route::is('creditCard.create')) data-active="true" @endif>



                            <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">


                                <rect x="2" y="5" width="20" height="14" rx="3" />


                                <path d="M2 10h20M6 15h4" />


                            </svg>

                            مدیریت کارت‌ها

                        </a>



                        @can('access', ['transactionsList'])
                            <a href="{{ route('wallet.transactionsList') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('wallet.transactionsList')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('wallet.transactionsList')) data-active="true" @endif>



                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                                    <path d="M12 3v18M7 8l5-5 5 5M7 16l5 5 5-5" />


                                </svg>

                                واریز و برداشت

                            </a>
                        @endcan




                    </div>

                </div>



                {{-- Deals --}}

                <button type="button" data-submenu-toggle aria-expanded="false"
                    class="flex min-h-11 w-full items-center gap-3 rounded-[11px] px-3 py-2.5 text-[12.5px] font-semibold text-[#596773] transition hover:bg-[#f6f9f8]">



                    <svg class="h-[19px] w-[19px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />


                    </svg>



                    <span>معاملات</span>



                    <svg class="mr-auto h-4 w-4 shrink-0 transition-transform duration-200" data-submenu-arrow
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">


                        <path d="m6 9 6 6 6-6" />


                    </svg>

                </button>



                <div data-submenu class="max-h-0 overflow-hidden transition-[max-height] duration-300 ease-in-out">

                    <div class="mr-6 flex flex-col gap-1 border-r border-[#edf0f2] pr-3">



                        <a href="{{ route('deal.create') }}"
                            class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('deal.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                            @if (Route::is('deal.create')) data-active="true" @endif>



                            <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">


                                <circle cx="12" cy="12" r="9" />


                                <path d="M12 7v10M8 10h6a2 2 0 0 1 0 4H8" />


                            </svg>

                            شروع معامله جدید

                        </a>



                        <a href="{{ route('deal.list') }}"
                            class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('deal.list')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                            @if (Route::is('deal.list')) data-active="true" @endif>



                            <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">


                                <path d="M3 12a9 9 0 1 0 2.5-6.2L3 8" />


                                <path d="M3 3v5h5M12 7v5l3 2" />


                            </svg>

                            معاملات من

                        </a>



                        @can('access', ['deal_index'])
                            <a href="{{ route('deal.adminIndex') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('deal.adminIndex')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('deal.adminIndex')) data-active="true" @endif>



                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <path d="M4 7h16M4 17h16M8 3 4 7l4 4M16 13l4 4-4 4" />


                                </svg>

                                همه معاملات

                            </a>
                        @endcan




                    </div>

                </div>



                {{-- Store --}}

                <button type="button" data-submenu-toggle aria-expanded="false"
                    class="flex min-h-11 w-full items-center gap-3 rounded-[11px] px-3 py-2.5 text-[12.5px] font-semibold text-[#596773] transition hover:bg-[#f6f9f8]">



                    <svg class="h-[19px] w-[19px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                        <path d="M3 3h2l2.4 12.2a2 2 0 0 0 2 1.8h8.8a2 2 0 0 0 2-1.7L22 8H6" />


                        <circle cx="10" cy="21" r="1" />


                        <circle cx="18" cy="21" r="1" />


                    </svg>



                    <span>فروشگاه</span>



                    <svg class="mr-auto h-4 w-4 shrink-0 transition-transform duration-200" data-submenu-arrow
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">


                        <path d="m6 9 6 6 6-6" />


                    </svg>

                </button>



                <div data-submenu class="max-h-0 overflow-hidden transition-[max-height] duration-300 ease-in-out">

                    <div class="mr-6 flex flex-col gap-1 border-r border-[#edf0f2] pr-3">



                        <a href="{{ route('product.index') }}"
                            class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('product.index')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                            @if (Route::is('product.index')) data-active="true" @endif>



                            <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">


                                <path d="M6 7h12l1 14H5L6 7Z" />


                                <path d="M9 9V6a3 3 0 0 1 6 0v3" />


                            </svg>

                            محصولات

                        </a>



                        @can('access', ['category_show'])
                            <a href="{{ route('category.adminIndex') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('category.adminIndex')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('category.adminIndex')) data-active="true" @endif>



                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <path
                                        d="M3 6a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6Z" />


                                    <path d="M3 9h18" />


                                </svg>

                                دسته‌بندی محصولات

                            </a>
                        @endcan



                        @can('access', ['product_show'])
                            <a href="{{ route('product.adminIndex') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('product.adminIndex')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('product.adminIndex')) data-active="true" @endif>



                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <path d="m12 3 9 5-9 5-9-5 9-5Z" />


                                    <path d="m3 12 9 5 9-5M3 16l9 5 9-5" />


                                </svg>

                                مدیریت کالاها

                            </a>
                        @endcan



                        <a href="{{ route('order.userOrders') }}"
                            class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('order.userOrders')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                            @if (Route::is('order.userOrders')) data-active="true" @endif>



                            <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">


                                <rect x="4" y="3" width="16" height="18" rx="1" />


                                <path d="M8 8h8M8 12h8M8 16h5" />


                            </svg>

                            سفارشات من

                        </a>



                        @can('access', ['order_show'])
                            <a href="{{ route('order.index') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('order.index')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('order.index')) data-active="true" @endif>



                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <rect x="5" y="3" width="14" height="18" rx="2" />


                                    <path d="M9 8h6M9 12h6M9 16h4" />


                                </svg>

                                لیست سفارشات

                            </a>
                        @endcan




                    </div>

                </div>



                {{-- User Management --}}

                <div class="my-2 h-px bg-[#edf0f2]"></div>



                <div class="px-[13px] pb-2 pt-3 text-[10px] font-bold text-[#a0aab3]">

                    مدیریت کاربران

                </div>



                @can('access', ['user_index'])
                    <a href="{{ route('user.index') }}"
                        class="flex min-h-11 items-center gap-3 rounded-[11px] px-3 py-2.5 text-[12.5px] font-medium transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('user.index')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                        @if (Route::is('user.index')) data-active="true" @endif>



                        <svg class="h-[19px] w-[19px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">


                            <circle cx="9" cy="8" r="3.5" />


                            <path d="M2 20a7 7 0 0 1 14 0M16 5.5a3.5 3.5 0 0 1 0 6.8M18 15a6 6 0 0 1 4 5" />


                        </svg>

                        لیست کاربران

                    </a>
                @endcan



                @can('access', ['role_create'])
                    <a href="{{ route('role.create') }}"
                        class="flex min-h-11 items-center gap-3 rounded-[11px] px-3 py-2.5 text-[12.5px] font-medium transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('role.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                        @if (Route::is('role.create')) data-active="true" @endif>



                        <svg class="h-[19px] w-[19px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">


                            <rect x="3" y="4" width="18" height="16" rx="2" />


                            <circle cx="8" cy="10" r="2" />


                            <path d="M5 16a3 3 0 0 1 6 0M13 9h5M13 13h5M13 17h3" />


                        </svg>

                        تعیین دسترسی و مجوزها

                    </a>
                @endcan



                {{-- Settings --}}

                <div class="my-2 h-px bg-[#edf0f2]"></div>



                <div class="px-[13px] pb-2 pt-3 text-[10px] font-bold text-[#a0aab3]">

                    تنظیمات و مدیریت سیستم

                </div>



                <button type="button" data-submenu-toggle aria-expanded="false"
                    class="flex min-h-11 w-full items-center gap-3 rounded-[11px] px-3 py-2.5 text-[12.5px] font-semibold text-[#596773] transition hover:bg-[#f6f9f8]">



                    <svg class="h-[19px] w-[19px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">


                        <circle cx="12" cy="12" r="3" />


                        <path
                            d="m19.4 15 .1.1 1.4 1.1-1.4 2.4-1.7-.7a8 8 0 0 1-1.7 1l-.3 1.8h-2.8l-.3-1.8a8 8 0 0 1-1.7-1l-1.7.7-1.4-2.4 1.4-1.1a8 8 0 0 1 0-2l-1.4-1.1 1.4-2.4 1.7.7a8 8 0 0 1 1.7-1l.3-1.8h2.8l.3 1.8a8 8 0 0 1 1.7 1l1.7-.7 1.4 2.4-1.4 1.1a8 8 0 0 1 0 2Z" />


                    </svg>



                    <span>تنظیمات سیستم</span>



                    <svg class="mr-auto h-4 w-4 shrink-0 transition-transform duration-200" data-submenu-arrow
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">


                        <path d="m6 9 6 6 6-6" />


                    </svg>

                </button>



                <div data-submenu class="max-h-0 overflow-hidden transition-[max-height] duration-300 ease-in-out">

                    <div class="mr-6 flex flex-col gap-1 border-r border-[#edf0f2] pr-3">



                        @can('access', ['livePrice'])
                            <a href="{{ route('price.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('price.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('price.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />


                                </svg>

                                تنظیمات قیمت‌ها

                            </a>
                        @endcan



                        @can('access', ['transactionConfirmTime'])
                            <a href="{{ route('transactionConfirmTime.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('transactionConfirmTime.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('transactionConfirmTime.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <circle cx="12" cy="12" r="9" />


                                    <path d="M12 7v5l3 2" />


                                </svg>

                                زمان تأیید معامله

                            </a>
                        @endcan



                        @can('access', ['currency'])
                            <a href="{{ route('currencyUnit.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('currencyUnit.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('currencyUnit.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <circle cx="12" cy="12" r="9" />


                                    <path d="M12 6v12M16 9h-5a2 2 0 0 0 0 4h3a2 2 0 0 1 0 4H8" />


                                </svg>

                                واحد پولی

                            </a>
                        @endcan



                        @can('access', ['priceLine'])
                            <a href="{{ route('line.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('line.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('line.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <path d="M3 17 9 11l4 4 8-9" />


                                    <path d="M15 6h6v6" />


                                </svg>

                                تعیین ارزش خط

                            </a>
                        @endcan



                        @can('access', ['transactionSetting'])
                            <a href="{{ route('transactionSetting.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('transactionSetting.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('transactionSetting.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <circle cx="12" cy="12" r="3" />


                                    <path
                                        d="M19 12a7 7 0 0 0-.1-1.2l1.4-1.1-1.4-2.4-1.7.7a7 7 0 0 0-1.7-1L15.2 5h-2.8l-.3 2a7 7 0 0 0-1.7 1l-1.7-.7-1.4 2.4 1.4 1.1a7 7 0 0 0 0 2l-1.4 1.1 1.4 2.4 1.7-.7a7 7 0 0 0 1.7 1l.3 1.9h2.8l.3-1.9a7 7 0 0 0 1.7-1l1.7.7 1.4-2.4-1.4-1.1A7 7 0 0 0 19 12Z" />


                                </svg>

                                تنظیمات تراکنش‌ها

                            </a>
                        @endcan



                        @can('access', ['header'])
                            <a href="{{ route('header.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('header.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('header.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <rect x="3" y="4" width="18" height="16" rx="2" />


                                    <path d="M3 9h18M7 6.5h.01M10 6.5h.01" />


                                </svg>

                                تنظیمات هدر

                            </a>
                        @endcan



                        @can('access', ['logo'])
                            <a href="{{ route('logo.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('logo.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('logo.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <rect x="3" y="3" width="18" height="18" rx="3" />


                                    <circle cx="8.5" cy="8.5" r="1.5" />


                                    <path d="m21 15-5-5L5 21" />


                                </svg>

                                تنظیمات لوگو

                            </a>
                        @endcan



                        @can('access', ['comment'])
                            <a href="{{ route('comment.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('comment.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('comment.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <path
                                        d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5 9 9 0 0 1-4-.9L3 21l1.9-5.5a9 9 0 0 1-.9-4A8.5 8.5 0 0 1 12.5 3h.5a8.5 8.5 0 0 1 8 8v.5Z" />


                                    <path d="M8 12h8M8 8h5" />


                                </svg>

                                تنظیمات نظرات

                            </a>
                        @endcan



                        @can('access', ['message_create'])
                            <a href="{{ route('message.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('message.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('message.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <path
                                        d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5 9 9 0 0 1-4-.9L3 21l1.9-5.5a9 9 0 0 1-.9-4A8.5 8.5 0 0 1 12.5 3h.5a8.5 8.5 0 0 1 8 8v.5Z" />


                                </svg>

                                پیام‌ها

                            </a>
                        @endcan



                        @can('access', ['referenceSite_create'])
                            <a href="{{ route('referenceSite.create') }}"
                                class="flex min-h-10 items-center gap-3 rounded-lg px-3 py-2 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] @if (Route::is('referenceSite.create')) bg-[#e9f7f1] font-bold text-[#11845f] @else text-[#687681] @endif"
                                @if (Route::is('referenceSite.create')) data-active="true" @endif>

                                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">


                                    <path
                                        d="M14 3h7v7M10 14 21 3M19 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h6" />


                                </svg>

                                سایت‌های مرجع

                            </a>
                        @endcan




                    </div>

                </div>




            </nav>



        </aside>



        {{-- Content --}}

        <section
            class="h-full min-w-0 flex-1 overflow-y-auto overflow-x-hidden px-0.5 pb-5 [scrollbar-color:#dce3e7_transparent] [scrollbar-width:thin] max-sm:px-0">



            <div class="w-full min-w-0">

                @yield('content')

            </div>



        </section>



    </main>



    @include('app.bottomMenu')




    <script src="{{ asset('assets/js/app.js') }}" defer></script>


    <script src="{{ asset('assets/js/MultiSelect.js') }}" defer></script>



</body>



</html>
