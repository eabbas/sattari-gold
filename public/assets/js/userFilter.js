let userFilter = {
    'name': false,
    'family': false,
    'phoneNumber': false,
    'nationalCode': false,
    'activity': ['all'],
    'approve': ['all'],
    'sortType': 'desc',
}

let filter_name = document.getElementById('filter-name')
let filter_family = document.getElementById('filter-family')
let filter_phoneNumber = document.getElementById('filter-phoneNumber')
let filter_nationalCode = document.getElementById('filter-nationalCode')
let filter_activity = document.getElementById('filter-activity')
let filter_approve = document.getElementById('filter-approve')
confirmed = document.getElementById('confirmed')
pending = document.getElementById('pending')

function setDatas() {
    userFilter.name = filter_name.value
    userFilter.family = filter_family.value
    userFilter.phoneNumber = filter_phoneNumber.value
    userFilter.nationalCode = filter_nationalCode.value

    const activitySelect = document.getElementById('filter-activity');
    const activityMs = activitySelect ? activitySelect._multiSelect : null;
    if (activityMs) {
        userFilter.activity = activityMs.getFilterValues();
    }

    const approveSelect = document.getElementById('filter-approve');
    const approveMs = approveSelect ? approveSelect._multiSelect : null;
    if (approveMs) {
        userFilter.approve = approveMs.getFilterValues();
    }

    applyuserFilter();
}


document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        const activitySelect = document.getElementById('filter-activity');
        const activityMs = activitySelect ? activitySelect._multiSelect : null;
        if (activityMs) {
            userFilter.activity = activityMs.getFilterValues();
        }
    }, 100);
    setTimeout(function () {
        const approveSelect = document.getElementById('filter-approve');
        const approveMs = approveSelect ? approveSelect._multiSelect : null;
        if (approveMs) {
            userFilter.approve = approveMs.getFilterValues();
        }
    }, 100);
});

