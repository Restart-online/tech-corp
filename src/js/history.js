import Swiper  from "swiper";
import "swiper/css";

const historySelector = '.js-history__slider';
const historyTextSelector = '.js-history-slider__text';

document.addEventListener('DOMContentLoaded', () => {
  const slidesText = document.querySelectorAll(historyTextSelector);
  slidesText.forEach(item => item.dataset.text = item.textContent.trim());

  new Swiper(historySelector, {
    loop: true,
    loopedSlides: 20,
    slidesPerView: 5,
    watchSlidesProgress: true,
    slideActiveClass: 'history-slider__slide--active',
    slideVisibleClass: 'history-slider__slide--visible',
    wrapperClass: 'history-slider__wrapper',
    watchSlidesVisibility: true,
    on: {
      init: (swiper) => {
        swiper.slides.forEach((slide, index) => {
          const year = slide.querySelector('.history-slider__year');
          year.addEventListener('click', () => swiper.slideToLoop(index));
        })
      },
    },
  });
})
