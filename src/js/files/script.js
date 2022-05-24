// Подключение функционала "Чертогов Фрилансера"
import { isMobile } from "./functions.js";
import { _slideDown } from "./functions.js";
import { _slideUp } from "./functions.js";
import { _slideToggle } from "./functions.js";
import { _slideLeft } from "./functions.js";
import { bodyLockToggle } from "./functions.js";
import { bodyUnlock } from "./functions.js";
import { menuClose } from "./functions.js";
import { formValidate } from "./forms/forms.js";
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

  const videoCasesEls = document.querySelectorAll('.videocases__slide');
  if (videoCasesEls.length) {
    videoCasesEls.forEach(e => {
      const videoCase = e.querySelector('video');
      const controlVideoCase = e.querySelector('.slide-videocases__control');
      controlVideoCase.addEventListener('click', () => {
        videoCase.play();
        videoCase.controls = true;
        controlVideoCase.remove();
      })
    })
  }

  const reviewFileInput = document.querySelector('.callback-footer__fileinput');
  if (reviewFileInput) {
    const reviewFilePreview = document.querySelector('.callback-footer__preview');
    reviewFileInput.addEventListener('change', () => {
      reviewPreviewRender(reviewFileInput, reviewFilePreview);
    })
  }
  
  const directionsInput = document.querySelector('.search-directions__input');
  if (directionsInput) {
    directionsSearch(directionsInput);
  }
  const servicesTitles = document.querySelectorAll('.title-services');
  if (servicesTitles.length) {
    servicesActions(servicesTitles);
  }

  
  document.addEventListener('click', (e) => {
    if (!e.target.classList.contains('menu__link_sub') && !e.target.closest('.menu__submenu')) {
      bodyUnlock();
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


function servicesActions(servicesTitles) {
  const servicesNavigation = document.querySelector('.body-services__navigation')
  const servicesItems = document.querySelectorAll('.item-services');
  const servicesItemsParent = document.querySelector('.body-services__items');
  for (let i = 0; i < servicesTitles.length; i++) {
    servicesTitles[i].addEventListener('click', () => {
      let servicesIndex = i;
      servicesNavigation.hidden = true;
      servicesItemsParent.hidden = false;
      servicesItems[servicesIndex].hidden = false;
      servicesItems[servicesIndex].querySelector('.item-services__back').addEventListener('click', () => {
        servicesItems[servicesIndex].hidden = true;
        servicesItemsParent.hidden = true;
        servicesNavigation.hidden = false;
      })
    })
  }
}

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
    })
  })
}

function directionsSearch(directionsInput) {
  const directionsItems = document.querySelectorAll('.tabs-directions__item');
  const servicesNavigation = document.querySelector('.body-services__navigation')
  const servicesItems = document.querySelectorAll('.item-services');
  const servicesItemsParent = document.querySelector('.body-services__items');
  directionsInput.addEventListener('input', () => {
    const directionsResult = document.querySelector('.search-directions__result');
    let arr = [];
    directionsItems.forEach(directionsItem => {
      let directionsItemText = directionsItem.querySelector('.tabs-directions__text').textContent;
      let directionsInputValue = directionsInput.value;
      if (directionsInputValue.length > 0) {
        if (directionsItemText.trim().toUpperCase().indexOf(directionsInputValue.trim().toUpperCase()) >= 0) {
          directionsItem.hidden = false;
        } else {
          directionsItem.hidden = true;
        }
        if (document.querySelector('.page__services')) {
          servicesNavigation.hidden = true;
          servicesItemsParent.hidden = false;
          servicesItems.forEach(el => {
            el.hidden = false;
            el.querySelector('.item-services__back').hidden = true;
          })
        }
        directionsItems.forEach(directionsItem => {
          if (!directionsItem.hidden) {
            arr.push(directionsItem)
          }
        })
    
        if (arr.length > 0) {
          if (directionsResult) {
            directionsResult.innerHTML = `Найдено ${arr.length} результата`;
          }
          if (document.querySelector('.page__services')) {
            servicesItems.forEach(el => {
              el.querySelector('.item-services__back').hidden = true;
            })
          }
        } else {
          if (directionsResult) {
            directionsResult.innerHTML = `К сожалению, на ваш поисковый запрос ничего не найдено. Попробуйте ввести другой запрос.`;
          }
          if (document.querySelector('.page__services')) {
            servicesNavigation.hidden = true;
            servicesItemsParent.hidden = true;
            servicesItems.forEach(el => {
              el.hidden = false;
              el.querySelector('.item-services__back').hidden = false;
            })
          }
        }
      } else if (directionsInputValue.length <= 0) {
        directionsItem.hidden = false;
        directionsResult.innerHTML = '';
        if (document.querySelector('.page__services')) {
          servicesNavigation.hidden = false;
          servicesItemsParent.hidden = true;
          servicesItems.forEach(el => {
            el.hidden = true;
            el.querySelector('.item-services__back').hidden = false;
          })
        }
      }
    });
    
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

function reviewPreviewRender(reviewFileInput, reviewFilePreview) {
  let maxsize = reviewFileInput.dataset.maxsize * 1048576;
  let accept = reviewFileInput.getAttribute("accept")
  let file = reviewFileInput.files[0];
  let formaterror = reviewFileInput.dataset.formaterror;
  let sizeerror = reviewFileInput.dataset.sizeerror;
  reviewFileInput.parentElement.nextElementSibling.focus();
  if (file.size <= maxsize && file.type === accept) {
    reviewFilePreview.insertAdjacentHTML('beforeend', `
    <div class="item-reviews__file file-reviews">
      <div class="file-reviews__icon">
        <img src="@img/sertificates/file_icon.svg" alt="image">
      </div>
      <div class="file-reviews__body">
        <div class="file-reviews__gray">${file.name}</div>
      </div>
    </div>
    `);
  } else {
    if (formaterror && file.type !== accept && file.size <= maxsize) {
      reviewFileInput.parentElement.classList.add('_form-error');
      reviewFileInput.parentElement.insertAdjacentHTML('beforeend', `<div class="form__error">${formaterror}</div>`);
    } else if (sizeerror && file.type === accept && file.size > maxsize) {
      reviewFileInput.parentElement.classList.add('_form-error');
      reviewFileInput.parentElement.insertAdjacentHTML('beforeend', `<div class="form__error">${sizeerror}</div>`);
    } else if (sizeerror && formaterror) {
      reviewFileInput.parentElement.classList.add('_form-error');
      reviewFileInput.parentElement.insertAdjacentHTML('beforeend', `<div class="form__error">${sizeerror}</div>`);
      reviewFileInput.parentElement.insertAdjacentHTML('beforeend', `<div class="form__error">${formaterror}</div>`);
    }
  }
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