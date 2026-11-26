const dealBlock = document.getElementById('dealBlock');
const mainBlock = document.getElementById('mainBlock');

const amountInput = document.getElementById('amountInput');
const weightInput = document.getElementById('weightInput');

const hiddenUserInput = document.getElementById('userInput');
const hiddenResultOutput = document.getElementById('resultOutput');
const calcBy = document.getElementById('calcBy');
const actionInp = document.getElementById('actionInp');
const goldPrice = document.getElementById('goldPrice');

const popupPricePerGram = document.getElementById('popupPricePerGram');
const balanceTitle = document.getElementById('balanceTitle');
const balanceValue = document.getElementById('balanceValue');
const tomanEquivalent = document.getElementById('tomanEquivalent');
const inputError = document.getElementById('inputError');
const submitBtn = document.getElementById('submitBtn');

const percentButtons = document.querySelectorAll('.percent-btn');

const MIN_WEIGHT = 0.0001;
const MAX_WEIGHT = 200;

let currentAction = 'buy';
let selectedPercent = null;
let isFormattingAmount = false;
let isFormattingWeight = false;

const numberFormat = new Intl.NumberFormat('en-US', {
    maximumFractionDigits: 0
});

const weightFormat = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 0,
    maximumFractionDigits: 4
});

function getNumber(value) {
    if (!value) return 0;

    const normalized = String(value)
        .replace(/[۰-۹]/g, digit => '۰۱۲۳۴۵۶۷۸۹'.indexOf(digit))
        .replace(/[٠-٩]/g, digit => '٠١٢٣٤٥٦٧٨٩'.indexOf(digit))
        .replace(/,/g, '')
        .trim();

    const number = parseFloat(normalized);

    return Number.isFinite(number) ? number : 0;
}

function formatAmount(value) {
    return numberFormat.format(Math.round(value));
}

function formatWeight(value) {
    return weightFormat.format(value);
}

function formatToman(value) {
    const toman = Math.floor(value / 10);

    if (!toman) return '';

    if (typeof num2persian === 'function') {
        return `معادل ${num2persian(toman)} تومان`;
    }

    return 'معادل تومان';
}

function getCurrentPrice() {
    return currentAction === 'buy'
        ? buyPricePerGram
        : sellPricePerGram;
}

function getCurrentBalance() {
    return currentAction === 'buy'
        ? userWalletBalance
        : userGoldBalance;
}

function updateBalance() {
    if (currentAction === 'buy') {
        balanceTitle.textContent = 'موجودی کیف پول شما';
        balanceValue.textContent = `${formatAmount(userWalletBalance)} ریال`;
    } else {
        balanceTitle.textContent = 'موجودی طلای شما';
        balanceValue.textContent = `${formatWeight(userGoldBalance)} گرم`;
    }
}

function updatePrice() {
    pricePerGram = getCurrentPrice();

    popupPricePerGram.textContent = formatAmount(pricePerGram);
    goldPrice.value = pricePerGram;
}

function clearPercentSelection() {
    selectedPercent = null;

    percentButtons.forEach(button => {
        button.classList.remove(
            'border-brand-red',
            'bg-red-50',
            'text-brand-red'
        );

        button.classList.add(
            'border-gray-200',
            'text-gray-600'
        );
    });
}

function selectPercent(button) {
    clearPercentSelection();

    selectedPercent = Number(button.dataset.percent);

    button.classList.remove(
        'border-gray-200',
        'text-gray-600'
    );

    button.classList.add(
        'border-brand-red',
        'bg-red-50',
        'text-brand-red'
    );

    const percentage = selectedPercent / 100;
    const balance = getCurrentBalance();

    if (currentAction === 'buy') {
        const amount = Math.floor(balance * percentage);

        amountInput.value = formatAmount(amount);
        calculateByAmount();
    } else {
        const weight = balance * percentage;

        weightInput.value = formatWeight(weight);
        calculateByWeight();
    }
}

function showError(message = '') {
    inputError.textContent = message;
    inputError.classList.toggle('hidden', !message);
}

function updateSubmitButton(isValid) {
    submitBtn.disabled = !isValid;

    submitBtn.classList.toggle('bg-gray-200', !isValid);
    submitBtn.classList.toggle('text-gray-400', !isValid);
    submitBtn.classList.toggle('cursor-not-allowed', !isValid);

    submitBtn.classList.toggle('bg-brand-red', isValid);
    submitBtn.classList.toggle('text-white', isValid);
    submitBtn.classList.toggle('hover:opacity-90', isValid);
    submitBtn.classList.toggle('cursor-pointer', isValid);
}

function validateDeal(amount, weight) {
    if (!amount || !weight || !Number.isFinite(amount) || !Number.isFinite(weight)) {
        showError();
        updateSubmitButton(false);
        return false;
    }

    if (weight < MIN_WEIGHT) {
        showError('حداقل وزن معامله باید ۰.۰۰۰۱ گرم باشد.');
        updateSubmitButton(false);
        return false;
    }

    if (weight > MAX_WEIGHT) {
        showError('حداکثر وزن مجاز برای معامله ۲۰۰ گرم است.');
        updateSubmitButton(false);
        return false;
    }

    if (currentAction === 'buy' && amount > userWalletBalance) {
        showError('موجودی کیف پول شما برای این معامله کافی نیست.');
        updateSubmitButton(false);
        return false;
    }

    if (currentAction === 'sell' && weight > userGoldBalance) {
        showError('موجودی طلای شما برای این معامله کافی نیست.');
        updateSubmitButton(false);
        return false;
    }

    showError();
    updateSubmitButton(true);

    return true;
}

