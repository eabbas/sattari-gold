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

            </div>


            {{-- Account Balance --}}
            <div class="mb-5">

                <div class="flex items-center justify-between mb-3 px-1">

                    <h3 class="font-bold text-sm text-gray-800">
                        دارایی‌های من
                    </h3>

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
                            {{ $totalGoldWeight }}
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

                @if (count($deals))
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

                                @foreach ($deals as $deal)
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
    <div id="dealBlock"
        class="fixed inset-0 z-[999] invisible pointer-events-none opacity-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300">
        <div class="flex min-h-full w-full items-center justify-center overflow-y-auto p-3 sm:p-5">
            <form action="{{ route('deal.store') }}" method="POST" id="mainBlock" role="dialog" aria-modal="true"
                aria-labelledby="dealPopupTitle"
                class="my-auto flex max-h-[calc(100dvh-24px)] w-full max-w-lg flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-2xl transition-all duration-300 sm:max-h-[85dvh]"
                onclick="event.stopPropagation()">
                @csrf

                <input type="hidden" name="goldPrice" id="goldPrice">
                <input type="hidden" name="action" id="actionInp">
                <input type="hidden" name="calcBy" id="calcBy">
                <input type="hidden" name="userInput" id="userInput">
                <input type="hidden" name="resultOutput" id="resultOutput">

                {{-- Header --}}
                <div
                    class="sticky top-0 z-10 flex shrink-0 items-center justify-between border-b border-gray-100 bg-white px-4 py-3">
                    <h2 id="dealPopupTitle" class="text-sm font-bold text-gray-800">
                        ثبت معامله
                    </h2>

                    <button type="button" onclick="closeBlock()" aria-label="بستن پنجره"
                        class="flex h-9 w-9 items-center justify-center rounded-lg text-gray-400 transition hover:bg-gray-100 hover:text-gray-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Content --}}
                <div class="flex flex-col gap-4 overflow-y-auto p-4">

                    {{-- Gold Price --}}
                    <div class="flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 px-3 py-3">
                        <div>
                            <p class="mb-1 text-xs text-gray-500">
                                قمیت لحظه ای طلا
                            </p>

                            <p id="popupPricePerGram" class="font-bold text-base text-gray-800 in-fa">
                                -
                            </p>
                        </div>

                        <span class="text-[10px] text-gray-400">
                            ریال
                        </span>
                    </div>

                    {{-- Balance --}}
                    <div class="flex flex-col gap-3 rounded-xl border border-gray-100 p-3">
                        <div class="flex items-center justify-between gap-2">
                            <span id="balanceTitle" class="text-xs text-gray-500">
                                موجودی کیف پول شما
                            </span>

                            <span id="balanceValue" class="text-sm font-bold text-gray-800 in-fa">
                                -
                            </span>
                        </div>

                        <div>

                            <div class="grid grid-cols-4 gap-2">
                                <button type="button" data-percent="25"
                                    class="percent-btn rounded-lg border border-gray-200 py-2 text-xs font-semibold text-gray-600 transition hover:border-brand-red hover:text-brand-red">
                                    ۲۵٪
                                </button>

                                <button type="button" data-percent="50"
                                    class="percent-btn rounded-lg border border-gray-200 py-2 text-xs font-semibold text-gray-600 transition hover:border-brand-red hover:text-brand-red">
                                    ۵۰٪
                                </button>

                                <button type="button" data-percent="75"
                                    class="percent-btn rounded-lg border border-gray-200 py-2 text-xs font-semibold text-gray-600 transition hover:border-brand-red hover:text-brand-red">
                                    ۷۵٪
                                </button>

                                <button type="button" data-percent="100"
                                    class="percent-btn rounded-lg border border-gray-200 py-2 text-xs font-semibold text-gray-600 transition hover:border-brand-red hover:text-brand-red">
                                    ۱۰۰٪
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Amount Input --}}
                    <div>
                        <label for="amountInput" class="mb-2 block text-xs font-semibold text-gray-600">
                            مبلغ معامله
                        </label>

                        <div
                            class="flex overflow-hidden rounded-xl border border-gray-200 bg-white transition focus-within:border-brand-red focus-within:ring-2 focus-within:ring-brand-red/10">
                            <input type="text" id="amountInput" inputmode="numeric" autocomplete="off"
                                placeholder="مبلغ را وارد کنید" dir="ltr"
                                class="w-full min-w-0 bg-transparent px-3 py-3 text-left text-base font-bold text-gray-800 outline-none in-fa">

                            <span
                                class="flex shrink-0 items-center border-r border-gray-100 bg-gray-50 px-3 text-xs text-gray-500">
                                ریال
                            </span>
                        </div>

                        <p id="tomanEquivalent" class="mt-2 min-h-5 text-[11px] text-gray-400 in-fa"></p>
                    </div>

                    {{-- Weight Input --}}
                    <div>
                        <label for="weightInput" class="mb-2 block text-xs font-semibold text-gray-600">
                            وزن طلا
                        </label>

                        <div
                            class="flex overflow-hidden rounded-xl border border-gray-200 bg-white transition focus-within:border-brand-red focus-within:ring-2 focus-within:ring-brand-red/10">
                            <input type="text" id="weightInput" inputmode="decimal" autocomplete="off"
                                placeholder="وزن را وارد کنید" dir="ltr"
                                class="w-full min-w-0 bg-transparent px-3 py-3 text-left text-base font-bold text-gray-800 outline-none in-fa">

                            <span
                                class="flex shrink-0 items-center border-r border-gray-100 bg-gray-50 px-3 text-xs text-gray-500">
                                گرم
                            </span>
                        </div>
                    </div>

                    {{-- Error --}}
                    <p id="inputError" class="hidden rounded-lg bg-red-50 px-3 py-2 text-xs leading-6 text-red-600"></p>

                    {{-- Limits --}}
                    <div class="flex items-center justify-between gap-2 text-[10px] text-gray-400">
                        <span>حداکثر مجاز: ۲۰۰ گرم</span>
                        <span>حداقل مجاز: ۰.۰۰۰۱ گرم</span>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="dealDescription" class="mb-2 block text-xs font-semibold text-gray-600">
                            توضیحات
                            <span class="font-normal text-gray-400">(اختیاری)</span>
                        </label>

                        <textarea id="dealDescription" name="description" rows="2" placeholder="توضیحات خود را وارد کنید..."
                            class="w-full resize-none rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none transition focus:border-brand-red focus:ring-2 focus:ring-brand-red/10 in-fa"></textarea>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="shrink-0 border-t border-gray-100 bg-white p-4">
                    <button type="submit" id="submitBtn" disabled
                        class="w-full cursor-not-allowed rounded-xl bg-gray-200 py-3 text-sm font-bold text-gray-400 transition duration-200">
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
