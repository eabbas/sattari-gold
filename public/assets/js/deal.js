// let boxes = document.querySelectorAll('.openDealBox')
// let dealBlock = document.getElementById('dealBlock')
// let closeDealBox = document.getElementById('closeDealBox')
// let btnByPrice = document.getElementById('btnByPrice')
// let btnByWeight = document.getElementById('btnByWeight')
// let userInput = document.getElementById('userInput')
// let inputUnit = document.getElementById('inputUnit')
// let resultOutput = document.getElementById('resultOutput')
// let resultUnit = document.getElementById('resultUnit')
// let inputError = document.getElementById('inputError')
// let submitBtn = document.getElementById('submitBtn')
// let buyBox = document.getElementById('buyBox')
// let sellBox = document.getElementById('sellBox')
// let actionInp = document.getElementById('actionInp')
// let calcBy = document.getElementById('calcBy')
// let dealPopupTitle = document.getElementById('dealPopupTitle')
// let goldPrice = document.getElementById('goldPrice')
// let maxWeight = 200
// let minWeight = 0.0001
// let currentMode = 'price'

// goldPrice.value = pricePerGram

// function closeBlock(){
//     dealBlock.classList.add('invisible')
//     dealBlock.classList.add('opacity-0')
//     dealBlock.querySelector('#mainBlock').classList.remove('bottom-0')
//     dealBlock.querySelector('#mainBlock').classList.add('-bottom-full')
//     switchMode('price')
// }

// function openBlock(el){
//     if(el.id == 'buyBox'){
//         dealPopupTitle.innerText = 'خرید آبشده نقدی'
//         actionInp.value = 'buy'
//     }
//     if(el.id == 'sellBox'){
//         dealPopupTitle.innerText = 'فروش آبشده نقدی'
//         actionInp.value = 'sell'
//     }
//     dealBlock.classList.remove('invisible')
//     dealBlock.classList.remove('opacity-0')
//     dealBlock.querySelector('#mainBlock').classList.remove('-bottom-full')
//     dealBlock.querySelector('#mainBlock').classList.add('bottom-0')
// }

// document.addEventListener('click', (e)=>{
//     if (!sellBox.contains(e.target) && !buyBox.contains(e.target) && !dealBlock.querySelector('#mainBlock').contains(e.target)){
//         closeBlock()
//     }
// })

// function formatNumber(num) {
//     return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
// }

// function formatWeight(num) {
//     if (Number.isInteger(num)) return num.toString()
//     return num.toFixed(5)
// }

// function switchMode(mode) {
//     currentMode = mode
//     userInput.value = ''
//     resultOutput.value = ''
//     inputError.classList.add('hidden')
//     userInput.classList.remove('border-brand-red')
//     disableSubmitButton()

//     if (mode === 'price') {
//         btnByPrice.className =
//             'flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 bg-white text-brand-red shadow-sm'
//         btnByWeight.className =
//             'flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 text-gray-500 hover:text-gray-700'
//         calcBy.value = 'price'
//         userInput.placeholder = 'مبلغ کل'
//         inputUnit.innerText = 'ریال'
//         resultOutput.placeholder = 'وزن (گرم)'
//         resultUnit.innerText = 'گرم'
//     } else {
//         btnByWeight.className =
//             'flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 bg-white text-brand-red shadow-sm'
//         btnByPrice.className =
//             'flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 text-gray-500 hover:text-gray-700'
//         calcBy.value = 'weight'
//         userInput.placeholder = 'وزن (گرم)'
//         inputUnit.innerText = 'گرم'
//         resultOutput.placeholder = 'مبلغ کل'
//         resultUnit.innerText = 'ریال'
//     }
// }

// btnByPrice.addEventListener('click', () => switchMode('price'))
// btnByWeight.addEventListener('click', () => switchMode('weight'))

// userInput.addEventListener('input', function () {
//     let value = parseFloat(this.value)

//     inputError.classList.add('hidden')
//     this.classList.remove('border-brand-red')

//     if (isNaN(value) || value <= 0) {
//         resultOutput.value = ''
//         disableSubmitButton()
//         return
//     }

//     if (currentMode === 'price') {
//         let price = value

//         if (price > userWalletBalance) {
//             showError('مبلغ وارد شده از موجودی کیف پول شما بیشتر است.')
//             resultOutput.value = ''
//             disableSubmitButton()
//             return
//         }

//         let weight = price / pricePerGram

//         if (weight < minWeight) {
//             showError('مبلغ وارد شده بسیار کم است (کمتر از ۰.۰۰۰۱ گرم).')
//             resultOutput.value = ''
//             disableSubmitButton()
//             return
//         }

//         if (weight > maxWeight) {
//             weight = maxWeight
//             this.value = maxWeight * pricePerGram
//         }

//         resultOutput.value = formatWeight(weight)
//         enableSubmitButton()