function applyuserFilter(){
    loader('open')
    $.ajax({
        url: api +'getUserFilter',
        type: "POST",
        dataType: "json",
        data: {
            'filters': userFilter
        },
        success: function(data){
            console.log(data)
            confirmed.querySelector('tbody').innerHTML = ""
            pending.querySelector('tbody').innerHTML = ""
            loader('close')
            let i = 0
            let j = 0
            data.users.forEach(user=>{
                i++
                if(user.isApproved==1){
                    console.log(1)
                    let tr = document.createElement('tr')
                    
                    tr.classList = 'item_list text-xs lg:text-base approvedUsers'
                    tr.dataset.userId = user.id
          
                    let html = `
                        <td class="p-1 md:px-3 md:py-2 flex items-center justify-center gap-2 in-fa">
                            <input type="checkbox" name=""
                                class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                            ${i}
                        </td>
                        <td
                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center fullNameList">
                            ${user.name + ' ' + user.family}
                        </td>
                        <td
                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa phoneNumberList">
                            ${user.phoneNumber}
                        </td>
                        <td
                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                            -
                        </td>
                        <td
                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                            -
                        </td>
                        <td
                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa nationalCodeList">
                            ${user.nationalCode}
                        </td>
                        <td
                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                            -
                        </td>
                        <td
                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center isActiveList">
                            `
                                if(user.isActive){
                                    html+=`
                                    <span
                                        class="w-10 h-10 bg-(--primary-dashboard)/20 text-(--primary-dashboard) rounded-md border-1 border-(--primary-dashboard) p-1 cursor-default">
                                        فعال
                                    </span>`
                                } else {
                                    html+=`
                                    <span
                                        class="w-10 h-10 bg-(--color-danger)/20 text-(--color-danger) rounded-md border-1 border-(--color-danger) p-1 cursor-default">
                                        غیرفعال
                                    </span>`
                                }
                        html+=`</td>
                        <td
                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                            قلک طلا
                        </td>
                        <td class="relative p-1 md:px-3 md:py-2 grid grid-cols-2 gap-3">
                            <button onclick="wallet(this, 'open', ${user.id})"
                                class="w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer walletBtn">
                                کیف پول
                            </button>
                            <div id=""
                                class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center popup-wallet">
                                <div onclick="wallet(this, 'close')"
                                    class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2 cursour-pointer">
                                </div>

                                <div class="px-3 py-2 w-2/3 mx-auto bg-white relative z-51 rounded-md max-h-[500px] overflow-y-auto">
                                   
                                    <div>
                                      
                                        <div class="grid grid-cols-6 gap-5 mt-5">
                                            <div
                                                class="col-span-6 flex flex-col md:flex-row items-center border-1 border-(--border-dashboard) rounded-lg md:divide-x-1 divide-(--border-dashboard) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                <div class="w-full md:w-6/12">
                                                    <span
                                                        class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام
                                                        :</span>
                                                    <span
                                                        class="text-xs md:text-base font-bold fullName"></span>
                                                </div>
                                                <div class="w-full md:w-6/12">
                                                    <span
                                                        class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره
                                                        :</span>
                                                    <span
                                                        class="text-[10px] md:text-base font-bold in-fa phoneNumber"></span>
                                                </div>
                                            </div>
                                            <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                <div
                                                    class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-3 pb-2">
                                                            <span class="">
                                                                <svg class="size-5 fill-(--primary-dashboard)"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 576 512">
                                                                    <path
                                                                        d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z" />
                                                                </svg>
                                                            </span>
                                                            <span
                                                                class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                                                موجودی ریال
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pb-2 in-fa moneyAsset">

                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-3 pt-2">
                                                            <span
                                                                class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                                موجودی قابل برداشت
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pt-2">
                                                            <span id="withdrawableBalance"
                                                                data-balance="${user.wallet.asset ?? 0}"
                                                                class="in-fa takebleMoneyAsset"></span>
                                                            <span
                                                                class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                                تومان
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                <div
                                                    class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-2 pb-2">
                                                            <span class="">
                                                                <svg height="30px" width="30px"
                                                                    version="1.1" id="Layer_1"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    viewBox="0 0 511.882 511.882"
                                                                    xml:space="preserve">
                                                                    <polygon style="fill:#F6BB42;"
                                                                        points="350.216,176.572 278.374,158.615 37.038,264.123 0,338.207 125.753,374.324 386.13,258.531 " />
                                                                    <polygon style="fill:#FFCE54;"
                                                                        points="350.216,176.572 107.756,284.345 125.753,374.324 386.13,258.531 " />
                                                                    <polygon style="fill:#E8AA3D;"
                                                                        points="107.756,284.345 37.038,264.123 0.015,338.207 125.753,374.324 " />
                                                                    <polygon style="fill:#F6BB42;"
                                                                        points="475.969,212.682 404.127,194.717 162.791,300.232 125.753,374.324 251.504,410.41 511.882,294.625 " />
                                                                    <polygon style="fill:#FFCE54;"
                                                                        points="475.969,212.682 233.508,320.431 251.504,410.41 511.882,294.625 " />
                                                                    <polygon style="fill:#E8AA3D;"
                                                                        points="233.508,320.431 162.791,300.232 125.753,374.324 251.504,410.41 " />
                                                                    <polygon style="fill:#F6BB42;"
                                                                        points="396.316,119.429 324.488,101.473 103.867,198.435 66.843,272.519 192.596,308.621 432.245,201.379 " />
                                                                    <polygon style="fill:#FFCE54;"
                                                                        points="396.316,119.429 174.6,218.641 192.596,308.621 432.245,201.379 " />
                                                                    <polygon style="fill:#E8AA3D;"
                                                                        points="174.6,218.641 103.867,198.435 66.843,272.519 192.596,308.621 " />
                                                                </svg>
                                                            </span>
                                                            <span
                                                                class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                                                موجودی طلا
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pb-2 in-fa goldAsset">

                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-3 pt-2">
                                                            <span
                                                                class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                                موجودی قابل برداشت
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pt-2">
                                                            <span
                                                                class="in-fa">${user.wallet.goldWeight}</span>
                                                            <span
                                                                class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                                گرم
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-3 pt-2">
                                                            <span
                                                                class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                                ارزش دارایی شما
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pt-2">
                                                            <span
                                                           
                                                                class="in-fa takebleGoldAsset"></span>
                                                            <span
                                                                class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                                تومان
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-6">
                                                <div
                                                    class="flex items-center border-1 border-(--border-dashboard) rounded-lg divide-x-1 divide-(--border-dashboard) px-2 py-3 gap-2">
                                                    <div class="w-6/12">
                                                        <label for="deposit"
                                                            class="flex items-center gap-1 md:gap-3">
                                                            <input
                                                                class="accent-(--primary-dashboard) size-4 md:size-5 deposit"
                                                                type="radio" name="transactionType${user.id}"
                                                                value="deposit" id="deposit"
                                                                onclick="transactionMethod('deposit',this, ${user.id})">
                                                            <span
                                                                class="text-xs text-green-400 md:text-base font-bold">واریز</span>
                                                        </label>
                                                        <span class="text-xs text-red-400"></span>
                                                    </div>
                                                    <div class="w-6/12">
                                                        <label for="withdraw${user.id}"
                                                            class="flex items-center gap-1 md:gap-3">
                                                            <input
                                                                class="accent-(--primary-dashboard) size-4 md:size-5 withdraw"
                                                                type="radio" name="transactionType${user.id}"
                                                                value="withdraw" id="withdraw"
                                                                onclick="transactionMethod('withdraw',this, ${user.id})">
                                                            <span
                                                                class="text-xs text-red-400 md:text-base font-bold">برداشت</span>
                                                        </label>
                                                        <span class="text-xs text-red-400"></span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div id="transactionMethod${user.id}"
                                                class="col-span-6 grid grid-cols-6 gap-4">
                                            
                                            </div>
                                            <button type="submit"
                                                class="col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold cursor-pointer submitWallet" onclick="submitWallet(this)">ثبت</button>
                                            <button type="reset"
                                                class="col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold cursor-pointer closeWalletBtn" onclick="closeWalletBtn(this)">
                                                لغو</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button
                                class="open-popup-edited w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-1 py-2 cursor-pointer flex items-center justify-center" onclick="openEditPopup(this)">
                                <svg class="size-5" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                </svg>
                            </button>
                            <div
                                class="popup-edit fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                <div
                                    class="close-popup-edit2 absolute z-9 w-full h-[100dvh] left-1/2 -translate-x-1/2">
                                </div>
                                <div
                                    class="relative z-51 w-[80%] md:w-200 bg-white rounded-md px-3 py-2 transition-all duration-300 detailBox">
                                    <div
                                        class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                        <div class="text-sm md:text-base font-bold text-nowrap">ویرایش
                                            اطلاعات مشتری</div>
                                        <svg class="size-6 cursor-pointer close-popup-look-cont" onclick="closeEditUser(this)"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path
                                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="grid grid-cols-2 md:grid-cols-6 gap-5 mt-5">
                                        <div class="col-span-1 md:col-span-3 text-start">
                                            نام
                                            <input
                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) name"
                                                type="text" name="" id="">
                                        </div>
                                        <div class="col-span-1 md:col-span-3 text-start">
                                            نام خانوادگی
                                            <input
                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) family"
                                                type="text" style="font-family: 'IRANSansX';"
                                                name="" id="">
                                        </div>
                                        <div class="col-span-1 md:col-span-3 text-start">
                                            کد ملی
                                            <input
                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa nationalCode"
                                                type="text" name="" dir="ltr"
                                                id="">
                                        </div>
                                        <div class="col-span-1 md:col-span-3 text-start">
                                            شماره تلفن
                                            <input
                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa phoneNumberEd"
                                                type="text" name="" dir="ltr"
                                                id="">
                                        </div>
                                        <div class="col-span-1 md:col-span-2 text-start">
                                            وضعیت تایید
                                            <select
                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) isApproved"
                                                name="" id="">
                                                <option value="0">در انتظار</option>
                                                <option value="1">تایید</option>
                                                <option value="-1">رد</option>
                                            </select>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 text-start">
                                            نقش
                                            <select
                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) roles"
                                                name="" id="" multiple
                                                size="1">`
                                            
                                                    data.roles.forEach(role => {
                                                        let isSelected = user.roleArr.includes(role.id) ? 'selected' : ''
                                                        html += `<option value="${role.id}" ${isSelected}>${role.faTitle}</option>`
                                                    })
                                              
                                            html+=`</select>
                                        </div>

                                        <div
                                            class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-2 flex items-center justify-between w-full py-2 px-4 mt-[30px]">
                                            <div class="w-full flex justify-between items-center">
                                                <label for="AisActive${user.id}"
                                                    class="w-[calc(100%-50px)] text-start cursor-pointer">فعال
                                                    : </label>
                                                <label for="AisActive${user.id}"
                                                    class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                                    <input type="checkbox" name="isActive"
                                                        value="1"
                                                        id="AisActive${user.id}"
                                                        hidden="" class="peer cursor-pointer">
                                                    <span
                                                        class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                                    <span
                                                        class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <button
                                            class="col-span-1 md:col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold submitBtn cursor-pointer transition-all duration-300 hover:bg-(--primary-dashboard) hover:text-white" onclick="submitEditUser(this)">ثبت</button>
                                        <button
                                            class="col-span-1 md:col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold closeBtn cursor-pointer transition-all duration-300 hover:bg-(--danger-dashboard) hover:text-white" onclick="closeEditUser(this)">لغو</button>
                                    </div>
                                </div>
                            </div>
                        </td>`
                    tr.innerHTML = html
                    confirmed.querySelector('tbody').append(tr)
                }
                if(user.isApproved==0) {
                    console.log(0)
                    
                    let tr = document.createElement('tr')
                    tr.classList = 'item_2 text-xs lg:text-base'
                    tr.dataset.userId = user.id
                    j++
                    let html = `
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap">
                            ${j}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap">
                            ${user.name+' '+user.family}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                            ${user.phoneNumber}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                            ${user.nationalCode}
                        </td>
                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                            ${user.created_at}                            
                        </td>
                        <td class="relative border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center flex items-center gap-3">
                            <button onclick="popupLookCont(this)" class="open-look-cont w-3/6 bg-(--primary-dashboard) text-white rounded-md px-3 py-2 cursor-pointer text-nowrap">
                                تایید و بازبینی
                            </button>
                            <div class="popup-look-cont fixed z-50 w-full h-dvh top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">

                                <div onclick="closePopupLookCont2(this)" class="close-popup-look-cont2 absolute z-49 w-full h-dvh bg-black/50 left-1/2 -translate-x-1/2">
                                </div>
                                <div class="relative z-51 w-[80%] md:w-200 bg-white rounded-md px-3 py-2 invisible opacity-0 transition-all duration-300 detailBox">
                                    <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                        <div class="text-sm md:text-base font-bold text-nowrap">بازبینی
                                            اطلاعات
                                            مشتری و تایید</div>
                                        <div onclick="closePopupLookCont(this)" class="close-popup-look-cont">
                                            <svg class="size-6 cursor-pointer" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 md:grid-cols-6 gap-5 mt-5">
                                        <div class="col-span-1 md:col-span-3 text-start">
                                            نام
                                            <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) name" type="text" name="" id="">
                                        </div>
                                        <div class="col-span-1 md:col-span-3 text-start">
                                            نام خانوادگی
                                            <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) family" type="text" style="font-family: 'IRANSansX';" name="" id="">
                                        </div>
                                        <div class="col-span-1 md:col-span-3 text-start">
                                            کد ملی
                                            <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa nationalCode" type="text" name="" dir="ltr" id="">
                                        </div>
                                        <div class="col-span-1 md:col-span-3 text-start">
                                            شماره تلفن
                                            <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa phoneNumber" type="text" name="" dir="ltr" id="">
                                        </div>
                                        <div class="col-span-1 md:col-span-2 text-start">
                                            وضعیت تایید
                                            <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) isApproved" name="" id="">
                                                <option value="0" ${user.isApproved==0 ? 'selected' : ''}>در انتظار</option>
                                                <option value="1" ${user.isApproved==1 ? 'selected' : ''}>تایید</option>
                                                <option value="-1" ${user.isApproved==-1 ? 'selected' : ''}>رد</option>
                                            </select>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 text-start">
                                            نقش
                                            <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) roles" name="" id="" multiple="" size="1">
                            `
                    if(user.roleArr){
                        data.roles.forEach(role => {
                            let isSelected = user.roleArr.includes(role.id) ? 'selected' : ''
                            html += `<option value="${role.id}" ${isSelected}>${role.faTitle}</option>`
                        })
                    } else {
                        data.roles.forEach(role => {
                            html += `
                                <option value="${role.id}">${role.faTitle}</option>
                            `
                        })
                    }

                        html +=`
                                            </select>
                                        </div>

                                        <div class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-2 flex items-center justify-between w-full py-2 px-4 mt-[30px]">
                                            <div class="w-full flex justify-between items-center">
                                                <label for="isActive2" class="w-[calc(100%-50px)] text-start cursor-pointer">فعال
                                                    : </label>
                                                <label for="isActive2" class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                                    <input type="checkbox" name="isActive" value="1" id="isActive2" hidden="" class="peer cursor-pointer">
                                                    <span class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                                    <span class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <button class="col-span-1 md:col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold submitBtn cursor-pointer transition-all duration-300 hover:bg-(--primary-dashboard) hover:text-white">ثبت</button>
                                        <button class="col-span-1 md:col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold closeBtn cursor-pointer transition-all duration-300 hover:bg-(--danger-dashboard) hover:text-white">لغو</button>
                                    </div>
                                </div>
                            </div>
                            <button onclick="deleteUser(this)" class="w-3/6 bg-(--danger-dashboard) text-white rounded-md px-2 py-2 cursor-pointer text-nowrap deleteUser">
                                حذف درخواست
                            </button>
                        </td>`
                    tr.innerHTML = html
                    pending.querySelector('tbody').append(tr)
                }
            })
        },
        error: function(){
            console.log('error')
        }
    })
}

function sort(el) {
    if (el.dataset.sort == 'desc') {
        el.querySelector('img').src = url + 'assets/img/sort/asc.png'
        el.querySelector('p').innerText = 'صعودی'
        el.dataset.sort = 'asc'
        userFilter.sortType = 'asc'
    }
    else {
        el.querySelector('img').src = url + 'assets/img/sort/desc.png'
        el.querySelector('p').innerText = 'نزولی'
        el.dataset.sort = 'desc'
        userFilter.sortType = 'desc'
    }
    setDatas()
}