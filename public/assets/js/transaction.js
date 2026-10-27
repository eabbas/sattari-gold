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
            bodyTable.innerHTML = ''
            data.forEach(row => {
                let parentRow = document.createElement('tr');
                parentRow.dataset.transactionId = row.id
                parentRow.classList = 'item_fayle text-xs lg:text-base'
                counter++
                let html = `
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        ${counter}
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                       ${row.fullName}
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${row.phoneNumber}
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        <div class="w-18 mx-auto px-2 py-1 rounded-lg border-2 border-[${row.typeColor}] text-[${row.typeColor}] text-center">
                            ${row.type}
                        </div>
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${row.amount.toLocaleString('fa-IR')}
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${row.deal ? row.deal.goldWeight : '-'}
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${row.time + ' | ' + row.date}
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        <span class="w-10 h-10 px-3 py-1 text-gray-600 rounded-md border-1 border-gray-600 p-1 cursor-pointer in-fa">
                            ${'100' + row.id}
                        </span>
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        <div class="mx-auto px-2 py-1 rounded-lg border-2 border-[${row.stateColor}] text-[${row.stateColor}] text-center">
                            ${row.stateTitle}
                        </div>
                    </td>
                    <td class="relative p-1 md:px-3 md:py-2 flex items-center gap-3">
                        <button onclick="showTransaction('${row.wallet.user.name + ' ' + row.wallet.user.family}', '${row.wallet.user.phoneNumber}', '${row.time + ' | ' + row.date}', '${row.stateColor}', '${row.stateTitle}', '${row.type}', '${row.amount}', '${row.isApproved}', '${row.id}', '${row.receipt}')" 
                        class="w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer">
                            مشاهده
                        </button>
                    </td>`
                parentRow.innerHTML = html
                bodyTable.append(parentRow)
            })
        },
        error: function () {
            console.log('error')
        }
    })
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

function showTransaction(user, phoneNumber, dateTime, stateColor, stateTitle, type, amount, isApproved, transactionId, receipt = null) {
    transactionPopup.classList.remove('invisible', 'opacity-0')
    transactionControl.classList.remove('hidden')
    transactionControl.dataset.transactionId = transactionId
    if (isApproved != 0) {
        transactionControl.classList.add('hidden')
    }
    document.getElementById('transactionPopupName').innerText = user
    document.getElementById('transactionPopupPhoneNumber').innerText = phoneNumber
    document.getElementById('transactionPopupDate').innerText = dateTime
    document.getElementById('transactionPopupStatus').innerText = stateTitle
    document.getElementById('transactionPopupStatus').classList.add('text-[' + stateColor + ']')
    document.getElementById('transactionPopupType').innerText = type
    document.getElementById('transactionPopupFee').innerText = amount
    let transactionPopupReceipt = document.getElementById('transactionPopupReceipt')
    if (type == 'واریز') {
        transactionPopupReceipt.classList.remove('hidden')
        transactionPopupReceipt.classList.add('flex')
        transactionPopupReceipt.children[0].src = imgPath + receipt
    } else {
        transactionPopupReceipt.classList.add('hidden')
        transactionPopupReceipt.classList.remove('flex')
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
})

function transactionAct(isApproved) {
    let transactionId = transactionControl.dataset.transactionId
    let rows = document.querySelector('tbody').querySelectorAll('tr')
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
      
                    let counter = row.children[0].innerText
                    row.innerHTML = `
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                            ${counter}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        ${response.fullName}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                            ${response.phoneNumber}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                            <div class="w-18 mx-auto px-2 py-1 rounded-lg border-2 border-[${response.typeColor}] text-[${response.typeColor}] text-center">
                                ${response.type}
                            </div>
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                            ${response.amount.toLocaleString('fa-IR')}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                            ${response.deal ? response.deal.goldWeight : '-'}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                            ${response.time + ' | ' + response.date}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                            <span class="w-10 h-10 px-3 py-1 text-gray-600 rounded-md border-1 border-gray-600 p-1 cursor-pointer in-fa">
                                ${'100' + response.id}
                            </span>
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                            <div class="mx-auto px-2 py-1 rounded-lg border-2 border-[${response.stateColor}] text-[${response.stateColor}] text-center">
                                ${response.stateTitle}
                            </div>
                        </td>
                        <td class="relative p-1 md:px-3 md:py-2 flex items-center gap-3">
                            <button onclick="showTransaction('${response.fullName}', '${response.wallet.user.phoneNumber}', '${response.time + ' | ' + response.date}', '${response.stateColor}', '${response.stateTitle}', '${response.type}', '${response.amount}', '${response.isApproved}', '${response.id}', '${response.receipt}')" 
                            class="w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer">
                                مشاهده
                            </button>
                        </td>
                        `
                    transactionPopup.classList.add('invisible', 'opacity-0')
                        
                }
            })
        },
        error: function () {
            console.log('failed to load data')
        }
    })
}

function sort(el){
    if(el.dataset.sort == 'desc'){
        el.querySelector('img').src = url+'assets/img/sort/asc.png'
        el.querySelector('p').innerText = 'صعودی'
        el.dataset.sort = 'asc'
        dealFilters.sortType = 'asc'
    }
    else{
        el.querySelector('img').src = url+'assets/img/sort/desc.png'
        el.querySelector('p').innerText = 'نزولی'
        el.dataset.sort = 'desc'
        dealFilters.sortType = 'desc'
    }
    applyDealFilters()
}