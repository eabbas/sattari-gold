let hamburgerMenu = document.getElementById('hamburgerMenu')
let menuBlock = document.getElementById('menuBlock')
let openSearchSectionBtn = document.getElementById('openSearchSectionBtn')
let searchSection = document.getElementById('searchSection')
hamburgerMenu.addEventListener('click', () => {
   menuBlock.classList.remove('invisible')
   menuBlock.classList.remove('opacity-0')
   menuBlock.children[0].classList.remove('translate-x-full')
   menuBlock.children[0].classList.remove('delay-200')
})
document.addEventListener('click', (e) => {
   if (!hamburgerMenu.contains(e.target) && !menuBlock.children[0].contains(e.target)) {
      menuBlock.classList.add('invisible')
      menuBlock.classList.add('opacity-0')
      menuBlock.children[0].classList.add('delay-200')
      menuBlock.children[0].classList.add('translate-x-full')
   }
})
window.addEventListener('scroll', () => {
   const header = document.getElementById('mainHeader')
   if (window.scrollY > 80) {
      header.classList.add('backdrop-blur-sm')
      header.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)'
   } else {
      header.style.boxShadow = 'none'
      header.classList.remove('backdrop-blur-sm')
   }
})

let drop_downs = document.querySelectorAll('.drop_down')
drop_downs.forEach(element => {
   element.addEventListener('click', function () {
      element.children[0].children[1].classList.toggle('rotate-180')
      element.children[1].classList.toggle('invisible')
      element.children[1].classList.toggle('opacity-0')
   })
})

openSearchSectionBtn.addEventListener('click', () => {
   searchSection.classList.remove('invisible')
   searchSection.classList.remove('opacity-0')
   searchSection.children[0].classList.remove('-translate-y-full')
})

document.addEventListener('click', (e) => {
   if (!searchSection.children[0].contains(e.target) && !openSearchSectionBtn.contains(e.target)) {
      searchSection.classList.add('invisible')
      searchSection.classList.add('opacity-0')
      searchSection.children[0].classList.add('-translate-y-full')
   }
   if (searchSection.children[0].children[0].contains(e.target)) {
      searchSection.classList.add('invisible')
      searchSection.classList.add('opacity-0')
      searchSection.children[0].classList.add('-translate-y-full')
   }
})

let modals = document.querySelectorAll('.modal');
modals.forEach(modal => {
   setTimeout(() => {
      modal.classList.add('opacity-0', 'invisible')
   }, 3000)
})