let dealFilters = {
    'fullName': null,
    'type': ['all'],
    'status': ['all'],
    'fromDate': null,
    'toDate': null,
    'price': null,
    'transactionId': null,
    'sortType': 'desc'
}

let fullName = document.getElementById('fullName')
let fromDate = document.getElementById('fromDate')
let toDate = document.getElementById('toDate')
let status = document.getElementById('status')
let price = document.getElementById('price')
let transactionId = document.getElementById('transactionId')
let type = document.getElementById('type')
let transactionControl = document.getElementById('transactionControl')
let showImg = document.getElementById('showImg')
let cardNumber = document.getElementById('cardNumber')
let shabaNumber = document.getElementById('shabaNumber')

let transactionPopup = document.getElementById('transaction')
let closeBtn = document.getElementById('closeBtn')
let openPopup = document.querySelectorAll('.openPopup')

function setDatas() {
    dealFilters.fullName = fullName.value || null;
    dealFilters.fromDate = fromDate.value || null;
    dealFilters.toDate = toDate.value || null;
    dealFilters.price = price.value || null;
    dealFilters.transactionId = transactionId.value || null;

    // استفاده از getFilterValues برای MultiSelect
    const typeMs = type ? type._multiSelect : null;
    if (typeMs) {
        dealFilters.type = typeMs.getFilterValues();
    }

    const statusMs = status ? status._multiSelect : null;
    if (statusMs) {
        dealFilters.status = statusMs.getFilterValues();
    }

    applyDealFilters();
}

function applyDealFilters() {
    $.ajax({
        url: api + 'getTransactionFilter',
        type: "POST",
        dataType: "json",
        data: {
            'filters': dealFilters
        },
        success: function (data) {

            let counter = 0;
            let bodyTable = document.querySelector('tbody');

            bodyTable.innerHTML = '';

            data.forEach(row => {
                let parentRow = document.createElement('tr');

                parentRow.dataset.transactionId = row.id;
                parentRow.className = 'item_fayle text-xs lg:text-sm bg-white text-[#29251F] text-center transition-colors duration-200 hover:bg-[#FAF7F1]';

                counter++;

                let html = `
                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] in-fa">
                        ${counter}
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center font-bold text-[#29251F]">
                        ${row.fullName}
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] in-fa">
                        ${row.phoneNumber}
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                        <div
                            class="w-20 mx-auto px-2 py-1.5 rounded-lg border text-center text-xs font-bold"
                            style="color: ${row.typeColor}; border-color: ${row.typeColor}; background-color: ${row.typeColor}12;"
                        >
                            ${row.type}
                        </div>
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center font-bold text-[#29251F] in-fa">
                        ${row.amount.toLocaleString('fa-IR')}
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] in-fa">
                        ${row.deal ? row.deal.goldWeight : '-'}
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] whitespace-nowrap in-fa">
                        ${row.time + ' | ' + row.date}
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                        <span class="inline-block px-3 py-1.5 rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] text-[#B88A3B] font-bold text-xs in-fa">
                            ${'100' + row.id}
                        </span>
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                        <div
                            class="min-w-20 mx-auto px-2 py-1.5 rounded-lg border text-center text-xs font-bold"
                            style="border-color: ${row.stateColor}; color: ${row.stateColor}; background-color: #F8F5EF;"
                        >
                            ${row.stateTitle}
                        </div>
                    </td>

                    <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                        <button
                            onclick="showTransaction('${row.wallet.user.name + ' ' + row.wallet.user.family}', '${row.wallet.user.phoneNumber}', '${row.time + ' | ' + row.date}', '${row.stateColor}', '${row.stateTitle}', '${row.type}', '${row.amount}', '${row.isApproved}', '${row.id}', '${row.card == undefined ? 'هنوز شماره کارت وارد نشده' : row.card}', '${row.shaba == undefined ? 'هنوز شماره شبا وارد نشده' : row.shaba}', '${row.receipt}')"
                            class="w-full min-w-20 px-3 py-2 rounded-lg border border-[#D6AD60] bg-[#F8F5EF] text-[#B88A3B] font-bold hover:bg-[#B88A3B] hover:text-white transition-all duration-200 cursor-pointer"
                        >
                            مشاهده
                        </button>
                    </td>
                `;

                parentRow.innerHTML = html;
                bodyTable.append(parentRow);
            });
        },
        error: function () {
            console.log('error');
        }
    });
}


document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        const typeMs = type ? type._multiSelect : null
        if (typeMs) {
            dealFilters.type = typeMs.getFilterValues()
        }

        const statusMs = status ? status._multiSelect : null
        if (statusMs) {
            dealFilters.status = statusMs.getFilterValues()
        }

    }, 100)
})

