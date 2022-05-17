// Подключение функционала "Чертогов Фрилансера"
import { isMobile } from "./functions.js";
import { _slideDown } from "./functions.js";
import { _slideUp } from "./functions.js";
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
    menuSublinks.forEach(menuSublink => {
      const menuSubmenu = menuSublink.parentElement.querySelector('.menu__submenu');
      submenuHidden(menuSubmenu);
      window.addEventListener('resize', () => {
        submenuHidden(menuSubmenu);
      })
      menuSublink.addEventListener('click', (e) => {
        if (isMobile.any()) {
          e.preventDefault();
          menuSubmenu.classList.toggle('_active');
          document.documentElement.classList.toggle('submenu-open');
          if (menuSubmenu.classList.contains('_active')) {
            _slideDown(menuSubmenu);
          } else {
            _slideUp(menuSubmenu);
          }
        }
      })
    })
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
})


function submenuHidden(menuSubmenu) {
  if (isMobile.any()) {
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