

function init () {
    var myMap = new ymaps.Map("map", {
        // Координаты центра карты
        center:[,],
        // Масштаб карты
        zoom: 12,
        // Выключаем все управление картой
        /* controls: [] */
    }); 

    // Активный чекбокс
    var activeRadioForMap = document.querySelector('input[name="city"]:checked');
    var activeMapCoords = activeRadioForMap.dataset.center.split(',');
    myMap.setCenter(activeMapCoords);

    // Переключатель городов
    var RadioForMap = document.querySelectorAll('input[name="city"]');
    RadioForMap.forEach(i => {
        i.addEventListener('click', () => {
            activeRadioForMap = document.querySelector('input[name="city"]:checked');
            activeMapCoords = activeRadioForMap.dataset.center.split(',');
            myMap.setCenter(activeMapCoords);
          });
    });


    let myGeoObjects = [];
  
    // Указываем координаты метки
    myGeoObjects = new ymaps.Placemark([55.74359229354363,37.654212570736476],{
                    balloonContentBody: 'БЦ \'Минская Плаза\'',
                    },{
                    iconLayout: 'default#image',
                    // Путь до нашей картинки
                    iconImageHref: 'img/marker.png', 
                    // Размеры иконки
                    iconImageSize: [60, 80],
                    // Смещение верхнего угла относительно основания иконки
                    iconImageOffset: [-35, -75]
    });
                
    var clusterer = new ymaps.Clusterer({
        clusterDisableClickZoom: false,
        clusterOpenBalloonOnClick: false,
    });
    
    clusterer.add(myGeoObjects);
    myMap.geoObjects.add(clusterer);
    // Отключим zoom
    myMap.behaviors.disable('scrollZoom');


}



ymaps.ready(init);












