
// Dashboard Sidebar
const sidebar = document.getElementById('hamburger_menu_dashboard_item');
const sidebarOverlay = document.getElementById('hamburger_menu_dashboard_item_close');

function hamburger_menu_dashboard(state) {
   if (!sidebar || !sidebarOverlay) return;

   const isOpen = state === 'open';

   sidebar.classList.toggle('!translate-x-0', isOpen);
   sidebarOverlay.classList.toggle('!visible', isOpen);
   sidebarOverlay.classList.toggle('!opacity-100', isOpen);

   document.body.classList.toggle('overflow-hidden', isOpen);
}

// Dashboard Submenus
const submenuToggles = document.querySelectorAll('[data-submenu-toggle]');

function setSubmenu(toggle, isOpen) {
   const submenu = toggle.nextElementSibling;
   const arrow = toggle.querySelector('[data-submenu-arrow]');

   if (!submenu || !submenu.matches('[data-submenu]')) return;

   toggle.setAttribute('aria-expanded', String(isOpen));
   arrow?.classList.toggle('rotate-180', isOpen);

   if (isOpen) {
      const wasHidden = submenu.hidden;

      submenu.hidden = false;

      if (wasHidden) {
         submenu.style.maxHeight = '0px';

         requestAnimationFrame(() => {
            if (toggle.getAttribute('aria-expanded') === 'true') {
               submenu.style.maxHeight = `${submenu.scrollHeight}px`;
            }
         });
      } else {
         submenu.style.maxHeight = `${submenu.scrollHeight}px`;
      }

      submenu.addEventListener('transitionend', function handleOpen(event) {
         if (event.propertyName !== 'max-height') return;

         submenu.removeEventListener('transitionend', handleOpen);

         if (toggle.getAttribute('aria-expanded') === 'true') {
            submenu.style.maxHeight = 'none';
         }
      });

      return;
   }

   if (submenu.hidden) {
      submenu.style.maxHeight = '0px';
      return;
   }

   submenu.style.maxHeight = `${submenu.scrollHeight}px`;

   requestAnimationFrame(() => {
      if (toggle.getAttribute('aria-expanded') === 'false') {
         submenu.style.maxHeight = '0px';
      }
   });

   submenu.addEventListener('transitionend', function handleClose(event) {
      if (event.propertyName !== 'max-height') return;

      submenu.removeEventListener('transitionend', handleClose);

      if (toggle.getAttribute('aria-expanded') === 'false') {
         submenu.hidden = true;
      }
   });
}

// Initialize Submenus
submenuToggles.forEach((toggle) => {
   const submenu = toggle.nextElementSibling;

   if (!submenu || !submenu.matches('[data-submenu]')) return;

   submenu.hidden = true;
   submenu.style.maxHeight = '0px';
   toggle.setAttribute('aria-expanded', 'false');

   toggle.querySelector('[data-submenu-arrow]')?.classList.remove('rotate-180');

   toggle.addEventListener('click', () => {
      const isOpen = toggle.getAttribute('aria-expanded') === 'true';

      submenuToggles.forEach((item) => {
         if (item !== toggle) {
            setSubmenu(item, false);
         }
      });

      setSubmenu(toggle, !isOpen);
   });
});

// Open Submenu Containing Active Route
document.querySelectorAll('[data-submenu]').forEach((submenu) => {
   const activeLink = submenu.querySelector('[data-active="true"]');

   if (!activeLink) return;

   const toggle = submenu.previousElementSibling;

   if (toggle?.matches('[data-submenu-toggle]')) {
      setSubmenu(toggle, true);
   }
});

// User Dropdown
const userDropdown = document.getElementById('user_pup_up_item');
const userDropdownArrow = document.getElementById('user_dropdown_arrow');
const userContainer = document.getElementById('user_dropdown');

function closeUserDropdown() {
   userDropdown?.classList.remove(
      '!visible',
      '!opacity-100',
      '!translate-y-0'
   );

   userDropdownArrow?.classList.remove('rotate-180');
}

function user_pup_up() {
   if (!userDropdown) return;

   const isOpen = userDropdown.classList.contains('!visible');

   userDropdown.classList.toggle('!visible', !isOpen);
   userDropdown.classList.toggle('!opacity-100', !isOpen);
   userDropdown.classList.toggle('!translate-y-0', !isOpen);

   userDropdownArrow?.classList.toggle('rotate-180', !isOpen);
}

// Close User Dropdown on Outside Click
document.addEventListener('click', (event) => {
   if (userContainer && !userContainer.contains(event.target)) {
      closeUserDropdown();
   }
});

// Close Mobile Sidebar on Link Click
sidebar?.querySelectorAll('a').forEach((link) => {
   link.addEventListener('click', () => {
      if (window.innerWidth <= 1023) {
         hamburger_menu_dashboard('close');
      }
   });
});

// Close Sidebar and User Dropdown on Escape
document.addEventListener('keydown', (event) => {
   if (event.key !== 'Escape') return;

   hamburger_menu_dashboard('close');
   closeUserDropdown();
});

// Modal Auto Close
document.querySelectorAll('.modal').forEach((modal) => {
   setTimeout(() => {
      modal.classList.add('opacity-0', 'invisible');
   }, 3000);
});
