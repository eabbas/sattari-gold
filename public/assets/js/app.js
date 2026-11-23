
'use strict';

/* ========================================
   Sidebar Dropdown Menus
======================================== */

const arrowDowns = document.querySelectorAll('.arrow-down');

arrowDowns.forEach((arrowDown) => {
   arrowDown.addEventListener('click', () => {
      const submenu = arrowDown.nextElementSibling;

      if (!submenu) return;

      if (submenu.classList.contains('max-h-0')) {
         arrowDowns.forEach((arrow) => {
            const otherSubmenu = arrow.nextElementSibling;

            if (!otherSubmenu) return;

            arrow.children[0]?.classList.remove('rotate-180');
            otherSubmenu.classList.remove('max-h-100');
            otherSubmenu.classList.add('max-h-0');
         });

         arrowDown.children[0]?.classList.add('rotate-180');
         submenu.classList.remove('max-h-0');
         submenu.classList.add('max-h-100');
      } else {
         arrowDown.children[0]?.classList.remove('rotate-180');
         submenu.classList.remove('max-h-100');
         submenu.classList.add('max-h-0');
      }
   });
});


/* ========================================
   Sidebar Details Menus
======================================== */

const dashboardSubmenus = document.querySelectorAll('[data-submenu]');

dashboardSubmenus.forEach((submenu) => {
   submenu.addEventListener('toggle', () => {
      if (!submenu.open) return;

      dashboardSubmenus.forEach((otherSubmenu) => {
         if (otherSubmenu !== submenu) {
            otherSubmenu.open = false;
         }
      });
   });
});


/* ========================================
   Responsive Menu
======================================== */

const menu = document.getElementById('menu');

function responsive_menu(state) {
   if (!menu) return;

   if (state === 'open') {
      menu.classList.remove('opacity-0', 'invisible', '-right-full');
      menu.classList.add('right-0');
   }

   if (state === 'close') {
      menu.classList.add('opacity-0', 'invisible', '-right-full');
      menu.classList.remove('right-0');
   }
}

window.responsive_menu = responsive_menu;


/* ========================================
   Modal Auto Close
======================================== */

const modals = document.querySelectorAll('.modal');

modals.forEach((modal) => {
   setTimeout(() => {
      modal.classList.add('opacity-0', 'invisible');
   }, 5000);
});


/* ========================================
   Dashboard Mobile Sidebar
======================================== */

const hamburger_menu_dashboard_item = document.getElementById(
   'hamburger_menu_dashboard_item'
);

const hamburger_menu_dashboard_item_close = document.getElementById(
   'hamburger_menu_dashboard_item_close'
);

function hamburger_menu_dashboard(type) {
   if (
      !hamburger_menu_dashboard_item ||
      !hamburger_menu_dashboard_item_close
   ) {
      return;
   }

   const isOpen = type === 'open';

   if (isOpen) {
      hamburger_menu_dashboard_item.classList.remove('translate-x-full');

      hamburger_menu_dashboard_item_close.classList.remove(
         'invisible',
         'opacity-0',
         'pointer-events-none'
      );

      document.body.classList.add('overflow-hidden');
   }

   if (type === 'close') {
      hamburger_menu_dashboard_item.classList.add('translate-x-full');

      hamburger_menu_dashboard_item_close.classList.add(
         'invisible',
         'opacity-0',
         'pointer-events-none'
      );

      document.body.classList.remove('overflow-hidden');
   }
}

window.hamburger_menu_dashboard = hamburger_menu_dashboard;


/* ========================================
   User Profile Dropdown
======================================== */

const user_pup_up_item = document.getElementById('user_pup_up_item');

const user_pup_up_item_colse = document.getElementById(
   'user_pup_up_item_colse'
);

function user_pup_up(type) {
   if (!user_pup_up_item || !user_pup_up_item_colse) return;

   const isOpen = type === 'open'
      ? true
      : type === 'close'
         ? false
         : user_pup_up_item.classList.contains('invisible');

   if (isOpen) {
      user_pup_up_item.classList.remove(
         'invisible',
         'opacity-0',
         'max-h-0',
         'border-transparent'
      );

      user_pup_up_item.classList.add(
         'visible',
         'opacity-100',
         'max-h-[200px]',
         'border-[#edf0f2]'
      );

      user_pup_up_item_colse.classList.remove(
         'invisible',
         'opacity-0',
         'pointer-events-none'
      );

      user_pup_up_item_colse.classList.add('visible', 'opacity-100');
   } else {
      user_pup_up_item.classList.add(
         'invisible',
         'opacity-0',
         'max-h-0',
         'border-transparent'
      );

      user_pup_up_item.classList.remove(
         'visible',
         'opacity-100',
         'max-h-[200px]',
         'border-[#edf0f2]'
      );

      user_pup_up_item_colse.classList.add(
         'invisible',
         'opacity-0',
         'pointer-events-none'
      );

      user_pup_up_item_colse.classList.remove('visible', 'opacity-100');
   }
}

window.user_pup_up = user_pup_up;


/* ========================================
   Close Menus With Escape
======================================== */

document.addEventListener('keydown', (event) => {
   if (event.key !== 'Escape') return;

   hamburger_menu_dashboard('close');
   user_pup_up('close');

   dashboardSubmenus.forEach((submenu) => {
      submenu.open = false;
   });
});


/* ========================================
   Close Sidebar After Clicking A Link
======================================== */

if (hamburger_menu_dashboard_item) {
   hamburger_menu_dashboard_item
      .querySelectorAll('a')
      .forEach((link) => {
         link.addEventListener('click', () => {
            if (window.innerWidth < 1024) {
               hamburger_menu_dashboard('close');
            }
         });
      });
}


/* ========================================
   Responsive Resize
======================================== */

window.addEventListener('resize', () => {
   if (window.innerWidth >= 1024) {
      hamburger_menu_dashboard('close');
   }
});
