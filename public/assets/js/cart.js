
let totalPriceEl = document.getElementById('totalPriceEl')
let discountEl = document.getElementById('discountEl')
let addPackToCartBtn = document.getElementById('addPackToCartBtn')
let cartItemsBlock = document.getElementById('cartItemsBlock')
let localProducts = JSON.parse(localStorage.getItem('products'))
let localPacks = JSON.parse(localStorage.getItem('packs'))
let popupFlag = false
function addToCart(btn) {
    btn.removeAttribute('onclick')
    btn.innerHTML = `<div class="w-5 h-5 border-2 border-white border-t-(--primary-text-color) rounded-full animate-spin"></div>`
    $.ajax({
        url: api + 'findProduct/' + btn.closest('.addToCartBtns').dataset.productId,
        type: "GET",
        dataType: "json",
        success: function (response) {
            // let quan = parseInt(orderBasket.children[1].innerText)
            // quan+=1
            // orderBasket.children[1].innerText = quan
            response.quantity = 1
            btn.innerHTML = `
            <div class="w-full h-full transition-all duration-300 hover:bg-(--green-btn) group cursor-pointer bg-(--light-green-btn) flex gap-2 justify-center items-center rounded-xl" data-product-id="${response.product_id}">
                <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="+">+</button>
                <input type="number" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white text-sm text-center outline-none in-fa" readonly value="${response.quantity}">
                <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="-">-</button>
            </div>`
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
            console.log('failed to load data')
        }
    })
}
function setCount(btn) {
    localProducts = JSON.parse(localStorage.getItem('products'))
    productId = btn.closest('.addToCartBtns').dataset.productId
    localProducts.find(product => {
        let finalPrice = 0
        if (product.secondary_price) {
            finalPrice = product.secondary_price
        } else {
            finalPrice = product.primary_price
        }
        if (product.id == productId) {
            if (btn.dataset.state == "+") {
                btn.parentElement.children[1].value++
                // // orderBasket.children[1].innerText++
                product.quantity++
                if (totalPriceEl) {
                    let currentPrice = parseInt(totalPriceEl.innerText)
                    totalPriceEl.innerText = currentPrice += finalPrice
                }
            }
            if (btn.dataset.state == "-") {
                btn.parentElement.children[1].value--
                // // orderBasket.children[1].innerText--
                product.quantity--
                if (totalPriceEl) {
                    let currentPrice = parseInt(totalPriceEl.innerText)
                    totalPriceEl.innerText = currentPrice -= finalPrice
                }
            }
        }
    })
    let newItems = JSON.stringify(localProducts)
    localStorage.removeItem('products')
    localStorage.setItem('products', newItems)
    if (btn.parentElement.children[1].value == 0) {
        // orderBasket.children[1].innerText--
        if (totalPriceEl) {
            btn.closest('.parentItem').parentElement.remove()
        }
        localProducts = localProducts.filter(cart => cart.id != productId)
        let newItems = JSON.stringify(localProducts)
        localStorage.removeItem('products')
        localStorage.setItem('products', newItems)
        if (!popupFlag) {
            btn.closest('.addToCartBtns').innerHTML = `
                <button onclick="addToCart(this)" class="w-full px-4 h-full bg-(--light-green-btn) flex gap-2 justify-center items-center rounded-xl cursor-pointer transition-all duration-300 hover:bg-(--green-btn) group">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="lg:size-4 size-3 fill-gray-200 transition-all duration-300 group-hover:fill-white">
                            <path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="lg:text-sm text-[10px] text-gray-200 font-bold transition-all duration-300 group-hover:text-white">افزودن به سبد خرید</span>
                </button>`
        } else {
            btn.closest('.parentItem').remove()
        }

    }
}