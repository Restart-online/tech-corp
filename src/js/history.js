import Swiper, { Navigation } from "swiper";
import "swiper/css";

const historySliderSelector = '.js-history__slider';
const historyTextSelector = '.js-history-slider__text';

document.addEventListener('DOMContentLoaded', () => {
  const slidesText = document.querySelectorAll(historyTextSelector);
  slidesText.forEach(item => item.dataset.text = item.textContent.trim());

  new Swiper(historySliderSelector, {
    modules: [Navigation],
    centeredSlides: true,
    slidesPerView: 5,
    initialSlide: 2,
    watchSlidesProgress: true,
    slideActiveClass: 'history-slider__slide--active',
    slideVisibleClass: 'history-slider__slide--visible',
    wrapperClass: 'history-slider__wrapper',
    watchSlidesVisibility: true,
    navigation: {
      nextEl: '.history-slider__arrow--next',
      prevEl: '.history-slider__arrow--prev',
    },
    on: {
      init: (swiper) => {
        swiper.slides.forEach((slide, index) => {
          const year = slide.querySelector('.history-slider__year');
          year.addEventListener('click', () => swiper.slideTo(index));
        })
      },
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 0,
      },
    },
  });
})
