let dealFilters = {
    'fullName': null,
    'dealType': ['all'],
    'dealState': ['all'],
    'fromDate': null,
    'toDate': null,
    'weight': null,
    'price': null,
    'dealId': null,
    'sortType': 'desc',
}

let fullName = document.getElementById('fullName')
let fromDate = document.getElementById('fromDate')
let toDate = document.getElementById('toDate')
let weight = document.getElementById('weight')
let price = document.getElementById('price')
let dealId = document.getElementById('dealId')

// function applyDealFilters() {
//     $.ajax({
//         url: api + 'getDealFilter',
//         type: "POST",
//         dataType: "json",
//         data: {
//             'filters': dealFilters
//         },
//         success: function (data) {
//             console.log(data)
//             let counter = 0;
//             let bodyTable = document.querySelector('tbody')
//             bodyTable.innerHTML = ''
//             data.forEach(row=>{
//                 let parentRow = document.createElement('tr')
//                 parentRow.classList = 'item_fayle text-xs lg:text-base'
//                 counter++
//                 let html = `
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
//                         ${ counter }
//                     </td>
//                     <td class="p-1 md:px-3 md:py-2 flex items-center justify-around">
//                         <div class="w-18 px-2 py-1 ${ row.transaction.type == 'sell' ? ' border-2 border-(--color-danger) text-(--color-danger) ' : ' border-2 border-(--color-success) text-(--color-success) ' } rounded-lg text-center">
//                         ${ row.transaction.type == 'sell' ? 'فروش' : 'خرید' }
//                         </div>
//                         <div class="w-fit">
//                         ${ row.user.name+' '+row.user.family }
//                         </div>
//                     </td>
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center">
//                         شمش نقره
//                     </td>
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
//                         ${ row.goldWeight } گرم
//                     </td>
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
//                         ${ Math.floor(row.goldPrice).toLocaleString('fa-IR') }
//                     </td>
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
//                         ${ row.buyPrice ? row.buyPrice.toLocaleString('fa-IR') : '-' }
//                     </td>
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
//                         ${ row.message ? row.message : '-' }
//                     </td>
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center">
//                         <span class="px-3 py-1.5 text-(--color-warning) rounded-md border-1 border-(--color-warning) p-1 cursor-pointer in-fa">
//                             ${ '100'+row.id }
//                         </span>
//                     </td>
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center">
//                         <span class="w-5/12 text-right in-fa">${ row.time }</span>
//                         <span class="w-2/12 text-right mx-2">|</span>
//                         <span class="w-5/12 text-left in-fa">${ row.date }</span>
//                     </td>
//                     <td class="border-1border-(--color-border) p-1 md:px-3 md:py-2 text-center">
//                         <span class="px-3 py-1.5 bg-[${ row.color}]/20 text-[${ row.color }] rounded-md border-1 border-[${ row.color }] p-1 cursor-default">
//                         ${ row.state }
//                         </span>
//                     </td>`
//                 parentRow.innerHTML = html
//                 bodyTable.append(parentRow)
//             })
//         },
//         error: function () {
//             console.log('error')
//         }
//     })
// }


