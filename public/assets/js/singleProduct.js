localProducts = JSON.parse(localStorage.getItem('products'))
let addToCartBtns = document.querySelectorAll('.addToCartBtns')
if(localStorage.getItem('products') && localProducts.length){
    addToCartBtns.forEach(btn => {
        localProducts.forEach(cartItem => {
            if (cartItem.id == productId) {
                btn.innerHTML = `
                <div class="w-full h-full transition-all duration-300 group cursor-pointer bg-[image:var(--gradient-gold)] flex gap-2 justify-center items-center rounded-md addToCartBtns" data-product-id="${productId}">
                    <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="+">+</button>
                    <input type="number" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white text-sm text-center outline-none in-fa" readonly value="${cartItem.quantity}">
                    <button onclick="setCount(this)" class="w-1/3 transition-all duration-300 text-gray-200 group-hover:text-white flex justify-center items-center text-lg font-bold cursor-pointer" data-state="-">-</button>
                </div>
                `
            }
        })
    })
}
