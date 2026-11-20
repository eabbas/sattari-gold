
let dealBlock = document.getElementById('dealBlock');
let mainBlock = document.getElementById('mainBlock');

let btnByPrice = document.getElementById('btnByPrice');
let btnByWeight = document.getElementById('btnByWeight');

let userInput = document.getElementById('userInput');
let inputUnit = document.getElementById('inputUnit');

let resultOutput = document.getElementById('resultOutput');
let resultUnit = document.getElementById('resultUnit');

let inputError = document.getElementById('inputError');
let priceBlock = document.getElementById('priceBlock');

let submitBtn = document.getElementById('submitBtn');

let buyBox = document.getElementById('buyBox');
let sellBox = document.getElementById('sellBox');

let actionInp = document.getElementById('actionInp');
let calcBy = document.getElementById('calcBy');
let dealPopupTitle = document.getElementById('dealPopupTitle');

let goldPrice = document.getElementById('goldPrice');
let popupPricePerGram = document.getElementById('popupPricePerGram');


// ---------------------------------------------------------
// تنظیمات معاملات
// ---------------------------------------------------------

const maxWeight = 200;
const minWeight = 0.0001;

let currentMode = 'price';
let currentAction = 'buy';


// ---------------------------------------------------------
// تبدیل موجودی‌ها به عدد
// ---------------------------------------------------------

const cleanWalletBalance = Number(userWalletBalance) || 0;
const cleanGoldBalance = Number(userGoldBalance) || 0;


// ---------------------------------------------------------
// فرمت اعداد
// ---------------------------------------------------------

function formatNumber(num) {
    return Math.round(num).toLocaleString('en-US');
}

function formatWeight(num) {
    if (Number.isInteger(num)) {
        return num.toString();
    }

    return parseFloat(num.toFixed(5)).toString();
}

function formatPersianNumber(num) {
    return Math.round(num).toLocaleString('fa-IR');
}


// ---------------------------------------------------------
// تغییر قیمت بر اساس نوع معامله
// ---------------------------------------------------------

function updateTradePrice() {

    pricePerGram = currentAction === 'buy'
        ? Number(buyPricePerGram)
        : Number(sellPricePerGram);

    goldPrice.value = pricePerGram;

    popupPricePerGram.innerText = formatNumber(pricePerGram);
}


// ---------------------------------------------------------
// باز کردن پاپ آپ
// ---------------------------------------------------------

function openBlock(el) {

    if (el.id === 'buyBox') {

        currentAction = 'buy';

        dealPopupTitle.innerText = 'خرید آبشده نقدی';

        actionInp.value = 'buy';

    } else if (el.id === 'sellBox') {

        currentAction = 'sell';

        dealPopupTitle.innerText = 'فروش آبشده نقدی';

        actionInp.value = 'sell';

    } else {
        return;
    }

    // تنظیم قیمت مربوط به معامله
    updateTradePrice();

    // بازگشت فرم به حالت اولیه
    switchMode('price');

    // نمایش پاپ آپ
    dealBlock.classList.remove('invisible', 'opacity-0');

    mainBlock.classList.remove('scale-95');
    mainBlock.classList.add('scale-100');
}


// ---------------------------------------------------------
// بستن پاپ آپ
// ---------------------------------------------------------

function closeBlock() {

    dealBlock.classList.add('invisible', 'opacity-0');

    mainBlock.classList.remove('scale-100');
    mainBlock.classList.add('scale-95');

    // پاکسازی اطلاعات فرم
    switchMode('price');

}


// ---------------------------------------------------------
// بستن پاپ آپ با کلیک روی فضای بیرونی
// ---------------------------------------------------------

dealBlock.addEventListener('click', function (e) {

    if (e.target === dealBlock) {
        closeBlock();
    }

});


// بستن با کلید Escape
document.addEventListener('keydown', function (e) {

    if (e.key === 'Escape' &&
        !dealBlock.classList.contains('invisible')) {

        closeBlock();
    }

});


// ---------------------------------------------------------
// تغییر حالت محاسبه
// ---------------------------------------------------------

function switchMode(mode) {

    currentMode = mode;

    userInput.value = '';
    resultOutput.value = '';

    priceBlock.innerText = '';

    inputError.innerText = '';
    inputError.classList.add('hidden');

    userInput.classList.remove('border-brand-red');

    disableSubmitButton();

    if (mode === 'price') {

        btnByPrice.className =
            'flex-1 py-2 text-xs font-medium rounded-md transition-all duration-300 bg-white text-brand-red shadow-sm';

        btnByWeight.className =
            'flex-1 py-2 text-xs font-medium rounded-md transition-all duration-300 text-gray-500 hover:text-gray-700';

        calcBy.value = 'price';

        userInput.placeholder = 'مبلغ کل (ریال)';
        inputUnit.innerText = 'ریال';

        resultOutput.placeholder = 'وزن (گرم)';
        resultUnit.innerText = 'گرم';

    } else {

        btnByWeight.className =
            'flex-1 py-2 text-xs font-medium rounded-md transition-all duration-300 bg-white text-brand-red shadow-sm';

        btnByPrice.className =
            'flex-1 py-2 text-xs font-medium rounded-md transition-all duration-300 text-gray-500 hover:text-gray-700';

        calcBy.value = 'weight';

        userInput.placeholder = 'وزن (گرم)';
        inputUnit.innerText = 'گرم';

        resultOutput.placeholder = 'مبلغ کل (ریال)';
        resultUnit.innerText = 'ریال';

    }

}


