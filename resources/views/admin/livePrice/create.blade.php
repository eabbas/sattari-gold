@extends('admin.app.dashboard')

@section('title', 'مدیریت قیمت طلا')

@section('content')

    <style>
        :root {
            --gold-bg: #F8F5EF;
            --gold-white: #FFFFFF;
            --gold-primary: #D6AD60;
            --gold-dark: #B88A3B;
            --gold-text: #29251F;
            --gold-muted: #78716C;
            --gold-border: #E7E2D9;
        }

        .price-management {
            color: var(--gold-text);
        }

        .price-card {
            background: var(--gold-white);
            border: 1px solid var(--gold-border);
            border-radius: 18px;
            transition: .25s ease;
        }

        .price-card:hover {
            border-color: var(--gold-primary);
            box-shadow: 0 10px 30px rgba(41, 37, 31, .045);
            transform: translateY(-2px);
        }

        .price-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 13px;
            background: var(--gold-bg);
            color: var(--gold-dark);
        }

        .price-input {
            width: 100%;
            background: #FAF9F6;
            border: 1px solid var(--gold-border);
            border-radius: 11px;
            padding: 13px 14px;
            outline: none;
            color: var(--gold-text);
            transition: .2s ease;
            font-size: 14px;
        }

        .price-input:focus {
            background: white;
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(214, 173, 96, .12);
        }

        .price-label {
            display: block;
            font-size: 12px;
            color: var(--gold-muted);
            margin-bottom: 9px;
        }

        .price-button {
            background: var(--gold-dark);
            color: white;
            transition: .2s ease;
        }

        .price-button:hover {
            background: #A97B32;
            box-shadow: 0 6px 16px rgba(184, 138, 59, .2);
        }

        .price-button:disabled {
            opacity: .65;
            cursor: not-allowed;
        }

        .price-outline-button {
            background: white;
            border: 1px solid var(--gold-border);
            color: var(--gold-text);
            transition: .2s ease;
        }

        .price-outline-button:hover {
            background: var(--gold-bg);
            border-color: var(--gold-primary);
        }

        .price-step {
            border: 1px solid var(--gold-border);
            background: white;
            color: var(--gold-muted);
            border-radius: 9px;
            padding: 8px 13px;
            font-size: 12px;
            transition: .2s ease;
        }

        .price-step.active {
            background: #F8F0DF;
            border-color: var(--gold-primary);
            color: var(--gold-dark);
            font-weight: 700;
        }

        .price-adjust {
            width: 40px;
            height: 42px;
            border: 1px solid var(--gold-border);
            background: white;
            color: var(--gold-dark);
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            transition: .2s ease;
            flex-shrink: 0;
        }

        .price-adjust:hover {
            background: var(--gold-bg);
            border-color: var(--gold-primary);
        }

        .price-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 11px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
        }

        .price-divider {
            height: 1px;
            background: var(--gold-border);
        }

        .price-type-card {
            background: #FAF9F6;
            border: 1px solid var(--gold-border);
            border-radius: 14px;
            padding: 16px;
        }

        .price-number {
            font-variant-numeric: tabular-nums;
            direction: ltr;
        }

        @media(max-width:640px) {
            .price-container {
                width: 94%;
            }
        }
    </style>


    <div class="price-management min-h-screen py-6 sm:py-9 w-full" style="background:var(--gold-bg)">

        <div class="price-container w-11/12 mx-auto max-w-[1500px]">


            {{-- Page Heading --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7">

                <div>
                    <h1 class="text-xl sm:text-2xl font-bold">
                        مدیریت قیمت طلا
                    </h1>

                    <p class="text-xs sm:text-sm mt-2" style="color:var(--gold-muted)">
                        دریافت و مدیریت قیمت خرید و فروش طلا
                    </p>
                </div>

                <div class="flex items-center gap-2 text-xs" style="color:var(--gold-muted)">
                    <span class="size-2 rounded-full" style="background:var(--gold-primary)"></span>
                    پنل مدیریت ستاری گلد
                </div>

            </div>


            {{-- Reference Source --}}
            <div class="price-card p-5 sm:p-6 mb-5">

                <div class="flex items-center gap-3 mb-5">

                    <div class="price-icon">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M3 12h18M12 3a15 15 0 0 1 0 18" />
                            <path d="M12 3a15 15 0 0 0 0 18" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-bold text-sm">
                            انتخاب سایت مرجع
                        </h3>

                        <p class="text-xs mt-1" style="color:var(--gold-muted)">
                            منبع موردنظر برای دریافت قیمت طلا را انتخاب کنید.
                        </p>
                    </div>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-[1fr_auto] gap-3">

                    <div>
                        <label class="price-label">
                            سایت مرجع قیمت
                        </label>

                        <select id="referenceSource" class="price-input cursor-pointer">
                            <option value="">انتخاب سایت مرجع</option>
                            <option value="tgju">شبکه اطلاع‌رسانی طلا و ارز (TGJU)</option>
                            <option value="union">اتحادیه طلا و جواهر</option>
                            <option value="other">سایر منابع</option>
                        </select>
                    </div>

                    <div class="flex items-end">

                        <button type="button" id="fetchPriceBtn"
                            class="price-button w-full sm:w-auto rounded-xl px-6 py-3.5 text-sm font-bold flex items-center justify-center gap-2">

                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 7v5h-5" />
                                <path d="M4 17v-5h5" />
                                <path d="M5.6 9a7 7 0 0 1 11.5-2L20 12" />
                                <path d="M4 12l2.9 5a7 7 0 0 0 11.5-2" />
                            </svg>

                            <span id="fetchButtonText">
                                دریافت آخرین قیمت
                            </span>

                        </button>

                    </div>

                </div>

                <p id="fetchMessage" class="text-xs mt-3 hidden"></p>

            </div>



            {{-- Reference Price --}}
            <div class="price-card p-5 sm:p-6 mb-5">

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                    <div>
                        <p class="text-xs mb-2" style="color:var(--gold-muted)">
                            قیمت دریافتی از سایت مرجع
                        </p>

                        <div class="flex items-baseline gap-2">

                            <strong id="referencePrice" class="text-2xl sm:text-3xl font-bold price-number">
                                ---
                            </strong>

                            <span class="text-xs" style="color:var(--gold-muted)">
                                تومان
                            </span>

                        </div>

                        <p class="text-xs mt-2" style="color:var(--gold-muted)">
                            قیمت هر گرم طلای ۱۸ عیار
                        </p>
                    </div>


                    <span id="referenceStatus" class="price-status bg-stone-100 text-stone-500 self-start sm:self-center">
                        <span class="size-1.5 rounded-full bg-stone-400"></span>
                        هنوز دریافت نشده
                    </span>

                </div>

            </div>



            {{-- Price Adjustment --}}
            <div class="price-card p-5 sm:p-6 mb-5">

                <div class="flex items-center gap-3 mb-6">

                    <div class="price-icon">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M12 2v20" />
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-bold text-sm">
                            تعیین قیمت خرید و فروش
                        </h3>

                        <p class="text-xs mt-1" style="color:var(--gold-muted)">
                            قیمت نهایی معاملات را مشخص کنید.
                        </p>
                    </div>

                </div>


                {{-- Price Inputs --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">


                    {{-- Buy Price --}}
                    <div class="price-type-card">

                        <div class="flex items-center justify-between gap-2 mb-4">

                            <div class="flex items-center gap-2">

                                <div class="size-9 rounded-xl flex items-center justify-center"
                                    style="background:#EAF6EE;color:#26834A">

                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M12 19V5" />
                                        <path d="m5 12 7-7 7 7" />
                                    </svg>

                                </div>

                                <div>
                                    <h4 class="font-bold text-sm">
                                        قیمت خرید
                                    </h4>

                                    <p class="text-xs mt-1" style="color:var(--gold-muted)">
                                        خرید طلا از مشتری
                                    </p>
                                </div>

                            </div>

                            <span class="text-xs" style="color:var(--gold-muted)">
                                تومان
                            </span>

                        </div>


                        <div class="flex items-center gap-2">

                            <button type="button" class="price-adjust" data-target="buyPrice" data-action="decrease">
                                −
                            </button>

                            <input type="text" id="buyPrice"
                                class="price-input text-center text-lg font-bold price-number" inputmode="numeric"
                                placeholder="قیمت خرید">

                            <button type="button" class="price-adjust" data-target="buyPrice" data-action="increase">
                                +
                            </button>

                        </div>

                        <p class="text-xs mt-2" style="color:var(--gold-muted)">
                            مبلغی که ستاری گلد بابت خرید طلا به مشتری پرداخت می‌کند.
                        </p>

                    </div>



                    {{-- Sell Price --}}
                    <div class="price-type-card">

                        <div class="flex items-center justify-between gap-2 mb-4">

                            <div class="flex items-center gap-2">

                                <div class="size-9 rounded-xl flex items-center justify-center"
                                    style="background:#FDF2E5;color:#B88A3B">

                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path d="M12 5v14" />
                                        <path d="m19 12-7 7-7-7" />
                                    </svg>

                                </div>

                                <div>
                                    <h4 class="font-bold text-sm">
                                        قیمت فروش
                                    </h4>

                                    <p class="text-xs mt-1" style="color:var(--gold-muted)">
                                        فروش طلا به مشتری
                                    </p>
                                </div>

                            </div>

                            <span class="text-xs" style="color:var(--gold-muted)">
                                تومان
                            </span>

                        </div>


                        <div class="flex items-center gap-2">

                            <button type="button" class="price-adjust" data-target="sellPrice" data-action="decrease">
                                −
                            </button>

                            <input type="text" id="sellPrice"
                                class="price-input text-center text-lg font-bold price-number" inputmode="numeric"
                                placeholder="قیمت فروش">

                            <button type="button" class="price-adjust" data-target="sellPrice" data-action="increase">
                                +
                            </button>

                        </div>

                        <p class="text-xs mt-2" style="color:var(--gold-muted)">
                            مبلغی که مشتری برای خرید طلا به ستاری گلد پرداخت می‌کند.
                        </p>

                    </div>

                </div>



                {{-- Price Steps --}}
                <div class="mt-6">

                    <p class="price-label">
                        میزان تغییر قیمت در هر مرحله
                    </p>

                    <div class="flex flex-wrap gap-2" id="priceSteps">

                        <button type="button" class="price-step" data-step="1000">
                            ۱,۰۰۰ تومان
                        </button>

                        <button type="button" class="price-step active" data-step="10000">
                            ۱۰,۰۰۰ تومان
                        </button>

                        <button type="button" class="price-step" data-step="100000">
                            ۱۰۰,۰۰۰ تومان
                        </button>

                    </div>

                </div>


                <div class="price-divider my-6"></div>


                {{-- Preview --}}
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                    <div>
                        <p class="text-xs mb-3" style="color:var(--gold-muted)">
                            پیش‌نمایش قیمت‌های نهایی
                        </p>

                        <div class="flex flex-wrap gap-x-6 gap-y-3">

                            <div>
                                <span class="text-xs" style="color:var(--gold-muted)">
                                    خرید:
                                </span>

                                <strong id="buyPreview" class="text-sm mr-1 price-number">
                                    ---
                                </strong>
                            </div>

                            <div>
                                <span class="text-xs" style="color:var(--gold-muted)">
                                    فروش:
                                </span>

                                <strong id="sellPreview" class="text-sm mr-1 price-number">
                                    ---
                                </strong>
                            </div>

                        </div>
                    </div>


                    <button type="button" id="savePriceBtn"
                        class="price-button rounded-xl px-7 py-3.5 text-sm font-bold flex items-center justify-center gap-2">

                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z" />
                            <path d="M17 21v-8H7v8M7 3v5h8" />
                        </svg>

                        ثبت قیمت خرید و فروش

                    </button>

                </div>

                <p id="saveMessage" class="text-xs mt-3 hidden"></p>

            </div>



            {{-- Active Prices --}}
            <div class="price-card p-5 sm:p-6">

                <div class="flex items-center gap-3 mb-5">

                    <div class="price-icon">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 3v18h18" />
                            <path d="m19 9-5 5-4-4-4 4" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-bold text-sm">
                            قیمت‌های فعال سایت
                        </h3>

                        <p class="text-xs mt-1" style="color:var(--gold-muted)">
                            آخرین قیمت‌های ثبت‌شده در ستاری گلد
                        </p>
                    </div>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    {{-- Active Buy --}}
                    <div class="rounded-xl p-4" style="background:#F3F8F4">

                        <p class="text-xs mb-3" style="color:#538263">
                            قیمت خرید از مشتری
                        </p>

                        <div class="flex items-baseline gap-2">

                            <strong id="activeBuyPrice" class="text-2xl font-bold price-number" style="color:#26834A">
                                ---
                            </strong>

                            <span class="text-xs" style="color:var(--gold-muted)">
                                تومان
                            </span>

                        </div>

                    </div>


                    {{-- Active Sell --}}
                    <div class="rounded-xl p-4" style="background:#FAF5EB">

                        <p class="text-xs mb-3" style="color:var(--gold-dark)">
                            قیمت فروش به مشتری
                        </p>

                        <div class="flex items-baseline gap-2">

                            <strong id="activeSellPrice" class="text-2xl font-bold price-number"
                                style="color:var(--gold-dark)">
                                ---
                            </strong>

                            <span class="text-xs" style="color:var(--gold-muted)">
                                تومان
                            </span>

                        </div>

                    </div>

                </div>


                <div class="price-divider my-5"></div>

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">

                    <span class="text-xs" style="color:var(--gold-muted)">
                        آخرین زمان ثبت قیمت
                    </span>

                    <span id="lastSavedAt" class="text-xs font-bold">
                        هنوز قیمتی ثبت نشده است
                    </span>

                </div>

            </div>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const sourceSelect = document.getElementById('referenceSource');

            const fetchButton = document.getElementById('fetchPriceBtn');
            const fetchButtonText = document.getElementById('fetchButtonText');
            const fetchMessage = document.getElementById('fetchMessage');

            const referencePriceElement = document.getElementById('referencePrice');
            const referenceStatus = document.getElementById('referenceStatus');

            const buyInput = document.getElementById('buyPrice');
            const sellInput = document.getElementById('sellPrice');

            const buyPreview = document.getElementById('buyPreview');
            const sellPreview = document.getElementById('sellPreview');

            const activeBuyPrice = document.getElementById('activeBuyPrice');
            const activeSellPrice = document.getElementById('activeSellPrice');

            const saveButton = document.getElementById('savePriceBtn');
            const saveMessage = document.getElementById('saveMessage');

            const lastSavedAt = document.getElementById('lastSavedAt');

            let selectedStep = 10000;
            let receivedPrice = null;


            // تبدیل اعداد فارسی و عربی به انگلیسی
            function toEnglishNumber(value) {
                return String(value)
                    .replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d))
                    .replace(/[٠-٩]/g, d => '٠١٢٣٤٥٦٧٨٩'.indexOf(d));
            }


            // فرمت سه رقم سه رقم
            function formatNumber(value) {
                const number = Number(value);

                if (!Number.isFinite(number)) return '';

                return new Intl.NumberFormat('en-US').format(number);
            }


            // استخراج عدد ورودی
            function getInputNumber(input) {
                const value = toEnglishNumber(input.value)
                    .replace(/,/g, '')
                    .replace(/[^\d]/g, '');

                return Number(value) || 0;
            }


            // مقداردهی قیمت
            function updateInput(input, value) {
                const price = Math.max(0, Math.round(Number(value) || 0));

                input.value = price ? formatNumber(price) : '';

                updatePreview();
            }


            // بروزرسانی پیش‌نمایش
            function updatePreview() {

                const buy = getInputNumber(buyInput);
                const sell = getInputNumber(sellInput);

                buyPreview.textContent = buy ? formatNumber(buy) : '---';
                sellPreview.textContent = sell ? formatNumber(sell) : '---';

                saveMessage.classList.add('hidden');
            }


            // تغییر مستقیم قیمت‌ها
            [buyInput, sellInput].forEach(input => {

                input.addEventListener('input', function() {

                    const value = getInputNumber(this);

                    this.value = value ? formatNumber(value) : '';

                    updatePreview();

                });

            });


            // انتخاب میزان تغییر
            document.querySelectorAll('.price-step').forEach(button => {

                button.addEventListener('click', function() {

                    document.querySelectorAll('.price-step').forEach(item => {
                        item.classList.remove('active');
                    });

                    this.classList.add('active');

                    selectedStep = Number(this.dataset.step);

                });

            });


            // افزایش و کاهش مستقل قیمت خرید و فروش
            document.querySelectorAll('.price-adjust').forEach(button => {

                button.addEventListener('click', function() {

                    const target = document.getElementById(this.dataset.target);
                    const current = getInputNumber(target);

                    if (!current) return;

                    const newPrice = this.dataset.action === 'increase' ?
                        current + selectedStep :
                        Math.max(0, current - selectedStep);

                    updateInput(target, newPrice);

                });

            });


            // دریافت قیمت نمونه
            fetchButton.addEventListener('click', function() {

                const source = sourceSelect.value;

                fetchMessage.classList.add('hidden');

                if (!source) {
                    showMessage(
                        fetchMessage,
                        'ابتدا سایت مرجع را انتخاب کنید.',
                        false
                    );
                    return;
                }

                fetchButton.disabled = true;
                fetchButtonText.textContent = 'در حال دریافت...';

                /*
                 * قیمت‌های زیر صرفاً نمونه هستند.
                 * بعداً باید از بک‌اند دریافت شوند.
                 */
                const demoPrices = {
                    tgju: 7250000,
                    union: 7260000,
                    other: 7245000
                };

                setTimeout(() => {

                    receivedPrice = demoPrices[source];

                    referencePriceElement.textContent = formatNumber(receivedPrice);

                    referenceStatus.innerHTML = `
                    <span class="size-1.5 rounded-full bg-green-500"></span>
                    دریافت موفق
                `;

                    // مقادیر پیش‌فرض نمونه بر اساس قیمت مرجع
                    updateInput(buyInput, receivedPrice - 50000);
                    updateInput(sellInput, receivedPrice + 50000);

                    showMessage(
                        fetchMessage,
                        'قیمت نمونه دریافت شد. می‌توانید قیمت خرید و فروش را ویرایش کنید.',
                        true
                    );

                    fetchButton.disabled = false;
                    fetchButtonText.textContent = 'دریافت مجدد قیمت';

                }, 700);

            });


            // ثبت قیمت خرید و فروش نمونه
            saveButton.addEventListener('click', function() {

                const buy = getInputNumber(buyInput);
                const sell = getInputNumber(sellInput);

                saveMessage.classList.add('hidden');

                if (!buy || !sell) {
                    showMessage(
                        saveMessage,
                        'لطفاً هر دو قیمت خرید و فروش را وارد کنید.',
                        false
                    );
                    return;
                }

                if (sell < buy) {
                    showMessage(
                        saveMessage,
                        'قیمت فروش نباید کمتر از قیمت خرید باشد.',
                        false
                    );
                    return;
                }

                /*
                 * در نسخه نهایی، هر دو قیمت باید
                 * با یک درخواست به سرور ارسال شوند.
                 */

                activeBuyPrice.textContent = formatNumber(buy);
                activeSellPrice.textContent = formatNumber(sell);

                lastSavedAt.textContent = new Date().toLocaleString('fa-IR', {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit'
                });

                showMessage(
                    saveMessage,
                    'قیمت خرید و فروش در پیش‌نمایش با موفقیت ثبت شد.',
                    true
                );

            });


            function showMessage(element, message, success) {

                element.textContent = message;
                element.classList.remove('hidden');

                element.style.color = success ? '#16A34A' : '#DC2626';
            }

        });
    </script>

@endsection
