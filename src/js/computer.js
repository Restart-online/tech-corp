import nouislider from "nouislider";
import "nouislider/dist/nouislider.min.css";

document.addEventListener('DOMContentLoaded', () => {
  const connectInput1 = document.querySelector('.computer-tariff__input--computer');
  const connectInput2 = document.querySelector('.computer-tariff__input--server');
  const connectSlider1 = document.querySelector('.computer-tariff__range--computer');
  const connectSlider2 = document.querySelector('.computer-tariff__range--server');

  if (connectSlider1 && connectSlider2 && connectInput1 && connectInput2) {
    const tariffSlider1 = nouislider.create(connectSlider1, {
      tooltips: true,
      connect: [ true, false ],
      step: 1,
      start: 10,
      range: {
        "min": 0,
        "max": 40
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

    const tariffSlider2 = nouislider.create(connectSlider2, {
      tooltips: true,
      connect: [ true, false ],
      step: 1,
      start: 2,
      range: {
        "min": 0,
        "max": 5
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

    tariffSlider1.on("update", (value) => connectInput1.value = value);
    tariffSlider2.on("update", (value) => connectInput2.value = value);
  }
})
