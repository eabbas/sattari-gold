@extends('admin.app.dashboard')

@section('title', 'مدیریت قیمت طلا')

@section('content')

    <style>
        :root {
            --gold-bg: #F8F7F4;
            --gold-white: #FFFFFF;
            --gold-primary: #D6AD60;
            --gold-dark: #B88A3B;
            --gold-text: #29251F;
            --gold-muted: #858078;
            --gold-border: #EAE7E1;
        }

        .price-management {
            color: var(--gold-text);
            background: var(--gold-bg);
        }

        .price-container {
            width: 92%;
            max-width: 1100px;
            margin: auto;
        }

        .price-panel {
            background: var(--gold-white);
            border: 1px solid var(--gold-border);
            border-radius: 14px;
        }

        .price-input {
            width: 100%;
            min-width: 0;
            height: 46px;
            padding: 0 13px;
            border: 1px solid var(--gold-border);
            border-radius: 9px;
            background: #FAF9F7;
            color: var(--gold-text);
            outline: none;
            font-size: 13px;
            transition: .2s;
        }

        .price-input:focus {
            background: white;
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(214, 173, 96, .10);
        }

        .price-label {
            display: block;
            margin-bottom: 9px;
            font-size: 12px;
            color: var(--gold-muted);
        }

        .price-button {
            min-height: 44px;
            padding: 0 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-radius: 9px;
            background: var(--gold-dark);
            color: white;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .price-button:hover {
            background: #A97B32;
        }

        .price-button:disabled {
            opacity: .6;
            cursor: not-allowed;
        }

        .price-mode-option {
            display: flex;
            align-items: center;
            gap: 9px;
            cursor: pointer;
            font-size: 13px;
            color: var(--gold-muted);
        }

        .price-mode-option input,
        .price-method-option input {
            accent-color: var(--gold-dark);
            width: 16px;
            height: 16px;
        }

        .price-mode-option:has(input:checked) {
            color: var(--gold-dark);
            font-weight: 700;
        }

        .price-section {
            display: none;
            animation: priceFade .2s ease;
        }

        .price-section.active {
            display: block;
        }

        @keyframes priceFade {
            from {
                opacity: 0;
                transform: translateY(4px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .price-method-option {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            cursor: pointer;
            font-size: 12px;
            color: var(--gold-muted);
        }

        .price-method-option:has(input:checked) {
            color: var(--gold-dark);
            font-weight: 700;
        }

        .price-adjust {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--gold-border);
            border-radius: 8px;
            background: white;
            color: var(--gold-dark);
            font-size: 20px;
            transition: .2s;
        }

        .price-adjust:hover {
            background: #FAF6ED;
            border-color: var(--gold-primary);
        }

        .price-difference-input {
            height: 40px;
            text-align: center;
            font-size: 14px;
            font-weight: 700;
            direction: ltr;
            min-width: 0;
            background: transparent;
            border: none;
            outline: none;
        }

        .price-difference-input.positive {
            color: #26834A;
        }

        .price-difference-input.negative {
            color: #DC5555;
        }

        .price-difference-input.zero {
            color: var(--gold-muted);
        }

        .price-number {
            font-variant-numeric: tabular-nums;
            direction: ltr;
        }

        .price-divider {
            height: 1px;
            background: var(--gold-border);
        }

        .price-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .price-info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--gold-border);
            font-size: 12px;
        }

        .price-info-row:last-child {
            border-bottom: none;
        }

        @media(max-width:640px) {
            .price-container {
                width: 94%;
            }
        }
    </style>

    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa">
                {{ session('success') }}
            </span>
        </div>
    @endif

    <div class="price-management min-h-screen py-6 sm:py-9 w-full">

        <div class="price-container">

            {{-- Heading --}}
            <div class="mb-7">
                <h1 class="text-xl sm:text-2xl font-bold">
                    مدیریت قیمت طلا
                </h1>

                <p class="text-xs mt-2" style="color:var(--gold-muted)">
                    تنظیم مظنه و مدیریت قیمت خرید و فروش
                </p>
            </div>

            <form action="{{ route('price.store') }}" method="POST" id="priceForm">
                @csrf

                {{-- Update Mode --}}
                <div class="price-panel p-4 sm:p-5 mb-4">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                        <div>
                            <h3 class="text-sm font-bold">
                                روش بروزرسانی قیمت
                            </h3>

                            <p class="text-[11px] mt-1" style="color:var(--gold-muted)">
                                نحوه دریافت قیمت پایه را انتخاب کنید.
                            </p>
                        </div>

                        <div class="flex flex-wrap items-center gap-5">

                            <label class="price-mode-option">
                                <input type="radio" name="update_mode" value="manual" checked>
                                <span>دستی</span>
                            </label>

                            <label class="price-mode-option">
                                <input type="radio" name="update_mode" value="automatic">
                                <span>اتوماتیک</span>
                            </label>

                        </div>

                    </div>
                </div>

                {{-- Manual Mode --}}
                <div id="manualSection" class="price-section active">

                    <div class="price-panel p-4 sm:p-5 mb-4">

                        <label class="price-label" for="manualPrice">
                            قیمت پایه مظنه
                        </label>

                        <div class="relative max-w-full">
                            <input type="text" id="manualPrice" class="price-input font-bold text-base"
                                style="direction:ltr;text-align:right;padding-left:65px;" inputmode="numeric"
                                autocomplete="off" placeholder="قیمت را وارد کنید">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs" style="color:var(--gold-muted)">
                                ریال
                            </span>
                        </div>

                    </div>

                </div>

                {{-- Automatic Mode --}}
                <div id="automaticSection" class="price-section">

                    <div class="price-panel p-4 sm:p-5 mb-4">

                        <label class="price-label" for="referenceSource">
                            انتخاب سایت مرجع
                        </label>

                        <div class="grid grid-cols-1 sm:grid-cols-[1fr_auto] gap-3">

                            <select id="referenceSource" name="reference_source" class="price-input cursor-pointer">
                                <option value="">انتخاب سایت مرجع</option>

                                @foreach ($sites as $site)
                                    <option value="{{ $site->id }}" data-url="{{ $site->address }}"
                                        data-price="{{ 72500000 + ($loop->iteration - 1) * 100000 }}">
                                        {{ $site->title }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="button" id="fetchPriceBtn" class="price-button">
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

                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mt-5 pt-4 border-t"
                            style="border-color:var(--gold-border)">

                            <div>
                                <p class="text-[11px] mb-2" style="color:var(--gold-muted)">
                                    قیمت دریافت‌شده
                                </p>

                                <div class="flex items-baseline gap-2">
                                    <strong id="referencePrice" class="text-2xl font-bold price-number">
                                        ---
                                    </strong>

                                    <span class="text-xs" style="color:var(--gold-muted)">ریال</span>
                                </div>
                            </div>

                            <span id="referenceStatus" class="price-status bg-stone-100 text-stone-500">
                                <span class="size-1.5 rounded-full bg-stone-400"></span>
                                هنوز دریافت نشده
                            </span>

                        </div>

                    </div>

                </div>

                {{-- Price Differences --}}
                <div class="price-panel p-4 sm:p-5 mb-4">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">

                        <div>
                            <h3 class="text-sm font-bold">
                                اختلاف قیمت خرید و فروش
                            </h3>

                            <p class="text-[11px] mt-1" style="color:var(--gold-muted)">
                                مقدار اختلاف را نسبت به قیمت پایه تعیین کنید.
                            </p>
                        </div>

                        <div class="flex items-center gap-5">

                            <label class="price-method-option">
                                <input type="radio" name="difference_type" value="line" checked>
                                <span>خط</span>
                            </label>

                            <label class="price-method-option">
                                <input type="radio" name="difference_type" value="percent">
                                <span>درصد</span>
                            </label>

                        </div>

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        {{-- Sell --}}
                        <div class="rounded-xl p-4" style="background:#FAF9F7">

                            <div class="flex items-center justify-between mb-3">

                                <div>
                                    <h4 class="text-xs font-bold">اختلاف قیمت فروش</h4>
                                    <p class="text-[11px] mt-1" style="color:var(--gold-muted)">
                                        فروش طلا به مشتری
                                    </p>
                                </div>

                                <span class="text-xs font-bold" style="color:var(--gold-dark)">
                                    فروش
                                </span>

                            </div>

                            <div class="flex items-center gap-2">

                                <button type="button" class="price-adjust" data-target="sellDifference"
                                    data-action="decrease">−</button>

                                <div class="flex-1 rounded-lg border bg-white px-2"
                                    style="border-color:var(--gold-border)">
                                    <input type="text" id="sellDifference" class="price-difference-input w-full zero"
                                        value="0 خط" readonly>
                                </div>

                                <button type="button" class="price-adjust" data-target="sellDifference"
                                    data-action="increase">+</button>

                            </div>

                        </div>

                        {{-- Buy --}}
                        <div class="rounded-xl p-4" style="background:#FAF9F7">

                            <div class="flex items-center justify-between mb-3">

                                <div>
                                    <h4 class="text-xs font-bold">اختلاف قیمت خرید</h4>
                                    <p class="text-[11px] mt-1" style="color:var(--gold-muted)">
                                        خرید طلا از مشتری
                                    </p>
                                </div>

                                <span class="text-xs font-bold text-green-700">
                                    خرید
                                </span>

                            </div>

                            <div class="flex items-center gap-2">

                                <button type="button" class="price-adjust" data-target="buyDifference"
                                    data-action="decrease">−</button>

                                <div class="flex-1 rounded-lg border bg-white px-2"
                                    style="border-color:var(--gold-border)">
                                    <input type="text" id="buyDifference" class="price-difference-input w-full zero"
                                        value="0 خط" readonly>
                                </div>

                                <button type="button" class="price-adjust" data-target="buyDifference"
                                    data-action="increase">+</button>

                            </div>

                        </div>

                    </div>

                    <div class="price-divider my-5"></div>

                    <div class="flex flex-col items-center justify-between gap-3">

                        <p id="saveMessage" class="text-xs hidden"></p>

                        <button type="submit" id="savePriceBtn" class="price-button w-full sm:w-auto">
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
                <input type="hidden" name="price" id="price">
                <input type="hidden" name="buy_difference" id="buyDifferenceValue" value="0">
                <input type="hidden" name="sell_difference" id="sellDifferenceValue" value="0">

            </form>

            {{-- Current Price --}}
            @if ($price)

                <div class="price-panel p-4 sm:p-5 mt-6">

                    <div class="flex flex-wrap items-center justify-between gap-3 mb-4">

                        <div>
                            <h3 class="text-sm font-bold">وضعیت فعلی قیمت</h3>
                        </div>

                        <span
                            class="price-status
                        {{ $price->update_mode === 'automatic' ? 'bg-blue-50 text-blue-600' : 'bg-amber-50 text-amber-700' }}">
                            <span
                                class="size-1.5 rounded-full
                            {{ $price->update_mode === 'automatic' ? 'bg-blue-500' : 'bg-amber-500' }}">
                            </span>

                            {{ $price->update_mode === 'automatic' ? 'بروزرسانی اتوماتیک' : 'بروزرسانی دستی' }}
                        </span>

                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-4 px-4 rounded-xl"
                        style="background:#FAF9F6">

                        <div>
                            <p class="text-[11px] mb-2" style="color:var(--gold-muted)">
                                قیمت پایه مظنه
                            </p>

                            <div class="flex items-baseline gap-2">
                                <strong class="text-2xl font-bold price-number" style="color:var(--gold-dark)">
                                    {{ number_format($price->price) }}
                                </strong>

                                <span class="text-xs" style="color:var(--gold-muted)">ریال</span>
                            </div>
                        </div>

                        <div class="text-xs sm:text-left">
                            <p style="color:var(--gold-muted)">آخرین بروزرسانی</p>
                            <p class="font-bold mt-2">
                                {{ $price->updated_at?->format('Y/m/d - H:i') }}
                            </p>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 mt-3">

                        <div class="price-info-row">
                            <span style="color:var(--gold-muted)">سایت مرجع</span>
                            <span class="font-bold">
                                @if ($price->referenceSite)
                                    <a href="https://{{ $price->referenceSite->address }}" target="_blank"
                                        rel="noopener noreferrer" style="color:var(--gold-dark)">
                                        {{ $price->referenceSite->title }}
                                    </a>
                                @else
                                    —
                                @endif
                            </span>
                        </div>

                        <div class="price-info-row">
                            <span style="color:var(--gold-muted)">نوع محاسبه اختلاف</span>
                            <span class="font-bold">
                                {{ $price->difference_type === 'line' ? 'بر اساس خط' : 'بر اساس درصد' }}
                            </span>
                        </div>

                        <div class="price-info-row">
                            <span style="color:var(--gold-muted)">اختلاف قیمت خرید</span>
                            <span class="font-bold {{ $price->buy_difference < 0 ? 'text-red-500' : 'text-green-600' }}">
                                {{ $price->buy_difference > 0 ? '+' : '' }}{{ $price->buy_difference }}
                                <small class="font-normal" style="color:var(--gold-muted)">
                                    {{ $price->difference_type === 'line' ? 'خط' : '%' }}
                                </small>
                            </span>
                        </div>

                        <div class="price-info-row">
                            <span style="color:var(--gold-muted)">اختلاف قیمت فروش</span>
                            <span class="font-bold {{ $price->sell_difference < 0 ? 'text-red-500' : 'text-green-600' }}">
                                {{ $price->sell_difference > 0 ? '+' : '' }}{{ $price->sell_difference }}
                                <small class="font-normal" style="color:var(--gold-muted)">
                                    {{ $price->difference_type === 'line' ? 'خط' : '%' }}
                                </small>
                            </span>
                        </div>

                    </div>

                </div>
            @else
                <div class="price-panel p-6 mt-6 text-center">
                    <p class="text-sm font-bold">هنوز قیمتی ثبت نشده است.</p>
                    <p class="text-xs mt-2" style="color:var(--gold-muted)">
                        پس از ثبت تنظیمات، وضعیت قیمت در این قسمت نمایش داده می‌شود.
                    </p>
                </div>

            @endif

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

            let currentMode = 'manual';
            let differenceType = 'line';

            let manualPriceValue = '';
            let automaticPriceValue = null;

            let buyLineDifference = 0;
            let sellLineDifference = 0;

            let buyPercentDifference = 0;
            let sellPercentDifference = 0;

            const fetchedPrices = {};

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

                    input.classList.remove('positive', 'negative', 'zero');

                    if (value > 0) {
                        input.classList.add('positive');
                    } else if (value < 0) {
                        input.classList.add('negative');
                    } else {
                        input.classList.add('zero');
                    }

                });
            }

            function updateHiddenPrice() {
                priceHidden.value = getActivePrice() || '';
            }

            function updateReferenceStatus(message, success = false) {

                if (success) {

                    referenceStatus.className =
                        'price-status bg-green-100 text-green-700';

                    referenceStatus.innerHTML = `
                <span class="size-1.5 rounded-full bg-green-500"></span>
                ${message}
            `;

                } else {

                    referenceStatus.className =
                        'price-status bg-stone-100 text-stone-500';

                    referenceStatus.innerHTML = `
                <span class="size-1.5 rounded-full bg-stone-400"></span>
                ${message}
            `;
                }
            }

            function changeMode(mode) {

                currentMode = mode;

                manualSection.classList.toggle('active', mode === 'manual');
                automaticSection.classList.toggle('active', mode === 'automatic');

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
            updateHiddenPrice();

        });
    </script>

@endsection
