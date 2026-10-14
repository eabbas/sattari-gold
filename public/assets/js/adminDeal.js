let dealFilters = {
    'fullName': null,
    'dealType': ['all'],
    'fromDate': null,
    'toDate': null,
    'weight': null,
    'price': null,
    'dealId': null
}

let fullName = document.getElementById('fullName')
let fromDate = document.getElementById('fromDate')
let toDate = document.getElementById('toDate')
let weight = document.getElementById('weight')
let price = document.getElementById('price')
let dealId = document.getElementById('dealId')

function setDatas(){
    dealFilters.fullName = fullName.value
    dealFilters.fromDate = fromDate.value
    dealFilters.toDate = toDate.value
    dealFilters.weight = weight.value
    dealFilters.price = price.value
    dealFilters.dealId = dealId.value
    applyDealFilters()
}

async function applyDealFilters() {
    await $.ajax({
        url: api + 'getDealFilter',
        type: "POST",
        dataType: "json",
        data: {
            'filters': dealFilters
        },
        success: function (data) {
            console.log(data)
            let counter = 0;
            let bodyTable = document.querySelector('tbody')
            bodyTable.innerHTML = ''
            data.deals.forEach(row=>{
                let parentRow = document.createElement('tr')
                parentRow.classList = 'item_fayle text-xs lg:text-base'
                counter++
                let html = `
                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ counter }
                    </td>
                    <td class="p-1 md:px-3 md:py-2 flex items-center justify-around">
                        <div class="w-18 px-2 py-1 ${ row.transaction.type == 'sell' ? ' bg-(--danger-dashbrd)/30 text-(--danger-dashbrd) ' : ' bg-(--primary-dashbrd)/30 text-(--primary-dashbrd) ' } text-center">
                        ${ row.transaction.type == 'sell' ? 'فروشنده' : 'خریدار' }
                        </div>
                        <div class="w-fit">
                        ${ row.user.name+' '+row.user.family }
                        </div>
                    </td>
                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                        شمش نقره
                    </td>
                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ row.goldWeight } گرم
                    </td>
                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ row.goldPrice }
                    </td>
                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ row.buyPrice ? row.buyPrice : '-' }
                    </td>
                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                    <span class="w-10 h-10 text-(--danger-dashbrd) rounded-md border-1 bordre-(--danger-dashbrd) p-1 cursor-pointer in-fa">
                            ${ '100'+row.id }
                        </span>
                    </td>
                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                        <span class="w-5/12 text-right in-fa">${ row.time }</span>
                        <span class="w-2/12 text-right mx-2">|</span>
                        <span class="w-5/12 text-left in-fa">${ row.date }</span>
                    </td>
                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                        <span class="w-10 h-10 bg-[${ row.color}]/20 text-[${ row.color }] rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                        ${ row.state }
                        </span>
                    </td>
                    <td class="relative p-1 md:px-3 md:py-2 flex items-center justify-center gap-3">
                        <button class="open-popup-fayle w-fit text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md p-1 cursor-pointer text-center">
                            <svg class="size-5 fill-(--primary-dashbrd)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z"></path>
                            </svg>
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