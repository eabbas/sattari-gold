let message = document.getElementById('message')
let element = document.createElement('div')
element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

function showMessage(state) {
    if (state == 'open') {
        message.classList.remove('top-0')
        message.classList.remove('opacity-0')
        message.classList.remove('invisible')
        message.classList.add('top-2/10')
    }
    if (state == 'close') {
        message.classList.remove('top-2/10')
        message.classList.add('top-0')
        message.classList.add('opacity-0')
        message.classList.add('invisible')
    }
}

function createUser(state) {
    let userCreatePopup = document.getElementById('userCreatePopup')
    if (state == 'open') {
        userCreatePopup.classList.remove('invisible', 'opacity-0')
    }
    if (state == 'close') {
        userCreatePopup.classList.add('invisible', 'opacity-0')
    }
}

function wallet(el, state, userId) {
    let wallet = el.closest('td').querySelector('.popup-wallet')
    if (state == 'open') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: api +"popupWalletData",
            type: "POST",
            dataType: "json",
            data: {
                'userId': userId,
            },
            success: function (data) {
                console.log(data);
            },
            error: function () {
                showMessage('open')
                element.innerHTML = `
                            <span>❌</span>
                            <span class="text-shadow-lg">خطا در دریافت اطلاعات!</span>
                        `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2500)
            }
        })
        wallet.classList.remove('invisible', 'opacity-0')
    }
    if (state == 'close') {
        wallet.classList.add('invisible', 'opacity-0')
    }
}

document.querySelectorAll('.approvedUsers').forEach(row=>{
    let openBtn_edited = row.querySelector(".open-popup-edited")
    let popup_edit = row.querySelector(".popup-edit")
    let closeBtn = row.querySelector(".closeBtn")
    let xBtn = row.querySelector(".close-popup-look-cont")
    openBtn_edited.addEventListener("click", () => {
        loader('open')
        $.ajax({
            url: api + 'userDetail/' + row.dataset.userId,
            type: "GET",
            success: function (data) {
                console.log(data)
                loader('close')
                popup_edit.classList.remove("invisible")
                popup_edit.classList.remove("opacity-0")
                row.querySelector('.name').value = data.name
                row.querySelector('.family').value = data.family
                row.querySelector('.phoneNumber').value = data.phoneNumber
                row.querySelector('.nationalCode').value = data.nationalCode
                let isApprovedOptions = row.querySelector('.isApproved').children
                for (let option of isApprovedOptions) {
                    if (option.value == data.isApproved) {
                        option.selected = true
                    }
                }
                if (data.isActive == 1) {
                    row.querySelector('#AisActive' + data.id).checked = true
                } else {
                    row.querySelector('#AisActive' + data.id).checked = false
                }
            },
            error: function () {
                console.log('failed to load data')
            }
        })
    })
    closeBtn.addEventListener('click', ()=>{
        popup_edit.classList.add("invisible")
        popup_edit.classList.add("opacity-0")
    })
    xBtn.addEventListener('click', ()=>{
        popup_edit.classList.add("invisible")
        popup_edit.classList.add("opacity-0")
    })
})

// لیست مشتری / لیست مشتری - مشتریان در انتظار تایید
let confirmed = document.getElementById("confirmed");
let pending = document.getElementById("pending");
let confirmed_pending = document.getElementById("confirmed_pending");

function conpen(state, el) {
    document.querySelectorAll('.customers').forEach(customer => {
        customer.classList.remove('bg-white')
        customer.classList.add('bg-zinc-200')
    })
    if (state == 'pending') {
        el.classList.add('bg-white')
        el.classList.remove('bg-zinc-200')
        confirmed.classList.add("hidden")
        pending.classList.remove("hidden")
    }
    if (state == 'confirmed') {
        el.classList.add('bg-white')
        el.classList.remove('bg-zinc-200')
        confirmed.classList.remove("hidden")
        pending.classList.add("hidden")
    }
}

// لیست مشتری / انتخاب همه
const selectAll = document.querySelector("#selectAll")
const rowCheckboxes = document.querySelectorAll(".row-checkbox")

// انتخاب یا لغو انتخاب همه
selectAll.addEventListener("change", () => {
    rowCheckboxes.forEach((checkbox) => {
        checkbox.checked = selectAll.checked
    })
})

