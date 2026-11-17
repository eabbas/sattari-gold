
@extends('admin.app.dashboard')

@section('title', 'کیف پول')

@section('content')

    <style>
        /* ستاری گلد | Wallet */

        .wallet-page {
            --gold-primary: #D6AD60;
            --gold-dark: #B88A3B;
            --cream-bg: #F8F5EF;
            --cream-border: #E7E2D9;
            --brown-dark: #29251F;
            --brown-muted: #78716C;

            color: var(--brown-dark);
        }

        .wallet-page .wallet-card {
            background: #FFFFFF;
            border: 1px solid var(--cream-border);
            border-radius: 18px;
            box-shadow: 0 3px 14px rgba(41, 37, 31, .035);
        }

        .wallet-page .wallet-section-title {
            color: var(--brown-dark);
            font-weight: 800;
        }

        .wallet-page .wallet-muted {
            color: var(--brown-muted);
        }

        .wallet-page .wallet-divider {
            border-color: var(--cream-border);
        }

        .wallet-page .wallet-input {
            width: 100%;
            margin-top: 9px;
            padding: 12px 14px;
            border: 1px solid var(--cream-border);
            border-radius: 10px;
            outline: none;
            color: var(--brown-dark);
            background: #FFFFFF;
            transition: .2s ease;
        }

        .wallet-page .wallet-input:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(214, 173, 96, .14);
        }

        .wallet-page .wallet-input::placeholder {
            color: #A8A29E;
        }

        .wallet-page .wallet-radio {
            accent-color: var(--gold-dark);
            width: 17px;
            height: 17px;
            cursor: pointer;
        }

        .wallet-page .wallet-percent {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 15px;
            min-width: 65px;
            border: 1px solid var(--cream-border);
            border-radius: 10px;
            background: #FFFFFF;
            color: var(--brown-dark);
            cursor: pointer;
            transition: .2s ease;
        }

        .wallet-page .wallet-percent:has(input:checked) {
            border-color: var(--gold-primary);
            background: #FBF6EA;
            color: var(--gold-dark);
            box-shadow: 0 0 0 2px rgba(214, 173, 96, .12);
        }

        .wallet-page .wallet-type-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
            border: 1px solid var(--cream-border);
            border-radius: 12px;
            cursor: pointer;
            transition: .2s ease;
        }

        .wallet-page .wallet-type-option:has(input:checked) {
            border-color: var(--gold-primary);
            background: #FBF8F1;
        }

        .wallet-page .wallet-submit {
            background: var(--gold-dark);
            color: #FFFFFF;
            transition: .2s ease;
        }

        .wallet-page .wallet-submit:hover {
            background: #A8792F;
            box-shadow: 0 5px 15px rgba(184, 138, 59, .2);
            transform: translateY(-1px);
        }

        .wallet-page .wallet-cancel {
            border: 1px solid var(--cream-border);
            color: var(--brown-muted);
            background: #FFFFFF;
            transition: .2s ease;
        }

        .wallet-page .wallet-cancel:hover {
            border-color: #C9BFB0;
            background: #FAF8F4;
        }

        .wallet-page .wallet-balance-card {
            background: linear-gradient(135deg, #FFFFFF 0%, #FBF8F1 100%);
            border: 1px solid var(--cream-border);
            border-radius: 15px;
        }

        .wallet-page .wallet-gold-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 12px;
            background: #FBF3E2;
            color: var(--gold-dark);
        }

        .wallet-page .wallet-modal {
            box-shadow: 0 12px 35px rgba(41, 37, 31, .12);
        }

        @media (max-width: 640px) {
            .wallet-page .wallet-percent {
                flex: 1;
                min-width: 0;
                padding: 10px 8px;
            }
        }
    </style>

    <div class="wallet-page w-full min-h-screen rounded-2xl p-3 sm:p-5 lg:p-7">

        {{-- پیام‌های سیستم --}}
        @if (session('success'))
            <div class="wallet-modal modal py-4 px-6 rounded-xl bg-green-100 border border-green-200 fixed top-5 right-3 sm:right-5 z-9999999999 flex items-center gap-2 transition-all duration-300">
                <span class="text-sm text-green-800 in-fa">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('failure'))
            <div class="wallet-modal modal py-4 px-6 rounded-xl bg-red-100 border border-red-200 fixed top-5 right-3 sm:right-5 z-9999999999 flex items-center gap-2 transition-all duration-300">
                <span class="text-sm text-red-800 in-fa">{{ session('failure') }}</span>
            </div>
        @endif

        @error('depositFee')
            <div class="wallet-modal modal py-4 px-6 rounded-xl bg-red-100 border border-red-200 fixed top-5 right-3 sm:right-5 z-9999999999 flex items-center transition-all duration-300">
                <span class="text-sm text-red-800 in-fa">{{ $message }}</span>
            </div>
        @enderror

        @error('withdrawFee')
            <div class="wallet-modal modal py-4 px-6 rounded-xl bg-red-100 border border-red-200 fixed top-5 right-3 sm:right-5 z-9999999999 flex items-center transition-all duration-300">
                <span class="text-sm text-red-800 in-fa">{{ $message }}</span>
            </div>
        @enderror

        @error('receipt')
            <div class="wallet-modal modal py-4 px-6 rounded-xl bg-red-100 border border-red-200 fixed top-5 right-3 sm:right-5 z-9999999999 flex items-center transition-all duration-300">
                <span class="text-sm text-red-800 in-fa">{{ $message }}</span>
            </div>
        @enderror


        <div class="max-w-5xl mx-auto">

            {{-- سربرگ صفحه --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">

                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-8 h-1 rounded-full bg-[#D6AD60]"></span>
                        <span class="text-xs font-bold tracking-wide text-[#B88A3B]">
                            SETARI GOLD
                        </span>
                    </div>

                    <h1 class="text-xl sm:text-2xl font-black text-[#29251F]">
                        کیف پول من
                    </h1>

                    <p class="text-xs sm:text-sm text-[#78716C] mt-2">
                        مدیریت موجودی، واریز و برداشت دارایی
                    </p>
                </div>

                <div class="flex items-center gap-2 text-xs text-[#78716C] bg-white border border-[#E7E2D9] rounded-xl px-4 py-3">
                    <svg class="w-4 h-4 text-[#B88A3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 8v4l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>مدیریت دارایی شما</span>
                </div>

            </div>


            <form
                id="walletTransactionForm"
                action="{{ route('wallet.transactionRequest') }}"
                method="POST"
                enctype="multipart/form-data"
                onsubmit="submitBtn(event)"
            >
                @csrf

                <div class="grid grid-cols-6 gap-4 sm:gap-5">

                    {{-- اطلاعات کاربر --}}
                    <div class="col-span-6 wallet-card p-4 sm:p-5">

                        <div class="flex items-center gap-2 mb-4">
                            <span class="wallet-gold-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                        d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M14 3.13a4 4 0 0 1 0 7.75M14 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
                                </svg>
                            </span>

                            <div>
                                <h2 class="text-sm font-bold text-[#29251F]">اطلاعات حساب</h2>
                                <p class="text-[11px] text-[#78716C] mt-1">مشخصات کاربری شما</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                            <div class="rounded-xl bg-[#F8F5EF] p-3 sm:p-4">
                                <span class="block text-xs text-[#78716C] mb-2">نام و نام خانوادگی</span>
                                <span class="text-sm font-bold text-[#29251F]">
                                    {{ $user['name'] }} {{ $user['family'] }}
                                </span>
                            </div>

                            <div class="rounded-xl bg-[#F8F5EF] p-3 sm:p-4">
                                <span class="block text-xs text-[#78716C] mb-2">شماره تلفن</span>
                                <span class="text-sm font-bold text-[#29251F] in-fa">
                                    {{ $user['phoneNumber'] }}
                                </span>
                            </div>

                        </div>
                    </div>


                    {{-- کارت موجودی ریالی --}}
                    <div class="col-span-6 md:col-span-3 wallet-card p-4 sm:p-5">

                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-center gap-3">
                                <span class="wallet-gold-icon">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 576 512">
                                        <path d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9-1.8 103.1 11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z" />
                                    </svg>
                                </span>

                                <div>
                                    <h2 class="text-sm font-bold text-[#29251F]">موجودی ریالی</h2>
                                    <p class="text-[11px] text-[#78716C] mt-1">دارایی نقدی شما</p>
                                </div>
                            </div>

                            <span class="text-[10px] font-bold text-[#B88A3B] bg-[#FBF3E2] rounded-full px-3 py-1">
                                ریال
                            </span>
                        </div>

                        <div class="rounded-xl bg-[#F8F5EF] p-4">
                            <span class="block text-xs text-[#78716C] mb-2">موجودی کل</span>

                            <div class="flex items-baseline gap-2">
                                <span class="text-xl sm:text-2xl font-black text-[#29251F] in-fa">
                                    {{ number_format($user->wallet['asset'] ?? 0) }}
                                </span>
                                <span class="text-xs text-[#78716C]">ریال</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-[#E7E2D9]">
                            <span class="text-xs text-[#78716C]">موجودی قابل برداشت</span>
                            <span class="text-sm font-bold text-[#B88A3B] in-fa">
                                {{ number_format($user->wallet['asset'] ?? 0) }}
                            </span>
                        </div>

                        <span
                            id="withdrawableBalance"
                            class="hidden"
                            data-balance="{{ $user->wallet['asset'] ?? 0 }}"
                        ></span>

                    </div>


                    {{-- کارت موجودی طلا --}}
                    <div class="col-span-6 md:col-span-3 wallet-card p-4 sm:p-5">

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
                                    <p class="text-[11px] text-[#78716C] mt-1">دارایی طلایی شما</p>
                                </div>
                            </div>

                            <span class="text-[10px] font-bold text-[#B88A3B] bg-[#FBF3E2] rounded-full px-3 py-1">
                                گرم
                            </span>
                        </div>

                        <div class="rounded-xl bg-[#F8F5EF] p-4">
                            <span class="block text-xs text-[#78716C] mb-2">موجودی کل</span>

                            <div class="flex items-baseline gap-2">
                                <span class="text-xl sm:text-2xl font-black text-[#29251F] in-fa">
                                    {{ $user->wallet->goldWeight ?? 0 }}
                                </span>
                                <span class="text-xs text-[#78716C]">گرم</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-[#E7E2D9]">
                            <span class="text-xs text-[#78716C]">موجودی قابل برداشت</span>
                            <span class="text-sm font-bold text-[#B88A3B] in-fa">
                                {{ $user->wallet->goldWeight ?? 0 }} گرم
                            </span>
                        </div>

                        <div class="flex items-center justify-between mt-3">
                            <span class="text-xs text-[#78716C]">ارزش دارایی شما</span>
                            <span class="text-sm font-bold text-[#29251F] in-fa">
                                {{ number_format(($user->wallet->goldWeight ?? 0) * 25000000) }}
                                <span class="text-[10px] font-normal text-[#78716C]">ریال</span>
                            </span>
                        </div>

                    </div>


                    {{-- انتخاب نوع تراکنش --}}
                    <div class="col-span-6 wallet-card p-4 sm:p-5">

                        <div class="flex items-center gap-2 mb-4">
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

                        <div class="grid grid-cols-2 gap-3">

                            <div>
                                <label for="deposit" class="wallet-type-option">
                                    <input
                                        class="wallet-radio"
                                        type="radio"
                                        name="transactionType"
                                        value="deposit"
                                        id="deposit"
                                        onclick="transactionMethod('deposit', this)"
                                    >

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
                                </label>

                                <span id="depositTypeError" class="block text-xs text-red-500 mt-2"></span>
                            </div>

                            <div>
                                <label for="withdraw" class="wallet-type-option">
                                    <input
                                        class="wallet-radio"
                                        type="radio"
                                        name="transactionType"
                                        value="withdraw"
                                        id="withdraw"
                                        onclick="transactionMethod('withdraw', this)"
                                    >

                                    <span class="flex-1">
                                        <span class="block text-sm font-bold text-[#29251F]">برداشت وجه</span>
                                        <span class="block text-[10px] text-[#78716C] mt-1">انتقال وجه از کیف پول</span>
                                    </span>

                                    <span class="text-red-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M5 12h14" />
                                        </svg>
                                    </span>
                                </label>

                                <span id="withdrawTypeError" class="block text-xs text-red-500 mt-2"></span>
                            </div>

                        </div>
                    </div>


                    {{-- فرم داینامیک واریز و برداشت --}}
                    <div
                        id="transactionMethod"
                        class="col-span-6 grid grid-cols-6 gap-4 wallet-card p-4 sm:p-5"
                    ></div>


                    {{-- دکمه‌ها --}}
                    @if (Auth::user()->isActive)

                        <button
                            type="submit"
                            id="walletSubmitButton"
                            class="wallet-submit col-span-3 py-4 rounded-xl font-bold text-sm cursor-pointer"
                        >
                            <span class="inline-flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="m5 12 4 4L19 6" />
                                </svg>
                                ثبت درخواست
                            </span>
                        </button>

                        <button
                            type="reset"
                            class="wallet-cancel col-span-3 py-4 rounded-xl font-bold text-sm cursor-pointer"
                        >
                            لغو عملیات
                        </button>

                    @else

                        <div class="col-span-6 bg-[#FBF3E2] border border-[#E7D4AD] text-[#92703A] py-5 px-4 rounded-xl font-bold text-center text-sm">
                            پس از فعال سازی حساب کاربری شما توسط مدیریت میتوانید واریز و برداشت انجام دهید.
                        </div>

                    @endif

                </div>
            </form>
        </div>

    </div>


    <script>
        /* -------------------------------------------------------
         | تنظیمات
         ------------------------------------------------------- */

        let setting = @json($setting);

        if (typeof setting === 'string') {
            try {
                setting = JSON.parse(setting);
            } catch (error) {
                setting = null;
                console.error('خطا در خواندن تنظیمات کیف پول:', error);
            }
        }

        let currentTransactionType = null;

        let minDeposit = true;
        let maxDeposit = true;
        let minWithdraw = true;
        let maxWithdraw = true;

        const transactionMethodContainer = document.getElementById('transactionMethod');

        const transactionForm = document.getElementById('walletTransactionForm');

        const depositTypeError = document.getElementById('depositTypeError');

        const withdrawTypeError = document.getElementById('withdrawTypeError');


        /* -------------------------------------------------------
         | توابع کمکی
         ------------------------------------------------------- */

        function formatNumber(value) {
            return Number(value).toLocaleString('fa-IR');
        }


        function getSettingNumber(key) {
            const value = Number(setting?.[key]);

            return Number.isFinite(value) ? value : null;
        }


        function resetValidation() {
            minDeposit = true;
            maxDeposit = true;

            minWithdraw = true;
            maxWithdraw = true;
        }


        function getTransactionInput(state) {
            return document.getElementById(
                state === 'deposit' ? 'depositFee' : 'withdrawFee'
            );
        }


        /* -------------------------------------------------------
         | اعتبارسنجی مبلغ
         ------------------------------------------------------- */

        function checkFee(state, input) {

            if (!input || !setting) {
                return false;
            }

            const value = input.value.trim();

            const amount = value === '' ? NaN : Number(value);

            const helperContainer = input.parentElement.querySelector('.amount-helper');

            if (!helperContainer) {
                return false;
            }

            const tomanElement = helperContainer.querySelector('.toman-price');

            const errorElement = helperContainer.querySelector('.amount-error');

            errorElement.innerText = '';
            tomanElement.innerText = '';

            if (!Number.isFinite(amount) || amount <= 0) {

                if (state === 'deposit') {
                    minDeposit = false;
                } else {
                    minWithdraw = false;
                }

                const minAmount = getSettingNumber(
                    state === 'deposit' ? 'minDepositAmount' : 'minWithdrawAmount'
                );

                if (minAmount !== null) {
                    errorElement.innerText =
                        `حداقل مبلغ ${state === 'deposit' ? 'واریز' : 'برداشت'} ${formatNumber(minAmount)} ریال است.`;
                } else {
                    errorElement.innerText = 'لطفاً مبلغ معتبری وارد کنید.';
                }

                return false;
            }

            const minAmount = getSettingNumber(
                state === 'deposit' ? 'minDepositAmount' : 'minWithdrawAmount'
            );

            const maxAmount = getSettingNumber(
                state === 'deposit' ? 'maxDepositAmount' : 'maxWithdrawAmount'
            );

            let isValid = true;

            if (minAmount !== null && amount < minAmount) {

                errorElement.innerText =
                    `حداقل مبلغ ${state === 'deposit' ? 'واریز' : 'برداشت'} ${formatNumber(minAmount)} ریال است.`;

                isValid = false;
            }

            if (maxAmount !== null && amount > maxAmount) {

                errorElement.innerText =
                    `حداکثر مبلغ ${state === 'deposit' ? 'واریز' : 'برداشت'} ${formatNumber(maxAmount)} ریال است.`;

                isValid = false;
            }

            const tomanPrice = Math.floor(amount / 10);

            if (Number.isFinite(tomanPrice) && tomanPrice > 0) {
                tomanElement.innerText =
                    'معادل ' + formatNumber(tomanPrice) + ' تومان';
            }

            if (state === 'deposit') {
                minDeposit = isValid;
                maxDeposit = isValid;
            } else {
                minWithdraw = isValid;
                maxWithdraw = isValid;
            }

            return isValid;
        }


        /* -------------------------------------------------------
         | نمایش فرم واریز یا برداشت
         ------------------------------------------------------- */

        function transactionMethod(state, el) {

            if (!setting) {
                alert('تنظیمات کیف پول در دسترس نیست.');
                el.checked = false;
                return;
            }

            depositTypeError.innerText = '';
            withdrawTypeError.innerText = '';

            currentTransactionType = state;

            resetValidation();

            const isActive = state === 'deposit'
                ? Number(setting.depositIsActive) === 1
                : Number(setting.withdrawIsActive) === 1;

            if (!isActive) {

                const errorElement = state === 'deposit'
                    ? depositTypeError
                    : withdrawTypeError;

                errorElement.innerText =
                    state === 'deposit'
                        ? 'در حال حاضر امکان واریز کردن غیرفعال است.'
                        : 'در حال حاضر امکان برداشت کردن غیرفعال است.';

                el.checked = false;

                currentTransactionType = null;

                transactionMethodContainer.innerHTML = '';

                return;
            }


            /* ------------------------------
             | فرم واریز
             ------------------------------ */

            if (state === 'deposit') {

                transactionMethodContainer.innerHTML = `

                    <label class="col-span-6 md:col-span-3 text-sm font-bold text-[#29251F]" for="depositFee">

                        مبلغ (ریال)

                        <span class="text-[10px] text-red-500">
                            (اجباری)
                        </span>

                        <input
                            class="wallet-input in-fa font-normal"
                            type="number"
                            name="depositFee"
                            id="depositFee"
                            placeholder="مبلغ مورد نظر به ریال"
                            min="1"
                            step="1"
                            required
                        >

                        <div class="amount-helper my-2 flex flex-col gap-1">

                            <span class="toman-price text-xs text-[#78716C]"></span>

                            <span class="amount-error text-xs text-red-500"></span>

                        </div>

                    </label>


                    <label class="col-span-6 md:col-span-3 text-sm font-bold text-[#29251F]" for="receipt">

                        تصویر فیش واریزی

                        <span class="text-[10px] text-red-500">
                            (اجباری)
                        </span>

                        <input
                            class="wallet-input font-normal"
                            type="file"
                            name="receipt"
                            id="receipt"
                            accept="image/*"
                            required
                        >

                    </label>


                    <label class="col-span-6 text-sm font-bold text-[#29251F]" for="description">

                        توضیحات

                        <textarea
                            class="wallet-input font-normal"
                            name="description"
                            id="description"
                            rows="3"
                            placeholder="در صورت نیاز توضیحات خود را وارد کنید..."
                        ></textarea>

                    </label>

                `;

                const depositInput = document.getElementById('depositFee');

                depositInput.addEventListener('input', function () {
                    checkFee('deposit', this);
                });

                return;
            }


            /* ------------------------------
             | فرم برداشت
             ------------------------------ */

            if (state === 'withdraw') {

                transactionMethodContainer.innerHTML = `

                    <div id="percents" class="col-span-6">

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">

                            <span class="text-sm font-bold text-[#29251F]">
                                انتخاب میزان برداشت
                            </span>

                            <span class="text-xs text-[#78716C]">
                                درصد مورد نظر را انتخاب کنید
                            </span>

                        </div>

                        <div class="w-full flex items-center justify-between gap-2 flex-wrap">

                            <label for="withdrawPercent10" class="wallet-percent">
                                <input
                                    type="radio"
                                    name="withdrawPercent"
                                    id="withdrawPercent10"
                                    value="10"
                                    class="wallet-radio"
                                >
                                <span class="in-fa text-sm">10%</span>
                            </label>

                            <label for="withdrawPercent25" class="wallet-percent">
                                <input
                                    type="radio"
                                    name="withdrawPercent"
                                    id="withdrawPercent25"
                                    value="25"
                                    class="wallet-radio"
                                >
                                <span class="in-fa text-sm">25%</span>
                            </label>

                            <label for="withdrawPercent50" class="wallet-percent">
                                <input
                                    type="radio"
                                    name="withdrawPercent"
                                    id="withdrawPercent50"
                                    value="50"
                                    class="wallet-radio"
                                >
                                <span class="in-fa text-sm">50%</span>
                            </label>

                            <label for="withdrawPercent75" class="wallet-percent">
                                <input
                                    type="radio"
                                    name="withdrawPercent"
                                    id="withdrawPercent75"
                                    value="75"
                                    class="wallet-radio"
                                >
                                <span class="in-fa text-sm">75%</span>
                            </label>

                            <label for="withdrawPercent100" class="wallet-percent">
                                <input
                                    type="radio"
                                    name="withdrawPercent"
                                    id="withdrawPercent100"
                                    value="100"
                                    class="wallet-radio"
                                >
                                <span class="in-fa text-sm">100%</span>
                            </label>

                        </div>

                    </div>


                    <label class="col-span-6 md:col-span-3 text-sm font-bold text-[#29251F]" for="withdrawFee">

                        مبلغ (ریال)

                        <span class="text-[10px] text-red-500">
                            (اجباری)
                        </span>

                        <input
                            class="wallet-input in-fa font-normal"
                            type="number"
                            name="withdrawFee"
                            id="withdrawFee"
                            placeholder="مبلغ مورد نظر به ریال"
                            min="1"
                            step="1"
                            required
                        >

                        <div class="amount-helper my-2 flex flex-col gap-1">

                            <span class="toman-price text-xs text-[#78716C]"></span>

                            <span class="amount-error text-xs text-red-500"></span>

                        </div>

                    </label>


                    <label class="col-span-6 text-sm font-bold text-[#29251F]" for="description">

                        توضیحات

                        <textarea
                            class="wallet-input font-normal"
                            name="description"
                            id="description"
                            rows="3"
                            placeholder="در صورت نیاز توضیحات خود را وارد کنید..."
                        ></textarea>

                    </label>

                `;

                percents();
            }
        }


        /* -------------------------------------------------------
         | انتخاب درصد برداشت
         ------------------------------------------------------- */

        function percents() {

            const withdrawPercents = document.querySelectorAll(
                'input[name="withdrawPercent"]'
            );

            const withdrawableBalanceElement = document.getElementById(
                'withdrawableBalance'
            );

            const feeInput = document.getElementById('withdrawFee');

            const withdrawableBalance = Number(
                withdrawableBalanceElement.dataset.balance
            );


            // انتخاب درصد و محاسبه مبلغ
            withdrawPercents.forEach(percent => {

                percent.addEventListener('change', function () {

                    if (!Number.isFinite(withdrawableBalance) || withdrawableBalance <= 0) {

                        feeInput.value = '';

                        checkFee('withdraw', feeInput);

                        return;
                    }

                    const selectedPercent = Number(this.value);

                    const calculatedAmount = Math.floor(
                        withdrawableBalance * selectedPercent / 100
                    );

                    feeInput.value = calculatedAmount;

                    checkFee('withdraw', feeInput);

                });

            });


            // اگر کاربر مبلغ را دستی تغییر دهد،
            // انتخاب درصد قبلی باید برداشته شود.
            feeInput.addEventListener('input', function () {

                withdrawPercents.forEach(percent => {
                    percent.checked = false;
                });

                checkFee('withdraw', this);

            });

        }


        /* -------------------------------------------------------
         | ارسال فرم
         ------------------------------------------------------- */

        function submitBtn(event) {

            event.preventDefault();

            if (!currentTransactionType) {
                alert('لطفاً ابتدا نوع تراکنش را انتخاب کنید.');
                return;
            }

            const input = getTransactionInput(currentTransactionType);

            if (!input) {
                alert('فیلد مبلغ تراکنش پیدا نشد.');
                return;
            }

            // اعتبارسنجی نهایی مبلغ
            const isAmountValid = checkFee(currentTransactionType, input);

            if (!isAmountValid) {
                input.focus();
                return;
            }

            // بررسی فعال بودن عملیات در زمان ارسال
            const isActive = currentTransactionType === 'deposit'
                ? Number(setting?.depositIsActive) === 1
                : Number(setting?.withdrawIsActive) === 1;

            if (!isActive) {
                alert('این عملیات در حال حاضر غیرفعال است.');
                return;
            }

            // بررسی اعتبارسنجی فرم و فیلدهای اجباری
            if (!transactionForm.reportValidity()) {
                return;
            }

            // ارسال همان فرم کیف پول
            transactionForm.submit();
        }


        /* -------------------------------------------------------
         | بازنشانی فرم
         ------------------------------------------------------- */

        transactionForm.addEventListener('reset', function () {

            currentTransactionType = null;

            resetValidation();

            transactionMethodContainer.innerHTML = '';

            depositTypeError.innerText = '';

            withdrawTypeError.innerText = '';

        });

    </script>

@endsection