function showTransaction(user, phoneNumber, dateTime, stateColor, stateTitle, type, amount, isApproved, transactionId, card, shaba, receipt = null) {

    transactionPopup.classList.remove('invisible', 'opacity-0');

    transactionControl.dataset.transactionId = transactionId;

    let transactionActions = document.getElementById('transactionActions');
    let transactionDealMessage = document.getElementById('transactionDealMessage');

    transactionActions.classList.remove('hidden');
    transactionDealMessage.classList.add('hidden');

    if (isApproved != 0) {
        transactionActions.classList.add('hidden');
    } else if (type == 'خرید' || type == 'فروش') {
        transactionActions.classList.add('hidden');
        transactionDealMessage.classList.remove('hidden');
    }

    document.getElementById('transactionPopupName').innerText = user;
    document.getElementById('transactionPopupPhoneNumber').innerText = phoneNumber;
    document.getElementById('transactionPopupDate').innerText = dateTime;
    document.getElementById('transactionPopupStatus').innerText = stateTitle;
    document.getElementById('transactionPopupStatus').classList.add('text-[' + stateColor + ']');
    document.getElementById('transactionPopupType').innerText = type;
    document.getElementById('transactionPopupFee').innerText = parseInt(amount).toLocaleString('fa-IR');

    cardNumber.innerText = card !== "" ? card : 'هنوز شماره کارت وارد نشده';
    shabaNumber.innerText = shaba !== "" ? shaba : 'هنوز شماره شبا وارد نشده';

    let transactionPopupReceipt = document.getElementById('transactionPopupReceipt');

    if (type == 'واریز') {
        transactionPopupReceipt.classList.remove('hidden');
        transactionPopupReceipt.classList.add('flex');
        transactionPopupReceipt.querySelector('img').src = imgPath + receipt;
    } else {
        transactionPopupReceipt.classList.add('hidden');
        transactionPopupReceipt.classList.remove('flex');
    }
}

document.addEventListener('click', (e) => {
    let openPopup = document.querySelectorAll('.openPopup')
    let clickedOnOpenBtn = false
    openPopup.forEach(btn => {
        if (btn.contains(e.target)) {
            clickedOnOpenBtn = true
        }
    })
    if (clickedOnOpenBtn) return
    if (!transactionPopup || !closeBtn) return
    let clickedInsidePopup = transactionPopup.children[0].contains(e.target)
    let clickedOnCloseBtn = closeBtn.contains(e.target)
    if (clickedOnCloseBtn || clickedInsidePopup) {
        transactionPopup.classList.add('invisible', 'opacity-0')
    }
    if (!showImg.children[0].children[0].contains(e.target) && !document.getElementById('transactionPopupReceipt').querySelector('img').contains(e.target)) {
        closeZoom()
    }

})


function transactionAct(isApproved) {
    let transactionId = transactionControl.dataset.transactionId;
    let rows = document.querySelector('tbody').querySelectorAll('tr');

    $.ajax({
        url: api + 'submitChanges',
        type: "POST",
        dataType: "json",
        data: {
            'transactionId': transactionId,
            'isApproved': isApproved
        },
        success: function (response) {
            rows.forEach(row => {
                if (response.id == row.dataset.transactionId) {

                    let counter = row.children[0].innerText;

                    row.innerHTML = `
                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] in-fa">
                            ${counter}
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center font-bold text-[#29251F]">
                            ${response.fullName}
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] in-fa">
                            ${response.phoneNumber}
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                            <div
                                class="w-20 mx-auto px-2 py-1.5 rounded-lg border text-center text-xs font-bold"
                                style="color: ${response.typeColor}; border-color: ${response.typeColor}; background-color: ${response.typeColor}12;"
                            >
                                ${response.type}
                            </div>
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center font-bold text-[#29251F] in-fa">
                            ${response.amount.toLocaleString('fa-IR')}
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] in-fa">
                            ${response.deal ? response.deal.goldWeight : '-'}
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center text-[#78716C] whitespace-nowrap in-fa">
                            ${response.time + ' | ' + response.date}
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                            <span class="inline-block px-3 py-1.5 rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] text-[#B88A3B] font-bold text-xs in-fa">
                                ${'100' + response.id}
                            </span>
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                            <div
                                class="min-w-20 mx-auto px-2 py-1.5 rounded-lg border text-center text-xs font-bold"
                                style="border-color: ${response.stateColor}; color: ${response.stateColor}; background-color: #F8F5EF;"
                            >
                                ${response.stateTitle}
                            </div>
                        </td>

                        <td class="border-b border-[#E7E2D9] p-2 md:px-3 md:py-3 text-center">
                            <button
                                onclick="showTransaction('${response.fullName}', '${response.wallet.user.phoneNumber}', '${response.time + ' | ' + response.date}', '${response.stateColor}', '${response.stateTitle}', '${response.type}', '${response.amount}', '${response.isApproved}', '${response.id}', '${response.card == undefined ? 'هنوز شماره کارت وارد نشده' : response.card}', '${response.shaba == undefined ? 'هنوز شماره شبا وارد نشده' : response.shaba}', '${response.receipt}')"
                                class="w-full min-w-20 px-3 py-2 rounded-lg border border-[#D6AD60] bg-[#F8F5EF] text-[#B88A3B] font-bold hover:bg-[#B88A3B] hover:text-white transition-all duration-200 cursor-pointer"
                            >
                                مشاهده
                            </button>
                        </td>
                    `;

                    row.className = 'item_fayle text-xs lg:text-sm bg-white text-[#29251F] text-center transition-colors duration-200 hover:bg-[#FAF7F1]';

                    transactionPopup.classList.add('invisible', 'opacity-0');
                }
            });
        },
        error: function () {
            alert('failed to load data');
        }
    });
}


function sort(el) {
    if (el.dataset.sort == 'desc') {
        el.querySelector('img').src = url + 'assets/img/sort/asc.png'
        el.querySelector('p').innerText = 'قدیمی به جدید'
        el.dataset.sort = 'asc'
        dealFilters.sortType = 'asc'
    }
    else {
        el.querySelector('img').src = url + 'assets/img/sort/desc.png'
        el.querySelector('p').innerText = 'جدید به قدیمی'
        el.dataset.sort = 'desc'
        dealFilters.sortType = 'desc'
    }
    applyDealFilters()
}

function showImage(el) {
    showImg.classList.remove('invisible', 'opacity-0')
    showImg.querySelector('img').src = el.src
}

function closeZoom() {
    showImg.classList.add('invisible', 'opacity-0')
}