// بررسی انتخاب دستی ردیف‌ها
rowCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
        const allSelected = [...rowCheckboxes].every((checkbox) => checkbox.checked)
        selectAll.checked = allSelected
    })
})

// لیست مشتریان / کیف پوا - بیشتر - ادیت
const item_list = document.querySelectorAll(".item_list")

// console.log(items)
item_list.forEach((item_list) => {
    const openBtn_look_edit = item_list.querySelector(".open-popup-look-edit")
    const popup_edit = item_list.querySelector(".popup-edit")
    const closeBtn_edit2 = item_list.querySelector(".close-popup-edit2")
    const openBtn_look = item_list.querySelector(".open-popup-look")
    const popup_look = item_list.querySelector(".popup-look")
    const closeBtn_look = item_list.querySelector(".close-popup-look")
    const closeBtn_look2 = item_list.querySelector(".close-popup-look2")
    closeBtn_edit2.addEventListener("click", () => {
        popup_edit.classList.add("invisible")
        popup_edit.classList.add("opacity-0")
    })
    openBtn_look_edit.addEventListener("click", () => {
        popup_edit.classList.remove("invisible")
        popup_edit.classList.remove("opacity-0")
        popup_look.classList.add("invisible")
        popup_look.classList.add("opacity-0")
    })
    openBtn_look.addEventListener("click", () => {
        popup_look.classList.remove("invisible")
        popup_look.classList.remove("opacity-0")
    })
    closeBtn_look.addEventListener("click", () => {
        popup_look.classList.add("invisible")
        popup_look.classList.add("opacity-0")
    })
    closeBtn_look2.addEventListener("click", () => {
        popup_look.classList.add("invisible")
        popup_look.classList.add("opacity-0")
    })
})

// لیست مشتری / تایید و بازبینی
const items_2 = document.querySelectorAll(".item_2")

