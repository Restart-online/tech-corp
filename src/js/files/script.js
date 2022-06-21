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
  const iFrames = document.querySelectorAll('iframe');
  if (iFrames.length) {
    iFrames.forEach(e => {
      e.loading = 'lazy';
    })
  }
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
      if (controlVideoCase) {
        controlVideoCase.addEventListener('click', () => {
          videoCase.play();
          videoCase.controls = true;
          controlVideoCase.remove();
        })
      }
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
  const uparrow = document.querySelector('.uparrow');
  if (uparrow) {
    const offsY = uparrow.dataset.onscroll;
    window.addEventListener('scroll', () => {
      if (pageYOffset >= offsY) {
        uparrow.classList.remove('_hide');
      } else {
        uparrow.classList.add('_hide');
      }
    }) 
  }
  
  const cookies = document.querySelector('.cookies');
  const cookiesBtn = document.querySelector('.cookies__btn');
  let cookiesDelay = cookies.dataset.delay;
  let cookiesOk = sessionStorage.getItem('cookiesOk');
  cookiesBtn.addEventListener('click', function () {
  cookies.classList.add('_hide');
  sessionStorage.setItem('cookiesOk', 'ok');
  })
  if (!cookiesOk) {
      setTimeout(function () {
          cookies.classList.remove('_hide');
      }, cookiesDelay);
  } else {
    cookies.remove();
  }
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
  const directionsInputIcon = directionsInput.parentElement.querySelector('.search-directions__icon');
  if (directionsInputIcon) {
    directionsInputIcon.addEventListener('click', () => {
      directionsInput.value = '';
      directionsInput.parentElement.nextElementSibling.focus();
      directionSearchInput(directionsInput, directionsItems, servicesNavigation, servicesItems, servicesItemsParent, directionsInputIcon);
    })
  }
  directionsInput.addEventListener('input', (event) => {
    event.preventDefault();
    directionSearchInput(directionsInput, directionsItems, servicesNavigation, servicesItems, servicesItemsParent, directionsInputIcon);
  })
  directionsInput.addEventListener('change', (event) => {
    event.preventDefault();
    directionSearchInput(directionsInput, directionsItems, servicesNavigation, servicesItems, servicesItemsParent, directionsInputIcon);
  })
}

