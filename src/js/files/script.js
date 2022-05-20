// Подключение функционала "Чертогов Фрилансера"
import { isMobile } from "./functions.js";
import { _slideDown } from "./functions.js";
import { _slideUp } from "./functions.js";
import { _slideToggle } from "./functions.js";
import { bodyLockToggle } from "./functions.js";
import { menuClose } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";


document.addEventListener('DOMContentLoaded', () => {
  const headerSearch = document.querySelector('.search-header');
  if (headerSearch) {
    const headerSearchIcon = document.querySelector('.search-header__icon');
    const headerSearchInput = document.querySelector('.search-header__input');
    headerSearchIcon.addEventListener('click', (e) => {
      headerSearchInput.classList.toggle('_active');
      headerSearchIcon.classList.toggle('_active');
    })
  }
  const menuSublinks = document.querySelectorAll('.menu__link_sub');
  if (menuSublinks.length) {
    headerSubMenuActions(menuSublinks);
  }
  const headerMenu = document.querySelector('.header__menu');
  if (headerMenu) {
    headerMenuTop(headerMenu);
    window.addEventListener('resize', () => {
      headerMenuTop(headerMenu);
    });
    document.querySelector('.bottom-header__closemenu').addEventListener('click', () => {
      menuClose();
    })
  }
  const casesNavItems = document.querySelectorAll('[data-cases-nav]');
  if (casesNavItems.length) {
    hideShowCases(casesNavItems);
    casesNavItems.forEach(e => {
      e.addEventListener('change', () => {
        hideShowCases(casesNavItems);
      })
    })
  }

  
  document.addEventListener('click', (e) => {
    if (!e.target.classList.contains('menu__link_sub') && !e.target.closest('.menu__submenu')) {
      setTimeout(() => {
        document.documentElement.classList.remove('submenu-open');
      }, 500);
      document.querySelectorAll('.menu__submenu').forEach(e => {
        _slideUp(e);
        setTimeout(() => {
          e.classList.remove('_active')
        }, 500);
      })
    }
  })
})

function headerSubMenuActions(menuSublinks) {
  menuSublinks.forEach(menuSublink => {
    const menuSubmenu = menuSublink.parentElement.querySelector('.menu__submenu');
    submenuHidden(menuSubmenu);
    window.addEventListener('resize', () => {
      submenuHidden(menuSubmenu);
    })
    menuSublink.addEventListener('click', (e) => {
      e.preventDefault();
      if (window.innerWidth > 767) {
        bodyLockToggle();
      }
      if (menuSubmenu.classList.contains('_active')) {
        setTimeout(() => {
          menuSubmenu.classList.remove('_active');
          document.documentElement.classList.remove('submenu-open');
        }, 300);
        _slideToggle(menuSubmenu);
      } else {
        document.documentElement.classList.add('submenu-open');
        menuSubmenu.classList.add('_active');
        _slideToggle(menuSubmenu);
      }
    })
  });
  const subSubMenuBacks = document.querySelectorAll('.sub-submenu__item_back');
  subSubMenuBacks.forEach(el => {
    el.addEventListener('click', (ev) => {
      _slideToggle(el.parentElement);
      el.parentElement.previousElementSibling.classList.remove('_spoller-active');
      console.log(el.parentElement.previousElementSibling)
    })
  })
}


function submenuHidden(menuSubmenu) {
  if (!menuSubmenu.classList.contains('_active')) {
    menuSubmenu.hidden = true;
  } else {
    menuSubmenu.hidden = false;
  }
}

function headerMenuTop(headerMenu) {
  const headerHeight = document.querySelector('header').offsetHeight;
  if (window.innerWidth <= 767) {
    headerMenu.style = `top: ${headerHeight}px; height: calc(100vh - ${headerHeight}px)`
    headerMenu.querySelector('.menu__list').style = `height: calc(100vh - ${headerHeight}px)`
    document.querySelector('.bottom-header__closemenu').style = `top: ${headerHeight}px; height: calc(100vh - ${headerHeight}px)`
  } else {
    headerMenu.style = ``
    headerMenu.querySelector('.menu__list').style = ``
    document.querySelector('.bottom-header__closemenu').style = ``
  }

}

function hideShowCases(casesNavItems) {
  const casesNavItemsChecks = document.querySelectorAll('[data-cases-nav');
  const casesItems =document.querySelectorAll('[data-cases-item]');
  casesNavItems.forEach(e => {
    if (e.checked) {
      let casesNavTheme = e.getAttribute('data-cases-nav');
      casesItems.forEach(el => {
        let casesItemTheme = el.getAttribute('data-cases-item');
        if (casesNavTheme === casesItemTheme) {
          el.hidden = false;
        }
      })
    }
    else {
      let casesNavTheme = e.getAttribute('data-cases-nav');
      casesItems.forEach(el => {
        let casesItemTheme = el.getAttribute('data-cases-item');
        if (casesNavTheme === casesItemTheme) {
          el.hidden = true;
        }
      })
    }
  })
}


document.addEventListener("afterPopupOpen", function (e) {
	// Попап
  const currentPopup = e.detail.popup;
  if (currentPopup.targetOpen.element.classList.contains('blueButtonPopup')) {
    let popupTitle = currentPopup.targetOpen.element.querySelector('.footer__title');
    let popupInput = currentPopup.targetOpen.element.querySelector('.blueButtonPopup_hidden');
    if (currentPopup.lastFocusEl) {
      if (currentPopup.lastFocusEl.getAttribute('data-popup-info')) {
        let popupInfo = currentPopup.lastFocusEl.getAttribute('data-popup-info');
        popupTitle.innerHTML = popupInfo;
        popupInput.value = popupInfo;
      } else {
        setTimeout(() => {
          currentPopup.targetOpen.element.querySelector('[data-close]').click();
        }, 500);
        setTimeout(() => {
          alert('На кнопке должен быть атрибут data-popup-info, обратитесь в поддержку')
        }, 600);
      }
    } else {
      setTimeout(() => {
        currentPopup.targetOpen.element.querySelector('[data-close]').click();
      }, 500);
      setTimeout(() => {
        alert('Только по клику на синюю кнопку!')
      }, 600);
    }
  }
});