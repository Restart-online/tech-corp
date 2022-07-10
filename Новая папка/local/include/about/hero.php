<section class="hero-cases">
<div class="hero-cases__container hero-cases__container_about">
    <div class="hero-cases__head">
        <div class="hero-cases__sidebar sidebar">
            <div data-spollers="992" class="sidebar__menu menu-sidebar">
                <div class="menu-sidebar__spoller">
                <button type="button" data-spoller class="menu-sidebar__title">
                        <?$APPLICATION->IncludeFile(
                            "/local/include/about/sertifikaty/sidebar__title.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?>
                        </button>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu", 
                        "inner", 
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "inner"
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-cases__content">
        <h1 class="hero-cases__title hero-cases__title_small"><?$APPLICATION->ShowTitle(false)?></h1>
        <p class="hero-cases__text">
            <?$APPLICATION->IncludeFile(
                    "/local/include/about/hero_text1.php", 
                    Array(), 
                    Array(
                        "MODE"      => "text",                                           
                        "NAME"      => "Редактирование включаемой области",      
                        "TEMPLATE"  => ""                    
                    ));
                ?>
                </p>
            <p class="hero-cases__text">
            <?$APPLICATION->IncludeFile(
                    "/local/include/about/hero_text2.php", 
                    Array(), 
                    Array(
                        "MODE"      => "text",                                           
                        "NAME"      => "Редактирование включаемой области",      
                        "TEMPLATE"  => ""                    
                    ));
                ?>
                </p>
            </div>
</div>
</section>