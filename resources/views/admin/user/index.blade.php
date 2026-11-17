@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | کاربران')
@section('content')


    <style>
        /* =========================================
                       SATTARI GOLD - CUSTOMERS PAGE REDESIGN
                    ========================================= */

        :root {
            --user-bg: #F8F5EF;
            --user-card: #FFFFFF;
            --user-gold: #D6AD60;
            --user-gold-dark: #B88A3B;
            --user-text: #29251F;
            --user-muted: #78716C;
            --user-border: #E7E2D9;
            --user-hover: #FAF7F1;
            --user-green: #398568;
            --user-red: #C45D54;
        }

        /* صفحه اصلی */
        #confirmed_pending {
            background: var(--user-card);
            border: 1px solid var(--user-border);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(54, 42, 20, .045);
            overflow: hidden;
            margin-top: 12px;
        }

        /* هدر صفحه */
        .w-full.flex.flex-col.gap-3>section:first-of-type {
            background: linear-gradient(115deg, #fff 0%, #FBF7EF 100%);
            border: 1px solid var(--user-border);
            border-radius: 18px;
            padding: 20px 24px;
            box-shadow: 0 5px 20px rgba(54, 42, 20, .04);
            min-height: 76px;
        }

        .w-full.flex.flex-col.gap-3>section:first-of-type h2 {
            color: var(--user-text);
            font-size: 19px;
            font-weight: 800;
            position: relative;
            padding-right: 14px;
        }

        .w-full.flex.flex-col.gap-3>section:first-of-type h2::before {
            content: "";
            position: absolute;
            right: 0;
            top: 3px;
            bottom: 3px;
            width: 4px;
            border-radius: 5px;
            background: var(--user-gold);
        }

        .w-full.flex.flex-col.gap-3>section:first-of-type>div[onclick*="createUser"] {
            background: linear-gradient(135deg, #DDBB78, #B88A3B);
            color: #fff;
            border: 1px solid #C69B50;
            border-radius: 11px;
            padding: 11px 18px;
            gap: 9px;
            font-weight: 700;
            transition: .25s ease;
            box-shadow: 0 4px 12px rgba(184, 138, 59, .18);
        }

        .w-full.flex.flex-col.gap-3>section:first-of-type>div[onclick*="createUser"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(184, 138, 59, .25);
        }

        /* تب‌های کاربران */
        #confirmed_pending>div:first-child {
            background: #F1EDE5;
            padding: 8px;
            gap: 8px;
        }

        #confirmed_pending>div:first-child>.customers {
            background: transparent;
            color: var(--user-muted);
            border-radius: 11px;
            padding: 14px 10px;
            font-weight: 600;
            transition: .25s ease;
        }

        #confirmed_pending>div:first-child>.customers.bg-white {
            background: #fff;
            color: var(--user-gold-dark);
            box-shadow: 0 2px 9px rgba(60, 45, 20, .08);
            font-weight: 800;
        }

        #confirmed_pending>div:first-child>.customers:hover {
            color: var(--user-gold-dark);
        }

        /* ناحیه فیلترها */
        #confirmed_pending .w-full.my-10 {
            margin-top: 22px;
            margin-bottom: 22px;
            padding-left: 22px;
            padding-right: 22px;
        }

        #confirmed_pending .w-full.my-10>div:first-child {
            padding: 0 2px 12px;
        }

        #confirmed_pending button[onclick="sort(this)"] {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 14px;
            background: #fff;
            border: 1px solid var(--user-border);
            border-radius: 10px;
            color: var(--user-text);
            font-size: 12px;
            transition: .2s;
        }

        #confirmed_pending button[onclick="sort(this)"]:hover {
            border-color: var(--user-gold);
            background: var(--user-hover);
        }

        #confirmed_pending button[onclick="sort(this)"] img {
            width: 22px !important;
            height: 22px !important;
            object-fit: contain;
            margin: 0 !important;
        }

        #confirmed_pending .w-full.my-10>div:nth-child(2) {
            background: #FBF9F5;
            border: 1px solid var(--user-border);
            border-radius: 16px;
            padding: 18px;
        }

        #confirmed_pending fieldset {
            background: #fff;
            border: 1px solid var(--user-border);
            border-radius: 10px;
            padding: 8px 12px;
            min-width: 0;
            transition: .2s;
        }

        #confirmed_pending fieldset:focus-within {
            border-color: var(--user-gold);
            box-shadow: 0 0 0 3px rgba(214, 173, 96, .12);
        }

        #confirmed_pending fieldset legend {
            color: var(--user-muted);
            font-weight: 600;
            padding: 0 6px;
        }

        #confirmed_pending fieldset input,
        #confirmed_pending fieldset select {
            color: var(--user-text);
            min-height: 27px;
            background: transparent;
        }

        #confirmed_pending fieldset input::placeholder {
            color: #B0AAA0;
        }

        #confirmed_pending button[onclick="setDatas()"] {
            background: var(--user-gold-dark);
            color: white;
            border: 1px solid var(--user-gold-dark);
            border-radius: 9px;
            padding: 9px 28px;
            font-weight: 700;
            transition: .2s;
        }

        #confirmed_pending button[onclick="setDatas()"]:hover {
            background: #A77B31;
            border-color: #A77B31;
            transform: translateY(-1px);
        }

        /* نوار بالای جدول و عملیات گروهی */
        #confirmed_pending .mx-5.mt-5.rounded-xl {
            background: linear-gradient(135deg, #FBF9F5, #F7F3EB);
            border: 1px solid var(--user-border);
            border-radius: 15px;
            padding: 18px;
            margin: 18px 20px;
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl label {
            color: var(--user-text);
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl select {
            background-color: #fff;
            border: 1px solid var(--user-border);
            border-radius: 9px;
            color: var(--user-text);
            min-height: 42px;
            padding: 0 12px;
            transition: .2s;
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl select:focus {
            outline: none;
            border-color: var(--user-gold);
            box-shadow: 0 0 0 3px rgba(214, 173, 96, .12);
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl button {
            background: var(--user-gold-dark);
            border: 1px solid var(--user-gold-dark);
            border-radius: 9px;
            color: white;
            font-weight: 700;
            transition: .2s;
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl button:hover:not(:disabled) {
            background: #A77B31;
            transform: translateY(-1px);
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl button:disabled {
            opacity: .4;
            cursor: not-allowed;
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl input[type="checkbox"] {
            accent-color: var(--user-gold-dark);
        }

        /* جدول‌ها */
        #confirmed_pending table {
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid var(--user-border);
            border-radius: 13px;
            overflow: hidden;
            background: #fff;
        }

        #confirmed_pending table thead tr {
            background: #F3EBDD;
        }

        #confirmed_pending table thead th {
            background: #F3EBDD;
            color: #66512E;
            font-weight: 800;
            font-size: 12px;
            border: none;
            border-bottom: 1px solid #E6D9C2;
            padding: 15px 12px;
            white-space: nowrap;
        }

        #confirmed_pending table tbody tr {
            background: #fff;
            transition: background .2s ease;
        }

        #confirmed_pending table tbody tr:nth-child(even) {
            background: #FDFCF9;
        }

        #confirmed_pending table tbody tr:hover {
            background: var(--user-hover);
        }

        #confirmed_pending table tbody td {
            color: var(--user-text);
            border: none;
            border-bottom: 1px solid #F0ECE5;
            padding: 13px 10px;
            vertical-align: middle;
            font-size: 12px;
        }

        #confirmed_pending table tbody tr:last-child td {
            border-bottom: none;
        }

        #confirmed_pending table tbody td:first-child {
            color: var(--user-muted);
        }

        #confirmed_pending table tbody input[type="checkbox"] {
            accent-color: var(--user-gold-dark);
        }

        /* وضعیت حساب */
        #confirmed_pending td.isActiveList span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: auto;
            min-width: 65px;
            height: auto;
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
        }

        /* دکمه‌های ابزار */
        #confirmed_pending .walletBtn,
        #confirmed_pending .open-popup-edited {
            min-height: 38px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
            background: #fff;
        }

        #confirmed_pending .walletBtn:hover,
        #confirmed_pending .open-popup-edited:hover {
            background: #F8F1E4;
            border-color: var(--user-gold-dark);
            color: var(--user-gold-dark);
        }

        #confirmed_pending .deleteUser {
            background: #FFF1EF;
            color: #B84F47;
            border: 1px solid #F0D2CE;
            border-radius: 9px;
            font-weight: 700;
            transition: .2s;
        }

        #confirmed_pending .deleteUser:hover {
            background: #B84F47;
            color: white;
        }

        #confirmed_pending .open-look-cont {
            background: var(--user-gold-dark);
            border-radius: 9px;
            font-weight: 700;
            transition: .2s;
        }

        #confirmed_pending .open-look-cont:hover {
            background: #A77B31;
        }

        /* مودال‌ها */
        #userCreatePopup,
        #confirmed_pending .popup-wallet,
        #confirmed_pending .popup-edit,
        #confirmed_pending .popup-look-cont {
            backdrop-filter: blur(4px);
            padding: 18px;
            overflow-y: auto;
        }

        #userCreatePopup>div:last-child,
        #confirmed_pending .popup-wallet>div:last-child,
        #confirmed_pending .popup-edit .detailBox,
        #confirmed_pending .popup-look-cont .detailBox {
            background: #fff;
            border: 1px solid var(--user-border);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 20px 70px rgba(30, 25, 15, .18);
            max-height: calc(100dvh - 36px);
            overflow-y: auto;
        }

        #userCreatePopup>div:last-child>div:first-child,
        #confirmed_pending .detailBox>div:first-child {
            color: var(--user-text);
            padding-bottom: 15px;
            border-color: var(--user-border);
        }

        #userCreatePopup input,
        #userCreatePopup select,
        #confirmed_pending .detailBox input:not([type="checkbox"]),
        #confirmed_pending .detailBox select,
        #confirmed_pending .popup-wallet textarea,
        #confirmed_pending .popup-wallet input:not([type="radio"]) {
            background: #FBFAF7;
            border: 1px solid var(--user-border);
            border-radius: 9px;
            padding: 11px 12px;
            color: var(--user-text);
            transition: .2s;
        }

        #userCreatePopup input:focus,
        #userCreatePopup select:focus,
        #confirmed_pending .detailBox input:focus,
        #confirmed_pending .detailBox select:focus,
        #confirmed_pending .popup-wallet textarea:focus,
        #confirmed_pending .popup-wallet input:focus {
            outline: none;
            border-color: var(--user-gold);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(214, 173, 96, .12);
        }

        #userCreatePopup label,
        #confirmed_pending .detailBox .text-start {
            color: var(--user-muted);
            font-size: 12px;
            font-weight: 600;
        }

        #userCreatePopup button,
        #confirmed_pending .detailBox button,
        #confirmed_pending .popup-wallet button {
            border-radius: 9px;
            font-weight: 700;
            transition: .2s;
        }

        #userCreatePopup button[type="submit"],
        #confirmed_pending .detailBox .submitBtn,
        #confirmed_pending .popup-wallet .submitWallet {
            background: var(--user-gold-dark);
            color: #fff;
            border-color: var(--user-gold-dark);
        }

        #userCreatePopup button[type="submit"]:hover,
        #confirmed_pending .detailBox .submitBtn:hover,
        #confirmed_pending .popup-wallet .submitWallet:hover {
            background: #A77B31;
            color: #fff;
        }

        #userCreatePopup button[type="reset"],
        #confirmed_pending .detailBox .closeBtn,
        #confirmed_pending .popup-wallet .closeWalletBtn {
            background: #FFF6F4;
            border-color: #EBCFC9;
            color: var(--user-red);
        }

        #userCreatePopup button[type="reset"]:hover,
        #confirmed_pending .detailBox .closeBtn:hover,
        #confirmed_pending .popup-wallet .closeWalletBtn:hover {
            background: var(--user-red);
            color: #fff;
        }

        /* کارت‌های کیف پول */
        #confirmed_pending .popup-wallet .bg-zinc-200 {
            background: #F5F0E7;
            border-radius: 12px;
        }

        #confirmed_pending .popup-wallet .bg-white {
            border: 1px solid #EAE2D4;
        }

        #confirmed_pending .popup-wallet .moneyAsset,
        #confirmed_pending .popup-wallet .goldAsset {
            color: var(--user-gold-dark);
            font-size: 17px;
            font-weight: 800;
        }

        /* سوییچ‌ها */
        #confirmed_pending .detailBox input[type="checkbox"].peer+span {
            transition: .25s;
        }

        /* پیام‌ها */
        #message {
            border: 1px solid var(--user-border);
            border-radius: 12px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .1);
        }

        .modal.fixed {
            border-radius: 12px;
            padding: 16px 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
            border: 1px solid rgba(0, 0, 0, .05);
        }

        /* لودر */
        #loader>div {
            border: 1px solid var(--user-border);
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, .15);
        }

        #loader p {
            color: var(--user-text);
            font-size: 14px;
        }

        #loader span {
            border-color: #F1E7D4;
            border-top-color: var(--user-gold-dark);
        }

        /* اسکرول افقی جدول */
        #confirmed_pending .overflow-x-auto {
            scrollbar-width: thin;
            scrollbar-color: #D6AD60 #F3EFE7;
        }

        #confirmed_pending .overflow-x-auto::-webkit-scrollbar {
            height: 7px;
        }

        #confirmed_pending .overflow-x-auto::-webkit-scrollbar-track {
            background: #F3EFE7;
            border-radius: 10px;
        }

        #confirmed_pending .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #D6AD60;
            border-radius: 10px;
        }

        /* انیمیشن نرم */
        #confirmed_pending button,
        #confirmed_pending input,
        #confirmed_pending select,
        #userCreatePopup button,
        #userCreatePopup input {
            font-family: inherit;
        }

        /* موبایل */
        @media (max-width: 768px) {
            .w-full.flex.flex-col.gap-3>section:first-of-type {
                padding: 13px;
                border-radius: 13px;
            }

            .w-full.flex.flex-col.gap-3>section:first-of-type h2 {
                font-size: 14px;
            }

            #confirmed_pending {
                border-radius: 13px;
            }

            #confirmed_pending>div:first-child>.customers {
                font-size: 11px;
                padding: 12px 5px;
            }

            #confirmed_pending .w-full.my-10 {
                padding-left: 10px;
                padding-right: 10px;
                margin-top: 15px;
                margin-bottom: 15px;
            }

            #confirmed_pending .w-full.my-10>div:nth-child(2) {
                padding: 11px;
            }

            #confirmed_pending .mx-5.mt-5.rounded-xl {
                margin: 12px;
                padding: 12px;
            }

            #confirmed_pending .mx-5.mt-5.rounded-xl select {
                font-size: 11px;
                padding: 0 7px;
            }

            #confirmed_pending table thead th {
                padding: 11px 9px;
                font-size: 11px;
            }

            #confirmed_pending table tbody td {
                padding: 10px 8px;
                font-size: 11px;
            }

            #userCreatePopup>div:last-child,
            #confirmed_pending .popup-wallet>div:last-child,
            #confirmed_pending .popup-edit .detailBox,
            #confirmed_pending .popup-look-cont .detailBox {
                width: 100%;
                padding: 15px;
                border-radius: 14px;
            }

            #userCreatePopup form {
                gap: 12px;
            }

            #confirmed_pending .popup-wallet .grid {
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            #confirmed_pending .w-full.my-10>div:nth-child(2)>div:first-child {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            #confirmed_pending .mx-5.mt-5.rounded-xl .grid {
                gap: 9px;
            }

            #confirmed_pending .mx-5.mt-5.rounded-xl button {
                font-size: 11px;
                padding: 8px;
            }

            #userCreatePopup form label {
                font-size: 11px;
            }

            #userCreatePopup form input,
            #userCreatePopup form select {
                font-size: 12px;
            }
        }


        /* =========================================
                       USERS LIST - TABLE & MOBILE REFINEMENT
                       Keep native table-cell layout for stable columns.
                    ========================================= */
        #confirmed_pending #confirmed,
        #confirmed_pending #pending {
            min-width: 0;
        }

        #confirmed_pending .overflow-x-auto {
            display: block;
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
            overflow-y: visible;
            -webkit-overflow-scrolling: touch;
            padding: 0 14px 14px;
        }

        #confirmed_pending .overflow-x-auto>table {
            width: 100%;
            min-width: 1120px;
            table-layout: auto;
        }

        #confirmed_pending #pending .overflow-x-auto>table {
            min-width: 760px;
        }

        #confirmed_pending .overflow-x-auto>.mx-5.mt-5.rounded-xl {
            width: auto;
            margin: 18px 0 14px;
        }

        #confirmed_pending table th,
        #confirmed_pending table td {
            vertical-align: middle;
            line-height: 1.8;
        }

        #confirmed_pending table tbody td {
            white-space: nowrap;
        }

        #confirmed_pending table tbody td:first-child {
            min-width: 76px;
        }

        #confirmed_pending table tbody td:first-child input[type="checkbox"] {
            display: inline-grid;
            vertical-align: middle;
            margin-left: 7px;
        }

        #confirmed_pending .user-tools-cell {
            min-width: 190px;
            white-space: normal;
        }

        #confirmed_pending .user-tools-cell>button {
            min-width: 86px;
            min-height: 36px;
            margin: 3px;
            padding: 8px 10px;
            white-space: nowrap;
        }

        #confirmed_pending .user-tools-cell .popup-wallet,
        #confirmed_pending .user-tools-cell .popup-edit,
        #confirmed_pending .user-tools-cell .popup-look-cont {
            white-space: normal;
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl {
            min-width: 0;
        }

        #confirmed_pending .mx-5.mt-5.rounded-xl .grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        #confirmed_pending .w-full.my-10>div:nth-child(2)>div:first-child {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        #confirmed_pending fieldset input,
        #confirmed_pending fieldset select {
            width: 100%;
            min-width: 0;
            font-size: 13px;
        }

        #confirmed_pending .customers {
            user-select: none;
        }

        @media (max-width: 640px) {
            #confirmed_pending .overflow-x-auto {
                padding: 0 9px 12px;
            }

            #confirmed_pending .overflow-x-auto>table {
                min-width: 1080px;
            }

            #confirmed_pending #pending .overflow-x-auto>table {
                min-width: 700px;
            }

            #confirmed_pending .mx-5.mt-5.rounded-xl {
                margin: 12px 0;
                padding: 12px;
            }

            #confirmed_pending .mx-5.mt-5.rounded-xl>div:first-child {
                align-items: flex-start;
                gap: 10px;
                flex-wrap: wrap;
            }

            #confirmed_pending .mx-5.mt-5.rounded-xl .grid {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            }

            #confirmed_pending .mx-5.mt-5.rounded-xl .grid>button {
                grid-column: 1 / -1;
            }

            #confirmed_pending .w-full.my-10>div:nth-child(2)>div:first-child {
                grid-template-columns: minmax(0, 1fr);
            }

            #confirmed_pending .w-full.my-10>div:first-child {
                justify-content: stretch;
            }

            #confirmed_pending button[onclick="sort(this)"] {
                width: 100%;
                justify-content: space-between;
            }

            #confirmed_pending .user-tools-cell>button {
                min-width: 82px;
                font-size: 11px;
            }
        }

        @media (max-width: 380px) {
            #confirmed_pending .mx-5.mt-5.rounded-xl .grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }
    </style>


    <div class="absolute z-999 top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-11/12 sm:w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
        id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
                onclick="showMessage('close')" viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>
        </div>
    </div>
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-0 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif

    <div class="w-full flex flex-col gap-3 justify-start items-center">
        <!-- لیست مشتریان / هدر -->
        <section
            class="w-full mx-auto bg-(--secondary-dashboard) flex items-center justify-between border-1 border-(--border-dashboard) p-2 2 rounded-md">
            <h2 class="text-base md:text-xl font-bold">لیست مشتریان</h2>
            <div onclick="createUser('open')"
                class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-3 py-2 cursor-pointer flex items-center justify-center">
                <span class="">
                    <svg class="size-3 md:size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path
                            d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z">
                        </path>
                    </svg>
                </span>
                <div class="">مشتری جدید</div>
            </div>
            <div id="userCreatePopup"
                class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center">
                <div onclick="createUser('close')"
                    class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                    <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                        <div class="font-bold"> مشتری جدید</div>
                        <div onclick="createUser('close')" class="cursor-pointer">
                            <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <form action="{{ route('user.adminStore') }}" method="post"
                        class="grid grid-cols-6 gap-2 md:gap-5 mt-5">
                        @csrf
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="name">
                            نام :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="text" name="name" id="name" placeholder="مثال : علی"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="family">
                            نام خانوادگی :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="text" name="family" id="family" placeholder="مثال : علیزاده"
                                value="{{ old('family') }}">
                            @error('family')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="phoneNumber">
                            شماره تلفن :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="number" name="phoneNumber" id="phoneNumber" placeholder="مثال : 09146424294"
                                value="{{ old('phoneNumber') }}">
                            @error('phoneNumber')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="nationalCode">
                            کد ملی :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="number" name="nationalCode" id="nationalCode" placeholder="مثال : 1680270710"
                                value="{{ old('nationalCode') }}">
                            @error('nationalCode')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="password">
                            رمز عبور :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="password" name="password" id="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="roles">
                            تعیین نقش :
                            <select name="roles[]" id="roles"
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)">
                                <option value="0">بدون نقش</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role['id'] }}">
                                        {{ $role['name'] }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>

                        <button type="submit"
                            class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md cursor-pointer">ثبت
                            مشتری</button>
                        <button type="reset"
                            class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md cursor-pointer">
                            بازنشانی اطلاعات</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- لیست مشتریان / لسیت -->
        <section id="confirmed_pending"
            class="w-full mx-auto rounded-md border-1 border-(--border-dashboard) mt-5 pb-10 overflow-hidden">
            <div class="w-full flex items-center bg-zinc-300">
                <div onclick="conpen('confirmed', this)"
                    class="w-6/12 bg-white text-xs md:text-base flex items-center justify-center rounded-t-md py-1 md:py-3 cursor-pointer customers">
                    مشتریان تایید شده</div>
                <div onclick="conpen('pending', this)"
                    class="w-6/12 bg-zinc-200 text-xs md:text-base flex items-center justify-center rounded-t-md py-1 md:py-3 cursor-pointer customers">
                    مشتریان در انتظار تایید</div>
            </div>
            <div>
                <div class="w-full my-10 px-5">
                    <div class="w-full pb-3 px-3 flex flex-row justify-end">
                        <button onclick="sort(this)" class="flex gap-5 items-center" data-sort="desc">
                            <span>مرتب سازی :</span>
                            <p>جدید به قدیمی</p>
                            <img src="{{ asset('assets/img/sort/desc.png') }}"
                                style=" max-width: 30px; max-height: 30px; margin-top: 10px; margin-left: 5px; cursor: pointer;"
                                alt="">
                        </button>
                    </div>


                    <div class="w-full bg-white py-5 px-2 mb-2">
                        <div class="w-full grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2">
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    نام
                                </legend>
                                <input class="w-full outline-none text-[10px] md:text-base" type="text" name="name"
                                    id="filter-name" placeholder=" نام">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    نام خانوادگی
                                </legend>
                                <input class="w-full outline-none text-[10px] md:text-base" type="text" name="family"
                                    id="filter-family" placeholder=" نام خانوادگی">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    شماره تلفن
                                </legend>
                                <input class="w-full outline-none text-[10px] md:text-base in-fa" dir="ltr"
                                    type="text" name="phoneNumber" id="filter-phoneNumber" placeholder="09123456789">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    کد ملی
                                </legend>
                                <input class="w-full outline-none text-[10px] md:text-base in-fa" dir="ltr"
                                    type="text" name="nationalCode" id="filter-nationalCode"
                                    placeholder="168*****31">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    وضعیت فعال
                                </legend>
                                <select id="filter-activity" name="activity[]" data-placeholder="انتخاب کنید"
                                    data-multi-select data-select-all-default="true" multiple>
                                    <option value="1">فعال</option>
                                    <option value="0">غیرفعال</option>
                                </select>
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    وضعیت تایید
                                </legend>
                                <select id="filter-approve" name="approve[]" data-placeholder="انتخاب کنید"
                                    data-multi-select data-select-all-default="true" multiple>
                                    <option value="0">در انتظار</option>
                                    <option value="1">تایید شده</option>
                                    <option value="01">رد شده</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="w-full flex justify-end">
                            <button
                                class="w-fit flex items-center justify-center px-3 font-bold text-xs md:text-base py-2 md:px-6 mt-5 hover:bg-(--color-blue) hover:text-white transition-all duratoin-300 col-span-1 md:text-right border-1 border-(--color-blue) text-(--color-blue) rounded-md text-center cursor-pointer"
                                onclick="setDatas()">اعمال</button>
                        </div>
                    </div>
                </div>
                {{-- filters --}}
                <div id="confirmed" class="w-full">
                    <div class="w-full h-5 bg-zinc-200"></div>
                    <div class="w-full overflow-x-auto">
                        <div class="mx-5 mt-5 rounded-xl border-1 border-(--border-dashboard) bg-zinc-50 p-4">

                            <div class="flex items-center justify-between pb-4 border-b-1 border-(--border-dashboard)">
                                <label for="selectAllConfirmed"
                                    class="flex items-center gap-2 cursor-pointer select-none">
                                    <input
                                        class="appearance-none size-5 rounded-md border-1 border-(--border-dashboard) bg-white checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] indeterminate:bg-(--primary-dark-dashboard) indeterminate:after:content-['−'] text-white flex items-center justify-center text-sm cursor-pointer"
                                        type="checkbox" id="selectAllConfirmed">
                                    <span class="text-xs md:text-base font-medium">انتخاب همه</span>
                                </label>

                                <span class="text-xs md:text-sm text-gray-500">
                                    <span id="confirmedSelectedCount"
                                        class="font-bold text-(--primary-dashboard)">0</span>
                                    کاربر انتخاب شده
                                </span>
                            </div>

                            <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 md:gap-4 pt-4 items-end">
                                <div class="flex flex-col gap-1.5">
                                    <label for="confirmedUserIsApproved" class="text-xs text-gray-500">وضعیت تایید</label>
                                    <select id="confirmedUserIsApproved"
                                        class="w-full h-10 px-3 rounded-lg border-1 border-gray-300 bg-white text-sm cursor-pointer transition-all hover:border-gray-400 focus:outline-none focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/20">
                                        <option value="1">تایید</option>
                                        <option value="0">در انتظار</option>
                                        <option value="-1">رد</option>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label for="confirmedUserRoles" class="text-xs text-gray-500">تعیین نقش</label>
                                    <select id="confirmedUserRoles"
                                        class="w-full h-10 px-3 rounded-lg border-1 border-gray-300 bg-white text-sm cursor-pointer transition-all hover:border-gray-400 focus:outline-none focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/20">
                                        <option value="0">بدون نقش</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label for="confirmedUserIsActive" class="text-xs text-gray-500">وضعیت حساب</label>
                                    <select id="confirmedUserIsActive"
                                        class="w-full h-10 px-3 rounded-lg border-1 border-gray-300 bg-white text-sm cursor-pointer transition-all hover:border-gray-400 focus:outline-none focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/20">
                                        <option value="1">فعال</option>
                                        <option value="0">غیر فعال</option>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label for="confirmedUserSendNotif" class="text-xs text-gray-500">ارسال نوتیف</label>
                                    <select id="confirmedUserSendNotif"
                                        class="w-full h-10 px-3 rounded-lg border-1 border-gray-300 bg-white text-sm cursor-pointer transition-all hover:border-gray-400 focus:outline-none focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/20">
                                        <option value="0">غیر فعال</option>
                                        <option value="1">فعال</option>
                                    </select>
                                </div>

                                <button type="button" id="applyConfirmedBulk" disabled data-status="confirm"
                                    class="col-span-2 lg:col-span-1 h-10 rounded-lg bg-(--primary-dashboard) text-white text-sm font-bold cursor-pointer transition-all duration-300 hover:opacity-90 disabled:opacity-40 disabled:cursor-not-allowed">
                                    اعمال روی انتخاب‌شده‌ها
                                </button>
                            </div>
                        </div>
                        <table class="w-full border-collapse border-1 border-(--border-dashboard) text-sm">
                            <thead>
                                <tr class="bg-gray-100 text-xs lg:text-base">
                                    <th class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        ردیف
                                    </th>
                                    <th class="min-w-40 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        نام و نام خانوادگی
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        شماره موبایل
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        نقش
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        آخرین بازدید
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        آخرین معامله
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        کد ملی
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        کد حسابداری
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        وضعیت
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        دسته‌بندی
                                    </th>
                                    <th class="min-w-60 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        ابزار
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($users as $user)
                                    @if ($user->isApproved)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr class="item_list text-xs lg:text-base approvedUsers"
                                            data-user-id="{{ $user->id }}">
                                            <td class="p-1 md:px-3 md:py-2 text-center in-fa">
                                                <input type="checkbox" name="approvedUsers[]"
                                                    value="{{ $user->id }}"
                                                    class="row-checkbox-confirmed appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                {{ $i }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center fullNameList">
                                                {{ $user->name }} {{ $user->family }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa phoneNumberList">
                                                {{ $user->phoneNumber }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa roleList">
                                                {{ count($user->roles) ? $user->roles[0]->name : 'بدون نقش' }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                                -
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                                -
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa nationalCodeList">
                                                {{ $user->nationalCode }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                                -
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center isActiveList">
                                                @if ($user->isActive)
                                                    <span
                                                        class="w-10 h-10 bg-(--primary-dashboard)/20 text-(--primary-dashboard) rounded-md border-1 border-(--primary-dashboard) p-1 cursor-default">
                                                        فعال
                                                    </span>
                                                @else
                                                    <span
                                                        class="w-10 h-10 bg-(--color-danger)/20 text-(--color-danger) rounded-md border-1 border-(--color-danger) p-1 cursor-default">
                                                        غیرفعال
                                                    </span>
                                                @endif
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                                قلک طلا
                                            </td>
                                            <td class="relative p-1 md:px-3 md:py-2 text-center user-tools-cell">
                                                @can('access', 'user_wallet')
                                                    <button onclick="wallet(this, 'open', {{ $user->id }})"
                                                        class="w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer walletBtn">
                                                        کیف پول
                                                    </button>

                                                    
                                               
<div
    class="fixed inset-0 z-[9999] invisible opacity-0 transition-all duration-300 flex items-center justify-center popup-wallet bg-black/30 backdrop-blur-sm p-3 md:p-5">

    <!-- Overlay -->
    <div onclick="wallet(this, 'close')" class="absolute inset-0 cursor-pointer"></div>

    <!-- Modal -->
    <div
        class="relative z-10 w-full max-w-10/12 max-h-[90dvh] overflow-y-auto rounded-2xl bg-white shadow-2xl border border-[#E7E2D9]">

        <div class="p-4 md:p-6 space-y-5">

            <!-- User Information -->
            <div class="wallet-modal-card p-4 sm:p-5">

                <div class="flex items-center gap-3 mb-4">
                    <span class="wallet-gold-icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M14 3.13a4 4 0 0 1 0 7.75M14 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
                        </svg>
                    </span>

                    <div>
                        <h2 class="text-sm font-bold text-[#29251F]">اطلاعات حساب</h2>
                        <p class="text-[11px] text-[#78716C] mt-1">مشخصات کاربر انتخاب‌شده</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                    <div class="rounded-xl bg-[#F8F5EF] p-3 sm:p-4">
                        <span class="block text-xs text-[#78716C] mb-2">نام و نام خانوادگی</span>
                        <span class="text-sm font-bold text-[#29251F] fullName"></span>
                    </div>

                    <div class="rounded-xl bg-[#F8F5EF] p-3 sm:p-4">
                        <span class="block text-xs text-[#78716C] mb-2">شماره تلفن</span>
                        <span class="text-sm font-bold text-[#29251F] in-fa phoneNumber"></span>
                    </div>

                </div>
            </div>

            <!-- Assets Title -->
            <div>
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h2 class="text-sm font-black text-[#29251F]">خلاصه دارایی‌ها</h2>
                        <p class="text-[11px] text-[#78716C] mt-1">وضعیت موجودی کیف پول کاربر</p>
                    </div>

                    <span class="text-[10px] font-bold text-[#B88A3B] bg-[#FBF3E2] rounded-full px-3 py-2">
                        Wallet Assets
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Rial Balance -->
                    <div class="wallet-modal-card p-4 sm:p-5">

                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-center gap-3">

                                <span class="wallet-gold-icon">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 576 512">
                                        <path
                                            d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9-1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z" />
                                    </svg>
                                </span>

                                <div>
                                    <h2 class="text-sm font-bold text-[#29251F]">موجودی ریالی</h2>
                                    <p class="text-[11px] text-[#78716C] mt-1">دارایی نقدی کاربر</p>
                                </div>

                            </div>

                            <span class="text-[10px] font-bold text-[#B88A3B] bg-[#FBF3E2] rounded-full px-3 py-1">
                                ریال
                            </span>
                        </div>

                        <div class="rounded-xl bg-[#F8F5EF] p-4">
                            <span class="block text-xs text-[#78716C] mb-2">موجودی کل</span>
                            <div class="text-xl sm:text-2xl font-black text-[#29251F] in-fa moneyAsset"></div>
                        </div>

                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-[#E7E2D9]">
                            <span class="text-xs text-[#78716C]">موجودی قابل برداشت</span>

                            <div class="text-sm font-bold text-[#B88A3B] in-fa">
                                <span
                                    id="withdrawableBalance{{ $user->id }}"
                                    data-balance="{{ $user->wallet ? number_format($user->wallet['asset']) ?? 0 : 0 }}"
                                    class="takebleMoneyAsset">
                                </span>

                                <span class="text-[10px] text-[#78716C]">ریال</span>
                            </div>
                        </div>

                    </div>

                    <!-- Gold Balance -->
                    <div class="wallet-modal-card p-4 sm:p-5">

                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-center gap-3">

                                <span class="wallet-gold-icon">
                                    <svg class="w-6 h-6" viewBox="0 0 512 512" fill="none">
                                        <path d="M256 45 80 145l176 72 176-72L256 45Z" fill="#D6AD60" />
                                        <path d="M80 145v220l176 102V217L80 145Z" fill="#B88A3B" />
                                        <path d="M432 145v220L256 467V217l176-72Z" fill="#E8C47D" />
                                        <path d="m80 145 176 72 176-72" stroke="#FFF8E9" stroke-width="5" />
                                    </svg>
                                </span>

                                <div>
                                    <h2 class="text-sm font-bold text-[#29251F]">موجودی طلا</h2>
                                    <p class="text-[11px] text-[#78716C] mt-1">دارایی طلایی کاربر</p>
                                </div>

                            </div>

                            <span class="text-[10px] font-bold text-[#B88A3B] bg-[#FBF3E2] rounded-full px-3 py-1">
                                گرم
                            </span>
                        </div>

                        <div class="rounded-xl bg-[#F8F5EF] p-4">
                            <span class="block text-xs text-[#78716C] mb-2">موجودی کل</span>
                            <div class="text-xl sm:text-2xl font-black text-[#29251F] in-fa goldAsset"></div>
                        </div>

                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-[#E7E2D9]">
                            <span class="text-xs text-[#78716C]">موجودی قابل برداشت</span>

                            <span class="text-sm font-bold text-[#B88A3B] in-fa">
                                {{ $user->wallet ? number_format($user->wallet->goldWeight) ?? 0 : 0 }}
                                <span class="text-[10px] font-normal text-[#78716C]">گرم</span>
                            </span>
                        </div>

                        <div class="flex items-center justify-between mt-3">
                            <span class="text-xs text-[#78716C]">ارزش دارایی</span>

                            <span class="text-sm font-bold text-[#29251F] in-fa">
                                <span class="takebleGoldAsset"></span>
                                <span class="text-[10px] font-normal text-[#78716C]">ریال</span>
                            </span>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Transaction Type -->
            <div class="wallet-modal-card p-4 sm:p-5">

                <div class="flex items-center gap-3 mb-4">
                    <span class="wallet-gold-icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M8 7h12m0 0-4-4m4 4-4 4M16 17H4m0 0 4 4m-4-4 4-4" />
                        </svg>
                    </span>

                    <div>
                        <h2 class="text-sm font-bold text-[#29251F]">عملیات کیف پول</h2>
                        <p class="text-[11px] text-[#78716C] mt-1">نوع تراکنش مورد نظر را انتخاب کنید</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <!-- Deposit -->
                    <label class="cursor-pointer">
                        <input
                            class="sr-only wallet-radio deposit"
                            type="radio"
                            name="transactionType{{ $user->id }}"
                            value="deposit"
                            id="deposit{{ $user->id }}"
                            onclick="transactionMethod('deposit',this, {{ $user->id }})">

                        <div class="wallet-type-option">
                            <span class="flex-1">
                                <span class="block text-sm font-bold text-[#29251F]">واریز وجه</span>
                                <span class="block text-[10px] text-[#78716C] mt-1">افزایش موجودی کیف پول</span>
                            </span>

                            <span class="text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M12 5v14m-7-7h14" />
                                </svg>
                            </span>
                        </div>
                    </label>

                    <!-- Withdraw -->
                    <label class="cursor-pointer">
                        <input
                            class="sr-only wallet-radio withdraw"
                            type="radio"
                            name="transactionType{{ $user->id }}"
                            value="withdraw"
                            id="withdraw{{ $user->id }}"
                            onclick="transactionMethod('withdraw',this, {{ $user->id }})">

                        <div class="wallet-type-option">
                            <span class="flex-1">
                                <span class="block text-sm font-bold text-[#29251F]">برداشت وجه</span>
                                <span class="block text-[10px] text-[#78716C] mt-1">کاهش موجودی کیف پول</span>
                            </span>

                            <span class="text-red-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14" />
                                </svg>
                            </span>
                        </div>
                    </label>

                </div>
            </div>

            <!-- Dynamic Transaction Form -->
            <div
                id="transactionMethod{{ $user->id }}"
                class="wallet-modal-card grid grid-cols-6 gap-4 p-4 sm:p-5">
            </div>

            <!-- Actions -->
            <div class="grid grid-cols-2 gap-3 pt-2">

                <button
                    type="submit"
                    onclick="submitWallet(this, {{ $user->id }})"
                    class="wallet-modal-submit submitWallet py-4 rounded-xl font-bold text-sm cursor-pointer">

                    <span class="inline-flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="m5 12 4 4L19 6" />
                        </svg>

                        ثبت عملیات
                    </span>

                </button>

                <button
                    type="reset"
                    onclick="closeWalletBtn(this)"
                    class="wallet-modal-cancel py-4 rounded-xl font-bold text-sm cursor-pointer">
                    انصراف
                </button>

            </div>

        </div>
    </div>
</div>

                                                @endcan

                                                @can('access', 'user_edit')
                                                    <button
                                                        class="open-popup-edited w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-1 py-2 cursor-pointer flex items-center justify-center"
                                                        onclick="openEditPopup(this)">
                                                        <svg class="size-5" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                                        </svg>
                                                    </button>
                                                    <div
                                                        class="popup-edit fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                                        <div
                                                            class="close-popup-edit2 absolute z-9 w-full h-[100dvh] left-1/2 -translate-x-1/2">
                                                        </div>
                                                        <div
                                                            class="relative z-51 w-[80%] md:w-200 bg-white rounded-md px-3 py-2 transition-all duration-300 detailBox">
                                                            <div
                                                                class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                                <div class="text-sm md:text-base font-bold text-nowrap">ویرایش
                                                                    اطلاعات مشتری</div>
                                                                <svg class="size-6 cursor-pointer close-popup-look-cont"
                                                                    onclick="closeEditUser(this)" fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                                    <path
                                                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="grid grid-cols-2 md:grid-cols-6 gap-5 mt-5">
                                                                <div class="col-span-1 md:col-span-3 text-start">
                                                                    نام
                                                                    <input
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) name"
                                                                        type="text" name="" id="">
                                                                </div>
                                                                <div class="col-span-1 md:col-span-3 text-start">
                                                                    نام خانوادگی
                                                                    <input
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) family"
                                                                        type="text" style="font-family: 'IRANSansX';"
                                                                        name="" id="">
                                                                </div>
                                                                <div class="col-span-1 md:col-span-3 text-start">
                                                                    کد ملی
                                                                    <input
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa nationalCode"
                                                                        type="text" name="" dir="ltr"
                                                                        id="">
                                                                </div>
                                                                <div class="col-span-1 md:col-span-3 text-start">
                                                                    شماره تلفن
                                                                    <input
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa phoneNumberEd"
                                                                        type="text" name="" dir="ltr"
                                                                        id="">
                                                                </div>
                                                                <div class="col-span-1 md:col-span-2 text-start">
                                                                    وضعیت تایید
                                                                    <select
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) isApproved"
                                                                        name="" id="">
                                                                        <option value="0">در انتظار</option>
                                                                        <option value="1">تایید</option>
                                                                        <option value="-1">رد</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-1 md:col-span-2 text-start">
                                                                    نقش
                                                                    <select
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) roles"
                                                                        name="" id="">
                                                                        <option value="0">بدون نقش</option>
                                                                        @foreach ($roles as $role)
                                                                            <option value="{{ $role->id }}"
                                                                                @if ($role->id == $user->roleId) selected @endif>
                                                                                {{ $role->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div
                                                                    class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-2 flex items-center justify-between w-full py-2 px-4 mt-[30px]">
                                                                    <div class="w-full flex justify-between items-center">
                                                                        <label for="AisActive{{ $user->id }}"
                                                                            class="w-[calc(100%-50px)] text-start cursor-pointer">فعال
                                                                            : </label>
                                                                        <label for="AisActive{{ $user->id }}"
                                                                            class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                                                            <input type="checkbox" name="isActive"
                                                                                value="1"
                                                                                id="AisActive{{ $user->id }}"
                                                                                hidden="" class="peer cursor-pointer">
                                                                            <span
                                                                                class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                                                            <span
                                                                                class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-2 flex items-center justify-between w-full py-2 px-4 mt-5">
                                                                    <div class="w-full flex justify-between items-center">
                                                                        <label for="AsendNotif{{ $user->id }}"
                                                                            class="w-[calc(100%-50px)] text-start cursor-pointer">نوتیف
                                                                            ارسال شود
                                                                            : </label>
                                                                        <label for="AsendNotif{{ $user->id }}"
                                                                            class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                                                            <input type="checkbox" name="isActive"
                                                                                value="1"
                                                                                id="AsendNotif{{ $user->id }}"
                                                                                hidden="" class="peer cursor-pointer">
                                                                            <span
                                                                                class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                                                            <span
                                                                                class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="hidden lg:block lg:col-span-4"></div>
                                                                <button
                                                                    class="col-span-1 md:col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold submitBtn cursor-pointer transition-all duration-300 hover:bg-(--primary-dashboard) hover:text-white"
                                                                    onclick="submitEditUser(this)">ثبت</button>
                                                                <button
                                                                    class="col-span-1 md:col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold closeBtn cursor-pointer transition-all duration-300 hover:bg-(--danger-dashboard) hover:text-white"
                                                                    onclick="closeEditUser(this)">لغو</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="pending" class="w-full hidden">
                    <div class="w-full h-5 bg-zinc-200"></div>
                    <div class="w-full overflow-x-auto">
                        <div class="mx-5 mt-5 rounded-xl border-1 border-(--border-dashboard) bg-zinc-50 p-4">

                            {{-- ردیف بالا: انتخاب همه + تعداد انتخاب‌شده --}}
                            <div class="flex items-center justify-between pb-4 border-b-1 border-(--border-dashboard)">
                                <label for="selectAllPending" class="flex items-center gap-2 cursor-pointer select-none">
                                    <input
                                        class="appearance-none size-5 rounded-md border-1 border-(--border-dashboard) bg-white checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer"
                                        type="checkbox" id="selectAllPending">
                                    <span class="text-xs md:text-base font-medium">انتخاب همه</span>
                                </label>

                                <span class="text-xs md:text-sm text-gray-500">
                                    <span id="pendingSelectedCount"
                                        class="font-bold text-(--primary-dashboard) in-fa">0</span>
                                    کاربر انتخاب شده
                                </span>
                            </div>

                            {{-- فیلدهای عملیات گروهی --}}
                            <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 md:gap-4 pt-4 items-end">

                                <div class="flex flex-col gap-1.5">
                                    <label for="pendingUserIsApproved" class="text-xs text-gray-500">وضعیت تایید</label>
                                    <select id="pendingUserIsApproved"
                                        class="w-full h-10 px-3 rounded-lg border-1 border-gray-300 bg-white text-sm cursor-pointer transition-all hover:border-gray-400 focus:outline-none focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/20">
                                        <option value="0">در انتظار</option>
                                        <option value="1">تایید</option>
                                        <option value="-1">رد</option>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label for="pendingUserRoles" class="text-xs text-gray-500">تعیین نقش</label>
                                    <select id="pendingUserRoles"
                                        class="w-full h-10 px-3 rounded-lg border-1 border-gray-300 bg-white text-sm cursor-pointer transition-all hover:border-gray-400 focus:outline-none focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/20">
                                        <option value="0">بدون نقش</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label for="pendingUserIsActive" class="text-xs text-gray-500">وضعیت حساب</label>
                                    <select id="pendingUserIsActive"
                                        class="w-full h-10 px-3 rounded-lg border-1 border-gray-300 bg-white text-sm cursor-pointer transition-all hover:border-gray-400 focus:outline-none focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/20">
                                        <option value="0">غیر فعال</option>
                                        <option value="1">فعال</option>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label for="pendingUserSendNotif" class="text-xs text-gray-500">ارسال نوتیف</label>
                                    <select id="pendingUserSendNotif"
                                        class="w-full h-10 px-3 rounded-lg border-1 border-gray-300 bg-white text-sm cursor-pointer transition-all hover:border-gray-400 focus:outline-none focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/20">
                                        <option value="0">غیر فعال</option>
                                        <option value="1">فعال</option>
                                    </select>
                                </div>

                                <button type="button" id="applyPendingBulk" data-status="pending"
                                    class="col-span-2 lg:col-span-1 h-10 rounded-lg bg-(--primary-dashboard) text-white text-sm font-bold cursor-pointer transition-all duration-300 hover:opacity-90 disabled:opacity-40 disabled:cursor-not-allowed"
                                    disabled>
                                    اعمال روی انتخاب‌شده‌ها
                                </button>
                            </div>
                        </div>
                        <table class="w-full border-collapse border-1 border-(--border-dashboard) text-sm mt-5">
                            <thead class="w-full">
                                <tr class="bg-gray-100 text-xs lg:text-base">
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        ردیف
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        نام و نام خانوادگی
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        شماره موبایل
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        کد ملی
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        زمان ثبت‌نام
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        ابزار
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $j = 0;
                                @endphp
                                @foreach ($users as $user)
                                    @if (!$user->isApproved)
                                        @php
                                            $j++;
                                        @endphp
                                        <tr class="item_2 text-xs lg:text-base approvedPendingUsers"
                                            data-user-id="{{ $user->id }}">
                                            <td
                                                class="border-x-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                                                <input type="checkbox" name="approvedPendingUsers[]"
                                                    value="{{ $user->id }}"
                                                    class="row-checkbox-pending appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                {{ $j }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap">
                                                {{ $user->name }} {{ $user->family }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                                                {{ $user->phoneNumber }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                                                {{ $user->nationalCode }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                                                {{ verta($user->created_at) }}
                                            </td>
                                            @can('access', 'user_edit')
                                                <td
                                                    class="relative border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center user-tools-cell">
                                                    <button type="button" onclick="popupLookCont(this)"
                                                        class="open-look-cont w-3/6 bg-(--primary-dashboard) text-white rounded-md px-3 py-2 cursor-pointer text-nowrap">
                                                        تایید و بازبینی
                                                    </button>
                                                    <div
                                                        class="popup-look-cont fixed z-50 w-full h-dvh top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">

                                                        <div onclick="closePopupLookCont2(this)"
                                                            class="close-popup-look-cont2 absolute z-49 w-full h-dvh bg-black/50 left-1/2 -translate-x-1/2">
                                                        </div>
                                                        <div
                                                            class="relative z-51 w-[80%] md:w-200 bg-white rounded-md px-3 py-2 invisible opacity-0 transition-all duration-300 detailBox">
                                                            <div
                                                                class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                                <div class="text-sm md:text-base font-bold text-nowrap">بازبینی
                                                                    اطلاعات
                                                                    مشتری و تایید</div>
                                                                <div onclick="closePopupLookCont(this)"
                                                                    class="close-popup-look-cont">
                                                                    <svg class="size-6 cursor-pointer" fill="currentColor"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 384 512">
                                                                        <path
                                                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-2 md:grid-cols-6 gap-5 mt-5">
                                                                <div class="col-span-1 md:col-span-3 text-start">
                                                                    نام
                                                                    <input
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) name"
                                                                        type="text" name="" id="">
                                                                </div>
                                                                <div class="col-span-1 md:col-span-3 text-start">
                                                                    نام خانوادگی
                                                                    <input
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) family"
                                                                        type="text" style="font-family: 'IRANSansX';"
                                                                        name="" id="">
                                                                </div>
                                                                <div class="col-span-1 md:col-span-3 text-start">
                                                                    کد ملی
                                                                    <input
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa nationalCode"
                                                                        type="text" name="" dir="ltr"
                                                                        id="">
                                                                </div>
                                                                <div class="col-span-1 md:col-span-3 text-start">
                                                                    شماره تلفن
                                                                    <input
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa phoneNumber"
                                                                        type="text" name="" dir="ltr"
                                                                        id="">
                                                                </div>
                                                                <div class="col-span-1 md:col-span-2 text-start">
                                                                    وضعیت تایید
                                                                    <select
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) isApproved"
                                                                        name="" id="">
                                                                        <option value="0">در انتظار</option>
                                                                        <option value="1">تایید</option>
                                                                        <option value="-1">رد</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-1 md:col-span-2 text-start">
                                                                    نقش
                                                                    <select
                                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) roles"
                                                                        name="" id="">
                                                                        <option value="0">بدون نقش</option>
                                                                        @foreach ($roles as $role)
                                                                            <option value="{{ $role->id }}"
                                                                                @if ($role->id == $user->roleId) selected @endif>
                                                                                {{ $role->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div
                                                                    class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-2 flex items-center justify-between w-full py-2 px-4 mt-[30px]">
                                                                    <div class="w-full flex justify-between items-center">
                                                                        <label for="isActive{{ $user->id }}"
                                                                            class="w-[calc(100%-50px)] text-start cursor-pointer">فعال
                                                                            : </label>
                                                                        <label for="isActive{{ $user->id }}"
                                                                            class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                                                            <input type="checkbox" name="isActive"
                                                                                value="1"
                                                                                id="isActive{{ $user->id }}" hidden
                                                                                class="peer cursor-pointer">
                                                                            <span
                                                                                class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                                                            <span
                                                                                class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-2 flex items-center justify-between w-full py-2 px-4 mt-5">
                                                                    <div class="w-full flex justify-between items-center">
                                                                        <label for="sendNotif{{ $user->id }}"
                                                                            class="w-[calc(100%-50px)] text-start cursor-pointer">نوتیف
                                                                            ارسال شود
                                                                            : </label>
                                                                        <label for="sendNotif{{ $user->id }}"
                                                                            class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                                                            <input type="checkbox" name="sendNotif"
                                                                                value="1"
                                                                                id="sendNotif{{ $user->id }}" hidden
                                                                                class="peer cursor-pointer">
                                                                            <span
                                                                                class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                                                            <span
                                                                                class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="hidden lg:block lg:col-span-4"></div>
                                                                <button onclick="submitBtn(this)"
                                                                    class="col-span-1 md:col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold submitBtn cursor-pointer transition-all duration-300 hover:bg-(--primary-dashboard) hover:text-white">ثبت</button>
                                                                <button
                                                                    class="col-span-1 md:col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold closeBtn cursor-pointer transition-all duration-300 hover:bg-(--danger-dashboard) hover:text-white">لغو</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" onclick="deleteUser(this)"
                                                        class="w-3/6 bg-(--danger-dashboard) text-white rounded-md px-2 py-2 cursor-pointer text-nowrap deleteUser">
                                                        حذف درخواست
                                                    </button>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- loader --}}
    <div id="loader"
        class="w-full h-full fixed top-0 right-0 z-999 flex items-center justify-center transition-all bg-black/50 duration-300 invisible opacity-0">
        <div class="p-10 bg-white shadow-xl rounded-lg flex flex-col items-center gap-10">
            <span class="w-20 h-20 animate-spin rounded-full border-4 border-yellow-100 border-t-yellow-600"></span>
            <p class="text-gray-600 font-bold text-xl">در حال بارگذاری لطفا
                شکیبا باشید....</p>
        </div>
    </div>
    {{-- loader --}}

    <script src="{{ asset('assets/js/user.js') }}"></script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
    <script src="{{ asset('assets/js/userFilter.js') }}"></script>
    <script>
        let setting = JSON.parse('{!! $setting !!}')
        let minDeposit
        let maxDeposit
        let minWithdraw
        let maxWithdraw

        function checkFee(state, el) {
            let inputValue = Number(el.children[1].value)
            el.querySelector('div').children[1].innerText = ""
            minDeposit = true
            maxDeposit = true
            minWithdraw = true
            maxWithdraw = true
            if (state == 'deposit') {
                if (inputValue < setting.minDepositAmount) {
                    el.querySelector('div').children[1].innerText =
                        `حداقل مبلغ قابل واریز ${parseInt(setting.minDepositAmount).toLocaleString('fa-IR')} ریال است.`
                    minDeposit = false
                }
                if (inputValue > setting.maxDepositAmount) {
                    el.querySelector('div').children[1].innerText =
                        `حداکثر مبلغ قابل واریز ${parseInt(setting.maxDepositAmount).toLocaleString('fa-IR')} ریال است.`
                    maxDeposit = false
                }
            }
            if (state == 'withdraw') {
                if (inputValue < setting.minWithdrawAmount) {
                    el.querySelector('div').children[1].innerText =
                        `حداقل مبلغ قابل برداشت ${parseInt(setting.minWithdrawAmount).toLocaleString('fa-IR')} ریال است.`
                    minWithdraw = false
                }
                if (inputValue > setting.maxWithdrawAmount) {
                    el.querySelector('div').children[1].innerText =
                        `حداکثر مبلغ قابل برداشت ${parseInt(setting.maxWithdrawAmount).toLocaleString('fa-IR')} ریال است.`
                    maxWithdraw = false
                }
            }
            let tomanPrice = Math.floor(parseInt(el.querySelector('input').value) / 10)
            if (tomanPrice != 0 && tomanPrice != NaN && el.querySelector('input').value !== '') {
                el.querySelector('div').children[0].innerText = 'معادل ' + tomanPrice.toLocaleString('fa-IR') + ' تومان'
            } else {
                el.querySelector('div').children[0].innerText = ''
            }
        }

        function transactionMethod(state, el, userId) {
            let transactionMethod = document.getElementById('transactionMethod' + userId)
            if (setting) {
                if (state == 'deposit') {
                    if (setting.depositIsActive == 0) {
                        el.parentElement.nextElementSibling.innerText = 'در حال حاضر امکان واریز کردن غیرفعال است'
                        el.checked = false
                    } else {
                        transactionMethod.innerHTML = `
                            <label class="col-span-6 md:col-span-3" for="depositFee" onkeyup="checkFee('deposit', this)">
                                    مبلغ (ریال)
                                    <span class="text-[10px] text-red-500">(اجباری)</span>
                                    <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa fee" type="number" name="depositFee" id="depositFee" placeholder="ریال" value="">
                                    <div class="my-1 flex flex-col gap-1">
                                        <span class="text-xs text-gray-500"></span>
                                        <span class="text-xs text-red-500"></span>
                                    </div>
                            </label>
                            <label class="col-span-6 md:col-span-3" for="receipt">
                                    تصویر فیش واریزی
                                    <span class="text-[10px] text-red-500">(اجباری)</span>
                                    <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" type="file" name="receipt" id="receipt">
                            </label>
                            <label class="col-span-6" for="description">
                                    توضیحات
                                    <textarea class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" name="description" id="description"></textarea>
                            </label>
                    `
                    }
                }
                if (state == 'withdraw') {
                    if (setting.withdrawIsActive == 0) {
                        el.parentElement.nextElementSibling.innerText = 'در حال حاضر امکان برداشت کردن غیرفعال است'
                        el.checked = false
                    } else {
                        transactionMethod.innerHTML = `
                            <div id="percents" class="col-span-6 p-4">
                                <span class="mb-5 block">برداشت از کیف پول به مقدار:</span>
                                <div class="w-full flex items-center justify-between gap-2">
                                    <div class="">
                                        <label for="withdrawPercent10" class="in-fa">10%</label>
                                        <input type="radio" name="withdrawPercent" id="withdrawPercent10" value="10">
                                    </div>
                                    <div class="">
                                        <label for="withdrawPercent25" class="in-fa">25%</label>
                                        <input type="radio" name="withdrawPercent" id="withdrawPercent25" value="25">
                                    </div>
                                    <div class="">
                                        <label for="withdrawPercent50" class="in-fa">50%</label>
                                        <input type="radio" name="withdrawPercent" id="withdrawPercent50" value="50">
                                    </div>
                                    <div class="">
                                        <label for="withdrawPercent75" class="in-fa">75%</label>
                                        <input type="radio" name="withdrawPercent" id="withdrawPercent75" value="75">
                                    </div>
                                    <div class="">
                                        <label for="withdrawPercent100" class="in-fa">100%</label>
                                        <input type="radio" name="withdrawPercent" id="withdrawPercent100" value="100">
                                    </div>
                                </div>
                            </div>
                            <label class="col-span-6 md:col-span-3" for="withdrawFee" onkeyup="checkFee('withdraw', this)">
                                مبلغ (ریال)
                                <span class="text-[10px] text-red-500">(اجباری)</span>
                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa fee" type="number" name="withdrawFee" id="withdrawFee" placeholder="ریال" value="">
                                <div class="my-1 flex flex-col gap-1">
                                        <span class="text-xs text-gray-500"></span>
                                        <span class="text-xs text-red-500"></span>
                                    </div>
                            </label>
                            <label class="col-span-6" for="description">
                                توضیحات
                                <textarea class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" name="description" id="description"></textarea>
                            </label>
                    `
                        percents(userId)
                    }
                }
            }
        }

        function percents(userId) {
            let withdrawPercents = document.querySelectorAll('input[name="withdrawPercent"]')
            let withdrawableBalance = document.getElementById('withdrawableBalance' + userId).dataset.balance
            let feeInput = document.getElementById('withdrawFee')
            withdrawPercents.forEach(percent => {
                percent.addEventListener('change', function() {
                    let result = (parseInt(percent.value) / 100) * +withdrawableBalance.replaceAll(',', '')
                    let value = Math.round(result)
                    feeInput.value = value
                    checkFee('withdraw', feeInput.parentElement)
                })
            })
        }

        // function submitBtn(e) {
        //     e.preventDefault()
        //     if (minDeposit && maxDeposit && minWithdraw && maxWithdraw) {
        //         document.forms[0].submit()
        //     }
        // }
    </script>
@endsection