items_2.forEach((item_2) => {
    const openBtn_look_cont = item_2.querySelector(".open-look-cont")
    const popup_look_cont = item_2.querySelector(".popup-look-cont")
    const closeBtn_look_cont = item_2.querySelector(".close-popup-look-cont")
    const closeBtn_look_cont2 = item_2.querySelector(".close-popup-look-cont2")
    let closeBtn = item_2.querySelector(".closeBtn")
    closeBtn.addEventListener('click', () => {
        popup_look_cont.classList.add("invisible")
        popup_look_cont.classList.add("opacity-0")
        popup_look_cont.classList.remove("opacity-100")
        popup_look_cont.classList.remove("visible")
    })
    openBtn_look_cont.addEventListener("click", () => {
        loader('open')
        $.ajax({
            url: api+'userDetail/'+item_2.dataset.userId,
            type: "GET",
            success: function(data){
                popup_look_cont.classList.remove("invisible")
                popup_look_cont.classList.remove("opacity-0")
                loader('close')
                item_2.querySelector('.detailBox').classList.remove('invisible', 'opacity-0')
                item_2.querySelector('.name').value = data.name 
                item_2.querySelector('.family').value = data.family
                item_2.querySelector('.phoneNumber').value = data.phoneNumber 
                item_2.querySelector('.nationalCode').value = data.nationalCode 
                let isApprovedOptions = item_2.querySelector('.isApproved').children
                for(let option of isApprovedOptions){
                    if(option.value == data.isApproved){
                        option.selected = true
                    }
                }
                if(data.isActive == 1){
                    item_2.querySelector('#isActive' + data.id).checked = true
                } else {
                    item_2.querySelector('#isActive' + data.id).checked = false
                }
            },
            error: function(){
                console.log('error')
            }
        })
    })
    closeBtn_look_cont.addEventListener("click", () => {
        popup_look_cont.classList.add("invisible")
        popup_look_cont.classList.add("opacity-0")
        document.querySelectorAll('.detailBox').forEach(box=>{
            box.classList.add('invisible', 'opacity-0')
        })
    })
    closeBtn_look_cont2.addEventListener("click", () => {
        popup_look_cont.classList.add("invisible")
        popup_look_cont.classList.add("opacity-0")
        document.querySelectorAll('.detailBox').forEach(box => {
            box.classList.add('invisible', 'opacity-0')
        })
    })
    item_2.querySelector('.submitBtn').addEventListener('click', ()=>{
        let children = item_2.querySelector('.roles').children
        let roles = []
        for(let child of children){
            if(child.selected){
                roles.push(child.value)
            }
        }
        $.ajax({
            url: api+'updateUser',
            type: "POST",
            dataType: "json",
            data: {
                'user_id': item_2.dataset.userId,
                'popupName': item_2.querySelector('.name').value,
                'popupFamily': item_2.querySelector('.family').value,
                'popupPhoneNumber': item_2.querySelector('.phoneNumber').value,
                'popupNationalCode': item_2.querySelector('.nationalCode').value,
                'approvingStatus': item_2.querySelector('.isApproved').value,
                'isActive': item_2.querySelector('#isActive'+item_2.dataset.userId).checked ? 1 : 0,
                'roles': roles,
            },
            success: function(data){
                console.log(data)
                popup_look_cont.classList.add("invisible")
                popup_look_cont.classList.add("opacity-0")
                document.querySelectorAll('.detailBox').forEach(box => {
                    box.classList.add('invisible', 'opacity-0')
                })
                item_2.remove()
                let parentTable = document.querySelector('#confirmed').querySelector('tbody')
                let rowTable = document.createElement('tr')
                rowTable.classList = 'item_list text-xs lg:text-base approvedUsers'
                let inner = `
                    <td class="p-1 md:px-3 md:py-2 flex items-center justify-center gap-2 in-fa">
                        <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                        ${ data.id }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        ${ data.name+' '+data.family }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ data.phoneNumber }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        -
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        -
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                        ${ data.nationalCode }
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        -
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        <span class="px-3 py-1.5 border-1 ${ data.isActive == 1 ? 'border-(--primary-dashboard) bg-(--primary-dashboard)/20 text-(--primary-dashboard)' : 'border-(--danger-dashboard) bg-(--danger-dashboard)/20 text-(--danger-dashboard)' } rounded-md p-1 cursor-default">
                               ${ data.isActive == 1 ? 'فعال' : 'غیرفعال' }
                        </span>
                    </td>
                    <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                        قلک طلا
                    </td>
                    <td class="relative p-1 md:px-3 md:py-2 flex items-center gap-3">
                        <button onclick="wallet(this, 'open', 1)" class="w-3/6 text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer walletBtn">
                            کیف پول
                        </button>
                        <div id="" class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center popup-wallet">
                            <div onclick="wallet(this, 'close')" class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2 cursour-pointer">
                            </div>
                            <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                    <div class="font-bold">کیف پول</div>
                                    <div onclick="wallet(this, 'close')" class="cursor-pointer">
                                        <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-5 mt-5">
                                    <div class="col-span-6 flex items-center border-1 border-(--border-dashboard) rounded-lg divide-x-1 divide-(--border-dashboard) px-1 md:px-2 py-2 md:py-3 gap-2">
                                        <div class="w-6/12">
                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام
                                                :</span>
                                            <span class="text-xs md:text-base font-bold">${ data.name+' '+data.family }</span>
                                        </div>
                                        <div class="w-6/12 flex justify-between items-center">
                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره
                                                :</span>
                                            <span class="text-[10px] md:text-base font-bold in-fa">${ data.phoneNumber }</span>
                                        </div>
                                    </div>
                                    <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                        <div class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3 pb-2">
                                                    <span class="">
                                                        <svg class="size-5 fill-(--primary-dashboard)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                            <path d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                                        موجودی ریال
                                                    </span>
                                                </div>
                                                <div class="font-bold pb-2">0</div>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3 pt-2">
                                                    <span class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                        موجودی قابل برداشت
                                                    </span>
                                                </div>
                                                <div class="font-bold pt-2">
                                                    <span class="">
                                                        0
                                                    </span>
                                                    <span class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                        تومان
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-6 flex items-center border-1 border-(--border-dashboard) rounded-lg divide-x-1 divide-(--border-dashboard) px-2 py-3 gap-2">
                                        <label for="plass" class="w-6/12 flex items-center gap-1 md:gap-3">
                                            <input class="accent-(--primary-dashboard) size-4 md:size-5" type="radio" name="yes" id="plass">
                                            <span class="text-xs text-green-400 md:text-base font-bold">واریز</span>
                                        </label>
                                        <label for="maiez" class="w-6/12 flex items-center gap-1 md:gap-3">
                                            <input class="accent-(--primary-dashboard) size-4 md:size-5" type="radio" name="yes" id="maiez">
                                            <span class="text-xs text-red-400 md:text-base font-bold">برداشت</span>
                                        </label>
                                    </div>
                                    <label class="col-span-3" for="categoryName">
                                        نوع تراکنش
                                        <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" name="" id="categoryName">
                                            <option value="">طلا</option>
                                            <option value="">نقره</option>
                                            <option value="" selected="">ریال</option>
                                            <option value="">شمش</option>
                                        </select>
                                    </label>
                                    <label class="col-span-3" for="welcome">
                                        مبلغ
                                        <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" type="text" name="" id="" placeholder="ریال">
                                    </label>
                                    <label class="col-span-6" for="text">
                                        توضیحات
                                        <textarea class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" name="" id="text"></textarea>
                                    </label>
                                    <button class="col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md">ثبت</button>
                                    <button class="col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md">
                                        لغو</button>
                                </div>
                            </div>
                        </div>
                        <button class="open-popup-look w-2/6 text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-2 py-2 cursor-pointer">
                            بیشتر
                        </button>
                        <div class="popup-look fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                            <div class="close-popup-look2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2">
                            </div>
                            <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                    <div class="font-bold text-sm md:text-xl">اطلاعات بیشتر</div>
                                    <div class="close-popup-look">
                                        <svg class="size-4 md:size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-5 mt-5">
                                    <div class="col-span-6 flex items-center justify-between">
                                        <div class="font-bold text-sm md:text-lg">مشخصات کاربر</div>
                                        <div class="open-popup-look-edit w-fit text-(--primary-dashboard) font-bold border-1 border-(--primary-dashboard) rounded-md p-2 cursor-pointer">
                                            ویرایش</div>
                                    </div>
                                    <div class="col-span-3 bg-zinc-100 px-1 py-2 md:px-2 md:py-3 rounded-lg flex items-center gap-1 md:gap-2">
                                        <span class="text-xs md:text-base text-(--text-secondary-dashboard)">نام
                                            :</span>
                                        <span class="text-xs md:text-base font-bold">حسین
                                            ستاره</span>
                                    </div>
                                    <div class="col-span-3 bg-zinc-100 px-1 py-2 md:px-2 md:py-3 rounded-lg flex items-center gap-1 md:gap-2">
                                        <span class="text-[10px] md:text-base text-(--text-secondary-dashboard)">شماره
                                            موبایل :</span>
                                        <span class="text-xs md:text-base font-bold">09123456789</span>
                                    </div>
                                    <div class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                        <span class="text-[10px] md:text-base text-(--text-secondary-dashboard)">معرف
                                            :</span>
                                        <span class="text-xs md:text-base font-bold">محمد رضا
                                            عولیافان</span>
                                    </div>
                                    <div class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                        <span class="text-[10px] md:text-base text-(--text-secondary-dashboard)">کد
                                            حساب داری :</span>
                                        <span class="text-xs md:text-base font-bold">-</span>
                                    </div>
                                    <div class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                        <span class="text-[10px] md:text-base text-(--text-secondary-dashboard)">نام
                                            دستع بندی :</span>
                                        <span class="text-xs md:text-base font-bold">-</span>
                                    </div>
                                    <div class="col-span-6 bg-zinc-100 p-3 rounded-lg flex items-center justify-between gap-2">
                                        <span class="text-[10px] md:text-base text-(--text-secondary-dashboard)">ارسال
                                            اطلاعات ورود از طریق پیامک به مشتری</span>
                                        <button class="bg-(--primary-dashboard) text-sm md:text-base text-white font-bold rounded-lg px-5 md:px-10 py-1 md:py-3 cursor-pointer">ارسال</button>
                                    </div>
                                    <div class="col-span-6 text-sm  md:text-lg font-bold">کیف پول</div>
                                    <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                        <div class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3 pb-2">
                                                    <span class="">
                                                        <svg class="size-5 fill-(--primary-dashboard)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                            <path d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                                        موجودی ریال
                                                    </span>
                                                </div>
                                                <div class="font-bold pb-2">95.478.555</div>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3 pt-2">
                                                    <span class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                        موجودی قابل برداشت
                                                    </span>
                                                </div>
                                                <div class="font-bold pt-2">
                                                    <span class="">
                                                        95.478.555
                                                    </span>
                                                    <span class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                        تومان
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="open-popup-edited w-1/6 text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-1 py-2 cursor-pointer flex items-center justify-center">
                            <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z"></path>
                            </svg>
                        </button>
                        <div class="popup-edit fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                            <div class="close-popup-edit2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2">
                            </div>
                            <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                    <div class="font-bold">ویرایش اطلاعات</div>
                                    <div class="close-popup-edit">
                                        <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-2 md:gap-5 mt-5">
                                    <label class="col-span-3 text-xs md:text-sm lg:text-base" for="name">
                                        نام و نام خانوادگی
                                        <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" type="text" name="" id="name">
                                    </label>
                                    <label class="col-span-3 text-xs md:text-sm lg:text-base" for="number">
                                        شماره موبایل
                                        <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" type="text" name="" id="number">
                                    </label>
                                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="numberMeli">
                                        کدملی
                                        <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" type="text" name="" id="numberMeli">
                                    </label>
                                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="dey">
                                        تاریخ تولد
                                        <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" type="text" name="" id="dey">
                                    </label>
                                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="user">
                                        معرف
                                        <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" type="text" name="" id="user">
                                    </label>
                                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="user">
                                        کد حسابداری
                                        <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" type="text" name="" id="user">
                                    </label>
                                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="categoryName">
                                        نام دسته‌بندی
                                        <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" name="" id="categoryName">
                                            <option value="">salam</option>
                                            <option value="">salam</option>
                                            <option value="" selected="">boy</option>
                                            <option value="">salam</option>
                                        </select>
                                    </label>
                                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="welcome">
                                        تعداد ورودی همزنان
                                        <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" name="" id="welcome">
                                            <option value="">salam</option>
                                            <option value="">salam</option>
                                            <option value="" selected="">boy</option>
                                            <option value="">salam</option>
                                        </select>
                                    </label>
                                    <label class="col-span-6 text-xs md:text-sm lg:text-base" for="text">
                                        یاداشت
                                        <textarea class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)" name="" id="text"></textarea>
                                    </label>
                                    <label class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-6 sm:col-span-3 text-xs md:text-sm lg:text-base flex items-center justify-between w-full py-4 px-4 cursor-pointer" for="onlyAvailableDesktop">
                                        <div class="text-zinc-700 text-sm">
                                            وضعیت مشتری (فعال)
                                        </div>
                                        <div class="relative inline-flex cursor-pointer items-center">
                                            <input class="peer sr-only" id="onlyAvailableDesktop" type="checkbox">
                                            <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-(--primary-dashboard) peer-checked:after:translate-x-full peer-focus:ring-(--primary-dashboard-dark-dashboard)">
                                            </div>
                                        </div>
                                    </label>
                                    <label class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-6 sm:col-span-3 text-xs md:text-sm lg:text-base flex items-center justify-between w-full py-4 px-4 cursor-pointer" for="password">
                                        <div class="text-zinc-700 text-sm">
                                            ورود با رمز عبور
                                        </div>
                                        <div class="relative inline-flex cursor-pointer items-center">
                                            <input class="peer sr-only" id="password" type="checkbox">
                                            <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-(--primary-dashboard) peer-checked:after:translate-x-full peer-focus:ring-(--primary-dashboard-dark-dashboard)">
                                            </div>
                                        </div>
                                    </label>
                                    <button class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md">ویرایش</button>
                                    <button class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md">
                                        لغو</button>
                                </div>
                            </div>
                        </div>
                    </td>`
                rowTable.innerHTML = inner
                parentTable.prepend(rowTable)

            },
            error: function(){
                console.log('failed to load data')
            }
        })
    })
    item_2.querySelector('.deleteUser').addEventListener('click', ()=>{
        loader('open')
        $.ajax({
            url: api+'deleteUser/'+item_2.dataset.userId,
            type: "GET",
            success: function(response){
                console.log(response)
                loader('close')
                item_2.remove()
            },
            error: function(){
                console.log('failed to load data')
            }
        })
    })
})

function loader(state) {
    let loader = document.getElementById('loader')
    if (state == 'open') {
        loader.classList.remove('invisible', 'opacity-0')
    }
    if (state == 'close') {
        loader.classList.add('invisible', 'opacity-0')
    }
}