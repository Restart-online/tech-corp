/*
Документация по работе в шаблоне: 
Документация слайдера: https://swiperjs.com/
Сниппет(HTML): swiper
*/

// Подключаем слайдер Swiper из node_modules
// При необходимости подключаем дополнительные модули слайдера, указывая их в {} через запятую
// Пример: { Navigation, Autoplay }
import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';
/*
Основниые модули слайдера:
Navigation, Pagination, Autoplay, 
EffectFade, Lazy, Manipulation
Подробнее смотри https://swiperjs.com/
*/

// Стили Swiper
// Базовые стили
import "../../scss/base/swiper.scss";
// Полный набор стилей из scss/libs/swiper.scss
// import "../../scss/libs/swiper.scss";
// Полный набор стилей из node_modules
// import 'swiper/css';

// Инициализация слайдеров
function initSliders() {
	// Перечень слайдеров
	// Проверяем, есть ли слайдер на стронице
	if (document.querySelector('.about-docs__slider')) { // Указываем скласс нужного слайдера
		// Создаем слайдер
		new Swiper('.about-docs__slider', { // Указываем скласс нужного слайдера
			// Подключаем модули слайдера
			// для конкретного случая
			modules: [Navigation, Pagination, Autoplay],
			observer: true,
			observeParents: true,
			slidesPerView: 3,
			spaceBetween: 60,
			speed: 800,
			autoHeight: false,

			//touchRatio: 0,
			//simulateTouch: false,
			//loop: true,
			//preloadImages: false,
			//lazy: true,

			/*
			// Эффекты
			effect: 'fade',
			*/
			autoplay: {
				delay: 3000,
				disableOnInteraction: true,
			},

			// Пагинация
			pagination: {
				el: '.about-docs__pagination',
				type: 'fraction',
			},

			// Скроллбар
			/*
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			},
			*/

			// Кнопки "влево/вправо"
			navigation: {
				prevEl: '.about-docs__navigation .swiper-button-prev',
				nextEl: '.about-docs__navigation .swiper-button-next',
			},

			// Брейкпоинты
			breakpoints: {
				320: {
					slidesPerView: 1,
					spaceBetween: 0,
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				992: {
					slidesPerView: 3,
					spaceBetween: 20,
				},
				1268: {
					spaceBetween: 30,
				},
			},
			// События
			on: {

			}
		});
	}
	if (document.querySelector('.body-sertificats__slider')) { // Указываем скласс нужного слайдера
		// Создаем слайдер
		new Swiper('.body-sertificats__slider', { // Указываем скласс нужного слайдера
			// Подключаем модули слайдера
			// для конкретного случая
			modules: [Navigation, Pagination, Autoplay],
			observer: true,
			observeParents: true,
			slidesPerView: 1,
			spaceBetween: 20,
			speed: 800,
			simulateTouch: false,

			//touchRatio: 0,
			//simulateTouch: false,
			//loop: true,
			//preloadImages: false,
			//lazy: true,

			/*
			// Эффекты
			effect: 'fade',
			*/
			// autoplay: {
			// 	delay: 3000,
			// 	disableOnInteraction: true,
			// },

			// Пагинация
			pagination: {
				el: '.body-sertificats__pagination',
				type: 'fraction',
			},

			// Скроллбар
			/*
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			},
			*/

			// Кнопки "влево/вправо"
			navigation: {
				prevEl: '.body-sertificats__navigation .swiper-button-prev',
				nextEl: '.body-sertificats__navigation .swiper-button-next',
			},

			// Брейкпоинты
			// breakpoints: {
			// 	320: {
			// 		slidesPerView: 1,
			// 		spaceBetween: 0,
			// 		autoHeight: true,
			// 	},
			// 	768: {
			// 		slidesPerView: 2,
			// 		spaceBetween: 20,
			// 	},
			// 	992: {
			// 		slidesPerView: 3,
			// 		spaceBetween: 20,
			// 	},
			// 	1268: {
			// 		spaceBetween: 30,
			// 	},
			// },
			// События
			on: {

			}
		});
	}
	if (document.querySelector('.videocases__slider')) { // Указываем скласс нужного слайдера
		// Создаем слайдер
		new Swiper('.videocases__slider', { // Указываем скласс нужного слайдера
			// Подключаем модули слайдера
			// для конкретного случая
			modules: [Navigation, Pagination, Autoplay],
			observer: true,
			observeParents: true,
			slidesPerView: 1,
			spaceBetween: 60,
			speed: 800,

			//touchRatio: 0,
			//simulateTouch: false,
			//loop: true,
			//preloadImages: false,
			//lazy: true,

			/*
			// Эффекты
			effect: 'fade',
			*/
			// autoplay: {
			// 	delay: 3000,
			// 	disableOnInteraction: true,
			// },

			// Пагинация
			pagination: {
				el: '.videocases__pagination',
				type: 'fraction',
			},

			// Скроллбар
			/*
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			},
			*/

			// Кнопки "влево/вправо"
			navigation: {
				prevEl: '.videocases__arrows .videocases_arrow_prev',
				nextEl: '.videocases__arrows .videocases_arrow_next',
			},

			// Брейкпоинты
			// breakpoints: {
			// 	320: {
			// 		slidesPerView: 1,
			// 		spaceBetween: 0,
			// 		autoHeight: true,
			// 	},
			// 	768: {
			// 		slidesPerView: 2,
			// 		spaceBetween: 20,
			// 	},
			// 	992: {
			// 		slidesPerView: 3,
			// 		spaceBetween: 20,
			// 	},
			// 	1268: {
			// 		spaceBetween: 30,
			// 	},
			// },
			// События
			on: {

			}
		});
	}
	if (document.querySelector('.home-reviews__slider')) { // Указываем скласс нужного слайдера
		// Создаем слайдер
		new Swiper('.home-reviews__slider', { // Указываем скласс нужного слайдера
			// Подключаем модули слайдера
			// для конкретного случая
			modules: [Navigation, Pagination, Autoplay],
			observer: true,
			observeParents: true,
			slidesPerView: 3,
			spaceBetween: 60,
			speed: 800,

			//touchRatio: 0,
			//simulateTouch: false,
			//loop: true,
			//preloadImages: false,
			//lazy: true,

			/*
			// Эффекты
			effect: 'fade',
			*/
			// autoplay: {
			// 	delay: 3000,
			// 	disableOnInteraction: true,
			// },

			// Пагинация
			pagination: {
				el: '.home-reviews__body .videocases__pagination',
				type: 'fraction',
			},

			// Скроллбар
			/*
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			},
			*/

			// Кнопки "влево/вправо"
			navigation: {
				prevEl: '.home-reviews__body .videocases_arrow_prev',
				nextEl: '.home-reviews__body .videocases_arrow_next',
			},

			// Брейкпоинты
			breakpoints: {
				319: {
					slidesPerView: 1,
					spaceBetween: 0,
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				992: {
					slidesPerView: 3,
					spaceBetween: 20,
				},
				1268: {
					spaceBetween: 60,
				},
			},
			// События
			on: {

			}
		});
	}
	if (document.querySelector('.partners__slider')) { // Указываем скласс нужного слайдера
		// Создаем слайдер
		new Swiper('.partners__slider', { // Указываем скласс нужного слайдера
			// Подключаем модули слайдера
			// для конкретного случая
			modules: [Navigation, Pagination, Autoplay],
			observer: true,
			observeParents: true,
			slidesPerView: 3,
			spaceBetween: 60,
			speed: 800,
			autoHeight: false,

			//touchRatio: 0,
			//simulateTouch: false,
			//loop: true,
			//preloadImages: false,
			//lazy: true,

			/*
			// Эффекты
			effect: 'fade',
			*/
			// autoplay: {
			// 	delay: 3000,
			// 	disableOnInteraction: true,
			// },

			// Пагинация
			pagination: {
				el: '.partners__body .partners__pagination',
				type: 'fraction',
			},

			// Скроллбар
			/*
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			},
			*/

			// Кнопки "влево/вправо"
			navigation: {
				prevEl: '.partners__body .partners_arrow_prev',
				nextEl: '.partners__body .partners_arrow_next',
			},

			// Брейкпоинты
			breakpoints: {
				319: {
					slidesPerView: 1,
					spaceBetween: 0,
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				992: {
					slidesPerView: 3,
					spaceBetween: 20,
				},
				1268: {
					spaceBetween: 60,
				},
			},
			// События
			on: {

			}
		});
	}
}
// Скролл на базе слайдера (по классу swiper_scroll для оболочки слайдера)
function initSlidersScroll() {
	let sliderScrollItems = document.querySelectorAll('.swiper_scroll');
	if (sliderScrollItems.length > 0) {
		for (let index = 0; index < sliderScrollItems.length; index++) {
			const sliderScrollItem = sliderScrollItems[index];
			const sliderScrollBar = sliderScrollItem.querySelector('.swiper-scrollbar');
			const sliderScroll = new Swiper(sliderScrollItem, {
				observer: true,
				observeParents: true,
				direction: 'vertical',
				slidesPerView: 'auto',
				freeMode: {
					enabled: true,
				},
				scrollbar: {
					el: sliderScrollBar,
					draggable: true,
					snapOnRelease: false
				},
				mousewheel: {
					releaseOnEdges: true,
				},
			});
			sliderScroll.scrollbar.updateSize();
		}
	}
}

window.addEventListener("load", function (e) {
	// Запуск инициализации слайдеров
	initSliders();
	// Запуск инициализации скролла на базе слайдера (по классу swiper_scroll)
	//initSlidersScroll();
});