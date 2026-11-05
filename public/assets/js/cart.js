
let totalPriceEl = document.getElementById('totalPriceEl')
let discountEl = document.getElementById('discountEl')
let addPackToCartBtn = document.getElementById('addPackToCartBtn')
let cartItemsBlock = document.getElementById('cartItemsBlock')
let localProducts = JSON.parse(localStorage.getItem('products'))
addToCartBtns = document.querySelectorAll('.addToCartBtns')
localProducts = JSON.parse(localStorage.getItem('products'))
localPacks = JSON.parse(localStorage.getItem('packs'))
orderBasket = document.getElementById('orderBasket')
let totalCartQuantity = 0
// if (localProducts) {
//     orderBasket.children[1].innerText = localProducts.length
// }
let popupFlag = false
function addToCart(btn) {
    btn.removeAttribute('onclick')
    btn.innerHTML = `<div class="w-5 h-5 border-2 border-white border-t-white rounded-full animate-spin"></div>`
    $.ajax({
        url: api + 'findProduct/' + btn.closest('.addToCartBtns').dataset.productId,
        type: "GET",
        dataType: "json",
        success: function (response) {
            let quan = parseInt(orderBasket.children[1].innerText)
            quan += 1
            totalCartQuantity++
            orderBasket.children[1].innerText = totalCartQuantity
            orderBasket.children[1].innerText = quan
            response.quantity = 1
            // btn.innerHTML = `
            // <div class="w-full h-full transition-all duration-300 group cursor-pointer bg-[image:var(--gradient-gold)] flex gap-2 justify-center items-center rounded-xl" data-product-id="${response.product_id}">
            //     <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="+">+</button>
            //     <input type="number" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white text-sm text-center outline-none in-fa" readonly value="${response.quantity}">
            //     <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="-">-</button>
            // </div>`
            document.querySelectorAll('.addToCartBtns').forEach(button => {
                if (button.dataset.productId != productId) return

                let input = button.querySelector('input[type=number]')
                if (input) {
                    input.value = response.quantity
                } else {
                    button.innerHTML = `
                        <div class="w-full p-2 h-full transition-all duration-300 hover:bg-(--green-btn) group cursor-pointer bg-(--light-green-btn) flex gap-2 justify-center items-center rounded-xl">
                            <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-white group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="+">+</button>
                            <input type="number" class="w-1/3 transition-all duration-300 text-white group-hover:text-white text-sm text-center outline-none in-fa" readonly value="${response.quantity}">
                            <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-white group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="-">-</button>
                        </div>
                    `
                }
                if (response.quantity == response.count) {
                    button.children[0].children[0].disabled = true
                    button.children[0].children[0].classList.remove('cursor-pointer')
                    button.children[0].children[0].classList.add('cursor-no-drop')
                } else {
                    button.children[0].children[0].disabled = false
                    button.children[0].children[0].classList.remove('cursor-no-drop')
                    button.children[0].children[0].classList.add('cursor-pointer')
                }
            })
            let products = []
            if (localStorage.getItem('products')) {
                products = JSON.parse(localStorage.getItem('products'))
            }
            let existing = products.find(pro => pro.id == response.id)
            if (existing) {
                existing.quantity = (existing.quantity || 1) + 1
            } else {
                response.quantity = 1
                products.push(response)
            }
            localStorage.setItem('products', JSON.stringify(products))
        },
        error: function () {
            alert('failed to load data')
        }
    })
}
function setCount(btn) {
    let container = btn.closest('.addToCartBtns')
    if (!container) return

    let productId = container.dataset.productId
    if (!productId) return

    localProducts = JSON.parse(localStorage.getItem('products')) || []

    let product = localProducts.find(p => String(p.id) === String(productId))
    if (!product) return

    let finalPrice = product.secondary_price ? product.secondary_price : product.primary_price

    if (btn.dataset.state === '+') {
        btn.parentElement.children[1].value++
        product.quantity++
        totalCartQuantity++
        if (totalPriceEl) {
            let currentPrice = parseInt(totalPriceEl.innerText) || 0
            totalPriceEl.innerText = currentPrice + finalPrice
        }
    }

    if (btn.dataset.state === '-') {
        btn.parentElement.children[1].value--
        product.quantity--
        totalCartQuantity--
        if (totalPriceEl) {
            let currentPrice = parseInt(totalPriceEl.innerText) || 0
            totalPriceEl.innerText = currentPrice - finalPrice
        }
    }

    if (product.quantity == product.count) {
        btn.disabled = true
        btn.classList.remove('cursor-pointer')
        btn.classList.add('cursor-no-drop')
    } else {
        btn.parentElement.children[0].disabled = false
        btn.parentElement.children[0].classList.remove('cursor-no-drop')
        btn.parentElement.children[0].classList.add('cursor-pointer')
    }

    document.querySelectorAll('.addToCartBtns').forEach(button => {
        if (button === container) return
        if (String(button.dataset.productId) !== String(productId)) return

        let input = button.querySelector('input[type=number]')
        if (input) {
            input.value = btn.parentElement.children[1].value
        }
    })

    localStorage.setItem('products', JSON.stringify(localProducts))

    if (btn.parentElement.children[1].value == 0) {
        // if (orderBasket && orderBasket.children[1]) {
        //     orderBasket.children[1].innerText = Math.max(0, (parseInt(orderBasket.children[1].innerText) || 1) - 1)
        // }

        localProducts = localProducts.filter(cart => String(cart.id) !== String(productId))
        localStorage.setItem('products', JSON.stringify(localProducts))

        if (!popupFlag) {
            let initialHtml = `
                <button onclick="addToCart(this)" class="w-full px-4 h-full bg-(--light-green-btn) flex gap-2 justify-center items-center rounded-xl cursor-pointer transition-all duration-300 hover:bg-(--green-btn) group">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="lg:size-4 size-3 fill-white transition-all duration-300 group-hover:fill-white">
                            <path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="lg:text-sm text-[10px] text-white font-bold transition-all duration-300 group-hover:text-white">افزودن به سبد خرید</span>
                </button>
            `

            document.querySelectorAll('.addToCartBtns').forEach(button => {
                if (String(button.dataset.productId) === String(productId)) {
                    button.innerHTML = initialHtml
                }
            })
            if (window.currentPage == 'cart') {
                document.querySelectorAll('.cartPages').forEach(item => {
                    if (item.dataset.productId == productId) {
                        item.remove()
                    }
                })
            }
        } else {
            let parentItem = btn.closest('.parentItem')
            if (parentItem) {
                parentItem.remove()
            }

            if (window.currentPage == 'cart') {
                document.querySelectorAll('.cartPages').forEach(item => {
                    if (item.dataset.productId == productId) {
                        item.remove()
                    }
                })
            }
            let initialHtml = `
                <button onclick="addToCart(this)" class="w-full px-4 h-full flex gap-2 justify-center items-center rounded-xl cursor-pointer transition-all duration-300 hover:bg-(--green-btn) group">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="lg:size-4 size-3 fill-white transition-all duration-300 group-hover:fill-white">
                            <path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="lg:text-sm text-[10px] text-white font-bold transition-all duration-300 group-hover:text-white">افزودن به سبد خرید</span>
                </button>
            `

            document.querySelectorAll('.addToCartBtns').forEach(button => {
                if (String(button.dataset.productId) === String(productId) && !button.closest('.parentItem')) {
                    button.innerHTML = initialHtml
                }
            })
        }
    }
    orderBasket.children[1].innerText = totalCartQuantity
}
orderBasket.addEventListener('click', () => {
    if ((localStorage.getItem('products') && JSON.parse(localStorage.getItem('products')).length) || localStorage.getItem('packs') && JSON.parse(localStorage.getItem('packs')).length) {
        if (orderBasket.parentElement.children[1].classList.contains('invisible')) {
            popupFlag = true
            orderBasket.parentElement.children[1].classList.remove('invisible')
            orderBasket.parentElement.children[1].classList.remove('opacity-0')
            let parentCart = orderBasket.parentElement.querySelector('.parentHeaderCarts')
            parentCart.innerHTML = ''
            localProducts = JSON.parse(localStorage.getItem('products'))
            if (localProducts && localProducts.length) {
                localProducts.find((prod) => {
                    const rawPrice = prod.secondary_price || prod.primary_price
                    const priceText = rawPrice
                        ? Number(String(rawPrice).replace(/\D/g, '')).toLocaleString('fa-IR')
                        : 'تماس بگیرید'
                    let element = document.createElement('div')
                    element.classList = 'bg-white rounded-2xl p-4 flex gap-4 items-center shadow-sm border border-gray-100 parentItem'
                    let html = `
                        <div
                            class="w-16 h-20 sm:w-20 sm:h-24 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl flex items-center justify-center text-2xl shrink-0">
                            <img src="${imgPath + prod.mainImg}"
                                class="size-full object-cover" alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-gray-800 text-sm sm:text-base truncate in-fa">${prod.title}</h3>
                            <p
                                class="text-xs text-gray-500 mt-0.5 mb-5 max-w-full h-8 max-h-8 overflow-hidden ellipsis-2">${prod.summary ? prod.summary : ''}</p>
                            <div class="w-full p-2 bg-[image:var(--gradient-gold)] transition-all duration-300 group flex gap-2 justify-center items-center rounded-xl addToCartBtns"
                                data-product-id="${prod.id}">
                                <button onclick="setCount(this)"
                                    class="w-1/3 text-lg font-bold text-gray-200 transition-all duration-300 group-hover:text-white flex justify-center items-center cursor-pointer"
                                    data-state="+">+</button>
                                <input type="number"
                                    class="w-1/3 text-sm text-center outline-none text-gray-200 transition-all duration-300 group-hover:text-white in-fa"
                                    readonly="" value="${prod.quantity}">
                                <button onclick="setCount(this)"
                                    class="w-1/3 text-lg font-bold text-gray-200 transition-all duration-300 group-hover:text-white flex justify-center items-center cursor-pointer"
                                    data-state="-">-</button>
                            </div>
                        </div>
                        <div class="text-left shrink-0">
                            <p class="font-bold text-gray-800 text-sm sm:text-base in-fa price">${priceText}</p>
                            <p class="text-xs text-gray-400">${rawPrice ? 'ریال' : ''}</p>
                        </div>`
                    element.innerHTML = html
                    parentCart.append(element)
                })
            }

        } else {
            orderBasket.parentElement.children[1].classList.add('invisible')
            orderBasket.parentElement.children[1].classList.add('opacity-0')
            popupFlag = false
        }
    }
})
document.addEventListener('click', (e) => {
    if (!orderBasket.contains(e.target) && !orderBasket.parentElement.children[1].contains(e.target)) {
        popupFlag = false
        orderBasket.parentElement.children[1].classList.add('invisible')
        orderBasket.parentElement.children[1].classList.add('opacity-0')
    }
})



