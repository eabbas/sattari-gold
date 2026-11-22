@extends('admin.app.dashboard')



@section('title', 'مدیریت قیمت طلا')



@section('content')







    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">

            <span class="text-sm text-[var(--light-theme-text-color)] in-fa">

                {{ session('success') }}

            </span>

        </div>
    @endif



    <div class="min-h-screen w-full bg-[#F8F7F4] py-6 text-[#29251F] sm:py-9">



        <div class="mx-auto w-[94%] max-w-[1100px] sm:w-[92%]">



            {{-- Heading --}}

            <div class="mb-7">

                <h1 class="text-xl sm:text-2xl font-bold">

                    مدیریت قیمت طلا

                </h1>



            </div>



            <form action="{{ route('price.store') }}" method="POST" id="priceForm">

                @csrf



                {{-- Update Mode --}}

                <div class="mb-4 rounded-[14px] border border-[#EAE7E1] bg-white p-4 sm:p-5">



                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">



                        <div>

                            <h3 class="text-sm font-bold">

                                روش بروزرسانی قیمت

                            </h3>



                            <p class="mt-1 text-[11px] text-[#858078]">

                                نحوه دریافت قیمت پایه را انتخاب کنید.

                            </p>

                        </div>



                        <div class="flex flex-wrap items-center gap-5">



                            <label
                                class="flex cursor-pointer items-center gap-[9px] text-[13px] text-[#858078] has-[:checked]:font-bold has-[:checked]:text-[#B88A3B]">

                                <input class="size-4 accent-[#B88A3B]" type="radio" name="update_mode" value="manual"
                                    @checked(($price?->update_mode ?? 'manual') === 'manual')>

                                <span>دستی</span>

                            </label>



                            <label
                                class="flex cursor-pointer items-center gap-[9px] text-[13px] text-[#858078] has-[:checked]:font-bold has-[:checked]:text-[#B88A3B]">

                                <input class="size-4 accent-[#B88A3B]" type="radio" name="update_mode" value="automatic"
                                    @checked(($price?->update_mode ?? 'manual') === 'automatic')>

                                <span>اتوماتیک</span>

                            </label>



                        </div>



                    </div>

                </div>



                {{-- Manual Mode --}}

                <div id="manualSection"
                    class="price-section {{ ($price?->update_mode ?? 'manual') === 'manual' ? '' : 'hidden' }}">



                    <div class="mb-4 rounded-[14px] border border-[#EAE7E1] bg-white p-4 sm:p-5">



                        <label class="mb-[9px] block text-xs text-[#858078]" for="manualPrice">

                            قیمت پایه مظنه

                        </label>



                        <div class="relative max-w-full">

                            <input type="text" id="manualPrice"
                                class="h-[46px] w-full min-w-0 rounded-[9px] border border-[#EAE7E1] bg-[#FAF9F7] px-[13px] text-base font-bold text-[#29251F] outline-none transition duration-200 focus:border-[#D6AD60] focus:bg-white focus:ring-[3px] focus:ring-[#D6AD60]/10 [direction:ltr] [text-align:right] !pl-[65px]"
                                inputmode="numeric" autocomplete="off" placeholder="قیمت را وارد کنید"
                                value="{{ $price?->update_mode === 'manual' ? number_format($price->price) : '' }}">



                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs text-[#858078]">

                                ریال

                            </span>

                        </div>



                    </div>



                </div>



                {{-- Automatic Mode --}}

                <div id="automaticSection" class="price-section {{ $price?->update_mode === 'automatic' ? '' : 'hidden' }}">



                    <div class="mb-4 rounded-[14px] border border-[#EAE7E1] bg-white p-4 sm:p-5">



                        <label class="mb-[9px] block text-xs text-[#858078]" for="referenceSource">

                            انتخاب سایت مرجع

                        </label>



                        <div class="grid grid-cols-1 sm:grid-cols-[1fr_auto] gap-3">



                            <select id="referenceSource" name="reference_source"
                                class="h-[46px] w-full min-w-0 cursor-pointer rounded-[9px] border border-[#EAE7E1] bg-[#FAF9F7] px-[13px] text-[13px] text-[#29251F] outline-none transition duration-200 focus:border-[#D6AD60] focus:bg-white focus:ring-[3px] focus:ring-[#D6AD60]/10">

                                <option value="">انتخاب سایت مرجع</option>



                                @foreach ($sites as $site)
                                    <option value="{{ $site->id }}" data-url="{{ $site->address }}"
                                        data-price="{{ 72500000 + ($loop->iteration - 1) * 100000 }}"
                                        @selected($price?->referenceSite_id == $site->id)>

                                        {{ $site->title }}

                                    </option>
                                @endforeach

                            </select>



                            <button type="button" id="fetchPriceBtn"
                                class="inline-flex min-h-11 items-center justify-center gap-2 rounded-[9px] bg-[#B88A3B] px-5 text-xs font-bold text-white transition duration-200 hover:bg-[#A97B32] disabled:cursor-not-allowed disabled:opacity-60">

                                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">

                                    <path d="M20 7v5h-5" />

                                    <path d="M4 17v-5h5" />

                                    <path d="M5.6 9a7 7 0 0 1 11.5-2L20 12" />

                                    <path d="M4 12l2.9 5a7 7 0 0 0 11.5-2" />

                                </svg>



                                <span id="fetchButtonText">دریافت آخرین قیمت</span>

                            </button>



                        </div>



                        <p id="fetchMessage" class="text-xs mt-3 hidden"></p>



                        <div
                            class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mt-5 pt-4 border-t border-[#EAE7E1]">



                            <div>

                                <p class="mb-2 text-[11px] text-[#858078]">

                                    قیمت دریافت‌شده

                                </p>



                                <div class="flex items-baseline gap-2">

                                    <strong id="referencePrice"
                                        class="text-2xl font-bold [direction:ltr] [font-variant-numeric:tabular-nums]">
                                        {{ $price?->update_mode === 'automatic' ? number_format($price->price) : '---' }}
                                    </strong>



                                    <span class="text-xs text-[#858078]">ریال</span>

                                </div>

                            </div>



                            <span id="referenceStatus"
                                class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full px-[9px] py-[5px] text-[11px] font-semibold {{ $price?->update_mode === 'automatic' ? 'bg-green-100 text-green-700' : 'bg-stone-100 text-stone-500' }}">
                                <span
                                    class="size-1.5 rounded-full {{ $price?->update_mode === 'automatic' ? 'bg-green-500' : 'bg-stone-400' }}"></span>
                                {{ $price?->update_mode === 'automatic' ? 'دریافت موفق' : 'هنوز دریافت نشده' }}
                            </span>



                        </div>



                    </div>



                </div>



                {{-- Price Differences --}}

                <div class="mb-4 rounded-[14px] border border-[#EAE7E1] bg-white p-4 sm:p-5">



                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">



                        <div>

                            <h3 class="text-sm font-bold">

                                اختلاف قیمت خرید و فروش

                            </h3>



                        </div>



                        <div class="flex items-center gap-5">



                            <label
                                class="inline-flex cursor-pointer items-center gap-[7px] text-xs text-[#858078] has-[:checked]:font-bold has-[:checked]:text-[#B88A3B]">

                                <span
                                    class="text-[10px] text-gray-400 {{ $price?->difference_type === 'percent' ? 'hidden' : '' }}"
                                    id="line_price">

                                    قیمت هر خط

                                    <span class="in-fa">{{ number_format($line?->line_value) }}</span>

                                    ریال

                                </span>

                                <input class="size-4 accent-[#B88A3B]" type="radio" name="difference_type" value="line"
                                    @checked(($price?->difference_type ?? 'line') === 'line')>

                                <span>خط</span>

                            </label>



                            <label
                                class="inline-flex cursor-pointer items-center gap-[7px] text-xs text-[#858078] has-[:checked]:font-bold has-[:checked]:text-[#B88A3B]">

                                <input class="size-4 accent-[#B88A3B]" type="radio" name="difference_type" value="percent"
                                    @checked(($price?->difference_type ?? 'line') === 'percent')>

                                <span>درصد</span>

                            </label>



                        </div>



                    </div>



                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">



                        {{-- Sell --}}

                        <div class="rounded-xl p-4 bg-[#FAF9F7]">



                            <div class="flex items-center justify-between mb-3">



                                <div>

                                    <h4 class="text-xs font-bold">اختلاف قیمت فروش</h4>

                                    <p class="mt-1 text-[11px] text-[#858078]">

                                        فروش طلا به مشتری

                                    </p>

                                </div>



                                <span class="text-xs font-bold text-[#B88A3B]">

                                    فروش

                                </span>



                            </div>



                            <div class="flex items-center gap-2">



                                <button type="button"
                                    class="price-adjust flex size-9 shrink-0 items-center justify-center rounded-lg border border-[#EAE7E1] bg-white text-xl text-[#B88A3B] transition duration-200 hover:border-[#D6AD60] hover:bg-[#FAF6ED]"
                                    data-target="sellDifference" data-action="decrease">−</button>



                                <div class="flex-1 rounded-lg border bg-white px-2 border-[#EAE7E1]">

                                    <input type="text" id="sellDifference"
                                        class="h-10 w-full min-w-0 border-0 bg-transparent text-center text-sm font-bold text-[#858078] outline-none [direction:ltr]"
                                        value="0" readonly>

                                </div>



                                <button type="button"
                                    class="price-adjust flex size-9 shrink-0 items-center justify-center rounded-lg border border-[#EAE7E1] bg-white text-xl text-[#B88A3B] transition duration-200 hover:border-[#D6AD60] hover:bg-[#FAF6ED]"
                                    data-target="sellDifference" data-action="increase">+</button>



                            </div>



                        </div>



                        {{-- Buy --}}

                        <div class="rounded-xl p-4 bg-[#FAF9F7]">



                            <div class="flex items-center justify-between mb-3">



                                <div>

                                    <h4 class="text-xs font-bold">اختلاف قیمت خرید</h4>

                                    <p class="mt-1 text-[11px] text-[#858078]">

                                        خرید طلا از مشتری

                                    </p>

                                </div>



                                <span class="text-xs font-bold text-green-700">

                                    خرید

                                </span>



                            </div>



                            <div class="flex items-center gap-2">



                                <button type="button"
                                    class="price-adjust flex size-9 shrink-0 items-center justify-center rounded-lg border border-[#EAE7E1] bg-white text-xl text-[#B88A3B] transition duration-200 hover:border-[#D6AD60] hover:bg-[#FAF6ED]"
                                    data-target="buyDifference" data-action="decrease">−</button>



                                <div class="flex-1 rounded-lg border bg-white px-2 border-[#EAE7E1]">

                                    <input type="text" id="buyDifference"
                                        class="h-10 w-full min-w-0 border-0 bg-transparent text-center text-sm font-bold text-[#858078] outline-none [direction:ltr]"
                                        value="0" readonly>

                                </div>



                                <button type="button"
                                    class="price-adjust flex size-9 shrink-0 items-center justify-center rounded-lg border border-[#EAE7E1] bg-white text-xl text-[#B88A3B] transition duration-200 hover:border-[#D6AD60] hover:bg-[#FAF6ED]"
                                    data-target="buyDifference" data-action="increase">+</button>



                            </div>



                        </div>



                    </div>



                    <div class="my-5 h-px bg-[#EAE7E1]"></div>



                    <div class="flex flex-col items-center justify-between gap-3">



                        <p id="saveMessage" class="text-xs hidden"></p>



                        <button type="submit" id="savePriceBtn"
                            class="inline-flex min-h-11 w-full items-center justify-center gap-2 rounded-[9px] bg-[#B88A3B] px-5 text-xs font-bold text-white transition duration-200 hover:bg-[#A97B32] disabled:cursor-not-allowed disabled:opacity-60 sm:w-auto">

                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">

                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z" />

                                <path d="M17 21v-8H7v8M7 3v5h8" />

                            </svg>

                            ثبت تنظیمات قیمت

                        </button>



                    </div>



                </div>



                {{-- Hidden Backend Fields --}}

                <input type="hidden" name="price" id="price" value="{{ $price?->price ?? '' }}">

                <input type="hidden" name="buy_difference" id="buyDifferenceValue" value="0">

                <input type="hidden" name="sell_difference" id="sellDifferenceValue" value="0">



            </form>

        </div>



    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {



            const $ = id => document.getElementById(id);



            const form = $('priceForm');



            const modeInputs = document.querySelectorAll('[name="update_mode"]');

            const differenceInputs = document.querySelectorAll('[name="difference_type"]');



            const manualSection = $('manualSection');

            const automaticSection = $('automaticSection');



            const manualPrice = $('manualPrice');

            const referenceSource = $('referenceSource');



            const referencePrice = $('referencePrice');

            const referenceStatus = $('referenceStatus');



            const fetchButton = $('fetchPriceBtn');

            const fetchButtonText = $('fetchButtonText');

            const fetchMessage = $('fetchMessage');



            const buyDifference = $('buyDifference');

            const sellDifference = $('sellDifference');



            const buyDifferenceValue = $('buyDifferenceValue');

            const sellDifferenceValue = $('sellDifferenceValue');



            const priceHidden = $('price');

            const saveMessage = $('saveMessage');



            let currentMode = @json($price?->update_mode ?? 'manual');

            let differenceType = @json($price?->difference_type ?? 'line');

            let manualPriceValue = currentMode === 'manual' ?
                @json((string) ($price?->price ?? '')) :
                '';

            let automaticPriceValue = currentMode === 'automatic' ?
                Number(@json($price?->price ?? 0)) :
                null;

            let buyLineDifference = differenceType === 'line' ?
                Number(@json($price?->buy_difference ?? 0)) :
                0;

            let sellLineDifference = differenceType === 'line' ?
                Number(@json($price?->sell_difference ?? 0)) :
                0;

            let buyPercentDifference = differenceType === 'percent' ?
                Number(@json($price?->buy_difference ?? 0)) :
                0;

            let sellPercentDifference = differenceType === 'percent' ?
                Number(@json($price?->sell_difference ?? 0)) :
                0;

            const fetchedPrices = currentMode === 'automatic' && referenceSource.value ? {
                [referenceSource.value]: automaticPriceValue
            } : {};



            function toEnglishNumber(value) {

                return String(value)

                    .replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d))

                    .replace(/[٠-٩]/g, d => '٠١٢٣٤٥٦٧٨٩'.indexOf(d));

            }



            function formatNumber(value) {

                const number = Number(value);

                if (!Number.isFinite(number)) return '';

                return new Intl.NumberFormat('en-US').format(number);

            }



            function getPriceNumber(value) {

                const cleaned = toEnglishNumber(value)

                    .replace(/,/g, '')

                    .replace(/[^\d]/g, '');



                return Number(cleaned) || 0;

            }



            function formatPriceInput(input) {

                const number = getPriceNumber(input.value);

                input.value = number ? formatNumber(number) : '';

                return number;

            }



            function showMessage(element, message, success) {

                element.textContent = message;

                element.classList.remove('hidden');

                element.style.color = success ? '#16A34A' : '#DC2626';

            }



            function hideMessage(element) {

                element.classList.add('hidden');

            }



            function getActivePrice() {

                if (currentMode === 'manual') {

                    return getPriceNumber(manualPriceValue);

                }



                return Number(automaticPriceValue) || 0;

            }



            function getBuyDifference() {

                return differenceType === 'line' ? buyLineDifference : buyPercentDifference;

            }



            function getSellDifference() {

                return differenceType === 'line' ? sellLineDifference : sellPercentDifference;

            }



            function getDifferenceText(value) {

                const sign = value > 0 ? '+' : '';

                const unit = differenceType === 'line' ? 'خط' : '%';



                return `${sign}${value} ${unit}`;

            }



            function updateDifferenceDisplay() {



                const buy = getBuyDifference();

                const sell = getSellDifference();



                buyDifference.value = getDifferenceText(buy);

                sellDifference.value = getDifferenceText(sell);



                buyDifferenceValue.value = buy;

                sellDifferenceValue.value = sell;



                [buyDifference, sellDifference].forEach((input, index) => {



                    const value = index === 0 ? buy : sell;



                    input.classList.remove('text-green-700', 'text-red-500', 'text-[#858078]');



                    if (value > 0) {

                        input.classList.add('text-green-700');

                    } else if (value < 0) {

                        input.classList.add('text-red-500');

                    } else {

                        input.classList.add('text-[#858078]');

                    }



                });

            }



            function updateHiddenPrice() {

                priceHidden.value = getActivePrice() || '';

            }



            function updateReferenceStatus(message, success = false) {



                if (success) {



                    referenceStatus.className =

                        'inline-flex items-center gap-1.5 whitespace-nowrap rounded-full px-[9px] py-[5px] text-[11px] font-semibold bg-green-100 text-green-700';



                    referenceStatus.innerHTML = `

                <span class="size-1.5 rounded-full bg-green-500"></span>

                ${message}

            `;



                } else {



                    referenceStatus.className =

                        'inline-flex items-center gap-1.5 whitespace-nowrap rounded-full px-[9px] py-[5px] text-[11px] font-semibold bg-stone-100 text-stone-500';



                    referenceStatus.innerHTML = `

                <span class="size-1.5 rounded-full bg-stone-400"></span>

                ${message}

            `;

                }

            }



            function changeMode(mode) {



                currentMode = mode;



                manualSection.classList.toggle('hidden', mode !== 'manual');

                automaticSection.classList.toggle('hidden', mode !== 'automatic');



                updateHiddenPrice();

                hideMessage(saveMessage);

            }



            modeInputs.forEach(input => {



                input.addEventListener('change', function() {



                    if (!this.checked) return;



                    changeMode(this.value);



                });



            });



            manualPrice.addEventListener('input', function() {



                formatPriceInput(this);



                manualPriceValue = this.value;



                updateHiddenPrice();

                hideMessage(saveMessage);



            });



            differenceInputs.forEach(input => {



                input.addEventListener('change', function() {



                    if (!this.checked) return;



                    differenceType = this.value;

                    const linePrice = document.getElementById('line_price')

                    if (differenceType == 'percent') {

                        linePrice.classList.add('hidden')

                    }

                    if (differenceType == 'line') {

                        linePrice.classList.remove('hidden')

                    }



                    updateDifferenceDisplay();

                    hideMessage(saveMessage);



                });



            });



            referenceSource.addEventListener('change', function() {



                const sourceId = this.value;



                hideMessage(fetchMessage);



                automaticPriceValue = null;

                updateHiddenPrice();



                if (!sourceId) {



                    referencePrice.textContent = '---';

                    updateReferenceStatus('هنوز دریافت نشده');



                    return;

                }



                if (Object.prototype.hasOwnProperty.call(fetchedPrices, sourceId)) {



                    automaticPriceValue = fetchedPrices[sourceId];



                    referencePrice.textContent = formatNumber(automaticPriceValue);



                    updateReferenceStatus('دریافت موفق', true);



                    updateHiddenPrice();



                } else {



                    referencePrice.textContent = '---';

                    updateReferenceStatus('آماده دریافت');



                }



            });



            fetchButton.addEventListener('click', function() {



                const selectedOption = referenceSource.options[referenceSource.selectedIndex];

                const sourceId = referenceSource.value;



                hideMessage(fetchMessage);



                if (!sourceId) {



                    showMessage(fetchMessage, 'ابتدا سایت مرجع را انتخاب کنید.', false);

                    return;

                }



                const testPrice = Number(selectedOption.dataset.price);



                if (!testPrice || testPrice <= 0) {



                    showMessage(fetchMessage, 'برای این سایت قیمت آزمایشی تعریف نشده است.', false);

                    return;

                }



                fetchButton.disabled = true;

                fetchButtonText.textContent = 'در حال دریافت...';



                setTimeout(() => {



                    automaticPriceValue = testPrice;



                    fetchedPrices[sourceId] = testPrice;



                    referencePrice.textContent = formatNumber(testPrice);



                    updateReferenceStatus('دریافت موفق', true);

                    updateHiddenPrice();



                    showMessage(

                        fetchMessage,

                        `قیمت آزمایشی ${selectedOption.text.trim()} با موفقیت دریافت شد.`,

                        true

                    );



                    fetchButton.disabled = false;

                    fetchButtonText.textContent = 'دریافت مجدد قیمت';



                }, 700);



            });



            document.querySelectorAll('.price-adjust').forEach(button => {



                button.addEventListener('click', function() {



                    const target = this.dataset.target;

                    const amount = this.dataset.action === 'increase' ? 1 : -1;



                    if (target === 'buyDifference') {



                        if (differenceType === 'line') {

                            buyLineDifference += amount;

                        } else {

                            buyPercentDifference += amount;

                        }



                    } else if (target === 'sellDifference') {



                        if (differenceType === 'line') {

                            sellLineDifference += amount;

                        } else {

                            sellPercentDifference += amount;

                        }



                    }



                    updateDifferenceDisplay();

                    hideMessage(saveMessage);



                });



            });



            form.addEventListener('submit', function(event) {



                hideMessage(saveMessage);



                const price = getActivePrice();



                if (!price || price <= 0) {



                    event.preventDefault();



                    showMessage(

                        saveMessage,

                        currentMode === 'manual' ?

                        'لطفاً قیمت مظنه را وارد کنید.' :

                        'ابتدا قیمت را از سایت مرجع دریافت کنید.',

                        false

                    );



                    return;

                }



                if (currentMode === 'automatic') {



                    const sourceId = referenceSource.value;



                    if (!sourceId) {



                        event.preventDefault();



                        showMessage(saveMessage, 'لطفاً سایت مرجع را انتخاب کنید.', false);

                        return;

                    }



                    if (

                        !Object.prototype.hasOwnProperty.call(fetchedPrices, sourceId) ||

                        automaticPriceValue === null

                    ) {



                        event.preventDefault();



                        showMessage(

                            saveMessage,

                            'لطفاً قیمت سایت مرجع انتخاب‌شده را دریافت کنید.',

                            false

                        );



                        return;

                    }

                }



                updateHiddenPrice();



                buyDifferenceValue.value = getBuyDifference();

                sellDifferenceValue.value = getSellDifference();



            });



            updateDifferenceDisplay();
            changeMode(currentMode);
            updateHiddenPrice();



        });
    </script>



@endsection