//     } else {
//         let weight = value

//         if (weight < minWeight) {
//             showError('حداقل وزن مجاز ۰.۰۰۰۱ گرم است.')
//             resultOutput.value = ''
//             disableSubmitButton()
//             return
//         }

//         if (weight > maxWeight) {
//             weight = maxWeight
//             this.value = maxWeight 
//         }

//         let price = weight * pricePerGram

//         if (price > userWalletBalance) {
//             showError('مبلغ محاسبه شده از موجودی کیف پول شما بیشتر است.')
//             resultOutput.value = ''
//             disableSubmitButton()
//             return
//         }

//         resultOutput.value = formatNumber(Math.round(price))
//         enableSubmitButton()
//     }
// })

// function showError(message) {
//     inputError.innerText = message
//     inputError.classList.remove('hidden')
//     userInput.classList.add('border-brand-red')
// }

// function disableSubmitButton() {
//     submitBtn.disabled = true
//     submitBtn.classList.add('bg-gray-300', 'text-gray-500', 'cursor-not-allowed')
//     submitBtn.classList.remove('bg-red-500', 'text-white', 'hover:bg-red-700', 'cursor-pointer')
// }

// function enableSubmitButton() {
//     submitBtn.disabled = false
//     submitBtn.classList.remove('bg-gray-300', 'text-gray-500', 'cursor-not-allowed')
//     submitBtn.classList.add('bg-red-500', 'text-white', 'hover:bg-red-700', 'cursor-pointer')
// }

// switchMode('price')

let boxes = document.querySelectorAll('.openDealBox')
let dealBlock = document.getElementById('dealBlock')
let btnByPrice = document.getElementById('btnByPrice')
let btnByWeight = document.getElementById('btnByWeight')
let userInput = document.getElementById('userInput')
let inputUnit = document.getElementById('inputUnit')
let resultOutput = document.getElementById('resultOutput')
let resultUnit = document.getElementById('resultUnit')
let inputError = document.getElementById('inputError')
let submitBtn = document.getElementById('submitBtn')
let buyBox = document.getElementById('buyBox')
let sellBox = document.getElementById('sellBox')
let actionInp = document.getElementById('actionInp')
let calcBy = document.getElementById('calcBy')
let dealPopupTitle = document.getElementById('dealPopupTitle')
let goldPrice = document.getElementById('goldPrice')

let maxWeight = 200
let minWeight = 0.0001
let currentMode = 'price'
let currentAction = 'buy' // 'buy' یا 'sell'

goldPrice.value = pricePerGram

// تمیز کردن موجودی طلا (حذف کاما و تبدیل به عدد)
let cleanGoldBalance = parseFloat(userGoldBalance.toString().replace(/,/g, '')) || 0
let cleanWalletBalance = parseFloat(userWalletBalance.toString().replace(/,/g, '')) || 0

function closeBlock() {
    dealBlock.classList.add('invisible')
    dealBlock.classList.add('opacity-0')
    dealBlock.querySelector('#mainBlock').classList.remove('bottom-0')
    dealBlock.querySelector('#mainBlock').classList.add('-bottom-full')
    switchMode('price')
}

function openBlock(el) {
    if (el.id == 'buyBox') {
        dealPopupTitle.innerText = 'خرید آبشده نقدی'
        actionInp.value = 'buy'
        currentAction = 'buy'
    }
    if (el.id == 'sellBox') {
        dealPopupTitle.innerText = 'فروش آبشده نقدی'
        actionInp.value = 'sell'
        currentAction = 'sell'
    }
    dealBlock.classList.remove('invisible')
    dealBlock.classList.remove('opacity-0')
    dealBlock.querySelector('#mainBlock').classList.remove('-bottom-full')
    dealBlock.querySelector('#mainBlock').classList.add('bottom-0')
}

document.addEventListener('click', (e) => {
    if (!sellBox.contains(e.target) && !buyBox.contains(e.target) && !dealBlock.querySelector('#mainBlock').contains(e.target)) {
        closeBlock()
    }
})

function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function formatWeight(num) {
    // اگر عدد صحیح بود بدون اعشار نمایش بده
    if (Number.isInteger(num)) return num.toString()
    // در غیر این صورت تا 5 رقم اعشار نمایش بده (با حذف صفرهای اضافی)
    return parseFloat(num.toFixed(5)).toString()
}