function escapeHtml(value) {
    return String(value ?? '').replace(/[&<>"']/g, char => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    })[char]);
}

function applyDealFilters() {

    $.ajax({
        url: api + 'getDealFilter',
        type: "POST",
        dataType: "json",

        data: {
            'filters': dealFilters
        },

        success: function (data) {

            console.log(data);

            let counter = 0;
            const bodyTable = document.getElementById('dealsTableBody');

            if (!bodyTable) return;

            bodyTable.innerHTML = '';

            data.forEach(row => {
                if(!row.user) return
                counter++;

                const parentRow = document.createElement('tr');

                parentRow.className = 'item_fayle text-center text-[#29251F] text-xs lg:text-sm transition-colors hover:bg-[#F8F5EF]/70';

                const transactionType = row.transaction.type;
                const isSell = transactionType === 'sell';

                const transactionClass = isSell
                    ? 'border border-red-200 bg-red-50 text-red-700'
                    : 'border border-green-200 bg-green-50 text-green-700';

                const transactionText = isSell ? 'فروش' : 'خرید';

                const color = /^#[0-9A-Fa-f]{6}$/.test(row.color)
                    ? row.color
                    : '#78716C';

                const stateStyle = `
                    background-color: ${color}20;
                    color: ${color};
                    border-color: ${color};
                `;

                const html = `
                    <td class="border border-[#E7E2D9] px-3 py-3 text-center text-[#78716C] in-fa">
                        ${counter}
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3">
                        <div class="flex items-center justify-center gap-3">

                            <span class="min-w-16 rounded-lg px-2 py-1 text-[10px] font-bold ${transactionClass}">
                                ${transactionText}
                            </span>

                            <span class="font-semibold whitespace-nowrap">
                                ${row.user.name + " " + row.user.family}
                            </span>

                        </div>
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3">
                        شمش نقره
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3 in-fa">
                        ${escapeHtml(row.goldWeight)} گرم
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3 font-medium in-fa">
                        ${Math.floor(Number(row.goldPrice)).toLocaleString('fa-IR')}
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3 font-bold in-fa">
                        ${row.buyPrice ? Number(row.buyPrice).toLocaleString('fa-IR') : '-'}
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3 text-red-600 in-fa">
                        ${escapeHtml(row.message || '-')}
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3">
                        <span class="inline-flex rounded-lg border border-[#D6AD60]/50 bg-[#D6AD60]/10 px-3 py-1.5 font-semibold text-[#B88A3B] in-fa">
                            ${'100' + row.id}
                        </span>
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3 whitespace-nowrap">
                        <span class="in-fa">${escapeHtml(row.time)}</span>
                        <span class="mx-2 text-[#D6AD60]">|</span>
                        <span class="in-fa">${escapeHtml(row.date)}</span>
                    </td>

                    <td class="border border-[#E7E2D9] px-3 py-3">
                        <span
                            style="${stateStyle}"
                            class="inline-flex rounded-lg border px-3 py-1.5 font-semibold whitespace-nowrap">
                            ${escapeHtml(row.state)}
                        </span>
                    </td>
                `;

                parentRow.innerHTML = html;

                bodyTable.appendChild(parentRow);
            });
        },

        error: function (xhr) {
            console.log('خطا در دریافت معاملات:', xhr);
        }
    });
}


// مقداردهی اولیه بعد از لود شدن MultiSelect
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        const dealTypeSelect = document.getElementById('dealType')
        const dealTypeMs = dealTypeSelect ? dealTypeSelect._multiSelect : null
        if (dealTypeMs) {
            dealFilters.dealType = dealTypeMs.getFilterValues()
        }
    }, 100)
    setTimeout(function () {
        const dealStateSelect = document.getElementById('dealState')
        const dealStateMs = dealStateSelect ? dealStateSelect._multiSelect : null
        if (dealStateMs) {
            dealFilters.dealState = dealStateMs.getFilterValues()
        }
    }, 100);
})

function setDatas() {
    dealFilters.fullName = fullName.value;
    dealFilters.fromDate = fromDate.value;
    dealFilters.toDate = toDate.value;
    dealFilters.weight = weight.value;
    dealFilters.price = price.value;
    dealFilters.dealId = dealId.value;

    const dealTypeSelect = document.getElementById('dealType');
    const dealTypeMs = dealTypeSelect ? dealTypeSelect._multiSelect : null
    if (dealTypeMs) {
        dealFilters.dealType = dealTypeMs.getFilterValues()
    }
    
    const dealStateSelect = document.getElementById('dealState')
    const dealStateMs = dealStateSelect ? dealStateSelect._multiSelect : null
    if (dealStateMs) {
        dealFilters.dealState = dealStateMs.getFilterValues()
    }
    applyDealFilters()
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
    setDatas()
}