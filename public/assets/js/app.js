// ! toggle menu in dashboard with mr.olyafam
let arrowDowns = document.querySelectorAll(".arrow-down");
arrowDowns.forEach((arrowDown) => {
   arrowDown.addEventListener('click', () => {
      if (arrowDown.nextElementSibling.classList.contains('max-h-0')) {
         arrowDowns.forEach((arrow) => {
            arrow.children[0].classList.remove('rotate-180')
            arrow.nextElementSibling.classList.remove('max-h-100')
            arrow.nextElementSibling.classList.add('max-h-0')
         })
         arrowDown.children[0].classList.add('rotate-180')
         arrowDown.nextElementSibling.classList.remove('max-h-0')
         arrowDown.nextElementSibling.classList.add('max-h-100')
      } else {
         arrowDown.children[0].classList.remove('rotate-180')
         arrowDown.nextElementSibling.classList.remove('max-h-100')
         arrowDown.nextElementSibling.classList.add('max-h-0')
      }
   })
})

let menu = document.getElementById('menu');
function responsive_menu(state) {
   if (state == 'open') {
      menu.classList.remove('opacity-0');
      menu.classList.remove('-right-full');
      menu.classList.add('right-0');
   }
   if (state == 'close') {
      menu.classList.add('opacity-0');
      menu.classList.add('-right-full');
      menu.classList.remove('right-0');
   }
}

let modals = document.querySelectorAll('.modal');
modals.forEach(modal => {
   setTimeout(() => {
      modal.classList.add('opacity-0', 'invisible')
   }, 3000)
})




// mahdi

 let hamburger_menu_dashboard_item = document.getElementById('hamburger_menu_dashboard_item')
        let hamburger_menu_dashboard_item_close = document.getElementById('hamburger_menu_dashboard_item_close')

        function hamburger_menu_dashboard(type, close) {
            if (type == 'open') {
                hamburger_menu_dashboard_item.classList.remove('max-lg:translate-x-full')
                hamburger_menu_dashboard_item_close.classList.remove('invisible')
                hamburger_menu_dashboard_item_close.classList.remove('opacity-0')
            }
            if (type == 'close') {
                hamburger_menu_dashboard_item.classList.add('max-lg:translate-x-full')
                hamburger_menu_dashboard_item_close.classList.add('invisible')
                hamburger_menu_dashboard_item_close.classList.add('opacity-0')
            }
        }


        
        let user_pup_up_item = document.getElementById('user_pup_up_item')
        let user_pup_up_item_colse = document.getElementById('user_pup_up_item_colse')

        function user_pup_up() {
            user_pup_up_item.classList.toggle('max-h-0')
            user_pup_up_item.classList.toggle('max-h-50')
            user_pup_up_item.classList.toggle('border-1')
            user_pup_up_item_colse.classList.toggle('invisible')
            user_pup_up_item_colse.classList.toggle('opacity-0')
        }