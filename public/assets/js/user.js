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

function wallet(state, userId) {
    let wallet = document.getElementById('popup-wallet')
    if (state == 'open') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('wallet.popupWalletData') }}",
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

    const openBtn_edited = item_list.querySelector(".open-popup-edited")
    const openBtn_look_edit = item_list.querySelector(".open-popup-look-edit")
    const popup_edit = item_list.querySelector(".popup-edit")
    const closeBtn_edit = item_list.querySelector(".close-popup-edit")
    const closeBtn_edit2 = item_list.querySelector(".close-popup-edit2")
    const openBtn_look = item_list.querySelector(".open-popup-look")
    const popup_look = item_list.querySelector(".popup-look")
    const closeBtn_look = item_list.querySelector(".close-popup-look")
    const closeBtn_look2 = item_list.querySelector(".close-popup-look2")

    openBtn_edited.addEventListener("click", () => {
        popup_edit.classList.remove("invisible")
        popup_edit.classList.remove("opacity-0")
        popup_edit.classList.add("opacity-100")
        popup_edit.classList.add("visible")
    });

    closeBtn_edit.addEventListener("click", () => {
        popup_edit.classList.add("invisible")
        popup_edit.classList.add("opacity-0")
        popup_edit.classList.remove("opacity-100")
        popup_edit.classList.remove("visible")
    });
    closeBtn_edit2.addEventListener("click", () => {
        popup_edit.classList.add("invisible")
        popup_edit.classList.add("opacity-0")
        popup_edit.classList.remove("opacity-100")
        popup_edit.classList.remove("visible")
    });


    openBtn_look_edit.addEventListener("click", () => {
        popup_edit.classList.remove("invisible")
        popup_edit.classList.remove("opacity-0")
        popup_edit.classList.add("visible")
        popup_edit.classList.add("opacity-100")
        popup_look.classList.remove("visible")
        popup_look.classList.remove("opacity-100")
        popup_look.classList.add("invisible")
        popup_look.classList.add("opacity-0")
    });


    openBtn_look.addEventListener("click", () => {
        popup_look.classList.remove("invisible")
        popup_look.classList.remove("opacity-0")
        popup_look.classList.add("opacity-100")
        popup_look.classList.add("visible")
    });
    closeBtn_look.addEventListener("click", () => {
        popup_look.classList.add("invisible")
        popup_look.classList.add("opacity-0")
        popup_look.classList.remove("opacity-100")
        popup_look.classList.remove("visible")
    });
    closeBtn_look2.addEventListener("click", () => {
        popup_look.classList.add("invisible")
        popup_look.classList.add("opacity-0")
        popup_look.classList.remove("opacity-100")
        popup_look.classList.remove("visible")
    });



});


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
        popup_look_cont.classList.remove("invisible")
        popup_look_cont.classList.remove("opacity-0")
        loader('open')
        $.ajax({
            url: api+'userDetail/'+item_2.dataset.userId,
            type: "GET",
            success: function(data){
                console.log(data)
                loader('close')
            },
            error: function(){
                console.log('error')
            }
        })




    })
    closeBtn_look_cont.addEventListener("click", () => {
        popup_look_cont.classList.add("invisible")
        popup_look_cont.classList.add("opacity-0")
        popup_look_cont.classList.remove("opacity-100")
        popup_look_cont.classList.remove("visible")
    })
    closeBtn_look_cont2.addEventListener("click", () => {
        popup_look_cont.classList.add("invisible")
        popup_look_cont.classList.add("opacity-0")
        popup_look_cont.classList.remove("opacity-100")
        popup_look_cont.classList.remove("visible")
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