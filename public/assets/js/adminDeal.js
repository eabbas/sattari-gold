let dealFilters = {
    'fullName': '',
    'dealType': 'all',
    'date': '',
    'weight': '',
    'price': '',
    'dealId': ''
}
let fullName = document.getElementById('fullName')
let date = document.getElementById('date')
let weight = document.getElementById('weight')
let price = document.getElementById('price')
let dealId = document.getElementById('dealId')

function setDatas(){
    dealFilters.fullName = fullName.value
    dealFilters.date = date.value
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
        },
        error: function () {
            console.log('error')
        }
    })
}