let dealFilters = {
    'fullName': null,
    'type': ['all'],
    'status': ['all'],
    'fromDate': null,
    'toDate': null,
    'price': null,
    'transactionId': null
};

let fullName = document.getElementById('fullName');
let fromDate = document.getElementById('fromDate');
let toDate = document.getElementById('toDate');
let status = document.getElementById('status');
let price = document.getElementById('price');
let transactionId = document.getElementById('transactionId');
let type = document.getElementById('type');

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

async function applyDealFilters() {
    await $.ajax({
        url: api + 'getTransactionFilter',
        type: "POST",
        dataType: "json",
        data: {
            'filters': dealFilters
        },
        success: function (data) {
            console.log(data);

            let counter = 0;
            let bodyTable = document.querySelector('tbody');
            bodyTable.innerHTML = '';

            data.forEach(row => {
                let parentRow = document.createElement('tr');
                parentRow.classList = 'item_fayle text-xs lg:text-base';
                counter++;

                let html = `
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        ${ counter }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                       ${ row.fullName }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ row.phoneNumber }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        <div class="w-18 mx-auto px-2 py-1 rounded-lg border-2 border-[${ row.typeColor }] text-[${ row.typeColor }] text-center">
                            ${ row.type }
                        </div>
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ row.amount.toLocaleString('fa-IR') }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ row.deal ? row.deal.goldWeight : '-' }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ row.time+' | '+row.date }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        <span class="w-10 h-10 px-3 py-1 text-gray-600 rounded-md border-1 bordre-gray-600 p-1 cursor-pointer in-fa">
                            ${ '100'+row.id }
                        </span>
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        <div class="mx-auto px-2 py-1 rounded-lg border-2 border-[${ row.stateColor }] text-[${ row.stateColor }] text-center">
                            ${ row.stateTitle }
                        </div>
                    </td>
                    <td class="relative p-1 md:px-3 md:py-2 flex items-center gap-3">
                        <button onclick="showTransaction('open', ${row})" class="w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer">
                            مشاهده
                        </button>
                    </td>
                `

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