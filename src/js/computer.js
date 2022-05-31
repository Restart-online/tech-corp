import nouislider from "nouislider";
import "nouislider/dist/nouislider.min.css";

document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('[data-popup]');

  [...buttons].forEach(button => {
    button.addEventListener('click', () => {
      const parentBlock = button.closest('.js-tariff');

      if (!parentBlock) return null;

      const inputTariffName = document.querySelector(`input[data-name="tariff"]`);
      const inputTariffPrice = document.querySelector(`input[data-name="price"]`);
      const tariffName = parentBlock.querySelector(".js-tariff__name");
      const tariffPrice = parentBlock.querySelector(".js-tariff__price");

      if (inputTariffName && tariffName) {
        inputTariffName.value = parentBlock.querySelector(".js-tariff__name").textContent;
      }
      if (inputTariffPrice && tariffPrice) {
        inputTariffPrice.value = parentBlock.querySelector(".js-tariff__price").textContent;
      }
    });
  });

  new EvilRangeCreator();
});

function EvilRangeCreator(config) {
  this.defaultConfig = {
    step: 1,
    start: 10,
    min: 0,
    max: 10,
  };

  this.classNameRage = config?.className || 'js-tariff__range';
  this.classNameTariff = config?.classNameTariff || 'js-tariff';
  this.classNameUnique = config?.classNameUnique || 'js-tariff__unique';
  this.classNameUniqueShow = config?.classNameUniqueShow || 'tariff-unique--show';
  this.ranges = {};
  this.elements = [];
  this.tariffCards = [];
  this.uniqueBlock = null;

  this.countComputer = 0;
  this.countServer = 0;

  this.init = function () {
    this.elements = document.getElementsByClassName(this.classNameRage);
    this.tariffCards = document.getElementsByClassName(this.classNameTariff);
    this.uniqueBlock = document.getElementsByClassName(this.classNameUnique)[0];

    [...this.elements].forEach((slider, index) => {
      this.ranges[index] = nouislider.create(slider, {
        tooltips: true,
        connect: [ true, false ],
        step: +slider.dataset.step || this.defaultConfig.step,
        start: +slider.dataset.start || this.defaultConfig.start,
        range: {
          min: +slider.dataset.min || this.defaultConfig.min,
          max: +slider.dataset.max || this.defaultConfig.max,
        },
        format: {
          to: (value) => value,
          from: (value) => Math.round(Number(value)),
        },
        pips: {
          mode: "range",
          density: 400,
        },
      });

      this.ranges[index].on('update', (value) => {
        const input = document.querySelector(`input[data-name=${ slider.dataset.input }]`);
        if (input) {
          input.value = value;
        }

        this.calculation();
        this.toggleUnique();
      });
    });

    if (this.uniqueBlock) {
      this.uniqueBlock.querySelector("[data-computer]").textContent = this.uniqueBlock.dataset.computer;
      this.uniqueBlock.querySelector("[data-server]").textContent = this.uniqueBlock.dataset.server;
    }

    return this.ranges;
  }

  this.calculation = function () {
    [...this.tariffCards].forEach(tariff => {
      const tariffPrice = tariff.querySelector('.js-tariff__price');

      if ('fixPrice' in tariff.dataset && tariff.dataset.minPrice) {
        tariffPrice.textContent = tariff.dataset.minPrice;
        return;
      }

      this.countComputer = Number(document.querySelector('input[data-name="computer"]')?.value) || 0;
      this.countServer = Number(document.querySelector('input[data-name="server"]')?.value) || 0;

      const price = this.countComputer * Number(tariff.dataset.computerPrice) + this.countServer * Number(tariff.dataset.serverPrice);
      const currentPrice = Number(tariff.dataset.minPrice) > price ? Number(tariff.dataset.minPrice) : price;

      tariffPrice.textContent = Math.round(currentPrice).toString();
    })
  }

  this.toggleUnique = function () {
    if (!this.uniqueBlock) return;

    const isShow = this.countComputer > Number(this.uniqueBlock.dataset.computer) || this.countServer > Number(this.uniqueBlock.dataset.server);

    this.uniqueBlock.classList.toggle(this.classNameUniqueShow, isShow);
  }

  return this.init();
}
