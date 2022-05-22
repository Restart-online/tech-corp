import Swiper, { EffectFade, Navigation, Pagination, Thumbs } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

import EvilAccordion from './files/accordion.js';

const carouselSelector = '.js-article-slider__left';
const gallerySelector = '.js-article-slider__right';

document.addEventListener('DOMContentLoaded', () => {
  const accordions = document.querySelectorAll('.evil-accordion');
  accordions.forEach((accordion) => new EvilAccordion(accordion, {
    opened: [0],
  }));

  const gallery = new Swiper(gallerySelector, {
    modules: [EffectFade],
    loop: true,
    effect: 'fade',
    allowTouchMove: false,
  });

  new Swiper(carouselSelector, {
    modules: [Navigation, Pagination, Thumbs],
    loop: true,
    autoHeight: true,
    spaceBetween: 10,
    simulateTouch: false,
    navigation: {
      nextEl: '.article-slider__arrow--next',
      prevEl: '.article-slider__arrow--prev',
    },
    pagination: {
      el: '.article-slider__pagination',
      type: 'fraction',
    },
    thumbs: {
      swiper: gallery,
    },
  });
})