addToCartBtns.forEach(product => {
    if (localProducts) {
        localProducts.find(cartPro => {
            if (cartPro.id == (product.closest('.products') && product.closest('.products').dataset.productId)) {
                product.innerHTML = `
                <div class="w-full p-2 h-full transition-all duration-300 hover:bg-(--green-btn) group cursor-pointer bg-(--light-green-btn) flex gap-2 justify-center items-center rounded-xl">
                    <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-white group-hover:text-white flex justify-center items-center text-lg font-bold ${cartPro.count == cartPro.quantity ? 'cursor-no-drop' : 'cursor-pointer'}" ${cartPro.count == cartPro.quantity ? 'disabled' : ''} data-state="+">+</button>
                    <input type="number" class="w-1/3 transition-all duration-300 text-white group-hover:text-white text-sm text-center outline-none in-fa" readonly value="${cartPro.quantity}">
                    <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-white group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="-">-</button>
                </div>`
                if (cartPro.count == 0) {
                    product.innerHTML = `
                    <button class="w-full px-4 h-full bg-(--pastel-pink) flex gap-2 justify-center items-center rounded-xl relative after:absolute after:w-full after:h-full after:content-[''] after:top-0 after:right-0 after:bg-white/30 after:rounded-xl transition-all duration-300 hover:bg-(--discount-color) cursor-no-drop group">
                        <span class="lg:text-sm text-[10px] text-white font-bold transition-all duration-300">عدم موجودی</span>
                    </button>`
                }
            }
        })
    }
})
if (localProducts) {
    localProducts.forEach(item => {
        totalCartQuantity += item.quantity
    })
    cartLink.classList.remove('hidden')
}

orderBasket.children[1].innerText = totalCartQuantity