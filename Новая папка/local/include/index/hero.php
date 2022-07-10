<section class="hero">
    <div class="hero__wrapper">
        <div class="hero__container">
            <div class="hero__body">
                <h1 class="hero__title"><?$APPLICATION->IncludeFile(
                            "/local/include/index/hero__title.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></h1>
                <ul class="hero__list">
                    <li class="hero__item"><?$APPLICATION->IncludeFile(
                            "/local/include/index/hero__item1.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></li>
                    <li class="hero__item"><?$APPLICATION->IncludeFile(
                            "/local/include/index/hero__item2.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></li>
                    <li class="hero__item"><?$APPLICATION->IncludeFile(
                            "/local/include/index/hero__item3.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></li>
                </ul>
                <div class="hero__btns">
                    <button class="hero__button hero__button_blue rectangle_btn" data-popup="#sectionServicePopup" data-popup-info="Хочу получить бесплатную консультацию">Оставить заявку</button>
                    <button class="hero__button rectangle_btn" data-popup="#sectionServicePopup" data-popup-info="Заказать звонок">Заказать звонок</button>
                </div>
            </div>
        </div>
        <a href="#" data-goto=".directions" class="hero__goto">
            <img src="<?=SITE_TEMPLATE_PATH?>/img/icons/mouse.svg" alt="image">
            <span>Узнать больше</span>
        </a>
    </div>
</section>