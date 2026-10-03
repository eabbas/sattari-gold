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
    </style>

    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    <div class="w-full bg-[#fdf5f6] min-h-screen relative shadow-2xl overflow-hidden flex flex-col">

        <div class="w-full overflow-y-auto pb-24 px-4">

            <div class="bg-red-50 border border-red-200 rounded-xl p-3 text-xs leading-6 text-red-800 relative mb-6">
                <div class="absolute -top-3 right-4 bg-brand-red text-white p-1 rounded-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <p class="mb-2">فیش های واریز و پرداخت باید تا تایم بانکی (روز ۱۳:۳۰) تسویه جا به جا شوند.</p>
                <p class="mb-2">برای ثبت حواله و معاملات پشت خطی با شماره ۰۹۱۴۳۲۲۵۴۲۹ تماس بگیرید.</p>
                <p class="mb-2">تمام معاملات نقدی بوده و تمام مشتریان ملزم به جابجایی فیزیکی طلا و پول می باشند.</p>
                <p>تمامی معاملات ریالی چهارشنبه برای شنبه میباشد.</p>
            </div>

            <div class="flex justify-between items-center text-xs text-gray-500 mb-4 px-2">
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>به روزرسانی ۳ ثانیه قبل</span>
                </div>
                <a href="#" class="text-brand-red flex items-center gap-1 font-medium">
                    <span>تحلیل</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-4 mb-4">
                <div class="flex justify-center items-center gap-2 mb-4">
                    <span class="text-2xl">🧈</span>
                    <h2 class="font-bold text-lg">آبشده نقدی</h2>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="border border-gray-100 rounded-xl p-3 flex flex-col items-center text-center">
                        <span class="font-semibold mb-2">بخرید</span>
                        <span class="text-xs text-gray-500 mb-3">گرم: ۲۴۲,۶۹۳,۴۵۶</span>
                        <button
                            class="w-full bg-[#2eb85c] text-white py-2 rounded-lg font-bold text-sm shadow-md hover:bg-green-700 transition cursor-pointer"
                            id="buyBox" onclick="openBlock(this)" data-state="buy">
                            ۱,۰۵۱,۳۰۰,۰۰۰
                        </button>
                    </div>

                    <div class="border border-gray-100 rounded-xl p-3 flex flex-col items-center text-center">
                        <span class="font-semibold mb-2">بفروشید</span>
                        <span class="text-xs text-gray-500 mb-3">گرم: ۲۴۲,۱۶۲,۴۹۹</span>
                        <button
                            class="w-full bg-[#e53945] text-white py-2 rounded-lg font-bold text-sm shadow-md hover:bg-red-700 transition cursor-pointer"
                            id="sellBox" onclick="openBlock(this)" data-state="sell">
                            ۱,۰۳۹,۰۰۰,۰۰۰
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-4 mb-4">
                <div class="flex justify-between items-center relative">
                    <div class="flex-1 text-center">
                        <span class="block text-sm font-semibold mb-1">انس طلا</span>
                        <span class="block text-sm text-gray-600">۴,۳۹۵ دلار</span>
                    </div>

                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 bg-yellow-100 p-2 rounded-lg border border-yellow-200">
                        <span class="text-lg">🧈</span>
                    </div>

                    <div class="flex-1 text-center">
                        <span class="block text-sm font-semibold mb-1">طلای جهانی</span>
                        <span class="block text-sm text-gray-600">۱,۰۶۹,۵۷۷,۶۱۵ ریال</span>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-sm text-gray-500 mb-3 px-2">مانده حساب</h3>
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-white rounded-xl border border-gray-200 p-4 flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 mb-1">موجودی ریال</span>
                            <span class="text-gray-400 tracking-widest in-fa">{{ number_format($asset) }}</span>
                        </div>
                        <span class="text-xl">💳</span>
                    </div>
                    <div class="bg-white rounded-xl border border-gray-200 p-4 flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 mb-1">موجودی طلایی</span>
                            <span class="text-gray-400 tracking-widest in-fa">{{ $totalGoldWeight }}</span>
                        </div>
                        <span class="text-xl">🧈</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col items-center justify-center text-center">
                <h3 class="text-sm font-semibold mb-6">معاملات امروز من در برنامه</h3>
                <div class="text-gray-300 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <p class="text-sm text-gray-500 mb-6">معامله‌ای یافت نشد</p>
                <button
                    class="w-full border border-red-200 text-brand-red py-2 rounded-xl text-sm font-medium hover:bg-red-50 transition">
                    مشاهده گردش حساب
                </button>
            </div>

        </div>

    </div>

    <div class="fixed w-full h-dvh top-0 right-0 bg-black/50 transition-all duration-300 invisible opacity-0"
        id="dealBlock">
        <div class="w-full h-full relative">



            <form action="{{ route('deal.store') }}" method="POST"
                class="w-full absolute -bottom-full transition-all duration-300 right-0 bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100"
                id="mainBlock">
                @csrf
                <input type="hidden" name="goldPrice" id="goldPrice">
                <input type="hidden" name="action" id="actionInp">
                <input type="hidden" name="calcBy" id="calcBy">
                <div class="flex justify-between items-center p-4 border-b border-gray-100">
                    <button type="button" class="text-gray-500 hover:text-gray-800 transition cursor-pointer"
                        onclick="closeBlock()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                    <h1 class="font-bold text-lg text-gray-800" id="dealPopupTitle">فروش آبشده نقدی</h1>
                </div>
                <div class="p-5 flex flex-col gap-5">

                    <div
                        class="border border-red-500 rounded-xl flex overflow-hidden divide-x divide-red-500 divide-x-reverse">
                        <div class="flex-1 p-3 flex justify-between items-center bg-red-50/30">
                            <span class="text-sm text-gray-500">مثقال:</span>
                            <span class="font-semibold text-sm">۱,۰۴۸,۹۰۰,۰۰۰ ریال</span>
                        </div>
                        <div class="flex-1 p-3 flex justify-between items-center bg-red-50/30">
                            <span class="text-sm text-gray-500">گرم:</span>
                            <span class="font-semibold text-sm">۲۴۲,۱۳۹,۴۱۴ ریال</span>
                        </div>
                    </div>

                    <div class="flex bg-gray-100 p-1 rounded-xl">
                        <button id="btnByPrice" type="button"
                            class="flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 bg-white text-brand-red shadow-sm in-fa">
                            بر اساس مبلغ (ریال)
                        </button>
                        <button id="btnByWeight" type="button"
                            class="flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 text-gray-500 hover:text-gray-700 in-fa">
                            بر اساس وزن (گرم)
                        </button>
                    </div>

                    <div class="flex justify-between items-center text-xs text-gray-500 px-1 -mb-2">
                        <span>موجودی کیف پول شما:</span>
                        <span class="font-semibold text-gray-700 in-fa">{{ number_format($asset) }} ریال</span>
                    </div>

                    <div>
                        <div id="inputContainer"
                            class="flex border border-gray-300 rounded-xl overflow-hidden focus-within:border-brand-red focus-within:ring-1 focus-within:ring-brand-red transition bg-white">
                            <input type="number" id="userInput" name="userInput" step="0.0001" min="0"
                                placeholder="مبلغ کل"
                                class="w-full bg-transparent px-4 py-3.5 focus:outline-none text-left font-semibold text-lg in-fa"
                                dir="ltr">
                            <div id="inputUnit"
                                class="bg-gray-100 px-4 py-3.5 border-r border-gray-300 text-gray-500 text-sm flex items-center justify-center in-fa">
                                ریال
                            </div>
                        </div>
                        <p id="inputError" class="text-xs text-brand-red mt-1 hidden">خطا در ورود اطلاعات</p>
                    </div>

                    <div>
                        <div class="flex border border-gray-300 rounded-xl overflow-hidden bg-gray-50">
                            <input type="text" id="resultOutput" name="resultOutput" readonly placeholder="وزن (گرم)"
                                class="w-full bg-transparent px-4 py-3.5 focus:outline-none text-left font-bold text-brand-red in-fa"
                                dir="ltr">
                            <div id="resultUnit"
                                class="bg-gray-100 px-4 py-3.5 border-r border-gray-300 text-gray-500 text-sm flex items-center justify-center in-fa">
                                گرم
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center text-xs text-gray-400 px-1 -mt-2">
                        <span>حداکثر: ۲۰۰ گرم</span>
                        <span>حداقل: ۰.۰۱ گرم</span>
                    </div>

                    <div>
                        <textarea rows="2" placeholder="توضیحات" name="description"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3.5 focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red transition resize-none in-fa"></textarea>
                    </div>

                    <button id="submitBtn" disabled
                        class="w-full bg-gray-300 text-gray-500 font-bold py-4 rounded-xl cursor-not-allowed transition duration-300 mt-2">
                        ثبت
                    </button>

                </div>
            </form>
        </div>
    </div>
    <script>
        let pricePerGram = 242139414
        let userWalletBalance = "{{ $asset }}"
    </script>
    <script src="{{ asset('assets/js/deal.js') }}"></script>
@endsection
