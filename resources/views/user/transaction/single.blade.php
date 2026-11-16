@extends('admin.app.dashboard')

@section('title', 'ستاری گلد | واریز و برداشت ها')

@section('content')

    <div class="w-full flex flex-col gap-5 text-[#29251F]">

        {{-- هدر صفحه --}}
        <section
            class="w-full flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 rounded-2xl border border-[#E7E2D9] bg-white p-4 shadow-sm">

            <div class="flex items-center gap-3">
                <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-[#D6AD60]/15 text-[#B88A3B]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 8c-1.5 0-2.5.8-2.5 2s1 2 2.5 2 2.5.8 2.5 2-1 2-2.5 2m0-10V6m0 12v-2m9-4a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>

                <div>
                    <h2 class="text-base md:text-xl font-bold">واریز و برداشت</h2>
                    <p class="mt-1 text-xs text-[#78716C]">مدیریت و بررسی تراکنش‌های مالی کاربران</p>
                </div>
            </div>

            {{-- خروجی اکسل --}}
            <div id="popup-deposit"
                class="fixed inset-0 z-999999 bg-black/50 flex items-center justify-center p-4 invisible opacity-0 transition-all duration-300">

                <div id="closePopup-deposit2" class="absolute inset-0"></div>

                <div class="relative z-10 w-full max-w-2xl rounded-2xl border border-[#E7E2D9] bg-white p-4 shadow-2xl">

                    <div class="flex items-center justify-between border-b border-[#E7E2D9] pb-3">
                        <div>
                            <h3 class="font-bold text-[#29251F]">خروجی اکسل</h3>
                            <p class="mt-1 text-xs text-[#78716C]">دریافت گزارش تراکنش‌ها</p>
                        </div>

                        <button type="button" id="closePopup-deposit"
                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#F8F5EF] text-[#78716C] hover:bg-red-50 hover:text-red-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
        </section>

        {{-- بخش لیست تراکنش‌ها --}}
        <section class="w-full overflow-hidden rounded-2xl border border-[#E7E2D9] bg-white shadow-sm">

            {{-- هدر جدول --}}
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-[#E7E2D9] p-4">

                <div>
                    <h3 class="text-sm md:text-base font-bold">آرشیو تراکنش‌ها</h3>
                    <p class="mt-1 text-[11px] text-[#78716C]">مشاهده و جستجوی واریزها و برداشت‌ها</p>
                </div>

                <button onclick="sort(this)"
                    class="flex items-center gap-3 rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] px-3 py-2 text-xs font-semibold text-[#78716C] transition hover:border-[#D6AD60] hover:text-[#B88A3B]"
                    data-sort="desc">

                    <span>مرتب‌سازی:</span>
                    <span class="text-[#29251F]">جدید به قدیمی</span>

                    <img src="{{ asset('assets/img/sort/desc.png') }}" class="w-5 h-5 object-contain" alt="مرتب‌سازی">
                </button>
            </div>

            {{-- فیلترها --}}
            <div class="m-3 md:m-4 rounded-xl border border-[#E7E2D9] bg-[#F8F5EF] p-3 md:p-4">

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 transition focus-within:border-[#B88A3B]">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            نوع تراکنش
                        </legend>
                        <select id="type" name="type[]" data-placeholder="انتخاب کنید" data-multi-select
                            data-select-all-default="true" multiple>
                            <option value="deposit">واریز</option>
                            <option value="withdraw">برداشت</option>
                            <option value="buy">خرید</option>
                            <option value="sell">فروش</option>
                        </select>
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 transition focus-within:border-[#B88A3B]">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            وضعیت
                        </legend>
                        <select id="status" name="status[]" data-placeholder="انتخاب کنید" data-multi-select
                            data-select-all-default="true" multiple>
                            <option value="0">در انتظار</option>
                            <option value="1">تایید شده</option>
                            <option value="-1">رد شده</option>
                        </select>
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 transition focus-within:border-[#B88A3B]">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            از تاریخ
                        </legend>
                        <input class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none" dir="ltr"
                            type="text" name="fromDate" id="fromDate" placeholder="از تاریخ">
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 transition focus-within:border-[#B88A3B]">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            تا تاریخ
                        </legend>
                        <input class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none" dir="ltr"
                            type="text" name="toDate" id="toDate" placeholder="تا تاریخ">
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 transition focus-within:border-[#B88A3B]">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            مبلغ
                        </legend>
                        <input
                            class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none placeholder:text-[#A8A29E]"
                            type="number" dir="ltr" id="price" placeholder="مبلغ">
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 transition focus-within:border-[#B88A3B]">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            شماره سند
                        </legend>
                        <input
                            class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none placeholder:text-[#A8A29E]"
                            type="number" dir="ltr" id="transactionId" placeholder="شماره سند">
                    </fieldset>

                </div>

                <div class="flex justify-end mt-4">
                    <button onclick="setDatas()"
                        class="flex items-center justify-center gap-2 rounded-lg bg-[#B88A3B] px-7 py-2.5 text-xs md:text-sm font-bold text-white transition-all duration-200 hover:bg-[#9F742F]">

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4h18M6 9h12m-9 5h6m-3 0v6" />
                        </svg>

                        اعمال فیلترها
                    </button>
                </div>
            </div>


            {{-- جدول --}}
            <div class="w-full overflow-x-auto px-3 md:px-4 pb-5">

                <table class="w-full min-w-[1100px] border-collapse text-xs md:text-sm">

                    <thead>
                        <tr class="bg-[#F8F5EF] text-[#78716C]">

                            <th class="border border-[#E7E2D9] px-3 py-3">ردیف</th>
                            <th class="min-w-32 border border-[#E7E2D9] px-3 py-3">نوع تراکنش</th>
                            <th class="min-w-28 border border-[#E7E2D9] px-3 py-3">مبلغ
                                <span class="text-[10px] text-gray-400">(ریال)</span>
                            </th>
                            <th class="min-w-20 border border-[#E7E2D9] px-3 py-3">وزن</th>
                            <th class="min-w-48 border border-[#E7E2D9] px-3 py-3">زمان | تاریخ</th>
                            <th class="min-w-28 border border-[#E7E2D9] px-3 py-3">شماره سند</th>
                            <th class="min-w-36 border border-[#E7E2D9] px-3 py-3">وضعیت</th>

                            @can('access', 'transactionDetail')
                                <th class="min-w-24 border border-[#E7E2D9] px-3 py-3">ابزار</th>
                            @endcan

                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $i = 0;
                        @endphp

                        @foreach ($transactions as $transaction)
                            @php
                                $i++;
                            @endphp

                            <tr class="item_fayle text-xs lg:text-sm bg-white text-[#29251F] text-center transition-colors duration-200 hover:bg-[#FAF7F1]"
                                data-transaction-id="{{ $transaction->id }}">

                                <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] in-fa">
                                    {{ $i }}
                                </td>

                                <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                                    <div style="color: {{ $transaction->typeColor }}; border-color: {{ $transaction->typeColor }}; background-color: {{ $transaction->typeColor }}12;"
                                        class="w-20 mx-auto px-2 py-1.5 rounded-lg border text-center text-xs font-medium">
                                        {{ $transaction->type }}
                                    </div>
                                </td>

                                <td
                                    class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center font-semibold text-[#29251F] in-fa">
                                    {{ number_format($transaction->amount) }}
                                </td>

                                <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] in-fa">
                                    {{ $transaction->deal ? $transaction->deal->goldWeight : '-' }}
                                </td>

                                <td
                                    class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] whitespace-nowrap in-fa">
                                    {{ $transaction->time . ' | ' . $transaction->date }}
                                </td>

                                <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                                    <span
                                        class="inline-block px-3 py-1.5 rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] text-[#B88A3B] font-medium text-xs in-fa">
                                        {{ '100' . $transaction->id }}
                                    </span>
                                </td>

                                <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                                    <div style="border-color: {{ $transaction->stateColor }}; color: {{ $transaction->stateColor }}; background-color: #F8F5EF;"
                                        class="min-w-20 mx-auto px-2 py-1.5 rounded-lg border text-center text-xs font-medium">
                                        {{ $transaction->stateTitle }}
                                    </div>
                                </td>

                                @can('access', 'transactionDetail')
                                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">

                                        <button
                                            onclick="showTransaction('{{ $transaction->wallet->user->name . ' ' . $transaction->wallet->user->family }}', '{{ $transaction->wallet->user->phoneNumber }}', '{{ $transaction->time . ' | ' . $transaction->date }}', '{{ $transaction->stateColor }}', '{{ $transaction->stateTitle }}', '{{ $transaction->type }}', '{{ $transaction->amount }}', '{{ $transaction->isApproved }}', '{{ $transaction->id }}', '{{ $transaction->card }}', '{{ $transaction->shaba }}', '{{ $transaction->receipt }}')"
                                            class="w-full min-w-20 px-3 py-2 rounded-lg border border-[#D6AD60] bg-[#F8F5EF] text-[#B88A3B] font-medium hover:bg-[#B88A3B] hover:text-white transition-all duration-200 cursor-pointer">

                                            مشاهده

                                        </button>

                                    </td>
                                @endcan

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>

        {{-- {{ $transactions->links() }} --}}

    </div>

    {{-- پاپ‌آپ جزئیات تراکنش --}}
    <div id="transaction"
        class="fixed inset-0 z-999999 bg-black/50 flex items-center justify-center p-3 invisible opacity-0 transition-all duration-300">

        <div class="absolute inset-0"></div>

        <div
            class="relative z-10 w-full max-w-3xl max-h-[90dvh] overflow-y-auto rounded-2xl border border-[#E7E2D9] bg-[#F8F5EF] p-4 md:p-6 shadow-2xl">

            {{-- هدر --}}
            <div class="flex items-center justify-between border-b border-[#E7E2D9] pb-4">

                <div>
                    <h3 class="text-base md:text-lg font-bold text-[#29251F]">
                        جزئیات تراکنش
                    </h3>
                    <p class="mt-1 text-xs text-[#78716C]">
                        اطلاعات کامل تراکنش انتخاب‌شده
                    </p>
                </div>

                <button type="button" id="closeBtn"
                    class="size-9 cursor-pointer flex items-center cursor-pinter justify-center rounded-lg border border-[#E7E2D9] bg-white text-[#78716C] transition hover:bg-red-50 hover:text-red-600 hover:border-red-200">

                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 384 512">
                        <path
                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                    </svg>

                </button>
            </div>

            {{-- اطلاعات اصلی --}}
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-5">

                <div class="rounded-xl border border-[#E7E2D9] bg-white p-3">
                    <span class="block text-xs text-[#78716C] mb-2">نام مشتری</span>
                    <span id="transactionPopupName"
                        class="text-xs md:text-sm font-bold text-[#29251F] break-words"></span>
                </div>

                <div class="rounded-xl border border-[#E7E2D9] bg-white p-3">
                    <span class="block text-xs text-[#78716C] mb-2">شماره موبایل</span>
                    <span id="transactionPopupPhoneNumber"
                        class="text-xs md:text-sm font-bold text-[#29251F] in-fa"></span>
                </div>

                <div class="rounded-xl border border-[#E7E2D9] bg-white p-3">
                    <span class="block text-xs text-[#78716C] mb-2">تاریخ ثبت</span>
                    <span id="transactionPopupDate" class="text-xs md:text-sm font-bold text-[#29251F] in-fa"></span>
                </div>

                <div class="rounded-xl border border-[#E7E2D9] bg-white p-3">
                    <span class="block text-xs text-[#78716C] mb-2">وضعیت</span>
                    <span id="transactionPopupStatus" class="text-xs md:text-sm font-bold"></span>
                </div>

                <div class="rounded-xl border border-[#E7E2D9] bg-white p-3">
                    <span class="block text-xs text-[#78716C] mb-2">نوع تراکنش</span>
                    <span id="transactionPopupType" class="text-xs md:text-sm font-bold text-[#29251F]"></span>
                </div>

                <div class="rounded-xl border border-[#E7E2D9] bg-white p-3">
                    <span class="block text-xs text-[#78716C] mb-2">مبلغ تراکنش</span>
                    <span id="transactionPopupFee" class="text-xs md:text-sm font-bold text-[#B88A3B] in-fa"></span>
                    <span class="text-xs text-gray-400">ریال</span>
                </div>

            </div>

            {{-- اطلاعات بانکی --}}
            <div class="mt-4 rounded-xl border border-[#E7E2D9] bg-white p-3">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <div class="rounded-lg bg-[#F8F5EF] p-3">
                        <span class="block text-xs text-[#78716C] mb-2">شماره کارت</span>
                        <span class="text-xs md:text-sm font-bold text-[#29251F] in-fa break-all"
                            id="cardNumber"style="direction: ltr">
                            هنوز شماره کارت وارد نشده
                        </span>
                    </div>

                    <div class="rounded-lg bg-[#F8F5EF] p-3">
                        <span class="block text-xs text-[#78716C] mb-2">شماره شبا</span>
                        <span class="text-xs md:text-sm font-bold text-[#29251F] in-fa break-all"
                            id="shabaNumber"style="direction: ltr">
                            هنوز شماره شبا وارد نشده
                        </span>
                    </div>

                </div>
            </div>

            {{-- تصویر رسید --}}
            <div id="transactionPopupReceipt"
                class="mt-4 rounded-xl border border-[#E7E2D9] bg-white p-3 items-center justify-center hidden">

                <div class="w-full">
                    <p class="mb-3 text-xs font-bold text-[#78716C]">تصویر رسید تراکنش</p>

                    <img class="w-full max-h-72 object-contain rounded-lg bg-[#F8F5EF] cursor-zoom-in"
                        onclick="showImage(this)" src="" alt="تصویر رسید">
                </div>

            </div>

            {{-- عملیات تراکنش --}}
            <div id="transactionControl" class="w-full grid grid-cols-1 sm:grid-cols-2 gap-3 mt-5"
                data-transaction-id="">

                <button onclick="transactionAct('1')"
                    class="flex items-center justify-center gap-2 rounded-xl border border-green-200 bg-green-50 px-3 py-3 text-sm font-bold text-green-700 transition-all duration-200 hover:bg-green-600 hover:border-green-600 hover:text-white">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4 4L19 6" />
                    </svg>

                    تایید تراکنش
                </button>

                <button onclick="transactionAct('-1')"
                    class="flex items-center justify-center gap-2 rounded-xl border border-red-200 bg-red-50 px-3 py-3 text-sm font-bold text-red-700 transition-all duration-200 hover:bg-red-600 hover:border-red-600 hover:text-white">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                    </svg>

                    رد تراکنش
                </button>

            </div>

        </div>
    </div>

    {{-- نمایش بزرگ تصویر --}}
    <div class="w-full h-dvh fixed inset-0 bg-black/70 transition-all duration-300 z-999999 invisible opacity-0"
        id="showImg">

        <div class="w-full h-full flex justify-center items-center p-3">

            <div class="relative w-full max-w-5xl p-5 md:p-8 rounded-2xl bg-white shadow-2xl">

                <button type="button" onclick="closeZoom()"
                    class="absolute top-3 right-3 size-9 cursor-pointer flex items-center justify-center rounded-lg bg-[#F8F5EF] text-[#78716C] hover:bg-red-50 hover:text-red-600 transition">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-600" viewBox="0 0 384 512">
                        <path
                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                    </svg>

                </button>

                <img src="" class="w-full max-h-[calc(100vh-100px)] object-contain rounded-lg"
                    alt="تصویر بزرگ رسید">

            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/transaction.js') }}"></script>

@endsection
