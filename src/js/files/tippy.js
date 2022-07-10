// Подключение функционала "Чертогов Фрилансера"
import { isMobile, FLS } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";

// Подключение из node_modules
import tippy, {animateFill} from 'tippy.js';

// Подключение cтилей из src/scss/libs
import "../../scss/libs/tippy.scss";
import 'tippy.js/dist/tippy.css';
import 'tippy.js/themes/translucent.css';
import 'tippy.js/animations/shift-away.css';
import 'tippy.js/dist/backdrop.css';
// Подключение cтилей из node_modules
//import 'tippy.js/dist/tippy.css';

function tippyInit() {
  // Запускаем и добавляем в объект модулей
  flsModules.tippy = tippy('[data-tippy-content]', {
    theme: 'translucent',
  
  });

  
  const tariffTippys = document.querySelectorAll('[data-tariff-tippy]');
  if (tariffTippys.length) {
    tariffTippys.forEach(tariffTippy => {
      let tippyDataset = tariffTippy.dataset.tariffTippy.split('||');
      let tippyStr = '';
      tippyDataset.forEach(e => {
        let li = `<li>${e}</li>`;
        if (e.trim() !== '') {
          tippyStr+= li
        }
      })

      let tippyContent = `
        <div class="tippy-tariff">
          <ul>
            ${tippyStr}
          </ul>
        </div>`;
      console.log(tippyContent)
      flsModules.tippy = tippy(tariffTippy, {
        content: tippyContent,
        allowHTML: true,
        interactive: true,
      });
    })
  }
}
tippyInit()