var myMap;
let myGeoObjects = [];

document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('#map')) {
    ymaps.ready(init);
  }
  function init () {
    myMap = new ymaps.Map("map", {
        // Координаты центра карты
        center:[,],
        // Масштаб карты
        zoom: 13,
        // Выключаем все управление картой
        /* controls: [] */
    }); 
    const mapPlacemarks = document.querySelectorAll('[data-placemark]');
    if (mapPlacemarks.length) {
      mapPlacemarks.forEach(e => {
        let mapPlacemarkCoords = e.dataset.placemark.replace(' ', '').split(',');
        // Указываем координаты метки
        myGeoObjects = new ymaps.Placemark(mapPlacemarkCoords,{
                        },{
                        iconLayout: 'default#image',
                        // Путь до нашей картинки
                        iconImageHref: '/local/templates/althouse/img/marker.png', 
                        // Размеры иконки
                        iconImageSize: [60, 80],
                        // Смещение верхнего угла относительно основания иконки
                        iconImageOffset: [-35, -75]
        });
        
        myMap.geoObjects.add(myGeoObjects);
      })
    }
    // Активный чекбокс
    var activeRadioForMap = document.querySelector('.contacts__radio:checked');
    var activeMapCoords = activeRadioForMap.dataset.center.split(',');
    myMap.setCenter(activeMapCoords);
  
    // Переключатель городов
    var radioForMap = document.querySelectorAll('.contacts__radio');
    radioForMap.forEach(i => {
        i.addEventListener('change', () => {
            activeRadioForMap = document.querySelector('.contacts__radio:checked');
            activeMapCoords = activeRadioForMap.dataset.center.split(',');
            myMap.setCenter(activeMapCoords);
          });
    });
  }
})