function directionSearchInput(directionsInput, directionsItems, servicesNavigation, servicesItems, servicesItemsParent, directionsInputIcon) {
  const directionsResult = document.querySelector('.search-directions__result');
  directionsItems.forEach(directionsItem => {
    let arr = [];
    let directionsItemText = directionsItem.querySelector('.tabs-directions__text').textContent;
    let directionsInputValue = directionsInput.value;
    const grayBg = document.querySelector('.directions__gray');
    if (directionsInputValue.length > 0) {
      if (document.querySelector('.tabs-directions__navigation') && window.innerWidth <= 767) {
        document.querySelector('.tabs-directions__navigation').hidden = true;
      }
      if (directionsItemText.toUpperCase().indexOf(directionsInputValue.toUpperCase()) >= 0) {
        directionsItem.hidden = false;
      } else {
        directionsItem.hidden = true;
      }
      if (servicesItemsParent) {
        servicesNavigation.hidden = true;
        servicesItemsParent.hidden = false;
        servicesItems.forEach(el => {
          el.hidden = false;
          el.querySelector('.item-services__back').hidden = true;
        })
      }
      if (document.querySelectorAll('.tabs-directions__title').length) {
        document.querySelectorAll('.tabs-directions__title').forEach(e => {
          e.style = 'opacity: 0';
        })
        document.querySelectorAll('.tabs-directions__body').forEach(e => {
          e.style.setProperty("display", "flex", "important");
          if (e.offsetHeight > 17) {
            e.style.setProperty("padding-bottom", "1rem");
          } else {
            e.style.removeProperty("padding-bottom");
          }
        })
      }
      directionsItems.forEach(directionsItem => {
        if (!directionsItem.hidden) {
          arr.push(directionsItem)
        }
      })
  
      if (arr.length > 0) {
        if (directionsResult) {
          // directionsResult.innerHTML = `Количество найденных совпадений: ${arr.length}`;
          directionsResult.innerHTML = `Количество найденных совпадений: ${arr.length}`;
        }
        if (servicesItemsParent) {
          servicesItems.forEach(el => {
            el.querySelector('.item-services__back').hidden = true;
          })
        }
      } else {
        if (directionsResult) {
          directionsResult.innerHTML = `К сожалению, на ваш поисковый запрос ничего не найдено. Попробуйте ввести другой запрос.`;
          directionsResult.parentElement.style = 'gap: 11px;';
        }
        if (servicesItemsParent) {
          servicesNavigation.hidden = true;
          servicesItemsParent.hidden = true;
          servicesItems.forEach(el => {
            el.hidden = false;
            el.querySelector('.item-services__back').hidden = false;
          })
        }
      }
      if (directionsInputIcon) {
        directionsInputIcon.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M24 9.4L22.6 8L16 14.6L9.4 8L8 9.4L14.6 16L8 22.6L9.4 24L16 17.4L22.6 24L24 22.6L17.4 16L24 9.4Z" fill="#BCBEC0"/>
        </svg>`;
      }
      if (grayBg) {
        const findedItems = document.querySelectorAll('.tabs-directions__body');
        let findedItemsHeight = 0;
        findedItems.forEach(e => {
          findedItemsHeight = findedItemsHeight + e.offsetHeight;
        })
        grayBg.style = `height: calc(34% + ${findedItemsHeight}px);`
      }
    } else if (directionsInputValue.length <= 0) {
      directionsItem.hidden = false;
      if (document.querySelector('.tabs-directions__navigation') && window.innerWidth <= 767) {
        document.querySelector('.tabs-directions__navigation').hidden = false;
      }
      if (directionsResult) {
        directionsResult.innerHTML = '';
        directionsResult.parentElement.style = 'gap: 11px;';
      }
      if (servicesItemsParent) {
        servicesNavigation.hidden = false;
        servicesItemsParent.hidden = true;
        servicesItems.forEach(el => {
          el.hidden = true;
          el.querySelector('.item-services__back').hidden = false;
        })
      }
      if (document.querySelectorAll('.tabs-directions__title').length) {
        document.querySelectorAll('.tabs-directions__title').forEach(e => {
          e.style = '';
        })
        document.querySelectorAll('.tabs-directions__body').forEach(e => {
          e.style = '';
        })
      }
      if (directionsInputIcon) {
        directionsInputIcon.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z" stroke="#BCBEC0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M15 15L21 21" stroke="#BCBEC0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        `;
      }
      if (grayBg) {
        grayBg.style = `height: 100%`
      }
    }
  });
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
    headerMenu.querySelector('.menu__list').style = `height: calc(80vh - ${headerHeight}px)`
    document.querySelector('.bottom-header__closemenu').style = `top: ${headerHeight}px; height: calc(100vh - ${headerHeight}px)`
  } else {
    headerMenu.style = ``
    headerMenu.querySelector('.menu__list').style = ``
    document.querySelector('.bottom-header__closemenu').style = ``
  }

}

function hideShowCases(casesNavItems) {
  const casesNavItemsChecks = document.querySelectorAll('[data-cases-nav]:checked');
  const casesItems = document.querySelectorAll('[data-cases-item]');
  casesItems.forEach(el => {
    el.hidden = true;
  })
  let arrItems = [];
  if (casesNavItemsChecks.length == 0) {
    casesItems.forEach(el => {
      arrItems.push(el);
    })
  } else {
    casesNavItems.forEach(e => {
      if (e.checked) {
        let casesNavTheme = e.getAttribute('data-cases-nav');
        if (casesNavTheme === 'all') {
          casesNavItems.forEach(elem => {
            elem.checked = true;
          })
        }
        casesItems.forEach(el => {
          let casesItemTheme = el.getAttribute('data-cases-item').split('||');
          console.log(casesItemTheme)
          if (casesItemTheme.some(el => el === casesNavTheme)) {
            arrItems.push(el);
          }
        })
      }
    })
  }
  arrItems.forEach(element => {
    element.hidden = false
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
        if (popupInput) {
          popupInput.value = popupInfo;
        }
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