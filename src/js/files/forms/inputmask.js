/* Маски для полей (в работе) */

// Подключение функционала "Чертогов Фрилансера"
// Подключение списка активных модулей
import { flsModules } from "../modules.js";

// Подключение модуля
import "inputmask/dist/inputmask.min.js";

function inputMasksInit() {
	const inputMasks = document.querySelectorAll('[data-inputmask]');
	if (inputMasks.length) {
		flsModules.inputmask = Inputmask({
			showMaskOnHover: false,
		}).mask(inputMasks);
	}
}

inputMasksInit();