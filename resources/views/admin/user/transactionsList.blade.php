@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | واریز و برداشت ها')
@section('content')
    <!-- واریز و برداشت -->
    <div class="w-full flex flex-col gap-3 justify-start items-center">
        <!-- واریز و برداشت / هدر -->
        <section
            class="w-full mx-auto bg-(--secondary-dashboard) flex items-center justify-between border-1 border-(--border-dashboard) p-2 2 rounded-md">
            <h2 class="text-base md:text-xl font-bold">واریز و برداشت</h2>
            <div id="openPopup-deposit"
                class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-3 py-2 cursor-pointer flex items-center justify-center">
                <span class="">
                    <svg class="size-3 md:size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z">
                        </path>
                    </svg>
                </span>
                <div class="">خروجی اکسل</div>
            </div>
            <div id="popup-deposit"
                class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center">
                <div id="closePopup-deposit2" class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2">
                </div>
                <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                    <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                        <div class="font-bold">خروجی اکسل</div>
                        <div id="closePopup-deposit">
                            <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- واریز و برداشت / لسیت -->
        <section class="w-full mx-auto rounded-md border-1 border-(--border-dashboard) mt-5 pb-10 overflow-hidden">
            <div class="w-full">
                <div class="w-full bg-white grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2 py-5 px-2">
                    <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                        <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                            نام و نام خانوادگی
                        </legend>
                        <input class="w-full outline-none text-[10px] md:text-base" type="text" name="fullName"
                            id="fullName" placeholder=" نام و نام خانوادگی">
                    </fieldset>
                    {{-- <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                        <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                            نوع کالا
                        </legend>
                       <select id="product" class="w-10/12 lg:w-8/12" name="product[]" data-placeholder="" multiple data-multi-select>
                            @foreach ($filter['language'] as $language)
                                <option value="{{ $language['key'] }}" @if ($language['key'] == 'all') selected @endif>{{ $language['value'] }}</option>
                            @endforeach
                        </select>
                    </fieldset> --}}
                    <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                        <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                            نوع تراکنش
                        </legend>
                        <select id="transactionType" name="transactionType[]" data-placeholder="انتخاب کنید" data-multi-select
                            data-select-all-default="true" multiple>
                            <option value="deposit">واریز</option>
                            <option value="withdraw">برداشت</option>
                            <option value="buy">خرید</option>
                            <option value="sell">فروش</option>
                        </select>
                    </fieldset>
                   
                    <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                        <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                           وضعیت
                        </legend>
                        <select id="status" name="status[]" data-placeholder="انتخاب کنید" data-multi-select
                            data-select-all-default="true" multiple>
                            <option value="0">در انتظار</option>
                            <option value="1">تایید شده</option>
                            <option value="-1">رد شده</option>
                        </select>
                    </fieldset>
                   
                    <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                        <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                            از تاریخ
                        </legend>
                        <input class="w-full outline-none text-xs md:text-base in-fa" dir="ltr" type="text"
                            name="fromDate" id="fromDate" placeholder="از تاریخ">
                    </fieldset>
                    <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                        <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                            تا تاریخ
                        </legend>
                        <input class="w-full outline-none text-xs md:text-base in-fa" dir="ltr" type="text"
                            name="toDate" id="toDate" placeholder="تا تاریخ">
                    </fieldset>
                    
                    <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                        <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                            مبلغ
                        </legend>
                        <input class="w-full outline-none text-xs  md:text-base in-fa" type="number" dir="ltr"
                            name="" id="price" placeholder="مبلغ">
                    </fieldset>
                    <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                        <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                            شماره سند
                        </legend>
                        <input class="w-full outline-none text-xs  md:text-base in-fa" type="number" dir="ltr"
                            name="" id="transactoinId" placeholder=" شماره سند">
                    </fieldset>
                    <div class="w-1/2 lg:w-full">
                        <button
                            class="w-full md:w-fit font-bold text-xs md:text-base py-3 md:px-13 mt-2 col-span-1 md:text-right border-1 border-(--color-border) rounded-md text-center cursor-pointer"
                            onclick="setDatas()">اعمال</button>
                    </div>
                </div>
                <div class="w-full h-5 bg-zinc-200"></div>
                <div class="w-full overflow-x-auto">
                    <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                        <div
                            class="w-full bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashboard) hidden md:flex flex-col md:flex-row">
                            <span class="">تعداد 55 مشتری در لیست مشتریان یافت شد .</span>
                            <span class="hidden md:flex">|</span>
                            <span class="">ظرفیت باقیمانده 445 نفر</span>
                        </div>
                    </div>
                    <table class="w-full border-collapse border-1 border-(--border-dashboard) text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-xs lg:text-base">
                                <th class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    ردیف
                                </th>
                                <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    نام و نام خانوادگی
                                </th>
                                <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    شماره موبایل
                                </th>
                                <th class="min-w-25 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    نوع تراکنش
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    مبلغ
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    وزن
                                </th>
                                <th class="min-w-33 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    زمان | تاریخ
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    شماره سند
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    وضعیت
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    ابزار
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr class="text-xs lg:text-base">
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                        {{ $transaction->id }}
                                    </td>
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                        {{ $transaction->wallet->user['name'] }}
                                        {{ $transaction->wallet->user['family'] }}
                                    </td>
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ $transaction->wallet->user['phoneNumber'] }}
                                    </td>
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                        <div class="w-18 mx-auto px-2 py-1 rounded-lg border-2 border-[{{ $transaction->typeColor }}] text-[{{ $transaction->typeColor }}] text-center">
                                           {{ $transaction->type }}
                                        </div>
                                    </td>
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ number_format($transaction->amount) }}
                                    </td>
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ $transaction->deal ? $transaction->deal->goldWeight : '-' }}
                                    </td>
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{  $transaction->time . ' | ' . $transaction->date }}
                                    </td>
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                        <span class="w-10 h-10 px-3 py-1 text-gray-600 rounded-md border-1 bordre-gray-600 p-1 cursor-pointer in-fa">
                                            {{ '100'.$transaction->id }}
                                        </span>
                                    </td>
                                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                        <div class="mx-auto px-2 py-1 rounded-lg border-2 border-[{{ $transaction->stateColor }}] text-[{{ $transaction->stateColor }}] text-center">
                                           {{ $transaction->stateTitle }}
                                        </div>
                                    </td>
                                    <td class="relative p-1 md:px-3 md:py-2 flex items-center gap-3">
                                        <button onclick="showTransaction('open', {{ $transaction }})"
                                            class="w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer">
                                            مشاهده
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <div id="transaction"
        class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center">
        <div class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"
            onclick="showTransaction('close')">
        </div>
        <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
            <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                <div class="font-bold">جزئیات تراکنش</div>
                <div class="cursor-pointer" onclick="showTransaction('close')">
                    <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path
                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="grid grid-cols-6 gap-5 mt-5">
                <div
                    class="col-span-6 grid grid-cols-3 border-1 border-(--border-dashboard) rounded-lg px-1 md:px-2 py-2 md:py-3 gap-2">
                    <div class="w-full flex flex-col sm:flex-row">
                        <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام
                            :</span>
                        <span id="transactionPopupName" class="text-[10px] md:text-base font-bold"></span>
                    </div>
                    <div class="w-full flex flex-col sm:flex-row">
                        <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره
                            :</span>
                        <span id="transactionPopupPhoneNumber" class="text-[10px] md:text-base font-bold"></span>
                    </div>
                    <div class="w-full flex flex-col sm:flex-row">
                        <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">تاریخ
                            ثبت :</span>
                        <span id="transactionPopupDate" class="text-[10px] md:text-base font-bold"></span>
                    </div>
                    <div class="w-full flex flex-col sm:flex-row">
                        <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">وضعیت
                            :</span>
                        <span id="transactionPopupStatus" class="text-[10px] md:text-base font-bold"></span>
                    </div>
                    <div class="w-full flex flex-col sm:flex-row">
                        <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نوع تراکنش
                            :</span>
                        <span id="transactionPopupType" class="text-[10px] md:text-base font-bold"></span>
                    </div>
                    <div class="w-full flex flex-col sm:flex-row">
                        <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1"> مبلغ :</span>
                        <span id="transactionPopupFee" class="text-[10px] md:text-base font-bold"></span>
                    </div>
                </div>
                <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                    <div
                        class="w-full bg-white divide-x-1 divide-(--border-dashboard) flex items-center gap-2 p-2 rounded-lg">
                        <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره
                                کارت :</span>
                            <span class="text-[8px] sm:text-xs md:text-base font-bold"></span>
                        </div>
                        <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره
                                شبا :</span>
                            <span class="text-[8px] sm:text-xs md:text-base font-bold"></span>
                        </div>
                    </div>
                </div>
                <div id="transactionPopupReceipt"
                    class="col-span-6 border-1 border-(--border-dashboard) rounded-lg p-2 items-center justify-center hidden">
                    <img class="w-[90%] h-50 bg-zinc-300" src="" alt="">
                </div>
                <div
                    class="col-span-3 bg-green-50 text-green-500 border-2 border-green-400 font-bold px-2 py-4 rounded-md text-center cursor-pointer">
                    تایید تراکنش
                </div>
                <div
                    class="col-span-3 bg-red-50 text-red-500 border-2 border-red-400 font-bold px-2 py-4 rounded-md text-center cursor-pointer">
                    رد تراکنش
                </div>
            </div>
        </div>
    </div>
    <!-- واریز و برداشت -->
    <script>
        function showTransaction(state, transaction) {
            let transactionPopup = document.getElementById('transaction')
            if (state == 'open') {
                document.getElementById('transactionPopupName').innerText = transaction.wallet.user.name + " " + transaction
                    .wallet.user.family
                document.getElementById('transactionPopupPhoneNumber').innerText = transaction.wallet.user.phoneNumber
                document.getElementById('transactionPopupDate').innerText = transaction.created_at
                let status
                switch (transaction.isApproved) {
                    case 1:
                        status = 'تایید شده'
                        break;
                    case 0:
                        status = 'در انتظار تایید'
                        break;
                    case -1:
                        status = 'رد شده'
                        break;
                }
                let type
                switch (transaction.type) {
                    case 'deposit':
                        type = 'واریز'
                        break;
                    case 'withdraw':
                        type = 'برداشت'
                        break;
                }
                document.getElementById('transactionPopupStatus').innerText = status
                document.getElementById('transactionPopupType').innerText = type
                document.getElementById('transactionPopupFee').innerText = transaction.amount
                let transactionPopupReceipt = document.getElementById('transactionPopupReceipt')
                if (transaction.type == 'deposit') {
                    transactionPopupReceipt.classList.remove('hidden')
                    transactionPopupReceipt.classList.add('flex')
                    transactionPopupReceipt.children[0].src = `{{ asset('storage/') }}` + '/' + transaction.receipt
                } else {
                    transactionPopupReceipt.classList.add('hidden')
                    transactionPopupReceipt.classList.remove('flex')
                }
                transactionPopup.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                transactionPopup.classList.add('invisible', 'opacity-0')
            }
        }
    </script>
@endsection
