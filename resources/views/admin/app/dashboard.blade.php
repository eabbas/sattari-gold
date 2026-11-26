<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/MultiSelect.css') }}" type="text/css">

    <title>@yield('title')</title>

    <script src="{{ asset('assets/js/num2persian.js') }}"></script>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <script>
        let url = "{{ url('/') }}/";
        let api = "{{ url('api/') }}/";
        let imgPath = "{{ asset('storage/') }}/";
        let flag = "{{ Auth::check() }}";
        let userId = null;
        let user = null;

        if (flag) {
            userId = "{{ Auth::id() }}";
            user = "{{ Auth::user() }}";
        }
    </script>
</head>

<body class="m-0 min-h-screen bg-[#f6f8fa] text-[#263238]">

    {{-- Header --}}
    <header
        class="relative z-50 flex h-[76px] w-full items-center justify-between border-b border-[#edf0f2] bg-white px-4 sm:px-6 lg:px-8">

        <div class="flex items-center gap-4 sm:gap-6">

            <button type="button"
                class="flex h-10 w-10 flex-col items-center justify-center gap-[5px] rounded-[11px] transition hover:bg-[#f6f8fa] lg:hidden"
                onclick="hamburger_menu_dashboard('open')" aria-label="باز کردن منو">
                <span class="h-0.5 w-5 rounded bg-[#34434d]"></span>
                <span class="h-0.5 w-5 rounded bg-[#34434d]"></span>
                <span class="h-0.5 w-5 rounded bg-[#34434d]"></span>
            </button>

            <a href="{{ route('home') }}" class="flex h-12 items-center justify-center">
                @if ($logo)
                    <img src="{{ asset('storage/' . $logo->logo) }}" alt="لوگو" class="h-11 w-11 object-contain">
                @endif
            </a>

        </div>

        <div class="flex items-center gap-2 sm:gap-[18px]">

            {{-- User --}}
            <div class="dashboard-user relative z-[60]">

                <div class="dashboard-user-trigger flex cursor-pointer items-center gap-2 rounded-xl px-2 py-2 transition hover:bg-[#f6f8fa] sm:gap-[10px] sm:px-3"
                    onclick="user_pup_up()">

                    <div
                        class="dashboard-user-avatar flex h-[34px] w-[34px] items-center justify-center rounded-[11px] bg-[#e9f7f1] text-[#16a37a]">
                        <svg class="h-[19px] w-[19px] fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 12a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm0 2c-4.42 0-8 2.24-8 5v2h16v-2c0-2.76-3.58-5-8-5Z" />
                        </svg>
                    </div>

                    <span class="text-xs font-bold text-[#34434d]">
                        {{ Auth::user()['name'] }} {{ Auth::user()['family'] }}
                    </span>

                    <svg class="h-3.5 w-3.5 fill-[#87929e]" viewBox="0 0 24 24">
                        <path d="m6 9 6 6 6-6z" />
                    </svg>

                </div>

                <div class="dashboard-user-dropdown invisible absolute left-0 top-full z-[60] mt-2 max-h-0 w-[230px] origin-top-left overflow-hidden rounded-[14px] border border-transparent bg-white px-2 opacity-0 shadow-lg transition-all duration-200"
                    id="user_pup_up_item">

                    <a href="{{ route('user.profile') }}"
                        class="flex items-center gap-3 rounded-lg p-3 text-[13px] text-[#596773] transition hover:bg-[#f6f8fa] hover:text-[#16a37a]">
                        <svg class="h-[17px] w-[17px] shrink-0 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 12a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm0 2c-4.42 0-8 2.24-8 5v2h16v-2c0-2.76-3.58-5-8-5Z" />
                        </svg>

                        <span>حساب کاربری</span>

                        @if (count(Auth::user()->roles) > 0)
                            <span class="mr-auto whitespace-nowrap text-[10px] text-[#a0aab3]">
                                {{ Auth::user()->roles[0]['name'] }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('user.logout') }}"
                        class="flex items-center gap-3 rounded-lg p-3 text-[13px] text-[#e05252] transition hover:bg-red-50">
                        <svg class="h-[17px] w-[17px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 17l5-5-5-5M15 12H3m9-9h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7" />
                        </svg>
                        <span>خروج از حساب</span>
                    </a>

                </div>

                <div id="user_pup_up_item_colse"
                    class="pointer-events-none invisible fixed inset-0 z-40 bg-transparent opacity-0"
                    onclick="user_pup_up('close')"></div>

            </div>

            {{-- Notification --}}
            <div
                class="dashboard-notification relative flex h-10 w-10 cursor-pointer items-center justify-center rounded-xl bg-[#f6f8fa] text-[#65727e]">

                <svg class="h-[19px] w-[19px] fill-none stroke-current" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9ZM10 21h4" />
                </svg>

                <span class="absolute right-2 top-2 h-2 w-2 rounded-full border-2 border-[#f6f8fa] bg-[#e05252]"></span>

            </div>

        </div>

    </header>
    {{-- Header --}}


    {{-- Dashboard --}}
    <main class="flex h-[calc(100dvh-76px)] w-full items-stretch justify-start gap-6 p-3 sm:p-[18px] lg:p-6">

        {{-- Sidebar Overlay --}}
        <div id="hamburger_menu_dashboard_item_close"
            class="pointer-events-none invisible fixed inset-0 z-40 bg-black/35 opacity-0 transition-all duration-300 lg:hidden"
            onclick="hamburger_menu_dashboard('close')"></div>

        {{-- Sidebar --}}
        <aside
            class="dashboard-sidebar fixed right-0 top-0 z-50 flex h-dvh w-[285px] translate-x-full flex-col overflow-hidden rounded-l-[20px] border border-[#edf0f2] bg-white p-3 shadow-xl transition-transform duration-300 ease-in-out lg:sticky lg:top-6 lg:h-full lg:w-[270px] lg:min-w-[270px] lg:translate-x-0 lg:rounded-[18px] lg:shadow-none"
            id="hamburger_menu_dashboard_item">

            {{-- Sidebar Heading --}}
            <div class="shrink-0 px-[13px] pb-4 pt-3 text-[11px] font-bold text-[#a0aab3]">
                منوی اصلی
            </div>



            <nav
                class="dashboard-sidebar-menu flex min-h-0 flex-1 flex-col gap-[5px] overflow-y-auto overflow-x-hidden px-0.5 pb-3">

                {{-- خانه --}}
                <a href="{{ route('home') }}"
                    class="flex min-h-11 items-center gap-3 rounded-[11px] px-3 py-2.5 text-xs font-bold transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('home') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">
                    <svg class="h-[19px] w-[19px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1V10Z" />
                    </svg>
                    خانه
                </a>

                {{-- حساب کاربری --}}
                <details data-submenu class="group" @if (Route::is('user.profile', 'wallet.wallet', 'wallet.userTransactions', 'creditCard.create')) open @endif>
                    <summary
                        class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-2 rounded-[11px] px-3 py-2.5 text-xs font-bold text-[#687681] transition hover:bg-[#f6f9f8] hover:text-[#16a37a] [&::-webkit-details-marker]:hidden {{ Route::is('user.profile', 'wallet.wallet', 'wallet.userTransactions', 'creditCard.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : '' }}">
                        <span class="flex items-center gap-3">
                            <svg class="h-[19px] w-[19px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21a8 8 0 0 1 16 0" />
                            </svg>
                            حساب کاربری
                        </span>
                        <svg class="h-4 w-4 shrink-0 fill-current transition-transform duration-200 group-open:rotate-180"
                            viewBox="0 0 24 24">
                            <path d="m6 9 6 6 6-6z" />
                        </svg>
                    </summary>

                    <div class="mr-5 mt-1 flex flex-col gap-1 border-r-2 border-[#edf0f2] pr-3">
                        <a href="{{ route('user.profile') }}"
                            class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('user.profile') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">پروفایل</a>
                        <a href="{{ route('wallet.wallet', [Auth::user()]) }}"
                            class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('wallet.wallet') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">کیف
                            پول</a>
                        <a href="{{ route('wallet.userTransactions', [Auth::user()]) }}"
                            class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('wallet.userTransactions') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">تراکنش‌های
                            من</a>
                        <a href="{{ route('creditCard.create') }}"
                            class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('creditCard.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">مدیریت
                            کارت‌ها</a>
                    </div>
                </details>

                {{-- خرید و فروش --}}
                <details data-submenu class="group" @if (Route::is('deal.create', 'deal.list', 'order.userOrders', 'product.index')) open @endif>
                    <summary
                        class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-2 rounded-[11px] px-3 py-2.5 text-xs font-bold text-[#687681] transition hover:bg-[#f6f9f8] hover:text-[#16a37a] [&::-webkit-details-marker]:hidden {{ Route::is('deal.create', 'deal.list', 'order.userOrders', 'product.index') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : '' }}">
                        <span class="flex items-center gap-3">
                            <svg class="h-[19px] w-[19px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 7h18v13H3z" />
                                <path d="M7 7V4h10v3M3 12h18M10 12v2h4v-2" />
                            </svg>
                            خرید و فروش
                        </span>
                        <svg class="h-4 w-4 shrink-0 fill-current transition-transform duration-200 group-open:rotate-180"
                            viewBox="0 0 24 24">
                            <path d="m6 9 6 6 6-6z" />
                        </svg>
                    </summary>

                    <div class="mr-5 mt-1 flex flex-col gap-1 border-r-2 border-[#edf0f2] pr-3">
                        <a href="{{ route('deal.create') }}"
                            class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('deal.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">شروع
                            معامله</a>
                        <a href="{{ route('deal.list') }}"
                            class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('deal.list') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">معاملات
                            من</a>
                        <a href="{{ route('order.userOrders') }}"
                            class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('order.userOrders') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">سفارش‌های
                            من</a>
                        {{-- <a href="{{ route('product.index') }}"
                            class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('product.index') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">محصولات</a> --}}
                    </div>
                </details>

                <div class="my-2 h-px shrink-0 bg-[#edf0f2]"></div>
                <div class="shrink-0 px-[13px] pb-2 pt-1 text-[10px] font-bold text-[#a0aab3]">مدیریت سیستم</div>

                {{-- مدیریت معاملات --}}
                @if (Auth::user()->can('access', ['deal_index']) || Auth::user()->can('access', ['order_show']))
                    <details data-submenu class="group" @if (Route::is('deal.adminIndex', 'order.index')) open @endif>
                        <summary
                            class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-2 rounded-[11px] px-3 py-2.5 text-xs font-bold text-[#687681] transition hover:bg-[#f6f9f8] hover:text-[#16a37a] [&::-webkit-details-marker]:hidden {{ Route::is('deal.adminIndex', 'order.index') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : '' }}">
                            <span class="flex items-center gap-3">
                                <svg class="h-[19px] w-[19px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 7h18v14H3zM7 7V4h10v3M3 12h18" />
                                </svg>
                                مدیریت معاملات
                            </span>
                            <svg class="h-4 w-4 shrink-0 fill-current transition-transform duration-200 group-open:rotate-180"
                                viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6z" />
                            </svg>
                        </summary>

                        <div class="mr-5 mt-1 flex flex-col gap-1 border-r-2 border-[#edf0f2] pr-3">
                            @can('access', ['deal_index'])
                                <a href="{{ route('deal.adminIndex') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('deal.adminIndex') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">همه
                                    معاملات</a>
                            @endcan
                            @can('access', ['order_show'])
                                <a href="{{ route('order.index') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('order.index') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">لیست
                                    سفارشات</a>
                            @endcan
                        </div>
                    </details>
                @endif

                {{-- مدیریت مالی --}}
                @if (Auth::user()->can('access', ['livePrice']) ||
                        Auth::user()->can('access', ['transactionConfirmTime']) ||
                        Auth::user()->can('access', ['currency']) ||
                        Auth::user()->can('access', ['priceLine']) ||
                        Auth::user()->can('access', ['transactionsList']) ||
                        Auth::user()->can('access', ['transactionSetting']))
                    <details data-submenu class="group" @if (Route::is(
                            'price.create',
                            'transactionConfirmTime.create',
                            'currencyUnit.create',
                            'line.create',
                            'wallet.transactionsList',
                            'transactionSetting.create')) open @endif>
                        <summary
                            class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-2 rounded-[11px] px-3 py-2.5 text-xs font-bold text-[#687681] transition hover:bg-[#f6f9f8] hover:text-[#16a37a] [&::-webkit-details-marker]:hidden {{ Route::is('price.create', 'transactionConfirmTime.create', 'currencyUnit.create', 'line.create', 'wallet.transactionsList', 'transactionSetting.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : '' }}">
                            <span class="flex items-center gap-3">
                                <svg class="h-[19px] w-[19px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 17h3v4H3zM10 11h4v10h-4zM17 3h4v18h-4z" />
                                </svg>
                                مدیریت مالی
                            </span>
                            <svg class="h-4 w-4 shrink-0 fill-current transition-transform duration-200 group-open:rotate-180"
                                viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6z" />
                            </svg>
                        </summary>

                        <div class="mr-5 mt-1 flex flex-col gap-1 border-r-2 border-[#edf0f2] pr-3">
                            @can('access', ['livePrice'])
                                <a href="{{ route('price.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('price.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">تنظیمات
                                    قیمت</a>
                            @endcan
                            @can('access', ['transactionConfirmTime'])
                                <a href="{{ route('transactionConfirmTime.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('transactionConfirmTime.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">زمان
                                    تأیید معامله</a>
                            @endcan
                            @can('access', ['currency'])
                                <a href="{{ route('currencyUnit.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('currencyUnit.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">واحد
                                    پولی</a>
                            @endcan
                            @can('access', ['priceLine'])
                                <a href="{{ route('line.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('line.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">تعیین
                                    ارزش خط</a>
                            @endcan
                            @can('access', ['transactionsList'])
                                <a href="{{ route('wallet.transactionsList') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('wallet.transactionsList') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">واریز
                                    و برداشت</a>
                            @endcan
                            @can('access', ['transactionSetting'])
                                <a href="{{ route('transactionSetting.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('transactionSetting.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">تنظیمات
                                    تراکنش‌ها</a>
                            @endcan
                        </div>
                    </details>
                @endif

                {{-- مدیریت محصولات --}}
                @if (Auth::user()->can('access', ['category_show']) || Auth::user()->can('access', ['product_show']))
                    <details data-submenu class="group" @if (Route::is('category.adminIndex', 'product.adminIndex')) open @endif>
                        <summary
                            class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-2 rounded-[11px] px-3 py-2.5 text-xs font-bold text-[#687681] transition hover:bg-[#f6f9f8] hover:text-[#16a37a] [&::-webkit-details-marker]:hidden {{ Route::is('category.adminIndex', 'product.adminIndex') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : '' }}">
                            <span class="flex items-center gap-3">
                                <svg class="h-[19px] w-[19px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 8h18l-2 13H5L3 8Z" />
                                    <path d="M7 8l5-5 5 5M9 12v5M15 12v5" />
                                </svg>
                                مدیریت محصولات
                            </span>
                            <svg class="h-4 w-4 shrink-0 fill-current transition-transform duration-200 group-open:rotate-180"
                                viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6z" />
                            </svg>
                        </summary>

                        <div class="mr-5 mt-1 flex flex-col gap-1 border-r-2 border-[#edf0f2] pr-3">
                            @can('access', ['category_show'])
                                <a href="{{ route('category.adminIndex') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('category.adminIndex') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">دسته‌بندی
                                    محصولات</a>
                            @endcan
                            @can('access', ['product_show'])
                                <a href="{{ route('product.adminIndex') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('product.adminIndex') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">مدیریت
                                    کالاها</a>
                            @endcan
                        </div>
                    </details>
                @endif

                {{-- مدیریت کاربران --}}
                @if (Auth::user()->can('access', ['user_index']) || Auth::user()->can('access', ['role_create']))
                    <details data-submenu class="group" @if (Route::is('user.index', 'role.create')) open @endif>
                        <summary
                            class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-2 rounded-[11px] px-3 py-2.5 text-xs font-bold text-[#687681] transition hover:bg-[#f6f9f8] hover:text-[#16a37a] [&::-webkit-details-marker]:hidden {{ Route::is('user.index', 'role.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : '' }}">
                            <span class="flex items-center gap-3">
                                <svg class="h-[19px] w-[19px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="8" r="3.5" />
                                    <path d="M2 20a7 7 0 0 1 14 0M16 5.5a3.5 3.5 0 0 1 0 6.8M18 15a6 6 0 0 1 4 5" />
                                </svg>
                                مدیریت کاربران
                            </span>
                            <svg class="h-4 w-4 shrink-0 fill-current transition-transform duration-200 group-open:rotate-180"
                                viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6z" />
                            </svg>
                        </summary>

                        <div class="mr-5 mt-1 flex flex-col gap-1 border-r-2 border-[#edf0f2] pr-3">
                            @can('access', ['user_index'])
                                <a href="{{ route('user.index') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('user.index') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">لیست
                                    کاربران</a>
                            @endcan
                            @can('access', ['role_create'])
                                <a href="{{ route('role.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('role.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">تعیین
                                    دسترسی و مجوزها</a>
                            @endcan
                        </div>
                    </details>
                @endif

                {{-- مدیریت محتوای سایت --}}
                @if (Auth::user()->can('access', ['message_create']) ||
                        Auth::user()->can('access', ['referenceSite_create']) ||
                        Auth::user()->can('access', ['header']) ||
                        Auth::user()->can('access', ['logo']) ||
                        Auth::user()->can('access', ['comment']))
                    <details data-submenu class="group" @if (Route::is('message.create', 'referenceSite.create', 'header.create', 'logo.create', 'comment.create')) open @endif>
                        <summary
                            class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-2 rounded-[11px] px-3 py-2.5 text-xs font-bold text-[#687681] transition hover:bg-[#f6f9f8] hover:text-[#16a37a] [&::-webkit-details-marker]:hidden {{ Route::is('message.create', 'referenceSite.create', 'header.create', 'logo.create', 'comment.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : '' }}">
                            <span class="flex items-center gap-3">
                                <svg class="h-[19px] w-[19px] shrink-0 fill-none stroke-current" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5 9 9 0 0 1-4-.9L3 21l1.9-5.5a9 9 0 0 1-.9-4A8.5 8.5 0 0 1 12.5 3h.5a8.5 8.5 0 0 1 8 8v.5Z" />
                                </svg>
                                مدیریت محتوای سایت
                            </span>
                            <svg class="h-4 w-4 shrink-0 fill-current transition-transform duration-200 group-open:rotate-180"
                                viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6z" />
                            </svg>
                        </summary>

                        <div class="mr-5 mt-1 flex flex-col gap-1 border-r-2 border-[#edf0f2] pr-3">
                            @can('access', ['message_create'])
                                <a href="{{ route('message.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('message.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">پیام‌ها</a>
                            @endcan
                            @can('access', ['referenceSite_create'])
                                <a href="{{ route('referenceSite.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('referenceSite.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">سایت‌های
                                    مرجع</a>
                            @endcan
                            @can('access', ['header'])
                                <a href="{{ route('header.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('header.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">تنظیمات
                                    هدر</a>
                            @endcan
                            @can('access', ['logo'])
                                <a href="{{ route('logo.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('logo.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">تنظیمات
                                    لوگو</a>
                            @endcan
                            @can('access', ['comment'])
                                <a href="{{ route('comment.create') }}"
                                    class="min-h-10 rounded-lg px-3 py-2.5 text-xs transition hover:bg-[#f6f9f8] hover:text-[#16a37a] {{ Route::is('comment.create') ? 'bg-[#e9f7f1] font-bold text-[#11845f]' : 'text-[#687681]' }}">تنظیمات
                                    نظرات پیش‌فرض</a>
                            @endcan
                        </div>
                    </details>
                @endif

            </nav>



        </aside>
        {{-- Sidebar --}}


        {{-- Content --}}
        <section class="dashboard-content min-w-0 flex-1 overflow-y-auto overflow-x-hidden pb-5">
            <div class="dashboard-content-inner w-full min-w-0">
                @yield('content')
            </div>
        </section>
        {{-- Content --}}

    </main>
    {{-- Dashboard --}}

    @include('app.bottomMenu')

    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/MultiSelect.js') }}" defer></script>

</body>

</html>