function switchMode(mode) {
    currentMode = mode
    userInput.value = ''
    resultOutput.value = ''
    inputError.classList.add('hidden')
    userInput.classList.remove('border-brand-red')
    disableSubmitButton()

    if (mode === 'price') {
        btnByPrice.className =
            'flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 bg-white text-brand-red shadow-sm'
        btnByWeight.className =
            'flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 text-gray-500 hover:text-gray-700'
        calcBy.value = 'price'
        userInput.placeholder = 'مبلغ کل'
        inputUnit.innerText = 'ریال'
        resultOutput.placeholder = 'وزن (گرم)'
        resultUnit.innerText = 'گرم'
    } else {
        btnByWeight.className =
            'flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 bg-white text-brand-red shadow-sm'
        btnByPrice.className =
            'flex-1 py-2 text-sm font-medium rounded-lg transition-all duration-300 text-gray-500 hover:text-gray-700'
        calcBy.value = 'weight'
        userInput.placeholder = 'وزن (گرم)'
        inputUnit.innerText = 'گرم'
        resultOutput.placeholder = 'مبلغ کل'
        resultUnit.innerText = 'ریال'
    }
}

btnByPrice.addEventListener('click', () => switchMode('price'))
btnByWeight.addEventListener('click', () => switchMode('weight'))

userInput.addEventListener('input', function () {
    let value = parseFloat(this.value)

    inputError.classList.add('hidden')
    this.classList.remove('border-brand-red')

    if (isNaN(value) || value <= 0) {
        resultOutput.value = ''
        disableSubmitButton()
        return
    }

    // ---------------------------------------------------------
    // حالت اول: کاربر مبلغ را وارد کرده است
    // ---------------------------------------------------------
    if (currentMode === 'price') {
        let price = value

        // بررسی موجودی ریالی (در هر دو حالت خرید و فروش، کاربر باید پول کافی داشته باشد)
        // در فروش، کاربر پول را دریافت می‌کند، پس محدودیت موجودی ریالی معنی ندارد،
        // اما چون معمولاً کارمزد یا شرایط خاصی وجود دارد، اینجا چک نمی‌کنیم.
        // اما برای خرید، باید موجودی ریالی چک شود.
        if (currentAction === 'buy' && price > cleanWalletBalance) {
            showError('مبلغ وارد شده از موجودی کیف پول شما بیشتر است.')
            resultOutput.value = ''
            disableSubmitButton()
            return
        }

        let weight = price / pricePerGram

        // بررسی حداقل وزن
        if (weight < minWeight) {
            showError('مبلغ وارد شده بسیار کم است (کمتر از ۰.۰۰۰۱ گرم).')
            resultOutput.value = ''
            disableSubmitButton()
            return
        }

        // بررسی حداکثر وزن مجاز برای معامله
        if (weight > maxWeight) {
            weight = maxWeight
            this.value = maxWeight * pricePerGram
        }

        // **بررسی موجودی طلایی در حالت فروش**
        if (currentAction === 'sell' && weight > cleanGoldBalance) {
            showError('وزن محاسبه شده از موجودی طلایی سپرده شما بیشتر است.')
            resultOutput.value = ''
            disableSubmitButton()
            return
        }

        resultOutput.value = formatWeight(weight)
        enableSubmitButton()

    }
    // ---------------------------------------------------------
    // حالت دوم: کاربر وزن را وارد کرده است
    // ---------------------------------------------------------
    else {
        let weight = value

        // بررسی حداقل وزن
        if (weight < minWeight) {
            showError('حداقل وزن مجاز ۰.۰۰۰۱ گرم است.')
            resultOutput.value = ''
            disableSubmitButton()
            return
        }

        // بررسی حداکثر وزن مجاز
        if (weight > maxWeight) {
            weight = maxWeight
            this.value = maxWeight
        }

        let price = weight * pricePerGram

        // بررسی موجودی ریالی (فقط در حالت خرید)
        if (currentAction === 'buy' && price > cleanWalletBalance) {
            showError('مبلغ محاسبه شده از موجودی کیف پول شما بیشتر است.')
            resultOutput.value = ''
            disableSubmitButton()
            return
        }

        // **بررسی موجودی طلایی در حالت فروش**
        if (currentAction === 'sell' && weight > cleanGoldBalance) {
            showError('وزن وارد شده از موجودی طلایی سپرده شما بیشتر است.')
            resultOutput.value = ''
            disableSubmitButton()
            return
        }

        resultOutput.value = formatNumber(Math.round(price))
        enableSubmitButton()
    }
})

function showError(message) {
    inputError.innerText = message
    inputError.classList.remove('hidden')
    userInput.classList.add('border-brand-red')
}

function disableSubmitButton() {
    submitBtn.disabled = true
    submitBtn.classList.add('bg-gray-300', 'text-gray-500', 'cursor-not-allowed')
    submitBtn.classList.remove('bg-red-500', 'text-white', 'hover:bg-red-700', 'cursor-pointer')
}

function enableSubmitButton() {
    submitBtn.disabled = false
    submitBtn.classList.remove('bg-gray-300', 'text-gray-500', 'cursor-not-allowed')
    submitBtn.classList.add('bg-red-500', 'text-white', 'hover:bg-red-700', 'cursor-pointer')
}

switchMode('price')