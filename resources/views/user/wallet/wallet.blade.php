
@extends('admin.app.dashboard')
@section('title', 'کیف پول')
@section('content')

    {{-- پیام‌ها --}}
    @if (session('success'))
        <div class="modal fixed top-6 right-4 sm:right-6 z-[9999999999] flex items-center gap-3 rounded-2xl border border-emerald-200 bg-white px-6 py-4 shadow-xl transition-all">
            <span class="flex size-9 items-center justify-center rounded-full bg-emerald-50 text-emerald-600">✓</span>
            <span class="text-sm font-medium text-[#29251F]">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('failure'))
        <div class="modal fixed top-6 right-4 sm:right-6 z-[9999999999] flex items-center gap-3 rounded-2xl border border-red-200 bg-white px-6 py-4 shadow-xl transition-all">
            <span class="flex size-9 items-center justify-center rounded-full bg-red-50 text-red-500">!</span>
            <span class="text-sm font-medium text-[#29251F]">{{ session('failure') }}</span>
        </div>
    @endif

    @error('depositFee')
        <div class="modal fixed top-6 right-4 sm:right-6 z-[9999999999] rounded-2xl border border-red-200 bg-white px-6 py-4 text-sm text-red-500 shadow-xl">
            {{ $message }}
        </div>
    @enderror

    @error('withdrawFee')
        <div class="modal fixed top-6 right-4 sm:right-6 z-[9999999999] rounded-2xl border border-red-200 bg-white px-6 py-4 text-sm text-red-500 shadow-xl">
            {{ $message }}
        </div>
    @enderror

    @error('receipt')
        <div class="modal fixed top-6 right-4 sm:right-6 z-[9999999999] rounded-2xl border border-red-200 bg-white px-6 py-4 text-sm text-red-500 shadow-xl">
            {{ $message }}
        </div>
    @enderror

    <div class="w-full max-w-5xl mx-auto space-y-6 pb-8">

        {{-- عنوان صفحه --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <span class="text-xs font-medium text-[#B88A3B]">مدیریت دارایی</span>
                <h1 class="mt-1 text-xl md:text-2xl font-bold text-[#29251F]">
                    کیف پول من
                </h1>
                <p class="mt-2 text-xs md:text-sm text-[#78716C]">
                    موجودی، دارایی طلا و تراکنش‌های مالی خود را مدیریت کنید.
                </p>
            </div>

            <div class="flex items-center gap-2 text-xs text-[#78716C] bg-white border border-[#E7E2D9] rounded-xl px-4 py-3">
                <span class="size-2 rounded-full bg-emerald-500"></span>
                حساب کاربری شما
                <span class="font-bold text-[#29251F]">
                    {{ $user['name'] }} {{ $user['family'] }}
                </span>
            </div>
        </div>

        {{-- اطلاعات کاربر --}}
        <div class="bg-white border border-[#E7E2D9] rounded-2xl p-4 md:p-5 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="flex items-center gap-3">
                    <div class="size-11 rounded-xl bg-[#F8F5EF] flex items-center justify-center text-[#B88A3B]">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M4 21a8 8 0 0 1 16 0" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-[#78716C]">نام و نام خانوادگی</p>
                        <p class="mt-1 text-sm font-bold text-[#29251F]">
                            {{ $user['name'] }} {{ $user['family'] }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3 md:border-r md:border-[#E7E2D9] md:pr-5">
                    <div class="size-11 rounded-xl bg-[#F8F5EF] flex items-center justify-center text-[#B88A3B]">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M5 4h14v16H5z" />
                            <path d="M9 8h6M9 12h6M9 16h3" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-[#78716C]">شماره همراه</p>
                        <p class="mt-1 text-sm font-bold text-[#29251F] in-fa">
                            {{ $user['phoneNumber'] }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- کارت‌های موجودی --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

            {{-- موجودی ریالی --}}
            <div class="relative overflow-hidden rounded-2xl border border-[#E7E2D9] bg-white p-5 md:p-6 shadow-sm">
                <div class="absolute -left-10 -top-10 size-36 rounded-full bg-[#F8F5EF]"></div>

                <div class="relative">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="size-12 rounded-xl bg-[#F8F5EF] flex items-center justify-center text-[#B88A3B]">
                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                    <rect x="2.5" y="5" width="19" height="14" rx="3" />
                                    <path d="M2.5 10h19M16 15h2" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-[#29251F]">موجودی ریالی</h3>
                                <p class="text-xs text-[#78716C] mt-1">دارایی نقدی شما</p>
                            </div>
                        </div>

                        <span class="rounded-lg bg-[#F8F5EF] px-3 py-1.5 text-[10px] font-bold text-[#B88A3B]">
                            ریال
                        </span>
                    </div>

                    <div class="mt-7">
                        <p class="text-xs text-[#78716C]">موجودی کل کیف پول</p>
                        <div class="flex items-baseline gap-2 mt-2">
                            <span class="text-2xl md:text-3xl font-bold text-[#29251F] in-fa">
                                {{ number_format($user->wallet['asset'] ?? 0) }}
                            </span>
                            <span class="text-xs text-[#78716C]">ریال</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-[#E7E2D9] flex items-center justify-between">
                        <span class="text-xs text-[#78716C]">موجودی قابل برداشت</span>
                        <div class="flex items-baseline gap-1">
                            <span id="withdrawableBalance"
                                data-balance="{{ $user->wallet['asset'] ?? 0 }}"
                                class="text-sm font-bold text-[#29251F] in-fa">
                                {{ number_format($user->wallet['asset'] ?? 0) }}
                            </span>
                            <span class="text-[10px] text-[#78716C]">ریال</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- موجودی طلا --}}
            <div class="relative overflow-hidden rounded-2xl border border-[#E7E2D9] bg-[#29251F] p-5 md:p-6 shadow-sm">
                <div class="absolute -left-10 -top-10 size-40 rounded-full border border-[#D6AD60]/20"></div>
                <div class="absolute -left-4 -top-4 size-28 rounded-full border border-[#D6AD60]/10"></div>

                <div class="relative">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="size-12 rounded-xl bg-[#D6AD60]/15 flex items-center justify-center">
                                <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="#D6AD60" stroke-width="1.5">
                                    <path d="M3 17 8 7h8l5 10H3Z" />
                                    <path d="m8 7 4 10 4-10M3 17h18" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">موجودی طلا</h3>
                                <p class="text-xs text-[#D6AD60] mt-1">سرمایه طلایی شما</p>
                            </div>
                        </div>

                        <span class="rounded-lg bg-[#D6AD60]/15 px-3 py-1.5 text-[10px] font-bold text-[#D6AD60]">
                            GOLD
                        </span>
                    </div>

                    <div class="mt-7">
                        <p class="text-xs text-white/60">وزن طلای موجود در کیف پول</p>
                        <div class="flex items-baseline gap-2 mt-2">
                            <span class="text-2xl md:text-3xl font-bold text-[#D6AD60] in-fa">
                                {{ $user->wallet->goldWeight ?? 0 }}
                            </span>
                            <span class="text-xs text-white/60">گرم</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between">
                        <span class="text-xs text-white/60">موجودی قابل برداشت</span>
                        <div class="flex items-baseline gap-1">
                            <span class="text-sm font-bold text-white in-fa">
                                {{ $user->wallet->goldWeight ?? 0 }}
                            </span>
                            <span class="text-[10px] text-white/60">گرم</span>
                        </div>
                    </div>

                    <div class="mt-4 rounded-xl bg-white/5 px-4 py-3 flex items-center justify-between">
                        <span class="text-xs text-white/70">ارزش تقریبی دارایی</span>
                        <div class="flex items-baseline gap-1">
                            <span class="text-sm font-bold text-[#D6AD60] in-fa">
                                {{ number_format(($user->wallet->goldWeight ?? 0) * 25000000) }}
                            </span>
                            <span class="text-[10px] text-white/60">ریال</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- فرم تراکنش --}}
        <div class="bg-white border border-[#E7E2D9] rounded-2xl shadow-sm overflow-hidden">

            <div class="p-5 md:p-6 border-b border-[#E7E2D9]">
                <h2 class="text-base font-bold text-[#29251F]">
                    مدیریت تراکنش‌ها
                </h2>
                <p class="text-xs text-[#78716C] mt-2">
                    نوع عملیات مالی موردنظر خود را انتخاب کنید.
                </p>
            </div>

            <form action="{{ route('wallet.transactionRequest') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-6 gap-5 p-5 md:p-6">

                    {{-- انتخاب نوع تراکنش --}}
                    <div class="col-span-6 grid grid-cols-2 gap-3">

                        <div class="relative">
                            <input class="peer hidden" type="radio" name="transactionType" value="deposit"
                                id="deposit" onclick="transactionMethod('deposit',this)">

                            <label for="deposit"
                                class="flex cursor-pointer items-center gap-3 rounded-xl border border-[#E7E2D9] bg-white p-4 transition-all hover:border-[#D6AD60] peer-checked:border-[#B88A3B] peer-checked:bg-[#F8F5EF]">
                                <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 5v14M5 12h14" />
                                    </svg>
                                </span>
                                <span>
                                    <span class="block text-sm font-bold text-[#29251F]">واریز وجه</span>
                                    <span class="block mt-1 text-[10px] text-[#78716C]">افزایش موجودی کیف پول</span>
                                </span>
                            </label>
                            <span class="mt-2 block text-[10px] text-red-500"></span>
                        </div>

                        <div class="relative">
                            <input class="peer hidden" type="radio" name="transactionType" value="withdraw"
                                id="withdraw" onclick="transactionMethod('withdraw',this)">

                            <label for="withdraw"
                                class="flex cursor-pointer items-center gap-3 rounded-xl border border-[#E7E2D9] bg-white p-4 transition-all hover:border-[#D6AD60] peer-checked:border-[#B88A3B] peer-checked:bg-[#F8F5EF]">
                                <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-500">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 5v14M5 12h14" />
                                    </svg>
                                </span>
                                <span>
                                    <span class="block text-sm font-bold text-[#29251F]">برداشت وجه</span>
                                    <span class="block mt-1 text-[10px] text-[#78716C]">انتقال موجودی به حساب شما</span>
                                </span>
                            </label>
                            <span class="mt-2 block text-[10px] text-red-500"></span>
                        </div>

                    </div>

                    @error('transactionType')
                        <span class="col-span-6 text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    {{-- محتوای داینامیک تراکنش --}}
                    <div id="transactionMethod" class="col-span-6 grid grid-cols-6 gap-4"></div>

                    {{-- دکمه‌ها --}}
                    @if (Auth::user()->isActive)
                        <button type="submit" onclick="submitBtn(event)"
                            class="col-span-3 rounded-xl bg-[#B88A3B] py-3.5 text-sm font-bold text-white shadow-sm shadow-[#B88A3B]/20 transition-all hover:bg-[#A47A32] hover:shadow-md">
                            ثبت درخواست
                        </button>

                        <button type="reset"
                            class="col-span-3 rounded-xl border border-[#E7E2D9] bg-[#F8F5EF] py-3.5 text-sm font-bold text-[#78716C] transition-all hover:border-[#B88A3B] hover:text-[#29251F]">
                            لغو عملیات
                        </button>
                    @else
                        <div class="col-span-6 flex items-start gap-3 rounded-xl border border-amber-200 bg-amber-50 p-4">
                            <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-700">!</span>
                            <div>
                                <p class="text-sm font-bold text-amber-800">حساب کاربری غیرفعال است</p>
                                <p class="mt-1 text-xs leading-6 text-amber-700">
                                    پس از فعال‌سازی حساب کاربری شما توسط مدیریت، امکان انجام عملیات واریز و برداشت فراهم خواهد شد.
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </form>
        </div>

        {{-- راهنمای کوتاه --}}
        <div class="flex items-start gap-3 rounded-2xl border border-[#E7E2D9] bg-[#F8F5EF] p-4">
            <div class="flex size-9 shrink-0 items-center justify-center rounded-xl bg-white text-[#B88A3B]">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                    <circle cx="12" cy="12" r="9" />
                    <path d="M12 11v5M12 8h.01" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-bold text-[#29251F]">نکته مهم</p>
                <p class="mt-1 text-xs leading-6 text-[#78716C]">
                    قبل از ثبت درخواست واریز یا برداشت، اطلاعات واردشده را بررسی کنید. درخواست‌های مالی پس از بررسی توسط مدیریت پردازش می‌شوند.
                </p>
            </div>
        </div>

    </div>

    <script>
        let setting = null

        if ('{!! $setting !!}' != '') {
            setting = JSON.parse('{!! $setting !!}')
        }

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
                el.querySelector('div').children[0].innerText =
                    'معادل ' + tomanPrice.toLocaleString('fa-IR') + ' تومان'
            } else {
                el.querySelector('div').children[0].innerText = ''
            }
        }

        function transactionMethod(state, el) {
            let transactionMethod = document.getElementById('transactionMethod')

            if (setting) {
                if (state == 'deposit') {
                    if (setting.depositIsActive == 0) {
                        el.parentElement.nextElementSibling.innerText = 'در حال حاضر امکان واریز کردن غیرفعال است'
                        el.checked = false
                    } else {

                        transactionMethod.innerHTML = `
                            <div class="col-span-6 rounded-2xl border border-[#E7E2D9] bg-[#F8F5EF] p-4 md:p-5 space-y-5">

                                <div class="flex items-center gap-3">
                                    <div class="flex size-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <path d="M12 16V4m-5 5 5-5 5 5"/>
                                            <path d="M4 16v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-bold text-[#29251F]">افزایش موجودی کیف پول</h3>
                                        <p class="mt-1 text-xs text-[#78716C]">مبلغ موردنظر خود را وارد و فیش واریزی را بارگذاری کنید.</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    {{-- مبلغ واریزی --}}
                                    <label class="relative block text-sm font-bold text-[#29251F]"
                                        for="depositFee"
                                        onkeyup="checkFee('deposit', this)">

                                        مبلغ واریزی
                                        <span class="text-red-500 text-xs">(اجباری)</span>

                                        <input
                                            class="mt-2 w-full rounded-xl border border-[#E7E2D9] bg-white py-3.5 pr-4 pl-14 text-sm text-[#29251F] outline-none transition-all placeholder:text-[#A8A29E] focus:border-[#B88A3B] focus:ring-4 focus:ring-[#D6AD60]/10 in-fa"
                                            type="number"
                                            name="depositFee"
                                            id="depositFee"
                                            placeholder="مبلغ را به ریال وارد کنید"
                                            value=""
                                        >

                                        <span class="absolute left-4 top-[43px] text-xs font-normal text-[#78716C]">ریال</span>

                                        <div class="my-2 flex flex-col gap-1">
                                            <span class="text-xs font-medium text-[#B88A3B]"></span>
                                            <span class="text-xs text-red-500"></span>
                                        </div>
                                    </label>

                                    {{-- تصویر فیش --}}
                                    <label class="block text-sm font-bold text-[#29251F]" for="receipt">
                                        تصویر فیش واریزی
                                        <span class="text-red-500 text-xs">(اجباری)</span>

                                        <div class="mt-2 flex min-h-[112px] cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-[#D6AD60]/50 bg-white px-4 py-4 text-center transition-all hover:border-[#B88A3B] hover:bg-[#FFFCF7]">
                                            <svg class="size-7 text-[#B88A3B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                                <path d="M12 16V4m-5 5 5-5 5 5"/>
                                                <path d="M4 16v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3"/>
                                            </svg>
                                            <span class="mt-2 text-xs font-bold text-[#29251F]">انتخاب تصویر فیش</span>
                                            <span class="mt-1 text-[10px] text-[#78716C]">برای بارگذاری کلیک کنید</span>
                                        </div>

                                        <input
                                            class="w-full mt-2 text-xs text-[#78716C] file:ml-3 file:rounded-lg file:border-0 file:bg-[#F8F5EF] file:px-3 file:py-2 file:text-xs file:font-bold file:text-[#B88A3B] hover:file:bg-[#E7E2D9]"
                                            type="file"
                                            name="receipt"
                                            id="receipt"
                                            accept="image/*"
                                        >
                                    </label>

                                </div>

                                {{-- توضیحات --}}
                                <label class="block text-sm font-bold text-[#29251F]" for="description">
                                    توضیحات
                                    <span class="text-xs font-normal text-[#78716C]">(اختیاری)</span>

                                    <textarea
                                        class="mt-2 min-h-28 w-full resize-y rounded-xl border border-[#E7E2D9] bg-white p-4 text-sm text-[#29251F] outline-none transition-all placeholder:text-[#A8A29E] focus:border-[#B88A3B] focus:ring-4 focus:ring-[#D6AD60]/10"
                                        name="description"
                                        id="description"
                                        placeholder="در صورت نیاز توضیحات خود را وارد کنید..."
                                    ></textarea>
                                </label>

                            </div>
                        `
                    }
                }

                if (state == 'withdraw') {
                    if (setting.withdrawIsActive == 0) {
                        el.parentElement.nextElementSibling.innerText = 'در حال حاضر امکان برداشت کردن غیرفعال است'
                        el.checked = false
                    } else {

                        transactionMethod.innerHTML = `
                            <div class="col-span-6 rounded-2xl border border-[#E7E2D9] bg-[#F8F5EF] p-4 md:p-5 space-y-5">

                                <div class="flex items-center gap-3">
                                    <div class="flex size-11 items-center justify-center rounded-xl bg-[#D6AD60]/15 text-[#B88A3B]">
                                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <path d="M12 8v12m-5-5 5 5 5-5"/>
                                            <path d="M4 8V5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-bold text-[#29251F]">برداشت از کیف پول</h3>
                                        <p class="mt-1 text-xs text-[#78716C]">میزان موجودی موردنظر برای برداشت را انتخاب کنید.</p>
                                    </div>
                                </div>

                                {{-- انتخاب درصد برداشت --}}
                                <div id="percents" class="rounded-xl border border-[#E7E2D9] bg-white p-4">

                                    <div class="flex items-center justify-between gap-2 mb-4">
                                        <span class="text-sm font-bold text-[#29251F]">میزان برداشت</span>
                                        <span class="text-[10px] text-[#78716C]">انتخاب درصد موجودی</span>
                                    </div>

                                    <div class="grid grid-cols-5 gap-2">

                                        <div>
                                            <input class="peer hidden" type="radio" name="withdrawPercent" id="withdrawPercent10" value="10">
                                            <label for="withdrawPercent10" class="flex cursor-pointer items-center justify-center rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] py-3 text-xs font-bold text-[#78716C] transition-all hover:border-[#D6AD60] peer-checked:border-[#B88A3B] peer-checked:bg-[#B88A3B] peer-checked:text-white in-fa">
                                                ۱۰٪
                                            </label>
                                        </div>

                                        <div>
                                            <input class="peer hidden" type="radio" name="withdrawPercent" id="withdrawPercent25" value="25">
                                            <label for="withdrawPercent25" class="flex cursor-pointer items-center justify-center rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] py-3 text-xs font-bold text-[#78716C] transition-all hover:border-[#D6AD60] peer-checked:border-[#B88A3B] peer-checked:bg-[#B88A3B] peer-checked:text-white in-fa">
                                                ۲۵٪
                                            </label>
                                        </div>

                                        <div>
                                            <input class="peer hidden" type="radio" name="withdrawPercent" id="withdrawPercent50" value="50">
                                            <label for="withdrawPercent50" class="flex cursor-pointer items-center justify-center rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] py-3 text-xs font-bold text-[#78716C] transition-all hover:border-[#D6AD60] peer-checked:border-[#B88A3B] peer-checked:bg-[#B88A3B] peer-checked:text-white in-fa">
                                                ۵۰٪
                                            </label>
                                        </div>

                                        <div>
                                            <input class="peer hidden" type="radio" name="withdrawPercent" id="withdrawPercent75" value="75">
                                            <label for="withdrawPercent75" class="flex cursor-pointer items-center justify-center rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] py-3 text-xs font-bold text-[#78716C] transition-all hover:border-[#D6AD60] peer-checked:border-[#B88A3B] peer-checked:bg-[#B88A3B] peer-checked:text-white in-fa">
                                                ۷۵٪
                                            </label>
                                        </div>

                                        <div>
                                            <input class="peer hidden" type="radio" name="withdrawPercent" id="withdrawPercent100" value="100">
                                            <label for="withdrawPercent100" class="flex cursor-pointer items-center justify-center rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] py-3 text-xs font-bold text-[#78716C] transition-all hover:border-[#D6AD60] peer-checked:border-[#B88A3B] peer-checked:bg-[#B88A3B] peer-checked:text-white in-fa">
                                                ۱۰۰٪
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                {{-- مبلغ برداشت --}}
                                <label class="relative block text-sm font-bold text-[#29251F]"
                                    for="withdrawFee"
                                    onkeyup="checkFee('withdraw', this)">

                                    مبلغ برداشت
                                    <span class="text-red-500 text-xs">(اجباری)</span>

                                    <input
                                        class="mt-2 w-full rounded-xl border border-[#E7E2D9] bg-white py-3.5 pr-4 pl-14 text-sm text-[#29251F] outline-none transition-all placeholder:text-[#A8A29E] focus:border-[#B88A3B] focus:ring-4 focus:ring-[#D6AD60]/10 in-fa"
                                        type="number"
                                        name="withdrawFee"
                                        id="withdrawFee"
                                        placeholder="مبلغ را به ریال وارد کنید"
                                        value=""
                                    >

                                    <span class="absolute left-4 top-[43px] text-xs font-normal text-[#78716C]">ریال</span>

                                    <div class="my-2 flex flex-col gap-1">
                                        <span class="text-xs font-medium text-[#B88A3B]"></span>
                                        <span class="text-xs text-red-500"></span>
                                    </div>
                                </label>

                                {{-- توضیحات --}}
                                <label class="block text-sm font-bold text-[#29251F]" for="description">
                                    توضیحات
                                    <span class="text-xs font-normal text-[#78716C]">(اختیاری)</span>

                                    <textarea
                                        class="mt-2 min-h-28 w-full resize-y rounded-xl border border-[#E7E2D9] bg-white p-4 text-sm text-[#29251F] outline-none transition-all placeholder:text-[#A8A29E] focus:border-[#B88A3B] focus:ring-4 focus:ring-[#D6AD60]/10"
                                        name="description"
                                        id="description"
                                        placeholder="در صورت نیاز توضیحات خود را وارد کنید..."
                                    ></textarea>
                                </label>

                            </div>
                        `

                        percents()
                    }
                }
            }
        }

        function percents() {
            let withdrawPercents = document.querySelectorAll('input[name="withdrawPercent"]')
            let withdrawableBalance = document.getElementById('withdrawableBalance').dataset.balance
            let feeInput = document.getElementById('withdrawFee')

            withdrawPercents.forEach(percent => {
                percent.addEventListener('change', function() {
                    let result = (parseInt(percent.value) / 100) * parseInt(withdrawableBalance)
                    let value = Math.round(result)

                    feeInput.value = value
                    checkFee('withdraw', feeInput.parentElement)
                })
            });
        }

        function submitBtn(e) {
            e.preventDefault()

            if (minDeposit && maxDeposit && minWithdraw && maxWithdraw) {
                document.forms[0].submit()
            }
        }
    </script>

@endsection
