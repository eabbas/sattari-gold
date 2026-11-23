@extends('admin.app.dashboard')

@section('title')
    طلای ستاری | خرید و فروش سپرده طلا
@endsection

@section('content')

    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        /* Warm Gold Theme */
        .gold-trading-page {
            background: #F8F5EF;
            color: #29251F;
        }

        .gold-trading-page .text-gray-800,
        .gold-trading-page .text-gray-700 {
            color: #29251F !important;
        }

        .gold-trading-page .text-gray-600,
        .gold-trading-page .text-gray-500 {
            color: #78716C !important;
        }

        .gold-trading-page .text-gray-400 {
            color: #A8A29E !important;
        }

        .gold-trading-page .bg-white {
            background-color: #FFFFFF !important;
        }

        .gold-trading-page .bg-gray-50,
        .gold-trading-page .bg-gray-50\/70 {
            background-color: #F8F5EF !important;
        }

        .gold-trading-page .bg-gray-100 {
            background-color: #F1EDE5 !important;
        }

        .gold-trading-page .border-gray-50,
        .gold-trading-page .border-gray-100,
        .gold-trading-page .border-gray-200 {
            border-color: #E7E2D9 !important;
        }

        .gold-trading-page .divide-gray-100> :not([hidden])~ :not([hidden]) {
            border-color: #E7E2D9 !important;
        }

        /* Gold accents */
        .gold-trading-page .text-brand-red {
            color: #B88A3B !important;
        }

        .gold-trading-page .bg-red-50,
        .gold-trading-page .bg-red-50\/40 {
            background-color: #F8F1E3 !important;
        }

        .gold-trading-page .border-red-100,
        .gold-trading-page .border-red-200 {
            border-color: #E7D7B7 !important;
        }

        .gold-trading-page .text-red-500,
        .gold-trading-page .text-red-600 {
            color: #B88A3B !important;
        }

        .gold-trading-page .hover\:bg-red-50:hover {
            background-color: #F8F1E3 !important;
        }

        .gold-trading-page .hover\:bg-red-600:hover {
            background-color: #B88A3B !important;
        }

        .gold-trading-page .hover\:border-red-600:hover {
            border-color: #B88A3B !important;
        }

        .gold-trading-page .focus-within\:border-brand-red:focus-within,
        .gold-trading-page .focus\:border-brand-red:focus {
            border-color: #D6AD60 !important;
        }

        .gold-trading-page .focus-within\:ring-brand-red:focus-within,
        .gold-trading-page .focus\:ring-brand-red:focus {
            --tw-ring-color: #D6AD60 !important;
        }

        .gold-trading-page .bg-amber-50 {
            background-color: #F8F1E3 !important;
        }

        .gold-trading-page .text-amber-600 {
            color: #B88A3B !important;
        }

        .gold-trading-page .bg-blue-50 {
            background-color: #F8F5EF !important;
        }

        .gold-trading-page .text-blue-600 {
            color: #B88A3B !important;
        }

        /* Buy button */
        .gold-trading-page #buyBox {
            background-color: #EFF7F0;
            color: #15803D;
            border-color: #D5E9D8;
        }

        .gold-trading-page #buyBox:hover {
            background-color: #15803D;
            color: #FFFFFF;
            border-color: #15803D;
        }

        /* Sell button */
        .gold-trading-page #sellBox {
            background-color: #F8F1E3;
            color: #B88A3B;
            border-color: #E7D7B7;
        }

        .gold-trading-page #sellBox:hover {
            background-color: #B88A3B;
            color: #FFFFFF;
            border-color: #B88A3B;
        }

        /* Status labels */
        .gold-trading-page .bg-green-50 {
            background-color: #EFF7F0 !important;
        }

        .gold-trading-page .text-green-600,
        .gold-trading-page .text-green-500 {
            color: #15803D !important;
        }

        /* Deal popup */
        #dealBlock {
            z-index: 999999;
        }

        #dealBlock #btnByPrice {
            color: #B88A3B !important;
        }

        #dealBlock #inputContainer:focus-within {
            border-color: #D6AD60 !important;
            --tw-ring-color: #D6AD60 !important;
        }

        #dealBlock #resultOutput {
            color: #B88A3B !important;
        }

        #dealBlock textarea:focus {
            border-color: #D6AD60 !important;
            --tw-ring-color: #D6AD60 !important;
        }

        #dealBlock #submitBtn:not(:disabled) {
            background-color: #B88A3B !important;
            color: #FFFFFF !important;
        }

        #dealBlock #submitBtn:not(:disabled):hover {
            background-color: #29251F !important;
        }

        #dealBlock #inputUnit,
        #dealBlock #resultUnit {
            background-color: #F8F5EF !important;
            border-color: #E7E2D9 !important;
        }

        #dealBlock #mainBlock {
            border-color: #E7E2D9 !important;
        }
    </style>

    {{-- Success Message --}}
    @if (session('success'))
        <div
            class="modal py-4 px-6 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)]">
                {{ session('success') }}
            </span>
        </div>
    @endif

    {{-- Failure Message --}}
    @if (session('failure'))
        <div
            class="modal py-4 px-6 rounded-lg shadow-lg bg-red-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)]">
                {{ session('failure') }}
            </span>
        </div>
    @endif

    <div class="gold-trading-page w-full min-h-screen relative shadow-2xl overflow-hidden flex flex-col">

        <div class="w-full overflow-y-auto pb-24 px-4">

            {{-- Announcements --}}
            <div class="bg-white border border-gray-100 rounded-xl p-4 mb-5 shadow-sm">

                <div class="flex items-center gap-2 mb-3">

                    <div class="w-8 h-8 rounded-lg bg-red-50 text-brand-red flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 9v4m0 4h.01M10.3 3.86L2.8 17.2A2 2 0 004.5 20h15a2 2 0 001.7-2.8L13.7 3.86a2 2 0 00-3.4 0z" />
                        </svg>
                    </div>

                    <span class="font-bold text-sm text-gray-800">
                        اطلاعیه‌ها
                    </span>

                </div>

                <div class="text-xs leading-7 text-gray-600">

                    @if (count($messages) > 0)
                        @foreach ($messages as $mess)
                            <p class="border-t border-gray-50 pt-2 mt-2 first:border-0 first:pt-0 first:mt-0">
                                {{ $mess->message }}
                            </p>
                        @endforeach
                    @else
                        <p class="text-gray-400">
                            اطلاعیه جدیدی وجود ندارد.
                        </p>
                    @endif

                </div>

            </div>


            {{-- Main Gold Trading Card --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-5">

                <div class="px-4 py-4 border-b border-gray-100 flex items-center justify-between">

                    <div class="flex items-center gap-2">

                        <div class="w-9 h-9 bg-red-50 rounded-xl flex items-center justify-center text-lg">
                            🪙
                        </div>

                        <div>

                            <h2 class="font-bold text-sm text-gray-800">
                                آبشده نقدی
                            </h2>

                            <p class="text-[10px] text-gray-400 mt-1">
                                معاملات آنلاین طلا
                            </p>

                        </div>

                    </div>

                </div>

                <div class="grid grid-cols-2 divide-x divide-x-reverse divide-gray-100">

                    {{-- Buy --}}
                    <div class="p-4 flex flex-col gap-3">

                        <div>

                            <div class="flex items-center gap-1.5 mb-2">

                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>

                                <span class="text-xs text-gray-500">
                                    قیمت خرید
                                </span>

                            </div>

                            <div class="font-bold text-gray-800 text-base in-fa">
                                {{ number_format($price?->sell_price) }}
                            </div>

                            <span class="text-[10px] text-gray-400">
                                ریال
                            </span>

                        </div>

                        @if (Auth::user()->isActive)
                            <button type="button" id="buyBox" onclick="openBlock(this)" data-state="buy"
                                class="w-full flex items-center justify-center gap-2
                                    bg-[#F8F5EF] hover:!bg-[#B88A3B]
                                    text-[#B88A3B] hover:!text-white
                                    border border-[#D6AD60]/30 hover:border-[#B88A3B]
                                    rounded-lg py-2.5 text-xs font-bold
                                    transition-all duration-200 cursor-pointer">

                                خرید طلا

                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19V5m-7 7l7-7 7 7" />
                                </svg>
                            </button>
                        @else
                            <button type="button"
                                class="w-full bg-gray-100 text-gray-400 rounded-lg py-2.5 text-[10px] cursor-not-allowed">

                                حساب غیرفعال

                            </button>
                        @endif

                    </div>

                    {{-- Sell --}}
                    <div class="p-4 flex flex-col gap-3">

                        <div>

                            <div class="flex items-center gap-1.5 mb-2">

                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>

                                <span class="text-xs text-gray-500">
                                    قیمت فروش
                                </span>

                            </div>

                            <div class="font-bold text-gray-800 text-base in-fa">
                                {{ number_format($price?->buy_price) }}
                            </div>

                            <span class="text-[10px] text-gray-400">
                                ریال
                            </span>

                        </div>

                        @if (Auth::user()->isActive)
                            <button type="button" id="sellBox" onclick="openBlock(this)" data-state="sell"
                                class="w-full flex items-center justify-center gap-2
                                    bg-[#F8F5EF] hover:!bg-[#B88A3B]
                                    text-[#B88A3B] hover:!text-white
                                    border border-[#D6AD60]/30 hover:border-[#B88A3B]
                                    rounded-lg py-2.5 text-xs font-bold
                                    transition-all duration-200 cursor-pointer">

                                فروش طلا

                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v14m7-7l-7 7-7-7" />
                                </svg>

                            </button>
                        @else
                            <button type="button"
                                class="w-full bg-gray-100 text-gray-400 rounded-lg py-2.5 text-[10px] cursor-not-allowed">

                                حساب غیرفعال

                            </button>
                        @endif

                    </div>

                </div>

                <div class="bg-gray-50/70 px-4 py-2.5 flex justify-between items-center text-[10px] text-gray-400">

                    <span>
                        قیمت‌ها بر اساس هر گرم
                    </span>

                    <span>
                        واحد محاسبه: ریال
                    </span>

                </div>

            </div>


            {{-- Account Balance --}}
            <div class="mb-5">

                <div class="flex items-center justify-between mb-3 px-1">

                    <h3 class="font-bold text-sm text-gray-800">
                        دارایی‌های من
                    </h3>

                    <span class="text-[10px] text-gray-400">
                        موجودی حساب
                    </span>

                </div>

                <div class="grid grid-cols-2 gap-3">

                    {{-- Wallet --}}
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-3">

                        <div class="flex items-center justify-between mb-3">

                            <span class="text-xs text-gray-500">
                                موجودی ریالی
                            </span>

                            <div class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="2" y="5" width="20" height="14" rx="2" stroke-width="1.8" />
                                    <path stroke-width="1.8" stroke-linecap="round" d="M2 10h20m-15 5h4" />
                                </svg>

                            </div>

                        </div>

                        <div class="font-bold text-sm text-gray-800 in-fa">
                            {{ number_format($asset) }}
                        </div>

                        <span class="text-[10px] text-gray-400 mt-1 block">
                            ریال
                        </span>

                    </div>

                    {{-- Gold Balance --}}
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-3">

                        <div class="flex items-center justify-between mb-3">

                            <span class="text-xs text-gray-500">
                                موجودی طلا
                            </span>

                            <div class="w-8 h-8 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"
                                        d="M12 2L3 9l9 13 9-13-9-7z" />
                                    <path stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"
                                        d="M3 9h18M8 9l4 13 4-13M8 9l4-7 4 7" />
                                </svg>

                            </div>

                        </div>

                        <div class="font-bold text-sm text-gray-800 in-fa">
                            {{-- {{ $totalGoldWeight }} --}}
                            {{ Auth::user()->wallet['goldWeight'] }}
                        </div>

                        <span class="text-[10px] text-gray-400 mt-1 block">
                            گرم
                        </span>

                    </div>

                </div>

            </div>

            {{-- My Transactions --}}
            <div
                class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex flex-col items-center justify-center text-center">

                <h3 class="text-sm font-bold mb-6 text-gray-800">
                    معاملات من در برنامه
                </h3>

                @if (count(Auth::user()->deals))
                    <div class="w-full overflow-x-auto border border-gray-100 rounded-xl p-3 mb-6">

                        <table class="w-full min-w-[650px] text-xs">

                            <thead>

                                <tr class="border-b border-gray-100 text-gray-500">

                                    <th class="py-3 px-2 font-bold">
                                        نوع / زمان
                                    </th>

                                    <th class="py-3 px-2 font-bold">
                                        وضعیت
                                    </th>

                                    <th class="py-3 px-2 font-bold">
                                        قیمت وقت طلا
                                    </th>

                                    <th class="py-3 px-2 font-bold">
                                        وزن
                                    </th>

                                    <th class="py-3 px-2 font-bold">
                                        مبلغ تراکنش
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach (Auth::user()->deals as $deal)
                                    <tr class="border-b border-gray-50 last:border-0">

                                        {{-- Type / Date --}}
                                        <td class="py-4 px-2">

                                            <div class="flex flex-col items-center gap-2">

                                                @if ($deal->transaction->type == 'buy')
                                                    <span class="text-green-500 font-bold">
                                                        خرید
                                                    </span>
                                                @elseif ($deal->transaction->type == 'sell')
                                                    <span class="text-red-500 font-bold">
                                                        فروش
                                                    </span>
                                                @endif

                                                <span class="text-[10px] text-gray-400 in-fa">
                                                    {{ $deal->date . ' - ' . $deal->time }}
                                                </span>

                                            </div>

                                        </td>

                                        {{-- Status --}}
                                        <td class="py-4 px-2">

                                            @if ($deal->transaction->isApproved == 1)
                                                <span class="text-green-500 bg-green-50 px-2 py-1 rounded-md">
                                                    تایید شده
                                                </span>
                                            @elseif ($deal->transaction->isApproved == -1)
                                                <span class="text-red-500 bg-red-50 px-2 py-1 rounded-md">
                                                    رد شده
                                                </span>
                                            @elseif ($deal->transaction->isApproved == 0)
                                                <span class="text-gray-500 bg-gray-50 px-2 py-1 rounded-md">
                                                    در انتظار تایید
                                                </span>
                                            @endif

                                        </td>

                                        {{-- Gold Price --}}
                                        <td class="py-4 px-2">

                                            <span class="text-gray-600 in-fa">
                                                {{ number_format($deal->goldPrice) }}
                                            </span>

                                        </td>

                                        {{-- Weight --}}
                                        <td class="py-4 px-2">

                                            <div class="flex flex-col items-center gap-1">

                                                <span class="in-fa text-gray-700">
                                                    {{ $deal->goldWeight }}
                                                </span>

                                                <span class="text-[10px] text-gray-400">
                                                    گرم
                                                </span>

                                            </div>

                                        </td>

                                        {{-- Transaction Amount --}}
                                        <td class="py-4 px-2">

                                            <div class="flex flex-col items-center gap-1">

                                                <span class="in-fa text-gray-700">
                                                    {{ number_format($deal->transaction->amount) }}
                                                </span>

                                                <span class="text-[10px] text-gray-400">
                                                    ریال
                                                </span>

                                            </div>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                @else
                    <div class="text-gray-300 mb-4">

                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>

                    </div>

                    <p class="text-sm text-gray-500 mb-6">
                        معامله‌ای یافت نشد
                    </p>

                    <button type="button"
                        class="w-full border border-red-200 text-brand-red py-2 rounded-xl text-sm font-bold hover:bg-red-50 transition">

                        مشاهده گردش حساب

                    </button>
                @endif

            </div>

        </div>

    </div>

    {{-- Deal Popup --}}
    <div class="fixed inset-0 w-full h-dvh bg-black/50 backdrop-blur-[2px] transition-all duration-300 invisible opacity-0 z-999"
        id="dealBlock">

        <div class="w-full h-full relative">

            <form action="{{ route('deal.store') }}" method="POST"
                class="w-[calc(100%-24px)] max-w-xl max-h-[85dvh] overflow-y-auto absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all duration-300 bg-white rounded-2xl shadow-2xl border border-gray-100"
                id="mainBlock">

                @csrf

                <input type="hidden" name="goldPrice" id="goldPrice">

                <input type="hidden" name="action" id="actionInp">

                <input type="hidden" name="calcBy" id="calcBy">

                {{-- Popup Header --}}
                <div
                    class="flex justify-between items-center px-4 py-3 border-b border-gray-100 sticky top-0 bg-white z-10">

                    <button type="button"
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-50 text-gray-500 hover:bg-gray-100 transition cursor-pointer"
                        onclick="closeBlock()">

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>

                    <h1 class="font-bold text-base text-gray-800" id="dealPopupTitle">
                        فروش آبشده نقدی
                    </h1>

                </div>

                <div class="p-4 flex flex-col gap-3">

                    {{-- Gold Price --}}
                    <div class="border border-red-100 rounded-xl overflow-hidden bg-red-50/40">
                        <div class="px-3 py-3 flex justify-between items-center">
                            <div class="flex flex-col gap-1">
                                <span class="text-xs text-gray-500">
                                    قیمت هر گرم در این معامله
                                </span>

                                <span id="popupPricePerGram" class="font-bold text-base text-gray-800 in-fa">
                                    -
                                </span>
                            </div>

                            <span class="text-[10px] text-gray-400">
                                ریال
                            </span>
                        </div>
                    </div>

                    {{-- Calculation Mode --}}
                    <div class="flex bg-gray-100 p-1 rounded-lg gap-1">

                        <button id="btnByPrice" type="button"
                            class="flex-1 py-2 text-xs font-bold rounded-md transition-all duration-300 bg-white text-brand-red shadow-sm in-fa">

                            بر اساس مبلغ (ریال)

                        </button>

                        <button id="btnByWeight" type="button"
                            class="flex-1 py-2 text-xs font-bold rounded-md transition-all duration-300 text-gray-500 hover:text-gray-700 in-fa">

                            بر اساس وزن (گرم)

                        </button>

                    </div>

                    {{-- Wallet Balance --}}
                    <div class="flex justify-between items-center px-1 text-xs">

                        <span class="text-gray-500">
                            موجودی کیف پول شما:
                        </span>

                        <span class="font-bold text-gray-700 in-fa">
                            {{ number_format($asset) }} ریال
                        </span>

                    </div>

                    {{-- Input --}}
                    <div>

                        <div id="inputContainer"
                            class="flex border border-gray-200 rounded-lg overflow-hidden focus-within:border-brand-red focus-within:ring-1 focus-within:ring-brand-red transition bg-white">

                            <input type="number" id="userInput" name="userInput" step="0.0001" min="0"
                                placeholder="مبلغ کل (ریال)"
                                class="w-full min-w-0 bg-transparent px-3 py-3 focus:outline-none text-left font-bold text-base in-fa"
                                dir="ltr">

                            <div id="inputUnit"
                                class="bg-gray-50 px-3 border-r border-gray-200 text-gray-500 text-xs flex items-center justify-center in-fa">

                                ریال

                            </div>

                        </div>

                        <p id="priceBlock" class="text-xs text-gray-400 mt-1.5 in-fa"></p>

                        <p id="inputError" class="text-[11px] text-red-500 mt-1.5 hidden">
                            خطا در ورود اطلاعات
                        </p>

                    </div>

                    {{-- Result --}}
                    <div>

                        <div class="flex border border-gray-200 rounded-lg overflow-hidden bg-gray-50">

                            <input type="text" id="resultOutput" name="resultOutput" readonly placeholder="وزن (گرم)"
                                class="w-full min-w-0 bg-transparent px-3 py-3 focus:outline-none text-left font-bold text-brand-red text-base in-fa"
                                dir="ltr">

                            <div id="resultUnit"
                                class="bg-gray-100 px-3 border-r border-gray-200 text-gray-500 text-xs flex items-center justify-center in-fa">

                                گرم

                            </div>

                        </div>

                    </div>

                    {{-- Limits --}}
                    <div class="flex justify-between items-center text-[11px] text-gray-400 px-1">

                        <span>
                            حداکثر مجاز: ۲۰۰ گرم
                        </span>

                        <span>
                            حداقل مجاز: ۰.۰۰۰۱ گرم
                        </span>

                    </div>

                    {{-- Description --}}
                    <div>

                        <textarea rows="2" placeholder="توضیحات (اختیاری)" name="description"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red transition resize-none in-fa"></textarea>

                    </div>

                    {{-- Submit --}}
                    <button id="submitBtn" type="submit" disabled
                        class="w-full bg-gray-300 text-gray-500 font-bold text-sm py-3 rounded-lg cursor-not-allowed transition duration-300">

                        ثبت معامله

                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>
        // قیمت فروش طلا به کاربر
        let buyPricePerGram = @json((float) $price?->sell_price);

        // قیمت خرید طلا از کاربر
        let sellPricePerGram = @json((float) $price?->buy_price);

        // موجودی کیف پول کاربر (ریال)
        let userWalletBalance = @json((float) $asset);

        // موجودی طلای کاربر (گرم)
        let userGoldBalance = @json((float) $totalGoldWeight);

        // قیمت پیش‌فرض
        let pricePerGram = buyPricePerGram;
    </script>

    <script src="{{ asset('assets/js/deal.js') }}"></script>

@endsection
