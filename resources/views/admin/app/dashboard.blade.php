<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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

    <style>
        :root {
            --dash-bg: #f6f8fa;
            --dash-white: #ffffff;
            --dash-text: #263238;
            --dash-muted: #87929e;
            --dash-border: #edf0f2;
            --dash-primary: #16a37a;
            --dash-primary-light: #e9f7f1;
            --dash-primary-dark: #11845f;
            --dash-red: #e05252;
            --dash-sidebar-width: 270px;
            --dash-radius: 16px;
            --dash-shadow: 0 4px 24px rgba(30, 50, 65, .045);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--dash-bg);
            color: var(--dash-text);
            font-family: inherit;
        }

        body,
        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }

        a {
            text-decoration: none;
        }

        /* Header */

        .dashboard-header {
            height: 76px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            background: var(--dash-white);
            border-bottom: 1px solid var(--dash-border);
            position: relative;
            z-index: 10;
        }

        .dashboard-header-right,
        .dashboard-header-left {
            display: flex;
            align-items: center;
        }

        .dashboard-header-right {
            gap: 24px;
        }

        .dashboard-header-left {
            gap: 18px;
        }

        .dashboard-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 48px;
        }

        .dashboard-logo img {
            width: 44px;
            height: 44px;
            object-fit: contain;
        }

        .dashboard-menu-toggle {
            width: 40px;
            height: 40px;
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 5px;
            border-radius: 11px;
            cursor: pointer;
            transition: .2s;
        }

        .dashboard-menu-toggle:hover {
            background: var(--dash-bg);
        }

        .dashboard-menu-toggle span {
            width: 20px;
            height: 2px;
            background: #34434d;
            border-radius: 5px;
        }

        .dashboard-user {
            position: relative;
        }

        .dashboard-user-trigger {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 12px;
            cursor: pointer;
            transition: .2s;
        }

        .dashboard-user-trigger:hover {
            background: var(--dash-bg);
        }

        .dashboard-user-trigger>span {
            font-size: 13px;
            font-weight: 600;
            color: #34434d;
        }

        .dashboard-user-trigger svg {
            width: 14px;
            height: 14px;
            fill: #87929e;
        }

        .dashboard-user-avatar {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: var(--dash-primary-light);
            color: var(--dash-primary);
        }

        .dashboard-user-avatar svg {
            width: 19px;
            height: 19px;
            fill: currentColor;
        }

        .dashboard-user-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            width: 230px;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            background: #fff;
            border: 1px solid transparent;
            border-radius: 14px;
            box-shadow: var(--dash-shadow);
            padding: 0 8px;
            transition: .25s ease;
            z-index: 20;
        }

        .dashboard-user:hover .dashboard-user-dropdown,
        .dashboard-user-dropdown.is-open {
            max-height: 200px;
            opacity: 1;
            visibility: visible;
            padding: 8px;
            border-color: var(--dash-border);
        }

        .dashboard-user-dropdown a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 9px;
            color: #596773;
            font-size: 13px;
            transition: .2s;
        }

        .dashboard-user-dropdown a:hover {
            background: var(--dash-bg);
            color: var(--dash-primary);
        }

        .dashboard-user-dropdown a svg {
            width: 17px;
            height: 17px;
            fill: currentColor;
            flex-shrink: 0;
        }

        .dashboard-user-dropdown .logout-link {
            color: var(--dash-red);
        }

        .dashboard-user-dropdown .logout-link:hover {
            background: #fff1f1;
            color: var(--dash-red);
        }

        .dashboard-user-role {
            margin-right: auto;
            font-size: 10px;
            color: #a0aab3;
            white-space: nowrap;
        }

        .dashboard-notification {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: #f6f8fa;
            border-radius: 12px;
            color: #65727e;
            cursor: pointer;
        }

        .dashboard-notification svg {
            width: 19px;
            height: 19px;
            fill: currentColor;
        }

        .dashboard-notification-dot {
            width: 8px;
            height: 8px;
            position: absolute;
            top: 8px;
            right: 8px;
            background: var(--dash-red);
            border: 2px solid #f6f8fa;
            border-radius: 50%;
        }

        /* Main layout */

        .dashboard-layout {
            width: 100%;
            height: calc(100dvh - 76px);
            display: flex;
            align-items: stretch;
            justify-content: flex-start;
            gap: 24px;
            padding: 24px 28px;
        }

        /* Sidebar */

        .dashboard-sidebar {
            width: var(--dash-sidebar-width);
            min-width: var(--dash-sidebar-width);
            height: 100%;
            background: var(--dash-white);
            border: 1px solid var(--dash-border);
            border-radius: 18px;
            padding: 14px 12px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .dashboard-sidebar-heading {
            padding: 12px 13px 16px;
            color: #a0aab3;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .2px;
        }

        .dashboard-sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0 2px 12px;
            scrollbar-width: thin;
            scrollbar-color: #e5e9ec transparent;
        }

        .dashboard-sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }

        .dashboard-sidebar-menu::-webkit-scrollbar-thumb {
            background: #e5e9ec;
            border-radius: 10px;
        }

        .dashboard-sidebar-menu a {
            width: 100%;
            min-height: 44px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 11px;
            color: #687681;
            font-size: 12.5px;
            font-weight: 500;
            white-space: nowrap;
            transition: background .2s ease, color .2s ease, transform .2s ease;
            position: relative;
        }

        .dashboard-sidebar-menu a:hover {
            background: #f6f9f8;
            color: var(--dash-primary);
            transform: translateX(-2px);
        }

        .dashboard-sidebar-menu a.active {
            background: var(--dash-primary-light);
            color: var(--dash-primary-dark);
            font-weight: 700;
        }

        .dashboard-sidebar-menu a.active::before {
            content: "";
            width: 3px;
            height: 22px;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            background: var(--dash-primary);
            border-radius: 5px 0 0 5px;
        }

        .dashboard-sidebar-menu a svg {
            width: 19px;
            height: 19px;
            min-width: 19px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: .2s;
        }

        .dashboard-sidebar-menu a.active svg {
            stroke-width: 2;
        }

        .dashboard-sidebar-menu a svg.fill-icon {
            fill: currentColor;
            stroke: none;
        }

        .dashboard-sidebar-menu a svg .icon-fill {
            fill: currentColor;
            stroke: none;
        }

        .dashboard-sidebar-divider {
            height: 1px;
            background: var(--dash-border);
            margin: 10px 12px;
        }

        .dashboard-sidebar-section-title {
            padding: 12px 13px 8px;
            color: #a0aab3;
            font-size: 10px;
            font-weight: 700;
        }

        /* Content */

        .dashboard-content {
            flex: 1;
            min-width: 0;
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0 2px 20px;
            scrollbar-width: thin;
            scrollbar-color: #dce3e7 transparent;
        }

        .dashboard-content::-webkit-scrollbar {
            width: 5px;
        }

        .dashboard-content::-webkit-scrollbar-thumb {
            background: #dce3e7;
            border-radius: 10px;
        }

        .dashboard-content-inner {
            width: 100%;
            min-width: 0;
        }

        /* Mobile overlay */

        #hamburger_menu_dashboard_item_close {
            display: none;
        }

        #user_pup_up_item_colse {
            display: none;
        }

        @media (max-width: 1023px) {
            .dashboard-header {
                height: 66px;
                padding: 0 18px;
            }

            .dashboard-menu-toggle {
                display: flex;
            }

            .dashboard-header-right {
                gap: 12px;
            }

            .dashboard-layout {
                height: calc(100dvh - 66px);
                padding: 18px;
                gap: 0;
            }

            .dashboard-sidebar {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                z-index: 41;
                width: 285px;
                min-width: 285px;
                height: 100dvh;
                border-radius: 0 0 0 20px;
                padding: 18px 13px;
                transform: translateX(105%);
                transition: transform .3s ease;
                box-shadow: -8px 0 30px rgba(20, 40, 50, .08);
            }

            .dashboard-sidebar.is-open {
                transform: translateX(0);
            }

            #hamburger_menu_dashboard_item_close {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(20, 32, 40, .35);
                opacity: 0;
                visibility: hidden;
                z-index: 40;
                transition: .3s;
            }

            #hamburger_menu_dashboard_item_close.is-open {
                opacity: 1;
                visibility: visible;
            }

            .dashboard-content {
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .dashboard-header {
                height: 60px;
                padding: 0 12px;
            }

            .dashboard-logo img {
                width: 38px;
                height: 38px;
            }

            .dashboard-user-trigger {
                gap: 7px;
                padding: 7px;
            }

            .dashboard-user-trigger>span {
                font-size: 11px;
            }

            .dashboard-user-avatar {
                width: 30px;
                height: 30px;
            }

            .dashboard-header-left {
                gap: 8px;
            }

            .dashboard-notification {
                width: 35px;
                height: 35px;
            }

            .dashboard-layout {
                height: calc(100dvh - 60px);
                /* padding: 12px 10px 80px; */
            }

            .dashboard-content {
                padding: 0;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    {{-- Header --}}
    <header class="dashboard-header">

        <div class="dashboard-header-right">

            <div class="dashboard-menu-toggle" onclick="hamburger_menu_dashboard('open')" aria-label="باز کردن منو">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <a href="{{ route('home') }}" class="dashboard-logo">
                @if ($logo)
                    <img src="{{ asset('storage/' . $logo->logo) }}" alt="لوگو">
                @endif
            </a>

        </div>

        <div class="dashboard-header-left">

            <div class="dashboard-user">

                <div class="dashboard-user-trigger" onclick="user_pup_up()">

                    <div class="dashboard-user-avatar">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12 12a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm0 2c-4.42 0-8 2.24-8 5v2h16v-2c0-2.76-3.58-5-8-5Z" />
                        </svg>
                    </div>

                    <span>{{ Auth::user()['name'] }} {{ Auth::user()['family'] }}</span>

                    <svg viewBox="0 0 24 24">
                        <path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>

                <div class="dashboard-user-dropdown" id="user_pup_up_item">

                    <a href="{{ route('user.profile') }}">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12 12a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm0 2c-4.42 0-8 2.24-8 5v2h16v-2c0-2.76-3.58-5-8-5Z" />
                        </svg>

                        <span>حساب کاربری</span>

                        @if (count(Auth::user()->roles) > 0)
                            <span class="dashboard-user-role">{{ Auth::user()->roles[0]['name'] }}</span>
                        @endif
                    </a>

                    <a href="{{ route('user.logout') }}" class="logout-link">
                        <svg viewBox="0 0 24 24">
                            <path d="M10 17l5-5-5-5M15 12H3m9-9h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>خروج از حساب</span>
                    </a>

                </div>

                <div id="user_pup_up_item_colse" onclick="user_pup_up('open')"></div>

            </div>

            <div class="dashboard-notification">
                <svg viewBox="0 0 24 24">
                    <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9ZM10 21h4" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="dashboard-notification-dot"></span>
            </div>

        </div>

    </header>
    {{-- Header --}}


    {{-- Dashboard --}}
    <main class="dashboard-layout">

        <div id="hamburger_menu_dashboard_item_close" onclick="hamburger_menu_dashboard('close')"></div>

        {{-- Sidebar --}}
        <aside class="dashboard-sidebar" id="hamburger_menu_dashboard_item">

            <div class="dashboard-sidebar-heading">
                منوی اصلی
            </div>

            <nav class="dashboard-sidebar-menu">

                <a href="{{ route('home') }}" class="@if (Route::is('home')) active @endif" title="خانه">
                    <svg viewBox="0 0 24 24">
                        <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1V10Z" />
                    </svg>
                    <span>خانه</span>
                </a>

                <a href="{{ route('product.index') }}" class="@if (Route::is('product.index')) active @endif"
                    title="محصولات">
                    <svg viewBox="0 0 24 24">
                        <path d="M6 7h12l1 14H5L6 7Z" />
                        <path d="M9 9V6a3 3 0 0 1 6 0v3" />
                    </svg>
                    <span>محصولات</span>
                </a>

                <a href="{{ route('user.profile') }}" class="@if (Route::is('user.profile')) active @endif"
                    title="پروفایل">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 21a8 8 0 0 1 16 0" />
                    </svg>
                    <span>پروفایل</span>
                </a>

                <a href="{{ route('wallet.wallet', [Auth::user()]) }}"
                    class="@if (Route::is('wallet.wallet')) active @endif" title="کیف پول">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="5" width="18" height="16" rx="3" />
                        <path d="M3 9h18M16 15h2" />
                        <path d="M6 5V3h12v2" />
                    </svg>
                    <span>کیف پول</span>
                </a>

                <a href="{{ route('wallet.userTransactions', [Auth::user()]) }}"
                    class="@if (Route::is('wallet.userTransactions')) active @endif" title="تراکنش های من">
                    <svg viewBox="0 0 24 24">
                        <path d="M3 12a9 9 0 1 0 2.5-6.2L3 8" />
                        <path d="M3 3v5h5M12 7v5l3 2" />
                    </svg>
                    <span>تراکنش های من</span>
                </a>

                <a href="{{ route('deal.create') }}" class="@if (Route::is('deal.create')) active @endif"
                    title="شروع معامله جدید">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M12 7v10M8 10h6a2 2 0 0 1 0 4H8" />
                    </svg>
                    <span>شروع معامله</span>
                </a>

                <a href="{{ route('deal.list') }}" class="@if (Route::is('deal.list')) active @endif"
                    title="معاملات من">
                    <svg viewBox="0 0 24 24">
                        <path d="M3 12a9 9 0 1 0 2.5-6.2L3 8" />
                        <path d="M3 3v5h5M12 7v5l3 2" />
                    </svg>
                    <span>معاملات من</span>
                </a>

                <a href="{{ route('order.userOrders') }}" class="@if (Route::is('order.userOrders')) active @endif"
                    title="لیست سفارشات من">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 3h16v18H4z" />
                        <path d="M8 8h8M8 12h8M8 16h5" />
                    </svg>
                    <span>لیست سفارشات من</span>
                </a>

                <a href="{{ route('creditCard.create') }}" class="@if (Route::is('creditCard.create')) active @endif"
                    title="مدیریت کارت ها">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="5" width="20" height="14" rx="3" />
                        <path d="M2 10h20M6 15h4" />
                    </svg>
                    <span>مدیریت کارت ها</span>
                </a>

                <div class="dashboard-sidebar-divider"></div>

                <div class="dashboard-sidebar-section-title">
                    مدیریت و تنظیمات
                </div>

                {{-- @can('access', ['livePrice'])
                    <a href="{{ route('price.create') }}" class="@if (Route::is('price.create')) active @endif"
                        title="تنظیمات قیمت ها">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                        </svg>
                        <span>تنظیمات قیمت ها</span>
                    </a>
                @endcan --}}

                @can('access', ['currency'])
                    <a href="{{ route('currencyUnit.create') }}" class="@if (Route::is('currencyUnit.create')) active @endif"
                        title="واحد پولی">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                        </svg>
                        <span>واحد پولی</span>
                    </a>
                @endcan

                @can('access', ['priceLine'])
                    <a href="{{ route('line.create') }}" class="@if (Route::is('line.create')) active @endif"
                        title="تعیین ارزش خط">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                        </svg>
                        <span>تعیین ارزش خط</span>
                    </a>
                @endcan

                @can('access', ['transactionsList'])
                    <a href="{{ route('wallet.transactionsList') }}"
                        class="@if (Route::is('wallet.transactionsList')) active @endif" title="واریز و برداشت">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 3v18M7 8l5-5 5 5M7 16l5 5 5-5" />
                        </svg>
                        <span>واریز و برداشت</span>
                    </a>
                @endcan

                @can('access', ['deal_index'])
                    <a href="{{ route('deal.adminIndex') }}" class="@if (Route::is('deal.adminIndex')) active @endif"
                        title="معاملات">
                        <svg viewBox="0 0 24 24">
                            <path d="M4 7h16M4 17h16M8 3 4 7l4 4M16 13l4 4-4 4" />
                        </svg>
                        <span>همه معاملات</span>
                    </a>
                @endcan

                @can('access', ['user_index'])
                    <a href="{{ route('user.index') }}" class="@if (Route::is('user.index')) active @endif"
                        title="لیست کاربران">
                        <svg viewBox="0 0 24 24">
                            <circle cx="9" cy="8" r="3.5" />
                            <path d="M2 20a7 7 0 0 1 14 0M16 5.5a3.5 3.5 0 0 1 0 6.8M18 15a6 6 0 0 1 4 5" />
                        </svg>
                        <span>لیست کاربران</span>
                    </a>
                @endcan

                @can('access', ['category_show'])
                    <a href="{{ route('category.adminIndex') }}"
                        class="@if (Route::is('category.adminIndex')) active @endif" title="دسته بندی محصولات">
                        <svg viewBox="0 0 24 24">
                            <path d="M3 6a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6Z" />
                            <path d="M3 9h18" />
                        </svg>
                        <span>دسته بندی محصولات</span>
                    </a>
                @endcan

                @can('access', ['product_show'])
                    <a href="{{ route('product.adminIndex') }}" class="@if (Route::is('product.adminIndex')) active @endif"
                        title="مدیریت کالا">
                        <svg viewBox="0 0 24 24">
                            <path d="m12 3 9 5-9 5-9-5 9-5Z" />
                            <path d="m3 12 9 5 9-5M3 16l9 5 9-5" />
                        </svg>
                        <span>مدیریت کالاها</span>
                    </a>
                @endcan

                @can('access', ['message_create'])
                    <a href="{{ route('message.create') }}" class="@if (Route::is('message.create')) active @endif"
                        title="پیام ها">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5 9 9 0 0 1-4-.9L3 21l1.9-5.5a9 9 0 0 1-.9-4A8.5 8.5 0 0 1 12.5 3h.5a8.5 8.5 0 0 1 8 8v.5Z" />
                        </svg>
                        <span>پیام ها</span>
                    </a>
                @endcan

                @can('access', ['referenceSite_create'])
                    <a href="{{ route('referenceSite.create') }}"
                        class="@if (Route::is('referenceSite.create')) active @endif" title="سایت های مرجع">
                        <svg viewBox="0 0 24 24">
                            <path d="M14 3h7v7M10 14 21 3M19 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h6" />
                        </svg>
                        <span>سایت های مرجع</span>
                    </a>
                @endcan

                @can('access', ['transactionSetting'])
                    <a href="{{ route('transactionSetting.create') }}"
                        class="@if (Route::is('transactionSetting.create')) active @endif" title="تنظیمات تراکنش ها">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="3" />
                            <path
                                d="m19.4 15 .1.1 1.4 1.1-1.4 2.4-1.7-.7a8 8 0 0 1-1.7 1l-.3 1.8h-2.8l-.3-1.8a8 8 0 0 1-1.7-1l-1.7.7-1.4-2.4 1.4-1.1a8 8 0 0 1 0-2l-1.4-1.1 1.4-2.4 1.7.7a8 8 0 0 1 1.7-1l.3-1.8h2.8l.3 1.8a8 8 0 0 1 1.7 1l1.7-.7 1.4 2.4-1.4 1.1a8 8 0 0 1 0 2Z" />
                        </svg>
                        <span>تنظیمات تراکنش ها</span>
                    </a>
                @endcan

                @can('access', ['header'])
                    <a href="{{ route('header.create') }}" class="@if (Route::is('header.create')) active @endif"
                        title="تنظیمات هدر">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="16" rx="2" />
                            <path d="M3 9h18" />
                            <path d="M7 6.5h.01M10 6.5h.01" />
                        </svg>
                        <span>تنظیمات هدر</span>
                    </a>
                @endcan

                @can('access', ['logo'])
                    <a href="{{ route('logo.create') }}" class="@if (Route::is('logo.create')) active @endif"
                        title="تنظیمات لوگو">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="3" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="m21 15-5-5L5 21" />
                        </svg>
                        <span>تنظیمات لوگو</span>
                    </a>
                @endcan

                @can('access', ['comment'])
                    <a href="{{ route('comment.create') }}" class="@if (Route::is('comment.create')) active @endif"
                        title="تنظیمات نظرات پیش فرض">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5 9 9 0 0 1-4-.9L3 21l1.9-5.5a9 9 0 0 1-.9-4A8.5 8.5 0 0 1 12.5 3h.5a8.5 8.5 0 0 1 8 8v.5Z" />
                            <path d="M8 12h8M8 8h5" />
                        </svg>
                        <span>تنظیمات نظرات پیش فرض</span>
                    </a>
                @endcan

                @can('access', ['order_show'])
                    <a href="{{ route('order.index') }}" class="@if (Route::is('order.index')) active @endif"
                        title="لیست سفارشات">
                        <svg viewBox="0 0 24 24">
                            <rect x="5" y="3" width="14" height="18" rx="2" />
                            <path d="M9 8h6M9 12h6M9 16h4" />
                        </svg>
                        <span>لیست سفارشات</span>
                    </a>
                @endcan

                @can('access', ['role_create'])
                    <a href="{{ route('role.create') }}" class="@if (Route::is('role.create')) active @endif"
                        title="تعیین دسترسی و مجوز ها">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="16" rx="2" />
                            <circle cx="8" cy="10" r="2" />
                            <path d="M5 16a3 3 0 0 1 6 0M13 9h5M13 13h5M13 17h3" />
                        </svg>
                        <span>تعیین دسترسی و مجوز ها</span>
                    </a>
                @endcan

            </nav>

        </aside>
        {{-- Sidebar --}}

        {{-- Content --}}
        <section class="dashboard-content">
            <div class="dashboard-content-inner">
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