function updateHiddenInputs(amount, weight, mode) {
    hiddenUserInput.value = mode === 'price' ? amount : weight;
    hiddenResultOutput.value = mode === 'price' ? weight : amount;

    calcBy.value = mode;
    goldPrice.value = getCurrentPrice();
}

function calculateByAmount() {
    const amount = getNumber(amountInput.value);
    const price = getCurrentPrice();

    weightInput.value = '';
    tomanEquivalent.textContent = '';

    if (!amount || !price || amount <= 0) {
        updateHiddenInputs(0, 0, 'price');
        showError();
        updateSubmitButton(false);
        return;
    }

    const weight = amount / price;

    weightInput.value = formatWeight(weight);
    tomanEquivalent.textContent = formatToman(amount);

    updateHiddenInputs(amount, weight, 'price');
    validateDeal(amount, weight);
}

function calculateByWeight() {
    const weight = getNumber(weightInput.value);
    const price = getCurrentPrice();

    amountInput.value = '';
    tomanEquivalent.textContent = '';

    if (!weight || !price || weight <= 0) {
        updateHiddenInputs(0, 0, 'weight');
        showError();
        updateSubmitButton(false);
        return;
    }

    const amount = Math.round(weight * price);

    amountInput.value = formatAmount(amount);
    tomanEquivalent.textContent = formatToman(amount);

    updateHiddenInputs(amount, weight, 'weight');
    validateDeal(amount, weight);
}

function openBlock(element) {
    currentAction = element.dataset.state;

    if (currentAction !== 'buy' && currentAction !== 'sell') return;

    mainBlock.reset();

    amountInput.value = '';
    weightInput.value = '';
    tomanEquivalent.textContent = '';

    hiddenUserInput.value = '';
    hiddenResultOutput.value = '';
    calcBy.value = '';

    selectedPercent = null;
    clearPercentSelection();
    showError();
    updateSubmitButton(false);

    document.getElementById('dealPopupTitle').textContent =
        currentAction === 'buy'
            ? 'خرید آبشده نقدی'
            : 'فروش آبشده نقدی';

    actionInp.value = currentAction;

    updateBalance();
    updatePrice();

    dealBlock.classList.remove(
        'invisible',
        'opacity-0',
        'pointer-events-none'
    );

    dealBlock.classList.add(
        'opacity-100',
        'pointer-events-auto'
    );

    document.body.classList.add('overflow-hidden');

    setTimeout(() => {
        if (currentAction === 'buy') {
            amountInput.focus();
        } else {
            weightInput.focus();
        }
    }, 100);
}

function closeBlock() {
    dealBlock.classList.remove(
        'opacity-100',
        'pointer-events-auto'
    );

    dealBlock.classList.add(
        'opacity-0',
        'pointer-events-none'
    );

    document.body.classList.remove('overflow-hidden');

    setTimeout(() => {
        dealBlock.classList.add('invisible');
    }, 300);
}

// Amount input
amountInput.addEventListener('input', () => {
    if (isFormattingAmount) return;

    clearPercentSelection();

    const value = getNumber(amountInput.value);

    isFormattingAmount = true;
    amountInput.value = value ? formatAmount(value) : '';
    isFormattingAmount = false;

    calculateByAmount();
});

// Weight input
weightInput.addEventListener('input', () => {
    if (isFormattingWeight) return;

    clearPercentSelection();

    const value = getNumber(weightInput.value);

    isFormattingWeight = true;
    weightInput.value = value ? formatWeight(value) : '';
    isFormattingWeight = false;

    calculateByWeight();
});

// Percentage buttons
percentButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (getCurrentBalance() <= 0) {
            showError('موجودی شما برای انجام معامله کافی نیست.');
            updateSubmitButton(false);
            return;
        }

        selectPercent(button);
    });
});

// Close by clicking outside the form
dealBlock.addEventListener('click', event => {
    if (event.target === dealBlock) {
        closeBlock();
    }
});

// Close with Escape
document.addEventListener('keydown', event => {
    if (
        event.key === 'Escape' &&
        !dealBlock.classList.contains('invisible')
    ) {
        closeBlock();
    }
});

// Prevent invalid form submission
mainBlock.addEventListener('submit', event => {
    const amount = getNumber(hiddenUserInput.value);
    const result = getNumber(hiddenResultOutput.value);

    const weight = calcBy.value === 'price' ? result : amount;
    const finalAmount = calcBy.value === 'price' ? amount : result;

    if (!validateDeal(finalAmount, weight)) {
        event.preventDefault();
        return;
    }

    if (!calcBy.value || !actionInp.value || !goldPrice.value) {
        event.preventDefault();
        showError('لطفاً اطلاعات معامله را کامل وارد کنید.');
        updateSubmitButton(false);
    }
});