// ---------------------------------------------------------
// دکمه‌های تغییر حالت
// ---------------------------------------------------------

btnByPrice.addEventListener('click', function () {
    switchMode('price');
});

btnByWeight.addEventListener('click', function () {
    switchMode('weight');
});


// ---------------------------------------------------------
// محاسبات ورودی کاربر
// ---------------------------------------------------------

userInput.addEventListener('input', function () {

    let value = Number(this.value);

    inputError.classList.add('hidden');
    inputError.innerText = '';

    this.classList.remove('border-brand-red');

    resultOutput.value = '';
    priceBlock.innerText = '';

    // بررسی ورودی نامعتبر
    if (!Number.isFinite(value) || value <= 0) {

        disableSubmitButton();
        return;

    }


    // =====================================================
    // حالت اول: محاسبه بر اساس مبلغ
    // =====================================================

    if (currentMode === 'price') {

        let price = value;

        let weight = price / pricePerGram;

        // نمایش معادل مبلغ به تومان
        priceBlock.innerText =
            'معادل ' +
            formatPersianNumber(price / 10) +
            ' تومان';


        // بررسی حداقل وزن
        if (weight < minWeight) {

            showError('مبلغ وارد شده بسیار کم است (کمتر از ۰.۰۰۰۱ گرم).');

            disableSubmitButton();
            return;

        }


        // بررسی حداکثر وزن
        if (weight > maxWeight) {

            showError('حداکثر وزن مجاز برای هر معامله ۲۰۰ گرم است.');

            disableSubmitButton();
            return;

        }


        // بررسی موجودی کیف پول در خرید
        if (
            currentAction === 'buy' &&
            price > cleanWalletBalance
        ) {

            showError('مبلغ وارد شده از موجودی کیف پول شما بیشتر است.');

            disableSubmitButton();
            return;

        }


        // بررسی موجودی طلا در فروش
        if (
            currentAction === 'sell' &&
            weight > cleanGoldBalance
        ) {

            showError('وزن محاسبه شده از موجودی طلایی سپرده شما بیشتر است.');

            disableSubmitButton();
            return;

        }


        // نمایش وزن نهایی
        resultOutput.value = formatWeight(weight);

        enableSubmitButton();

    }


    // =====================================================
    // حالت دوم: محاسبه بر اساس وزن
    // =====================================================

    else {

        let weight = value;

        // بررسی حداقل وزن
        if (weight < minWeight) {

            showError('حداقل وزن مجاز ۰.۰۰۰۱ گرم است.');

            disableSubmitButton();
            return;

        }


        // بررسی حداکثر وزن
        if (weight > maxWeight) {

            showError('حداکثر وزن مجاز برای هر معامله ۲۰۰ گرم است.');

            disableSubmitButton();
            return;

        }


        // محاسبه مبلغ
        let price = weight * pricePerGram;


        // بررسی موجودی کیف پول در خرید
        if (
            currentAction === 'buy' &&
            price > cleanWalletBalance
        ) {

            showError('مبلغ محاسبه شده از موجودی کیف پول شما بیشتر است.');

            disableSubmitButton();
            return;

        }


        // بررسی موجودی طلا در فروش
        if (
            currentAction === 'sell' &&
            weight > cleanGoldBalance
        ) {

            showError('وزن وارد شده از موجودی طلایی سپرده شما بیشتر است.');

            disableSubmitButton();
            return;

        }


        // نمایش مبلغ نهایی
        resultOutput.value = formatNumber(price);

        // نمایش معادل مبلغ به تومان
        priceBlock.innerText =
            'معادل ' +
            formatPersianNumber(price / 10) +
            ' تومان';

        enableSubmitButton();

    }

});


// ---------------------------------------------------------
// نمایش خطا
// ---------------------------------------------------------

function showError(message) {

    inputError.innerText = message;

    inputError.classList.remove('hidden');

    userInput.classList.add('border-brand-red');

}


// ---------------------------------------------------------
// غیرفعال کردن دکمه ثبت
// ---------------------------------------------------------

function disableSubmitButton() {

    submitBtn.disabled = true;

    submitBtn.classList.add(
        'bg-gray-300',
        'text-gray-500',
        'cursor-not-allowed'
    );

    submitBtn.classList.remove(
        'bg-red-500',
        'text-white',
        'hover:bg-red-700',
        'cursor-pointer'
    );

}


// ---------------------------------------------------------
// فعال کردن دکمه ثبت
// ---------------------------------------------------------

function enableSubmitButton() {

    submitBtn.disabled = false;

    submitBtn.classList.remove(
        'bg-gray-300',
        'text-gray-500',
        'cursor-not-allowed'
    );

    submitBtn.classList.add(
        'bg-red-500',
        'text-white',
        'hover:bg-red-700',
        'cursor-pointer'
    );

}


// ---------------------------------------------------------
// مقداردهی اولیه
// ---------------------------------------------------------

updateTradePrice();

switchMode('price');
